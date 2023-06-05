<?php 
interface iApplicant{
	public function allocate_it_asset_applicant($allocated, $allocated_asset_allocated_by, $allocated_asset_allocated_on, $itsupportallocationjustif, $allocated_applicant_id);
	public function update_staff_handover_to_applicant($handover_id, $handoverreqstaffpfnamba);
	public function update_movement_to_applicant($movem_topfnamba, $moveto_fname, $moveto_mname, $moveto_lname, $moveto_designation, $moveto_department, $movem_date, $moveto_offbuild, $moveto_region, $moveto_dmanager, $movem_id, $movem_frompfnamba);
}

?>