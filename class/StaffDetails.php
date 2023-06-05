<?php
require_once('../database1/Database1.php');
require_once('../interface/iStaffDetails.php');
class StaffDetails extends Database1 implements iStaffDetails{
	public function all_staff_details(){
		$sql = "SELECT * FROM vwASSETMANAGEMENT WHERE pfNumber = '".$_SESSION['userpf@ttclassetsystem']."'";
		return $this->getRows($sql);
	}
}

$staff_details = new StaffDetails();

?>