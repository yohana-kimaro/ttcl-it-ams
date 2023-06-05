<?php 
require_once('../class/Toner.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$itemDetails = $toner->get_toner_details($toner_id);
	$return['title'] = "Are you sure you want to update toner details?";
	$return['event'] = "updatetoner";
	if($itemDetails > 0){
		$return['tonerstatus'] = $itemDetails['tonerStatus'];
		$return['id'] = $itemDetails['tonerID'];
		$return['tonermodel'] = $itemDetails['tonerModel'];
		$return['tonerbrand'] = $itemDetails['tonerBrand'];
		$return['toneraddedby'] = $itemDetails['addedBy'];
		$return['toneraddedon'] = $itemDetails['addedOn'];
		$return['tonerupdatedby'] = $itemDetails['updatedBy'];
		$return['tonerupdatedon'] = $itemDetails['updatedOn'];
	}
	echo json_encode($return);	
	
}

$toner->Disconnect();

?>