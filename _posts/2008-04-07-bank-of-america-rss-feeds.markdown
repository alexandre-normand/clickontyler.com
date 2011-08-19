---
date: 2008-04-07 07:22:31
title: Bank of America RSS Feeds
layout: post
permalink: /blog/2008/04/bank-of-america-rss-feeds/index.html
slug: bank-of-america-rss-feeds
---
[Bank of America](http://www.bankofamerica.com) has a
great online banking system. It's why I switched to them three years ago. I've
often wanted them to provide an RSS feed of recent transactions on my account
&mdash; I've emailed them multiple times, but no such luck. So, today I
finally got around to doing what I always do &mdash; I wrote a script to
scrape their website and return the data in the format I want.

Honestly, it's one of the more complex scraping scripts I've written. Their
sign-on process involves login tokens, variable URLs, and three challenge
questions in addition to entering your passcode. In the end I think it was
worth the time. Seeing my cleared and pending transactions in
[NetNewsWire](http://www.newsgator.com/individuals/netnewswire/) is *awesome*.

Before I give out the link to the script, I want to take a moment and
emphasize that this could be a potentially *huge* security risk. This script
requires you store your login credentials and the answer to all three of your
security questions in plain text. I recommend only running it locally on your
own computer. Store it on a public web server at your own risk! Definitely
don't store it on a shared host!!

You can [download the script here](http://tylerhall.googlecode.com/svn/trunk/bank-of-america/rss.php).

Keep an eye out on this blog &mdash; I'll post updates if/when Bank of America
modifies their site and my scraping code breaks. Feel free to [email me](http://clickontyler.com/contact/) with any questions.