<?php 
require_once('../class/MovementStorage.php');
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$itemDetails = $movement_storage->get_movement_request_to_confirm($movement_id);
	$return['title'] = "Are you sure you want to confirm this?";
	$return['event'] = "confirmdevicemovement";
	if($itemDetails > 0){
		$return['devicemovementstaffpfno'] = $itemDetails['PFNumber'];
		$return['id'] = $itemDetails['movedFromApplicantID'];
	}
	echo json_encode($return);	
	
}//end isset

$movement_storage->Disconnect();