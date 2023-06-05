<?php
require_once('../database/Database.php');
require_once('../interface/iTotalAllocationLists.php');
class TotalAllocationLists extends Database implements iTotalAllocationLists {
	public function total_allocation_lists(){
		$sql = "SELECT A.applicantID,A.department,A.offBuild, A.designation, A.pfNo,A.region,  A.appliedDate,A.firstName,A.secondName,A.surName,D.pfnumber,D.purchasedYear,A.quantity,D.itAssetType,D.serialNo,D.devOwnership, 
D.deviceName, D.brand,A.deviceType,D.model,D.status,S.processorSpeed,S.macAddress,S.RAM,S.storage,S.capacity,D.purchasedYear,D.other, 
D.allocated, D.dateIssued FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN 
SPECIFICATIONSTB AS S ON D.serialNo  = S.serialNo where D.allocated = 'Yes' ORDER BY A.firstName asc";
		return $this->getRows($sql);
	}

	public function get_staff_more_alloc_spec($staff_appli_id){
		$sql = "SELECT A.applicantID,A.department,A.offBuild, A.designation, A.pfNo,A.region,  A.appliedDate,A.firstName,A.secondName,A.surName,D.pfnumber,D.purchasedYear,A.quantity,D.itAssetType,D.serialNo,D.devOwnership, 
D.deviceName, D.brand,A.deviceType,D.model,D.status,S.processorSpeed,S.macAddress,S.RAM,S.storage,S.capacity,D.purchasedYear,D.other, 
D.allocated, D.dateIssued FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN 
SPECIFICATIONSTB AS S ON D.serialNo  = S.serialNo where D.allocated = 'Yes' AND A.applicantID=? ORDER BY A.firstName asc";
		return $this->getRow($sql, [$staff_appli_id]);
	}
}

$allocationList = new TotalAllocationLists();

?>