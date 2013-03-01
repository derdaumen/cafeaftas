<?php
/*
Plugin Name: Content Parts Widget
Plugin URI: none
Description: A widget to display content parts created through the content parts plugin in the sidebar.
Version: 0.1
Author: Stephan Pfaff
Author URI: http://stephanpfaff.com
Author Email: info@stephanpfaff.com
License:

  Copyright 2012 Stephan Pfaff (info@stephanpfaff.com)

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

// TODO: change 'Plugin_Name' to the name of your actual plugin
class Content_Parts_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/
	
	/**
	 * The widget constructor. Specifies the classname and description, instantiates
	 * the widget, loads localization files, and includes necessary scripts and
	 * styles.
	 */
  // TODO: This should match the title given in the class definition above.
	function Content_Parts_Widget() {

    // Define constnats used throughout the plugin
    $this->init_plugin_constants();
  
    // TODO: update classname and description
		$widget_opts = array (
			'classname' => content_parts_widget, 
			'description' => __('A widget to display content parts of posts in the sidebar.', PLUGIN_LOCALE)
		);	
		
		$this->WP_Widget(PLUGIN_SLUG, __(PLUGIN_NAME, PLUGIN_LOCALE), $widget_opts);
		load_plugin_textdomain(PLUGIN_LOCALE, false, dirname(plugin_basename( __FILE__ ) ) . '/lang/' );
		
    // Load JavaScript and stylesheets
    $this->register_scripts_and_styles();
		
	} // end constructor

	/*--------------------------------------------------*/
	/* API Functions
	/*--------------------------------------------------*/
	
	/**
	 * Outputs the content of the widget.
	 *
	 * @args			The array of form elements
	 * @instance
	 */
	function widget($args, $instance) {
	
		extract($args, EXTR_SKIP);
		
		echo $before_widget;
		
    // TODO: This is where you retrieve the widget values
    
    	$content_part =  $instance['content_part'];
		$width =  $instance['width'];
		$height =  $instance['height'];
		$margin =  $instance['margin'];
		$padding =  $instance['padding'];
		$css_class =  $instance['css-class'];
    
		// Display the widget
		include(WP_PLUGIN_DIR . '/' . PLUGIN_SLUG . '/views/widget.php');
		
		echo $after_widget;
		
	} // end widget
	
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @new_instance	The previous instance of values before the update.
	 * @old_instance	The new instance of values to be generated via the update.
	 */
	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
		
    // TODO Update the widget with the new values
    
		$instance['content_part'] = (int) $new_instance['content_part'];
		$instance['width'] = (int) $new_instance['width'];
		$instance['height'] = (int) $new_instance['height'];
		$instance['margin'] = $new_instance['margin'];
		$instance['padding'] = $new_instance['padding'];
		$instance['css-class'] = $new_instance['css-class'];
		return $instance;
		
	} // end widget
	
	/**
	 * Generates the administration form for the widget.
	 *
	 * @instance	The array of keys and values for the widget.
	 */
	function form($instance) {
	
    // TODO define default values for your variables
		$instance = wp_parse_args(
			(array)$instance,
			array(
				'content_part' => 4,
				'width' => 305,
				'height' => 267,
				'margin' => '0',
				'padding' => '0',
				'css-class' => ''
			)
		);
	
    // TODO store the values of widget in a variable
    
    	if ( $instance ) {
			$content_part = esc_attr( $instance[ 'content_part' ] );
			$width = esc_attr( $instance[ 'width' ] );
			$height = esc_attr( $instance[ 'height' ] );
			$margin = esc_attr( $instance[ 'margin' ] );
			$padding = esc_attr( $instance[ 'padding' ] );
			$css_class = esc_attr( $instance[ 'css-class' ] );
		}
		else {
			$content_part = __( 4, 'content_part' );
			$width = __( 305, 'width' );
			$height = __( 203, 'height' );
			$margin = __( '0', 'margin' );
			$padding = __( '0', 'padding' );
			$css_class = __( '', 'css-class' );
		}
		
		// Display the admin form
    include(WP_PLUGIN_DIR . '/' . PLUGIN_SLUG . '/views/admin.php');
		
	} // end form
	
	/*--------------------------------------------------*/
	/* Private Functions
	/*--------------------------------------------------*/
	
  /**
   * Initializes constants used for convenience throughout 
   * the plugin.
   */
  private function init_plugin_constants() {
    
    /* TODO
     * 
     * This provides the unique identifier for your plugin used in
     * localizing the strings used throughout.
     * 
     * For example: wordpress-widget-boilerplate-locale.
     */
    if(!defined('PLUGIN_LOCALE')) {
      define('PLUGIN_LOCALE', 'content-parts-widget-locale');
    } // end if
    
    /* TODO
     * 
     * Define this as the name of your plugin. This is what shows
     * in the Widgets area of WordPress.
     * 
     * For example: WordPress Widget Boilerplate.
     */
    if(!defined('PLUGIN_NAME')) {
      define('PLUGIN_NAME', 'Content Parts Widget');
    } // end if
    
    /* TODO
     * 
     * this is the slug of your plugin used in initializing it with
     * the WordPress API.
     
     * This should also be the
     * directory in which your plugin resides. Use hyphens.
     * 
     * For example: wordpress-widget-boilerplate
     */
    if(!defined('PLUGIN_SLUG')) {
      define('PLUGIN_SLUG', 'content-parts-widget');
    } // end if
  
  } // end init_plugin_constants
  
	/**
	 * Registers and enqueues stylesheets for the administration panel and the
	 * public facing site.
	 */
	private function register_scripts_and_styles() {
		if(is_admin()) {
      $this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/js/admin.js', true);
			$this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/css/admin.css');
		} else { 
      $this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/js/admin.css', true);
			$this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/css/widget.css');
		} // end if/else
	} // end register_scripts_and_styles

	/**
	 * Helper function for registering and enqueueing scripts and styles.
	 *
	 * @name	The 	ID to register with WordPress
	 * @file_path		The path to the actual file
	 * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
	 */
	private function load_file($name, $file_path, $is_script = false) {
		
    $url = WP_PLUGIN_URL . $file_path;
		$file = WP_PLUGIN_DIR . $file_path;
    
		if(file_exists($file)) {
			if($is_script) {
				wp_register_script($name, $url);
				wp_enqueue_script($name);
			} else {
				wp_register_style($name, $url);
				wp_enqueue_style($name);
			} // end if
		} // end if
    
	} // end load_file
	
} // end class
add_action('widgets_init', create_function('', 'register_widget("Content_Parts_Widget");')); // TODO remember to change this to match the class definition above
?>