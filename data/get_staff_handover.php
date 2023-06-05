<?php 
require_once('../class/Handover.php');
if(isset($_POST['handover_id'])){
	$handover_id = $_POST['handover_id'];
	$itemDetails = $handover->get_handover_device_details($handover_id);
	$return['title'] = "Attach scanned handover form";
	$return['event'] = "handoverform";
	if($itemDetails > 0){
		$return['handoverDeviceName'] = $itemDetails['deviceName'];
		$return['handoverSerialNumber'] = $itemDetails['serialNo'];
		$return['handoverID'] = $itemDetails['applicantID'];
		$return['handoverAssetType'] = $itemDetails['deviceType'];
		$return['handoverBrand'] = $itemDetails['brand'];
		$return['handoverModel'] = $itemDetails['model'];
		$return['handoverProcessor'] = $itemDetails['processorSpeed'];
		$return['handoverRAM'] = $itemDetails['RAM'];
		$return['handoverStatus'] = $itemDetails['status'];
		$return['handoverFirstName'] = $itemDetails['firstName'];
		$return['handoverSecondName'] = $itemDetails['secondName'];
		$return['handoverSurname'] = $itemDetails['surName'];
		$return['handoverCapacity'] = $itemDetails['capacity'];
		$return['handoverStorage'] = $itemDetails['storage'];	
	}
	echo json_encode($return);	
	
}//end isset

$handover->Disconnect();