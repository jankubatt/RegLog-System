<?php
	session_start();
	$servername = "";
	$dbUsername = "";
	$dbPassword = "";
	$dbname = "";

	$username = $_POST['usernameLogin'];
	$password = $_POST['pwdLogin'];
	$passwordCheck = "";

	$_SESSION["usr"] = $username;
    $verified = 0;
    
    
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
    
    $sql = "SELECT verified FROM users WHERE username = '$username'";
	
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$verified = $row['verified'];
		}
	}
    
    if ($username == "" && $password == "") {
	    $_SESSION["error"] = "Invalid username and password";
		header("Location: ../badIndexLogin.php");
		exit();
	}
    
    if ($username == "") {
	    $_SESSION["error"] = "Invalid username";
		header("Location: ../badIndexLogin.php");
		exit();
	}
    
	if ($password == "" || $passwordCheck == "") {
	    $_SESSION["error"] = "Invalid password";
		header("Location: ../badIndexLogin.php");
		exit();
	}
	
	if ($verified == 0) {
	    $_SESSION["error"] = "Not verified";
		header("Location: ../badIndexLogin.php");
		exit();
	}
	
	if (password_verify($password, $passwordCheck) && $verified == 1) {
		header("Location: ../mainpage.php");
		exit();
	}
	
    if (!password_verify($password, $passwordCheck)) {
        $_SESSION["error"] = "Invalid password";
		header("Location: ../badIndexLogin.php");
		exit();
    }
	
	$conn->close();
?>