<?php 
interface iToner{
	public function all_toner_lists();
	public function get_toner_details($toner_id);
	public function delete_toner_details($toner_id);
	public function get_toner_details_delete($toner_id);
	public function get_toner_applicant_to_delete($toner_applicant_id);
	public function add_toner_details($tonnerbrand, $tonermodel, $tonerstatus, $initialtonerqty, $toneraddedby, $toneraddedon);
	public function update_toner_details($uptonerbrand, $uptonermodel, $uptonerstatus, $updatedtonerby, $updatedtoneron, $toner_id);
	public function add_toner_staff_request($tonerreqdate, $tonerreqqty, $tonerreqmodel, $tonerreqregion, $tonerreqoffbuild, $tonerreqdepartment,$tonerreqdesignation, $tonerreqpfno,$tonerreqlastname, $tonerreqmiddlename,$tonerreqfirstname,$tonerreqdirectmanager);
}
?>