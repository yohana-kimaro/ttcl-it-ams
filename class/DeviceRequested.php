<?php
require_once('../database/Database.php');
require_once('../interface/iDeviceRequested.php');
class DeviceRequested extends Database implements iDeviceRequested{
	public function all_devices_requested(){
		$sql = "SELECT * FROM DEVICETYPETB ORDER BY deviceType ASC";
		return $this->getRows($sql);
	}
}

$devices_requested = new DeviceRequested();

?>