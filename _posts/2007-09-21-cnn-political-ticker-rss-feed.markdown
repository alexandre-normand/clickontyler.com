---
date: 2007-09-21 07:24:04
title: Create a CNN Political Ticker RSS Feed
layout: post
permalink: /blog/2007/09/cnn-political-ticker-rss-feed/index.html
slug: cnn-political-ticker-rss-feed
---
One of my biggest pet peeves is when a website I visit doesn't provide an RSS
feed or only offers partial content (i.e. they want you to visit their website
to read the whole article). Sometimes you can simply email the owner and
they'll turn on full feeds or even create an RSS feed for you, but most of the
time you're stuck. The only solution is to create your own feed by scraping
their content. It's not ideal, but it works.

[CNN's Political Ticker](http://politicalticker.blogs.cnn.com/) is good
example of this problem. It's a casual news feed of the latest US political
stories on CNN. It's a good overview of the day's news. While they do offer an
RSS feed, like most of CNN.com's content it's crippled. You have to click
through to their site to see the full story. Let's fix this.

The basic steps in scraping a site are:

  * Pull-down a copy of the content to scrape. In this case, the [political ticker homepage](http://politicalticker.blogs.cnn.com/).
  * Create a regular expression that will match the items you want to show in your new RSS feed. In this example we're grabbing each individual news item.</li> <li>Then, format the extracted data into an RSS item and serve it back to the user.

That's a basic overview of the process. You can see the [completed source code here](http://code.google.com/p/tylerhall/source/browse/trunk/cnn-political-ticker-rss/feed.php).

One last thing: make sure you implement some sort of caching scheme in your
code so you don't hammer their website. Be polite when you scrape. Wait at
least five minutes between requests.