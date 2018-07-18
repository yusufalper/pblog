<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/control.js" language="javascript"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Change Your Password</h3>
    </div>
    <div class="panel-body">
        <br/><br/>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Confirm Your Current Password:</label>
                <input type="password" name="oldpassword" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Confirm New Password:</label>
                <input type="password" name="cnewpassword" id="cnewpassword" class="form-control" required/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/control.js" language="javascript"></script>