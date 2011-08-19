---
date: 2009-01-28 03:27:25
title: Download All of Your Flickr Photos and Sets
layout: post
permalink: /blog/2009/01/download-all-of-your-flickr-photos-and-sets/index.html
slug: download-all-of-your-flickr-photos-and-sets
---
iLife '09 was released today. And with it came a much improved version of iPhoto with facial recognition, geotagging, and Flickr and Facebook support. With so many new ways to slice and dice my photos, I wanted to start over with a clean slate and get everything organized in iPhoto before re-exporting my library back to Flickr or wherever.

Before I could do that, I had to download all of my photos _out_ of Flickr so I could import them into iPhoto. I wanted something simple that would also retain my photos in their correct sets when downloading. I found <a href="http://greggman.com/pages/flickrdown.htm">one program for Windows</a>, but nothing for Mac. (Did I missing something obvious?)

So here's a simple PHP script that uses the <a href="http://phpflickr.com/">phpFlickr library</a> to download all of your photos. It creates a folder for each set plus an extra one for photos not in a set. This grabs your original, full-size photos &mdash; both public and private.

You can get the script from <a href="http://code.google.com/p/tylerhall/">my Google Code project</a> <a href="http://tylerhall.googlecode.com/svn/trunk/flickr/download-all.php">here</a>. You'll also need to download and include a copy of the phpFlickr source from <a href="http://code.google.com/p/phpflickr/downloads/list">here</a>.