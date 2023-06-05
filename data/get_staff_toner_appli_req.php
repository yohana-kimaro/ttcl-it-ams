<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['toner_appli_id'])){
	$toner_appli_id = $_POST['toner_appli_id'];
	$itemDetails = $toner_request->get_toner_staff_req($toner_appli_id);
	$return['title'] = "Are you sure you want to approve this toner request?";
	$return['event'] = "approvetonerreq";
	if($itemDetails > 0){ 
		$return['tonercartstaffdate'] = $itemDetails['requestedDate'];
		$return['tonercartstafffirstname'] = $itemDetails['firstName'];
		$return['tonercartstaffsecondname'] = $itemDetails['secondName'];
		$return['tonercartstafflastname'] = $itemDetails['lastName'];
		$return['tonercartstaffdesignation'] = $itemDetails['designation'];
		$return['tonercartstaffdepartment'] = $itemDetails['department'];
		$return['tonercartstaffoffloc'] = $itemDetails['officeLocation'];;
		$return['id'] = $itemDetails['tonerApplID'];
		$return['tonercartstaffregion'] = $itemDetails['region'];
		$return['tonercartstaffmodel'] = $itemDetails['requestedTonerModel'];
		$return['tonercartstaffquantity'] = $itemDetails['requestedQuantity'];;
		$return['tonercartstaffreqpfno'] = $itemDetails['pfNumber'];
	}
	echo json_encode($return);	
}

$toner_request->Disconnect();
?>