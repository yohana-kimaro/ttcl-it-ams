<?php 
require_once('../class/DirectManager.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffApprovePfNo = $_POST['staffApprovePfNo'];
	$staffApproveDevtype = $_POST['staffApproveDevtype'];
	$dManagerApproveName = $_POST['dManagerApproveName'];
	$dManagerApprovedOn = $_POST['dManagerApprovedOn'];
	$dManagerApproveText= $_POST['dManagerApproveText'];
	$dmanagerapprovjustif= $_POST['dmanagerapprovjustif'];

	$dmanagerapprovjustif=ucfirst(strtolower($dmanagerapprovjustif));

	$saveEdit = $direct_manager->saving_approved_request($application_id, $staffApprovePfNo, $staffApproveDevtype, $dManagerApproveName, $dmanagerapprovjustif, $dManagerApproveText, $dManagerApprovedOn);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request approved successfully";
	}
	echo json_encode($return);
}//end isset
$direct_manager->Disconnect();
?>