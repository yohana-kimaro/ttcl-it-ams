<?php 
interface iRequestsStatus{
	public function all_requests_status();
	public function get_requests_status($applicant_id);
	public function get_rejection_comments($applicant_id);
	public function delete_requests_status($applicant_id, $pfNamb);
} 
?>