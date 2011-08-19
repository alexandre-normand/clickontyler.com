---
date: 2010-06-21 01:55:18
title: Open Source Updates
layout: post
permalink: /blog/2010/06/open-source-updates/index.html
slug: open-source-updates
---
On this lazy Sunday afternoon I thought I'd take the opportunity to mention a few open source projects I've recently updated. [GitHub](http://github.com/tylerhall/) makes sharing code so ridiculously easy, it's a shame not to call attention to it occasionally in case other people might find something useful.

### Sosumi 2.0 ###

First up is [Sosumi 2.0](http://github.com/tylerhall/sosumi). Last year, when Apple launched the [Find My iPhone component](http://www.apple.com/mobileme/features/find-my-iphone.html) of MobileMe, I immediately saw an opportunity to grab persistent location information from my phone &mdash; without background processing. Although Apple didn't supply an API for this information, it turned out to be easy enough to scrape their site and wrap it up nicely into a [PHP class](http://clickontyler.com/blog/2009/06/sosumi-a-mobileme-scraper/). [Nat Friedman](http://nat.org/) even used it as a way to automatically update his [Google Latitude](http://www.google.com/latitude/intro.html) position in his [playnice](http://nat.org/blog/2009/08/playnice-google-apple/) project, and I built a similar script for Yahoo!'s [Fire Eagle](http://fireeagle.yahoo.net/) service. It all worked well enough, but it was slow and prone to breaking whenever Apple updated me.com.

Fast forward to last week, Apple released an [official Find My iPhone client](http://www.apple.com/mobileme/news/2010/06/find-my-iphone-gets-an-update.html) for iPhone and iPad. The mere fact that they released this means there had to be a hidden "official" API somewhere. After a few hours messing around in [WireShark](http://www.wireshark.org/) I found their API end point and re-wrote Sosumi to talk to their API just like the client app. The result? Dramatically faster location updates (10x) and a solid script that's immune to changes on MobileMe's website.

This [new version of Sosumi](http://github.com/tylerhall/sosumi) is available on GitHub and extremely easy to use:

    include 'class.sosumi.php';
    $ssm = new Sosumi('your-username', 'your-password');
    $location = $ssm->locate();

That's it. `$location` will be an array populated with your phone's latitude, longitude, and a few other useful data points. What you do with this information is up to you!

### PHP HTML Compressor ###

Like the name says, [this project](http://github.com/tylerhall/html-compressor) is a small PHP class that accepts an HTML document and minifies its filesize by removing unnecessary whitespace and blank lines. It takes care not to touch fragile areas like `<pre>` blocks. The result is HTML that renders exactly the same in the browser but (in my testing) can be up to 15% smaller. In today's increasingly mobile world, every byte over the wire counts &mdash; and this is a simple way to speed up your page load times.

The compressor can be used in three ways:

1. Pass it an string containing HTML and it'll return the minified version.
2. As full fledged command line utility. Pass it a filename or pipe content to it via stdin and it will send the minified version back over stdout. This is super useful for adding automatic compression into your deploy/build scripts.
3. Or as a [WordPress plugin](http://wordpress.org/extend/plugins/wp-html-compressor/) that automatically minifies all of your posts and pages. Combine it with [wp-super-cache](http://wordpress.org/extend/plugins/wp-super-cache/) and you're well on your way to a speedy site &mdash; even on a shared host.

For an example of the type of HTML the compressor produces, just take a look at the HTML source of this site. Every page is piped through the compressor before being saved as a static file on my server.

### Google Search Shell ###

My [google-shell](http://github.com/tylerhall/google-shell) project is another small command line utility. It's a simple interface to Google's search results that talks to their [AJAX Search API](http://code.google.com/apis/ajaxsearch/). It lets you easily pull down the top results for any query &mdash; including the result's URL, title, and a brief abstract from the page. It has quite a few options that allow you to customize the output to be either human readable or digestible to other scripts. For example, here's an *ugly*, *ugly* shell command that shows off the power of what having Google at your fingertips can do:

    URL=`gshell -fun1 "imdb american beauty"`; curl $URL | \
    sed -n 's/.*\([0-9]\.[0-9]\)\/10.*/\1/p' | head -n1

In case you don't speak nerd, that tells google-shell to return only the URL of the first result for the query "imdb american beauty". In other words, the same thing as Google's "I'm Feeling Lucky" option. It then takes that URL, downloads it, and pipes it through a messy `sed` and `head` command that extracts the IMDB rating for _American Beauty_. Granted, that's quite a lot to type &mdash; especially considering you could open a web browser and google it yourself much faster. However, if you were to add that long command as an alias in your Bash profile. you could very quickly write a command like

    imdb "american beauty"

That would instantly return you the rating of whichever movie you specify. Nerdy, but cool, right?

### Anyway ###

As always, the three projects above and [all my open source code](http://github.com/tylerhall/) are available on GitHub. Hopefully you'll find something useful. If you do, I'd love to [hear about it](http://clickontyler.com/contact/) &mdash; and I always welcome bug fixes and other contributions.
