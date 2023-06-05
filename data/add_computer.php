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

if(isset($_POST['computerSerialNo']) && isset($_POST['computerBrand'])){
	$computerRAM = $_POST['computerRAM'];
	$computerBrand = $_POST['computerBrand'];
	$computerModel = $_POST['computerModel'];
	$computerCDRom = $_POST['computerCDRom'];
	$computerStatus = $_POST['computerStatus'];
	$computerStorage = $_POST['computerStorage'];
	$computerCapacity = $_POST['computerCapacity'];
	$computerSerialNo = $_POST['computerSerialNo'];
	$computerPDFReader = $_POST['computerPDFReader'];
	$computerAssetType = $_POST['computerAssetType'];
	$computerProcessor = $_POST['computerProcessor'];
	$computerAntivirus = $_POST['computerAntivirus'];
	$computerMACAddress = $_POST['computerMACAddress'];
	$computerOfficeAppli = $_POST['computerOfficeAppli'];
	$computerPurchasedYear = $_POST['computerPurchasedYear'];
	$computerOperatingSystem = $_POST['computerOperatingSystem'];

	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$computerSerialNo = strtoupper(strtolower($computerSerialNo));
	$computerModel = strtoupper(strtolower($computerModel));
	$computerMACAddress = strtoupper(strtolower($computerMACAddress));
	$computerProcessor = strtoupper(strtolower($computerProcessor));
	$computerRAM = strtoupper(strtolower($computerRAM));
	$computerPurchasedYear = strtoupper(strtolower($computerPurchasedYear));

	$saveItemDoc = $documents->addcomputer_doc($computerSerialNo);
	$saveItemSoftw = $software->add_computer_soft($computerSerialNo, $computerOperatingSystem, $computerOfficeAppli, $computerPDFReader, $computerAntivirus);
	$saveItemMovem = $movement->add_computer_movem($computerSerialNo);
	$saveItemHandO = $handover->add_computer_handO($computerSerialNo);
	$saveItemMovemSto = $movement_storage->add_computer_movemSto($computerSerialNo);
	$saveItemHandSto = $handover_storage->add_computer_handOverSto($computerSerialNo);
	$saveItemSpec = $specification->add_computer_spec($computerSerialNo, $computerRAM, $computerCapacity, $computerStorage, $computerCDRom, $computerProcessor, $computerMACAddress);
	$saveItem = $request->add_computer($computerSerialNo, $computerBrand, $computerModel, $computerStatus, $computerPurchasedYear, $computerAssetType, $date_time, $asset_added_by, $allocated);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "New computer added successfully";
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