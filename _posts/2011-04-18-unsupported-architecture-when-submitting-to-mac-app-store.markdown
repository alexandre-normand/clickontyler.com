---
date: 2011-04-18 04:17:07
title: "Unsupported Architecture" When Submitting to Mac App Store
layout: post
permalink: /blog/2011/04/unsupported-architecture-when-submitting-to-mac-app-store/index.html
slug: unsupported-architecture-when-submitting-to-mac-app-store
---
For any Mac developers out there who are seeing the following rejection notice when submitting to the Mac App Store:

> _Unsupported Architecture - Application executables may support either or both of the Intel architectures_

Make sure you verify that any included frameworks are Intel only. You can do this using the [`lipo`](http://developer.apple.com/library/mac/#documentation/Darwin/Reference/ManPages/man1/lipo.1.html) command:

    lipo -info /path/to/SomeFramework.framework/Versions/A/SomeFramework

If the output lists anything other than `i386` or `x86_64` you'll get rejected.

This was particularly painful for me because it appears this check is only run when submitting a new version of your app &mdash; PPC framework binaries don't cause a rejection during the original app submission process. I thought I was going crazy since I had made no project changes since the first submission and running `lipo` on the app binary didn't return anything unusual. Hopefully this will save someone else the hour of head scratching I just went through.