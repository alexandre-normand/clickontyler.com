---
date: 2008-11-18 01:40:50
title: Amazon S3 Improvements in PHP-AWS
layout: post
permalink: /blog/2008/11/amazon-s3-improvements-in-php-aws/index.html
slug: amazon-s3-improvements-in-php-aws
---
Two and a half years ago I began working with Amazon Web Services &mdash; first with [S3](http://www.amazonaws.com/s3/) and then [SQS](http://www.amazonaws.com/sqs/) and [EC2](http://www.amazonaws.com/EC2/). The code was eventually cleaned up and released as an [open source project called PHP-AWS](http://code.google.com/p/php-aws/). Since then, it has remained relatively unchanged. Just bug fixes and the occasional support for new AWS features when users contribute patches. It's not particularly pretty, but it has stood up well against time. The S3 class was recommended by Raymond Yee in his book [_Pro Web 2.0 Mashups_](http://www.amazon.com/gp/product/159059858X/), and a number of people have emailed examples of production sites where the library is being used.

Still, the biggest drawback (particularly with the S3 class) was that the `curl` commands were piped to the shell &mdash; they didn't use [PHP's native `curl` extension](http://us.php.net/curl). This was done to bypass PHP's memory limits to allow large file uploads (and also because we didn't have time to find a workaround). It was a dirty hack, plain and simple.

But, today, the S3 class redeems itself with full support for PHP's `curl` extension. Not only do large file uploads work (I just tested a 1.5GB disk image), but there is support for new S3 features like [query string authentication](http://docs.amazonwebservices.com/AmazonS3/latest/RESTAuthentication.html#RESTAuthenticationQueryStringAuth) and [copying objects](http://docs.amazonwebservices.com/AmazonS3/latest/RESTObjectCOPY.html).

As this is a complete rewrite, I consider it a beta release &mdash; user beware. I've converted over all of my own code to use the new class, which has given it a good bit of testing. It's stable enough for my purposes, but I don't want anyone to be surprised if there's a bug or three lurking about.

[Download the code](http://github.com/tylerhall/php-aws/), kick the tires, and please report any bugs you find.