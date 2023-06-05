<?php 
require_once('../class/Toner.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	
	$saveEdit = $toner->delete_toner_details($toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner details deleted successfully";
	}
	echo json_encode($return);
}
$toner->Disconnect();
