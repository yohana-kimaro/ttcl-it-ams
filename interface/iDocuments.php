<?php 
interface iDocuments{
	public function add_scanner_doc($scannerSerialNo);
	public function addprinter_doc($printerSerialNo);
	public function adddesktop_doc($desktopSerialNo);
	public function addlaptop_doc($laptopSerialNo);
	public function addcomputer_doc($computerSerialNo);
	public function updatecomputer_doc($compupdseralno, $updatedcompsernowhere);
	public function delete_it_asset_doc($itAssetDeleteSerialNo);
	public function allocate_it_asset_documents($allocated_asset_user_manual, $allocated_asset_accepted_policy, $allocated_asset_user_response, $allocated_applicant_id, $allocated_asset_how_to_guide, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	public function update_staffs_handover_to_documents($handOverPFNO, $movedToDutyS, $itSuppSupp, $itSupEng, $handoverTo, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
	public function update_movement_to_documents($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);
} 
?>