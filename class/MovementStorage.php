<?php
require_once('../database/Database.php');
require_once('../interface/iMovementStorage.php');
class MovementStorage extends Database implements iMovementStorage {
	public function add_scanner_movemSto($scannerSerialNo){
		$sql = "INSERT INTO MOVEMENTSTORAGETB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	}

	public function add_printer_movemSto($printerSerialNo){
		$sql = "INSERT INTO MOVEMENTSTORAGETB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]);
	}

	public function add_desktop_movemSto($desktopSerialNo){
		$sql = "INSERT INTO MOVEMENTSTORAGETB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo]);
	}

	public function add_laptop_movemSto($laptopSerialNo){
		$sql = "INSERT INTO MOVEMENTSTORAGETB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo]);
	}

	public function add_computer_movemSto($computerSerialNo){
		$sql = "INSERT INTO MOVEMENTSTORAGETB(devFromSeralNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$computerSerialNo]);
	}	

	public function update_computer_movemSto($compupdseralno, $updatedcompsernowhere){
		$sql = "UPDATE MOVEMENTSTORAGETB SET devFromSeralNo = ?	WHERE devFromSeralNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $updatedcompsernowhere]);
	}

	public function delete_it_asset_movemSto($itAssetDeleteSerialNo){
		$sql = "DELETE from  MOVEMENTSTORAGETB  WHERE devFromSeralNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_move_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no){
		$sql = "UPDATE MOVEMENTSTORAGETB SET PFNumber=?, movedFromApplicantID=? WHERE devFromSeralNo=?";	
	 	return $this->updateRow($sql, [$allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no]);
	}

	public function add_staff_movement_storage_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone, $staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo){
		$sql = "UPDATE MOVEMENTSTORAGETB SET movedFromDevType=?,movedFromDate=?, movedFromName=?,movedFromMName=?,movedFromLName=?,movedFromDep=?,movedFromDutyS=?, movedTOName=?,movedTomName=?,movedTolName=?,movedToDep=?,movedTODesignation=?,movedToDutyS=?,movementAttachment=?,moveTopfNo=? ,movementReq=?,itSuppSA=?,rpamA=?,itSuppEA=?,movemRejectComm=?, ifMovementRejected=?,ifMovemDone=?, movedToRegion=?,movedToDirectManager=?  WHERE movedFromApplicantID=? AND devFromSeralNo=?";
		return $this->updateRow($sql, [$staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone, $staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo]);
	}

	public function all_staff_movement_confirm(){
		$sql = "SELECT * FROM MOVEMENTSTORAGETB as m WHERE itSuppEA='Approved by IT Support Engineer' and rpamA='Approved by RP&AM' and itSuppSA='Approved by Supervisor IT Support' and ifMovemDone = 'Yes' AND ifMovementApproved='Yes' and m.ifMovementRejected='No' AND moveTopfNo='".$_SESSION['userpf@ttclassetsystem']."' AND movementFormAccepted='Yes'AND movementcONFIRMEDbY is null ORDER BY m.movedFromDate";
		return $this->getRows($sql);
	}

	public function approve_staff_movement_storage_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved ,$ifMovementFormAccepted, $movement_serialno, $movement_id){
		$sql = "UPDATE MOVEMENTSTORAGETB SET itSuppSA=?,itSuppEA=?, rpamA=?,itSupSuppMove=?,      itSuppSupp=?,ifMovemDone=?, ifMovementApproved=?, movementFormAccepted=? WHERE devFromSeralNo=? AND  movedFromApplicantID=?";
		return $this->updateRow($sql, [$movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved ,$ifMovementFormAccepted, $movement_serialno, $movement_id]);
	}

	public function get_movement_request_to_confirm($movement_id){
		$sql = "SELECT * FROM MOVEMENTSTORAGETB as m WHERE itSuppEA='Approved by IT Support Engineer' and rpamA='Approved by RP&AM' and itSuppSA='Approved by Supervisor IT Support' and ifMovemDone = 'Yes' and m.ifMovementRejected='No' AND moveTopfNo='".$_SESSION['userpf@ttclassetsystem']."' AND movementFormAccepted='Yes' AND movementcONFIRMEDbY is null AND movedFromApplicantID = ? ORDER BY m.movedFromDate";
		return $this->getRow($sql, [$movement_id]);
	}

	public function confirm_staff_movement($movementCompleted, $mov_cofirmed_on, $mov_cofirmed_by, $movement_pfnamba, $movement_id){
		$sql = "UPDATE MOVEMENTSTORAGETB SET movementCompleted=?, movementConfirmedOn=?,movementcONFIRMEDbY=? WHERE PFNumber=? and  movedFromApplicantID=?";
		return $this->updateRow($sql, [$movementCompleted, $mov_cofirmed_on, $mov_cofirmed_by, $movement_pfnamba, $movement_id]);
	}

	public function update_movement_to_movementstoragetb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE MOVEMENTSTORAGETB SET PFNumber=?, movedFromName=?,movedFromDate=?,movedTOName=?,movedTODesignation=?,movementReq=?,itSupSuppMove=?,itSuppSupp=?,movedTolName=?,movedTomName=?,movedFromMName=?,movedFromLName=?,movedFromDep=?,movedFromDutyS=?,movedToDutyS=?,movedToSerialNo=?,movedToDep=?,movementAttachment=?,moveTopfNo=?,movedFromDevType=?,itSuppSA=?,itSuppEA=?,rpamA=?,ifMovemDone=?,movemRejectComm=?,ifMovementApproved=?,ifMovementRejected=?,movementConfirm=?,movementCompleted=?,movementFormAccepted=? WHERE PFNumber=? AND  devFromSeralNo=? AND movedFromApplicantID=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}
}

$movement_storage = new MovementStorage();

?>


