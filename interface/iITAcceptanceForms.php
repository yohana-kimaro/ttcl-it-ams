<?php 
interface iITAcceptanceForms{
	public function all_it_accept_request();
	public function get_item($applicantID);
	// public function add_item($iName, $iPrice, $type_id, $code, $brand);
	public function edit_item($applicantID, $acceptedname, $itAcceptanceReqTime,$acceptedBy);
	public function reject_item($applicantID, $rejectacceptancename, $rejectionJustif,$itAcceptanceRejectedTime,$acceptanceRejectedBy);
}//end iItem 

?>