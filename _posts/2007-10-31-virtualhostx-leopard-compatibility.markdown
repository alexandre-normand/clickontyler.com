---
date: 2007-10-31 07:37:21
title: VirtualHostX Leopard Compatibility
layout: post
permalink: /blog/2007/10/virtualhostx-leopard-compatibility/index.html
slug: virtualhostx-leopard-compatibility
---
**Update 11/1/07: VirtualHostX is now compatible with Mac OS X 10.5 Leopard. You can ignore the rest of this post :-)**

I've received many emails asking for a Leopard compatible version of
VirtualHostX. I'm happy to say it's __almost__ ready and will be a free
upgrade for all users.

I've decided to go ahead and post a beta version for anyone interested to
download. I've completed my testing and everything appears to be working well.
The only bug is that after adding or removing a virtual host, the program
doesn't automatically restart the web server (so your changes aren't getting
picked up). Until I get this feature working, it's easy to restart the server
yourself. Just go to System Preferences &rarr; Sharing and then uncheck and
check "Web Sharing". Here's a screen shot

[<img src="http://cdn.clickontyler.com/blog/leopard-sm.png"/>](http://cdn.clickontyler.com/blog/leopard.png)

Thanks for your patience, everyone.

### Technical Notes ###

For those who are wondering, the reason the current version of VHX doesn't
work on Leopard is because Apple upgraded the default Apache installation from
version 1.3 to 2. This is a great change - it definitely makes my job as a web
developer easier. VHX just needs to be taught where the Apache 2 config files
are stored and which changes to make.