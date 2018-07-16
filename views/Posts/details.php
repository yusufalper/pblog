<div>
	<?php if (isset($_SESSION['is_logged_in'])): ?>
	<a class="btn btn-warning btn-posts" href="<?php echo ROOT_PATH; ?>posts/add">New Post</a>
	<?php endif;?>

            <div class="div-posts div-details">
                <h3> <?php echo $viewModel['title']; ?> </h3>
				<small> <?php echo $viewModel['post_date'] ?> </small>
				<small> <?php echo $viewModel['tags'] ?> </small>
				<p><?php echo $viewModel['description'] ?></p>
                <p><?php echo $viewModel['content'] ?></p>
				
				<!-- DETAILS BOTTOM -->
				<div class="div-details-bottom">
					<div>
						<a href="<?php echo ROOT_PATH; ?>posts"><i class="fa fa-thumbs-up"></i></a>
					</div>
					<div class="div-details-buttons">
						<a class="btn btn-danger btn-posts" href="<?php echo ROOT_PATH; ?>posts">Go Back To Posts</a>
						<a class="btn btn-warning btn-posts" href="<?php echo $viewModel['source_link'] ?>">Go To The Source</a>
					</div>
				</div>
			</div>
</div>