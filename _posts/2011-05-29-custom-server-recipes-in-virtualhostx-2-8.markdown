---
date: 2011-05-29 21:12:36
title: Custom Server Recipes in VirtualHostX 2.8
layout: post
permalink: /blog/2011/05/custom-server-recipes-in-virtualhostx-2-8/index.html
slug: custom-server-recipes-in-virtualhostx-2-8
---
Beginning with [VirtualHostX](http://clickontyler.com/virtualhostx/) 2.8, which was released last night, you can create custom server recipes that let VirtualHostX work with alternative Apache servers such as [Zend Server CE](http://www.zend.com/en/products/server-ce/), [BitNami](http://bitnami.org/), and [Acquia Drupal](http://acquia.com/products-services/acquia-drupal) just to name a few. This is in addition to the servers that VHX has built-in support for &mdash; [MAMP](http://bitbob.com/mac-web-development-made-easy), [XAMPP](http://www.apachefriends.org/en/xampp.html), and Apple's built-in Apache.

You can export your server recipes and pass them along to other VirtualHostX users, too. For example, a manager might create a recipe for the Apache server used at work and then email it to their employees. All they need to do is double-click the recipe file and VHX will automatically configure itself using the settings their boss specified.

I've also setup [a GitHub project for sharing recipes](https://github.com/tylerhall/VirtualHostX-Recipes) with other users. You're welcome to browse and download recipes or submit your own. Full instructions for creating recipes are included with VirtualHostX. Just click the help icon in Preferences for more info.

Personally, I'm thrilled this feature is finally available. Supporting custom Apache servers has been a highly requested feature for a long time. To everyone who emailed requesting it over the last few years, thanks for your patience. There's more good stuff to come soon.