<?php 
require_once('../class/ITSupportSupervisor.php');
if(isset($_POST['application_id'])){
	$application_id = $_POST['application_id'];
	$staffVerifyPfNo = $_POST['staffVerifyPfNo'];
	$staffVerifyJustif = $_POST['staffVerifyJustif'];
	$issVerifyName = $_POST['issVerifyName'];
	$issVerifiedOn = $_POST['issVerifiedOn'];
	$issVerifyText= $_POST['issVerifyText'];

	$staffVerifyJustif=ucfirst(strtolower($staffVerifyJustif));
	$saveEdit = $it_support_supervisor->saving_verified_request($application_id, $staffVerifyPfNo, $staffVerifyJustif, $issVerifyName, $issVerifyText, $issVerifiedOn);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff request verified successfully";
	}
	echo json_encode($return);
}//end isset
$it_support_supervisor->Disconnect();
?>