<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$toner_pfno = $_POST['toner_pfno'];
	$saveEdit = $toner_request->delete_toner_staff_application($toner_id, $toner_pfno);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner application delete successfully";
	}
	echo json_encode($return);
}
$toner_request->Disconnect();
