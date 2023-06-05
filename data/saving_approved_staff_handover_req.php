<?php 
require_once('../class/Assets.php');
require_once('../class/Handover.php');
require_once('../class/Movement.php');
require_once('../class/Applicant.php');
require_once('../class/Software.php');
require_once('../class/Documents.php');
require_once('../class/Specification.php');
require_once('../class/HandoverStorage.php');

if(isset($_POST['handover_id'])){
	$handover_id = $_POST['handover_id'];
	$handoverreqstaffjustif = $_POST['handoverreqstaffjustif'];
	$handoverreqstaffpfnamba = $_POST['handoverreqstaffpfnamba'];
	$handoverreqstaffcurrentdevstatus = $_POST['handoverreqstaffcurrentdevstatus'];
	$handoverreqstaffreceivedby = $_POST['handoverreqstaffreceivedby'];
	$handoverreqstaffreceivedon = $_POST['handoverreqstaffreceivedon'];
	$handoverreqstaffserialnamba = $_POST['handoverreqstaffserialnamba'];
	$handoverdatereq='NULL';
	$handoverreqstaffifhandover='No';
	$handoverreqstaffconfirm='No'; 
	$handoverreqstaffAttach='NULL';
	$handoverFrom='NULL';
	$handoverTo='NULL';
	$receivingOff='NULL';
	$handoverAppliID='NULL';
	$handOverPFNO='NULL';
	$handoverComm='NULL';
	$movedFromDate='NULL';
	$movedTODate='NULL';
	$movedTOName='NULL';
	$itSupEng='NULL';
	$movedTODesignation='NULL';
	$acceptMoveReqDate='NULL';
	$movementReq='No';
	$itSupSuppMove='NULL';
	$RPandAM='NULL';
	$rpamA='NULL';
	$movedToDep='NULL';
	$moveTopfNo='NULL';
	$itSuppEA='NULL';
	$movemRejectComm='NULL';
	$rpandAmDate='NULL';
	$ifMovemDone='NULL';
	$itSuppSA='NULL';
	$itSuppSupp='NULL';
	$movedFromDep='NULL';
	$movedFromDutyS='NULL';
	$movedToDutyS='NULL';
	$movedToSerialNo='NULL';
	$utSuppEnginDate='NULL';
	$movedFromDevType='NULL';
	$movedFromLName='NULL';
	$movedFromMName='NULL';
	$movedTomName='NULL';
	$movedTolName='NULL';
	$HSifHandOver='Yes';
	$allocated='No';
	$handOverConfirmation='Yes';
	$applicantID='NULL';
	$newallocated='Yes';

	$handoverreqstaffjustif=ucfirst(strtolower($handoverreqstaffjustif));
	
	$saveEdit = $handover->approve_staffs_handover_request($handoverreqstaffifhandover, $handoverdatereq, $handoverreqstaffconfirm, $handoverreqstaffAttach, $handoverFrom, $handoverTo, $receivingOff,$handoverAppliID, $handOverPFNO, $handoverComm, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba);

	$saveEditMovement = $movement->update_staffs_handover_to_movement($handOverPFNO, $handoverFrom, $handoverAppliID, $movedFromDate,$movedTODate, $movedTOName, $movedTODesignation, $acceptMoveReqDate, $movementReq, $itSupSuppMove, $itSupEng, $RPandAM, $rpandAmDate, $utSuppEnginDate, $itSuppSupp, $movedTolName,$movedTomName, $movedFromMName,$movedFromLName, $movedFromDep, $movedFromDutyS, $movedToDutyS, $movedToSerialNo, $movedToDep, $moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm, $handoverTo, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);

	$saveEditHandoverStorage = $handover_storage->update_staffs_handover_to_handover_storage($HSifHandOver, $handOverConfirmation, $handoverreqstaffreceivedby, $handoverreqstaffjustif, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba);


	$saveDelDevices = $request->update_staffs_handover_to_devicetb($allocated, $handoverreqstaffcurrentdevstatus, $applicantID, $handOverPFNO, $movedFromDate,  $handover_id, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);

	$saveEditSpec = $specification->update_handover_to_spec($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);

	$saveEditAppli = $applicant_staff->update_staff_handover_to_applicant($handover_id, $handoverreqstaffpfnamba);

	$saveEditSoft = $software->update_staffs_handover_to_software($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);

	$saveEditDocs = $documents->update_staffs_handover_to_documents($handOverPFNO, $movedToDutyS, $itSuppSupp, $itSupEng, $handoverTo, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
 
	$return['valid'] = false;
	if($saveEdit && $saveEditMovement && $saveEditHandoverStorage && $saveDelDevices && $saveEditSpec && $saveEditAppli && $saveEditSoft && $saveEditDocs){
		$return['valid'] = true;
		$return['msg'] = "Handover request from staff approved successfully";
	}
	echo json_encode($return);
}

$request->Disconnect();
$handover->Disconnect();
$movement->Disconnect();
$software->Disconnect();
$documents->Disconnect();
$handover_storage->Disconnect();
$specification->Disconnect();
$applicant_staff->Disconnect();

?>