<?php 
require_once('../class/Acceptance.php');
if(isset($_POST['staff-it-acceptanced-form']) || isset($_POST['staff-it-acceptanced-on']) || isset($_POST['staff-it-acceptance-pfnamba'])){

	// $fileUploadedName = strtotime(date('y-m-d H:i')).'_'.$_FILES['staff-it-acceptanced-form']['name'];
	// $move = move_uploaded_file($_FILES['staff-it-acceptanced-form']['tmp_name'],'acceptance/'. $fileUploadedName);

    $staffAcceptanceID = $_POST['staff-it-acceptance-id'];
    $staffAcceptedDate = $_POST['staff-it-acceptanced-on'];
    $staffAcceptedBy = $_POST['staff-it-acceptanced-by'];
    // $staffAttachedAcceptanceFile = $_POST['staff-it-acceptanced-form'];
    $staffAcceptedPFNo = $_POST['staff-it-acceptance-pfnamba'];
	$acceptanceConfirm="Yes";
	$acceptanceSupporter="No";

	$fileUploadedName = rand(1000,100000)."-".$_FILES["staff-it-acceptanced-form"]["name"]; 
	$tempname = $_FILES["staff-it-acceptanced-form"]["tmp_name"];     
	$folder = "./../acceptance/".$fileUploadedName;

    // Now let's move the uploaded image into the folder: image 
	move_uploaded_file($tempname, $folder);

	$saveEdit = $acceptance->add_acceptance_form($acceptanceConfirm, $staffAcceptedDate, $fileUploadedName, $acceptanceSupporter, $staffAcceptanceID);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Acceptance form sent successfully";
	}
	echo json_encode($return);
}
$acceptance->Disconnect();
?>
