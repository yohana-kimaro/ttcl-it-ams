<?php 
interface iMovementStorage{
	public function add_scanner_movemSto($scannerSerialNo);
	public function add_printer_movemSto($printerSerialNo);
	public function add_desktop_movemSto($desktopSerialNo);
	public function add_laptop_movemSto($laptopSerialNo);
	public function delete_it_asset_movemSto($itAssetDeleteSerialNo);
	public function allocate_it_asset_move_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	public function add_staff_movement_storage_form($staffMovementFromDeviceType, $staffMovementReceivingDate, $staffMovementFromFName, $staffMovementFromSName, $staffMovementFromLName, $staffMovementFromDepartment, $staffMovementFromDuty,  $staffMovementToFName, $staffMovementToMName, $staffMovementToLName, $staffMovementToDepartment, $staffMovementToDesignation, $staffMovementToDuty, $fileUploadedName, $staffMovementToPFNo ,$movementReq, $itSuppSA, $rpamA, $itSuppEA, $staffMovementRequestJustif, $ifMovementRejected, $ifMovemDone, $staffMovementFromRegion, $staffMovementFromDirectManager, $staffMovementID, $staffMovementFromSerialNo);
	public function all_staff_movement_confirm();
	public function add_computer_movemSto($computerSerialNo);
	public function get_movement_request_to_confirm($movement_id);
	public function update_computer_movemSto($compupdseralno, $updatedcompsernowhere);
	public function approve_staff_movement_storage_request($movement_sits, $movement_itse, $movement_rpam, $movement_approved_by, $movement_approved_on, $ifMovemDone,$isMovementApproved ,$ifMovementFormAccepted, $movement_serialno, $movement_id);
	public function confirm_staff_movement($movementCompleted, $mov_cofirmed_on, $mov_cofirmed_by, $movement_pfnamba, $movement_id);
	public function update_movement_to_movementstoragetb($movem_topfnamba, $movedFromName,$movedFromDate,$movedTOName,$movedTODesignation,$movementReq,$itSupSuppMove,$itSuppSupp,$movedTolName,$movedTomName,$movedFromMName,$movedFromLName,$movedFromDep,$movedFromDutyS,$movedToDutyS,$movedToSerialNo,$movedToDep,$movementAttachment,$moveTopfNo,$movedFromDevType,$itSuppSA,$itSuppEA,$rpamA,$ifMovemDone,$movemRejectComm,$ifMovementApproved,$ifMovementRejected,$movementConfirm,$movementCompleted,$movementFormAccepted, $movem_frompfnamba, $movem_serialno, $movem_id);
}
?>