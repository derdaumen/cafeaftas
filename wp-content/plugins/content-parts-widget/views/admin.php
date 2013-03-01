<!-- This file is used to markup the administration form of the widget. -->

		<p>
			<label for="<?php echo $this->get_field_id( 'content_part' ); ?>"><?php _e( 'Content Part:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'content_part' ); ?>" name="<?php echo $this->get_field_name( 'content_part' ); ?>" type="text" value="<?php echo $content_part; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'width:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo $width; ?>" />
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'margin' ); ?>"><?php _e( 'Margin:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" value="<?php echo $margin; ?>" />
			<label for="<?php echo $this->get_field_id( 'padding' ); ?>"><?php _e( 'Padding:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'padding' ); ?>" name="<?php echo $this->get_field_name( 'padding' ); ?>" type="text" value="<?php echo $padding; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'css-class' ); ?>"><?php _e( 'CSS Class:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'css-class' ); ?>" name="<?php echo $this->get_field_name( 'css-class' ); ?>" type="text" value="<?php echo $css_class; ?>" />
		</p>