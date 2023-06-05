<?php
require_once('../database/Database.php');
require_once('../interface/iStaffDeviceAllocated.php');
class StaffDeviceAllocated extends Database implements iStaffDeviceAllocated {
	public function all_staff_device_alocated(){
		$sql = "SELECT A.appliedDate, A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage,S.capacity,D.status,A.applicantID,A.firstName,A.allocated,A.secondName,A.surName, A.deviceOwnership, D.serialNo FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB AS S ON D.applicantID  = S.applicantID and A.pfNo=D.pfnumber where A.pfNo = '".$_SESSION['userpf@ttclassetsystem']."' and A.allocated = 'Yes' and A.acceptSupporter='Yes' and (A.confirm='Yes') order by A.appliedDate ";
		return $this->getRows($sql);
	}

	public function get_staff_more_allocated_spec($asset_alloc_id){
		$sql = "SELECT A.appliedDate,A.confirm, A.acceptSupporter, A.pfNo,A.quantity,D.itAssetType, D.brand,D.model,S.processorSpeed,S.RAM,S.storage,S.capacity,D.status, D.serialNo, D.deviceName, A.applicantID, A.firstName,A.allocated,A.secondName,A.surName, A.deviceOwnership FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB AS S ON D.applicantID  = S.applicantID and A.pfNo=D.pfnumber WHERE A.pfNo = '".$_SESSION['userpf@ttclassetsystem']."' and A.allocated = 'Yes' AND A.acceptSupporter='Yes' AND A.confirm='Yes' AND A.applicantID=? order by A.appliedDate";
		return $this->getRow($sql, [$asset_alloc_id]);
	}
	
	public function get_status($applicantID)
	{
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicantID]);
	}

	public function delete_status($applicantID)
	{
		$sql = "DELETE FROM APPLICANTTB WHERE applicantID = ?";
		return $this->deleteRow($sql, [$applicantID]);
	}
}

$staffdevicealloc = new StaffDeviceAllocated();

?> 