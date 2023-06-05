<?php
require_once('../database/Database.php');
require_once('../interface/iToner.php');
class Toner extends Database implements iToner {
	public function all_toner_lists(){
		$sql = "SELECT * FROM tonerCartridgeTB ORDER BY tonerModel ASC";
		return $this->getRows($sql);
	}
	
	public function get_toner_details($toner_id){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerID=?";
		return $this->getRow($sql, [$toner_id]);
	}

	public function get_toner_details_delete($toner_id){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerID=?";
		return $this->getRow($sql, [$toner_id]);
	}

	public function add_toner_details($tonnerbrand, $tonermodel, $tonerstatus, $initialtonerqty, $toneraddedby, $toneraddedon){
		$sql = "INSERT INTO tonerCartridgeTB (tonerBrand,tonerModel,tonerStatus, tonerStockQuantity,addedBy,addedOn)VALUES(?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$tonnerbrand, $tonermodel, $tonerstatus, $initialtonerqty, $toneraddedby, $toneraddedon]);
	}

	public function update_toner_details($uptonerbrand, $uptonermodel, $uptonerstatus, $updatedtonerby, $updatedtoneron, $toner_id){
		$sql = "UPDATE tonerCartridgeTB	SET tonerBrand = ?, tonerModel = ?, tonerStatus = ?, updatedBy = ?, updatedOn = ? WHERE tonerID = ?";
		return $this->updateRow($sql, [$uptonerbrand, $uptonermodel, $uptonerstatus, $updatedtonerby, $updatedtoneron, $toner_id]);
	}

	public function delete_toner_details($toner_id){
		$sql = "DELETE FROM tonerCartridgeTB WHERE tonerID = ?";
		return $this->deleteRow($sql, [$toner_id]);
	}

	public function all_toner_models(){
		$sql = "SELECT * FROM tonerCartridgeTB ORDER BY tonerModel ASC";
		return $this->getRows($sql);
	}

	public function add_toner_staff_request($tonerreqdate, $tonerreqqty, $tonerreqmodel, $tonerreqregion, $tonerreqoffbuild, $tonerreqdepartment,$tonerreqdesignation, $tonerreqpfno,$tonerreqlastname, $tonerreqmiddlename,$tonerreqfirstname,$tonerreqdirectmanager){
		$sql = "INSERT INTO tonerApplicantTB(requestedDate, requestedQuantity,requestedTonerModel,region,officeLocation,department,designation,pfNumber,lastName,secondName,firstName,directManager)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$tonerreqdate, $tonerreqqty, $tonerreqmodel, $tonerreqregion, $tonerreqoffbuild, $tonerreqdepartment,$tonerreqdesignation, $tonerreqpfno,$tonerreqlastname, $tonerreqmiddlename,$tonerreqfirstname,$tonerreqdirectmanager]);
	}

	public function get_toner_applicant_to_delete($toner_applicant_id){
		$sql = "SELECT * FROM tonerApplicantTB	WHERE tonerApplID = ?";
		return $this->getRow($sql, [$toner_applicant_id]);
	}
}

$toner = new Toner();

?>