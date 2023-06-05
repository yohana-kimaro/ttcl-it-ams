<?php 
require_once('../class/ITManager.php');
if(isset($_POST['applicant_id'])){
	$applicant_id = $_POST['applicant_id'];
	$itemDetails = $it_manager->get_applicant_to_approve($applicant_id);
	$return['title'] = "Are you sure you want to approve this request?";
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

		$return['approveDMgerApJustifi'] = $itemDetails['dManagerApproveJustif'];
		$return['verITSupportJustifi'] = $itemDetails['verificationJustif'];
	}
	echo json_encode($return);	
	
}//end isset

$it_manager->Disconnect();