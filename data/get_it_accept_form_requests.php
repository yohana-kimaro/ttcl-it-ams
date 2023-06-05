<?php 
require_once('../class/ITAcceptanceForms.php');
if(isset($_POST['applicantID'])){
	$applicantID = $_POST['applicantID'];
	$itemDetails = $itsupportreq->get_item($applicantID);
	$return['title'] = "Are you sure you want to verify attached acceptance form?";
	$return['event'] = "verifyingacceptance";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['applicantID'];
		$return['attachedAcceptedFirstName'] = $itemDetails['firstName'];
		$return['attachedAcceptedSecondName'] = $itemDetails['secondName'];
		$return['attachedAcceptedSurname'] = $itemDetails['surName'];
		$return['attachedAcceptedDesignation'] = $itemDetails['designation'];
		$return['attachedAcceptedRegion'] = $itemDetails['region'];
	}
	echo json_encode($return);	
	
}//end isset

$itsupportreq->Disconnect();