---
date: 2007-10-25 07:30:03
title: Leopard First Impressions
layout: post
permalink: /blog/2007/10/leopard-first-impressions/index.html
slug: leopard-first-impressions
---
* If you squint your eyes and look to the side of your monitor, Leopard is actually quite attractive.
  * VirtualHostX is broken at the moment. That'll be fixed as soon as I roll out Apache 2 support.
  * The new iCal is _hot_. I love that there is now a physical separation between local and subscribed calendars.
  * I just noticed all pop-up menus have rounded corners - feels very Web 2.0 inspired.
  * My PHP5/MySQL install got borked. Solution:
    * `sudo mkdir /var/mysql`
    * `sudo ln -s /tmp/mysql.sock /var/mysql/mysql.sock`
    * `Enable PHP5 /private/etc/apache2/httpd.conf` (line 114)
    * `Add your vhosts to /private/etc/apache2/extra/httpd-vhosts.conf`
  * Why does the [Finder sidebar]({{ site.cdn_url }}/blog/105home.png) use the traditional special folder icons when the actual folder icons are the ugly-cant-tell-them-apart-ones? (Can't wait for [Candybar](http://www.panic.com/candybar/) to start working.)
  * When you look at the translucent menu bar by itself, it's sort of nice. But if there's a window pushed up against it the transparency really stands out and looks strange. It's not a good contrast.
  * I just used iChat's new screen sharing function to help a co-worker from across the room. Normally I have to get up and walk over there. Not any more!
  * What the crap?? Command-tabbing doesn't rotate back around when you reach the end of the application list. Wait. False alarm. It does - just not when you use the arrow keys to move through the list.

I'll be posting more initial thoughts throughout the day.