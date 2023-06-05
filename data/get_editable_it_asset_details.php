<?php  
require_once('../class/Assets.php');
if(isset($_POST['assetserialnumber'])){ 
	$assetserialnumber = $_POST['assetserialnumber'];
	$itemDetails = $request->get_more_asset_details($assetserialnumber);
	$return['title'] = "Update IT Asset details";
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
	
}

$request->Disconnect();

?>