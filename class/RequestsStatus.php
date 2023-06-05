<?php 
require_once('../database/Database.php');
require_once ('../interface/iRequestsStatus.php');

class RequestsStatus extends Database implements iRequestsStatus{
	public function all_requests_status(){
		$sql="SELECT * FROM APPLICANTTB WHERE pfNo='".$_SESSION['userpf@ttclassetsystem']."' ORDER BY appliedDate";
		return $this->getRows($sql);
	} 

	public function get_requests_status($applicant_id){
		$sql="SELECT * FROM APPLICANTTB WHERE pfNo = '".$_SESSION['userpf@ttclassetsystem']."' AND applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}

	public function get_rejection_comments($applicant_id){
		$sql="SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}

	public function delete_requests_status($applicant_id, $pfNamb){
		$sql = "DELETE FROM APPLICANTTB WHERE pfNo = ? AND applicantID = ?";
		return $this->deleteRow($sql, [$pfNamb, $applicant_id]);
	}

}

$requests_status=new RequestsStatus();

?>