---
date: 2009-08-30 20:08:08
title: How to Share Your Virtual Hosts on the Local Network
layout: post
permalink: /blog/2009/08/how-to-share-your-virtual-hosts-on-the-local-network/index.html
slug: how-to-share-your-virtual-hosts-on-the-local-network
---
**This article is out of date. VirtualHostX no longer supports local network sharing using Bonjour. That feature has been replaced with [a new and better way of sharing your virtual hosts](http://support.clickontyler.com/a/31/virtualhostx-xip-io-support/).**

One of the major new features of [VirtualHostX 2.0](http://clickontyler.com/virtualhostx/) is the ability to share your virtual hosts over the local network. Its implementation has caused some confusion among users (my fault), so I wanted to take a few minutes to explain how local sharing works and how to use it.

VirtualHostX is great for testing your development sites locally on your Mac, but what happens when you want to show those sites to someone else or test them on a Windows machine? Prior to version 2.0 you had two choices. You could, one, ask that person to step over to your screen or, two, manually edit the hosts file on their Mac (or virtual machine), which totally defeats the purpose of VirtualHostX.

Local network sharing tries to bridge this gap by using [Bonjour](http://en.wikipedia.org/wiki/Bonjour_%28software%29) to advertise your virtual host on the network. It's exactly the same thing as Apache's mod_bonjour extension, but, sadly, that doesn't play nice on Mac OS X. (If someone knows how to make it work, let me know :-)

There are two caveats to this method. One, since VirtualHostX is doing the service advertising, it only works as long as VHX is running. Sorry. Fortunately, VHX doesn't use many resources, so just close the main window and forget it's there :-) The other catch is that it makes your URL's ugly. Instead of the beautiful URL you chose like

`http://mysite.dev`

the people on your network will see something ugly like

`http://your.ip.address:9002`

In practice, this shouldn't affect your development if you structure your site properly, i.e. don't hardcode the domain name in your HTML.

Now that I've explained how it works and what to expect, how do you use it?

It's simple. Just check the "Share over local network" box and click "Apply Changes". (You have to click Apply Changes because VirtualHostX needs to modify your virtual host to make sharing work.) Then, in Safari on another Mac, select your site from the Bonjour section of the Bookmarks menu. If all goes well, you should be able to view your site.

But what about in other web browsers that don't have Bonjour built-in? Well, for Firefox, you'll need to install the [BonjourFoxy](http://www.bonjourfoxy.net/) extension. In Internet Explorer, you need to install [Bonjour for Windows](http://support.apple.com/downloads/Bonjour_for_Windows) from Apple. Both plugins are quick to install and easy to use.

Questions about this feature? Feel free to [contact me](http://clickontyler.com/contact/) any time.