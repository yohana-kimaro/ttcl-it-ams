<?php
session_start();
include "connection.php";
include "connection_one.php";  



if(isset($_POST['submit-request'])){
	// file types allowed
	$allowtype = array('pdf', 'gif', 'jpg', 'jpeg', 'pdf');

	date_default_timezone_set("Africa/Dar_es_salaam");
	$appliedDate = date('d-m-Y H:i:s');
	
	$nameLogo1 = $_FILES["lostRep"]["name"]; 
	if ($nameLogo1=='') {
		$nameLogo = $_FILES["lostRep"]["name"]; 
	}else{
		$nameLogo = rand(1000,100000)."-".$_FILES["lostRep"]["name"]; 

	}
	$tempname = $_FILES["lostRep"]["tmp_name"];     
	$folder = "upload/".$nameLogo;

    // Now let's move the uploaded image into the folder: image 
	move_uploaded_file($tempname, $folder);



	$PFNo = $_POST['pfno'];
	$FirstName = $_POST['fname'];
	$fnLower = strtolower($FirstName);
	$FirstName = ucwords($fnLower);
	$MiddleName = $_POST['mname'];
	$mnLower = strtolower($MiddleName);
	$MiddleName = ucwords($mnLower);

	$LastName = $_POST['lname'];
	$lnLower = strtolower($LastName);
	$LastName = ucwords($lnLower);


	$itemType = $_POST['itemType'];
	$region = $_POST['regionSelect'];
	$officeBuilding = $_POST['officeSelect'];
	$quantity = $_POST['quantity'];
	$reason = $_POST['reasonSelect'];
	$direcManager = $_POST['dManager'];

	$replace = $_POST['replacement2'];
	$rep = strtolower($replace);
	$replace = ucfirst($rep);

	$reportLogo = $nameLogo;


	$designation = $_POST['designation'];

	$department = $_POST['department'];

	if($reason == "New device"){
		$replace = "New employee";
	}
	if($reason == "Lost"){
		$replace = "Lost device";
	}

	$sql = "INSERT INTO APPLICANTTB(pfNo,firstName,secondName,surName,designation,
	reasonFor,justification,quantity,deviceType, image, department, appliedDate, 
	offBuild, region, myDirectManager) VALUES('$PFNo','$FirstName','$MiddleName','$LastName',
	'$designation','$reason','$replace','$quantity','$itemType', '$reportLogo',
	'$department', '$appliedDate','$officeBuilding','$region', '$direcManager')";
	$inserted = sqlsrv_query($conn, $sql);

	if($inserted){
		$_SESSION['insert'] = 1;
		header("Location: request-form.php");
	}else{
		$_SESSION['insert'] = 2;
		header("Location: request-form.php");
	}
}



?>