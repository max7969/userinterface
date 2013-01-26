<div class="container">
	<div class="row">
		<div class="span3 bs-docs-sidebar">
			<ul class="nav nav-list bs-docs-sidenav affix containerCategories">
				<?php foreach ($aCategories as $aCategory) { ?>
					<?php $this->load->view('category/category_item',$aCategory); ?>
				<?php } ?>
	        </ul>
		</div>
		<div class="span9 containerImages">
		</div>
	</div>
</div>


