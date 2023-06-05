<?php 

interface iTonerRequest{
	public function all_toner_request_status();
	public function all_staffs_toner_requests();
	public function get_final_staff_toner($staff_toner_id);
	public function all_toner_staff_finalize_req();
	public function all_toner_staff_confirmation();	
	public function all_staffs_toner_allocation();
	public function all_staffs_toner_allocated();
	public function get_toner_staff_confirmation($staff_toner_id);
	public function get_toner_staff_req($toner_appli_id);
	public function delete_toner_staff_application($toner_id, $toner_pfno);
	public function saving_finalize_toner($toner_alloc_yes, $toner_allocated_on, $toner_alloc_model, $toner_fpno, $toner_id);
	public function saving_approve_toner_requ($appli_toner_approved_on, $appli_toner_approved_by, $appli_toner_text, $appli_toner_pfno, $appli_toner_id);
	public function saving_reject_toner_requ($appli_toner_rejected_on, $appli_toner_rejected_by, $appli_toner_rtext, $appli_toner_rjustif, $appli_toner_rpfno, $appli_toner_rid);
	public function confirm_toner_allocation($toner_staff_alloc_text, $toner_staff_alloc_text_date, $toner_staff_alloc_model, $toner_staff_alloc_pfnamba, $toner_staff_alloc_id);
}