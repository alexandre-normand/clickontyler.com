---
date: 2010-10-15 10:27:55
title: Automatically Compressing Your Amazon S3 Images Using Yahoo!'s Smush.it Service
layout: post
permalink: /blog/2010/10/automatically-compressing-your-amazon-s3-images-using-yahoos-smush-it-service/index.html
slug: automatically-compressing-your-amazon-s3-images-using-yahoos-smush-it-service
---
I'm totally obsessed with web site performance. It's one of those nerd niches that really appeal to me. I've blogged a few times previously on the topic. [Two years ago](http://clickontyler.com/blog/2008/05/building-a-better-website-with-yahoo/), (has it really been that long?) I talked about my experiences rebuilding this site following the best practices of [YSlow](http://developer.yahoo.com/yslow/). A few days later I went into detail about how to host and optimize your static content [using Amazon S3 as a content delivery network](http://clickontyler.com/blog/2008/05/using-amazon-s3-as-a-content-delivery-network/). Later, I took all the techniques I had learned and [automated them](http://clickontyler.com/blog/2009/02/serving-static-content-on-amazon-s3-with-s3up/) with a command line tool called [s3up](http://github.com/tylerhall/s3up/). It's the easiest way to intelligently store your static content in Amazon's cloud. It sets all the appropriate headers, gzips your data when possible, and even runs your images through [Yahoo!'s Smush.it service](http://developer.yahoo.com/yslow/smushit/).

Today I'm pleased to release another part of my deployment tool chain called [Autosmush](http://github.com/tylerhall/Autosmush). Think of it as a reverse s3up. Instead of taking local images, smushing them, and then uploading to Amazon, Autosmush scans your S3 bucket, runs each file through Smush.it, and replaces your images with their compressed versions.

This might sound a little bizarre (usless?) at first, but it has done wonders for mine and one of my freelance client's workflows. This particular client runs a network of very image-heavy sites. Compressing their images has a huge impact on their page load speed and bandwidth costs. The majority of their content comes from a small army of freelance bloggers who submit images along with their posts via WordPress, which then stores them in S3. It would be great if the writers had the technical know-how to optimize their images beforehand, but that's not reasonable. To fix this, Autosmush scans all the content in their S3 account every night, looking for new, un-smushed images and compresses them.

Autosmush also allowed me to compress the huge backlog of existing images in my Amazon account that I had uploaded prior to using Smush.it.

If you're interested in giving Autosmush a try, the full source is available on [GitHub](http://github.com/tylerhall/Autosmush). You can even run it in a dry-run mode if you'd just like to see a summary of the space you could be saving.

Also, for those of you with giant S3 image libraries, I should point out that Autosmush appends an `x-amz-smushed` HTTP header to every image it compresses (or images that can't be compressed further). This lets the script scan extremely quickly through your files, only sending new images to Smush.it and skipping ones it has already processed.

Head on over to the GitHub project page and give [Autosmush](http://github.com/tylerhall/Autosmush) a try. And please do [send in your feedback](http://clickontyler.com/contact/).