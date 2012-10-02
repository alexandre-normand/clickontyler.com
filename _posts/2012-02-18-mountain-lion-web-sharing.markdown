---
date: 2012-02-18 20:48:51
title: Web Sharing in OS X Mountain Lion
layout: post
permalink: /blog/2012/02/web-sharing-mountain-lion/index.html
slug: web-sharing-mountain-lion
---
As [MacMiniColo](http://macminicolo.net) [first reported](http://blog.macminicolo.net/post/17721333182/first-look-at-mountain-lion-os-x-server), Apple's preview release of OS X 10.8 Mountain Lion has quietly removed the "Web Sharing" option from System Preferences. That one little checkbox held a lot of power &mdash; it turned your Mac into a full featured web server, perfect for testing your development sites locally.

Lucky for us, while Apple may have removed the option to enable Web Sharing, they left the guts of the built-in Apache web server in tact. All you have to do is find a way to turn it on. And that's where I come in...

Because of [VirtualHostX](http://clickontyler.com/virtualhostx/), I happen to have all the code necessary to manage Apache on OS X. That includes turning the server on and off. So here's [a replacement System Preferences pane](http://amz.clickontyler.com/WebSharing.dmg) you can install that lets you manage Apache just like before. Enjoy.

[![http://cdn.clickontyler.com/blog/websharingpane.png](http://cdn.clickontyler.com/blog/websharingpane.png)](http://amz.clickontyler.com/WebSharing.dmg)