<?php
	session_start();
	$servername = "";
	$dbUsername = "";
	$dbPassword = "";
	$dbname = "";

	$username = $_POST['usernameLogin'];
	$password = $_POST['pwdLogin'];

	$_SESSION["usr"] = $username;

	// Create connection
	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	setcookie("user");
	
	$sql = "SELECT pwd FROM users WHERE username = '$username'";
	
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$passwordCheck = $row['pwd'];
		}
	}

	if ($password == "" || $passwordCheck == "" || $username == "") {
		header("Location: ../badIndexLogin.php");
	}

	else if (password_verify($password, $passwordCheck)) {
		header("Location: ../mainpage.php");
	}

	else {
		header("Location: ../badIndexLogin.php");
	}

	$sql = "SELECT verified FROM users WHERE username = '$username'";
	
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$verified = $row['verified'];
		}
	}

	if ($verified == 1) {
		header("Location: ../mainpage.php");
	}

	else {
		header("Location: ../badIndexLogin.php");
	}
	$conn->close();
?>