<?php
	session_start();    //start session
	include_once 'conn.php';    //make connection
    
    //if vkey exists
	if(isset($_GET['vkey'])) {
		$vkey = $_GET['vkey'];  //store vkey into vkey variable

		$sql = "UPDATE users SET verified = 1 WHERE vkey = '$vkey'";    //update verified to 1 where vkey is equal to vkey of some user
	
		
        mysqli_query($conn, $sql);  //query
        header("Location: ../verified.php");
	    exit;
	}
	else {
		echo "Account invalid or already verified";
	}
?>
