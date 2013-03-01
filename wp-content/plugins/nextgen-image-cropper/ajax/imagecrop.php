<?php
require_once '../config.php';
require_once(nggGallery::graphic_library());

// Pull the image from the NextGen DB
$pictureID = $_REQUEST['pictureID'];
$pic = nggdb::find_image($pictureID);

// If Processing the Crop
if(!empty($_POST['ngg_crop'])) {
	$image = new ngg_Thumbnail($pic->imagePath, TRUE);
	
	// Create backup
	@copy($image->fileName, $image->fileName . '_backup');
	
	$image->crop($_POST['ngg_crop']['x1'], $_POST['ngg_crop']['y1'], $_POST['ngg_crop']['cropwidth'], $_POST['ngg_crop']['cropheight']);
	$image->save($image->fileName);
	
	// Save the new MetaData
	nggdb::update_image_meta($pictureID, array(
											'width'		=>	$_POST['ngg_crop']['cropwidth'],
											'height'	=>	$_POST['ngg_crop']['cropheight']));
		
	
	exit;
}
?>

<div class="ngg_crop">
<form class="ngg_crop_form" action="<?=$_SERVER['REDIRECT_URL']?>" method="post">
	<input type="hidden" id="pictureID" name="pictureID" value="<?=$pictureID?>">
	<input type="hidden" id="cropprocess" name="ngg_crop[cropprocess]" value="1">
	<input type="hidden" id="x1" name="ngg_crop[x1]" />
	<input type="hidden" id="y1" name="ngg_crop[y1]" />
	<input type="hidden" id="x2" name="ngg_crop[x2]" />
	<input type="hidden" id="y2" name="ngg_crop[y2]" />
<table cellspacing="3">
	<tr>
		<td class="ngg_crop_image">
			<img src="<?=$pic->imageURL . '?' . rand(0,10000)?>" id="cropthis" style="display: none">
		</td>
		<td class="ngg_crop_data" style="vertical-align: top; padding: 5px">
			<div class="postbox metabox-holder">
				<h3>
					<span>Select the area to crop</span>
				</h3>
				<br>
				<table cellspacing="3">
					<tbody>
					<tr>
						<td colspan="2">
							<input type="checkbox" name="ngg_crop[optimizeforhome]" id="usepreselected" value="1" checked="checked">&nbsp;<b>Use pre-selected size</b>
						</td>
					</tr>	
					<tr>
						<td colspan="2">
							<input type="checkbox" name="ngg_crop[lockaspect]" id="lockaspect" value="1" checked="checked" disabled="disabled">&nbsp;<b>Lock Aspect Ratio</b>
						</td>
					</tr>					
					<tr>
						<th>Selected Width</th>
						<td>
							<input type="text" size="4" id="cropwidth" name="ngg_crop[cropwidth]" readonly="readonly" style="background-color: #F2F2F2" />px
						</td>
					</tr>
					<tr>
						<th>Selected Height</th>
						<td>
							<input type="text" size="4" id="cropheight" name="ngg_crop[cropheight]" readonly="readonly" style="background-color: #F2F2F2" />px
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="ngg_crop[cropsubmit]" value="Save">
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</td>
	</tr>
</table>
</form>
</div>