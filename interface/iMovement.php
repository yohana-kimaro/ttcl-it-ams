<?php 
interface iMovement{
	public function add_scanner_movem($scannerSerialNo);
	public function add_printer_movem($printerSerialNo);
	public function add_desktop_movem($desktopSerialNo);
	public function add_laptop_movem($laptopSerialNo);
	public function delete_it_asset_movem($itAssetDeleteSerialNo);
	public function allocate_it_asset_movement($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	public function update_staffs_handover_to_movement($handOverPFNO, $handoverFrom, $handoverAppliID, $movedFromDate,$movedTODate, $movedTOName, $movedTODesignation, $acceptMoveReqDate, $movementReq, $itSupSuppMove, $itSupEng, $RPandAM, $rpandAmDate, $utSuppEnginDate, $itSuppSupp, $movedTolName,$movedTomName, $movedFromMName,$movedFromLName, $movedFromDep, $movedFromDutyS, $movedToDutyS, $movedToSerialNo, $movedToDep, $moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm, $handoverTo, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
	public function all_staff_movement_form();
	public function get_movement_details($movement_id);
	public function add_staff_movement_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone,$staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo);
	public function all_movement_status();
	public function all_devices_movement_staffs_requests();
	public function approve_staff_movement_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved, $ifMovementFormAccepted, $movement_serialno, $movement_id);
	public function all_staff_movement_finalize();
	public function add_computer_movem($computerSerialNo);
	public function get_staff_movement_finalize($movement_id);
	public function update_computer_movem($compupdseralno, $updatedcompsernowhere);
	public function update_movement_to_movementtb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id);
}
?>