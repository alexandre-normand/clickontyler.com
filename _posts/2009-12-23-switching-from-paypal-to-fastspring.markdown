---
date: 2009-12-23 01:12:52
title: Switching From PayPal to FastSpring
layout: post
permalink: /blog/2009/12/switching-from-paypal-to-fastspring/index.html
slug: switching-from-paypal-to-fastspring
---
I've been wanting to switch my online store away from PayPal for quite a while now. Although there are a bunch of PayPal horror stories floating around the web (here's a <a href="http://blog.apparentsoft.com/business/124/is-paypal-good-for-your-microisv-business-a-short-paypal-horror-story/">recent one</a>), my main reason is to make my life simpler. As much as I like rolling my own solutions, it's too complicated to offer quantity discounts, coupon codes, and multiple currencies on top of the PayPal API alone. After a lot of investigation and much urging from friends, I made the switch Sunday night to <a href="http://www.fastspring.com/">FastSpring</a>.

I couldn't be happier.

In addition to what is quickly becoming legendary customer support, their e-commerce platform is a dream to work with. Without even reading the documentation, I was able to setup my store and fully integrate it with my backend license fulfillment system (<a href="http://github.com/tylerhall/Shine">Shine</a>) in under two hours. And that's doing things the complicated way. If I weren't such a control freak, I could have handed over the license generation and email confirmation responsibilities to their system as well.

The only tricky part I came across was creating a custom theme based on their default style. The documentation for creating a custom theme from scratch is well written and easy enough to follow. But, unfortunately, if all you want to do is add a custom header or make a small tweak to their default style, there's no easy way to do so, since they don't supply a "starter" theme to work from. But, with a little patience you can reverse engineer things easily enough and extract the assets you need. And that's just what I did to create the look and feel of <a href="https://sites.fastspring.com/clickontyler/instant/incoming">my store</a>. Once I had their basic layout copied, dropping in my Click On Tyler header was a snap.

You can download the default theme I put together, <a href="http://cdn.tyler.fm/blog/fastspring-default.zip">here</a>. Hopefully it'll save you some time. Or, better yet, maybe FastSpring would be kind enough to post it to their documentation page for everyone else to use as well.

**Update:** Did I say legendary customer support? I mean it. It's a little after 1am here, and FastSpring just emailed me a quick thank you along with their official default theme. Awesome work guys (and gals).