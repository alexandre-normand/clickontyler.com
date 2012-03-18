---
title: Schmooze.TV
description: Schmooze.TV takes an Easynews search, scrapes the results, and returns a podcast - which is really just an RSS feed with attachments.
layout: page
permalink: /schmooze-tv/index.html
slug: schmooze-tv
---
Like most of my projects, [Schmooze.TV](http://schmooze.tv) (formerly
[Easyschmooze](http://easyschmooze.com)) was born out of necessity.
Downloading TV shows from the internet was hard work. It meant keeping up with
prime-time schedules of my favorite shows and then scouring the net the day
after they air for a digital copy. Kudos to the networks for finally letting
users stream episodes from their website, but it's still a pain in the ass.
Every network has their own [crappy Flash site](http://dynamic.abc.go.com/streaming/landing?lid=ABCCOMGlobalMenu&amp;lpos=FEP)
for viewing &mdash; the video stream isn't high-def and, worse, it keeps me
tied to my browser window. There's no way to watch them on my flat-screen in
the living room. (Scratch that. It looks like [Boxee](http://www.boxee.tv/) + [Hulu](http://www.hulu.com/) support may change everything.)

What about iTunes? I'm willing to pay for commercial-free shows. How does the
math work out? Well, at $1.99 an episode, season three of _Grey's Anatomy_
costs $52. Luckily, you can buy the whole season at once (like a DVD box set)
for $35. That's nice, but it's still six dollars _more expensive_ than buying
the DVD's from Amazon. Don't get me started on the whole DRM issue. So what's the next alternative?

BitTorrent, maybe? I could use some sort of
[broadcatching](http://en.wikipedia.org/wiki/Broadcatching) setup &mdash;
automatically download the shows via BitTorrent using an RSS feed. That worked
great two years ago, but now [Comcast is actively slowing down BitTorrent traffic](http://arstechnica.com/news.ars/post/20071019-evidence-mounts-that-comcast-is-targeting-bittorrent-traffic.html).
That leaves one solution. [Usenet](http://en.wikipedia.org/wiki/Usenet).

Usenet - the last unmoderated bastion of the internet. Luckily, [Easynews](http://easynews.com), a $10/month Usenet provider,
automatically decodes and offers up [newsgroup binaries](http://en.wikipedia.org/wiki/Newsgroup#Binary_newsgroups) over the
web. All that's left is automating the downloads.

And that's where Schmooze.TV fits in. Schmooze.TV takes an Easynews search,
scrapes the results, and returns a
[podcast](http://en.wikipedia.org/wiki/Podcasting) &mdash; which is really
just an RSS feed with attachments. Any RSS reader
([NetNewsWire](http://www.newsgator.com/Individuals/NetNewsWire/), iTunes,
etc) can use these feeds to automatically download the attached files. In my
specific case, I've created Schmooze.TV RSS feeds for my favorite shows. Every
half-hour, the Mac mini attached to my flat-screen checks these feeds for new
episodes and downloads them in the background.

Schmooze also provides image previews and episode listings for all your shows. Plus, it keeps track of which ones you've watched and which are new.

It's like TiVo - without the TiVo.

(A fun side effect: Because I'm on the West coast, popular shows like _Lost_
are downloaded and available before they even air out here!)

[Further reading](http://arstechnica.com/news.ars/post/20080908-convenience-leads-prison-break-fans-to-shun-streams-for-p2p.html).