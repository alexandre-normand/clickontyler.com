---
date: 2011-02-21 13:22:43
title: VirtualHostX 2.6
layout: post
permalink: /blog/2011/02/virtualhostx-2-6/index.html
slug: virtualhostx-2-6
---
As the title implies, VirtualHostX 2.6 is now available for [download](clickontyler.com/virtualhostx/download/) or from the auto-updater inside the app. This update brings a few niceties that users have been asking for.

First, you can now choose a custom IP address for your virtual hosts to resolve to. In most cases (and by most I mean 99%) you'll never need to change this from the default 127.0.0.1 value. However, if you've spent time developing your site locally and want to do some final testing before going live online, you can use this to test against your production server before switching your public DNS settings.

One of the most common problems I see when users ask for help is when their Apache httpd.conf file has not been setup to work with VirtualHostX. This can happen for a number of reasons. Reinstalling OS X, switching from the built-in Apache to MAMP (or vice-versa), or using another server configuration tool can all replace and/or break the changes VirtualHostX makes. You can always correct this by re-running the Setup Wizard, but, often, users simply don't know to try that &mdash; which is my fault. So now, when a mis-configuration is detected, VHX will display a warning alerting you to the problem. You can click the alert for more information and to launch the Setup Wizard to correct the problem.

Continuing with an improvement made in version 2.5.3, VirtualHostX now automatically adds `AllowOverride All` to the custom directory directives section of new virtual hosts. This should automatically enable .htaccess files in your sites &mdash; another common complaint I received.

Finally, I've added a new "Reveal" section to the "Web Server" menu. This lets you quickly jump to any of the three configuration files that VirtualHostX edits. You'll typically never need to edit any of these files by hand, but advanced users occasionally have a need. This is just a time saver for them.

So that's all the changes in 2.6. As always, please feel free to [contact me](http://clickontyler.com/contact/) with any questions or feedback. And, for the sake of completeness, here's a screenshot showing VHX's new IP Address option and the mis-configuration error in the lower right corner of the window.

![VirtualHostX 2.6 screenshot](http://cdn.clickontyler.com/blog/vhx26.png)