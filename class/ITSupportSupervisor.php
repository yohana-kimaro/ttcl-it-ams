<?php 
require_once('../database/Database.php');
require_once ('../interface/iITSupportSupervisor.php');

class ITSupportSupervisor extends Database implements iITSupportSupervisor{
	public function all_it_support_supervisor_requests(){
		$sql="SELECT * FROM APPLICANTTB as a WHERE itSupportSupervisor='Not Verified by IT Support Supervisor' AND itManager='Not approvec by IT Manager' AND directManager='Checked by Direct Manager' AND  (comment = '' or comment is null) order by a.appliedDate DESC";
		return $this->getRows($sql);
	}

	public function all__iss_allocation_requests(){
		$sql="SELECT * FROM APPLICANTTB where itSupportSupervisor='Verified by IT Support Supervisor' and itManager='Approvec by IT Manager' and directManager='Checked by Direct Manager' AND allocated='No' order by appliedDate";
		return $this->getRows($sql);
	}

	public function get_applicant_to_verify($applicant_id){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}

	public function get_applicant_to_allocate($applicant_id){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}

	public function get_applicant_rejected($applicant_id){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}

	public function saving_verified_request($application_id, $staffVerifyPfNo, $staffVerifyJustif, $issVerifyName, $issVerifyText, $issVerifiedOn){
		$sql = "UPDATE APPLICANTTB SET itSupportName=?, itSupportSupervisor=?, itSuppSupDate=?,verificationJustif = ? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$issVerifyName, $issVerifyText, $issVerifiedOn, $staffVerifyJustif, $application_id, $staffVerifyPfNo]);
	}

	public function saving_rejected_request($application_id, $staffRejectPfNo, $issRejectName, $issRejectText, $staffRejectionJustif, $issRejectdOn){
		$sql = "UPDATE APPLICANTTB SET itSupportName=?, itSupportSupervisor=?, itSuppSupDate=?, comment = ? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$issRejectName, $issRejectText, $issRejectdOn, $staffRejectionJustif, $application_id, $staffRejectPfNo]);
	}

}

$it_support_supervisor=new ITSupportSupervisor();

?>