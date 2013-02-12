---
date: 2011-04-20 19:10:58
title: Syncing Your Adium Chat Logs into Dropbox (again)
layout: post
permalink: /blog/2011/04/syncing-your-adium-chat-logs-into-dropbox-again/index.html
slug: syncing-your-adium-chat-logs-into-dropbox-again
---
[Two years ago](http://clickontyler.com/blog/2009/01/sync-your-adium-chat-logs-with-dropbox/) I posted some quick instructions on how I keep my Adium chat logs synced between Macs using Dropbox. I've tweaked my setup slightly since then. Here's my new approach.

First, if you already have Adium on multiple machines, copy all your logs over to a single Mac. You can merge the folders easily with an app like [Changes](http://connectedflow.com/changes/). Once you've got a canonical folder of all your combined chat logs, place it somewhere in your Dropbox. Then...

{% highlight bash  %}
cd "~/Library/Application Support/Adium 2.0/Users/Default/"
mv Logs ~/Desktop/LogsBackup
ln -s ~/Dropbox/Path/To/Adium/Logs/ Logs
{% endhighlight %}

Repeat the symlink steps on each Mac you want to sync.

This new approach keeps your files physically in Dropbox and a symlink in your Adium support folder pointing to their real location.

And that's it. Enjoy.

(Really though, this would be a lot easier if Adium had an option to choose where your chat logs are stored.)