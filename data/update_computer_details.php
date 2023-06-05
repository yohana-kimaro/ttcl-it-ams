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

if(isset($_POST['compupdseralno']) && isset($_POST['compupdassetbrand'])){
	$compupdassetram = $_POST['compupdassetram'];
	$compupdassetbrand = $_POST['compupdassetbrand'];
	$compupdassetmodel = $_POST['compupdassetmodel'];
	$compupdassetrom = $_POST['compupdassetrom'];
	$compupdassetstatus = $_POST['compupdassetstatus'];
	$compupdassetstorage = $_POST['compupdassetstorage'];
	$compupdassetcapacity = $_POST['compupdassetcapacity'];
	$compupdseralno = $_POST['compupdseralno'];
	$compupdassetpdf = $_POST['compupdassetpdf'];
	$compupdcomptype = $_POST['compupdcomptype'];
	$compupdassetprocessor = $_POST['compupdassetprocessor'];
	$compupdassetanti = $_POST['compupdassetanti'];
	$compupdassetmac = $_POST['compupdassetmac'];
	$compupdassetofficeappli = $_POST['compupdassetofficeappli'];
	$compupdassetyear = $_POST['compupdassetyear'];
	$compupdassetos = $_POST['compupdassetos'];
    $updatedcompsernowhere= $_POST['updatedcompsernowhere'];

	$date_time = date("Y-m-d h:i:s");
	$asset_added_by=$_SESSION['username@ttclassetsystem'];
	$allocated='No';

	$compupdseralno = strtoupper(strtolower($compupdseralno));
	$compupdassetmodel = strtoupper(strtolower($compupdassetmodel));
	$compupdassetmac = strtoupper(strtolower($compupdassetmac));
	$compupdassetprocessor = strtoupper(strtolower($compupdassetprocessor));
	$compupdassetram = strtoupper(strtolower($compupdassetram));
	$compupdassetyear = strtoupper(strtolower($compupdassetyear));

	$saveItemDoc = $documents->updatecomputer_doc($compupdseralno, $updatedcompsernowhere);
	$saveItemSoftw = $software->update_computer_soft($compupdseralno, $compupdassetos, $compupdassetofficeappli, $compupdassetpdf, $compupdassetanti, $updatedcompsernowhere);
	$saveItemMovem = $movement->update_computer_movem($compupdseralno, $updatedcompsernowhere);
	$saveItemHandO = $handover->update_computer_handO($compupdseralno, $updatedcompsernowhere);
	$saveItemMovemSto = $movement_storage->update_computer_movemSto($compupdseralno, $updatedcompsernowhere);
	$saveItemHandSto = $handover_storage->update_computer_handOverSto($compupdseralno, $updatedcompsernowhere);
	$saveItemSpec = $specification->update_computer_spec($compupdseralno, $compupdassetram, $compupdassetcapacity, $compupdassetstorage, $compupdassetrom, $compupdassetprocessor, $compupdassetmac, $updatedcompsernowhere);
	$saveItem = $request->update_computer($compupdseralno, $compupdassetbrand, $compupdassetmodel, $compupdassetstatus, $compupdassetyear, $compupdcomptype, $date_time, $asset_added_by, $allocated, $updatedcompsernowhere);

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