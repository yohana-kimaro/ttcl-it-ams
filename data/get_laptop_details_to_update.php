<?php 
require_once('../class/Assets.php');
if(isset($_POST['computerserialnumber'])){
	$computerserialnumber = $_POST['computerserialnumber'];
	$itemDetails = $request->get_computer_details($computerserialnumber);
	$return['title'] = "Update computer details";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['itlaptopupdatedevicetype'] = $itemDetails['itAssetType'];
		$return['updateitlaptopname'] = $itemDetails['deviceName'];
		$return['updateitlaptopstatus'] = $itemDetails['status'];
		$return['itlaptopupdateserialno'] = $itemDetails['serialNo'];
		$return['itlaptopupdatebrand'] = $itemDetails['brand'];
		$return['itlaptopupdatemodel'] = $itemDetails['model'];
		$return['itlaptopupdatestatus'] = $itemDetails['status'];
		$return['updateitlaptopmacaddress'] = $itemDetails['macAddress'];
		$return['updateitlaptoppurchasedyear'] = $itemDetails['purchasedYear'];
		$return['updateitlaptopstorage'] = $itemDetails['storage'];
		$return['updateitlaptopcapacity'] = $itemDetails['capacity'];
		$return['updateitlaptopprocessor'] = $itemDetails['processorSpeed'];
		$return['updateitlaptopram'] = $itemDetails['RAM'];
		$return['updateitlaptopcdrom'] = $itemDetails['cdRomDrive'];
		$return['updateitlaptopos'] = $itemDetails['os'];
		$return['updateitlaptopofficeappli'] = $itemDetails['msOffice'];
		$return['updateitlaptopantivirus'] = $itemDetails['antiVirus'];
		$return['updateitlaptoppdf'] = $itemDetails['pdfReader'];
	}
	echo json_encode($return);	
	
}//end isset

$request->Disconnect();