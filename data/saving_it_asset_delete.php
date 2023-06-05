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

if(isset($_POST['itAssetDeleteSerialNo'])){
	$itAssetDeleteSerialNo = $_POST['itAssetDeleteSerialNo'];

	$saveItemDoc = $documents->delete_it_asset_doc($itAssetDeleteSerialNo);
	$saveItemSoftw = $software->delete_it_asset_soft($itAssetDeleteSerialNo);
	$saveItemMovem = $movement->delete_it_asset_movem($itAssetDeleteSerialNo);
	$saveItemHandO = $handover->delete_it_asset_handO($itAssetDeleteSerialNo);
	$saveItemMovemSto = $movement_storage->delete_it_asset_movemSto($itAssetDeleteSerialNo);
	$saveItemHandSto = $handover_storage->delete_it_asset_handOverSto($itAssetDeleteSerialNo);
	$saveItemSpec = $specification->delete_it_asset_spec($itAssetDeleteSerialNo);
	$saveItem = $request->delete_it_asset_req($itAssetDeleteSerialNo);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec){
		$return['valid'] = true;
		$return['msg'] = "IT Asset deleted successfully";
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