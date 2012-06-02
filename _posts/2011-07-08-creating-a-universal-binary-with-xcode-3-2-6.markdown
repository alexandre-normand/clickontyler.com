---
date: 2011-07-08 19:30:34
title: Creating a Universal Binary With Xcode 3.2.6
layout: post
permalink: /blog/2011/07/creating-a-universal-binary-with-xcode-3-2-6/index.html
slug: creating-a-universal-binary-with-xcode-3-2-6
---
Last week I released a minor update to [VirtualHostX](http://clickontyler.com/virtualhostx/). Shortly thereafter, my inbox was flooded with reports of an "unsupported architecture" error on launch. After a quick [`lipo`](http://developer.apple.com/library/mac/#documentation/Darwin/Reference/ManPages/man1/lipo.1.html) test I verified that somehow I had managed to build and ship the app as Intel only &mdash; no PowerPC support.

I went through my git revision history and was able to track down the error. From what I can tell, the Xcode 3.2.6 update removes the default universal binary option. That's fine for new projects, but I was completely taken by surprise to see it modify the build settings of an existing project.

Regardless, now that the ([once famous](http://www.youtube.com/watch?v=kcfGsOKXO5M)) universal binary checkbox is gone, here's how to add PowerPC support back.

In your target's build settings, change "Architectures" to "Other" and specify "ppc i386 x86_64".

![Universal Binary Settings]({{ site.cdn_url }}/blog/ubsettings.png)

_Note: It's entirely possible this whole episode was my fuck-up and not Xcode, but there are a bunch of similar reports online. So who knows? It certainly wasn't mentioned in the release notes._
