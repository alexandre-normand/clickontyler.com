---
date: 2007-09-10 07:30:37
title: Lessons From a First Time Mac Developer
layout: post
permalink: /blog/2007/09/lessons-from-a-first-time-mac-developer/index.html
slug: lessons-from-a-first-time-mac-developer
---
I'm a web developer by trade. I've been programming for the web for over ten
years - prior to that I was (god forgive me) a VisualBasic and then .NET
developer. Ever since switching to Mac I've been interested in building
software for OS X. Over the last few years I read up on Cocoa and wrote a few
practice apps. I followed most of the
[Cocoa](http://www.red-sweater.com/blog/) [blogs](http://rentzsch.com/) and
even read [Aaron Hillegass](http://www.bignerdranch.com/instructors/hillegass.shtml)' book.
However, the lack of a good idea and all of my other web commitments kept me
from digging in and writing [my first real Mac app](http://clickontyler.com/blog/2007/08/say-hello-to-virtualhostx/).

That all changed this summer when I attended WWDC. Talking with so many
incredible developers really motivated me. A few months and one hell of a
learning curve later [VirtualHostX](http://clickontyler.com/virtualhostx/) was born.

When I say "learning curve" I don't mean actually writing the code. I've got a
pretty strong C/C++ background (thanks, [MTSU](http://mtsu.edu/~csdept/)).
That, coupled with my old VB skillz, made learning Cocoa and Objective-C an
absolute joy. The learning curve was figuring out how to actually sell the
damned thing. How do I handle user registrations? License codes? Program
updates? Order tracking and book keeping?

Like I said, I'm a web developer. Tying everything together into a single
"management console" seemed like the obvious solution. That solution is what I
want to present here. Hopefully other new developers like myself will find it
useful. Who knows? If there's enough interest I'd even be happy to give out
the source code, too. Until then, let me show you Appcaster.

. . .

The name Appcaster comes from the term "appcast" coined by [Andy Matuschak](http://sparkle.andymatuschak.org/). It handles pretty much every
management function related to selling my app and distributing updates. Here's
a screenshot of the home page after first logging in.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss11.thumbnail.png' title='ss1.png' alt='ss1.png' />](http://cdn.tyler.fm/blog/2007/09/ss11.png)

The first tab, Applications, displays a list of all the apps I'm managing.
Obviously, for me, there's only my one program listed. It shows the newest
version, when it was released, a link to the download, and a link to the
program's appcast feed. Clicking on the program's name we can edit its
details.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss2.thumbnail.jpg' title='ss2.jpg' alt='ss2.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss2.jpg)

You can edit the app's name, give a description, and also choose whether or
not the appcast feed it generates (more on those later) include an MD5
checksum to verify the download. Much cooler, though, is the upload
information. When you upload a new version, you have a choice of storing the
file locally on your server or you can host it in Amazon S3. If your app
should happen to get dugg or suddenly generate a ton of traffic, having your
download hosted on S3 guarantees users will be able to download it - even if
your web server should go down. It's cheap, reliable, and secure hosting for
your files. Don't take my word for it. Read about [Panic's success with Coda](http://www.cabel.name/2007/04/coda-one-week-later.html).

So, now that you've got your app's details filled in, it's time to upload a
new version. Click the Versions tab and . . .

[<img src='http://cdn.tyler.fm/blog/2007/09/ss3.thumbnail.jpg' title='ss3.jpg' alt='ss3.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss3.jpg)

You get a listing of all the releases your app has gone through - the release
date, download link, file size, and MD5 checksum (if applicable). Basically,
this is the same information that will be used to generate your program's
appcast feed. Let's release a new version.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss4.thumbnail.jpg' title='ss4.jpg' alt='ss4.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss4.jpg)

I like to make things as easy as possible - automation (however simple) turns
me on. So, when you click the New Version tab, Appcaster automatically fills
in the next incremented version number and release title. Also, the release
notes field is smart. Individual lines are automatically converted into a
bulleted list when submitted (so they look nice in the Sparkle update window).
Choose your file, and click upload. If you've chosen to store your file in
Amazon S3, Appcaster automatically uploads it onto their server and renames
the file to conform to Sparkle's naming conventions. (It picks the correct
filename if you choose to store your file locally, too). The S3 integration
comes from an [Amazon web services PHP library](http://code.google.com/p/php-aws/) I wrote last year.

Once the upload is completed, the new version automatically becomes available
in your appcast feed which means your users will get notified of a new update
as soon as Sparkle checks-in again. Also, the download link on my website is
updated to point to the new release. Like I said, automation turns me on.

I'll skip the screenshot since it looks the same as the previous one, but you
can also edit an exiting version to change release notes or even replace the
file your originally uploaded. Also not pictured is the ability to have
multiple appcasts for each app. This lets you offer users the choice between
checking for stable updates or downloading your latest bleeding edge build.

So that's how you manage your releases. Let's move on to payment processing. I
chose PayPal over other 3rd party solutions like Kagi and eSellerate because
it's a) ubiquitous (who doesn't have an account?) and b) it would be dead-easy
to integrate with my website. Another consideration was that I didn't want to
blindly insert Kagi or eSellerate's registration module into my application. I
like knowing how things work - even if that means rolling my own solution.
Luckily an open-source registration system exists.
[AquaticPrime](http://aquaticmac.com/) is awesome. It was a cinch to add into
VirtualHostX and even easier to tie into Appcaster since it comes with PHP
example code.

I've setup my PayPal account to use Instant Payment Notification (IPN) to talk
with Appcaster. Every time a user purchases my program, PayPal pings my server
with the details. The order details are stored in a MySQL database and also
emailed to my billing email address on GMail for backup purposes. Appcaster
then generates the user's license file and emails it to them in a thank-you
letter.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss5.thumbnail.jpg' title='ss5.jpg' alt='ss5.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss5.jpg)

Recent orders are displayed and clicking on a user's name takes you to their
order details page with the raw PayPal output.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss6.thumbnail.jpg' title='ss6.jpg' alt='ss6.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss6.jpg)

Looking at the tabs above, I can click on Download License and download a copy
of their license file. Likewise, Email License re-sends the thank you letter
containing their license they originally received when they ordered.

In addition to managing existing orders, you can manually enter a new order.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss7.thumbnail.jpg' title='ss7.jpg' alt='ss7.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss7.jpg)

Moving on to Stats, since Appcaster creates your appcast feeds, it also
receives the anonymous update data sent by [Sparkle Plus](http://code.google.com/p/sparkleplus/) every time a user checks for a
new version.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss8.thumbnail.jpg' title='ss8.jpg' alt='ss8.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss8.jpg)

You can get an aggregate view of you users' system configurations, or you can
drill down deeper and look at the raw Sparkle update data.

[<img src='http://cdn.tyler.fm/blog/2007/09/ss9.thumbnail.jpg' title='ss9.jpg' alt='ss9.jpg' />](http://cdn.tyler.fm/blog/2007/09/ss9.jpg)

It's important to remember that your program's stats don't stop with what you
collect yourself. You need to keep an eye on what other people are saying,
too. Appcaster pulls in recent comments from users on
[iusethis.com](http://osx.iusethis.com/app/virtualhostx),
[MacUpdate](http://macupdate.com/info.php/id/25689), and
[VersionTracker](http://www.versiontracker.com/dyn/moreinfo/macosx/33081) as
well as total downloads and ratings information.

. . .

So that's it. That's Appcaster in a nutshell. I couldn't imagine keeping track
of all this data with anything less. It makes me think that other independent
developers __must__ have backend systems like this. Right? I'm really curious
because I've never heard anyone discuss it before. I'd love to find out.
Anyone care to share?

A few final notes. Overall, Appcast took about five hours to build. (It's
based on the [Simple PHP Framework](http://code.google.com/p/simple-php-framework/) - a big help.) It
has easily saved me that much time and more. Like I said above, if others are
interested I'm more than happy to share the code. It ties together PayPal,
AquaticPrime, and Sparkle in a way that I think many developers could benefit
from.