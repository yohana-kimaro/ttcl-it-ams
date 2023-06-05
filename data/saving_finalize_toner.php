<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$toner_fpno = $_POST['toner_fpno'];
	$toner_allocated_on = $_POST['toner_allocated_on'];
	$toner_alloc_yes = $_POST['toner_alloc_yes'];
	$toner_alloc_model= $_POST['toner_alloc_model'];
	
	$saveEdit = $toner_request->saving_finalize_toner($toner_alloc_yes, $toner_allocated_on, $toner_alloc_model, $toner_fpno, $toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff toner finalized successfullY";
	}
	echo json_encode($return);
}//end isset
$toner_request->Disconnect();
