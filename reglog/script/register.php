<?php
	session_start();    //start session
    include_once 'conn.php';    //make connection
    
    //storing input from form
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pwd']; 
	$passwordCheck = $_POST['pwdCfm'];
	$hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT); //hash the password
	
	$sqlSelect = "SELECT username FROM users WHERE username = '$username'"; //select username from table users where username is equal to current username
	$result = mysqli_query($conn, $sqlSelect);  //query
	$resultCheck = mysqli_num_rows($result);    //check
	$usernameCheck = "";    //creating variable in case our query has 0 results
    
    //store username to username check
	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$usernameCheck = $row['username'];
		}
	}
    
    //input check
	if ($username == "") {
	    $_SESSION["error"] = "Invalid Username";
	    header("Location: ../badIndexRegistration.php");
		exit();
	}
	
	if ($usernameCheck == $username) {
	    $_SESSION["error"] = "Username exists";
		header("Location: ../badIndexRegistration.php");
		exit();
	}
	
	if ($email == "") {
	    $_SESSION["error"] = "Invalid email";
	    header("Location: ../badIndexRegistration.php");
		exit();
	}
	
	if ($password == "") {
	    $_SESSION["error"] = "Invalid password";
	    header("Location: ../badIndexRegistration.php");
		exit();
	}
	
	if ($password != $passwordCheck) {
	    $_SESSION["error"] = "Passwords aren't matching";
	    header("Location: ../badIndexRegistration.php");
		exit();
	}

	if ($password == $passwordCheck) {
		header("Location: ../verification.php");
	}

	$_SESSION["usr"] = $username;   //username in session is equal to username here
	$vkey = md5(time().$username);  //generate verification key

	$sql = "INSERT INTO users (username, pwd, email, vkey) VALUES ('$username', '$hash', '$email', '$vkey')";   //insert values for new user into the db
    
    //send the email
	if ($conn->query($sql) === TRUE) {
	    $to = $email;
	    $subject = "Email Verification";
	    $message = "Click the link bellow to verify your account <br> <a href='http://jankubat.g6.cz/script/verify.php?vkey=$vkey'>Register Account</a>";
	    $headers = "From: RegLog System"."\r\n";
	    $headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		mail($to, $subject, $message, $headers);
	} 
	
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close(); //close connection
?>