<?php
/**
 * Cafe Aftas functions and definitions
 *
 * @package CafeAftas
 * @subpackage Cafe_Aftas
 * @since Cafe Aftas 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'twentyeleven_setup' );

if ( ! function_exists( 'twentyeleven_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyeleven_setup() in a child theme, add your own twentyeleven_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_setup() {

	/* Make Twenty Eleven available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'twentyeleven' to the name of your theme in all the template files.
	 */
	//TODO replace hardcoded parent template url with get_template_directory() --> currently returns child url 
	load_theme_textdomain( 'twentyeleven', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Grab Twenty Eleven's Ephemera widget.
	require( get_template_directory() . '/inc/widgets.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// The next four constants set how Twenty Eleven supports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header.
	// Add a filter to twentyeleven_header_image_width and twentyeleven_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 625 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 486 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Twenty Eleven's custom image sizes
	add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
	add_image_size( 'small-feature', 305, 229, true); // Used for featured posts if a large-feature doesn't exist


	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyeleven_admin_header_style(), below.
	//add_custom_image_header( 'twentyeleven_header_style', 'twentyeleven_admin_header_style', 'twentyeleven_admin_header_image' );
	
	$thumb2 = new MultiPostThumbnails(array(
		'label' => 'Sidebar Image',
		'id' => 'sidebar-image',
		'post_type' => 'page'
		)
	);
	add_image_size('post-sidebar-image-thumbnail', 305, 229, true);

	// ... and thus ends the changeable header business.
	
}
endif; // twentyeleven_setup


if ( ! function_exists('cafeaftas_post_color')) :
/**
 * Returns the color custom-field that defines the color scheme
 *
 * @since Cafe Aftas 1.0
 */
function cafeaftas_post_color($post_id) {
	$page_color = get_post_meta($post_id, 'color', true);
	if ($page_color == null) {
		return "";
	} else {
		return $page_color;
	}
}
endif; // twentyeleven_setup


function addFirstLastClass($pageList) {  
  
 // pattern to focus on just lis  
 $allLisPattern = '/<li(.*)<\/li>/s';  
 preg_match($allLisPattern,$pageList,$allLis);  
 $liClassPattern =  "/<li[^>]+class=\"([^\"]+)/i";  
  
 // first let's break out each li  
 $liArray = explode("\n", $allLis[0]);  
  
 // count to get last li  
 $liArrayCount = count($liArray);  
  
 preg_match($liClassPattern, $liArray[0], $firstMatch);  
 $newFirstLi = str_replace($firstMatch[1], $firstMatch[1] . " first-menu-item", $liArray[0]);  
  
 if($liArrayCount > 1){  
 $lastLiPosition = $liArrayCount - 1;  
  
 preg_match($liClassPattern, $liArray[$lastLiPosition], $lastMatch);  
 $newFirstLi = str_replace($firstMatch[1], $firstMatch[1] . " first-menu-item", $liArray[0]);  
 $newLastLi = str_replace($lastMatch[1], $lastMatch[1] . " last-menu-item", $liArray[$lastLiPosition]);  
 }  
  
 // replace first and last of the li array with new lis  
 // rebuild newPageList  
 // set first li  
 $newPageList = $newFirstLi . ''; 
 $i = 1; 
 while ($i < $lastLiPosition) { 
 $newPageList .= $liArray[$i]; 
 $i++; 
 } 
 // set last li 
 $newPageList .= $newLastLi; 
 
 // lastly, replace old list with new list 
 $pageList = str_replace($allLis[0], $newPageList, $pageList); 
 return $pageList; 
} 
add_filter('wp_nav_menu', 'addFirstLastClass');


// automatically add colorbox rel attributes to embedded images
function insert_colorbox_rel($content) {
	$pattern = '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
  	$replacement = '<a$1href="$2.$3" rel=\'colorbox\'$4>';
	$content = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content', 'insert_colorbox_rel' );

