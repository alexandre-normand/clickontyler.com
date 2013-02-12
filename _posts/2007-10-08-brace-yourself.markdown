---
date: 2007-10-08 07:23:24
title: Brace Yourself
layout: post
permalink: /blog/2007/10/brace-yourself/index.html
slug: brace-yourself
---
Despite using [The Framework](http://code.google.com/p/simple-php-framework/)
at work, we still have conflicting coding styles within the office. I fall
squarely into the "braces are bad" camp. If an `if` statement
doesn't require braces to work, then it shouldn't have them. For example

{% highlight c  %}
if(something)
    do_this();
else
    do_that();
{% endhighlight %}

To me, that's good lookin' code. Why add clutter where it's not needed? The
argument I hear most often against this comes from
[Scott](http://sitening.com/about/scott/) - "because it saves time if you have
to go back and add another line." Fine. _Maybe_ it will save you a little
typing later. And _maybe_ it will even catch an error or two down the road.

That logic has never sat right with me, yet I could never articulate why
exactly. Today I found an old blog post by Wil Shipley that says what I've
felt in my heart all along. [Wil writes](http://www.wilshipley.com/blog/2005/07/pimp-my-code-part-3-gradient.html)

> I don't like extra braces around one-line if statements. I know,
> that way you can add extra lines any time you want and you don't have to think
> blah blah blah. But we're trying to make our code more READABLE. That's the
> key. You can spend 10 seconds adding braces if you end up writing another
> line. It's like you're slicing bread before every meal just in case you decide
> to make a sandwich, and then 90% of the time you just throw the bread
> away.

Bam! Take that all you brace enablers! That's sandwich logic.