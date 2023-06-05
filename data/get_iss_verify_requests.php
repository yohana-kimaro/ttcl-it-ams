<?php 
require_once('../class/ITSupportSupervisor.php');
if(isset($_POST['applicant_id'])){
	$applicant_id = $_POST['applicant_id'];
	$itemDetails = $it_support_supervisor->get_applicant_to_verify($applicant_id);
	$return['title'] = "Are you sure you want to verify this request?";
	$return['event'] = "verify"; 
	if($itemDetails > 0){
		$return['verifyStPFNa'] = $itemDetails['pfNo'];
		$return['id'] = $itemDetails['applicantID'];
		$return['verifyStFName'] = $itemDetails['firstName'];
		$return['verifyStMName'] = $itemDetails['secondName'];
		$return['verifyStLName'] = $itemDetails['surName'];
		$return['verifyStDate'] = $itemDetails['appliedDate'];
		$return['verifyStDevtype'] = $itemDetails['deviceType'];
		$return['verifyStReasonF'] = $itemDetails['reasonFor'];
		$return['verifyStQuant'] = $itemDetails['quantity'];
		$return['verifyStRegion'] = $itemDetails['region'];
		$return['verifyStDesigna'] = $itemDetails['designation'];
		$return['verifyStJustifi'] = $itemDetails['justification'];
		$return['verifyDMgrJustifi'] = $itemDetails['dManagerApproveJustif'];
	}
	echo json_encode($return);	
	
}//end isset

$it_support_supervisor->Disconnect();