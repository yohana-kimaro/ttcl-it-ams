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

if(isset($_POST['compupdseralno']) && isset($_POST['compupdlaptopbrand'])){
	$compupdlaptopram = $_POST['compupdlaptopram'];
	$compupdlaptopbrand = $_POST['compupdlaptopbrand'];
	$compupdlaptopmodel = $_POST['compupdlaptopmodel'];
	$compupdlaptoprom = $_POST['compupdlaptoprom'];
	$compupdlaptopstatus = $_POST['compupdlaptopstatus'];
	$compupdlaptopstorage = $_POST['compupdlaptopstorage'];
	$compupdlaptopcapacity = $_POST['compupdlaptopcapacity'];
	$compupdseralno = $_POST['compupdseralno'];
	$compupdlaptoppdf = $_POST['compupdlaptoppdf'];
	$compupdcomptype = $_POST['compupdcomptype'];
	$compupdlaptopprocessor = $_POST['compupdlaptopprocessor'];
	$compupdlaptopanti = $_POST['compupdlaptopanti'];
	$compupdlaptopmac = $_POST['compupdlaptopmac'];
	$compupdlaptopofficeappli = $_POST['compupdlaptopofficeappli'];
	$compupdlaptopyear = $_POST['compupdlaptopyear'];
	$compupdlaptopos = $_POST['compupdlaptopos'];
    $updatedcompsernowhere= $_POST['updatedcompsernowhere'];

	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$compupdseralno = strtoupper(strtolower($compupdseralno));
	$compupdlaptopmodel = strtoupper(strtolower($compupdlaptopmodel));
	$compupdlaptopmac = strtoupper(strtolower($compupdlaptopmac));
	$compupdlaptopprocessor = strtoupper(strtolower($compupdlaptopprocessor));
	$compupdlaptopram = strtoupper(strtolower($compupdlaptopram));
	$compupdlaptopyear = strtoupper(strtolower($compupdlaptopyear));

	$saveItemDoc = $documents->updatecomputer_doc($compupdseralno, $updatedcompsernowhere);
	$saveItemSoftw = $software->update_computer_soft($compupdseralno, $compupdlaptopos, $compupdlaptopofficeappli, $compupdlaptoppdf, $compupdlaptopanti, $updatedcompsernowhere);
	$saveItemMovem = $movement->update_computer_movem($compupdseralno, $updatedcompsernowhere);
	$saveItemHandO = $handover->update_computer_handO($compupdseralno, $updatedcompsernowhere);
	$saveItemMovemSto = $movement_storage->update_computer_movemSto($compupdseralno, $updatedcompsernowhere);
	$saveItemHandSto = $handover_storage->update_computer_handOverSto($compupdseralno, $updatedcompsernowhere);
	$saveItemSpec = $specification->update_computer_spec($compupdseralno, $compupdlaptopram, $compupdlaptopcapacity, $compupdlaptopstorage, $compupdlaptoprom, $compupdlaptopprocessor, $compupdlaptopmac, $updatedcompsernowhere);
	$saveItem = $request->update_computer($compupdseralno, $compupdlaptopbrand, $compupdlaptopmodel, $compupdlaptopstatus, $compupdlaptopyear, $compupdcomptype, $date_time, $asset_added_by, $allocated, $updatedcompsernowhere);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "Computer details updated successfully";
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