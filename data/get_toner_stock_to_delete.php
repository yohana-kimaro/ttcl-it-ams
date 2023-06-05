<?php 
require_once('../class/TonerStock.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$itemDetails = $toner_stock->get_toner_to_remove_details($toner_id);
	$return['title'] = "Are you sure you want to remove this toner stock?";
	$return['event'] = "removetonerstock";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['tonerID'];
		$return['removedtonermodelname'] = $itemDetails['tonerModel'];
		$return['removedtonermodel'] = $itemDetails['tonerModel'];
	}
	echo json_encode($return);	
	
}

$toner_stock->Disconnect();

?>