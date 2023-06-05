<?php
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('../database/Database.php');
require_once('../interface/iAssets.php');
class Assets extends Database implements iAssets {

	public function add_scanner($scannerSerialNo, $scannerBrand, $scannerModel, $scannerStatus, $scannerPYear, $scannerAssetType, $date_time, $asset_added_by, $allocated){		
		$sql = "INSERT INTO DEVICETB(serialNo, brand, model, status, purchasedYear, itAssetType, recordedby, recordedDate, allocated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$scannerSerialNo, $scannerBrand, $scannerModel, $scannerStatus, $scannerPYear, $scannerAssetType, $asset_added_by, $date_time, $allocated]);
	}

	public function add_printer($printerSerialNo, $printerBrand, $printerModel, $printerStatus, $printerPYear, $printerAssetType, $date_time, $asset_added_by, $allocated){		
		$sql = "INSERT INTO DEVICETB(serialNo, brand, model, status, purchasedYear, itAssetType, recordedby, recordedDate, allocated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$printerSerialNo, $printerBrand, $printerModel, $printerStatus, $printerPYear, $printerAssetType, $asset_added_by, $date_time, $allocated]);
	}

	public function add_desktop($desktopSerialNo, $desktopBrand, $desktopModel, $desktopStatus, $desktopPurchasedYear, $desktopAssetType, $date_time, $asset_added_by, $allocated){		
		$sql = "INSERT INTO DEVICETB(serialNo, brand, model, status, purchasedYear, itAssetType, recordedby, recordedDate, allocated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$desktopSerialNo, $desktopBrand, $desktopModel, $desktopStatus, $desktopPurchasedYear, $desktopAssetType, $asset_added_by, $date_time, $allocated]);
	}

	public function add_laptop($laptopSerialNo, $laptopBrand, $laptopModel, $laptopStatus, $laptopPurchasedYear, $laptopAssetType, $date_time, $asset_added_by, $allocated){ 		
		$sql = "INSERT INTO DEVICETB(serialNo, brand, model, status, purchasedYear, itAssetType, recordedby, recordedDate, allocated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$laptopSerialNo, $laptopBrand, $laptopModel, $laptopStatus, $laptopPurchasedYear, $laptopAssetType, $asset_added_by, $date_time, $allocated]);
	}

	public function add_computer($computerSerialNo, $computerBrand, $computerModel, $computerStatus, $computerPurchasedYear, $computerAssetType, $date_time, $asset_added_by, $allocated){		
		$sql = "INSERT INTO DEVICETB(serialNo, brand, model, status, purchasedYear, itAssetType, recordedby, recordedDate, allocated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$computerSerialNo, $computerBrand, $computerModel, $computerStatus, $computerPurchasedYear, $computerAssetType, $asset_added_by, $date_time, $allocated]);
	}

	public function update_computer($compupdseralno, $compupdassetbrand, $compupdassetmodel, $compupdassetstatus, $compupdassetyear, $compupdcomptype, $date_time, $asset_added_by, $allocated, $updatedcompsernowhere){
		$sql = "UPDATE DEVICETB SET serialNo=?, brand=?, model=?, status=?, purchasedYear=?, itAssetType=?, recordedby=?, recordedDate=?, allocated=? WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $compupdassetbrand, $compupdassetmodel, $compupdassetstatus, $compupdassetyear, $compupdcomptype, $date_time, $asset_added_by, $allocated, $updatedcompsernowhere]);
	}

	public function get_more_asset_details($assetserialnumber){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership, dev.recordedby, dev.recordedDate, dev.updatedby, dev.updatedOn FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No' AND  dev.serialNo = ?";
		return $this->getRow($sql, [$assetserialnumber]);
	}

	public function get_computer_details($computerserialnumber){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership, dev.recordedby, dev.recordedDate, dev.updatedby, dev.updatedOn FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No' AND  dev.serialNo = ?";
		return $this->getRow($sql, [$computerserialnumber]);
	}

	public function delete_it_asset_req($itAssetDeleteSerialNo){		
		$sql = "DELETE from  DEVICETB  where serialNo = ?";
		return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_device_tb($allocated_applicant_pfnamba, $allocated_asset_cname ,$allocated, $allocated_asset_others, $allocated_applicant_id, $allocated_asset_allocated_on, $allocated_asset_serial_no){		
		$sql = "UPDATE DEVICETB SET pfnumber=?, deviceName=?, allocated=?, other=?, applicantID=?, dateIssued=? WHERE serialNo=?";
		return $this->updateRow($sql, [$allocated_applicant_pfnamba, $allocated_asset_cname,$allocated, $allocated_asset_others, $allocated_applicant_id, $allocated_asset_allocated_on, $allocated_asset_serial_no]);
	}

	public function update_staffs_handover_to_devicetb($allocated, $handoverreqstaffcurrentdevstatus, $applicantID, $handOverPFNO, $movedFromDate,  $handover_id, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba){
		$sql = "UPDATE DEVICETB SET allocated=?, status=?, applicantID=?,pfnumber=?,dateIssued=? WHERE applicantID=? and pfnumber=? AND serialNo=?";
		return $this->updateRow($sql, [$allocated, $handoverreqstaffcurrentdevstatus, $applicantID, $handOverPFNO, $movedFromDate,  $handover_id, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba]);
	}

	public function update_movement_to_devicetb($movem_topfnamba, $movem_devstatus, $movem_date, $movem_id, $movem_frompfnamba, $movem_serialno){
		$sql = "UPDATE DEVICETB SET pfnumber=?, status=?,dateIssued=? WHERE applicantID=? AND pfnumber=? AND serialNo=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_devstatus, $movem_date, $movem_id, $movem_frompfnamba, $movem_serialno]);
	}

}

$request = new Assets(); 

?>


