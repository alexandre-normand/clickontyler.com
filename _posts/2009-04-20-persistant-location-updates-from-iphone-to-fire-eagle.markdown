---
date: 2009-04-20 19:25:40
title: Persistant Location Updates From iPhone to Fire Eagle
layout: post
permalink: /blog/2009/04/persistant-location-updates-from-iphone-to-fire-eagle/index.html
slug: persistant-location-updates-from-iphone-to-fire-eagle
---
Location Based Services are hot. They add an extra layer of usefulness on top of the web sites and products we're already using. The trick is keeping your location updated in the cloud as frequently, comfortably, and securely as possible.

[Fire Eagle](http://fireeagle.yahoo.net/) fulfills the security requirement &mdash; brokering your whereabouts only to parties you've authorized. And iPhone applications like [Sparrow](http://clickontyler.com/sparrow/) and [Voila](http://www.cristdrive.com/voila/) make it a cinch to update Fire Eagle on-the-go. But they're limited to manual updates as they can't run in the background. (And you wouldn't want them to because of the drain GPS has on battery life.)

For me, the holy grail has always been a way to update your location persistently from iPhone. And until Apple offers their own solution (fingers crossed) I'd like to present mine. It's a dirty hack (the best always are), and has the added benefit of working with any AT&amp;T phone &mdash; not just iPhone.

To do this, we'll be scraping AT&amp;T's new [Family Map service](https://familymap.wireless.att.com/finder-att-family/welcome.htm) and then pushing the data we retrieve into Fire Eagle ourselves.

(Family Map is an overpriced add-on to your monthly plan that lets you track the phones on your account using AT&amp;T's website. It's limited, but surprisingly good considering it came from within the bowels of a cellphone company.)

There will be three parts to this hack.

 1.  Scraping our location data from AT&amp;T's website.
 2.  Pushing that data to Fire Eagle.
 3.  Making the script run automatically.

Let's get started.

### Scraping the Data ###

The Family Map website uses Microsoft's VirtualEarth maps plus some other AJAXy fanciness. I briefly poked around to see if there were any JSON or XML data sources I could hijack but didn't see anything. Instead, I opted to directly scrape their [mobile website](https://familymap.att.com/finder-wap-att/) as it's plain vanilla HTML.

I won't go into the details of scraping the data (you can [see the code](http://github.com/tylerhall/att-family-map-scraper/blob/739ed83463c82bf7553feb0a35f2ddf99c0a61ab/lib/familymap.php) for yourself), but it was pretty simple. Login, send a "locate my phone" request, wait for the data, and parse out our coordinates.

### Pushing Data to Fire Eagle ###

Fire Eagle is an excellent API to work with. They've got a clear spec and tons of example code. The only tricky part is handling the initial OAuth setup. I've included a simple web page (`setup.php`) you can use to do the authentication. It's based on Fire Eagle's PHP API kit example.

Once OAuth is setup, it's only one line of code to publish our location.

### Making it Automatic ###

Running this script automatically will vary depending on your setup. In my case, I've created a cron jon that runs the included `update.php` script every five minutes.

### Download the Code ###

And that's it. This code is only a few hours old, but it seems to work well so far. I watched as Fire Eagle was updated with my location this morning on the way to work. That said, it's definitely not user friendly &mdash; clearly something only someone familiar with a command line would want to setup. But if you're interested in developing a friendlier solution, [let me know](http://clickontyler.com/contact/) and perhaps we can work together.

[Grab the code from GitHub](http://github.com/tylerhall/att-family-map-scraper/tree/master).