<div>
	<div class="div-posts div-profile">
        <div class="panel panel-primary">
        <div class="panel-heading"><h2>My Profile</h2></div>
            <div class="panel-body">
                <table class="table profile-table">
                    <tbody>
                            <br/><br/>
                            <tr>
                            <td>Name  :</td>
                            <td><?php echo $viewModel['name'] ?></td>
                            </tr>
                            <tr>
                            <td>Surname  :</td>
                            <td><?php echo $viewModel['surname'] ?></td>
                            </tr>
                            <tr>
                            <td>E-mail  :</td>
                            <td><?php echo $viewModel['email'] ?></td>
                            </tr>
                            <tr>
                            <td>Phone  :</td>
                            <td><?php echo $viewModel['phone'] ?></td>
                            </tr>
                            <tr>
                            <td>Bio  :</td>
                            <td><?php echo $viewModel['bio'] ?></td>
                            </tr>
                            <tr>
                            <td>&nbsp;</td>
                            <td><a class="btn btn-info" href="<?php echo ROOT_PATH; ?>users/settings">Update & Change Password</a></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>