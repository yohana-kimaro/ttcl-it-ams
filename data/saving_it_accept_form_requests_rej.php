<?php 
require_once('../class/ITAcceptanceForms.php');
if(isset($_POST['applicantID'])){
	$applicantID = $_POST['applicantID'];
	$rejectacceptancename = $_POST['rejectacceptancename'];
	$rejectionJustif = $_POST['rejectionJustif'];
	$itAcceptanceRejectedTime = $_POST['itAcceptanceRejectedTime'];
	$acceptanceRejectedBy = $_POST['acceptanceRejectedBy'];
	$saveEdit = $itsupportreq->reject_item($applicantID, $rejectacceptancename, $rejectionJustif,$itAcceptanceRejectedTime,$acceptanceRejectedBy);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Acceptance form rejected successfully";
	}
	echo json_encode($return);
}//end isset
$itsupportreq->Disconnect();
?>