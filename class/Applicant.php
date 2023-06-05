<?php
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('../database/Database.php');
require_once('../interface/iApplicant.php');

class Applicant extends Database implements iApplicant {
	public function allocate_it_asset_applicant($allocated, $allocated_asset_allocated_by, $allocated_asset_allocated_on, $itsupportallocationjustif, $allocated_applicant_id){		
		$sql = "UPDATE APPLICANTTB SET allocated=?, allocatedBy=?, allocatedDate=?, itSupportAllocationJustif=? WHERE applicantID=?";
		return $this->updateRow($sql, [$allocated, $allocated_asset_allocated_by, $allocated_asset_allocated_on, $itsupportallocationjustif, $allocated_applicant_id]);
	}

	public function update_staff_handover_to_applicant($handover_id, $handoverreqstaffpfnamba){
		$sql = "DELETE FROM APPLICANTTB WHERE applicantID=? AND pfNo=?";
		return $this->deleteRow($sql, [$handover_id, $handoverreqstaffpfnamba]);
	}

	public function update_movement_to_applicant($movem_topfnamba, $moveto_fname, $moveto_mname, $moveto_lname, $moveto_designation, $moveto_department, $movem_date, $moveto_offbuild, $moveto_region, $moveto_dmanager, $movem_id, $movem_frompfnamba){
		$sql = "UPDATE APPLICANTTB SET pfNo=?, firstName=?, secondName=?,surName=?,designation=?,department=?,appliedDate=?, offBuild=?,region=?, myDirectManager=? WHERE applicantID=? and pfNo=?";
		return $this->updateRow($sql, [$movem_topfnamba, $moveto_fname, $moveto_mname, $moveto_lname, $moveto_designation, $moveto_department, $movem_date, $moveto_offbuild, $moveto_region, $moveto_dmanager, $movem_id, $movem_frompfnamba]);
	} 

}

$applicant_staff = new Applicant(); 

?>


