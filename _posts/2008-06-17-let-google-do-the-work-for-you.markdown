---
date: 2008-06-17 00:18:24
title: Let Google Do The Work For You
layout: post
permalink: /blog/2008/06/let-google-do-the-work-for-you/index.html
slug: let-google-do-the-work-for-you
---
One of the major challenges in web scraping is figuring out which page to scrape in the first place. Here's a scenario: Say you need to pull some information for the film __30 Days of Night__ off [IMDB](http://www.imdb.com). It would be great if you knew in advance what the URL was &mdash; something you could construct programatically &mdash; unfortunately, it's actually [http://www.imdb.com/title/tt0389722/](http://www.imdb.com/title/tt0389722/). How can you possibly figure that out?

One solution would be to scrape IMDB's built-in search feature and from there extract the correct URL. For IMDB, that works, but what about a site that doesn't have a search feature? Or one that does, but it doesn't work very well?

I've been web scraping for years and the hands-down, best solution I've come up with is to simply let Google do the work for you.

The trick is to take advantage of their "I'm Feeling Lucky" feature. Clicking that button, instead of the standard "Google Search" button, skips the results page and takes you directly to the first result. If you construct your query properly, it will almost always be the page you're looking for.

Going back to the IMDB example, if you run an I'm Feeling Lucky search for "site:imdb.com $movie_title", Google will send you a 302 Redirect to the appropriate page within IMDB. Voila! Not only does this get us where we need to be, but (since we're relying on Google's ever improving search index) it will also adjust for spelling mistakes or even partial movie titles. It's a great technique for scraping any sort of online "encyclopedia" like [IMDB](http://www.imdb.com), [TVRage](http://www.tvrage.com/), [Wikipedia](http://wikipedia.com), etc.

Here's the code. Pass it a search query and it'll extract the redirect Google sends back.

{% highlight php %}
<?PHP
    function feelingLucky($q)
    {
        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.google.com/search?hl=en&q=" . urlencode($q) . "&btnI=I%27m+Feeling+Lucky");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.1) Gecko/20061024 BonEcho/2.0");
        curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
        curl_exec($ch);
        curl_close($ch);
        $head = ob_get_contents();
        ob_end_clean();
        return (preg_match('/Location:(.*?)$/ms', $head, $matches) == 0) ? false : trim($matches[1]);
    }
{% endhighlight %}
