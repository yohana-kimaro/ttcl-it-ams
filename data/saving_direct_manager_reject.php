<?php 
require_once('../class/DirectManager.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffRejectPfNo = $_POST['staffRejectPfNo'];
	$dManagerRejectName = $_POST['dManagerRejectName'];
	$dManagerRejectdOn = $_POST['dManagerRejectdOn'];
	$dManagerRejectText= $_POST['dManagerRejectText'];
	$staffRejectionJustif=$_POST['staffRejectionJustif'];
	$saveEdit = $direct_manager->saving_rejected_request($application_id, $staffRejectPfNo, $dManagerRejectName, $dManagerRejectText, $staffRejectionJustif, $dManagerRejectdOn);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request rejected successfully";
	}
	echo json_encode($return);
}
$direct_manager->Disconnect();
?>