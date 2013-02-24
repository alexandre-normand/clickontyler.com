---
date: 2009-03-26 18:31:02
title: Google Voice Dialer
layout: post
permalink: /blog/2009/03/google-voice-dialer/index.html
slug: google-voice-dialer
---
Last year I posted a PHP script that lets you [dial phone numbers using Grand Central](http://clickontyler.com/blog/2008/08/dial-a-phone-number-using-grand-central-and-php/). I updated it this morning to support [Google Voice](http://www.google.com/voice/about) as well.

The syntax is the same

{% highlight php %}
<?PHP
$gv = new GoogleVoice('you@gmail.com', 'password');
$gv->call($your_number, $their_number);
{% endhighlight %}

You can grab the code from my [google-voice-dialer project](http://github.com/tylerhall/google-voice-dialer/tree/master) on GitHub.