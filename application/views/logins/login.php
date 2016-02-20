<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
</head>
	<style type="text/css">
		#container{
			margin: 0 auto;
		}	
		label{
			display: block;
		}
		.inlineblock{
			display: inline-block;
			vertical-align: top;
		}
	</style>
<body>
	<div id="continer">
		<div class="inlineblock">
			<?php if($this->session->flashdata('errors_register'))
			{
				echo $this->session->flashdata('errors_register');
			} ?>
			<fieldset>
				<form action='/index.php/logins/process_register' method="post">
					<legend>Register</legend>
					<label>Name:<input type='text' name='name'></label>
					<label>Email<input type='email' name='email'></label>
					<label>Password<input type='password' name='password'></label>
					<label>Password should be at least 8 character in length</label>
					<label>Confirm Password<input type='password' name='confirm_password'></label>
					<input type="submit" name='action' value='register'>
				</form>
			</fieldset>
		</div>
		<div class="inlineblock">
			<?php if($this->session->flashdata('errors_login'))
			{
				echo $this->session->flashdata('errors_login');
			} ?>
			<fieldset>
				<legend>Login</legend>
				<form action='/index.php/logins/process_login' method="post">
					<label>Email<input type='email' name='email'></label>
					<label>Password<input type='password' name='password'></label>
					<input type="submit" name='action' value='login'>
				</form>
			</fieldset>
		</div>
	</div>
</body>
</html>