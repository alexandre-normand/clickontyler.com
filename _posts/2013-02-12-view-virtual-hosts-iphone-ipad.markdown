---
date: 2013-02-12 20:57:14
title: How to View Your Virtual Hosts on Your iPhone and iPad
layout: post
permalink: /blog/2013/02/view-virtual-hosts-iphone-ipad/index.html
slug: view-virtual-hosts-iphone-ipad
---
Today, [Shawn Blanc](http://shawnblanc.net/2013/02/stokes-mamp/) linked to [a post by Noah Stokes](http://esbueno.noahstokes.com/post/42930947028/test-your-local-web-sites-on-your-ipad-or-iphone-using) that explained how to test a locally hosted web site on your iOS device using MAMP Pro. His solution was to set MAMP's `localhost` directory to point to the web site folder you want to view on your iOS device. Then, just browse to your Mac's IP address in Mobile Safari and voilà.

That's a fine solution, but because you're accessing your web site via your Mac's IP address, you're limited to testing one web site at a time. You have to go into MAMP and change your document root to a new directory any time you want to test a different site.

I'd like to show you a more robust solution that uses a new feature in [VirtualHostX 4.0](http://clickontyler.com/virtualhostx/). With it, you can test an unlimited number of web sites at the same time from your iOS devices. And, as an added bonus, anyone on your local network (coworkers perhaps?) can access your development sites, too. Here's how...

First, fire up your copy of VirtualHostX and create a new virtual host for each of your local web sites. Once done, this will let you preview your sites locally using a custom domain name such as `http://my-website.dev`. Like [Shawn says](http://shawnblanc.net/2011/09/virtualhostx/), "as any professional Web developer knows, doing your development locally is simply how it’s done."

Once you've got your virtual hosts working, sharing them to your iDevice is super simple. Just tick the "Local Domain Name" checkbox and click "Apply Changes" one more time. (Technically speaking, this will create a wildcard `ServerAlias` for your virtual host that you can use to access it from other machines on your local network.) But, the technical details don't really matter. What's important is the end result. Next to that magic checkbox, VirtualHostX gives you a *Local Domain Name* you can type into Mobile Safari on your iPhone or iPad to view your site.

Give it a try. It really is magical the first time you see it work.

![VirtualHostX 4.0 Local Domain Name](http://cdn.clickontyler.com/blog/vhx4-ldn.jpg)

But, we're not done yet. One of my main goals with the latest version of VirtualHostX was to make sharing your web sites as drop-dead easy as possible. That local domain name you just typed into Mobile Safari? It's kind of long and ugly, isn't it? We can do better. So...

<img src="http://gallery.mailchimp.com/ac342b5d7c9307641ed81ad42/images/iphone_big.jpg" style="float:left;margin-right:1em;">

Open up the App Store on your iDevice and download the new [VirtualHostX companion app](https://itunes.apple.com/us/app/virtualhostx/id597179860?ls=1&mt=8). Don't worry, it's free.

Open the app, and, as long as you're on the same local wifi network, the app will automatically discover your shared virtual hosts and give you a one-tap way to view them in Mobile Safari. Now there's no need to remember your site's local domain name or even a reason to type it in. It's all automatic!


Like I said above, Noah's method works great if you only have one website to test. But, if you're developing more than one web site at a time (who isn't?), I think VirtualHostX is the way to go. Clearly I'm biased, but as I've been advocating for years now, skip MAMP Pro and just go with regular MAMP + VirtualHostX. I think the added benefit of sharing your virtual hosts is well worth it.

<div style="clear:left;">&nbsp;</div>
