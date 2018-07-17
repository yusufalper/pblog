<div class="div-categories">
	<div >
		<?php foreach ($viewModel as $item): ?>
			<form method="POST" action="<?php echo ROOT_PATH; ?>categories/selected">
				<input type="hidden" name="cid" class="form-control" value="<?php echo $item['id'] ?>" />
				<input class="btn btn-danger category-button" name="submit" type="submit" value= "<?php echo $item['name']; ?>"/>
			</form>

		<?php endforeach;?>
	</div>
</div>