---
date: 2007-10-26 07:26:42
title: How to Enable PHP5 In Mac OS X Leopard
layout: post
permalink: /blog/2007/10/how-to-enable-php5-in-mac-os-x-leopard/index.html
slug: how-to-enable-php5-in-mac-os-x-leopard
---
I've seen a lot of visitors searching for information on enabling PHP5 in Mac
OS X Leopard. It turns out to be quite easy. Leopard ships with Apache 2 and
PHP 5 pre-installed. To enable PHP simply:

* Open your favorite text editor and edit `/private/etc/apache2/httpd.conf`
* Uncomment line number 114. It should read

{% highlight bash %}
`LoadModule php5_module    libexec/apache2/libphp5.so`
{% endhighlight %}

* Open System Preferences and go to Sharing
* Stop and then restart Web Sharing

That's it!

PS - If you want any easy way to setup and manage virtual hosts on your Mac,
check out [VirtualHostX](http://clickontyler.com/virtualhostx/).