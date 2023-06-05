<?php 
require_once('../class/TonerStock.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$toner_model = $_POST['toner_model'];
	$toner_reset = $_POST['toner_reset'];

	$saveEdit = $toner_stock->reset_toner_details($toner_reset, $toner_model, $toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner details updated successfully";
	}
	echo json_encode($return);
}
$toner_stock->Disconnect();
?>
