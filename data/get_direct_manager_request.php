<?php 
require_once('../class/DirectManager.php');

if(isset($_POST['applicant_id'])){
	$applicant_id = $_POST['applicant_id'];
	$itemDetails = $direct_manager->get_direct_manager_req($applicant_id);
	$return['title'] = "Are you sure you want to approve this request ?";
	$return['event'] = "approve";
	if($itemDetails > 0){
		$return['approveStPFNa'] = $itemDetails['pfNo'];
		$return['id'] = $itemDetails['applicantID'];
		$return['approveStFName'] = $itemDetails['firstName'];
		$return['approveStMName'] = $itemDetails['secondName'];
		$return['approveStLName'] = $itemDetails['surName'];
		$return['approveStDate'] = $itemDetails['appliedDate'];
		$return['approveStDevtype'] = $itemDetails['deviceType'];
		$return['approveStReasonF'] = $itemDetails['reasonFor'];
		$return['approveStQuant'] = $itemDetails['quantity'];
		$return['approveStRegion'] = $itemDetails['region'];
		$return['approveStDesigna'] = $itemDetails['designation'];
		$return['approveStJustifi'] = $itemDetails['justification'];
	}
	echo json_encode($return);		
}

$direct_manager->Disconnect();
?>