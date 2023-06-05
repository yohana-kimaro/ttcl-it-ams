<?php 
require_once('../class/MovementStorage.php');
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$movement_pfnamba = $_POST['movement_pfnamba'];
	$mov_cofirmed_on = $_POST['mov_cofirmed_on'];
	$mov_cofirmed_by = $_POST['mov_cofirmed_by'];
	$movementCompleted='Yes';
	// $brand = $_POST['brand'];
	// $grams = $_POST['grams'];

	$saveEdit = $movement_storage->confirm_staff_movement($movementCompleted, $mov_cofirmed_on, $mov_cofirmed_by, $movement_pfnamba, $movement_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Device movement cofirmed successfully!";
	}
	echo json_encode($return);
}//end isset
$movement_storage->Disconnect();
