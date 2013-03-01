<?php
	if ( function_exists( 'the_content_part' )) {
		$pos = strpos($css_class, 'logo');
		
		if($pos === false) {
			the_content_part( $content_part, '<div class="content-area '.$css_class.'" style="width:'.$width.'px; height:'.$height.'px; margin:'.$margin.'; padding:'.$padding.';">', '</div>' );
		}
		else {
			the_content_part( $content_part, '<div class="content-area '.$css_class.'" style="width:'.$width.'px; height:'.$height.'px; margin:'.$margin.'; padding:'.$padding.';">', '<a class="home-link" href="'.get_bloginfo('url').'"><div class=logo></div></a></div>' );
		}
	} else {
		
	}
?>