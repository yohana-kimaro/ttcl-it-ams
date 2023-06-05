<?php 
interface iSpecification{
	public function add_scanner_spec($scannerSerialNo, $scannerMAC);
	public function add_printer_spec($printerSerialNo, $printerMAC);
	public function add_desktop_spec($desktopSerialNo, $desktopRAM, $desktopCapacity, $desktopStorage, $desktopCDRom, $desktopProcessor, $desktopMACAddress);
	public function add_laptop_spec($laptopSerialNo, $laptopRAM, $laptopCapacity, $laptopStorage, $laptopCDRom, $laptopProcessor, $laptopMACAddress);
	public function delete_it_asset_spec($itAssetDeleteSerialNo);
	public function add_computer_spec($computerSerialNo, $computerRAM, $computerCapacity, $computerStorage, $computerCDRom, $computerProcessor, $computerMACAddress);
	public function allocate_it_asset__spec($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no);
	public function update_handover_to_spec($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba);
	public function update_movement_to_specification($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id);
	public function update_computer_spec($compupdseralno, $compupdassetram, $compupdassetcapacity, $compupdassetstorage, $compupdassetrom, $compupdassetprocessor, $compupdassetmac, $updatedcompsernowhere);
}
 
?>