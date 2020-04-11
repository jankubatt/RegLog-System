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

		<div class="container-fluid">
			<h1 class="text-center text-primary">Successfuly verified!</h1>
		</div>
	</body>
</html>

