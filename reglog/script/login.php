<?php
	session_start();    //Start session
	include_once 'conn.php'; //connect to DB

	$username = $_POST['usernameLogin'];    //username input box
	$password = $_POST['pwdLogin']; //password input box
	$passwordCheck = "";    //variable for checking password, will fill it later 
	$verified = 0;  //default verified value
	$_SESSION["usr"] = $username;   //session usr is username here
	
	$sql = "SELECT pwd FROM users WHERE username = '$username'";    //go to db and select pwd from users table where username in the table is equal to username here
	$result = mysqli_query($conn, $sql);    //query
	$resultCheck = mysqli_num_rows($result);    //check the result
    
    //store pwd from db to passwordCheck variable
	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$passwordCheck = $row['pwd'];
		}
	}
    
    $sql = "SELECT verified FROM users WHERE username = '$username'";   //select verified from table users where username is equal to username here
	$result = mysqli_query($conn, $sql);    //query
	$resultCheck = mysqli_num_rows($result);    //check result
    
    //store verified value from db to verified variable
	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$verified = $row['verified'];
		}
	}
    
    //input check
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
	
	//close connection
	$conn->close();
?>