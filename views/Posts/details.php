<div>
	<div class="div div-details">
		<?php 
		if (isset($_POST['xid'])) {
			$_SESSION['post_id'] = $_POST['xid']; 
		}
		foreach ($viewModel as $item):
			if (!isset($item['title'])) {
				$item=$viewModel;
			}
			?>
			<h3>
				<?php echo $item['title'];  ?>
			</h3>
			<small> <?php echo $item['post_date'] ?> </small>
			<small> <?php echo $item['tags'] ?> </small>
			<p> <?php echo $item['description'] ?> </p>
			<p> <?php echo $item['content'] ?> </p>
			<input type="hidden" name="order" value="<?php echo $item['title']; ?>">
			<?php
				if ($item[0]['post_id'] == $item[1]['post_id']) {
					break;
				}
		endforeach; ?>
		<!-- DETAILS BOTTOM -->
		<div>
			<div class="div-details-bottom">
				<?php if (($_SESSION['user_data']['id']) == ($_SESSION['post_user_id'])) {?>
					<form method="POST" action="<?php echo ROOT_PATH; ?>posts/delete">
						<input type="hidden" name="did" class="form-control" value="<?php echo $item['post_id'] ?>" />
						<input class="btn btn-danger btn-posts" name="submit" type="submit" value="Delete this Post" />

					</form>
				<?php } ?>
			</div>
			<div class="div-details-buttons">
				<?php if (isset($_SESSION['is_logged_in'])) : if ($_SESSION['user_data']['id'] == $_SESSION['post_user_id']): ?>
					<a class="btn btn-primary btn-posts" href="<?php echo ROOT_PATH; ?>posts/myposts">Go to My Posts</a>
				<?php endif; endif;?>
				<a class="btn btn-warning btn-posts" href="<?php echo ROOT_PATH; ?>posts">Go to Posts</a>
				<a class="btn btn-info btn-posts" href="<?php echo $item['source_link'] ?>">Go To The Source</a>
			</div>
		</div>
		<div>
			<div class="div div-details-comment">
			<?php if (isset($_SESSION['is_logged_in'])) : ?>
				<!--add comment-->
				<h2>Comments</h2>
				<button id="showbutton" class="btn btn-success btn-posts" href="<?php echo ROOT_PATH; ?>posts">Add a comment</button>
				<div id="com">
					<form method="post" action="<?php echo ROOT_PATH; ?>posts/addcomment">
						<div class="form-group">
							<label>Your Comment:</label>
							<input type="hidden" name="pid" class="form-control" value="<?php echo $item['post_id'] ?>" />
							<textarea name="yourcomment" class="form-control"></textarea>
						</div>
						<input class="btn btn-warning btn-posts" name="submit" type="submit" value="Add It" />
					</form>
				</div>
			<?php endif; ?>
				<!--comment list-->
				<?php 
				foreach ($viewModel as $item):
					$singlecontrol=$item;	
					if (!is_array($singlecontrol)) {
						$isUnique=true;
						$item=$viewModel; 
						if ($item['comment_id']==null) {
							$nocomment=true;
						}
						break;
					} else {$isUnique=false;} ?>

				<div class="comment-bottom-content">
					<div><h3> <?php echo $item['name'] . ' ' . $item['surname']; ?></h3></div>
					<div class="comment-bottom-small"><small ><?php echo $item['email'] ?></small></div>
					<div><small><?php echo $item['comment_time'] ?></small></div>

					<div class="comment-bottom-comment">
						<p> <?php echo $item['comment'] ?> </p>
					</div>
					<div class="div-details-bottom">
						<form method="POST" action="<?php echo ROOT_PATH; ?>posts/deleteComment">
							<?php if (isset($_SESSION['is_logged_in'])): if ($_SESSION['user_data']['id'] == $item['user_id']): if($nocomment!=true) : ?>
							<input type="hidden" name="comid" class="form-control" value="<?php echo $item['comment_id'] ?>" />
							<input class="btn btn-danger btn-posts" name="submit" type="submit" value="Delete this Comment" />
							<?php endif; endif;endif;?>
						</form>
					</div>
				</div>	
				<?php 
				endforeach; 
				if ($isUnique == true) : ?>
					<div class="comment-bottom-content">
						<div><h3> <?php echo $item['name'] . ' ' . $item['surname']; ?></h3></div>
						<div class="comment-bottom-small"><small ><?php echo $item['email'] ?></small></div>
						<div><small><?php echo $item['comment_time'] ?></small></div>

						<div class="comment-bottom-comment">
							<p> <?php echo $item['comment'] ?> </p>
						</div>
						<div class="div-details-bottom">
							<form method="POST" action="<?php echo ROOT_PATH; ?>posts/deleteComment">
							<?php if (isset($_SESSION['is_logged_in'])): if ($_SESSION['user_data']['id'] == $item['user_id']): if($nocomment!=true) :?>
								<input type="hidden" name="comid" class="form-control" value="<?php echo $item['comment_id'] ?>" />
								<input class="btn btn-danger btn-posts" name="submit" type="submit" value="Delete this Comment" />
							<?php endif;endif;endif;?>
							</form>
						</div>
					</div>	
				<?php 
				endif;
					$isUnique=false;
					if($nocomment==true) : ?>
						<div class="comment-bottom-content">
						<div><h3> <?php echo "There is no Comment"; ?></h3></div>
						</div>	
					<?php endif; ?>
			</div>
		</div>
	</div>
</div>
		<script src="<?php echo ROOT_PATH; ?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/button.js" language="javascript"></script>