<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Surname:</label>
                <input type="text" name="surname" class="form-control" />
            </div>
            <div class="form-group">
                <label>E-Mail:</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" />
            </div>
            <div class="form-group">
                <label>password:</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        </form>
    </div>
</div>