---
date: 2008-01-02 07:27:08
title: How To Install PEAR in Mac OS X Leopard
layout: post
permalink: /blog/2008/01/how-to-install-pear-in-mac-os-x-leopard/index.html
slug: how-to-install-pear-in-mac-os-x-leopard
---
Unlike previous version of OS X, Leopard doesn't come with PHP's PEAR
repository installed by default. Luckily, installing is quick and painless.
From a command line:

{% highlight bash %}
curl http://pear.php.net/go-pear > go-pear.php
sudo php -q go-pear.php
{% endhighlight %}

Just press enter to select all the default choices _except for_ the installation directory. For that, use `/usr/local`. (Thanks, [Steve](http://hwork.tumblr.com/post/55657030/installing-php-pear-library-on-mac-osx-leopard).)

Next we need to modify our `php.ini` file to include the new PEAR files:

{% highlight bash %}
sudo cp /etc/php.ini.default /etc/php.ini
{% endhighlight %}

Edit `/etc/php.ini` and change

{% highlight bash %}
;include_path = ".:/php/includes"
{% endhighlight %}

to read

{% highlight bash %}
include_path = ".:/usr/local/share/pear"
{% endhighlight %}

Restart Apache and you're done!
