---
title: PHP Growl Notifications
description: PHP-Growl is a PHP class that makes sending Growl notifications over a network easy.
layout: page
permalink: /php-growl/index.html
slug: php-growl
---
PHP-Growl is a PHP class that makes sending
[Growl](http://growl.info/) notifications over a network easy. The code is
released under the [MIT Open Source License](http://www.opensource.org/licenses/mit-license.php)
and hosted on [GitHub](http://github.com/tylerhall/php-growl/). Basically, that means
you're free to use the code in any way you like - including commercial
projects. The only catch is that I'm not liable for anything that goes wrong
as a result of you using my code. Oh, and if you do use it, could you send me
an email telling me about it? I love learning about other people using
PHP-Growl.

### Growl Pepper ###

I originally wrote this code as part of my [Growl Pepper plugin](http://www.haveamint.com/peppermill/pepper/49/growl/)
for Shaun Innman's [Mint stats tracking software](http://www.haveamint.com/). Anytime
someone visited a page on my website the server would send a Growl
notification to my computer. It's not very practical, but it is fun to see
visitors on your site in real-time.</p>

Using the code is pretty simple:

    $growl = new Growl($some_ip_address, 'growl password');
    
    // Register with the remote machine.
    // You only need to do this once.
    $growl->register();

    // Send your message
    $growl->notify("My Alert", "New Website Visitor", "Here's the body text");


If all goes well (and you have UDP port 9887 open in your firewall settings) your Growl notification should go through.

[Download the PHP-Growl source code](http://github.com/tylerhall/php-growl/).

View the [Growl Network Protocol Format](http://growl.info/documentation/developer/protocol.php).