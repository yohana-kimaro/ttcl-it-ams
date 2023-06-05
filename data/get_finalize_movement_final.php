<?php 
require_once('../class/Movement.php');
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$itemDetails = $movement->get_staff_movement_finalize($movement_id);
	$return['title'] = "Finalize movement of device";
	$return['event'] = "finalizedevmovement";
	if($itemDetails > 0){ 
		$return['finalmovementstafffromserialno'] = $itemDetails['devFromSeralNo'];
		$return['finalmovementstafffrompf'] = $itemDetails['PFNumber'];
		$return['id'] = $itemDetails['movedFromApplicantID'];
		$return['finalmovementstafftopfno'] = $itemDetails['moveTopfNo'];
		$return['finalmovementstafftoconfirmeddate'] = $itemDetails['movementConfirmedOn'];
		$return['finalmovementstafftolname'] = $itemDetails['movedTolName'];
		$return['finalmovementstafftomname'] = $itemDetails['movedTomName'];
		$return['finalmovementstafftofname'] = $itemDetails['movedTOName'];
		$return['finalmovementstafftooffbuild'] = $itemDetails['movedToDutyS'];
		$return['finalmovementstafftodesignation'] = $itemDetails['movedTODesignation'];
		$return['finalmovementstafftodepartment'] = $itemDetails['movedToDep'];
		$return['finalmovementstafftoregion'] = $itemDetails['movedToRegion'];
		$return['finalmovementstafftodirectmanager'] = $itemDetails['movedToDirectManager'];
		// $return['finalmovementstafffrom'] = $itemDetails['item_type_id'];
		// $return['finalmovementstafffrom'] = $itemDetails['item_type_id'];
	}
	echo json_encode($return);	
	
}

$movement->Disconnect();