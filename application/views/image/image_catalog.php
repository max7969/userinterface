<div class="row">
	<?php $iCount = 0; ?>
	<?php foreach ($aImages as $aImage) { ?>
		<?php if ( $iCount%3 == 0 && $iCount != 0) { ?>
			</div>
			<div class="row">
		<?php } ?>
		<div class="span3">
			<?php $this->load->view('image/image_item',$aImage); ?>
		</div>
	<?php $iCount = $iCount + 1; ?>
	<?php } ?>
</div>
