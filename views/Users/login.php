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
        </form>
    </div>
</div>