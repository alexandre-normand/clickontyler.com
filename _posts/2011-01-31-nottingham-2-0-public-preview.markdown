---
date: 2011-01-31 20:40:40
title: Nottingham 2.0 Public Preview
layout: post
permalink: /blog/2011/01/nottingham-2-0-public-preview/index.html
slug: nottingham-2-0-public-preview
---
The first public preview (beta) of Nottingham 2.0 is [now available](http://clickontyler.com/nottingham/beta/). I wasn't planning on releasing this just yet &mdash; I was aiming for a preview release in the middle of February &mdash; but [Notational Velocity](http://notational.net/) released a great new update this weekend and forced my hand.

### A Little History and the Ethics of Making Money ###

Ever since [first releasing](http://clickontyler.com/blog/2009/11/nottingham-a-simple-note-taking-app-for-mac/) Nottingham in November 2009, I've made it clear that the app is first and foremost inspired by Notational Velocity and the great work [Zachary Schneirov](https://github.com/scrod/) has done. But I wanted more. Specifically, a note taking app like NV but tweaked to the way I work and with [Simplenote](http://simplenoteapp.com/) sync support. So that's what I made.

The original release of Nottingham was a built-from-scratch clone of NV with sync support and Markdown previews built-in. But still, despite the vision I had in mind for what I wanted Nottingham to ultimately be, that first release was a clone &mdash; and I took a lot of flack for it. I can't begin to count the number of hateful emails I've received and blog comments that were directed my way. And while it's completely fair to say the original idea and interface were not my own, I don't believe there is anything wrong with taking that idea and trying my best to move it forward in the direction I see fit. Nor is there anything wrong with selling it &mdash; especially when there's no code shared between the two.

My opinion has always been that you get what you pay for. With Nottingham, you're supporting an independent Mac developer. That means you're entitled to prompt, courteous email (and sometimes IM) support with any questions and problems you have. And you can also (to a certain extent) dictate the feature set with your suggestions. While Notational Velocity is a fantastic app, it's ultimately Zachary's discretion as to what features get added and which bugs get fixed &mdash; or, you also have the option of forking [his code](https://github.com/scrod/nv/tree/) and [building what you want](https://github.com/panicsteve/nv), yourself. Both approaches are valid and serve different audiences.

As I mentioned above, I've had lots of Notational Velocity users digitally spit in my face for daring to create a competing app. In general, once you get past the spit and vitriol, most of their complaints boil down to not wanting to pay for Nottingham. And I understand that &mdash; I'd love it if [OmniFocus](http://www.omnigroup.com/products/omnifocus), [MarsEdit](http://www.red-sweater.com/blog/481/it-should-be-free), [TextMate](http://macromates.com/), and [1Password](http://agilewebsolutions.com/onepassword) were free &mdash; but they're not. And neither is Nottingham. However, I do find those apps essential to my workflow and am happy to pay for them. The same goes for Nottingham. If it's useful to you, it would be awesome if you purchase a license. If it's not useful, or you don't think it's worth the money, don't buy it. There are [plenty](http://www.evernote.com/) [of](http://www.wonderwarp.com/shovebox/) [wonderful](http://selfcoded.com/app/justnotes/) [alternatives](http://flyingmeat.com/voodoopad/) [out](http://www.circusponies.com/) [there](http://www.literatureandlatte.com/scrivener.php).

Finally, and this is the last point I'll make in my rant, quite a few people have offered up the argument that Nottingham should be free simply because Notational Velocity is free. If Zachary is willing to put in so much of his time for free, shouldn't I? Well, maybe. I don't know what Zachary does for a living, but I'm guessing he gets paid for it. NV is the open source project he's chosen to put his free time towards. I've simply chosen to charge for Nottingham while donating my free time to alternative [open source projects](https://github.com/tylerhall). [Of](https://github.com/tylerhall/MacSosumi) [which](https://github.com/tylerhall/Shine) [there](https://github.com/tylerhall/OpenFeedback) [are](https://github.com/tylerhall/simple-php-framework) [many](https://github.com/tylerhall/Autosmush).

### New Features ###

Now that my rant is over, let's get back to the topic at hand &mdash; Nottingham 2.0. Earlier, I mentioned that Notational Velocity's latest release prompted me to go ahead and release this public preview. As my private beta testers can attest to, N2 has been underway since September and contains a few new features that (amazingly) Notational Velocity added this weekend. In what's probably going to be a futile attempt to curtail the hate mail, I decided to go ahead and put the latest beta version out in the open so everyone can see what I've been working on.

In no particular order...

 * **Widescreen layout** - you can now rotate the Nottingham window between portrait and landscape orientations. This is a great feature if, like me, you spend much of your time on an 11" Macbook Air.
 * **Plain text files** - Nottingham now stores your notes as plain text files in the folder of your choosing. For those of you not using Simplenote to sync your notes, this will make synchronization with Dropbox a snap.
 * **Simplenote v2** - I've updated sync support to use Simplenote's latest version 2.0 API. This means faster syncing and the ability to pin notes, share notes, and sync your tags as well.
 * **Multiple folders** - While Nottingham always has a "main" folder of notes, you're free to open multiple folders ad-hoc if you need to quickly edit or switch between different libraries of notes.
 * **Global shortcut key** - A much requested feature, you can now bring Nottingham to the front with a hotkey of your choosing
 * **Full Markdown web previews** - Previously, you could choose a custom CSS stylesheet to apply to the web preview window. Now, you can define a fully custom CSS template. It's a great way to store and edit your draft blog posts.
 * **Wiki links** - Nottingham will automatically link titles of other notes when they appear in a note's contents. Like a wiki, you can quickly click to jump between related notes this way.
 * **Tags** - While not available in this first, beta release, the underlying plumbing for tags and tag syncing is in place and will be available soon. (Yay!)
 * **More Stuff** - Nottingham is improved all over. A lot of work has gone into making it faster, more stable, and more intuitive. And, in the coming weeks, you'll see the last major feature we're working on. And while it probably won't blow you away, it is a lot of fun and crazy useful :-)