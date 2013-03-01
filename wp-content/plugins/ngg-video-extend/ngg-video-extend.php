<?php
/*
Plugin Name: NGG Video Extend
Description: Addon plugin for Nextgen Gallery that adds the ability to have video lightboxes. Requires <a href="http://wordpress.org/extend/plugins/nextgen-gallery/" target="_blank">NextGEN Gallery</a> and <a href="http://wordpress.org/extend/plugins/shadowbox-js/" target="_blank">Shadowbox JS</a>
Version: 1.4.2
Author: Mark & Samantha Fisher / Liquid Silver
Author URI: http://www.liquidsilver.net.nz
License: GPL2

    Copyright 2010  Mark & Samantha Fisher  (email : info@liquidsilver.net.nz)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php

function plugin_is_active( $plugin_path ) {//lets have a lookie at what plugins are enabled
	$return_var = in_array( $plugin_path, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
	return $return_var;
}

function nggve_update_msg(){
	if ( isset( $_GET['upgrade-plugin'] ) && isset( $_GET['ngg-video-extend'] ) ) {// .../wp-admin/update.php?action=upgrade-plugin&plugin=ngg-video-extend%2Fngg-video-extend.php&_wpnonce=xxxxx...
		add_action( 'admin_notices', 'nggve_upgrade_shortcode_notice' );
		function nggve_upgrade_shortcode_notice() {
			echo '<div class="error"><p>IMPORTANT: NGG Video Extend now only uses one shortcode for <i>all</i> types of video - <b>[nggvid][/nggvid]</b>. Please make sure you update your shortcode!</p></div>';
		}
	}
}

register_activation_hook( __FILE__, 'nggve_update_msg' );

if ( plugin_is_active( 'nextgen-gallery/nggallery.php' ) && plugin_is_active( 'shadowbox-js/shadowbox-js.php' ) ) {//have to make sure both NextGEN Gallery and Shadowbox JS are enabled
	add_action( 'wp_footer', 'nggve_scripts' );
}

function nggve_scripts() {
	wp_register_script( 'ngg-video-extend', plugins_url ( 'ngg-video-extend.js', __FILE__ ), array( 'jquery' ), '', true );
	wp_print_scripts( 'ngg-video-extend' );
}

if ( ! plugin_is_active( 'nextgen-gallery/nggallery.php' ) ) {//if NextGEN Gallery isn't enabled, spit out an error message
	add_action( 'admin_notices', 'nggve_ngg_enabled_error' );
	function nggve_ngg_enabled_error() {
		echo '<div class="error"><p><b>NGG Video Extend not activated!</b> The required <a href="http://wordpress.org/extend/plugins/nextgen-gallery/" target="_blank">NextGEN Gallery</a> plugin is not installed and/or activated.</p></div>';
	deactivate_plugins( plugin_basename( __FILE__ ) );//and deactivate ourselves
	unset( $_GET['activate'] );//get rid of that nasty "Plugin enabled" message that just simply isn't true
	}
}

if ( ! plugin_is_active( 'shadowbox-js/shadowbox-js.php' ) ) {//if Shadowbox JS isn't enabled, let the people know it ain't a happening thing
	add_action( 'admin_notices', 'nggve_shadowbox_enabled_error' );
	function nggve_shadowbox_enabled_error() {
		echo '<div class="error"><p><b>NGG Video Extend not activated!</b> The required <a href="http://wordpress.org/extend/plugins/shadowbox-js/" target="_blank">Shadowbox JS</a> plugin is not installed and/or activated.</p></div>';
	deactivate_plugins( plugin_basename( __FILE__ ) );//and deactivate ourselves
	unset( $_GET['activate'] );//suppress that naughty "Plugin enabled" message on this one too
	}
}
?>