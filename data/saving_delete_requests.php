<?php 
require_once('../class/RequestsStatus.php');

if (isset($_POST['applicant_id'])) {
	$applicant_id=$_POST['applicant_id'];
	$pfNamb=$_POST['pfNamb'];
	$saveRequestsStatus=$requests_status->delete_requests_status($applicant_id, $pfNamb);
	$return['valid']=false;
	if ($saveRequestsStatus) {
		$return['valid']=true;
		$return['msg']="Request status deleted successfully";
	}
	echo json_encode($return);
}

$requests_status->Disconnect();

?>