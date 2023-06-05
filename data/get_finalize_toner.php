<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['staff_toner_id'])){
	$staff_toner_id = $_POST['staff_toner_id'];
	$itemDetails = $toner_request->get_final_staff_toner($staff_toner_id);
	$return['title'] = "Are you sure you want to finalize this request?";
	$return['event'] = "finalizetoner";
	if($itemDetails > 0){
		$return['tonerfinalpfnumber'] = $itemDetails['pfNumber'];
		$return['id'] = $itemDetails['tonerApplID'];
		$return['tonerfinalmodel'] = $itemDetails['requestedTonerModel'];
		$return['tonerfinalfname'] = $itemDetails['firstName'];
		$return['tonerfinallname'] = $itemDetails['lastName'];
		$return['tonerfinalmname'] = $itemDetails['secondName'];
		$return['tonerfinalquantity'] = $itemDetails['requestedQuantity'];
		$return['tonerfinalpfnumberf'] = $itemDetails['pfNumber'];
		$return['tonerfinalmodelf'] = $itemDetails['requestedTonerModel'];
	}
	echo json_encode($return);	
	
}

$toner_request->Disconnect();
?>