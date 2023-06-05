<?php
require_once('../database/Database.php');
require_once('../interface/iAssetsRegister.php');
class AssetsRegister extends Database implements iAssetsRegister{
	public function all_assets_brands(){
		$sql = "SELECT * FROM COMPUTERSTYPE ORDER BY computerType ASC";
		return $this->getRows($sql);
	}

	public function all_assets_status(){
		$sql = "SELECT * FROM DEVICESTATUS";
		return $this->getRows($sql);
	}

	public function all_device_storage(){
		$sql = "SELECT * FROM STORAGETB ORDER BY storageType ASC";
		return $this->getRows($sql);
	}

	public function all_device_capacity(){
		$sql = "SELECT * FROM DEVICECAP ORDER BY deviceCap ASC";
		return $this->getRows($sql);
	}

	public function all_device_cdrom(){
		$sql = "SELECT * FROM HIGHLOW ORDER BY onOff ASC";
		return $this->getRows($sql);
	}

	public function all_assets_os(){
		$sql = "SELECT * FROM DEVICEOS";
		return $this->getRows($sql);
	}

	public function all_assets_pdfreader(){
		$sql = "SELECT * FROM PDFTB ORDER BY pdfReader";
		return $this->getRows($sql);
	}
}

$assets_brands = new AssetsRegister();

?>