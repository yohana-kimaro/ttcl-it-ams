<?php
require_once('../database/Database.php');
require_once('../interface/iAcceptance.php');
class Acceptance extends Database implements iAcceptance{
	public function all_acceptance_requests(){
		$sql = "SELECT A.appliedDate, A.reasonFor, A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage,S.capacity,D.status,A.applicantID,A.firstName,A.acceptanceRepComment,A.secondName, D.deviceName, A.surName,D.serialNo FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID where A.pfNo = '".$_SESSION['userpf@ttclassetsystem']."' and A.allocated = 'Yes' and (A.confirm is null or A.confirm = 'No') order by A.appliedDate";
		return $this->getRows($sql);
	}

	public function get_acceptance_device_details($acceptance_id){
		$sql = "SELECT A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage,S.capacity,D.status,A.applicantID, D.deviceName, A.firstName,A.acceptanceRepComment,A.secondName,A.surName,D.serialNo FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID WHERE A.applicantID = ? and A.allocated = 'Yes' and (A.confirm is null or A.confirm = 'No') order by A.appliedDate ";
		return $this->getRow($sql, [$acceptance_id]);
	}

	public function add_acceptance_form($acceptanceConfirm, $staffAcceptedDate, $fileUploadedName, $acceptanceSupporter, $staffAcceptanceID){
		$sql = "UPDATE APPLICANTTB set confirm=?, receivingDate=?, acceptance=?, acceptSupporter=? WHERE applicantID=?";
		return $this->updateRow($sql, [$acceptanceConfirm, $staffAcceptedDate, $fileUploadedName, $acceptanceSupporter, $staffAcceptanceID]);
	}
}

$acceptance = new Acceptance();

?>