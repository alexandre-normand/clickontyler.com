---
date: 2011-03-10 23:08:36
title: Highwire Goes Open Source
layout: post
permalink: /blog/2011/03/highwire-goes-open-source/index.html
slug: highwire-goes-open-source
---
Today is bittersweet.

Since first sketching out the idea two years ago, [Highwire](http://clickontyler.com/highwire/) has been my favorite Mac app. I use it all the time to listen to my iTunes library remotely, access my files while at work, and even launch screen sharing on my home iMac from a coffee shop. So, it pains me to announce that, as of today, I'm officially discontinuing Highwire and no longer offering it for sale.

### Why? ###

Why discontinue Highwire? The answer, while a little crass, is simple. The app just didn't make any money. After a little over a year on the market (about the same length of time as [Nottingham](http://clickontyler.com/nottingham/)), I'm selling approximately one copy of Highwire for every fifty copies of Nottingham. Its sales look even worse when you add [Incoming!](http://clickontyler.com/incoming/) and [VirtualHostX](http://clickontyler.com/virtualhostx/) to the totals. The sad truth is now that Highwire has reached the point of doing everything I need, without money to support its development there's no practical reason to continue adding new features or bug fixes. In addition to [my day job](http://twitter.com/mercmedia), the money I generate from my Mac apps pay the mortgage. And with only so much free time, I have to ensure it's spent productively.

To be honest, Highwire's dire lack of sales is partly my fault. I definitely could have been more pro-active in marketing and explaining it to users during the last year. Also, releasing it so soon after Nottingham (which took off like a rocket) all but guaranteed it would receive at most half of my attention &mdash; the reality being it received virtually none beyond a few bug fixes after the initial release.

### What about existing customers? ###

If Highwire were an app that completely stood on its own without relying on a server component, we'd be in a different situation where I could, in good faith, just remove it from the website. Unfortunately, the server requirement complicates matters.

So, here's the deal.

I promise to keep the server that coordinates Highwire up and running through July 1, 2012. At that time I may discontinue the service completely or I may keep it up indefinitely since I also use Highwire myself. But I can't make any promises beyond that date. July 1, 2012 is the last day that I guarantee things will continue to work.

In addition to maintaining the server, I will still happily offer email support for existing customers through that date as I have always done.

If any existing Highwire users have questions about this announcement, please feel free to [email me directly](http://clickontyler.com/contact/) and I'll do my best to resolve any issues you have.

### The Good News ###

The good news is that I've open-sourced [Highwire on GitHub](https://github.com/tylerhall/Highwire) &mdash; both the Mac app itself and the server side PHP code which coordinates everything.

If you're tech-inclined, have a server capable of running PHP, and know how to download Xcode, it shouldn't be too difficult to build (and improve!) your own copy of Highwire. I would be absolutely thrilled to see another Mac developer take on the project and make the app even better. And since I've released the code under the MIT License, feel free to sell your improved version. (Just don't use the name "Highwire" or its app icon in whatever you create.)

If you have any questions about the code, feel free to [ask](http://clickontyler.com/contact/).