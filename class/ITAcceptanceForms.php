<?php
require_once('../database/Database.php'); 
require_once('../interface/iITAcceptanceForms.php');
class ITAcceptanceForms extends Database implements iITAcceptanceForms {
	public function all_it_accept_request(){
		$sql = "SELECT A.appliedDate,A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage,S.capacity,D.serialNo, D.status, A.applicantID,A.firstName,A.secondName,A.surName,A.acceptance FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID where A.allocated = 'Yes' and A.confirm='Yes' and A.acceptance is not null and A.receivingDate is not null and (A.acceptanceRepComment is null or A.acceptanceRepComment is not null) and A.acceptSupporter='No' order by A.appliedDate";
		return $this->getRows($sql);
	}//end all_items

	
	public function get_item($applicantID)
	{
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicantID]);
	}//end edit_item

	public function edit_item($applicantID, $acceptedname, $itAcceptanceReqTime,$acceptedBy){
		$sql = "UPDATE APPLICANTTB SET acceptSupporter = ?,itAcceptedTime = ?,acceptedBy = ? WHERE applicantID = ?";
		return $this->updateRow($sql, [$acceptedname, $itAcceptanceReqTime,$acceptedBy, $applicantID]);
	}//end edit_item

	public function reject_item($applicantID, $rejectacceptancename, $rejectionJustif,$itAcceptanceRejectedTime,$acceptanceRejectedBy){
		$sql = "UPDATE APPLICANTTB SET confirm= ?,acceptanceRepComment=?, itAcceptanceRejTime = ?,itAcceptanceRejBy = ? WHERE applicantID = ?";
		return $this->updateRow($sql, [$rejectacceptancename, $rejectionJustif,$itAcceptanceRejectedTime,$acceptanceRejectedBy, $applicantID]);
	}
}//end class Item

$itsupportreq = new ITAcceptanceForms();

?>