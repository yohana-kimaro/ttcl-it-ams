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

if(isset($_POST['laptopSerialNo']) && isset($_POST['laptopBrand'])){
	$laptopRAM = $_POST['laptopRAM'];
	$laptopBrand = $_POST['laptopBrand'];
	$laptopModel = $_POST['laptopModel'];
	$laptopCDRom = $_POST['laptopCDRom'];
	$laptopStatus = $_POST['laptopStatus'];
	$laptopStorage = $_POST['laptopStorage'];
	$laptopCapacity = $_POST['laptopCapacity'];
	$laptopSerialNo = $_POST['laptopSerialNo'];
	$laptopPDFReader = $_POST['laptopPDFReader'];
	$laptopAssetType = $_POST['laptopAssetType'];
	$laptopProcessor = $_POST['laptopProcessor'];
	$laptopAntivirus = $_POST['laptopAntivirus'];
	$laptopMACAddress = $_POST['laptopMACAddress'];
	$laptopOfficeAppli = $_POST['laptopOfficeAppli'];
	$laptopPurchasedYear = $_POST['laptopPurchasedYear'];
	$laptopOperatingSystem = $_POST['laptopOperatingSystem'];

	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$laptopSerialNo = strtoupper(strtolower($laptopSerialNo));
	$laptopModel = strtoupper(strtolower($laptopModel));
	$laptopMACAddress = strtoupper(strtolower($laptopMACAddress));
	$laptopProcessor = strtoupper(strtolower($laptopProcessor));
	$laptopRAM = strtoupper(strtolower($laptopRAM));
	$laptopPurchasedYear = strtoupper(strtolower($laptopPurchasedYear));

	$saveItemDoc = $documents->addlaptop_doc($laptopSerialNo);
	$saveItemSoftw = $software->add_laptop_soft($laptopSerialNo, $laptopOperatingSystem, $laptopOfficeAppli, $laptopPDFReader, $laptopAntivirus);
	$saveItemMovem = $movement->add_laptop_movem($laptopSerialNo);
	$saveItemHandO = $handover->add_laptop_handO($laptopSerialNo);
	$saveItemMovemSto = $movement_storage->add_laptop_movemSto($laptopSerialNo);
	$saveItemHandSto = $handover_storage->add_laptop_handOverSto($laptopSerialNo);
	$saveItemSpec = $specification->add_laptop_spec($laptopSerialNo, $laptopRAM, $laptopCapacity, $laptopStorage, $laptopCDRom, $laptopProcessor, $laptopMACAddress);
	$saveItem = $request->add_laptop($laptopSerialNo, $laptopBrand, $laptopModel, $laptopStatus, $laptopPurchasedYear, $laptopAssetType, $date_time, $asset_added_by, $allocated);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "New laptop added successfully";
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