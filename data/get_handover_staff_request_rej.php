<?php 
require_once('../class/Handover.php');
if(isset($_POST['handover_id'])){
	$handover_id = $_POST['handover_id'];
	$itemDetails = $handover->get_staff_handover_request_approve($handover_id);
	$return['title'] = "Are you sure you want to reject this request?";
	$return['event'] = "approvehandoverstaffreqrej";
	if($itemDetails > 0){
		$return['handoverreqrejstafffname'] = $itemDetails['firstName'];
		$return['id'] = $itemDetails['applicantID'];
		$return['handoverreqrejstaffmname'] = $itemDetails['secondName'];
		$return['handoverreqrejstafflname'] = $itemDetails['surName'];
		$return['handoverreqrejstaffdesignation'] = $itemDetails['designation'];
		$return['handoverreqrejstaffquantity'] = $itemDetails['quantity'];
		$return['handoverreqrejstaffregion'] = $itemDetails['region'];
		$return['handoverreqrejstaffserialno'] = $itemDetails['serialNo'];
		$return['handoverreqrejstaffdevtype'] = $itemDetails['deviceType'];
		$return['handoverreqrejstaffdepartment'] = $itemDetails['department'];
		$return['handoverreqrejstaffdate'] = $itemDetails['handOverDate'];
		$return['handoverreqrejstaffpfno'] = $itemDetails['pfnumber'];
		$return['handoverreqrejstaffcapacity'] = $itemDetails['capacity'];
		$return['handoverreqrejstaffcurrentdevstatus'] = $itemDetails['status'];
	}
	echo json_encode($return);	
	
}

$handover->Disconnect();