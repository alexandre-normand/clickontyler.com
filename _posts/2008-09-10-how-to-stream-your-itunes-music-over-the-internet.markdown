---
date: 2008-09-10 01:27:40
title: How to Stream Your iTunes Music Over the Internet
layout: post
permalink: /blog/2008/09/how-to-stream-your-itunes-music-over-the-internet/index.html
slug: how-to-stream-your-itunes-music-over-the-internet
---
<p style="border:1px solid #000; background-color:lightyellow; padding:5px;"><strong>Update:</strong> Want to stream your iTunes music over the internet? Try <a href="http://clickontyler.com/highwire/">Highwire</a>! It streams your iTunes library and a whole lot more :-)</p>

I keep all of my iTunes music stored on a [Drobo](http://www.amazon.com/exec/obidos/ASIN/B000PDLZ1A/clickcom-20) attached to an [Airport](http://www.apple.com/airportextreme/) at home. This frees up valuable space on my laptop and lets me listen to it via Front Row on my TV as well. It's a much more convenient solution all around.

The only problem is that I lose access to my music when I'm on the road or at work. I've seen other services or 3rd party apps that let you stream your music online. They work well enough, but I've always thought it silly to pay for a feature that iTunes [_used to have_](http://www.macworld.com/article/24553/2003/05/itunes.html). In honor of iTunes' new 8.0 release this morning, here's my simple workaround.

First off, you'll need a Mac at home with iTunes open that is always connected to the net. In my case, that's a Mac Mini in our living room. It also needs to have "Remote Login" (ssh) enabled in System Preferences &rarr; Sharing.

Then, poke a hole in your router's firewall to that machine on TCP port 3689. Here's a screenshot of my router's settings:

<a href="{{ site.cdn_url }}/blog/setupasst.png" class="lightbox"><img src="{{ site.cdn_url }}/blog/setupasst-sm.20090206234712.png"/></a>

(Note: your computer's IP address might be different than mine.)

Then, with that done, anytime you want to listen to your music elsewhere, run these two commands in Terminal _on the Mac you're listening with_ &mdash; not your Mac at home.

{% highlight bash linenos %}
ssh your_username@your-home-ip-address -N -f -L 3689:your-home-ip-address:3689
{% endhighlight %}

That creates a tunnel from port 3689 on your local machine to port 3689 on your Mac at home. (That's why you needed to open the hole in your firewall.)

{% highlight bash linenos %}
mDNSProxyResponderPosix 127.0.0.1 squeal "My Music" _daap._tcp. 3689 &
{% endhighlight %}

That creates an iTunes Bonjour broadcast notification locally which points back to your Mac at home. In other words, it tricks your copy of iTunes into thinking there's a Mac nearby sharing its iTunes library. When iTunes tries to connect, the traffic is automatically rerouted to your other Mac.

_Sidenote: if you don't have the mDNSProxyResponderPosix command installed on your Mac, I have download links at the bottom of this post._

So that's it. No need for third party software. When you open iTunes, you should see your music library appear in the "Shared" section of the sidebar. (Much to my excitement, the newly announced Genius playlists appear as well!) You can close the Terminal window once you've connected to your music library. (The mDNSProxyResponder command needs to stay active until then.)

### Making it Better ###

To speed things up a bit, I'd put those two command into a shell script and place it in your ~/Library/Scripts folder. I call mine `music-tunnel`. That way, you can run that one command and have everything up and running automatically.

Or, if you're feeling adventurous, you could wrap the whole thing inside a simple Cocoa app with a nice On / Off button. But that's a project for another day...

### Downloading mDNSProxyResponderPosix ###

Here's a binary download of the [mDNSProxyResponderPosix]({{ site.cdn_url }}/blog/mDNSProxyResponderPosix) command for Intel. Place it somewhere in your path. And here's [the source](http://www.opensource.apple.com/projects/rendezvous/source/Rendezvous.tar.gz) if you'd like to compile it yourself for PowerPC.