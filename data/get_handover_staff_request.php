<?php 
require_once('../class/Handover.php');
if(isset($_POST['handover_id'])){
	$handover_id = $_POST['handover_id'];
	$itemDetails = $handover->get_staff_handover_request_approve($handover_id);
	$return['title'] = "Are you sure you want to approve this request?";
	$return['event'] = "approvehandoverstaffreq";
	if($itemDetails > 0){
		$return['handoverreqstafffname'] = $itemDetails['firstName'];
		$return['id'] = $itemDetails['applicantID'];
		$return['handoverreqstaffmname'] = $itemDetails['secondName'];
		$return['handoverreqstafflname'] = $itemDetails['surName'];
		$return['handoverreqstaffdesignation'] = $itemDetails['designation'];
		$return['handoverreqstaffquantity'] = $itemDetails['quantity'];
		$return['handoverreqstaffregion'] = $itemDetails['region'];
		$return['handoverreqstaffserialno'] = $itemDetails['serialNo'];
		$return['handoverreqstaffdevtype'] = $itemDetails['deviceType'];
		$return['handoverreqstaffdepartment'] = $itemDetails['department'];
		$return['handoverreqstaffdate'] = $itemDetails['handOverDate'];
		$return['handoverreqstaffpfno'] = $itemDetails['pfnumber'];
		$return['handoverreqstaffcapacity'] = $itemDetails['capacity'];
		$return['handoverreqstaffcurrentdevstatus'] = $itemDetails['status'];
	}
	echo json_encode($return);	
	
}

$handover->Disconnect();