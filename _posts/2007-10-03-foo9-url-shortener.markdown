---
date: 2007-10-03 07:24:41
title: foo9 URL Shortener
layout: post
permalink: /blog/2007/10/foo9-url-shortener/index.html
slug: foo9-url-shortener
---
I was out of town for a couple days last week and had a lot of time to kill at
my hotel. Needing something to do I decided to write my own URL shortening
service. This is hardly an original idea - [TinyURL.com](http://tinyurl.com)
has been around for a long time. Newcomer [url(x)](http://urlx.org/) is great,
too. However, there are changes I'd like to see made to both sites so I
decided to roll my own. Plus, it turned out to be a fun computer science-y
puzzle (more on that later). I've called my shortening service
[foo9.net](http://foo9.net).

First off, I wanted the site to load fast. That meant no ads and no extra HTML
cruft - only the necessary basics. It's supposed to be a service - not a
billboard. The homepage for foo9.net is as lightweight as possible. Especially
when compared to TinyURL's.

I also wanted to eliminate as many "clicks" as possible for the user. With
url(x), you have to move the mouse and click on the URL field to select it.
foo9 automatically selects the URL field for you. Just load the page and hit
paste. Plus, once the URL has been shortened, the new link is already
highlighted and ready to copy. We also provide a clickable link if you want to
test it. You can even password protect your new URL so only trusted friends
can access it.

After shortening your link, foo9 gives you a "secret" URL that will let you
track how many visitors your link has had. I was considering tracking referral
data and maybe even unique IP addresses, but decided against it for privacy
reasons. If enough people ask for it I might implement these stats.

foo9 even has a simple [developer API](http://foo9.net/api-info.php) so you
can shorten links from within your own applications - no need to visit our
site.

### And Now The Computer Science-y Part###

URL shortening is neat problem to think about because the goal is to make the
new URL as short as possible. The immediate solution is to simply hash the
URLs. The problem with this is most hashing algorithms give you a long string
of characters - usually 35 or more - which is how they can (in theory)
guarantee there won't be any collisions. If you hash a URL and then trim the
new value to a small number of characters the hash loses all practical value.

The solution is to use an ID that increments with each new URL. We could
simply assign an ID field to each URL and have the database auto-increment it.
That's a good start, but the shortened URLs quickly grow in length. TinyURL
claims 47 million URLs. That would mean eight character long IDs. While
probably shorter than the original URL, we can do better.

The reason the ID's grow so quickly is because they're counting in base 10. If
we increase the symbols in our number system we can keep the URL short longer.
An easy choice would be to use hexadecimal - base 16 - which counts 0 through
9 and the continues with A through F. That's good, but once again, we can do
much better.

foo9 uses a base 31 system. It's a strange choice, but here's why.

To maximize the number of numbers (and still keep things simple) I chose to
use 0 - 9 and then A - Z for a total of 36 possible choices. With that many
combinations the URL will stay relatively short for a long time.

So if base 36 works so well, why drop down to base 31? Usability, of course.

The full 36 character list has some hard to read symbols: O, 0, 1, I, and L.
When they're butted up against one another in a URL it's hard to distinguish
between each. URLs are normally sent around via copy/paste and clicking. But
in the rare occurrence that you need to speak a URL to someone or transcribe
it by hand, you'll be glad the letters don't look alike. So, 36 characters -
take away the 5 look alikes - and you're left with 31:

`2 3 4 5 6 7 8 9 A B C D E F G H J K M N P Q R S T U V W X Y Z`

It's a fast solution and keeps the URL short. Here's the base-10 to 31 function:

    function tenTo31($num)
    {
        $out   = "";
        $alpha = "23456789abcdefghjkmnpqrstuvwxyz";
        
        while($num > 30)
        {
            $r = $num % 31;
            $num = floor($num / 31) - 1;
            $out = $alpha[$r] . $out;
        }
    
        return $alpha[$num] . $out;
    }