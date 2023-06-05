<?php 
require_once('../class/Assets.php');
if(isset($_POST['assetserialnumber'])){
	$assetserialnumber = $_POST['assetserialnumber'];
	$itemDetails = $request->get_more_asset_details($assetserialnumber);
	$return['title'] = "More asset details";
	$return['event'] = "more";
	if($itemDetails > 0){
		$return['moreassetname'] = $itemDetails['deviceName'];
		$return['moreassetstatus'] = $itemDetails['status'];
		$return['moreassetserialnam'] = $itemDetails['serialNo'];
		$return['moreassetprocessorspeed'] = $itemDetails['processorSpeed'];
		$return['moreassetcdrom'] = $itemDetails['cdRomDrive'];
		$return['moreassetos'] = $itemDetails['os'];
		$return['moreassetmsoffice'] = $itemDetails['msOffice'];
		$return['moreassetrecordedon'] = $itemDetails['recordedDate'];
		$return['moreassetrecordedby'] = $itemDetails['recordedby'];
		$return['moreassetupdatedby'] = $itemDetails['updatedby'];		
		$return['moreassetupdatedon'] = $itemDetails['updatedOn'];
	}
	echo json_encode($return);	
	
}

$request->Disconnect();

?>