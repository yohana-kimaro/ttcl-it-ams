<?php
require_once('../database/Database.php');
require_once('../interface/iRequestReason.php');
class RequestReason extends Database implements iRequestReason{
	public function all_request_reason(){
		$sql = "SELECT * FROM reasonRequestTB ORDER BY reasonName ASC";
		return $this->getRows($sql);
	}
}

$reason_request = new RequestReason();

?>