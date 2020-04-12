<?php
	session_start();
	$servername = "";
	$dbUsername = "";
	$dbPassword = "";
	$dbname = "";

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pwd']; 
	$passwordCheck = $_POST['pwdCfm'];
	$hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
	
		// Create connection
	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);
	$sqlSelect = "SELECT username FROM users WHERE username = '$username'";
	setcookie("user");
	$result = mysqli_query($conn, $sqlSelect);
	$resultCheck = mysqli_num_rows($result);
	$usernameCheck = "";

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$usernameCheck = $row['username'];
		}
	}

	
	
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

	else if ($password == $passwordCheck) {
		header("Location: ../verification.php");
	}

	$_SESSION["usr"] = $username;



	$vkey = md5(time().$username);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	

	$sql = "INSERT INTO users (username, pwd, email, vkey) VALUES ('$username', '$hash', '$email', '$vkey')";

	if ($conn->query($sql) === TRUE) {
	    $to = $email;
	    $subject = "Email Verification";
	    $message = "<a href='#URL# verify.php?vkey=$vkey'>Register Account</a>";
	    $headers = "From: ###"."\r\n";
	    $headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		mail($to, $subject, $message, $headers);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>