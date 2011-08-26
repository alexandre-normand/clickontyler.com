---
date: 2008-06-02 09:14:54
title: Introducing Appcaster + OpenFeedback
layout: post
permalink: /blog/2008/06/introducing-appcaster-openfeedback/index.html
slug: introducing-appcaster-openfeedback
---
Today I'm proud to announce the release of two new open source projects: [**Appcaster**](http://code.google.com/p/appcaster/) and [**OpenFeedback**](http://code.google.com/p/appcaster/). I've been working on them off and on for over nine months, so I'm very excited to finally see them out the door.

Appcaster, which I've [written about before](http://clickontyler.com/blog/2007/09/lessons-from-a-first-time-mac-developer/), is a web-based dashboard for indie Mac developers. It's designed to manage payment and order processing and generate license files for your users. It even handles your product's revision history in Amazon S3 and can produce reports from your users' demographic info. It also serves as a central location to collect user feedback, bug reports, and support questions.

OpenFeedback is a Cocoa framework written in Objective-C that collects feedback from your users directly within your application. Instead of sending your users to a website or asking them to write an email, OpenFeedback gives them a simple window where they can ask support questions, file bug reports, or suggest new features. Their data is automatically sent to Appcaster for you to review. They never have to leave your application.

Collectively, I'm calling the two projects **Appcaster** since they're designed to work closely with one another (and since I wanted them to be part of the same Google Code project). However, OpenFeedback can send data to any server-side script that accepts HTTP POST requests &mdash; you can easily integrate it into your existing bug tracker or reporting system.

### Appcaster ###

When I first built Appcaster last year, I wrote a [detailed overview of the application here](http://clickontyler.com/blog/2007/09/lessons-from-a-first-time-mac-developer/). Aside from cleaning up a few bugs and upgrading it to use the latest version of the [Simple PHP Framework](http://clickontyler.com/simple-php-framework/), the only major additions have been adding support for OpenFeedback and graphing user demographic data using the [Google Charts API](http://code.google.com/apis/chart/).

<a href="{{ site.cdn_url }}/blog/googlecharts.png" class="lightbox"><img src="{{ site.cdn_url }}/blog/googlecharts-sm.png"/></a>

Google's Chart API is such a slick, clever way of doing things that I couldn't pass by the opportunity to use it in a project. After aggregating your data, you simply craft it into a special URL and use that as the source of an `<img>` tag. Google parses your data out of the URL and returns a PNG formatted chart.

It took all of half an hour to create some basic stats from the Sparkle update data Appcaster collects. It would be trivial for other developers to add their own custom reports in the future.

### OpenFeedback ###

The idea for OpenFeedback came from [Cultured Code](http://culturedcode.com/)'s task management application [Things](http://culturedcode.com/things/). Clicking on the Support menu item in their Help menu brings up a dialog where you can submit questions and feedback from inside the app &mdash; no need to visit a website or open an email.

I thought their implementation was a great idea and emailed them to ask if I could recreate that functionality as a Cocoa framework for other developers to use. They were nice enough to say yes :-)

Adding OpenFeedback to your application is trivial. Like Sparkle, there's no code required. You simply link your app against the framework and hook-up the appropriate actions in Interface Builder. In under five minutes you can have an elegant way to encourage users to provide feedback.

<a href="{{ site.cdn_url }}/blog/of-window.png" class="lightbox"><img src="{{ site.cdn_url }}/blog/of-window-sm.png"/></a>

My long term goal is to see the Mac developer community standardize around OpenFeedback much like they have around Sparkle. Not only would it save time for developers, but it would provide users with a consistent interface for submitting feedback. That should help improve the dialogue between developers and our users &mdash; improving Mac software all around.

### Speaking of Feedback ###

Your feedback is always welcome. This is my first open source Cocoa project, so I'm very much flying by the seat of my pants. Suggestions, improvements, bug reports &mdash; they're all welcome. You can [send them directly to me](/contact/) or file an issue in our [bug tracker](http://code.google.com/p/appcaster/issues/list).