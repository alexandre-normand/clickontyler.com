---
date: 2010-08-12 22:25:02
title: Generating Strong, User Friendly Passwords in PHP
layout: post
permalink: /blog/2010/08/generating-strong-user-friendly-passwords-in-php/index.html
slug: generating-strong-user-friendly-passwords-in-php
---
For an upcoming project, I needed a quick PHP function that would generate strong passwords. It's an easy problem on the surface, but it has some quirky nuances that appear if you spend any length of time thinking about it.

For example, it's not enough to merely pick characters at random &mdash; you have to include at least one character from each set (lowercase, uppercase, digits, symbols) to minimize the chances of someone guessing the password.

Another problem are ambiguous characters. Many times, users won't (or can't) cut and paste the password you generate for them. This happens quite often on mobile devices. They'll manually transcribe the password from an email or even read it aloud. Differentiating between I, l, 1, 0, and O can be a nightmare &mdash; for them *and for you* when they email support because their password won't work.

Complicating matters further, long, random passwords are often mistyped because users have to look back once or twice while typing the password. For long strings, it's easy to lose your place and duplicate or leave out a character or two.

The method I finally decided on solves each of these problems. It generates a strong password of a specified length, without any ambiguous characters, and can optionally include dashes between groups of characters to help users retain their place. You can also customize which sets of characters the password will contain, e.g. alphanumeric, no uppercase letters, etc.

The code is hosted on Github. [Go forth and fork](http://gist.github.com/521810).

<script src="http://gist.github.com/521810.js"> </script>
