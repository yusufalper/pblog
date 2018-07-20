<div>
	<div class="div-posts div-details">
        <h3>Personel Informations</h3>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $viewModel['name'] ?>" maxlength="255" required/>
            </div>
            <div class="form-group">
                <label>Surname:</label>
                <input type="text" name="surname" class="form-control" value="<?php echo $viewModel['surname'] ?>" maxlength="255" required/>
            </div>
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $viewModel['email'] ?>" maxlength="255" required />
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $viewModel['phone'] ?>" maxlength="255" required/>
            </div>
            <div class="form-group">
                <label>Bio:</label>
                <input type="text" name="bio" class="form-control" value="<?php echo $viewModel['bio'] ?>" maxlength="255"/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Update" />
            <a class="btn btn-warning" href="<?php echo ROOT_PATH; ?>users/cpassword">Change Password</a>
        </form>
	</div>
</div>