=== NGG Video Extend ===
Contributors: Thorned Rose, m.fisher
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4KHH4PNK5D7GC
Tags: nextgen gallery, ngg, video, videos, shadowbox, lightbox, gallery, movie, movies
Requires at least: 3.0
Tested up to: 3.1.1
Stable tag: trunk

Addon plugin for Nextgen Gallery that adds the ability to have video lightboxes

== Description ==

**IMPORTANT: The shortcode has changed to [nggvid][/nggvid] for ALL types of video! If you are upgrading, make sure you update your shortcodes.**

This plugin allows you to have a video lightbox popup in a NextGEN gallery. It's very easy to use - just enable the addon and insert some shortcode \(along with the URL of the video\) in the image description and voila, one video! See the installation instructions and screenshots for more details.

Supports all the same video formats as Shadowbox JS - YouTube, Vimeo, Viddler, Metacafe etc as well as external and self-hosted asf, avi, dv, f4v, flv, moov, mov, movie, mp4, mpg, mpeg, swf, wm and wmv.

*Please note:* Obviously as this uses [NextGEN Gallery](http://wordpress.org/extend/plugins/nextgen-gallery/) for the gallery, NGG is a required plugin. [Shadowbox JS](http://wordpress.org/extend/plugins/shadowbox-js/) is also required!

Update 12/12/2011:

Due to a new arrival in the family we had stopped work on this plugin, we have now resumed work and hopefully should have a new release out soon with fixes etc :)

== Installation ==

1. Upload the `ngg-video-extend` folder and contents to the `/wp-content/plugins/` directory
1. Ensure that NextGEN Gallery and Shadowbox JS plugins are installed and activated.
1. Activate the plugin.

**-- USAGE --**

1. In NextGEN Gallery, upload a suitable image for your video to your gallery
1. Edit the image you just uploaded with whatever Title you want
1. In the description, add:

`[nggvid]http://www.example.com/video/12345[/nggvid]`followed by your description

Examples:

YouTube:
`[nggvid]http://www.youtube.com/embed/12345[/nggvid]`followed by your description

Vimeo:
`[nggvid]http://player.vimeo.com/video/12345[/nggvid]`followed by your description

FLV videos:
`[nggvid]http://www.example.com/theflv.flv[/nggvid]`followed by your description. You may use a relative link for self hosted files e.g. `[nggvid]videos/myvideo.flv[/nggvid]`

*e.g.* `[nggvid]http://www.youtube.com/embed/8uTThzrBYwg[/nggvid]One of the best movies evar!`

** IMPORTANT ** Due to a limitation of NextGEN Gallery, this won't automatically work on single images inserted with NGG's shortcode `[singlepic id=x]`. To get this to work with single images, you need to switch to code (HTML) view and wrap the NGG shortcode like thus `<span class="ngg-gallery-thumbnail nggve">[singlepic id=x]</span>`.
Bear in mind however, that this will apply NGG Gallery styling to your image such as the border and floating the image left. If you don't want this styling or behaviour, you can do one of two things:
* Add a style attribute to the span tag e.g. `style="float:none;"` so it looks like `<span class="ngg-gallery-thumbnail nggve" style="float:none;">[singlepic id=x]</span>`. (This will only remove the left alignment behaviour so if you also want to change the way it looks you need to use the alternative method below)

*OR*

* Add the following code to your template's style.css:
`span.nggve {float:none !important;}`

This is the preferable option as it will mean you don't have to add the style attribute to each and every single NGG image you use.

If you also want to change the way it looks add this to your stylesheet as well:
`span.nggve img {border:0 none; background:none;}`


To change the hover add this:
`span.nggve img:hover {background:none;}`


You can add/change as much or as little of the style as you want.

**4. *Optionally* (but very recommended): follow the intructions under [Other Notes](http://wordpress.org/extend/plugins/ngg-video-extend/other_notes/) on how to ensure this plugin only loads on the pages it needs to.**

== Frequently Asked Questions ==

= What types of video are supported? =

YouTube, Vimeo, Viddler, Metacafe etc as well as external and self-hosted asf, avi, dv, f4v, flv, moov, mov, movie, mp4, mpg, mpeg, swf, wm and wmv.

= When I click on a thumbnail, just the image pops up with no video but I can see another lightbox in the background =

You need to change the NextGEN Gallery Effects - go to NextGEN Gallery 'Options' > 'Effects' tab. Choose "Lightbox" from the 'JavaScript Thumbnail effect' dropdown and Save Changes.

= The video is just black with a YouTube link =

This is because you need to use the YouTube embed URL. Most likely you used the URL that looks like `http://www.youtube.com/watch?v=12345` - you need to click on the embed button on YouTube and copy the URL that looks like `http://www.youtube.com/embed/12345` or `http://www.youtube.com/v/12345`.

= A Vimeo video starts to load but then goes to the Vimeo website =

This is the same problem above. Instead of using the video's page url (e.g. `http://vimeo.com/12345`), click the embed button and copy the url that looks like `http://player.vimeo.com/video/12345`.

= When trying to play an FLV video, it prompts me to save/download the file instead of playing it =

You need to check the Shadowbox JS settings - ensure that FLV is checked (ticked) under "Players", "Enable FLV Support" is set to true and "FLV Links" under 'Shadowbox Automation' is also set to true.

= I get a "Video not found or access denied" =

Make sure the URL of the video is correct. If you are using a relative link try putting a '/' at the beginning e.g. '[flv]/video/myvideo.flv[/flv]'. If you still don't get any satisfaction, use the full path URL just to be on the safe side. 

= It doesn't load the video and the thumbnail image appears instead =

Check the shortcode is correct and that there's no text or extra square brackets before the [shortcode].

= After updating to 1.4, it doesn't load the video and the thumbnail image appears instead =

The shortcode changed between 1.3 and 1.4 so now you only need one shortcode no matter what type of video you use. Check your shortcodes are [nggvid][/nggvid].

= It's not working on my single image [singlepic id=x]! =

You have to wrap the shortcode in `<span class="ngg-gallery-thumbnail nggve"></span>` i.e. `<span class="ngg-gallery-thumbnail nggve">[singlepic id=x]</span>`. Please look at the Usage instructions under [Installation](http://wordpress.org/extend/plugins/ngg-video-extend/installation/) for more information.

= After wrapping my [singlepic] shortcode as above, the image now sits to the left and text gets pulled up beside it =

EITHER:

* Add a style attribute to the span tag e.g. `style="float:none;"` so it looks like `<span class="ngg-gallery-thumbnail nggve" style="float:none;">[singlepic id=x]</span>`

OR

* Add the following code to your template's style.css: `span.nggve {float:none !important;}`. This is the preferable option as it will mean you don't have to add the style attribute to each and every single NGG image you have.

= After wrapping my [singlepic] shortcode as above, I don't like the way the image border/background/hover/etc looks =

Follow the above instructions as for the style.css `float:none` but add whatever CSS you like e.g.
`span.nggve img {background:none; border:2px solid #f00;}
span.nggve img:hover{background:#ff0;}`



= Do I have to use Shadowbox JS?! =

Yes, as Shadowbox JS can do video within the lighbox frame which many other lighboxes cannot. Plus it's pwetty!

== Screenshots ==

1. An example of a YouTube video
2. A Vimeo video
3. An FLV video
4. Showing use of the \[shortcode\] in a Gallery 

== Changelog ==

= 1.4.2 =
* Fixed a bug which caused any non-video (aka any image) to be resized to the video proportions.

= 1.4.1 =
* Altered the javascript so that it does not replace things without taking care! As a result the navigation should now work.

= 1.4 =
* Changed the shortcode to [nggvid][/nggvid] so no more multiple different shortcodes needed.
* As a consequence of above, the javascript is now MUCH more efficient. YAY.

= 1.3.4 =
* Now works with all types of NextGEN Gallery shortcodes rather than just [gallery id=x]. Oops!
* Updated the instructions to reflect the changes.

= 1.3.3 =
* Added FLV video support.

= 1.3.2 =
* Cleaned up the php.
* Got rid of that damn "The plugin generated -however many- characters of unexpected output during activation" that was driving me nuts.

= 1.3.1 =
* Added comments for future FYI.

= 1.3 =
* Improvements to spit out fancy error messages if NextGEN Gallery and/or Shadowbox JS aren't enabled.

= 1.2 =
* Rewrote the javascript to make it much betterer!

= 1.1 =
* Improved the method of inserting the javascript in the footer.

= 1.0 =
* Initial version. Idea based on ["Wordpress Video Galleries with NextGen and jQuery"](http://blog.creonfx.com/javascript/wordpress-video-galleries-with-nextgen-and-jquery/) by Peter Velichkov.

== Upgrade Notice ==

= 1.4 =
Changed the shortcode to [nggvid][/nggvid]. Please ensure that you update your shortcodes accordingly! This also makes the plugin more efficient.

== Optional but recommended ==

To make sure that NGG Video Extend only loads on the gallery pages it needs to, add the following code to your template's functions.php:

`// Restrict NGG Video Extend javascript to ONLY the page(s) it needs to

add_action( 'wp_print_scripts', 'nggve_deregister_javascript', 100 );
function nggve_deregister_javascript() {
	if ( ! is_singular(array( 'my-gallery' ))  ) {
		wp_deregister_script( 'ngg-video-extend' );
	}
}`


*Explanation:* Basically this code reads -

	do the following stuff:
		if not the singular page/post "My Gallery"
		then don't use the NGG Video Extend script.


'my-gallery' is the page slug of the page you used the NextGEN Gallery shortcode on.

If you have more than one page that you need to load it on, change the 3rd line to:

`if ( ! is_singular(array( 'my-gallery', 'second-gallery', 'photos' ))  ) {`

Where 'my-gallery', 'second-gallery' etc are the page slugs of the pages/posts you want to use.

Please note that this will get rid of the script on things like category view pages and thus post exerpts etc. If you want slightly different functionality (such as only working on certain categories, everything *except* the main page etc), you will need to change the `! is_singular`. You can read about WP Conditional Tags here: http://codex.wordpress.org/Conditional_Tags.