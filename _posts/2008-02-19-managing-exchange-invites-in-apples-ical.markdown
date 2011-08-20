---
date: 2008-02-19 07:32:17
title: Managing Exchange Invites in Apple's iCal
layout: post
permalink: /blog/2008/02/managing-exchange-invites-in-apples-ical/index.html
slug: managing-exchange-invites-in-apples-ical
---
For better or worse, most of my coworkers live and die by their Exchange
calendars. Unfortunately, as a developer working on a Mac 24/7, there aren't
many options for dealing with the barrage of Outlook invites I receive each
day. I can either use
[Entourage](http://www.microsoft.com/mac/products/entourage2008/default.mspx)
which only kinda-sorta-works, or I can just deal with it and transcribe each
invite manually into [iCal](http://www.apple.com/ical/) or [Google calendar](http://www.google.com/calendar/). Both options are crap.
([Groupcal](http://www.snerdware.com/groupcal/) from Snerdware used to be an
option, but it doesn't support Leopard and their developers appear to have
stopped work on the product.) There's no reason OS X shouldn't be a
full-fledged citizen in an Exchange environment. But, until that happens,
[here's a collection](http://tylerhall.googlecode.com/svn/trunk/outlook-web-access/) of
ever-improving AppleScript and PHP hacks I've written to make life in an
Exchange world a little bit better

### There are three problems we need to solve ###

1. Viewing a user's free/busy calendar
2. Easily adding Exchange invites to iCal
3. And accepting or declining those invites

My solution is a set of four Applescripts and a PHP script that (for me at
least) make this nearly seamless. The bulk of the code is a PHP class called
[OWA](http://code.google.com/p/tylerhall/source/browse/trunk/outlook-web-access/owa.php)
which interacts with Outlook Web Access - a prerequisite for all of this
working. Nearly all organizations which run Exchange have this enabled, so it
shouldn't be a problem for most people. The Applescripts are primarily just
glue which pull information from Mail and pipe it into the PHP script for
processing.

### 1. Viewing a User's Free / Busy Schedule in iCal ###

I've placed the OWA PHP script in my Mac's local web root. To subscribe to a
user's free / busy calendar I choose **Subscribe** from iCal's **Calendar**
menu and use the following URL:

`http://localhost/owa.php?user=<username>`

Where `<username>` is someone's Exchange username. Behind the scenes, the
PHP script logs into Outlook Web Access and scrapes the user's calendar info
and returns it as a properly formatted iCalendar file which iCal loads.

I'm the first to admit that this isn't the most user-friendly solution, but it
works. I stay subscribed to my manager and nearby coworkers' schedules since
they're who I typically schedule meetings with. If I need to see someone more
exotic, I just create a new calendar for them temporarily and delete it when
I'm done.

### 2. Easily adding Exchange invites to iCal ###

To move Exchange invites from Mail into iCal, I use this AppleScript. Warning:
I'm hardly an AppleScript expert, so suggestions are very much welcome.

{% highlight applescript linenos %}
    tell application "Mail"
        set theSelectedMessages to selection
        repeat with theMessage in theSelectedMessages
            set theAttachment to first item of theMessage's mail attachments
            set theAttachmentFileName to "Macintosh HD:tmp:" & (theMessage's id as string) & ".ics"
            save theAttachment in theAttachmentFileName
            do shell script "fn='/tmp/$RANDOM.ics';cat " & quoted form of POSIX path of theAttachmentFileName & "| grep -v METHOD:REQUEST > $fn;open $fn; rm " & quoted form of POSIX path of theAttachmentFileName & "; exit 0;"
        end repeat
    end tell
{% endhighlight %}

In a nutshell, that grabs the first attachment from the currently selected
Mail message (I blindly assume it's an invite attachment), removes the line
that prevents iCal from editing the event, and tells iCal to open it. At that
point iCal takes over and asks you which calendar to add the event to.

It's important to note that while the event is now stored in your local iCal
calendar, it has __not__ been marked as accepted or declined in your Exchange
calendar. You need to specifically take that action using one of the next
scripts.

### 3. Accepting or Declining Exchange Invites in Mail ###

To accept or decline an event (or even mark it as tentative) I've provided
three scripts called "Accept Invite", "Decline Invite", etc. that pass the
event to the OWA PHP script which then marks the event as such in your public
calendar. Here's the "Accept Invite" AppleScript. The other two are basically
identical.

{% highlight applescript linenos %}
    tell application "Mail"
        set theSelectedMessages to selection
        repeat with theMessage in theSelectedMessages
            set theSource to content of theMessage
            set theFileName to "Macintosh HD:tmp:" & (theMessage's id as string) & ".msg"
            set theFile to open for access file theFileName with write permission
            write theSource to theFile starting at eof
            # close access theFile
            do shell script "curl http://localhost/owa.php?accept=" & POSIX path of theFileName
        end repeat
    end tell
{% endhighlight %}

Again, I make no claims about the quality of my AppleScript - I just know that
this works well enough to get the job done.

### Closing Notes ###

And there you have it. To sum up:

1. [Download](http://tylerhall.googlecode.com/svn/trunk/outlook-web-access/) my scripts
2. Place owa.php into your local web root
3. Place the four Applescripts into `~/Library/Scripts/Applications/Mail`

After that, it's up to you to call those AppleScripts as needed. I use Red
Sweater Software's [Fast Scripts](http://www.red-sweater.com/fastscripts/)
application to assign keyboard shortcuts to them. You could also use
[Quicksilver](http://www.blacktree.com/) or whatever method works best for
you.

Like I sad above, these scripts are constantly in flux as I revise and improve
them. I'll post any significant updates to this blog - and I hope you'll
[email me](http://clickontyler.com/contact/) with any questions you have or
improvements you make.