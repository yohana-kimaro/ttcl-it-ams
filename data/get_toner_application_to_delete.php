<?php 
require_once('../class/Toner.php');
if(isset($_POST['toner_applicant_id'])){
	$toner_applicant_id = $_POST['toner_applicant_id'];
	$itemDetails = $toner->get_toner_applicant_to_delete($toner_applicant_id);
	$return['title'] = "Are you sure you want to delete this request?";
	$return['event'] = "deletetonerapplicant";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['tonerApplID'];
		$return['deletedstaffappli']=$itemDetails['pfNumber'];
		$return['requesttonermodel'] = $itemDetails['requestedTonerModel'];
	}
	echo json_encode($return);		
}

$toner->Disconnect();