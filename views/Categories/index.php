<h2>Categories</h2>
<div class="div-categories">
	<?php foreach ($viewModel as $item): ?>
	<form method="POST" action="<?php echo ROOT_PATH; ?>categories/selected">
		<input type="hidden" name="cid" class="form-control" value="<?php echo $item['category_id'] ?>" />
		<input class="btn btn-danger category-button" name="submit" type="submit" value="<?php echo $item['cat_name']; ?>" />
	</form>

	<?php endforeach;?>
</div>