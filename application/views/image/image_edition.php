<div class="image_full">
	<img src="<?php echo IMAGE_FOLDER . $aImage->file_name; ?>" />
</div>
<div class="image_categories">
	<ul>
		<?php foreach($aImage->categories as $aCategory) { ?>
		<li>
			<?php echo $aCategory->name; ?>
		</li>
		<?php } ?>
	</ul>
</div>
<div class="row-fluid">
	<div class="span3"></div>
	<div class="edit_button btn span3">
		Edit categories
	</div>
	<div class="back_button btn span3">
		Back to the catalog
	</div>
	<div class="span3"></div>
</div>