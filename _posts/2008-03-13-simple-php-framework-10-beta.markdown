---
date: 2008-03-13 07:34:48
title: Simple PHP Framework 1.0 Beta
layout: post
permalink: /blog/2008/03/simple-php-framework-10-beta/index.html
slug: simple-php-framework-10-beta
---
I'm happy to announce we're nearing the release of our first "downloadable"
version of the [Simple PHP Framework](http://code.google.com/p/simple-php-framework/).
We've never offered a zipped-up package for download before &mdash; users had to access
the code via SVN. But after two years of production use it's high time to
change that.

Last night I committed a large update that will serve as the basis for our
final 1.0 release later this month. This is the __Simple__ PHP Framework after
all, so don't expect any drastic changes. Our intentions with this release is
to provide a stable branch that users can depend on while we continue to
commit bleeding edge code to the SVN head. That said, please send in any
outstanding bug reports you may have so we can work them into the final
release. An overview of the changes are below.

### functions.inc.php ###
  * `human_readable()` renamed to `bytes2str()`
  * added `time2str()`
  * `slugify()` improved. Can double-slug a string without problems. Collapses multiple hyphens into a single character.
  * added `WEBROOT()`

### Unit Test Framework ###
As you can imagine, our testing framework is very simple. Test have been written for `functions.inc.php` and `class.loop.php`.

### Built-in Tagging Support ###
  * Most projects seem to require tagging nowadays, so we've baked it directly into `DBObject` along with a new Tag class.
  * To enable support, set `$this->taggable = true` in your `DBObject` constructor.
  * `addTag($name)`
  * `removeTag($name)`
  * `tags()` - Get object's tags
  * `tagged($name)` - Get objects tagged $name

### Auth Class ###
  * Refactored code
  * Can now impersonate users

### master.inc.php ###
  * Defined `WEB_ROOT`
  * Cleans up global namespace

### Database Class ###
  * Lazy connecting.

### Stylesheets ###
Removed YUI stylesheet. Instead, the homepage now
includes a link to the Y!API hosted reset-fonts-grids.css file. (It's
commented out by default.)

Default pages are now linked with a `WEBROOT()` prefix so they can work in
absolute or relative path environments.