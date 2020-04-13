<?php
	session_start();
	include_once 'script/conn.php';
	$user = $_SESSION["usr"];
	$sqlSelect = "SELECT email FROM users WHERE username = '$user'";

	$result = mysqli_query($conn, $sqlSelect);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$email = $row['email'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MainPage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="css/img/favicon.ico">
</head>
<body class="container-fluid">
	<nav class="navbar navbar-expand-md navbar-light">		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="indexLogin.php"  class="nav-link">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<h1 class="text-primary text-center">Howdy!</h1>
	<h2 class="text-center"><?php echo $_SESSION["usr"]; ?></h2>
	<p class="text-center text-muted"><?php echo $email; ?></p>
</body>
</html>