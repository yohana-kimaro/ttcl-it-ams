<?php 
require_once('../class/StaffDeviceAllocated.php');
if(isset($_POST['asset_alloc_id'])){
	$asset_alloc_id = $_POST['asset_alloc_id'];
	$itemDetails = $staffdevicealloc->get_staff_more_allocated_spec($asset_alloc_id);
	$return['title'] = "More allocated details";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['moreAllocatedSNo'] = $itemDetails['serialNo'];
		$return['moreAllocatedDeviceType'] = $itemDetails['itAssetType'];
		$return['moreAllocatedDeviceName'] = $itemDetails['deviceName'];
		$return['moreAllocatedSerial'] = $itemDetails['serialNo'];
		$return['moreAllocatedBrand'] = $itemDetails['brand'];
		$return['moreAllocatedModel'] = $itemDetails['model'];
		$return['moreAllocatedProcessor'] = $itemDetails['processorSpeed'];
		$return['moreAllocatedStorage'] = $itemDetails['storage'];
		$return['moreAllocatedStatus'] = $itemDetails['status'];
		$return['moreAllocatedID'] = $itemDetails['applicantID'];
		$return['moreAllocatedRAM'] = $itemDetails['RAM'];
		$return['moreAllocatedCapacity'] = $itemDetails['capacity'];
		$return['moreAllocatedFName'] = $itemDetails['firstName'];
		$return['moreAllocatedSName'] = $itemDetails['secondName'];
		$return['moreAllocatedSurname'] = $itemDetails['surName'];
	}
	echo json_encode($return);		
} 

$staffdevicealloc->Disconnect();
?>