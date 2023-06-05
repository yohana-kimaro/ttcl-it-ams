<?php  
require_once('../class/TonerRequest.php');
if(isset($_POST['toner_appli_id'])){
	$toner_appli_id = $_POST['toner_appli_id'];
	$itemDetails = $toner_request->get_toner_staff_req($toner_appli_id);
	$return['title'] = "Are you sure you want to reject this toner request?";
	$return['event'] = "approvetonerreject";
	if($itemDetails > 0){ 
		$return['tonercartristaffdate'] = $itemDetails['requestedDate'];
		$return['tonercartristafffirstname'] = $itemDetails['firstName'];
		$return['tonercartristaffsecondname'] = $itemDetails['secondName'];
		$return['tonercartristafflastname'] = $itemDetails['lastName'];
		$return['tonercartristaffdesignation'] = $itemDetails['designation'];
		$return['tonercartristaffdepartment'] = $itemDetails['department'];
		$return['tonercartristaffoffloc'] = $itemDetails['officeLocation'];;
		$return['id'] = $itemDetails['tonerApplID'];
		$return['tonercartristaffregion'] = $itemDetails['region'];
		$return['tonercartristaffmodel'] = $itemDetails['requestedTonerModel'];
		$return['tonercartristaffquantity'] = $itemDetails['requestedQuantity'];;
		$return['tonercartristaffreqpfno'] = $itemDetails['pfNumber'];
	}
	echo json_encode($return);	
}

$toner_request->Disconnect();
?>