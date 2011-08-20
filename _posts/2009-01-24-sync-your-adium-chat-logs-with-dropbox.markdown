---
date: 2009-01-24 01:48:35
title: Sync Your Adium Chat Logs With Dropbox
layout: post
permalink: /blog/2009/01/sync-your-adium-chat-logs-with-dropbox/index.html
slug: sync-your-adium-chat-logs-with-dropbox
---
Here's a handy trick that will let you sync your <a href="http://adiumx.com">Adium</a> chat logs across multiple Macs using <a href="https://www.getdropbox.com/">Dropbox</a>. From a command line, `cd` into your Dropbox folder

{% highlight bash linenos %}
cd ~/Dropbox
{% endhighlight %}

and then

{% highlight bash linenos %}
ln -s ~/Library/Application\ Support/Adium\ 2.0/Users/Default/Logs "Adium Logs"
{% endhighlight %}

That will create a <a href="http://en.wikipedia.org/wiki/Symbolic_link">symlink</a> from your Dropbox folder to your Adium log directory. When syncing, Dropbox will follow this link and process your chat logs as if they were stored inside your Dropbox folder.

Do this on each Mac you want to sync. I have two Macs at home and another at work &mdash; it's worked like a charm so far. But, be sure to **backup your chat logs** the first time you do this just in case something goes wrong.