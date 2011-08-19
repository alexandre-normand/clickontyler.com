---
date: 2008-08-15 03:18:39
title: Dial a Phone Number Using Grand Central and PHP
layout: post
permalink: /blog/2008/08/dial-a-phone-number-using-grand-central-and-php/index.html
slug: dial-a-phone-number-using-grand-central-and-php
---
If you're lucky enough to have a [Grand Central](http://grandcentral.com) account, here's a quick [PHP class](http://github.com/tylerhall/php-grandcentral-dialer/) that will login to your account and dial a phone number. This is probably one of the more random bits of code I've ever written, but I think it's useful.

    $gc = new GrandCentral('gc_username', 'gc_password');
    $gc->call($your_number, $their_number);

And that's it. Grand Central will call `$your_number` and connect you to `$their_number`.

So, you can dial phone numbers from PHP. Now what?

Well, for starters, here's an AppleScript [Address Book plugin](http://code.google.com/p/tylerhall/source/browse/trunk/grandcentral/gcdialer.applescript) that will let you dial a contact from your Mac. Or, if you're like me and have lots of conference calls each week, you can attach a script to your iCal events to dial you into the conference number a minute or two prior to the call start time.

As usual, the code is MIT Licensed and available in [GitHub](http://github.com/tylerhall/php-grandcentral-dialer/).

[Contact me](http://clickontyler.com/contact/) if you have any questions.