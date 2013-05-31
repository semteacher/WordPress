=== Plugin Name ===
Contributors: gerhard
Plugin URI: http://blog.ninjasforhire.co.za/65/ninja-embed-wordpress-plugin/
Tags: media, embed, youtube, vimeo, soundcloud, yahoo video, widget
Author: Ninjas for Hire
Author URI: http://www.ninjasforhire.co.za
Donate link: http://blog.ninjasforhire.co.za/65/ninja-embed-wordpress-plugin/
Requires at least: 3.2.1
Tested up to: 3.5
Stable tag: trunk

Easily embed media from YouTube, Vimeo, Yahoo Video and Soundcloud into your posts, pages and templates.

== Description ==

a WordPress plugin that would not only allow the user to easily embed media from YouTube, Vimeo, Yahoo Video and Soundcloud into their posts, but also allow us as developers to use it as a function in the our WordPress template files to embed videos in custom content types and other filters. The plugin also comes with a widget to allow you to easily embed media in your sidebar.

The plugin currently supports YouTube, Vimeo, Yahoo Video and Soundcloud. We hope to be able to add more online media services soon.

== Installation ==

1. Copy the PHP file from the zip file at the bottom of this post into your WordPress "plugins" folder.
2. Log in to your installation of WordPress.
3. Go to the "Plugins" menu and activate the plugin called "Ninja Embed Plugin"
4. Enjoy!

== Frequently Asked Questions ==

= Where is a good place I can ask questions about this plugin? =

The best place would be on the plugin development page at the following location: http://blog.ninjasforhire.co.za/65/ninja-embed-wordpress-plugin/

== Changelog ==

= 2.2 =
* Updated for new SoundCloud player.
* Fixed embedding using Https.

= 2.1 =
* Updated deprecated PHP functions.

= 2.0 =
* Yahoo Video support added.
* Widget for embedding media in the sidebar added.

= 1.3 =
* Vimeo URL correcting added.
* New feature added to remove video container with a parameter tag.

= 1.2 =
* Fixed issue where videos always appeared above post/page content.

= 1.1 =
* Added support for videos on YouTube profile pages.

= 1.0 =
* First Version of the plugin.

== Usage ==

**How do users use it?**

To embed a piece of media in a post or page you simply need to add the following shortcode to you post or page content:

*[media link="http://www.youtube.com/watch?v=EojN6r2VSR4"]*

You can also set a custom width and height to your media by adding the width and height parameters to the shortcode:

*[media width="800" height="600" link="http://www.youtube.com/watch?v=EojN6r2VSR4"]*

As of version 1.3 you can now remove the container around the embed code by setting the container to false(default is true):

*[media container="false" link="http://www.youtube.com/watch?v=EojN6r2VSR4"]*


**How do developers use it?**

Don't worry, we did not forget about the developers. 

To embed a piece of media somewhere in the code you simply need to add the following function to the template:

*`<?php media_embed('http://www.youtube.com/watch?v=EojN6r2VSR4'); ?>`*

You can also set a custom width and height to the media by adding arguments for width and height respectively:

*`<?php media_embed('http://www.youtube.com/watch?v=EojN6r2VSR4', 800, 600); ?>`*

As of version 1.3 it is now possible to remove the container around the embed code you can set the container to false(default is true):

*`<?php media_embed('http://www.youtube.com/watch?v=EojN6r2VSR4', 800, 600, false); ?>`*

OR if you don't want to set the width and height and just remove the container:

*`<?php media_embed('http://www.youtube.com/watch?v=EojN6r2VSR4', '', '', false); ?>`*
