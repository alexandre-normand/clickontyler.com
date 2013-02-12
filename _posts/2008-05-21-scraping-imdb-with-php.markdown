---
date: 2008-05-21 06:16:49
title: Scraping IMDB With PHP
layout: post
permalink: /blog/2008/05/scraping-imdb-with-php/index.html
slug: scraping-imdb-with-php
---
For an upcoming project, I need to pull in metadata about movies and TV shows &mdash; genres, plot summaries, actors, etc. The de-facto source is, of course, [IMDB](http://imdb.com). Unfortunately, they're behind the times and don't offer an API to access their data. (At least not one that I've ever found.)

So, here's a quick PHP class that takes a movie title (doesn't have to be exact) or a filename (!) and [scrapes IMDB](http://code.google.com/p/tylerhall/source/browse/trunk/media-info/class.media.php) for the relevant info.

Using the scraper is simple.

{% highlight php  %}
<?PHP
    $m = new MediaInfo();
    $info = $m->getMovieInfo('American Beauty');
    print_r($info);
{% endhighlight %}

will output:

{% highlight php  %}
    Array
    (
        [kind] => movie
        [id] => tt0169547
        [title] => American Beauty
        [rating] => 8.6
        [director] => Sam Mendes
        [release_date] => 1 October 1999
        [plot] => Lester Burnham, a depressed suburban father in a mid-life crisis...
        [genres] => Array
            (
                [0] => Drama
            )
        [cast] => Array
            (
                [Kevin Spacey] => Lester Burnham
                [Annette Bening] => Carolyn Burnham
                [Thora Birch] => Jane Burnham
                [Wes Bentley] => Ricky Fitts
                [Mena Suvari] => Angela Hayes
                [Chris Cooper] => Col. Frank Fitts, USMC
                [Peter Gallagher] => Buddy Kane
                [Allison Janney] => Barbara Fitts
                [Scott Bakula] => Jim Olmeyer
            )
    )
{% endhighlight %}

At the moment, the class only returns data for movies. For TV shows I'm planning on pulling data directly from the database I've created for Schmooze.TV (which, in turn, scrapes its info from [TVRage](http://www.tvrage.com/)).

You can [download the source](http://code.google.com/p/tylerhall/source/browse/trunk/media-info/class.media.php) from [my Google Code project](http://code.google.com/p/tylerhall/). As always, this code is released under the [MIT License](http://www.opensource.org/licenses/mit-license.php). Comments and suggestions are always welcome.