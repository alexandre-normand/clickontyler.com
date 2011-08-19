---
date: 2009-12-27 11:27:38
title: OpenFeedback Part Deux
layout: post
permalink: /blog/2009/12/openfeedback-part-deux/index.html
slug: openfeedback-part-deux
---
A <a href="http://clickontyler.com/blog/2008/06/introducing-appcaster-openfeedback/">year and a half ago</a> I wrote about <a href="http://github.com/tylerhall/OpenFeedback">OpenFeedback</a>, an open source Cocoa framework for gathering feedback from your users. Initially, it was a sister project to Appcaster, my indie dashboard web app. Since then, Appcaster has grown up and morphed into <a href="http://github.com/tylerhall/Shine">Shine</a>, but OpenFeedback remained unchanged. Tonight, though, I took a few hours off from <a href="http://highwireapp.com">Highwire</a> and rewrote OpenFeedback from scratch.

The rewrite wasn't strictly necessary, but it certainly didn't hurt. The original code was hurried and in poor shape. I was able to cut the amount of code by 30% and give the dialog a more modern looking tab view.

<a href="http://cdn.tyler.fm/blog/of-bug.png"><img alt="" src="http://cdn.tyler.fm/blog/of-bug-sm.png" title="OpenFeedback Screenshot" class="alignnone" width="320" height="296" /></a>

Like before, adding OpenFeedback to your application is trivial -- there's no code required. You simply link your app against the framework and hook-up the appropriate actions in Interface Builder. In under five minutes you can have an elegant way to encourage users to ask questions, submit bug reports, and suggest new features.

My long term goal for OpenFeedback has always been for the Mac developer community to rally behind it, making it a drop-in standard much like <a href="http://sparkle.andymatuschak.org/">Sparkle</a>. That hasn't happened yet (obviously), but Shine has been getting some <a href="http://blog.andymatuschak.org/post/158054535/shine-an-indie-mac-dashboard">good</a> <a href="http://www.mac-developer-network.com/shows/podcasts/mdnshow/mdn011/">attention</a> lately. If I'm lucky, maybe some of that goodwill will carry over and help kickstart things along.

Like the rest of my open source projects, OpenFeedback is <a href="http://www.opensource.org/licenses/mit-license.php">MIT licensed</a> and <a href="http://github.com/tylerhall/OpenFeedback">available on GitHub</a>.