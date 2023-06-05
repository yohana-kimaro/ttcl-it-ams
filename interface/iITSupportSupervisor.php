<?php 
interface iITSupportSupervisor{
	public function all_it_support_supervisor_requests();
	public function all__iss_allocation_requests();
	public function get_applicant_to_verify($applicant_id);
	public function get_applicant_to_allocate($applicant_id);
	public function get_applicant_rejected($applicant_id);
	public function saving_verified_request($application_id, $staffVerifyPfNo, $staffVerifyJustif, $issVerifyName, $issVerifyText, $issVerifiedOn);
	public function saving_rejected_request($application_id, $staffRejectPfNo, $issRejectName, $issRejectText, $staffRejectionJustif, $issRejectdOn);
}
?>