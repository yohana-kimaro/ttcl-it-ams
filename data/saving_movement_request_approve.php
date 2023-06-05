<?php 
require_once('../class/Movement.php');
require_once('../class/MovementStorage.php');
if(isset($_POST['movement_id'])){
	$movement_id = $_POST['movement_id'];
	$movement_sits = $_POST['movement_sits'];
	$movement_itse = $_POST['movement_itse'];
	$movement_rpam = $_POST['movement_rpam'];
	$movement_serialno = $_POST['movement_serialno'];
	$movement_approved_by = $_POST['movement_approved_by'];
	$movement_approved_on = $_POST['movement_approved_on'];
	$username = $_SESSION['username@ttclassetsystem'];
	$ifMovemDone = 'Yes';
	$isMovementApproved = 'Yes';	
	$ifMovementFormAccepted = 'Yes';

	$saveEditMove = $movement->approve_staff_movement_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved, $ifMovementFormAccepted, $movement_serialno, $movement_id);

	$saveEditMovStorage = $movement_storage->approve_staff_movement_storage_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved ,$ifMovementFormAccepted,$movement_serialno, $movement_id);

	$return['valid'] = false;
	if($saveEditMove && $saveEditMovStorage){
		$return['valid'] = true;
		$return['msg'] = "Staff movement request approved successfully";
	}
	echo json_encode($return);
}

$movement->Disconnect();
$movement_storage->Disconnect();
?>
