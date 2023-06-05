<?php 
require_once('../class/Assets.php');
if(isset($_POST['computerserialnumber'])){
	$computerserialnumber = $_POST['computerserialnumber'];
	$itemDetails = $request->get_computer_details($computerserialnumber);
	$return['title'] = "Update computer details";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['itassetupdatedevicetype'] = $itemDetails['itAssetType'];
		$return['updateitassetname'] = $itemDetails['deviceName'];
		$return['updateitassetstatus'] = $itemDetails['status'];
		$return['itassetupdateserialno'] = $itemDetails['serialNo'];
		$return['itassetupdatebrand'] = $itemDetails['brand'];
		$return['itassetupdatemodel'] = $itemDetails['model'];
		$return['itassetupdatestatus'] = $itemDetails['status'];
		$return['updateitassetmacaddress'] = $itemDetails['macAddress'];
		$return['updateitassetpurchasedyear'] = $itemDetails['purchasedYear'];
		$return['updateitassetstorage'] = $itemDetails['storage'];
		$return['updateitassetcapacity'] = $itemDetails['capacity'];
		$return['updateitassetprocessor'] = $itemDetails['processorSpeed'];
		$return['updateitassetram'] = $itemDetails['RAM'];
		$return['updateitassetcdrom'] = $itemDetails['cdRomDrive'];
		$return['updateitassetos'] = $itemDetails['os'];
		$return['updateitassetofficeappli'] = $itemDetails['msOffice'];
		$return['updateitassetantivirus'] = $itemDetails['antiVirus'];
		$return['updateitassetpdf'] = $itemDetails['pdfReader'];
	}
	echo json_encode($return);	
	
}//end isset

$request->Disconnect();