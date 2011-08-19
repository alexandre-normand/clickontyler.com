---
title: Amazon PHP AWS
description: PHP-AWS is a collection of PHP classes for accessing Amazon's AWS platform. It supports Amazon's Simple Storage Service (S3), Simple Queue Service (SQS), and Elastic Compute Cloud (EC2).
layout: page
permalink: /amazon-php-aws/index.html
slug: amazon-php-aws
---
[PHP-AWS](http://github.com/tylerhall/php-aws/) is a collection of PHP classes
for accessing [Amazon's AWS platform](http://aws.amazon.com/). It supports
Amazon's Simple Storage Service ([S3](http://www.amazonaws.com/s3/)), Simple
Queue Service ([SQS](http://www.amazonaws.com/sqs/)), Elastic Compute
Cloud ([EC2](http://www.amazonaws.com/EC2/)), and Alexa Web Information Service ([AWIS](http://aws.amazon.com/awis/)).

### Project History ###

I began writing PHP-AWS in June of 2006 when I couldn't find a
good PHP example for accessing S3. Support for EC2
and SQS came when [Sitening](http://sitening.com) began development on
[Basejumpr](http://www.basejumpr.com) in the Fall of that year. Basejumpr was
the first real test of the code base - coordinating multiple EC2 instances
with SQS and managing gigabytes of data in S3 - it held up nicely. In fact,
it's still being actively used in Sitening's new [Raven SEO Tools](http://raven-seo-tools.com/).

### Open Source ###

PHP-AWS was released under the [MIT Open Source License](http://www.opensource.org/licenses/mit-license.php)
in January 2007 and is hosted publicly on GitHub. You're encouraged to
[download the code](http://github.com/tylerhall/php-aws/), use it in your own projects,
and submit bug reports and feature requests. Code contributions are always welcome, too. However, please note that this project is pretty much abandoned now that [Amazon's official PHP SDK](http://aws.amazon.com/sdkforphp/) is available. Still, if you just want a single file to drop into a project rather than a whole SDK's worth of dependencies, give it a try.

### Extras ###

If you're reading this page, you might also be interested in [`s3up`](http://clickontyler.com/blog/2009/02/serving-static-content-on-amazon-s3-with-s3up/). It's a command line tool that makes storing your static content (images, stylesheets, JavaScript) in S3 easy. Specifically, it follows the [best practices](http://developer.yahoo.com/performance/rules.html) of [YSlow](http://developer.yahoo.com/yslow/) and sets the appropriate gzip and expiration headers so you get maximum performance when [using S3 as a content delivery network](http://clickontyler.com/blog/2008/05/using-amazon-s3-as-a-content-delivery-network/).