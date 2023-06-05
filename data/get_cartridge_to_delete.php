<?php 
require_once('../class/Toner.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$itemDetails = $toner->get_toner_details_delete($toner_id);
	$return['title'] = "Are you sure you want to delete toner details?";
	$return['event'] = "updatetonerdelete";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['tonerID'];
	}
	echo json_encode($return);	
	
}

$toner->Disconnect();

?>