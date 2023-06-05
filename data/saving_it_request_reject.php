<?php 
require_once('../class/ITManager.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffRejectPfNo = $_POST['staffRejectPfNo'];
	$itRejectName = $_POST['itRejectName'];
	$itRejectedOn = $_POST['itRejectedOn'];
	$itRejectText= $_POST['itRejectText'];
	$itRejectJustific=$_POST['itRejectJustific'];

	$itRejectJustific=ucfirst(strtolower($itRejectJustific));
	$saveEdit = $it_manager->saving_rejected_request($application_id, $staffRejectPfNo, $itRejectName, $itRejectText, $itRejectJustific, $itRejectedOn);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request rejected successfully";
	}
	echo json_encode($return);
}
$it_manager->Disconnect();
?>