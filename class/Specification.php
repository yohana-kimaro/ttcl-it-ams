<?php
require_once('../database/Database.php');
require_once('../interface/iSpecification.php');
class Specification extends Database implements iSpecification {
	public function add_scanner_spec($scannerSerialNo, $scannerMAC){
		$sql = "INSERT INTO SPECIFICATIONSTB(serialNo, macAddress) VALUES(?, ?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo, $scannerMAC]);
	} 

	public function add_printer_spec($printerSerialNo, $printerMAC){
		$sql = "INSERT INTO SPECIFICATIONSTB(serialNo, macAddress) VALUES(?, ?)";		
	 	return $this->insertRow($sql, [$printerSerialNo, $printerMAC]);
	}

	public function add_desktop_spec($desktopSerialNo, $desktopRAM, $desktopCapacity, $desktopStorage, $desktopCDRom, $desktopProcessor, $desktopMACAddress){
		$sql = "INSERT INTO SPECIFICATIONSTB(serialNo, RAM, capacity, storage, cdRomDrive, processorSpeed, macAddress) VALUES(?, ?, ?, ?, ?, ?, ?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo, $desktopRAM, $desktopCapacity, $desktopStorage, $desktopCDRom, $desktopProcessor, $desktopMACAddress]);
	}

	public function add_laptop_spec($laptopSerialNo, $laptopRAM, $laptopCapacity, $laptopStorage, $laptopCDRom, $laptopProcessor, $laptopMACAddress){
		$sql = "INSERT INTO SPECIFICATIONSTB(serialNo, RAM, capacity, storage, cdRomDrive, processorSpeed, macAddress) VALUES(?, ?, ?, ?, ?, ?, ?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo, $laptopRAM, $laptopCapacity, $laptopStorage, $laptopCDRom, $laptopProcessor, $laptopMACAddress]);
	}

	public function add_computer_spec($computerSerialNo, $computerRAM, $computerCapacity, $computerStorage, $computerCDRom, $computerProcessor, $computerMACAddress){
		$sql = "INSERT INTO SPECIFICATIONSTB(serialNo, RAM, capacity, storage, cdRomDrive, processorSpeed, macAddress) VALUES(?, ?, ?, ?, ?, ?, ?)";		
	 	return $this->insertRow($sql, [$computerSerialNo, $computerRAM, $computerCapacity, $computerStorage, $computerCDRom, $computerProcessor, $computerMACAddress]);
	}


	public function update_computer_spec($compupdseralno, $compupdassetram, $compupdassetcapacity, $compupdassetstorage, $compupdassetrom, $compupdassetprocessor, $compupdassetmac, $updatedcompsernowhere){
		$sql = "UPDATE SPECIFICATIONSTB SET serialNo=?, RAM=?, capacity=?, storage=?, cdRomDrive=?, processorSpeed=?, macAddress=?	WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $compupdassetram, $compupdassetcapacity, $compupdassetstorage, $compupdassetrom, $compupdassetprocessor, $compupdassetmac, $updatedcompsernowhere]);
	}

	public function delete_it_asset_spec($itAssetDeleteSerialNo){
		$sql = "DELETE from  SPECIFICATIONSTB  where serialNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset__spec($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no){
		$sql = "UPDATE SPECIFICATIONSTB SET applicantID=?, pfnumber=? WHERE serialNo=?";		
	 	return $this->updateRow($sql, [$allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no]);
	}

	public function update_handover_to_spec($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba){
		$sql = "UPDATE SPECIFICATIONSTB SET pfnumber =?, applicantID=? WHERE pfnumber=? AND serialNo=?";
		return $this->updateRow($sql, [$handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba]);
	}

	public function update_movement_to_specification($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE SPECIFICATIONSTB SET pfnumber =? WHERE pfnumber=? AND serialNo=? AND applicantID=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_frompfnamba, $movem_serialno,$movem_id]);
	}
}

$specification = new Specification();

?>


