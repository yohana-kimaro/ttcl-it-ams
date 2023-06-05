<?php
require_once('../database/Database.php');
require_once('../interface/iMovement.php');
class Movement extends Database implements iMovement {
	public function add_scanner_movem($scannerSerialNo){
		$sql = "INSERT INTO MOVEMENTTB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	}

	public function add_printer_movem($printerSerialNo){
		$sql = "INSERT INTO MOVEMENTTB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]);
	}

	public function add_desktop_movem($desktopSerialNo){
		$sql = "INSERT INTO MOVEMENTTB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo]);
	}

	public function add_laptop_movem($laptopSerialNo){
		$sql = "INSERT INTO MOVEMENTTB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo]);
	}

	public function add_computer_movem($computerSerialNo){
		$sql = "INSERT INTO MOVEMENTTB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$computerSerialNo]);
	}

	public function update_computer_movem($compupdseralno, $updatedcompsernowhere){
		$sql = "UPDATE MOVEMENTTB SET devFromSeralNo = ? WHERE devFromSeralNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $updatedcompsernowhere]);
	}

	public function delete_it_asset_movem($itAssetDeleteSerialNo){
		$sql = "DELETE from  MOVEMENTTB  where devFromSeralNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_movement($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no){
		$sql = "UPDATE MOVEMENTTB SET PFNumber=?, movedFromApplicantID=? WHERE devFromSeralNo=?";		
	 	return $this->updateRow($sql, [$allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no]);
	}

	public function update_staffs_handover_to_movement($handOverPFNO, $handoverFrom, $handoverAppliID, $movedFromDate,$movedTODate, $movedTOName, $movedTODesignation, $acceptMoveReqDate, $movementReq, $itSupSuppMove, $itSupEng, $RPandAM, $rpandAmDate, $utSuppEnginDate, $itSuppSupp, $movedTolName,$movedTomName, $movedFromMName,$movedFromLName, $movedFromDep, $movedFromDutyS, $movedToDutyS, $movedToSerialNo, $movedToDep, $moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm, $handoverTo, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba){ 
		$sql = "UPDATE MOVEMENTTB SET PFNumber=?,movedFromName=?,movedFromApplicantID=?,movedFromDate=?,movedTODate=?,movedTOName=?,movedTODesignation=?,acceptMoveReqDate=?, movementReq=?,itSupSuppMove=?, itSupEng=?,RPandAM=?, rpandAmDate=?, utSuppEnginDate=?, itSuppSupp=?,movedTolName=?,movedTomName=?, movedFromMName=?,movedFromLName=?, movedFromDep=?, movedFromDutyS=?, movedToDutyS=?,movedToSerialNo=?, movedToDep=?,moveTopfNo=?,movedFromDevType=?,itSuppSA=?,itSuppEA=?,rpamA=?,ifMovemDone=?,movemRejectComm=?, movementAttachment=? WHERE PFNumber=? AND devFromSeralNo=?";
		return $this->updateRow($sql, [$handOverPFNO, $handoverFrom, $handoverAppliID, $movedFromDate,$movedTODate, $movedTOName, $movedTODesignation, $acceptMoveReqDate, $movementReq, $itSupSuppMove, $itSupEng, $RPandAM, $rpandAmDate, $utSuppEnginDate, $itSuppSupp, $movedTolName,$movedTomName, $movedFromMName,$movedFromLName, $movedFromDep, $movedFromDutyS, $movedToDutyS, $movedToSerialNo, $movedToDep, $moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm, $handoverTo, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba]);
	}

	public function all_staff_movement_form(){
		$sql = "SELECT * FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID INNER JOIN MOVEMENTTB M ON S.applicantID=M.movedFromApplicantID INNER JOIN HANDOVERTB AS H ON M.movedFromApplicantID=H.handOverApplicantID WHERE A.pfNo = '".$_SESSION['userpf@ttclassetsystem']."' and A.allocated ='Yes' and A.confirm='Yes' and M.movementReq='No' and H.handOverConfirmation='No' and H.ifHandOver='No' order by A.appliedDate";
		return $this->getRows($sql);
	}

	public function get_movement_details($movement_id){
		$sql = "SELECT * FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID INNER JOIN MOVEMENTTB M ON S.applicantID=M.movedFromApplicantID INNER JOIN HANDOVERTB AS H ON M.movedFromApplicantID=H.handOverApplicantID WHERE A.allocated ='Yes' and A.confirm='Yes' and M.movementReq='No' and H.handOverConfirmation='No' and H.ifHandOver='No' AND A.applicantID = ?  order by A.appliedDate";
		return $this->getRow($sql, [$movement_id]);
	}

	public function add_staff_movement_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone,$staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo){ 
		$sql = "UPDATE MOVEMENTTB SET movedFromDevType=?, movedFromDate=?, movedFromName=?,movedFromMName=?,movedFromLName=?,movedFromDep=?, movedFromDutyS=?, movedTOName=?,movedTomName=?,movedTolName=?,movedToDep=?, movedTODesignation=?,movedToDutyS=?,movementAttachment=?,moveTopfNo=? ,movementReq=?,itSuppSA=?,rpamA=?,itSuppEA=?, movemRejectComm=?, ifMovementRejected=?, ifMovemDone=?, movedToRegion=?, movedToDirectManager=? WHERE movedFromApplicantID=? AND devFromSeralNo=?";
		return $this->updateRow($sql, [$staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone,$staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo]);
	}

	public function all_movement_status(){
		$sql = "SELECT * FROM MOVEMENTTB AS m WHERE PFNumber = '".$_SESSION['userpf@ttclassetsystem']."' AND itSuppSA is not null AND itSuppEA is not null AND rpamA is not null  ORDER BY m.movedFromDate";
		return $this->getRows($sql);
	}

	public function all_devices_movement_staffs_requests(){
		$sql = "SELECT * FROM MOVEMENTTB as m WHERE itSuppEA='Not approved by IT Support Engineer' and rpamA='Not approved by RP&AM' and itSuppSA='Not approved by Supervisor IT Support' and ifMovemDone = 'No' ORDER BY m.movedFromDate";
		return $this->getRows($sql);
	}

	public function get_staff_movement_to_it_support($movement_id){
		$sql = "SELECT * FROM MOVEMENTTB as m WHERE itSuppEA='Not approved by IT Support Engineer' and rpamA='Not approved by RP&AM' and itSuppSA='Not approved by Supervisor IT Support' and ifMovemDone = 'No' AND movedFromApplicantID = ? ORDER BY m.movedFromDate ";
		return $this->getRow($sql, [$movement_id]);
	}

	public function approve_staff_movement_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved, $ifMovementFormAccepted, $movement_serialno, $movement_id){
		$sql = "UPDATE MOVEMENTTB SET itSuppSA=?,itSuppEA=?, rpamA=?,itSupSuppMove=?,      itSuppSupp=?,ifMovemDone=?, ifMovementApproved=?, movementFormAccepted=? WHERE devFromSeralNo=? AND  movedFromApplicantID=?";
		return $this->updateRow($sql, [$movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved, $ifMovementFormAccepted, $movement_serialno, $movement_id]);
	}

	public function all_staff_movement_finalize(){
		$sql = "SELECT * FROM MOVEMENTTB as m WHERE itSuppEA='Approved by IT Support Engineer' and rpamA='Approved by RP&AM' and itSuppSA='Approved by Supervisor IT Support' and ifMovemDone = 'Yes' AND ifMovementApproved='Yes' AND movementFormAccepted='Yes' AND movementConfirm='No' AND m.ifMovementRejected='No' ORDER BY m.movedFromDate";
		return $this->getRows($sql);
	}

	public function get_staff_movement_finalize($movement_id){
		$sql = "SELECT * FROM MOVEMENTTB as m WHERE itSuppEA='Approved by IT Support Engineer' and rpamA='Approved by RP&AM' and itSuppSA='Approved by Supervisor IT Support' and ifMovemDone = 'Yes' AND ifMovementApproved='Yes' AND movementFormAccepted='Yes' AND movementConfirm='No' AND m.ifMovementRejected='No' AND movedFromApplicantID=? ORDER BY m.movedFromDate ";
		return $this->getRow($sql,  [$movement_id]);
	}

	public function update_movement_to_movementtb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE MOVEMENTTB SET PFNumber=?, movedFromName=?,movedFromDate=?,movedTOName=?,movedTODesignation=?,movementReq=?,itSupSuppMove=?,itSuppSupp=?,movedTolName=?,movedTomName=?,movedFromMName=?,movedFromLName=?,movedFromDep=?,movedFromDutyS=?,movedToDutyS=?,movedToSerialNo=?,movedToDep=?,movementAttachment=?,moveTopfNo=?,movedFromDevType=?,itSuppSA=?,itSuppEA=?,rpamA=?,ifMovemDone=?,movemRejectComm=?,ifMovementApproved=?,ifMovementRejected=?,movementConfirm=?,movementCompleted=?,movementFormAccepted=? WHERE PFNumber=? AND devFromSeralNo=? AND movedFromApplicantID=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}

}

$movement = new Movement();

?>


