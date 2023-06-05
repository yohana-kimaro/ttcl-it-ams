<?php 
interface iDirectManager{
	public function all_direct_manager_requests();
	public function get_who_is_my_d_manager();
	public function get_direct_manager_req($applicant_id);
	public function saving_approved_request($application_id, $staffApprovePfNo, $staffApproveDevtype, $dManagerApproveName, $dmanagerapprovjustif, $dManagerApproveText, $dManagerApprovedOn);
	public function saving_rejected_request($application_id, $staffRejectPfNo, $dManagerRejectName, $dManagerRejectText, $staffRejectionJustif, $dManagerRejectdOn);
}
?>