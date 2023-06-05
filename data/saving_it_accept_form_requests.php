<?php 
require_once('../class/ITAcceptanceForms.php');
if(isset($_POST['applicantID'])){
	$applicantID = $_POST['applicantID']; 
	$acceptedname = $_POST['acceptedname'];
	// $verificationJustif = $_POST['verificationJustif'];
	$itAcceptanceReqTime = $_POST['itAcceptanceReqTime'];
	$acceptedBy = $_POST['acceptedBy'];
	$saveEdit = $itsupportreq->edit_item($applicantID, $acceptedname, $itAcceptanceReqTime,$acceptedBy);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Acceptance form verified successfully";
	}
	echo json_encode($return);
}//end isset
$itsupportreq->Disconnect();
