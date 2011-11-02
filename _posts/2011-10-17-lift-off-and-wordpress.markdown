---
date: 2011-10-17 09:44:13
title: Using Lift Off with WordPress
layout: post
permalink: /blog/2011/11/lift-off-and-wordpress/index.html
slug: lift-off-and-wordpress
---
I just wanted to post that I've written a small WordPress plugin that makes using [Lift Off](http://clickontyler.com/virtualhostx/liftoff/) much easier. It's a feature many Lift Off users have been asking for, and I'm thrilled that it's finally ready and working.

Installation is easy. Just [download this zip file](https://github.com/tylerhall/VHX-Liftoff-Wordpress-Plugin/zipball/master), unzip it, and copy `liftoff.php` into your WordPress plugins directory. (That directory is `wp-content/plugins/`.) Then, activate the plugin in your WordPress Admin Dashboard. There are no options to configure.

If you have any questions about using the plugin, don't hesitate to [contact me](http://clickontyler.com/contact/).

### Technical Details ###

If you're curious...

The problem with WordPress and Lift Off is that WordPress doesn't see the _true_ domain name your visitors use to access your shared website. While they're visiting a URL like `http://foo.vhx.me`, WordPress sees `http://yoursite.dev`. And since WordPress automatically writes all of its stylesheet and JavaScript URLs to using a full domain name, that causes broken resource links for your users.

To work around this the Lift Off service now inserts a `VHXOriginalHost` cookie into each HTTP request it proxies. This
plugin looks for that cookie and, if detected, alters your blog's URL on the fly to match the
original Lift Off hostname stored in the cookie. It does this by inserting WordPress filters for

 * option_home
 * option_siteurl
 * theme\_root\_uri

Thus, when WordPress writes out your resource links, the correct URL is used.

For web nerds smarter than me: An earlier version of Lift Off inserted a special HTTP header instead of relying on a cookie, but we
found certain security hardened versions of PHP stripped out that header. Cookies, however, made it
through. Any other suggestions?