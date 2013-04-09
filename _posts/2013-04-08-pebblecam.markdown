---
date: 2013-04-08 20:57:14
title: PebbleCam
layout: post
permalink: /blog/2013/04/pebblecam/index.html
slug: pebblecam
---
My [Pebble](http://getpebble.com/) arrived last week and I've been geeking out over it ever since. I've been thinking a lot about wearable tech the last few years and signed up immediately when Pebble was first announced last year. (I can't wait to see what Apple can do in this space.)

So with a full week of Pebble use under my belt, I decided it was time to do something super geeky with my new smart watch. PebbleCam is the result of a few hours this afternoon tinkering around in Xcode.

In a nutshell, PebbleCam is an iPhone app that lets you use your Pebble as a remote shutter for the phone's camera. You launch the app and it displays the camera. Prop the phone up, put it on a tripod, whatever, then get you and your friends in to frame. As long as you're in Bluetooth range, clicking the "play/pause" button on your Pebble will snap a photo and save it to your phone's photo library.

How does it work?

Currently, there's no way to communicate from Pebble back to the phone except for the music control buttons. To take advantage of that, the app plays a blank MP3 file in the background and then listens for any remote control events (play, pause, next, previous) to come in via the Pebble. When a play/pause event occurs, the app snaps a photo and saves it to your phone's photo library.

The code is fairly straightforward and is [available on GitHub](https://github.com/tylerhall/PebbleCam). Anyone in the iOS developer program can download the code and install the app on their phone. And for you jailbreakers out there, I've committed an `.ipa` file [you can download](https://github.com/tylerhall/PebbleCam/blob/master/PebbleCam.ipa?raw=true)

In the next update, I plan on assigning the next track button to change the camera from rear-facing to front-facing. That leaves one button left (previous track) to play with. Any ideas on what I could assign it to?

If there is enough interest, I'm not opposed to submitting the app to Apple for inclusion in the App Store. (I don't see any reason why it wouldn't be accepted.) However, before I do that, I'd need someone to create an icon for the app. Right now I'm using the official Pebble iOS app icon with a camera photoshopped on top.

Here's a video of the app in action.

<object width="560" height="315"><param name="movie" value="http://www.youtube.com/v/_1zl_Hk9_xc?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/_1zl_Hk9_xc?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>