---
date: 2009-02-07 03:03:51
title: Serving Static Content on Amazon S3 with s3up
layout: post
permalink: /blog/2009/02/serving-static-content-on-amazon-s3-with-s3up/index.html
slug: serving-static-content-on-amazon-s3-with-s3up
---
I've [written](http://clickontyler.com/blog/2008/05/building-a-better-website-with-yahoo/) [twice](http://clickontyler.com/blog/2008/05/using-amazon-s3-as-a-content-delivery-network/) about using Amazon S3 to host your website's static content. It's a great solution for small websites without access to a real content delivery network. And now that Amazon has launched [CloudFront](http://aws.amazon.com/cloudfront/) on top of S3, it's even better.

But there are still ways we can improve the performance. The trick is to upload our files using custom headers so they're served back with a proper expiration date and gzipped when possible &mdash; i.e., the techniques recommended by [YSlow](http://developer.yahoo.com/yslow/).

I've written a command line tool which simplifies this process called [`s3up`](http://github.com/tylerhall/s3up/). The idea is simple. It uploads a single file to S3, sets a far future expiration date, gzips the content, and versions the file by combining the filename with a timestamp. Each of these actions are optional and can be controlled via the command line.

The basic syntax:

{% highlight bash linenos %}
s3up myS3bucket js/somefile.js somefile.js
{% endhighlight %}

would upload a local JavaScript file named `somefile.js` into your Amazon S3 bucket named `myS3bucket` inside the `js` folder.

We can build on this command by adding the `-x` flag, which tells `s3up` to set a far future expiration header. By default, it chooses a date ten years in the future:

{% highlight bash linenos %}
s3up -x myS3bucket js/somefile.js somefile.js
{% endhighlight %}

This lets the browser know to keep the file cached indefinitely.

Passing the `-z` flag uploads _two_ copies of the file. One normally, and a second that is gzipped and renamed `filename.gz.extension`. You can then dynamically serve the compressed version to browsers that support it.

Finally, the `-t` flag uploads and renames the file `filename.YYYYmmddHHmmss.extension`. This lets you easily create versioned files when you need to update an existing file. (You need to use a new filename since the browser was told earlier to always load from the cache.)

Combining all three options we get:

{% highlight bash linenos %}
s3up -txz myS3bucket js/somefile.js somefile.js
{% endhighlight %}

This uploads your file, compresses it, sets the correct expiration date, and versions the filename &mdash; all in one easy step.

If you'd prefer to choose your own string for versioning, you can specify it with the `--version` flag:

{% highlight bash linenos %}
s3up -txz --version=v2 myS3bucket js/somefile.js somefile.js
{% endhighlight %}

In that example, the file would be stored in S3 as `somefilev2.js`.

`s3up` also echoes the new filename so you can quickly paste it into your HTML. If you're on a Mac, you can automatically copy the new name onto your clipboard by piping `s3up` to the [`pbcopy`](http://developer.apple.com/DOCUMENTATION/Darwin/Reference/ManPages/man1/pbcopy.1.html) command.

If you'd like to take this a step further and integrate `s3up` into your existing deploy scripts, you can leave off the filename argument and instead pipe the data to upload via stdin. So, if you're using another tool like the [YUI Compressor](http://developer.yahoo.com/yui/compressor/) or [byuic](http://wiki.brilaps.com/wikka.php?wakka=byuic), you can run:

{% highlight bash linenos %}
somecommand | s3up -txz myS3bucket js/somefile.js | pbcopy
{% endhighlight %}

### Uploading Multiple Files ###

A common task is uploading a whole folder of images. You can do this in one step by appending a slash (/) to the S3 filename and using wildcards to specify multiple local files. Example:

{% highlight bash linenos %}
s3up myS3bucket images/ /path/to/your/images/*.jpg
{% endhighlight %}

When `s3up` sees `images/` ending with a slash, it treats it like a directory and stores all of your files into it. **Make sure you remember the slash** on `images/`. That's what triggers the special "directory" mode uploading.


### Download ###

You can grab the latest copy of `s3up` from the its [GitHub project](http://github.com/tylerhall/s3up/).