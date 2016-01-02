<form class="form" action="<?php echo \YKG\YKG::app()->uri->create('site/register');?>" method="post">
	<h1>User Register</h1>
	<hr />
	<div class="form-group">
		<label for="username">UserName</label>
		<input type="text" name="Register[username]" id="Register_username" class="form-control" />
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="text" name="Register[password]" id="Register_password" class="form-control" />
	</div>
	<div class="form-group">
		<label for="password">Repeat Password</label>
		<input type="text" name="Register[re_password]" id="Register_re_password" class="form-control" />
	</div>
	<hr />
	<div class="form-group">
	<button type="submit" type="submit" class="btn btn-primary">Register</button>
	</div>
</form>