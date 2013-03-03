<?php
/**
 * Template Name: Gallery
 * Description: A Page Template to display a gallery
 *
 * @package WordPress
 * @subpackage Cafe_Aftas
 * @since Cafe Aftas 1.0
 */

get_header(); ?>

		<div id="primary" class="gallery">
			<!--- <div id="content-bg" class="content-bg">
    			<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
					has_post_thumbnail( $post->ID ) &&
					( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
					$image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
				else : ?>
				<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
    		</div> --> <!--! end of #content-bg -->
			<div id="gallery" role="main" class="full">
				
				<?php if ( function_exists( 'the_content_part' ) ) {
					the_content_part( 1 );
				} else {
					the_content();
				}
				?>

			</div><!-- #gallery -->
		</div><!-- #primary -->
		
<?php // get_sidebar(); ?>
<?php get_footer(); ?>