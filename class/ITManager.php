<?php
require_once('../database/Database.php');
require_once('../interface/iITManager.php');
class ITManager extends Database implements iITManager {
	public function all_it_manager_request(){
		$sql = "SELECT * FROM APPLICANTTB WHERE itSupportSupervisor='Verified by IT Support Supervisor' AND itManager='Not approvec by IT Manager' AND directManager='Checked by Direct Manager' ORDER BY appliedDate DESC";
		return $this->getRows($sql);
	}
	
	public function get_applicant_to_approve($applicantID){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicantID]);
	}

	public function get_applicant_to_reject($applicantID){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicantID]);
	}

	public function saving_approved_request($application_id, $staffApprovePfNo, $itApproveName, $itApproveText, $itApprovedOn,  $allocated, $itManagerApproJusti){
		$sql = "UPDATE APPLICANTTB SET itManagerName = ?, itManager = ?, itManagerDate = ?, allocated=?, itManagerApproveJustif = ? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$itApproveName, $itApproveText, $itApprovedOn,  $allocated, $itManagerApproJusti, $application_id, $staffApprovePfNo]);
	}

	public function saving_rejected_request($application_id, $staffRejectPfNo, $itRejectName, $itRejectText, $itRejectJustific, $itRejectedOn){
		$sql = "UPDATE APPLICANTTB SET itManagerName = ?, itManager = ?, comment = ?, itManagerDate = ? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$itRejectName, $itRejectText, $itRejectJustific, $itRejectedOn, $application_id, $staffRejectPfNo]);
	}
}

$it_manager = new ITManager();

?>