<?php use \YKG\YKG;?>
<div class="col-md-6">
	<form class="form" action="<?php echo \YKG\YKG::app()->uri->create('site/login');?>" method="post">
		<h1>User Login</h1>
		<hr />
		<div class="form-group">
			<label for="username">UserName</label>
			<input type="text" name="Login[username]" id="Login_username" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="Login[password]" id="Login_password" class="form-control" />
		</div>
		<hr />
		<div class="form-group">
		<button type="submit" type="submit" class="btn btn-primary">Login</button>
		</div>
	</form>
</div>
<div class="col-md-6">
	<form class="form" action="<?php echo \YKG\YKG::app()->uri->create('site/register');?>" method="post">
		<h1>Register</h1>
	</form>
</div>