<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['appli_toner_id'])){
	$appli_toner_id = $_POST['appli_toner_id'];
	$appli_toner_pfno = $_POST['appli_toner_pfno'];
	$appli_toner_text = $_POST['appli_toner_text'];
	$appli_toner_approved_by = $_POST['appli_toner_approved_by'];
	$appli_toner_approved_on = $_POST['appli_toner_approved_on'];

	$saveEdit = $toner_request->saving_approve_toner_requ($appli_toner_approved_on, $appli_toner_approved_by, $appli_toner_text, $appli_toner_pfno, $appli_toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner request approved successfully";
	}
	echo json_encode($return);
}
$toner_request->Disconnect();

?>
