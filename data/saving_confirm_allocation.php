<?php 
require_once('../class/TonerRequest.php');
if(isset($_POST['toner_staff_alloc_id'])){
	$toner_staff_alloc_id = $_POST['toner_staff_alloc_id'];
	$toner_staff_alloc_pfnamba = $_POST['toner_staff_alloc_pfnamba'];
	$toner_staff_alloc_model = $_POST['toner_staff_alloc_model'];
	$toner_staff_alloc_text = $_POST['toner_staff_alloc_text'];
	$toner_staff_alloc_text_date= $_POST['toner_staff_alloc_text_date'];

	$saveEdit = $toner_request->confirm_toner_allocation($toner_staff_alloc_text, $toner_staff_alloc_text_date, $toner_staff_alloc_model, $toner_staff_alloc_pfnamba, $toner_staff_alloc_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Staff toner allocation confirmed successfully";
	}
	echo json_encode($return);
}
$toner_request->Disconnect();

?>
