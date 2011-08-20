---
date: 2008-11-14 04:27:44
title: Parse Command Line Arguments in PHP
layout: post
permalink: /blog/2008/11/parse-command-line-arguments-in-php/index.html
slug: parse-command-line-arguments-in-php
---
This afternoon I needed an easy way to upload files to Amazon S3 and set specific headers on them. I've built one-off scripts like this in the past, but this time I wanted to generalize the problem into a reusable shell command.

I pulled in some code from [PHP-AWS](http://code.google.com/p/php-aws/) and got it working fairly quickly. However, I got swamped with an ugly nest of `if` and `switch` statements when I began adding support for multiple arguments and switches. A quick Google search didn't find any ready-made PHP solutions, so I rolled my own.

It's a small class &mdash; about 60 lines. It could easily be turned into a single function instead, but I like using classes as ad-hoc namespaces. Anyway, it's fairly robust for a twenty minute solution. Here are a few examples of the syntax it supports.

{% highlight bash linenos %}
cmd -a -b -c // Single letter flags

cmd -abc // Same as above
{% endhighlight %}

Beyond setting a few flags, you can also assign values to those flags.

{% highlight bash linenos %}
cmd -a foobar.jpg -bc
{% endhighlight %}

In this case, `b` and `c` are set just like the previous example. And `a` is set to the value `foobar.jpg` as you'd expect.

Double-dash, long names are also supported.

{% highlight bash linenos %}
cmd --some-flag
cmd --another-flag=charlie // You can use an equal sign
cmd --another-flag charlie // Or not. It's up to you.
{% endhighlight %}

And those can be mixed with the single dash variants.

{% highlight  linenos %}
cmd -ab --bigflag=foo -c bar apricot orange
{% endhighlight %}

So, `a` and `b` are set. `bigflag` is set to "foo" and `c` is set to "bar". "apricot" and "orange" will appear as arguments not associated with any specific flag.

My point is that you can use nearly any standard Unix convention.

So, given that last example, here's how you'd parse it using the PHP class.

{% highlight php linenos %}
<?PHP
    $args = new Args();
    
    if($args->flag('a'))
        // -a was set, so do something
    
    if($args->flag('bigflag') == 'foo')
        // --bigflag was set to 'foo'
    
    foreach($args->args as $arg)
        // Do something with each argument.
        // Args will be bar, apricot, and orange.
{% endhighlight %}

So that's it. The class doesn't assume much. It just picks out what you give it. It's up to you, the programmer, to interpret those results.

As always, the code is released under the MIT License and [available here](http://code.google.com/p/tylerhall/source/browse/trunk/class.args.php).