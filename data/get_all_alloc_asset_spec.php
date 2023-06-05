<?php 
require_once('../class/TotalAllocationLists.php');
if(isset($_POST['staff_appli_id'])){
	$staff_appli_id = $_POST['staff_appli_id'];
	$itemDetails = $allocationList->get_staff_more_alloc_spec($staff_appli_id);
	$return['title'] = "More allocated device details";
	$return['event'] = "allocdevicesdetailsstaff";
	if($itemDetails > 0){
		$return['moreallocSNo'] = $itemDetails['serialNo'];
		$return['moreallocDeviceType'] = $itemDetails['itAssetType'];
		$return['moreallocDeviceName'] = $itemDetails['deviceName'];
		$return['moreallocSerial'] = $itemDetails['serialNo'];
		$return['moreallocBrand'] = $itemDetails['brand'];
		$return['moreallocModel'] = $itemDetails['model'];
		$return['moreallocProcessor'] = $itemDetails['processorSpeed'];
		$return['moreallocStorage'] = $itemDetails['storage'];
		$return['moreallocStatus'] = $itemDetails['status'];
		$return['moreallocID'] = $itemDetails['applicantID'];
		$return['moreallocRAM'] = $itemDetails['RAM'];
		$return['moreallocCapacity'] = $itemDetails['capacity'];
		$return['moreallocFName'] = $itemDetails['firstName'];
		$return['moreallocSName'] = $itemDetails['secondName'];
		$return['moreallocSurname'] = $itemDetails['surName'];
		$return['moreallocDepartment'] = $itemDetails['department'];
		$return['moreallocDesignation'] = $itemDetails['designation'];
		$return['moreallocOffBulid'] = $itemDetails['offBuild'];
		$return['moreallocRegion'] = $itemDetails['region'];
	}
	echo json_encode($return);		
} 

$allocationList->Disconnect();
?>