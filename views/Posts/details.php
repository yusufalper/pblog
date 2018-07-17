<div>
	<div class="div-posts div-details">
		<h3> <?php echo $viewModel['title']; ?> </h3>
		<small> <?php echo $viewModel['post_date'] ?> </small>
		<small> <?php echo $viewModel['tags'] ?> </small>
		<p><?php echo $viewModel['description'] ?></p>
		<p><?php echo $viewModel['content'] ?></p>

		<!-- DETAILS BOTTOM -->
		<div>
			<div class="div-details-bottom">
				<form method="POST" action="<?php echo ROOT_PATH; ?>posts/delete">
					<?php if (isset($_SESSION['is_logged_in'])): if ($_SESSION['user_data']['id'] == $viewModel['user_id']): ?>
						<input type="hidden" name="xid" class="form-control" value="<?php echo $viewModel['id'] ?>" />
						<input class="btn btn-danger btn-posts" name="submit" type="submit" value="Delete this Post" />
					<?php endif; endif;?>
				</form>
			</div>
			<div class="div-details-buttons">
				<?php if ($_SESSION['user_data']['id'] == $viewModel['user_id']): ?>
					<a class="btn btn-primary btn-posts" href="<?php echo ROOT_PATH; ?>posts/myposts">Go to My Posts</a>
				<?php endif;?>
				<a class="btn btn-warning btn-posts" href="<?php echo ROOT_PATH; ?>posts">Go to Posts</a>
				<a class="btn btn-info btn-posts" href="<?php echo $viewModel['source_link'] ?>">Go To The Source</a>
			</div>
		</div>
	</div>
</div>