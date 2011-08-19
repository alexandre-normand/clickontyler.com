---
date: 2009-01-05 04:35:35
title: Forward Your Growl Notifications to Twitter
layout: post
permalink: /blog/2009/01/forward-your-growl-notifications-to-twitter/index.html
slug: forward-your-growl-notifications-to-twitter
---
I've got three Macs that I regularly use. One at work, a laptop for personal use, and a Mac Mini connected to our living room TV. I use [Growl](http://growl.info) on all three &mdash; it's so ingrained in my workflow (IM notifications, new emails, background tasks) that I often forget it's not a part of OS X.

Keeping track of notifications on your local machine is easy &mdash; they just appear &mdash; but for computers in another room (or timezone even) it becomes trickier. Growl has support for sending notifications over a network (I've written [some PHP code](http://clickontyler.com/php-growl/) to send them), but they don't work beyond your LAN unless you want to mess with firewalls and changing IP addresses.

While that can work if setup correctly, it can be somewhat annoying. It doesn't matter if you have [broadband packages from o2](http://www.o2.co.uk/broadband/) or any other ISP, it'll still cause headaches in the end. Luckily, with a little help from Twitter, we can route around these problems.

For a long time I've wanted a way to receive Growl messages from any of my machines no matter where I am. A few months back I even created a (now aborted) fork of Growl that integrated with Amazon's [Simple Queue Service](http://www.amazonaws.com/sqs/). It worked ok, but it was kludgy and not something that the average Mac user would want to spend time configuring.

Last night it dawned on me that Twitter was exactly the sort of distributed notification system that I was looking for. All I needed was a way to forward my Growl notifications to a Twitter account. (Or _tweet_ them as all the cool kids say.) I did some Googling and found lots of people using Growl to _show_ new tweets but nothing that would go the opposite direction.

So, I sat down and began looking through the source for [Growl's display plugin protocol](https://www.bitbucket.org/boredzo/growl/src/tip/Plugins/Displays/). Two cans of Red Bull and four hours later, I saw my first Growl message appear in my Twitter timeline.

### How Does It Work ###

Simple. [Download this Growl plugin](http://cdn.tyler.fm/blog/Twitter.growlView.zip), unzip it, and double-click to install. You should then see a new style called "Twitter" under the "Display Options" in Growl.

<a href="http://cdn.tyler.fm/blog/growltwitter-ss1.png" class="lightbox"><img src="http://cdn.tyler.fm/blog/growltwitter-ss1-sm.20090206234322.png"></a>

Just fill in your Twitter username and password. You can also choose a prefix that will be added to the front of each tweet (@username for example).

### A Few Examples ###

Growl is super customizable. You could set Twitter to be your default display style, but that would be too noisy. A better solution would be to set only certain apps to send notifications via Twitter &mdash; or only specific messages within those apps.

For example, I use my Mac Mini to download torrents using [Transmission](http://www.transmissionbt.com/), which supports Growl. I configured Growl to tweet whenever a download completes.

<a href="http://cdn.tyler.fm/blog/growltwitter-ss2.png" class="lightbox"><img src="http://cdn.tyler.fm/blog/growltwitter-ss2-sm.20090206234429.png"></a>

My Mac at work does a full [SuperDuper](http://www.shirt-pocket.com/SuperDuper/SuperDuperDescription.html) backup each night. I configured it to tweet whenever a backup _fails_.

Both of my parents have MacBooks. Even though we're 3,000 miles apart, it's still my job to keep them running smoothly. I setup nightly cron jobs on their machines which check for low disk space, pending Apple software updates, and other maintenance tasks that they might not think to check. Any problems are growled and posted to Twitter.

### Final Thoughts ###

I've setup each Mac to send its Growl notifications to its own Twitter account. That keeps the notifications separate between machines. Then, I protect their updates (I don't want strangers viewing my growl logs), and subscribe to them via [my primary Twitter account](http://twitter.com/tylerhall). All of the tweets from each machine appear in my timeline.

And that's when the power of Twitter really shines &mdash; because those updates are portable.

I can view them on the web, on my phone, I can subscribe to them via RSS, have them sent to my phone as SMS messages, or mix and mash them using any one of the many Twitter add-on services. You could even use [Yahoo! Pipes](http://pipes.yahoo.com/pipes/) to filter the messages.

My point is that by sending your Growl messages to Twitter, you've suddenly freed up a ton of data that had been stuck on your local machine and combined it into a portable format you can take anywhere.

Thanks to [Matt Gemmell](http://mattgemmell.com/) for [MGTwitterEngine](http://svn.cocoasourcecode.com/MGTwitterEngine/) which does the Twitter heavy lifting in this plugin.

### Download ###

Download [Growl Twitter](http://cdn.tyler.fm/blog/Twitter.growlView.zip).