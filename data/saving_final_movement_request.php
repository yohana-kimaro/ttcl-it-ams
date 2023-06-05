<?php 
require_once('../class/Applicant.php');
require_once('../class/Handover.php');
require_once('../class/Movement.php');
require_once('../class/Assets.php');
require_once('../class/Software.php');
require_once('../class/Documents.php');
require_once('../class/Specification.php');
require_once('../class/HandoverStorage.php');
require_once('../class/MovementStorage.php');

if(isset($_POST['movem_id'])){
	$movem_id = $_POST['movem_id'];
	$movem_frompfnamba = $_POST['movem_frompfnamba'];
	$movem_serialno = $_POST['movem_serialno'];
	$movem_devstatus = $_POST['movem_devstatus'];
	$movem_date = $_POST['movem_date'];
	$movem_by = $_POST['movem_by'];
	$moveto_dmanager=$_POST['moveto_dmanager'];
	$moveto_region= $_POST['moveto_region'];
	$movem_topfnamba = $_POST['movem_topfnamba'];
	$moveto_fname=$_POST['moveto_fname'];
	$moveto_mname=$_POST['moveto_mname'];
	$moveto_lname=$_POST['moveto_lname'];
	$moveto_offbuild=$_POST['moveto_offbuild'];
	$moveto_designation=$_POST['moveto_designation'];
	$moveto_department=$_POST['moveto_department'];
 
	$allocated='Yes';
	$confirm='Yes';
	$acceptSupporter='Yes';


	$movedFromName='NULL';
    $movedFromDate='NULL';
    $movedTOName = 'NULL';
    $movedTODesignation='NULL';
    $movementReq='No';
    $itSupSuppMove='NULL';
    $itSuppSupp='NULL';
    $movedTolName='NULL';
    $movedTomName='NULL';
    $movedFromMName='NULL';
    $movedFromLName='NULL';
    $movedFromDep='NULL';
    $movedFromDutyS='NULL';
    $movedToDutyS='NULL';
    $movedToSerialNo='NULL';
    $movedToDep='NULL';
    $movementAttachment='NULL';
    $moveTopfNo='NULL';
    $movedFromDevType='NULL';
    $itSuppSA='NULL';
    $itSuppEA='NULL';
    $rpamA='NULL';
    $ifMovemDone='No';
    $movemRejectComm='NULL';
    $ifMovementApproved='No';
    $movementFormAccepted='No';
    $movementCompleted='No';
    $movementConfirm='No';
    $ifMovementRejected='No';



	$saveEditAppli = $applicant_staff->update_movement_to_applicant($movem_topfnamba, $moveto_fname, $moveto_mname, $moveto_lname, $moveto_designation, $moveto_department, $movem_date, $moveto_offbuild, $moveto_region, $moveto_dmanager, $movem_id, $movem_frompfnamba);

	$saveEditDev = $request->update_movement_to_devicetb($movem_topfnamba, $movem_devstatus, $movem_date, $movem_id, $movem_frompfnamba, $movem_serialno);

	$saveEditSpec = $specification->update_movement_to_specification($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);

	$saveEditSoftware = $software->update_movement_to_software($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);

	$saveEditDocs = $documents->update_movement_to_documents($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);

	$saveEditHandover = $handover->update_movement_to_handover($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);

	$saveEditHandStorage = $handover_storage->update_movement_to_handover_storage($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);

	$saveEditMove = $movement->update_movement_to_movementtb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id);


	$saveEditMovementStorage = $movement_storage->update_movement_to_movementstoragetb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id);



	$return['valid'] = false;
	if($saveEditMovementStorage && $saveEditMove && $saveEditHandStorage && $saveEditHandover && $saveEditDocs && $saveEditSoftware && $saveEditSpec && $saveEditDev && $saveEditAppli){
		$return['valid'] = true;
		$return['msg'] = "Final movement done successfully";
	}
	echo json_encode($return);
}

$request->Disconnect();
$software->Disconnect();
$documents->Disconnect();
$specification->Disconnect();
$handover->Disconnect();
$movement->Disconnect();
$applicant_staff->Disconnect();
$handover_storage->Disconnect();
$movement_storage->Disconnect();
