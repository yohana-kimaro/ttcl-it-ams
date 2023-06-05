<?php 
require_once('../class/Assets.php');
if(isset($_POST['itassetdeleserialno'])){
	$itassetdeleserialno = $_POST['itassetdeleserialno'];
	$itemDetails = $request->get_more_asset_details($itassetdeleserialno);
	$return['title'] = "Are you sure you want to delete this device ?";
	$return['event'] = "delete";
	if($itemDetails > 0){
		$return['deleteitasset'] = $itemDetails['serialNo'];
	}
	echo json_encode($return);	
}

$request->Disconnect();

?>