<?php 
require_once('../class/ITManager.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffApprovePfNo = $_POST['staffApprovePfNo'];
	$itApproveName = $_POST['itApproveName'];
	$itApprovedOn = $_POST['itApprovedOn'];
	$itApproveText= $_POST['itApproveText'];
	$itManagerApproJusti=$_POST['itManagerApproJusti'];
	$allocated="No";

	$saveEdit = $it_manager->saving_approved_request($application_id, $staffApprovePfNo, $itApproveName, $itApproveText, $itApprovedOn, $allocated, $itManagerApproJusti);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request approved successfully";
	}
	echo json_encode($return);
}
$it_manager->Disconnect();
?>