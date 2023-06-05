<?php
	// start session
	ob_start();
	session_start();
	
	// set time for session timeout
	$currentTime = time() + 25200;
	$expired = 3600;
	
	// if session not set go to login page
	if(!isset($_SESSION['username@ttclassetsystem'])){
		header("location:signin.php");
	}
	
	// if current time is more than session timeout back to login page
	if($currentTime > $_SESSION['timeout']){
		unset($_SESSION["username@ttclassetsystem"]);
		unset($_SESSION["userpf@ttclassetsystem"]);
		unset($_SESSION["region@ttclassetsystem"]);
		unset($_SESSION["staffFName@ttclassetsystem"]);
		unset($_SESSION["userposit@ttclassetsystem"]);
		unset($_SESSION["version@ttclassetsystem"]);
		unset($_SESSION["regID@ttclassetsystem"]);
		unset($_SESSION["staffLName@ttclassetsystem"]);
		unset($_SESSION["regionName@ttclassetsystem"]);
		unset($_SESSION["dmanager"]);
		unset($_SESSION["timeout"]);
		header("location:signin.php");
	}
	
	// destroy previous session timeout and create new one
	unset($_SESSION['timeout']);
	$_SESSION['timeout'] = $currentTime + $expired;

?>