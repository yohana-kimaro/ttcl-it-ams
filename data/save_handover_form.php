<?php 
require_once('../class/Handover.php');
require_once('../class/HandoverStorage.php');
if(isset($_POST['staff-it-handoverd-form']) || isset($_POST['staff-it-handoverd-on']) || isset($_POST['staff-it-handover-pfnamba'])){

	// $fileUploadedName = strtotime(date('y-m-d H:i')).'_'.$_FILES['staff-it-handoverd-form']['name'];
	// $move = move_uploaded_file($_FILES['staff-it-handoverd-form']['tmp_name'],'handover/'. $fileUploadedName);

    $staffHandoverID = $_POST['staff-it-handover-id'];
    $staffHandoverDate = $_POST['staff-it-handoverd-on'];
    $staffHandoverBy = $_POST['staff-it-handoverd-by'];
    $staffHandoverSerialNo = $_POST['staff-it-handover-serialno'];
    $staffHandoverPFNo = $_POST['staff-it-handover-pfnamba'];
    $staffHandoverFName=$_POST['staff-it-handover-fname'];
    $staffHandoverSName=$_POST['staff-it-handover-sname'];
    $staffHandoverLName=$_POST['staff-it-handover-lname'];

    $staffFullName=$staffHandoverFName." ".$staffHandoverSName." ".$staffHandoverLName;

	$handoverConfirm="Yes";
	$handoverSupporter="No";
	$itSupportSup="IT Support Supervisor";

	$fileUploadedName = rand(1000,100000)."-".$_FILES["staff-it-handoverd-form"]["name"]; 
	$tempname = $_FILES["staff-it-handoverd-form"]["tmp_name"];     
	$folder = "./../handover/".$fileUploadedName;

    // Now let's move the uploaded image into the folder: image 
	move_uploaded_file($tempname, $folder);

	$saveEdit = $handover->add_handover_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID);


	$saveEditHandStorage = $handover_storage->add_handover_storage_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID);

	$return['valid'] = false;
	if($saveEdit && $saveEditHandStorage){
		$return['valid'] = true;
		$return['msg'] = "Handover request sent successfully";
	}
	echo json_encode($return);
}
$handover->Disconnect();
$handover_storage->Disconnect();
?>
