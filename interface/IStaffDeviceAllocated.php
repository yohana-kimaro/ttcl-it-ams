<?php 
interface iStaffDeviceAllocated{
	public function all_staff_device_alocated();
	public function get_staff_more_allocated_spec($asset_alloc_id);
	public function get_status($applicantID);
	public function delete_status($applicantID);
}
?>