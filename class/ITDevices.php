<?php
require_once('../database/Database.php');
require_once('../interface/iITDevices.php');
class ITDevices extends Database implements iITDevices{
	public function all_it_devices(){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No'";
		return $this->getRows($sql);
	}

	public function all_it_laptops(){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No' and dev.itAssetType='Laptop'";
		return $this->getRows($sql);
	}

	public function all_it_desktops(){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No'  and dev.itAssetType='Desktop'";
		return $this->getRows($sql);
	}	

	public function all_it_printers(){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No'  and dev.itAssetType='Printer'";
		return $this->getRows($sql);
	}	

	public function all_it_scanners(){
		$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No'  and dev.itAssetType='Scanner'";
		return $this->getRows($sql);
	}

}

$it_devices = new ITDevices();

?>