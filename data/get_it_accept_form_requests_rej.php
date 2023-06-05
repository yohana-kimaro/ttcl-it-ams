<?php 
require_once('../class/ITAcceptanceForms.php');
if(isset($_POST['applicantID'])){
	$applicantID = $_POST['applicantID'];
	$itemDetails = $itsupportreq->get_item($applicantID);
	$return['title'] = "Are you sure you want to reject this attached acceptance form?";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['applicantID'];
		$return['attachedAcceptedRejFirstName'] = $itemDetails['firstName'];
		$return['attachedAcceptedRejSecondName'] = $itemDetails['secondName'];
		$return['attachedAcceptedRejSurname'] = $itemDetails['surName'];
		$return['attachedAcceptedRejDesignation'] = $itemDetails['designation'];
		$return['attachedAcceptedRejRegion'] = $itemDetails['region'];
	}
	echo json_encode($return); 
	
}

$itsupportreq->Disconnect();