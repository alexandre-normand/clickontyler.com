---
date: 2011-02-25 13:56:40
title: Search Mac and iOS Documentation From Chrome's Omnibox
layout: post
permalink: /blog/2011/02/search-mac-and-ios-documentation-from-chromes-omnibox/index.html
slug: search-mac-and-ios-documentation-from-chromes-omnibox
---
Earlier this week, the [Chromium Blog](http://blog.chromium.org/2011/02/extending-omnibox.html) announced an official extension API for Chrome's omnibox (search bar). I've always loved keyboard driven interfaces &mdash; the command line, [Quicksilver](http://en.wikipedia.org/wiki/Quicksilver_(software\)), [Alfred](http://www.alfredapp.com/), etc &mdash; so, I immediately started thinking about what I could build with it.

My first idea was a documentation browser for Apple's Mac and iOS libraries. I'm always googling for class and framework names as a way to quickly jump to Apple's documentation site. The problem is that many times the [developer.apple.com](http://developer.apple.com) link is buried down the page, which means I waste time scanning for the link rather than just hitting return for the first search result.

This extension solves that problem by allowing you to type "ios" or "mac" followed by a keyword. It then presents and auto-completed dropdown of matching search results which take you directly to the relevant page on Apple's documentation site. Here's a screenshot after typing "ios UIImage"

![Sample iOS Chrome Search]({{ site.cdn_url }}/blog/chrome-apple.png)

For those among you wondering how I'm searching the Apple docs, I caught a lucky break. Apple's Mac and iOS [reference site](http://developer.apple.com/library/mac/navigation/) includes a small search box that autocompletes your queries. I tried sniffing the network traffic to see what web service they were using for suggestions (hoping to hook into that myself) but found they were showing search results without sending any data over the wire. A little more digging and I realized they were pre-fetching a dictionary of results as [a giant JSON file](http://developer.apple.com/library/mac/navigation/library.json) on page load. With that data &mdash; and a [sample Chrome extension](http://code.google.com/chrome/extensions/samples.html#omnibox) courtesy of Google &mdash; it took no time at all to connect all the pieces and get the extension working.

If you'd like to install the extension, just click here for [Mac](http://clickontyler.com/chrome/Mac.crx) and here for [iOS](http://clickontyler.com/chrome/iOS.crx). You're also welcome to download and improve the code yourself from the GitHub [project page](https://github.com/tylerhall/AppleDocsChromeExtension).