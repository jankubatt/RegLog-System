<?php
	session_start();

	if(isset($_COOKIE["login"])) {
	    header("Location: ../indexLogin.php");
		exit();
	}

	$cookie_name = "login";
	setcookie($cookie_name, time() + 3600, "/");
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
						<a href="indexLogin.php"  class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href='indexRegister.php' class='nav-link'>Register</a>
					</li>		
				</ul>
			</div>
		</nav>

		<form action="script/register.php" method="POST">
			<div class="container-fluid">
				<div class="form-group">
			    	<label>Username</label>
			    	<input type="text" class="form-control" name="username" placeholder="Username">
			  	</div>
				<div class="form-group">
			    	<label>Email</label>
			    	<input type="email" class="form-control" name="email" placeholder="Email">
			  	</div>
			  	<div class="form-group">
			    	<label>Password</label>
			    	<input type="password" class="form-control" name="pwd" placeholder="Password">
			 	</div>
			 	<div class="form-group">
			    	<label>Confirm Password</label>
			    	<input type="password" class="form-control"  name="pwdCfm" placeholder="Confirm Password">
			 	</div>
			 	
			  	<button type="submit" class="btn btn-primary" name="submit1">Register</button>
			</div>
		</form>
	</body>
</html>