<?php 
interface iHandoverStorage{
	public function add_scanner_handOverSto($scannerSerialNo);
	public function add_printer_handOverSto($printerSerialNo);
	public function add_desktop_handOverSto($desktopSerialNo);
	public function add_laptop_handOverSto($laptopSerialNo);
	public function add_computer_handOverSto($computerSerialNo);
	public function delete_it_asset_handOverSto($itAssetDeleteSerialNo);
	public function update_computer_handOverSto($compupdseralno, $updatedcompsernowhere);
	public function allocate_it_asset_hand_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	public function add_handover_storage_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID);
	public function update_staffs_handover_to_handover_storage($HSifHandOver, $handOverConfirmation, $handoverreqstaffreceivedby, $handoverreqstaffjustif, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba);
	public function reject_staff_requests_to_handover_storage($handoverstaffrejrejectedjustif, $handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation,$handover_id, $handoverstaffreqrejserialno);
	public function update_movement_to_handover_storage($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);
}
?>