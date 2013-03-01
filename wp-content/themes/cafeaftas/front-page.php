<?php
/**
 * The template for displaying the front-page 
 *
 * @package WordPress
 * @subpackage Cafe_Aftas
 * @since Cafe Aftas 1.0
 */

get_header(); ?>

    <div id="primary" class="front-page">
		<div id="content" role="main">
	    	<div id="teaser-left" class="teaser clearfix">
	    		<div id="img-teaser-left" class="teaser-img"><a href="<?php get_bloginfo('url')?>./surf-school/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/teaser_cdv_with_logo.jpg" alt="Chasseurs De Vagues" /></a></div>
	    		<!-- <div id="logo-teaser-left" class="absolute-centered-logo"><a href="#"><img src="img/cdv-logo-mid.png" alt"Chasseurs de Vagues" /></a></div> -->
	    		<div id="teaser-caption-left" class="caption"><div id="teaser-caption-left-text" class="caption-text"><h1>Surf School "Chasseurs De Vagues"</h1></div></div>
	    	</div>
	    	<div id="teaser-middle" class="teaser clearfix">
	    		<div id="img-teaser-middle" class="teaser-img"><a href="<?php get_bloginfo('url')?>./mirleft-la-plage-aftas/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/teaser_wtm.jpg" alt="Welcome to Moroco" /></a></div>
	    		<!-- <div id="logo-teaser-middle" class="absolute-centered-logo"></div> -->
	    		<div id="teaser-caption-middle" class="caption"><div id="teaser-caption-middle-text" class="caption-text"><h1>Bienvenue au Maroc</h1></div></div>
	    	</div>
	    	<div id="teaser-right" class="teaser clearfix">
	    		<div id="img-teaser-right" class="teaser-img"><a href="<?php get_bloginfo('url')?>./cafe-aftas/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/teaser_ca_with_logo.jpg" alt="Café Aftas" /></a></div>
	    		<!-- <div id="logo-teaser-right" class="absolute-centered-logo"><a href="#"><img src="img/ca-logo-mid.png" alt"Café Aftas" /></a></div> -->
	    		<div id="teaser-caption-right" class="caption"><div id="teaser-caption-right-text" class="caption-text"><h1>Café Aftas</h1></div></div>
	    	</div>
	 </div><!-- content -->
	</div><!-- #primary -->
    <?php get_footer(); ?>
    
