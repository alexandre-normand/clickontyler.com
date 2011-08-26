---
date: 2009-03-09 05:25:36
title: YUI App Theme
layout: post
permalink: /blog/2009/03/yui-app-theme/index.html
slug: yui-app-theme
---
Tonight I pushed a new project to GitHub called [yui-app-theme](http://github.com/tylerhall/yui-app-theme/). It's a generic, skinnable layout designed for web applications &mdash; particularly admin areas &mdash; built using [YUI Grids](http://developer.yahoo.com/yui/grids/).

In other words, it's a *starting point*.

Usually when doing freelance work for clients, unless you're building on top of an existing CMS like [WordPress](http://wordpress.org/) or [MiaCMS](http://miacms.org/), you'll have to create an admin area for the client to login and manage their site. Or maybe you're building a bug tracker or some other web application. Whatever the situation, yui-app-theme provides a solid foundation to start your work.

It offers a tabbed layout with many of the common UI elements that web apps need. Content blocks, tabbed modules, one and two-column forms, error messages, etc. But most importantly it's built using YUI Grids so it's semantically structured, cross-browser, and easy to extend. You can radically alter the layout with just a few quick changes. Try clicking through the layout options on the [demo page](http://clickontyler.com/yui-app-theme/).

[![YUI App Theme preview]({{ site.cdn_url }}/blog/yuiapp-ss4.20090308235541.png)](http://clickontyler.com/yui-app-theme/)

I've done my best to keep things logical and easy to use. Here's a quick example of how to use and extend the built-in content blocks.

A basic content block, or module, is created with the following markup

{% highlight html linenos %}
<div class="block">
    <div class="hd">
        <h2>Your Header Content</h2>
    </div>
    <div class="bd">
        <p>Your body content goes here.</p>
    </div>
</div>
{% endhighlight %}

You have a containing `div` with a class name of `block` surrounding two inner `divs`, which make up the head and body content of the block. In the browser you'll see

![YUI App Theme content block preview]({{ site.cdn_url }}/blog/yuiapp-ss1.20090308235539.png)

Content blocks resize to fit their surroundings. That means you can take the same markup used for a body content block and move it into a sidebar &mdash; the block will automatically shrink to fit the smaller space.

We can also extend the block to have a tabbed appearance. To do this, we just need to add an extra `tabs` class and define our tabs using a &lt;ul&gt;.

{% highlight html linenos %}
<div class="block tabs">
    <div class="hd">
        <ul>
            <li class="active"><a href="#">Tab 1</a></li>
            <li><a href="#">Tab 2</a></li>
            <li><a href="#">Tab 3</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="bd">
        <p>Your body content goes here.</p>
    </div>
</div>
{% endhighlight %}

![YUI App Theme content block with tabs preview]({{ site.cdn_url }}/blog/yuiapp-ss2.20090308235540.png)

Easy.

However, you'll notice than by using an unordered list to build our tabs, we had to remove the &lt;h2&gt; tag. In some situations we may want to keep that header around for SEO purposes &mdash; visible to search engines but hidden from users. yui-app-theme handles this situation automatically by hiding any &lt;h2&gt; and &lt;h3&gt; tags inside a content block's header. (Technically, it applies an extreme negative left margin to move it outside the browser window.)

Let's take this example one step further and change the appearance of the tabs by making them look separated. All we have to do is add a `spaces` class to the content block.

{% highlight html linenos %}
<div class="block tabs spaces">
    <div class="hd">
        <ul>
            <li class="active"><a href="#">Tab 1</a></li>
            <li><a href="#">Tab 2</a></li>
            <li><a href="#">Tab 3</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="bd">
        <p>Your body content goes here.</p>
    </div>
</div>
{% endhighlight %}

And we get

![YUI App Theme content block with separated tabs preview]({{ site.cdn_url }}/blog/yuiapp-ss3.20090308235540.png)

It's that simple. With the right CSS, minor HTML edits can create powerful changes when rendered.

If you [explore the demo](http://clickontyler.com/yui-app-theme/) you'll see that applies to the page layout as well. You can *very quickly* change the color scheme or page width. And even adjust the sidebar, move it to the opposite side, or switch the layout to a single column. It's all possible because yui-app-theme, itself, is built on top of a solid foundation &mdash; [YUI](http://developer.yahoo.com/yui/).

I've already started using this template in my own projects and found it incredibly helpful to have my application layout up and running so quickly. I hope you can benefit from it, too. And, please, feel free to fork [yui-app-theme on GitHub](http://github.com/tylerhall/yui-app-theme/) and contribute your own improvements.