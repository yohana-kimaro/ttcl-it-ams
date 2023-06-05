<?php 
interface iAcceptance{
	public function all_acceptance_requests();
	public function get_acceptance_device_details($acceptance_id);
	public function add_acceptance_form($acceptanceConfirm, $staffAcceptedDate, $fileUploadedName, $acceptanceSupporter, $staffAcceptanceID);
}
?>