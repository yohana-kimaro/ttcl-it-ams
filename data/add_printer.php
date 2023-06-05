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

if(isset($_POST['printerSerialNo']) && isset($_POST['printerBrand'])){
	$printerSerialNo = $_POST['printerSerialNo'];
	$printerBrand = $_POST['printerBrand'];
	$printerModel = $_POST['printerModel'];
	$printerStatus = $_POST['printerStatus'];
	$printerMAC = $_POST['printerMAC'];
	$printerPYear = $_POST['printerPYear'];
	$printerAssetType = $_POST['printerAssetType'];
	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$printerSerialNo = strtoupper(strtolower($printerSerialNo));
	$printerModel = strtoupper(strtolower($printerModel));
	$printerMAC = strtoupper(strtolower($printerMAC));
	$printerPYear = strtoupper(strtolower($printerPYear));

	$saveItemDoc = $documents->addprinter_doc($printerSerialNo);
	$saveItemSoftw = $software->add_printer_soft($printerSerialNo);
	$saveItemMovem = $movement->add_printer_movem($printerSerialNo);
	$saveItemHandO = $handover->add_printer_handO($printerSerialNo);
	$saveItemMovemSto = $movement_storage->add_printer_movemSto($printerSerialNo);
	$saveItemHandSto = $handover_storage->add_printer_handOverSto($printerSerialNo);
	$saveItemSpec = $specification->add_printer_spec($printerSerialNo, $printerMAC);
	$saveItem = $request->add_printer($printerSerialNo, $printerBrand, $printerModel, $printerStatus, $printerPYear, $printerAssetType, $date_time, $asset_added_by, $allocated);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "New printer added successfully";
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