<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="xxxxx@yyyy.com" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            &nbsp;	&nbsp;	&nbsp;	&nbsp;You Have No Account? =>
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>users/register">Register</a>
        </form>
    </div>
</div>