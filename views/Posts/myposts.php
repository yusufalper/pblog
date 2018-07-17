<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-warning btn-posts" href="<?php echo ROOT_PATH; ?>posts/add">New Post</a>
    <?php endif;?>
    <?php foreach ($viewModel as $item): ?>
         <div class="div-posts">
            <h3> <?php echo $item['title']; ?> </h3>
            <small> <?php echo $item['post_date'] ?> </small>
            <small> <?php echo $item['tags'] ?> </small>
            <p><?php echo $item['description'] ?></p>

            <form method="POST" action="<?php echo ROOT_PATH; ?>posts/details">
                <input type="hidden" name="xid" class="form-control" value="<?php echo $item['id'] ?>" />
                <input class="btn btn-info" name="submit" type="submit" value="Details" />
            </form>
        </div>
    <?php endforeach;?>
</div>