<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('../class/Assets.php');
require_once('../class/Applicant.php');
require_once('../class/Software.php');
require_once('../class/Documents.php');
require_once('../class/Handover.php');
require_once('../class/Movement.php');
require_once('../class/HandoverStorage.php');
require_once('../class/MovementStorage.php');
require_once('../class/Specification.php');

if(isset($_POST['allocated_applicant_pfnamba']) && isset($_POST['allocated_applicant_id'])){
	$allocated_asset_serial_no = $_POST['allocated_asset_serial_no'];
	$allocated_applicant_pfnamba = $_POST['allocated_applicant_pfnamba'];
	$allocated_applicant_id = $_POST['allocated_applicant_id'];
	$allocated_asset_cname = $_POST['allocated_asset_cname'];
	$allocated_asset_others = $_POST['allocated_asset_others'];
	$allocated_asset_user_manual = $_POST['allocated_asset_user_manual'];
	$allocated_asset_accepted_policy = $_POST['allocated_asset_accepted_policy'];
	$allocated_asset_user_response = $_POST['allocated_asset_user_response'];
	$allocated_asset_how_to_guide = $_POST['allocated_asset_how_to_guide'];
	$allocated_asset_allocated_by = $_POST['allocated_asset_allocated_by'];
	$allocated_asset_allocated_on = $_POST['allocated_asset_allocated_on'];

	$itsupportallocationjustif = $_POST['itsupportallocationjustif'];

	$itsupportallocationjustif = ucfirst(strtolower($itsupportallocationjustif));

	$allocated='Yes';

	if(trim($allocated_asset_others) === ""){
		$allocated_asset_others = 'No extra devices';
	}

	if(trim($allocated_asset_user_manual) === ""){
		$allocated_asset_user_manual = 'No';
	}

	if(trim($allocated_asset_accepted_policy) === ""){
		$allocated_asset_accepted_policy = 'No';
	}

	if(trim($allocated_asset_user_response) === ""){
		$allocated_asset_user_response = 'No';
	}

	if(trim($allocated_asset_how_to_guide) === ""){
		$allocated_asset_how_to_guide = 'No';
	}

	$allocated_asset_cname = strtoupper(strtolower($allocated_asset_cname));
	$allocated_asset_others = ucwords(strtolower($allocated_asset_others));

	$saveItemDoc = $documents->allocate_it_asset_documents($allocated_asset_user_manual, $allocated_asset_accepted_policy, $allocated_asset_user_response, $allocated_applicant_id, $allocated_asset_how_to_guide, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	$saveItemSoftw = $software->allocate_it_asset_software($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	$saveItemMovem = $movement->allocate_it_asset_movement($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	$saveItemHandO = $handover->allocate_it_asset_handover($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	$saveItemMovemSto = $movement_storage->allocate_it_asset_move_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	$saveItemHandSto = $handover_storage->allocate_it_asset_hand_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	$saveItemSpec = $specification->allocate_it_asset__spec($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	$saveItem = $request->allocate_it_asset_device_tb($allocated_applicant_pfnamba, $allocated_asset_cname, $allocated, $allocated_asset_others, $allocated_applicant_id, $allocated_asset_allocated_on, $allocated_asset_serial_no);

	$saveItemAppli = $applicant_staff->allocate_it_asset_applicant($allocated, $allocated_asset_allocated_by, $allocated_asset_allocated_on, $itsupportallocationjustif, $allocated_applicant_id);

	if($saveItemMovem && $saveItemHandO && $saveItemHandSto && $saveItemMovemSto && $saveItemSoftw && $saveItemDoc && $saveItem && $saveItemSpec && $saveItemAppli){
		$return['valid'] = true;
		$return['msg'] = "Allocation IT Asset to staff done successfully";
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
$applicant_staff->Disconnect();
$handover_storage->Disconnect();
$movement_storage->Disconnect();
$specification->Disconnect();

?>