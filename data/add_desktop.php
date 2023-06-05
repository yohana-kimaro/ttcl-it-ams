<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('../class/Assets.php');
require_once('../class/Software.php');
require_once('../class/Documents.php');
require_once('../class/Handover.php');
require_once('../class/Movement.php');
require_once('../class/HandoverStorage.php');
require_once('../class/MovementStorage.php');
require_once('../class/Specification.php'); 

if(isset($_POST['desktopSerialNo']) && isset($_POST['desktopBrand'])){
	$desktopRAM = $_POST['desktopRAM'];
	$desktopBrand = $_POST['desktopBrand'];
	$desktopModel = $_POST['desktopModel'];
	$desktopCDRom = $_POST['desktopCDRom'];
	$desktopStatus = $_POST['desktopStatus'];
	$desktopStorage = $_POST['desktopStorage'];
	$desktopCapacity = $_POST['desktopCapacity'];
	$desktopSerialNo = $_POST['desktopSerialNo'];
	$desktopPDFReader = $_POST['desktopPDFReader'];
	$desktopAssetType = $_POST['desktopAssetType'];
	$desktopProcessor = $_POST['desktopProcessor'];
	$desktopAntivirus = $_POST['desktopAntivirus'];
	$desktopMACAddress = $_POST['desktopMACAddress'];
	$desktopOfficeAppli = $_POST['desktopOfficeAppli'];
	$desktopPurchasedYear = $_POST['desktopPurchasedYear'];
	$desktopOperatingSystem = $_POST['desktopOperatingSystem'];

	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$desktopSerialNo = strtoupper(strtolower($desktopSerialNo));
	$desktopModel = strtoupper(strtolower($desktopModel));
	$desktopMACAddress = strtoupper(strtolower($desktopMACAddress));
	$desktopProcessor = strtoupper(strtolower($desktopProcessor));
	$desktopRAM = strtoupper(strtolower($desktopRAM));
	$desktopPurchasedYear = strtoupper(strtolower($desktopPurchasedYear));

	$saveItemDoc = $documents->adddesktop_doc($desktopSerialNo);
	$saveItemSoftw = $software->add_desktop_soft($desktopSerialNo, $desktopOperatingSystem, $desktopOfficeAppli, $desktopPDFReader, $desktopAntivirus);
	$saveItemMovem = $movement->add_desktop_movem($desktopSerialNo);
	$saveItemHandO = $handover->add_desktop_handO($desktopSerialNo);
	$saveItemMovemSto = $movement_storage->add_desktop_movemSto($desktopSerialNo);
	$saveItemHandSto = $handover_storage->add_desktop_handOverSto($desktopSerialNo);
	$saveItemSpec = $specification->add_desktop_spec($desktopSerialNo, $desktopRAM, $desktopCapacity, $desktopStorage, $desktopCDRom, $desktopProcessor, $desktopMACAddress);
	$saveItem = $request->add_desktop($desktopSerialNo, $desktopBrand, $desktopModel, $desktopStatus, $desktopPurchasedYear, $desktopAssetType, $date_time, $asset_added_by, $allocated);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "New desktop added successfully";
	}else{
		$return['valid'] = false;
	}
	echo json_encode($return);
}//end isset

$request->Disconnect();
$software->Disconnect();
$documents->Disconnect();
$movement->Disconnect();
$handover->Disconnect();
$handover_storage->Disconnect();
$movement_storage->Disconnect();
$specification->Disconnect();

?>