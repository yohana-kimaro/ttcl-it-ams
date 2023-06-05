<?php 
require_once('../class/TonerStock.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$itemDetails = $toner_stock->get_new_adding_stock($toner_id);
	
	$return['title'] = "Update toner cartridge stock";
	$return['event'] = "addtonerstock";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['tonerID'];
		$return['laststockaddeddate'] = $itemDetails['tonerStockAddedOn'];
	}
	echo json_encode($return);	
	
}//end isset

$toner_stock->Disconnect();