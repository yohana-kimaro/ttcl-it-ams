<?php 
require_once('../database/Database.php');
require_once ('../interface/iDirectManager.php');

class DirectManager extends Database implements iDirectManager{
	public function all_direct_manager_requests(){
		if ($_SESSION['userposit@ttclassetsystem']==='Regional Manager') {
			$sql="SELECT * FROM APPLICANTTB WHERE itSupportSupervisor='Not Verified by IT Support Supervisor' AND itManager='Not approvec by IT Manager' AND directManager='Not checked by Direct Manager' AND region='".$_SESSION['regionName@ttclassetsystem']."' AND myDirectManager = '".$_SESSION['userposit@ttclassetsystem']."' ORDER BY appliedDate DESC";
		}else{
			$sql="SELECT * FROM APPLICANTTB WHERE itSupportSupervisor='Not Verified by IT Support Supervisor' AND itManager='Not approvec by IT Manager' AND directManager='Not checked by Direct Manager' AND myDirectManager = '".$_SESSION['userposit@ttclassetsystem']."' ORDER BY appliedDate DESC";			
		}
		return $this->getRows($sql);
	}

	public function get_who_is_my_d_manager(){
		$sql="SELECT * FROM vwASSETMANAGEMENT WHERE pfNumber = '".$_SESSION['userpf@ttclassetsystem']."'";
		return $this->getRows($sql);
	}

	public function get_direct_manager_req($applicant_id){
		$sql = "SELECT * FROM APPLICANTTB WHERE applicantID = ?";
		return $this->getRow($sql, [$applicant_id]);
	}//end edit_item

	public function saving_approved_request($application_id, $staffApprovePfNo, $staffApproveDevtype, $dManagerApproveName, $dmanagerapprovjustif, $dManagerApproveText, $dManagerApprovedOn){
		$sql = "UPDATE APPLICANTTB SET deviceType = ?, dManagerName=?, dManagerApproveJustif=?, directManager=?, dManagerDate=? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$staffApproveDevtype, $dManagerApproveName, $dmanagerapprovjustif, $dManagerApproveText, $dManagerApprovedOn, $application_id, $staffApprovePfNo]);
	}

	public function saving_rejected_request($application_id, $staffRejectPfNo, $dManagerRejectName, $dManagerRejectText, $staffRejectionJustif, $dManagerRejectdOn){
		$sql = "UPDATE APPLICANTTB SET dManagerName=?, directManager=?, comment=?, dManagerDate=? WHERE applicantID = ? AND pfNo=?";
		return $this->updateRow($sql, [$dManagerRejectName, $dManagerRejectText, $staffRejectionJustif, $dManagerRejectdOn, $application_id, $staffRejectPfNo]);
	}

}

$direct_manager=new DirectManager();

?>