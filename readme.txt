=== Object in a frame ===
Contributors: andywar65
Donate link: http://www.andywar.net/wordpress-plugins/donate
Tags: 3D, aframe, object, shortcode, VR
Requires at least: 4.7
Tested up to: 4.8.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple plugin that displays an object file in an embedded a-scene HTML tag. 

== Description ==

This plugin embeds an a-scene HTML tag in posts and pages via a shortcode. The shortcode is the following:

[objinaframe_shortcode path= path/to/file.obj ] 

The "path" attribute must be an URL pointing to an *.obj file. Corresponding *.mtl file must have same name and exist in the same directory. Both files can be uploaded in the Media Library. On the front end the shortcode displays a visor icon. A click on the icon opens VR scene fullscreen. Press ESC to return to post / page. On mobiles, scene is split in two, ready for binocular vision.
Javascript library (aframe.min.js vers. 0.7.0, now including loaders) is bundled with the plugin, thanks to A-Frame.

== Installation ==

1. Download and unzip `objinaframe` folder, then upload it to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Nothing else

== Frequently Asked Questions ==

= Does the plugin work on multisites? =

Yes, it does.

= Does it work on all themes? =

It has been tested on twentysixteen.

== Screenshots ==

1. Screenshot of frontend Visor Icon

== Changelog ==

= 1.1.0 =
* A-Frame library version 0.6.0.

= 1.0.0 =
* First release.

== Upgrade Notice ==

= 1.1.0 =
* A-Frame library version 0.6.0.

= 1.0.0 =
* No upgrades available.