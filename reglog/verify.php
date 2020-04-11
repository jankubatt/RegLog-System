<?php
	session_start();
	$servername = "";
	$dbUsername = "";
	$dbPassword = "";
	$dbname = "";
	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

	if(isset($_GET['vkey'])) {
		$vkey = $_GET['vkey'];

		$sql = "UPDATE users SET verified = 1 WHERE vkey = '$vkey'";
	
		mysqli_query($conn, $sql);

		echo "Successfuly verified. Now you may log in!";
	}
	else {
		echo "Account invalid or already verified";
	}
?>
