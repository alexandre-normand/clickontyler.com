---
date: 2011-09-25 09:44:13
title: Guessing a User's Location on iOS
layout: post
permalink: /blog/2011/09/guessing-a-users-location-on-ios/index.html
slug: guessing-a-users-location-on-ios
---
A few months ago [at work](http://mercury.io) we ran into an odd user experience problem. The home screen for one of our iPad apps included a small icon in the navigation bar showing the current weather. Normally it displays the weather for the user's current location or any location they've saved. No problem. But what do we show the first time the app launches? At that point, they have no saved location preference and we don't know their physical location because they haven't yet opted-in to CoreLocation. We came up with three options.

1. Don't show anything, or show a generic no-location-set icon. We tried this, but our designers didn't ilke the empty experience.
2. Immediately prompt the user for permission to access their location as soon as the app launches. We nixed this idea, too, since we didn't want an ugly system alert to be their first interaction with our app.
3. Pick some standard default location until the user chooses a different one.

We actually went with option #3 and set New York City as the default location. Unfortunately we found that this confused users. Even though they hadn't given us their location info yet, they still assumed that the icon represented their local weather forecast. Imagine seeing a sunshine icon when it's pouring rain outside. Not good.

That led us to consider a fourth solution. Over lunch we came up with the idea of trying to infer the user's general location based on the data available in their address book. If it worked, we could provide an approximate weather forecast on first launch without popping-up a nagging alert window.

On Mac, doing this is easy. Just query the user's "Me" card and pull out their city or zip code. But on iOS, for privacy reasons, we don't know which card is the user's.

Thinking a bit more about the problem we realized that most people know lots of people who live near to them and fewer people as the distance increases. So we decided to look through the user's address book and find the most common city, state, and zip code. The idea being that would let us infer the user's state if nothing else.

The code for this was pretty quick to write. We built a small sample app and distributed it to everyone in the office. We were shocked to find out how well it worked. It correctly guessed the user's appoximate location for all but one of the devices we tested it on.

In the end, however, we chose not to add this "feature" to the app. We decided, while clever, it was just a little too creepy even though we never did anything with the data. But, it was still a fun thought experiment and a nice proof of concept to spend an afternoon on.

If you'd like to see or use the code, it's [available on GitHub](https://gist.github.com/1241004).