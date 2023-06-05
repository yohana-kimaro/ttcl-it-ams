<?php 
require_once('../class/ITSupportSupervisor.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffRejectPfNo = $_POST['staffRejectPfNo'];
	$issRejectName = $_POST['issRejectName'];
	$issRejectdOn = $_POST['issRejectdOn'];
	$issRejectText= $_POST['issRejectText'];
	$staffRejectionJustif=$_POST['staffRejectionJustif'];
	$saveEdit = $it_support_supervisor->saving_rejected_request($application_id, $staffRejectPfNo, $issRejectName, $issRejectText, $staffRejectionJustif, $issRejectdOn);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request rejected successfully";
	}
	echo json_encode($return);
}
$it_support_supervisor->Disconnect();
?>