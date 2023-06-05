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

if(isset($_POST['scannerSerialNo']) && isset($_POST['scannerBrand'])){
	$scannerSerialNo = $_POST['scannerSerialNo'];
	$scannerBrand = $_POST['scannerBrand'];
	$scannerModel = $_POST['scannerModel'];
	$scannerStatus = $_POST['scannerStatus'];
	$scannerMAC = $_POST['scannerMAC'];
	$scannerPYear = $_POST['scannerPYear'];
	$scannerAssetType = $_POST['scannerAssetType'];
	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$scannerSerialNo = strtoupper(strtolower($scannerSerialNo));
	$scannerModel = strtoupper(strtolower($scannerModel));
	$scannerMAC = strtoupper(strtolower($scannerMAC));
	$scannerPYear = strtoupper(strtolower($scannerPYear));

	$saveItemDoc = $documents->add_scanner_doc($scannerSerialNo);
	$saveItemSoftw = $software->add_scanner_soft($scannerSerialNo);
	$saveItemMovem = $movement->add_scanner_movem($scannerSerialNo);
	$saveItemHandO = $handover->add_scanner_handO($scannerSerialNo);
	$saveItemMovemSto = $movement_storage->add_scanner_movemSto($scannerSerialNo);
	$saveItemHandSto = $handover_storage->add_scanner_handOverSto($scannerSerialNo);
	$saveItemSpec = $specification->add_scanner_spec($scannerSerialNo, $scannerMAC);
	$saveItem = $request->add_scanner($scannerSerialNo, $scannerBrand, $scannerModel, $scannerStatus, $scannerPYear, $scannerAssetType, $date_time, $asset_added_by, $allocated);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "New scanner added successfully";
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