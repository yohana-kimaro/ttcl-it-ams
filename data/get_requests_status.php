<?php 
require_once('../class/RequestsStatus.php');

if (isset($_POST['applicant_id'])) {
	$applicant_id=$_POST['applicant_id'];
	$requestDetails=$requests_status->get_requests_status($applicant_id);
	$return['title']="Are you sure you want to delete this request?";
	$return['event']="delete";
	if ($requestDetails>0) {
		$return['applID']=$requestDetails['applicantID'];
		$return['pfno']=$requestDetails['pfNo'];
	}
	echo json_encode($return);
}
$requests_status->Disconnect();

?>