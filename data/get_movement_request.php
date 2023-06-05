<?php 
require_once('../class/Movement.php'); 
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$itemDetails = $movement->get_movement_details($movement_id);
	$return['title'] = "Are you sure you want to request device movement?";
	$return['event'] = "movementreq";
	if($itemDetails > 0){
		$return['staffmovementfname'] = $itemDetails['firstName'];
		$return['staffmovementmname'] = $itemDetails['secondName'];
		$return['id'] = $itemDetails['applicantID'];
		$return['staffmovementfromdutystation'] = $itemDetails['offBuild'];
		$return['staffmovementlname'] = $itemDetails['surName'];
		$return['staffmovementdesign'] = $itemDetails['designation'];
		$return['staffmovementquantity'] = $itemDetails['quantity'];
		$return['staffmovementdevtype'] = $itemDetails['deviceType'];
		$return['staffmovementdepartment'] = $itemDetails['department'];
		$return['staffmovementregion'] = $itemDetails['region'];
		$return['staffmovementserialno'] = $itemDetails['serialNo'];
		$return['staffmovementbrand'] = $itemDetails['brand'];
		$return['staffmovementmodel'] = $itemDetails['model'];
		$return['staffmovementdevname'] = $itemDetails['deviceName'];
		$return['staffmovementstatus'] = $itemDetails['status'];
	}
	echo json_encode($return);	
	
}

$movement->Disconnect();