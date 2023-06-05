<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['staff_toner_id'])){
	$staff_toner_id = $_POST['staff_toner_id'];
	$itemDetails = $toner_request->get_toner_staff_confirmation($staff_toner_id);
	$return['title'] = "Are you sure you want to confirm this toner allocation";
	$return['event'] = "stafftonerallocconfirm";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['tonerApplID'];
		$return['tonerConfirmModel'] = $itemDetails['requestedTonerModel'];
		$return['tonerConfirmQty'] = $itemDetails['requestedQuantity'];
		$return['tonerAllocated'] = $itemDetails['approvedOrRejectedOn'];
		// $return['tonerConfirmModel'] = $itemDetails['requestedTonerModel'];
		$return['tonerConfirmPFNo'] = $itemDetails['pfNumber'];
	}
	echo json_encode($return);	
}
$toner_request->Disconnect();
?>