<?php 
interface iAssets{
	public function add_scanner($scannerSerialNo, $scannerBrand, $scannerModel, $scannerStatus, $scannerPYear, $scannerAssetType, $date_time, $asset_added_by, $allocated);
	public function add_printer($printerSerialNo, $printerBrand, $printerModel, $printerStatus, $printerPYear, $printerAssetType, $date_time, $asset_added_by, $allocated);
	public function add_laptop($laptopSerialNo, $laptopBrand, $laptopModel, $laptopStatus, $laptopPurchasedYear, $laptopAssetType, $date_time, $asset_added_by, $allocated);
	public function delete_it_asset_req($itAssetDeleteSerialNo);
	public function get_computer_details($computerserialnumber);
	public function update_computer($compupdseralno, $compupdassetbrand, $compupdassetmodel, $compupdassetstatus, $compupdassetyear, $compupdcomptype, $date_time, $asset_added_by, $allocated, $updatedcompsernowhere);
	public function add_computer($computerSerialNo, $computerBrand, $computerModel, $computerStatus, $computerPurchasedYear, $computerAssetType, $date_time, $asset_added_by, $allocated);
	public function allocate_it_asset_device_tb($allocated_applicant_pfnamba, $allocated_asset_cname ,$allocated, $allocated_asset_others, $allocated_applicant_id, $allocated_asset_allocated_on, $allocated_asset_serial_no);
	public function update_staffs_handover_to_devicetb($allocated, $handoverreqstaffcurrentdevstatus, $applicantID, $handOverPFNO, $movedFromDate,  $handover_id, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
	public function update_movement_to_devicetb($movem_topfnamba, $movem_devstatus, $movem_date, $movem_id, $movem_frompfnamba, $movem_serialno);
}

?>