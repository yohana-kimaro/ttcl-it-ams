<?php 
require_once('../class/DirectManager.php');

if(isset($_POST['applicant_id'])){
	$applicant_id = $_POST['applicant_id'];
	$itemDetails = $direct_manager->get_direct_manager_req($applicant_id);
	$return['title'] = "Are you sure you want to reject this request ?";
	$return['event'] = "reject";
	if($itemDetails > 0){
		$return['rejectStPFNa'] = $itemDetails['pfNo'];
		$return['id'] = $itemDetails['applicantID'];
		$return['rejectStFName'] = $itemDetails['firstName'];
		$return['rejectStMName'] = $itemDetails['secondName'];
		$return['rejectStLName'] = $itemDetails['surName'];
		$return['rejectStDate'] = $itemDetails['appliedDate'];
		$return['rejectStDevtype'] = $itemDetails['deviceType'];
		$return['rejectStReasonF'] = $itemDetails['reasonFor'];
		$return['rejectStQuant'] = $itemDetails['quantity'];
		$return['rejectStRegion'] = $itemDetails['region'];
		$return['rejectStDesigna'] = $itemDetails['designation'];
		$return['rejectStJustifi'] = $itemDetails['justification'];
	}
	echo json_encode($return);		
}

$direct_manager->Disconnect();
?>