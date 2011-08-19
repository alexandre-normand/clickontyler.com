---
date: 2011-07-12 19:35:18
title: Automatically Reposition the iOS Simulator on Screen
layout: post
permalink: /blog/2011/07/automatically-reposition-the-ios-simulator-on-screen/index.html
slug: automatically-reposition-the-ios-simulator-on-screen
---
If you work with two monitors of different sizes, Xcode has an annoying bug of launching the iOS Simulator partially off screen &mdash; forcing you to manually drag it into position using the mouse. It's not that bad the first time, but after a full eight hour working day with hundreds of launches, it gets very tedious.

Luckily, we can solve this with Xcode 4's new "Behavior" settings and a little AppleScript.

Open up your favorite text editor and create the following script:

<script src="https://gist.github.com/1078783.js?file=gistfile1.bash"></script>

Where where {-864, 134} are the {X, Y} coordinates you'd like the simulator positioned at.

Save the script somewhere appropriate and select it as a new "Run" command in Xcode's "Run Starts" behavior.

![Xcode Run Behavior](http://cdn.tyler.fm/blog/run-behavior.png)