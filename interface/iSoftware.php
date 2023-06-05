<?php 
interface iSoftware{
	public function add_scanner_soft($scannerSerialNo);
	public function add_printer_soft($printerSerialNo);
	public function add_desktop_soft($desktopSerialNo, $desktopOperatingSystem, $desktopOfficeAppli, $desktopPDFReader, $desktopAntivirus);
	public function add_laptop_soft($laptopSerialNo, $laptopOperatingSystem, $laptopOfficeAppli, $laptopPDFReader, $laptopAntivirus);
	public function delete_it_asset_soft($itAssetDeleteSerialNo);
	public function allocate_it_asset_software($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	public function update_staffs_handover_to_software($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
	public function update_movement_to_software($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);
	public function add_computer_soft($computerSerialNo, $computerOperatingSystem, $computerOfficeAppli, $computerPDFReader, $computerAntivirus);
	public function update_computer_soft($compupdseralno, $compupdassetos, $compupdassetofficeappli, $compupdassetpdf, $compupdassetanti, $updatedcompsernowhere);
} 
?>