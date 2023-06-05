<?php 
interface iHandover{
	public function all_handover_status();
	public function add_scanner_handO($scannerSerialNo);
	public function add_printer_handO($printerSerialNo);
	public function add_desktop_handO($desktopSerialNo);
	public function add_laptop_handO($laptopSerialNo);
	public function all_handover_form();
	public function add_computer_handO($computerSerialNo);
	public function all_handover_staffs_requests();
	public function update_computer_handO($compupdseralno, $updatedcompsernowhere);
	public function get_staff_handover_request_approve($handover_id);
	public function get_handover_device_details($handover_id);
	public function delete_it_asset_handO($itAssetDeleteSerialNo);
	public function allocate_it_asset_handover($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no);
	public function add_handover_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID);
	public function approve_staffs_handover_request($handoverreqstaffifhandover, $handoverdatereq, $handoverreqstaffconfirm, $handoverreqstaffAttach, $handoverFrom, $handoverTo, $receivingOff,$handoverAppliID, $handOverPFNO, $handoverComm, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba);
	public function reject_staff_requests_to_handover($handoverstaffrejrejectedjustif,$handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation, $handover_id, $handoverstaffreqrejserialno);
	public function update_movement_to_handover($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);
}
?>