<?php 
interface iITManager{
	public function all_it_manager_request();
	public function get_applicant_to_approve($applicantID);
	public function get_applicant_to_reject($applicantID);
	public function saving_approved_request($application_id, $staffApprovePfNo, $itApproveName, $itApproveText, $itApprovedOn,  $allocated, $itManagerApproJusti);
	public function saving_rejected_request($application_id, $staffRejectPfNo, $itRejectName, $itRejectText, $itRejectJustific, $itRejectedOn);
}
?>