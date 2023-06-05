<?php 
require_once('../class/Handover.php');
require_once('../class/HandoverStorage.php');

if(isset($_POST['handover_id'])){
	$handover_id = $_POST['handover_id'];
	$handoverstaffreqrejserialno = $_POST['handoverstaffreqrejserialno'];
	$handoverstaffreqrejrejectedby = $_POST['handoverstaffreqrejrejectedby'];
	$handoverstaffrejrejectedjustif = $_POST['handoverstaffrejrejectedjustif'];
	$ifHandOver='No';
	$handOverConfirmation='No';
	$handoverstaffrejrejectedjustif=ucfirst(strtolower($handoverstaffrejrejectedjustif));

	$saveEditHand = $handover->reject_staff_requests_to_handover($handoverstaffrejrejectedjustif,$handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation, $handover_id, $handoverstaffreqrejserialno);

	$saveEditHandStor = $handover_storage->reject_staff_requests_to_handover_storage($handoverstaffrejrejectedjustif, $handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation,$handover_id, $handoverstaffreqrejserialno);

	$return['valid'] = false;
	if($saveEditHand && $saveEditHandStor){
		$return['valid'] = true;
		$return['msg'] = "Staff handover request rejected successfully";
	}
	echo json_encode($return);
}

$handover->Disconnect();
$handover_storage->Disconnect();
