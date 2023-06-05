<?php 
require_once('../class/Movement.php');
require_once('../class/MovementStorage.php');

if(isset($_POST['staff-it-movementd-form']) || isset($_POST['staff-it-movementd-on']) || isset($_POST['staff-it-movement-pfnamba'])){
    $staffMovementID = $_POST['staff-it-movement-id'];
    $staffMovementFromSerialNo = $_POST['staff-it-movement-serialno'];
    $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    $staffMovementFromFName=$_POST['staff-it-movement-fname-one'];
    $staffMovementFromSName=$_POST['staff-it-movement-sname-one'];
    $staffMovementFromLName=$_POST['staff-it-movement-lname-one'];
    $staffMovementFromDepartment = $_POST['staff-it-movement-department-one'];
    $staffMovementReceivingDate = $_POST['staff-it-movementd-on'];
    $staffMovementFromDeviceType = $_POST['staff-it-movement-pfnamba'];
    $staffMovementFromDuty = $_POST['staff-it-movement-duty-station'];


    $staffMovementFromRegion = $_POST['staff-device-moved-to-region'];    
    $staffMovementFromDirectManager = $_POST['staff-device-moved-to-dmanager'];

    $staffMovementToPFNo = $_POST['staff-it-staff-movement-to-pfnumber'];

    $staffMovementToFName = $_POST['staff-device-moved-to-fname'];
    $staffMovementToMName = $_POST['staff-device-moved-to-mname'];
    $staffMovementToLName = $_POST['staff-device-moved-to-lname'];
    $staffMovementToDepartment = $_POST['staff-device-moved-to-department'];
    $staffMovementToDuty = $_POST['staff-device-moved-to-location'];
    $staffMovementToDesignation = $_POST['staff-device-moved-to-designation'];

    $staffMovementRequestJustif= $_POST['staff-movement-request-justif'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];
    // $staffMovementPFNo = $_POST['staff-it-movement-pfnamba'];

    $staffFullName=$staffMovementFromFName." ".$staffMovementFromSName." ".$staffMovementFromLName;


	$ifMovementRejected='No';
	$ifMovemDone='No';
	$movementReq='Yes';
	$itSuppEA='Not approved by IT Support Engineer';
	$itSuppSA='Not approved by Supervisor IT Support';
	$rpamA='Not approved by RP&AM';

	$staffMovementRequestJustif=ucfirst(strtolower($staffMovementRequestJustif));

	$fileUploadedName = rand(1000,100000)."-".$_FILES["staff-it-movementd-form"]["name"]; 
	$tempname = $_FILES["staff-it-movementd-form"]["tmp_name"];     
	$folder = "./../movement/".$fileUploadedName;
    // Now let's move the uploaded image into the folder: image 
	move_uploaded_file($tempname, $folder);

	$saveEdit = $movement->add_staff_movement_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone,$staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo);

	$saveEditHandStorage = $movement_storage->add_staff_movement_storage_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone, $staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo);

	$return['valid'] = false;
	if($saveEdit && $saveEditHandStorage){
		$return['valid'] = true;
		$return['msg'] = "Movement request has been sent successfully";
	}
	echo json_encode($return);
}
$movement->Disconnect();
$movement_storage->Disconnect();
?>
