<?php
require_once('../database/Database.php');
require_once('../interface/iTonerRequest.php');
class TonerRequest extends Database implements iTonerRequest {

	public function all_toner_request_status(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE pfNumber='".$_SESSION['userpf@ttclassetsystem']."' ORDER BY requestedDate ";
		return $this->getRows($sql);
	}

	public function delete_toner_staff_application($toner_id, $toner_pfno){
		$sql = "DELETE FROM tonerApplicantTB WHERE tonerApplID=? AND pfNumber=?";
		return $this->deleteRow($sql,[$toner_id, $toner_pfno]);
	}

	public function all_staffs_toner_requests(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE itSupportSupervisor='Toner cartridge request not approved' ORDER BY requestedDate ASC";
		return $this->getRows($sql);
	}

	public function get_toner_staff_req($toner_appli_id){
		$sql = "SELECT * FROM tonerApplicantTB WHERE tonerApplID = ?";
		return $this->getRow($sql, [$toner_appli_id]);
	}

	public function saving_approve_toner_requ($appli_toner_approved_on, $appli_toner_approved_by, $appli_toner_text, $appli_toner_pfno, $appli_toner_id){
		$sql = "UPDATE tonerApplicantTB	SET approvedOrRejectedOn = ?, approvedOrRejectedBy = ?, itSupportSupervisor = ?	WHERE pfNumber = ? AND tonerApplID = ?";
		return $this->updateRow($sql, [$appli_toner_approved_on, $appli_toner_approved_by, $appli_toner_text, $appli_toner_pfno, $appli_toner_id]);
	}

	public function saving_reject_toner_requ($appli_toner_rejected_on, $appli_toner_rejected_by, $appli_toner_rtext, $appli_toner_rjustif, $appli_toner_rpfno, $appli_toner_rid){
		$sql = "UPDATE tonerApplicantTB	SET approvedOrRejectedOn = ?, approvedOrRejectedBy = ?, itSupportSupervisor = ?, rejectionComment=?	WHERE pfNumber = ? AND tonerApplID = ?";
		return $this->updateRow($sql, [$appli_toner_rejected_on, $appli_toner_rejected_by, $appli_toner_rtext, $appli_toner_rjustif, $appli_toner_rpfno, $appli_toner_rid]);
	}

	public function all_toner_staff_confirmation(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE pfNumber='".$_SESSION['userpf@ttclassetsystem']."' AND itSupportSupervisor='Toner cartridge request approved' AND receivingVerific is NULL ORDER BY requestedDate ";
		return $this->getRows($sql);
	}

	public function get_toner_staff_confirmation($staff_toner_id){
		$sql = "SELECT * FROM tonerApplicantTB WHERE tonerApplID = ?";
		return $this->getRow($sql, [$staff_toner_id]);
	} 

	public function confirm_toner_allocation($toner_staff_alloc_text, $toner_staff_alloc_text_date, $toner_staff_alloc_model, $toner_staff_alloc_pfnamba, $toner_staff_alloc_id){
		$sql = "UPDATE tonerApplicantTB SET receivingVerific=?, receivingVerificDate=? WHERE requestedTonerModel=? AND pfNumber=? AND tonerApplID=?";
		return $this->updateRow($sql, [$toner_staff_alloc_text, $toner_staff_alloc_text_date, $toner_staff_alloc_model, $toner_staff_alloc_pfnamba, $toner_staff_alloc_id]);
	}

	public function all_toner_staff_finalize_req(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE itSupportSupervisor='Toner cartridge request approved' AND isTonerAllocationDone='No' AND receivingVerific='I certify that I have received the toner'";
		return $this->getRows($sql);
	}

	public function get_final_staff_toner($staff_toner_id){
		$sql = "SELECT * FROM tonerApplicantTB WHERE tonerApplID = ?";
		return $this->getRow($sql, [$staff_toner_id]);
	} 

	public function saving_finalize_toner($toner_alloc_yes, $toner_allocated_on, $toner_alloc_model, $toner_fpno, $toner_id){
		$sql = "UPDATE tonerApplicantTB	SET isTonerAllocationDone = ?, tonerAllocationDate = ? WHERE requestedTonerModel = ? AND pfNumber = ? AND tonerApplID = ?";
		return $this->updateRow($sql, [$toner_alloc_yes, $toner_allocated_on, $toner_alloc_model, $toner_fpno, $toner_id]);
	}

	public function all_staffs_toner_allocation(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE itSupportSupervisor='Toner cartridge request approved' AND isTonerAllocationDone='Yes' AND receivingVerific='I certify that I have received the toner'";
		return $this->getRows($sql);
	}

	public function all_staffs_toner_allocated(){
		$sql = "SELECT * FROM tonerApplicantTB WHERE itSupportSupervisor='Toner cartridge request approved' AND isTonerAllocationDone='Yes' AND receivingVerific='I certify that I have received the toner' AND pfNumber='".$_SESSION['userpf@ttclassetsystem']."' ORDER BY requestedDate";
		return $this->getRows($sql);
	}

}

$toner_request = new TonerRequest();


