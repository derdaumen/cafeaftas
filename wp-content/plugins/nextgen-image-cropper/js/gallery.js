jQuery(document).ready(function($) {
			
	// Insert the crop link into NextGen image actions
	$('.gallery_page_nggallery-manage-gallery #ngg-listimages tbody tr').each(function(index) {
		var rowID = $(this).attr('id'),
			pictureID = '';
		
		if(rowID) {
			pictureID = rowID.replace('picture-','');
		
			// Crop Action link
			actionrow = $(this).find('.row-actions');
			$('<span class="crop"> | <a href="' + ngg_crop.plugin_path + 'ajax/imagecrop.php?pictureID=' + pictureID + '" class="ngg_crop_dialoglink" title="Crop">Crop</a></span>').appendTo(actionrow);
		}
	});
	
	$('a.ngg_crop_dialoglink').click(function() {
		var thelink = $(this),
			dialog = $('<div id="ngg_crop_dialog" style="display:hidden"></div>').appendTo('body');
		
        if( $( "#spinner" ).length == 0) {
            $("body").append('<div id="spinner"></div>');
		}

        $('#spinner').fadeIn();
		
        // load the remote content
        dialog.load(thelink.attr('href'), function () {
			$('#spinner').hide();
            dialog.dialog({
            	title: thelink.attr('title'),
                width: 'auto',
                height: 'auto',
				position: [100,100],
                modal: true,
                resizable: true,
                close: function() { dialog.remove(); }
			});
			
			jcropoptions = {
				setSelect	:	[20,20,ngg_crop.crop_width, ngg_crop.crop_height],
				aspectRatio	:	ngg_crop.aspect,
				boxWidth	:	ngg_crop.imagesize,
				minSize		:	[ngg_crop.crop_width, ngg_crop.crop_height],
				onChange	:	showCoords,
				onSelect	:	showCoords};				
			
			$('#cropthis').Jcrop(jcropoptions);
		});
		
        //prevent the browser to follow the link
        return false;
    });
	
	// Use preselected crop
	$('.ngg_crop input#usepreselected').live('click', function() {
		// Retrieve the Jcrop object
		jcrop = $('#cropthis').data('Jcrop');
		
		if($(this).is(':checked')) {
			$('.ngg_crop #lockaspect').prop('disabled','disabled');
			$('.ngg_crop #lockaspect').prop('checked',true);
			
			// Set selection size
			jcrop.setOptions({setSelect	:	[20,20,ngg_crop.crop_width, ngg_crop.crop_height]});
			jcrop.setOptions({aspectRatio:	ngg_crop.aspect});
		}
		else {		
			$('.ngg_crop #lockaspect').prop('disabled',false);
			$('.ngg_crop #lockaspect').prop('checked',false);
			jcrop.setOptions({aspectRatio:	null});
		}
		
		// Save the new jcrop options
		$('#cropthis').data('Jcrop', jcrop);		
	});
	
	$('.ngg_crop input#lockaspect').live('click', function() {
		// Retrieve the Jcrop object
		jcrop = $('#cropthis').data('Jcrop');
		
		if($(this).is(':checked')) {
			theselect = jcrop.tellSelect();
			current_aspect = (theselect.w / theselect.h);
			jcrop.setOptions({aspectRatio:	current_aspect});
		}
		else {		
			$('.ngg_crop #lockaspect').prop('disabled',false);
			jcrop.setOptions({aspectRatio:	null});
		}
		
		// Save the new jcrop options
		$('#cropthis').data('Jcrop', jcrop);
	});
	
	
	$('.ngg_crop_form').live('submit', function(e, params) {
		var formurl = $(this).attr('action'),
			post = $(this).serialize(),
			dialog = $('#ngg_crop_dialog'),
			jcrop = $('#cropthis').data('Jcrop'),
			trackerwidth = $('.jcrop-tracker').width();
			
		$.post(formurl, post, function(response) {
			
			if(response) {
				dialog.prepend('<div class="error">' + response + '</div>');
			}
			else {								   
				// Add success message
				dialog.find('.ngg_crop_data').html('<div class="updated"><p>Image Updated.&nbsp;&nbsp;Please clear your browser cache.</p></div>');
				
				jcrop.destroy();
				
				// Update the image
				dialog.find('img').each(function(index) {
					oldsrc = $(this).attr('src');
					srcsplit = oldsrc.split('?');
					newsrc = srcsplit[0] + '?' + Math.random(0,10000);	
					$(this).attr('src',newsrc);
					$(this).attr('width',trackerwidth);
				});				
			}
		});
		
		return false;
	});	
});

// Simple event handler, called from onChange and onSelect
// event handlers, as per the Jcrop invocation above
function showCoords(c) {
	jQuery('#x1').val(c.x);
	jQuery('#y1').val(c.y);
	jQuery('#x2').val(c.x2);
	jQuery('#y2').val(c.y2);
	jQuery('#cropwidth').val(c.w);
	jQuery('#cropheight').val(c.h);
}