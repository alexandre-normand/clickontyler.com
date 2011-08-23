---
date: 2011-05-18 19:22:08
title: Experimenting with Piracy - An Indie Mac Developer's Perspective
layout: post
permalink: /blog/2011/05/experimenting-with-piracy/index.html
slug: experimenting-with-piracy
---
For the last twelve months I've been keeping detailed records regarding the number of users pirating my Mac apps and toying with different ways of converting those users into paying customers. I'm not foolish enough to ever think I could actually eliminate the piracy &mdash; especially since I believe there *are* a few legitimate reasons for pirating software &mdash; but I was genuinely curious as to what the actual numbers were, the motivations behind doing so, and if there were any way I could make a small dent in those numbers.

### A quick summary for those who don't want to read the full post (tl;dr) ###

Software developers are foolish if they think they can prevent piracy. The only goals worth pursuing are

1. Make it incredibly easy for honest customers to purchase your software.
2. Find simple, non-intrusive ways of encouraging pirates to become paying customers.
3. Retire to a sandy location with the tens of hundreds of dollars you're sure to make.

### A Bit of History and Harsh Reality ###

[VirtualHostX 2.0](http://clickontyler.com/virtualhostx/) was released on July 19, 2009. Fake serial numbers first appeared (to my knowledge) on August 3, 2009. That's fifteen days. Fifteen days for someone to take the time to engineer a fake serial number for a relatively unknown, niche app.

[Nottingham](http://clickontyler.com/nottingham/) was released on November 28, 2009. It took eight days for the first serial number to begin appearing.

Admittedly, the serial number scheme I used was incredibly simple. So it was no surprise that it was easy to crack. But seriously? Eight days? I doubt it took whoever did it more than an hour of actual work. I was just flabbergasted they cared enough to even take the time. A little honored truth be told.

So I did what any software developer would do. With each new software update I released, I made sure to ban the infringing serial numbers. Now, I fully realized the futility of what I was doing, but still &mdash; I thought that if I at least made it inconvenient for the pirating users to have to seek out and find a new serial number each time, maybe I'd win a few of them over.

Nope.

Rather than posting new serials, CORE (that's one of the "teams" that release pirated software and serial numbers) simply put out "Click On Tyler MultiGen" &mdash; which was an actual app you can download to your Mac and use to create your own, working serial number for all of my products. Here's a screenshot:

<img src="http://cdn.clickontyler.com/blog/core.png">

(It even plays music.)

So, with that out in the open (you can [download it here](http://cdn.clickontyler.com/blog/clicky.zip)), there was no point in banning serial numbers any longer.

Instead, I turned my attention towards measuring the extent of the piracy. I wanted to establish a baseline of how many users were stealing my app, so I could then tell if any of my attempts to counteract it worked.

I won't go into the technical details of how I measured the number of pirated apps in use, but after a two month period I can say with high confidence that 83% of my users were running one of my apps with a fake serial number. Let that sink in.

Eighty-three percent.

Fuck.

### Experiment #1 - The Guilt Trip ###

My first attempt at converting pirates was appealing to their sense of right and wrong. (I'll pause while you finish laughing.) I released an update that popped up this error message when it detected you were using a fake serial number:

<img src="http://cdn.clickontyler.com/blog/guilttrip1.png">

Two things worth noticing:

1. I looked up the users first name (if available) from Address Book and actually addressed the message to them.
2. They only way to dismiss the message was the guilt-trip-tastic "Sorry, Tyler!" button.

Sure those things were cheesy &mdash; the folks on the piracy websites actually mocked me for it &mdash; but I thought adding a little humanity (and humor) might make a difference. And it did.

Over the next three months I saw a 4% decrease in the number of users pirating my apps. Now, is that for certain because of my silly message? It's possible, but I can't be certain. Nonetheless, I thought it was a strategy worth continuing.

### Experiment #2 - the guilt trip and a carrot ###

At the beginning of this year I decided to be a bit more proactive and actually offer users a reason to pay other than simply "doing the right thing". So, I began showing this error message instead:

<img src="http://cdn.clickontyler.com/blog/deal.png">

And I was serious. I presented the pirates with a choice. A one-time, limited offer that was only good right there and then. They could either click the "No thanks, I'd rather just keep pirating this software button" or they could be taken directly to my store's checkout page along with a hefty discount.

(I was wary of doing this because I didn't want to offend my real, paying customers who have been kind enough to part with their money at full price. I realize it's not fair that honest users might pay more than the pirates. To them, I hope they'll understand that I was simply trying to convert and make at least a little money off of users who were simply not paying to begin with. Hopefully the full-price you paid was worth it at the time and still is today.)

Did it work?

I was very careful to measure the number of times the discount dialog was displayed and the number of discounted sales that came through. The result? 11% of users shown the dialog purchased the app. I suspect that number might be a little higher as I'm sure some users saw the dialog more than once.

Despite 11% being a small number compared to the overall 83% piracy rate, I was thrilled. Most online advertisers would kill for an 11% conversion rate. I considered the experiment a success and let it continue on for a number of months until the numbers dwindled down to 5%, which brings us to today.

### The Big Switch ###

Last month (April 2011) I released Nottingham 2.0 &mdash; and with it, a new serial number scheme that requires a one-time online activation. I've always been adamantly opposed to registration checks like this both as a developer and a user. But now that everyone is (almost) always connected, these checks don't bother me as much as a user any longer. Especially if they're unobtrusive and one time. Also, after seeing the raw numbers, the developer in me is now more concerned with buying food than lofty expectations.

I hope I'm not stirring up a hornet's nest by saying this, but so far sales of Nottingham 2.0 are going well and piracy is virtually non-existent. Is that bound to change? Of course. I fully expect my scheme to be cracked at some point. But now that activation is involved, I have a much better view of when and how often it's happening. Another benefit is that it's no longer sufficient to pass around a serial number or even a key generator. Pirates will now need to patch the actual application binary (totally doable) and distribute that instead.

With those promising results in mind, I made the decision to convert my existing VirtualHostX 2.0 users to the new serial scheme as well. My goal &mdash; as always &mdash; wasn't to stop the piracy but at least make a small dent in it.

My foremost concern was to make things simple for my existing customers. Under no circumstances did I want to annoy (or piss off) them. I couldn't just invalidate all of their old serial numbers and send everyone an email with their new one. That would surely prevent someone from using the app right when the needed it the most. I had to make sure the switch was as frictionless as possible.

So, I toyed with different upgrade processes for a few weeks and finally settled on a system that I deployed with the 2.7 a few days ago. Here's how it works.

The first time the user launches VirtualHostX after getting the automatic upgrade to 2.7, they're shown this window:

<img src="http://cdn.clickontyler.com/blog/vhx27step1.png">

I explained the situation as plainly as possible while also being upfront with the understanding that this is an inconvenience for them, not me, and the requisite apology. I also made it simple &mdash; one button to click &mdash; no other steps.

So, click the button, wait about five seconds and:

<img src="http://cdn.clickontyler.com/blog/vhx27step2.png">

The app automatically connects to my server, validates their old serial number, generates a new one, and registers the app without any other user intervention. It's all automatic.

So far the switch has gone well. I've seen about 30% of my registered users go through the update and have had exactly two emails &mdash; not complaining &mdash; but just confused as to what was going on. One customer even wrote in to say:

 > That was so painless. Great job on the messaging and single-click process. Very well done.

So that makes me feel good. Even though I wish I could have avoided the process, I'm glad it appears to be going smoothly. If any other developers ever find themselves in a similar situation, I can highly recommend this approach.

### So That's It ###

Many of the points I've written about are hardly new or exciting to anyone who's written software or pirated it. So I'm not posting this as some sort of revelatory treatise. Rather, I just wanted to document the experiences I've gone through as a one-man software company who's trying to earn a little money while keeping his users happy.

In the end, the most important thing you can do is be respectful of your users' time by writing software they'll love so much they can't wait to pay for. Once you've got that down, then you can try and encourage the rest to pay up :)