---
date: 2010-07-01 03:32:47
title: How I Backup my Mac
layout: post
permalink: /blog/2010/07/how-i-backup-my-mac/index.html
slug: how-i-backup-my-mac
---
Four years ago, [on another blog](http://raventools.com/blog/2918/how-to-backup-your-mac-intelligently), I wrote about my file backup strategy &mdash; everything I use to keep my data safe. A lot has changed since then. CD's and DVD's have fallen by the wayside, raw hard disk space has gotten insanely cheap, and online storage has finally taken off in a big way. At the prompting of a friend, I thought it might be fun to revisit the topic and show &mdash; four years later &mdash; how my backups have evolved.

Previously, my backups were done piecemeal with all of my data segregated into groups depending on priority and size of the data. Movies and music went here, documents there, email someplace else, etc. It was largely due to time, available storage, and cost. But now that storage is cheaper and I'm a little bit richer, I feel completely confident in my backup plan in any situation.

### Time Machine ###

With external hard drives costing well under $100, there's no reason any Mac user shouldn't be using Time Machine. My 1TB iMac (where I do all of my work) is connected wirelessly to a [1TB Western Digital World Edition](http://www.amazon.com/gp/product/B001RB1QWW?ie=UTF8&tag=clickcom-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=B001RB1QWW) which plugs in directly to my router via ethernet. The drive appears as an AFP share in Finder, and Time Machine has no trouble backing up to it.

I used to backup to a network attached [Drobo](http://www.amazon.com/gp/product/B001CZ9ZEE?ie=UTF8&tag=clickcom-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=B001CZ9ZEE) (see my [review here](http://clickontyler.com/blog/2008/05/two-weeks-with-drobo/)), but every time a backup would start the Drobo would slow down, causing video on our home media center (Mac Mini + LCD TV + Drobo) to stutter. It's worth noting that this was a first generation Drobo &mdash; the new ones are probably better.

Time Machine has saved my butt a bunch of times. Twice I've done full system restores, but much more often I find myself going back in time to retrieve a lost file or an earlier version.

So that's my first layer of protection. Time Machine offers full system recovery plus the added bonus of incremental file versioning in case my hard drive dies or I do something stupid.

### SuperDuper! ###

Next. I have two [1TB Western Digital Studio](http://www.amazon.com/gp/product/B002RL8IH2?ie=UTF8&tag=clickcom-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=B002RL8IH2) drives. These things are crazy fast since they connect directly to my Mac over Firewire 800. Of course, only one is connected at a time. The other stays locked safely away in my bank's safe deposit box. Every morning, at 5am, [SuperDuper!](http://www.shirt-pocket.com/SuperDuper/SuperDuperDescription.html) does a full, bootable system clone to the connected drive. And twice a month I swap the one at home with my duplicate off site.

With a local Time Machine copy already in place, why do this one? A few reasons.

First, in the event of a disaster or robbery, I have a backup stored elsewhere I can rely on. It may be two weeks out of date, but it's certainly better than nothing. Second, having a bootable backup means no downtime. Zero. In the event of major data loss, if my Mac's hard drive is unusable, it'll probably take five hours to restore from Time Machine. But what if that drive is actually broken? How long would it take to purchase a replacement drive and install it? If you do it yourself, maybe a day. But if you have to rely on an Apple warranty repair? Possibly a week. With a bootable copy, I can be back online and working in five minutes. I work from home 100% of the time &mdash; I can't afford any downtime. This keeps me covered.

Oh, and for those who are extra curious, I have the following cron job on my Mac:

{% highlight bash linenos %}
00 05 * * * /usr/sbin/diskutil mount /dev/disk1s3
{% endhighlight %}

Because I don't like having my backup drive plugged into my system 24/7 (it slows down Open/Save dialogs whenever it has to spin up), I keep it unmounted. That cron script automatically mounts it every morning at 5am. When that happens, SuperDuper! automatically launches and performs a backup and unmounts the drive when finished.

One last bit of esoterica: if the drive unmounts and SuperDuper! quits after every backup, how do I know it actually ran each morning? Simple, I configured SuperDuper!'s [Growl](http://growl.info/) settings to leave a "sticky" notification on screen when done. That way I have a message waiting for me each morning telling me if the backup finished or failed.

### Backblaze ###

As mentioned before, my SuperDuper! copies give me an offsite backup in case of catastrophe, but they could be up to two weeks out of date. [Backblaze](http://www.backblaze.com/) solves this by keeping an always up-to-date copy of my data stored online in their cloud. It's a simple Preference Pane that runs in the background. Once you get through the initial backup process (took a full week for me), your data is always backed up with negligible network and CPU usage for only $5 per machine. It really is an excellent service and excellent software that, unlike many of their competitors, feels like a first-class citizen on your Mac.

So, if my house gets swept away in a flood (which it nearly was), what happens? Well, for $99 Backblaze will overnight me a DVD of my data. If that's not large enough (which it isn't), for $189 they'll overnight an external hard drive containing everything. Sure it's pricey, but this is a worst case scenario. And $189 is an absolute bargain when it comes to recovering my data.

### Miscellany ###

Those three layers of protection keep me pretty well covered from a full system perspective. I've got incremental backups, offsite backups, and disaster recovery backups. In addition to that, there are a few other tools I use.

All of my source code, and I mean all of it, is stored in [GitHub](http://github.com/). I used to run my own Subversion server which got backed-up nightly to Amazon S3, but GitHub's ease of use and UI are exceptional. I'm happy to say I'm a paying customer. But that still doesn't mean my data is completely safe. What if GitHub were to lose my code? Due to the nature of Git, I have full copies of my repositories on my hard drive &mdash; which is, of course, backed up along with everything else mentioned earlier.

Email. All of my personal and work email goes through Gmail. I trust Google up to about 99%. But there's always 1% of me that worries they might fuck-up my data or simply lock me out of my account. So, I keep a copy of Mail running on our media center (which is backed up, too) that downloads all of my mail via POP3. The only way to lose my email is if Google fails and my house burns at the same time. I feel confident that won't happen . . . probably.

Contacts and calendars? Synced via MobileMe of course. In case Apple screws up? I can recover via Time Machine or one of my SuperDuper! backups.

Finally, miscellaneous documents, financial records, [1Password](http://agilewebsolutions.com/products/1Password) keychains, etc. I stopped using my Mac's "Documents" folder a long time ago. Instead, everything gets saved into [Dropbox](http://www.dropbox.com) and mirrored across two other Macs and in their cloud. In addition, super important files like tax returns, warranty receipts, etc get copied into Amazon S3.

### Whew ###

So that's it. That's my backup solution. It's changed quite a bit over the last four years. Of particular note is that I've completely eliminated CD/DVD backups. I can't even remember the last time I burned a disc, as everything is handled over the network now. Also, I've moved from backing up only the critical pieces of my system to full-on, multiple, bit-for-bit backups. Again, as storage prices have fallen, this was inevitable &mdash; and I'm so glad it's finally happened.

So take my advice as someone who has lost and seen others lose critical data in the past. Backups aren't something you "get around to". They're processes you need to put in place and do, now.

I pester a lot of my friends about this who don't backup at all. They always say to me "Oh, I don't really have anything important." That may be the case for a very few people, but now that our lives are almost completely digital, there's always something at risk. You need to take a few minutes and really think &mdash; imagine standing on your lawn at night, watching your house burn. Get past all your possessions, your furniture, your clothes, even your prized DVD collection from college and the note your first girlfriend wrote you. Where are your photos? Your home videos? Your tax returns? What about the insurance records you'll need to start rebuilding your life? Do you even have your agent's phone number on you?

I admit my solution may be over the top for some people, but you're a fool if you don't have at least one backup in place.
