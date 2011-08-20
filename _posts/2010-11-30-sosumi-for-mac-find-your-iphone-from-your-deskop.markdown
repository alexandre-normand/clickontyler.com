---
date: 2010-11-30 03:38:23
title: Sosumi for Mac - Find Your iPhone From Your Deskop
layout: post
permalink: /blog/2010/11/sosumi-for-mac-find-your-iphone-from-your-deskop/index.html
slug: sosumi-for-mac-find-your-iphone-from-your-deskop
---
Every <img src="http://cdn.tyler.fm/images/sosumi-icon.png" style="float:right;"> holiday, between the food and family, I always seem to find time for a quick project. Last year I built the first version of [Nottingham](http://clickontyler.com/nottingham/) over the Thanksgiving break. This year was no exception, and I found myself putting the final touches on [Sosumi for Mac](http://clickontyler.com/sosumi/) after an eighteen hour coding streak this weekend.

Sosumi for Mac builds on the original [Sosumi project](https://github.com/tylerhall/sosumi) I started last Summer &mdash; a PHP script that returned the location of your iPhone by scraping MobileMe's website and that eventually evolved to use Apple's "official" API once that was released.

Last week, Apple pushed a rather large update to the Find My iPhone service and made it free to all users. Along with that came some API changes, which broke Sosumi. With help from [Andy Blyler](http://twitter.com/ablyler) and [Michael Greb](http://twitter.com/mikegrb), we managed to get it working again. I took the opportunity to go all out and write a native Cocoa implementation of Sosumi as well. And, with that done, I went one step further and built a full-fledged desktop app for tracking all of your iDevices.

Now that it's complete, it's much easier to simply open up Sosumi for Mac, rather than having to re-login to Apple's website or iPhone client each time. The desktop app also opens up some fun possibilities. A future version could notify you when your spouse leaves work in the afternoon so you know when to begin preparing dinner. Or alert you if your child strays from their normal route on the way home from school. Or, since Sosumi provides your device's battery level, you could even send alerts if your phone needs to be charged soon.

Admittedly, this kind of always-on location tracking can certainly be creepy. But that's almost always the case with these types of applications. Whether [Fire Eagle](http://fireeagle.yahoo.net/), [Foursquare](http://foursquare.com/), or [Google Latitude](http://www.google.com/latitude/) &mdash; it's always a matter of striking a reasonable balance between convenience and privacy. I trust you'll use Sosumi for good rather than evil.

[Download Sosumi](http://clickontyler.com/sosumi/download/), [read more](http://clickontyler.com/sosumi/) about it, or [grab the source on Github](https://github.com/tylerhall/MacSosumi) and build something even cooler.

![http://cdn.tyler.fm/images/sosumi-ss1.png](http://cdn.tyler.fm/images/sosumi-ss1.png)