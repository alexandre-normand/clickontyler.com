---
date: 2011-08-28 07:30:37
title: Switching From WordPress to Jekyll
layout: post
permalink: /blog/2011/08/switching-from-wordpress-to-jekyll/index.html
slug: switching-from-wordpress-to-jekyll
---
Last week I finally took the plunge and completely switched this website from [WordPress](http://wordpress.org/), which I had been using for over four years, to [Jekyll](http://jekyllrb.com/). There are tons of articles online about switching, so I'm not going to attempt to write any sort of exhaustive guide about the process. These are just my own first impressions &mdash; one week in &mdash; along with a few lessons learned and a couple scripts I wrote to automate the process.

### Why switch? ###

First off, let me be clear that I didn't switch because of any failing on WordPress's part. I've been a happy WP user for years, and I'd still recommend it to other web writers with no reservations. However, because of its dynamic nature, WordPress is succeptible two to problems that I got tired of dealing with:

1. WordPress can be slow. Because WordPress renders your site from a database on each page view, it can quickly grind to a halt during a burst of traffic. And before you email me, YES, I'm well aware of all the caching best practices and plugins you can use to speed up things. But short of having WordPress output the entire site as static html files after each change, you're always going to run into some initial PHP overhead. Even with [WP-Super-Cache](http://wordpress.org/extend/plugins/wp-super-cache/) installed and tuned, this site became unresponsive the last two times I landed on [Reddit](http://www.reddit.com/r/apple/comments/iybw9/83_of_my_users_were_running_one_of_my_apps_with_a/) and [Hacker News](http://news.ycombinator.com/item?id=2892759). That's unacceptable.

2. Security updates are a bitch. That's especially true for a self-hosted install of WordPress. Every security point release is an annoying fifteen minutes out of my day where I have to download the latest release, upload to my server, test for any regression issues, commit the changes into Git, etc. I've done this a thousand times before and frankly I've got better things to do with my time. I don't blame WordPress for the security fixes. In fact, I applaud them for reacting so quickly. As the most popular blogging platform I know they're a huge target and they do a great job managing that risk. I just don't want to deal with it anymore. With static HTML files there *is* no attack vector to worry about.

3. Let's be honest. I'm a geek, and the thought of keeping my site organized as a few folders of text files in a git repo is awesome.

### Switching ###

I had poked around and exprimented with Jekyll a few times before finally deciding to swtich, so I was already familiar with how the system works. (The [docs](https://github.com/mojombo/jekyll/wiki) are available if you want to know more.) As a bonus, I've been writing my blog posts in [Markdown](http://daringfireball.net/projects/markdown/) for years, so there were really only two steps between me and a fully static site:

1. Pull all my blog posts and pages out of WordPress's database and save them as Jekyll formatted text files.

2. Convert my existing WordPress theme into a Jekyll layout.

For those who are wondering, the whole proceess took about three hours on a Saturday night. Not too shabby.

### Exporting Out of WordPress ###

The first big step towards migrating to Jekyll is getting all of your content *out* of WordPress into a format Jekyll can use. Buried deep inside the Jekyll Ruby gem is an importer script for most of the major blogging platforms including WordPress. Unfortunately for me, I don't know Ruby, and I'm not familar with the gem system. I fooled around with their (seemingly out of date) instructions, but decided it would be faster and more foolproof just to write my own export script. Many of my pages and blog posts have custom post fields attached to them for setting things like page titles and URL slugs. Writing my own script ensured all those settings would come through during the export.

As for the [script itself](https://github.com/tylerhall/clickontyler.com/blob/master/_scripts/import.php), there's not much to it. It pulls all the content from your WordPress database and saves each post and page out as a Jekyll formated text file.

### Building the Layout ###

Creating the Jekyll layouts were suprisingly simple. I basically just took my existing HTML as rendered by WordPress, saved it onto my desktop, and cut it up into a few template and include files. The [layouts](https://github.com/tylerhall/clickontyler.com/tree/master/_layouts) and [includes](https://github.com/tylerhall/clickontyler.com/tree/master/_includes) are available to look through.

The flow of the templates is faily simple. Each Jekyll controlled page inherits from the [layouts/default.html](https://github.com/tylerhall/clickontyler.com/blob/master/_layouts/default.html) file.

{% highlight bash %}
{{ "{% include header.html "}}%}
{{ "{{ content "}}}}
{{ "{% include footer.html "}}%}
{% endhighlight %}

The header.html and footer.html includes are just raw HTML that build out the bulk of the site. One thing to note inside each is that I'm using a bunch of Jekyll variables that are echoed out during the Liquid processing. Each page's title and meta description is pulled from front matter defined in the corresponding Jekyll file. I'm also prefixing all of my static content URLs (images, stylesheets, JavaScript, etc) with a `site.cdn` variable which is [defined globally](https://github.com/tylerhall/clickontyler.com/blob/master/_config.yml). Currently, this points to my CDN domain on [MaxCDN](http://maxcdn.com/), but if they ever should go down (or if I switched away) I only have to change one line and re-run Jekyll to begin serving content from an alternate domain.

### Any Concessions? ###

Yep, but only one. While I'm sure with enough hacking around I could have totally replicated my WordPress site's structure, I didn't want to spend a lot of time rebuilding a bunch of archive pages that didn't matter other than (perhaps) for search engine ranking. So my old monthly archive pages as well as the indexed blog pages went the way of the dodo. To make up for the blog index, and to ensure my old content stays available in Google, I setup a [simple index](http://clickontyler.com/blog/) listing all of my posts, ordered by date.

### Odds and Ends ###

Migrating to Jekyll gave me an opportunity to go through my four year old Amazon S3 bucket where I store all of my static content. A lot of cruft and abandoned files have built up over the years, so this was a good chance to clean it out. With a few thousand files to go through, I certainly wasn't going to do it by hand. So here's a quick [script](https://github.com/tylerhall/clickontyler.com/blob/master/_scripts/unused_assets.php) that scans a local copy of the bucket and checks each file to see if it's referenced anywhere on my site. If not found, it deletes the unused file. It was incredibly easy to do since all of my content is now plain text. (Yay, Jekyll!)

### For Any Mac Devlopers Out There ###

I'm putting this [entire site's content online in GitHub](https://github.com/tylerhall/clickontyler.com/). Not because that's where it's hosted or deployed from, but simply so other people can poke around and hopefully find some useful snippet. Along with all the Jekyll stuff, you'll also find quite a few PHP scripts buried in my Mac app folders. These are all the integration scripts that connect this site to [Shine - the indie Mac dashboard](https://github.com/tylerhall/Shine) I use to run my little software business. These scripts do things like process upgrades, serve downloads, display changelogs, etc. It's all there. Just go exploring and you're bound to find them. And if you have any questions about how/why I did something, [feel free to ask](http://clickontyler.com/contact/).