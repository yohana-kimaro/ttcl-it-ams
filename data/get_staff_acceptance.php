<?php 
require_once('../class/Acceptance.php');
if(isset($_POST['acceptance_id'])){
	$acceptance_id = $_POST['acceptance_id'];
	$itemDetails = $acceptance->get_acceptance_device_details($acceptance_id);
	$return['title'] = "Attach scanned acceptance form";
	$return['event'] = "acceptanceform";
	if($itemDetails > 0){
		$return['acceptanceDeviceName'] = $itemDetails['deviceName'];
		$return['acceptanceSerialNumber'] = $itemDetails['serialNo'];
		$return['acceptanceID'] = $itemDetails['applicantID'];
		$return['acceptanceAssetType'] = $itemDetails['deviceType'];
		$return['acceptanceBrand'] = $itemDetails['brand'];
		$return['acceptanceModel'] = $itemDetails['model'];
		$return['acceptanceProcessor'] = $itemDetails['processorSpeed'];
		$return['acceptanceRAM'] = $itemDetails['RAM'];
		$return['acceptanceStatus'] = $itemDetails['status'];
		// $return['acceptanceFirstName'] = $itemDetails['firstName'];
		// $return['acceptanceSecondName'] = $itemDetails['secondName'];
		// $return['acceptanceSurname'] = $itemDetails['surname'];
		$return['acceptanceCapacity'] = $itemDetails['capacity'];
		$return['acceptanceStorage'] = $itemDetails['storage'];
		// $return['grams'] = $itemDetails['item_grams'];
		// $return['type'] = $itemDetails['item_type_id'];		
	}
	echo json_encode($return);	
	
}//end isset

$acceptance->Disconnect();