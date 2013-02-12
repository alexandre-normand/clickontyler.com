---
date: 2008-05-09 00:27:46
title: Using Amazon S3 as a Content Delivery Network
layout: post
permalink: /blog/2008/05/using-amazon-s3-as-a-content-delivery-network/index.html
slug: using-amazon-s3-as-a-content-delivery-network
---
\[**Update:** You might also be interested in [s3up](http://clickontyler.com/blog/2009/02/serving-static-content-on-amazon-s3-with-s3up/) for storing static content in Amazon S3.\]

Earlier this week I posted about [my experience redesigning this site](http://clickontyler.com/blog/2008/05/building-a-better-website-with-yahoo/), focusing on optimizing my page load times using [YSlow](http://developer.yahoo.com/yslow/). A large part of that process involved storing static content (images, stylesheets, JavaScript) on Amazon S3 and using it like a poor man's content delivery network (CDN). I made some hand-waving references to a deploy script I wrote which handles syncing content to S3 and also adding expiry headers and gzipping that data. A couple users emailed asking for more info, so, here goes.

### Why Amazon S3? ###

Since its launch, nearly every technical blogger on the net has weighed in on why Amazon S3 is (for lack of a better word) _awesome_. No need for me to repeat them. I'll just say quickly that it's cheap (as in price, not in quality), fast, and easy to use. If you've got the deep pockets of a corporation backing you, you could probably find a better deal with another CDN provider, but for bloggers, startups, and small businesses, it's the best game in town.

Amazon S3 is platform and language agnostic. It's a massive harddrive in the sky with an open API sitting on top. You can connect to it from any system using just about any programming language. For this tutorial, I'll be using a slightly modified version of the [S3 library](/amazon-php-aws/) I wrote in PHP. I say "slightly modified" because I had to make a few changes to enable setting the expires and gzip headers. These changes will eventually make their way into the [official project](http://code.google.com/p/php-aws/) &mdash; I just haven't done it yet.

### The Deploy Process ###

YSlow recommends hosting static content such as images, stylesheets, and JavaScript files on a CDN to speed up page load times. It's also best to give each file a far future expiration header (so the browser doesn't try to reload the asset on each page view) and to gzip it. On a typical webserver like Apache, these are simple changes that you can do programatically through a config file. But Amazon S3 isn't really a web server. It's just a "dumb" storage device that happens to be accessible over the web. We'll need to add the headers ourselves, manually, upfront when we upload.

The deploy script will also need to be smart and not re-upload files that are already on S3 and haven't changed. To accomplish this we'll be comparing the file on disk with the ETag value (md5 hash) on S3. Let's get started.

### Images ###

Deploying images is straight forward.

 * Loop over every image in our `/images/` directory.
 * Calculate the file's md5 hash and compare to the one in S3.
 * If the file doesn't exist or has changed, upload it using a far futures header.
 * Repeat for the next image.

Source:

{% highlight php  %}
<?PHP
    $files = scandir(DOC_ROOT . IMG_PATH);
    foreach($files as $fn)
    {
        if(!in_array(substr($fn, -3), array('jpg', 'png', 'gif'))) continue;
        $object   = IMG_PATH . $fn;
        $the_file = DOC_ROOT . IMG_PATH . $fn;
        // Only upload if the file is different
        if(!$s3->objectIsSame($bucket, $object, md5_file($the_file)))
        {
            echo "Putting $the_file . . . ";
            if($s3->putObject($bucket, $object, $the_file, true, null, array('Expires' => $expires)))
                echo "OK\n";
            else
                echo "ERROR!\n";
        }
        else
            echo "Skipping $the_file\n";
    }
{% endhighlight %}

### JavaScript and Stylesheets ###

The same process applies to JavaScript and stylesheets. The only difference is we need to serve gzip encoded versions to browsers that support it. As I said above, S3 won't do this natively so we need to fake it by uploading a plaintext _and_ a gzipped version of each file and then use PHP to serve the appropriate one to the user.

In the master config file on my website, I set a variable called `$gz` like so:

{% highlight php  %}
<?PHP
    $gz  = strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false ? 'gz.' : '';
{% endhighlight %}

That snippet detects if the user's browser supports gzip encoding and sets the variable appropriately. Then, throughout the site, I link to all of my JavaScript and CSS files like this:

{% highlight html  %}
    <link rel="stylesheet" href="{{ site.cdn_url }}/css/main.<?PHP echo $gz;?>css" type="text/css">
{% endhighlight %}

That way, if the `$gz` variable is set, it adds a "gz." to the filename. Otherwise, the filename doesn't change. It's a quick way to transparently give the right file to the browser.

With that out of the way, here's how I deploy the gzipped content:

{% highlight php  %}
<?PHP
    // List your stylesheets here for concatenation...
    $css  = file_get_contents(DOC_ROOT . CSS_PATH . 'reset-fonts-grids.css') . "\n\n";
    $css .= file_get_contents(DOC_ROOT . CSS_PATH . 'screen.css') . "\n\n";
    $css .= file_get_contents(DOC_ROOT . CSS_PATH . 'jquery.lightbox.css') . "\n\n";
    $css .= file_get_contents(DOC_ROOT . CSS_PATH . 'syntax.css') . "\n\n";
    file_put_contents(DOC_ROOT . CSS_PATH . 'combined.css', $css);
    shell_exec('gzip -c ' . DOC_ROOT . CSS_PATH . 'combined.css > ' . DOC_ROOT . CSS_PATH . 'combined.gz.css');
    if(!$s3->objectIsSame($bucket, CSS_PATH . 'combined.css', md5_file(DOC_ROOT . CSS_PATH . 'combined.css')))
    {
        echo "Putting combined.css...";
        if($s3->putObject($bucket, CSS_PATH . 'combined.css', DOC_ROOT . CSS_PATH . 'combined.css', true, null, array('Expires' => $expires)))
            echo "OK\n";
        else
            echo "ERROR!\n";

        echo "Putting combined.gz.css...";
        if($s3->putObject($bucket, CSS_PATH . 'combined.gz.css', DOC_ROOT . CSS_PATH . '/combined.gz.css', true, null, array('Expires' => $expires, 'Content-Encoding' => 'gzip')))
            echo "OK\n";
        else
            echo "ERROR!\n";
    }
    else
        echo "Skipping combined.css\n";
{% endhighlight %}

You'll notice that the first thing I do is concatenate all of my files into a single file &mdash; that's another YSlow recommendation to speed things up. From there, we compress using gzip and then up the two versions. Looking at this code, there's probably a native PHP extension to handle the gzipping instead of exec'ing a shell command, but I haven't looked into it (yet).

Also, make sure and notice that I'm adding a `Content-Encoding: gzip` header to each file. If you don't do this, the browser will crap out on you when it tries to read the file as plaintext.

### And We're Done ###

So those are the main bits of the script. You can [download the full script](http://code.google.com/p/tylerhall/source/browse/trunk/amazon-s3-deploy/deploy.php) (and the S3 library) from my [Google Code project](http://code.google.com/p/tylerhall/).