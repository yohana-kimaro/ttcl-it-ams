<?php
require_once('../database/Database.php');
require_once('../interface/iSoftware.php');
class Software extends Database implements iSoftware {
	public function add_scanner_soft($scannerSerialNo){
		$sql = "INSERT INTO SOFTWARETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	}

	public function add_printer_soft($printerSerialNo){
		$sql = "INSERT INTO SOFTWARETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]); 
	}

	public function add_desktop_soft($desktopSerialNo, $desktopOperatingSystem, $desktopOfficeAppli, $desktopPDFReader, $desktopAntivirus){
		$sql = "INSERT INTO SOFTWARETB(serialNo, os,msOffice,pdfReader,antiVirus) VALUES(?, ?, ?, ?, ?)";	
	 	return $this->insertRow($sql, [$desktopSerialNo, $desktopOperatingSystem, $desktopOfficeAppli, $desktopPDFReader, $desktopAntivirus]);
	}

	public function add_laptop_soft($laptopSerialNo, $laptopOperatingSystem, $laptopOfficeAppli, $laptopPDFReader, $laptopAntivirus){
		$sql = "INSERT INTO SOFTWARETB(serialNo, os,msOffice,pdfReader,antiVirus) VALUES(?, ?, ?, ?, ?)";	
	 	return $this->insertRow($sql, [$laptopSerialNo, $laptopOperatingSystem, $laptopOfficeAppli, $laptopPDFReader, $laptopAntivirus]);
	}

	public function add_computer_soft($computerSerialNo, $computerOperatingSystem, $computerOfficeAppli, $computerPDFReader, $computerAntivirus){
		$sql = "INSERT INTO SOFTWARETB(serialNo, os,msOffice,pdfReader,antiVirus) VALUES(?, ?, ?, ?, ?)";	
	 	return $this->insertRow($sql, [$computerSerialNo, $computerOperatingSystem, $computerOfficeAppli, $computerPDFReader, $computerAntivirus]);
	}

	public function update_computer_soft($compupdseralno, $compupdassetos, $compupdassetofficeappli, $compupdassetpdf, $compupdassetanti, $updatedcompsernowhere){
		$sql = "UPDATE SOFTWARETB SET  serialNo=?,  os=?, msOffice=?, pdfReader=?, antiVirus=?	WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $compupdassetos, $compupdassetofficeappli, $compupdassetpdf, $compupdassetanti, $updatedcompsernowhere]);
	}

	public function delete_it_asset_soft($itAssetDeleteSerialNo){
		$sql = "DELETE from  SOFTWARETB  where serialNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_software($allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no){
		$sql = "UPDATE SOFTWARETB SET applicantID=?, pfnumber=? WHERE serialNo=?";		
	 	return $this->updateRow($sql, [$allocated_applicant_id, $allocated_applicant_pfnamba, $allocated_asset_serial_no]);
	}

	public function update_staffs_handover_to_software($handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba){
		$sql = "UPDATE SOFTWARETB SET pfnumber =?, applicantID=? WHERE pfnumber=? AND serialNo=?";
		return $this->updateRow($sql, [$handOverPFNO, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba]);
	}

	public function update_movement_to_software($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE SOFTWARETB SET pfnumber =? WHERE pfnumber=? AND serialNo=? AND applicantID=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}
}

$software = new Software();

?>


