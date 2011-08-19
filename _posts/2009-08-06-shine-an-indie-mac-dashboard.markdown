---
date: 2009-08-06 19:29:48
title: Shine - An Indie Mac Dashboard
layout: post
permalink: /blog/2009/08/shine-an-indie-mac-dashboard/index.html
slug: shine-an-indie-mac-dashboard
---
Two years ago, shortly after I released [VirtualHostX](http://clickontyler.com/virtualhostx/) 1.0, I [wrote about Appcaster](http://clickontyler.com/blog/2007/09/lessons-from-a-first-time-mac-developer/) - a web dashboard for Mac developers I built that manages my application updates, payment processing, etc. With the release of VHX 2.0 and [Incoming!](http://incomingapp.com), I decided it was time to rewrite Appcaster as the original code was hurried and hastily patched over the last few years.

Today I'm happy to officially announce [Shine](http://github.com/tylerhall/Shine/tree/master), a revamped version of Appcaster re-written from the ground up. The goal of Shine (more on the name in a bit) was to provide clean, easy to use dashboard for indie Mac developers and also to build a stable foundation that provides for future improvement down the road.

I chose the name Shine because, at it's heart, it's a complimentary product to Andy Matuschak's [Sparkle](http://sparkle.andymatuschak.org/) project. (Inevitable tagline: Your app already Sparkles, now make it Shine.) The core functionality, like Appcaster before it, is to automatically generate appcast feeds for your product updates. But it does a whole lot more, too.

![Shine Screenshot](http://cdn.tyler.fm/blog/shine-ss1.png)

Shine handles order processing using [PayPal's IPN service](https://www.paypal.com/ipn). That includes generating the license information (using either [Aquatic Prime](http://www.aquaticmac.com/) or your own, custom scheme), emailing it to the user, and managing the database of orders. It also computes aggregate stats based on your users' Sparkle update requests, collects user feedback (bug reports, feature requests, questions), and automatically [stores your application updates in Amazon S3](http://www.cabel.name/2007/04/coda-one-week-later.html).

In short, Shine manages my entire Indie Mac developer workflow.

The code is based on two of my other open source projects: the [Simple PHP Framework](http://github.com/tylerhall/simple-php-framework/tree/master) and [YUI App Theme](http://github.com/tylerhall/yui-app-theme/tree). SPF provides a clean, lightweight, active record pattern to model the data, and yui-app-theme is an admin area CSS template built on top of the [YUI Grids framework](http://developer.yahoo.com/yui/grids/). Combining these two projects let me build Shine in record time (about 24 working hours).

The code for Shine is free to use (MIT license) and [available on GitHub](http://github.com/tylerhall/Shine/tree/master). Feel free to email me with any questions or feedback.

(Thanks to Steven Degutis of [Thoughtful Tree software](http://thoughtfultree.com/) for his feedback on this project.)