<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Post Something You Want.</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" maxlength="255"/>
            </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" name="category">
                    <?php foreach ($viewModel as $item): ?>
                       <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div> 
           <div class="form-group">
                <label>Tags:</label>
                <input type="text" name="tags" class="form-control" maxlength="255" />
            </div>
            <div class="form-group">
                <label>Short Description(140 Characters):</label>
                <input type="text" name="description" class="form-control" maxlength="140"/>
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Source Link:</label>
                <input type="text" name="slink" class="form-control" maxlength="255" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>posts">Cancel->Go to Posts</a>
        </form>
    </div>
</div>