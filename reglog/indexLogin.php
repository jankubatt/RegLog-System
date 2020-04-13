<?php
	session_start();	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>RegLog System</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="icon" href="css/img/favicon.ico">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light">		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="indexLogin.php" class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href="indexRegister.php" class="nav-link">Register</a>
					</li>			
				</ul>
			</div>
		</nav>

		<form action="script/login.php" method="POST">
			<div class="container-fluid">
				<div class="form-group">
			    	<label>Username</label>
			    	<input type="text" class="form-control" name="usernameLogin" placeholder="Username">
			  	</div>
			  	<div class="form-group">
			    	<label>Password</label>
			    	<input type="password" class="form-control" name="pwdLogin" placeholder="Password">
			 	</div>
			  	<button type="submit" class="btn btn-primary" name=""submit2>Login</button>
			</div>
		</form>
	</body>
</html>

