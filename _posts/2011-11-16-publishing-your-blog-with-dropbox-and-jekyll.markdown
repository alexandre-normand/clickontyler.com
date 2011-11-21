---
date: 2011-11-16 15:16:38
title: Publishing Your Blog with Dropbox and Jekyll
layout: post
permalink: /blog/2011/11/publishing-your-blog-with-dropbox-and-jekyll/index.html
slug: publishing-your-blog-with-dropbox-and-jekyll
---
Back in August I wrote about my experience [switching this blog from WordPress to Jekyll](http://clickontyler.com/blog/2011/08/switching-from-wordpress-to-jekyll/). Three months in, I'm happy to report everything is going swimmingly. I survived a few high traffic moments from Hacker News and was thrilled to see the site stay up even when I managed to break MySQL on the server.

The only issue I've faced is a higher barrier to writing new content. Switching away from WordPress means I had to give up their web interface and one-click posting. Instead, my workflow is

1. Write a post using some text editor - typically TextMate on my laptop.
2. Preview and double-check that the rendered Markdown content is correct.
3. Commit the file into git.
4. ssh into my web server
5. git pull the new post
6. Run jekyll

As you might imagine, steps three through six are a little annoying. They're just invasive enough that I dread &mdash; just a little bit &mdash; adding new content and *especially* correcting typos.

What I want is something more automatic. Thanks to Dropbox and a little server side magic, I've got a solution that completely eliminates those last four steps. And while I know I'm not the first person to come up with the following solution (although I'm having trouble finding another example online at the moment), I do want to document my setup both for my sake and anyone else looking for the steps involved.

Here's what's going to happen:

1. Write a post using markdown and save it into the `_posts` folder of my Jekyll site stored in Dropbox.
2. The file gets synced to my server which is also running Dropbox.
3. A cron job on the server notices the new file and automatically runs Jekyll, updating my site with the new content.

Other than actually writing the content, everything else is automatic. The whole system took about twenty minutes to setup. Here's how...

### Configuring Dropbox ###

I'm assuming you've already got a Jekyll site built and stored somewhere in Dropbox. The next step is to share that folder via Dropbox with your server. Installing Dropbox on Ubuntu is relatively painless if you know your way around the command line. Per their [instructions](https://www.dropbox.com/install?os=lnx)

{% highlight bash %}
cd ~ && wget -O - http://www.dropbox.com/download?plat=lnx.x86_64 | tar xzf -
{% endhighlight %}

Then, you'll want to download their helper script that lets you start/stop the Dropbox daemon. It's linked at the bottom of their Linux installer page.

Once you've got Dropbox installed, I'd suggest creating a new account just for your server. This lets you selectively share folders of content from your primary Dropbox account. This is important for a couple reasons. First off, I've got 60GB of data in Drobox &mdash; that's way more than my small Rackspace cloud instance can handle. Also, I simply don't feel comfortable having so much personal information just sitting around on my server.

With the software installed and running, use Dropbox to share your Jekyll folder with your new server account and wait for it to sync.

### Watching for Changes ###

The next step is putting in place a process to automatically watch for changes to files in our Jekyll `_posts` folder and then rebuild the site. I'm sure there are a bunch of tools available on Linux to handle this; the first one I ran across was [`incron`](http://inotify.aiken.cz/?section=incron&page=about&lang=en). It was surprisingly easy to setup. Like a cron job, you give it a command to run and when to run it. But instead of a date/time, you give it a path to watch and which filesystem events to listen for. Installing was simple:

{% highlight bash %}
sudo apt-get install incron
{% endhighlight %}

Then, you need to give your user account permission to run incron jobs.

{% highlight bash %}
sudo vim /etc/incron.allow
{% endhighlight %}

and add your user account name to the list &mdash; save your changes.

Finally, add your job via

{% highlight bash %}
icrontab -e
{% endhighlight %}

The icrontab jon syntax looks like

`<path to watch> <file system event conditions> <command>`

On my system, that ends up looking like

{% highlight bash %}
/path/to/Dropbox/jekyll/_posts IN_MODIFY,IN_DELETE,IN_CLOSE_WRITE,IN_MOVE /path/to/jekyll /path/to/Dropbox/jekyll /var/www/clickontyler.com
{% endhighlight %}

From then on, any changes to your `_posts` folder should automatically trigger a rebuild of your site.