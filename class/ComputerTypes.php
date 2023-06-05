<?php
require_once('../database/Database.php');
require_once('../interface/iComputerTypes.php');
class ComputerTypes extends Database implements iComputerTypes{
	public function all_computer_types(){
		$sql = "SELECT * FROM computerTypes ORDER BY computerName ASC";
		return $this->getRows($sql);
	}
}

$computer_type = new ComputerTypes();

?>