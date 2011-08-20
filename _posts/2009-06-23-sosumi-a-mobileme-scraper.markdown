---
date: 2009-06-23 05:06:48
title: Sosumi - A MobileMe Scraper
layout: post
permalink: /blog/2009/06/sosumi-a-mobileme-scraper/index.html
slug: sosumi-a-mobileme-scraper
---
[Sosumi](http://github.com/tylerhall/sosumi/tree/master) is a PHP script that scrapes MobileMe and exposes Apple's <a href="http://www.apple.com/mobileme/whats-new/">Find My iPhone</a> functionality to the command line or your own web application. This lets you pull your phone's current location and push messages and alarms to the device.

Like my <a href="http://clickontyler.com/blog/2009/04/persistant-location-updates-from-iphone-to-fire-eagle/">previous blog post</a> that dealt with AT&T's Family Map service, my goal was to connect my iPhone with <a href="http://fireeagle.yahoo.net/">Fire Eagle</a> by Yahoo!. There are a few iPhone Fire Eagle updaters available, but they're all limited by Apple's third-party application restrictions. Sosumi gets around those restrictions by running every few minutes on your own server rather than the device itself. In my case, I've setup a cron job to run the script every fifteen minutes and push my location to Fire Eagle.

Until Apple releases a location API for MobileMe (not likely, and not their job), this will have to do.

[Grab the code](http://github.com/tylerhall/sosumi/tree/master) on GitHub.

Example:

<pre>
$ssm = new Sosumi('username', 'password');
$location_data = $ssm->locate();
$ssm->sendMessage('Daisy, daisy...');
</pre>

