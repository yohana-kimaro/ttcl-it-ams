<?php 
require_once('../class/Movement.php');
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$itemDetails = $movement->get_staff_movement_to_it_support($movement_id);
	$return['title'] = "Are you sure you want to approve this request?";
	$return['event'] = "devicemovementstaffreq";
	if($itemDetails > 0){
		$return['devicemovemstaffreqfname'] = $itemDetails['movedFromName'];
		$return['devicemovemstaffreqserialno'] = $itemDetails['devFromSeralNo'];
		$return['id'] = $itemDetails['movedFromApplicantID'];
		$return['devicemovemstaffreqlname'] = $itemDetails['movedFromLName'];
		$return['devicemovemstaffreqmname'] = $itemDetails['movedFromMName'];
		$return['devicemovemstaffreqmovdate'] = $itemDetails['movedFromDate'];
		$return['devicemovemstaffreqmovrejectcomm'] = $itemDetails['movemRejectComm'];
		$return['devicemovemstaffreqtofname'] = $itemDetails['movedTOName'];
		$return['devicemovemstaffreqtomname'] = $itemDetails['movedTomName'];
		$return['devicemovemstaffreqtolname'] = $itemDetails['movedTolName'];

		// $return['devicemovemstaffreq'] = $itemDetails['item_code'];
		// $return['devicemovemstaffreq'] = $itemDetails['item_brand'];
	}
	echo json_encode($return);	
	
}//end isset

$movement->Disconnect();

?>