---
date: 2007-08-27 07:34:15
title: Say Hello to VirtualHostX
layout: post
permalink: /blog/2007/08/say-hello-to-virtualhostx/index.html
slug: say-hello-to-virtualhostx
---
Programmers are selfish. As a general rule we build applications that __we__
want to use - not that we necessarily think will sell.
[Snipplr](http://snipplr.com) came about because I wanted a place where my
co-workers and I could share our code. [Easyschmooze](http://easyschmooze.com)
arrived because, well, I'll just say it fills a need. I'm willing to bet
nearly every bit of open-source software was written because the programmer
couldn't find a solution elsewhere.

Today I'm introducing a new Mac app that I've been meaning to build for almost
two years now - [VirtualHostX](http://clickontyler.com/virtualhostx/). It's a
simple way to setup virtual hosts on your Mac. Pick a domain name, select the
directory where your files are stored, and your done. VirtualHostX
automatically configures Apache, modifies your hosts file, and gracefully
restarts the web server. Adding and removing virtual hosts couldn't be easier.

That's great, but what's the point?

In real life I'm a web developer. If I had my way I'd only work on one client
website at a time. Unfortunately, the world doesn't work like that. Projects
overlap, clients change their mind, and there's a minimum of two emergencies
each week. That means I need a way to test multiple websites at once. Some
developers nest all of their projects inside their `localhost`
directory. That's fine to do if you __always__ use relative links in your
code, but that's not practical. You can't really debug a site that way. Other
developers build and test their code on the live server. That's just wrong on
so many levels it makes my head spin.

Instead, the ideal solution is to setup a virtual host for each project. Say
you're building a website for a client who wants to show off their collection
of antique Mountain Dew bottles at http://greg-loves-mountain-dew.com Using
VirtualHostX you can setup a virtual host called http://mountain-dew.site that
__only you__ can access on your machine. This lets you test your code as if it
were running on a real web server online. Setup a virtual host for each
project and suddenly life is good again.

Back to my original point, programmers are selfish. I built VirtualHostX
because I wanted it. There's no black magic involved in setting up virtual
hosts on your Mac. It's pretty simple and directions are available all over
the net. The problem is that it's tedious and requires the user know their way
around the command line. (That's ok for programmers, but designers tend to shy
away from anything involving a terminal window.) I knew a dedicated Cocoa app
was the way to go - something simple anyone could use. Three weeks and a lot
of googling later, voila! VirtualHostX was born. Say hello.

[More about VirtualHostX](http://clickontyler.com/virtualhostx/).