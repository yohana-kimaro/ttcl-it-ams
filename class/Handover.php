<?php
require_once('../database/Database.php');
require_once('../interface/iHandover.php');
class Handover extends Database implements iHandover {
	public function add_scanner_handO($scannerSerialNo){
		$sql = "INSERT INTO HANDOVERTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	}

	public function add_printer_handO($printerSerialNo){
		$sql = "INSERT INTO HANDOVERTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]);
	}

	public function add_desktop_handO($desktopSerialNo){
		$sql = "INSERT INTO HANDOVERTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo]);
	}

	public function add_laptop_handO($laptopSerialNo){
		$sql = "INSERT INTO HANDOVERTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo]);
	}

	public function add_computer_handO($computerSerialNo){
		$sql = "INSERT INTO HANDOVERTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$computerSerialNo]);
	}

	public function update_computer_handO($compupdseralno, $updatedcompsernowhere){
		$sql = "UPDATE HANDOVERTB SET serialNo = ? WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $updatedcompsernowhere]);
	}

	public function delete_it_asset_handO($itAssetDeleteSerialNo){
		$sql = "DELETE from  HANDOVERTB  where serialNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	} 

	public function allocate_it_asset_handover($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no){
		$sql = "UPDATE HANDOVERTB SET handOverFromPFNO=?,handOverApplicantID=? WHERE serialNo=?";		
	 	return $this->updateRow($sql, [$allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no]);
	}

	public function all_handover_form(){
		$sql = "SELECT A.appliedDate, A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage, S.capacity,D.status,A.applicantID,A.firstName,A.allocated,A.secondName,A.surName, H.ifHandOver, A.deviceOwnership, D.serialNo, H.handOverComment FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID INNER JOIN HANDOVERTB AS H ON S.applicantID=H.handOverApplicantID INNER JOIN MOVEMENTTB AS M ON H.handOverApplicantID=M.movedFromApplicantID WHERE A.pfNo ='".$_SESSION['userpf@ttclassetsystem']."' and A.allocated = 'Yes' and A.acceptSupporter='Yes' AND H.ifHandOver='No' AND A.confirm='Yes' AND M.movementReq='No' order by A.appliedDate";
		return $this->getRows($sql);
	}

	public function get_handover_device_details($handover_id){
		$sql = "SELECT A.appliedDate, A.pfNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage, S.capacity,D.status,A.applicantID,A.firstName,A.allocated,A.secondName,A.surName, H.ifHandOver, D.deviceName, A.deviceOwnership, D.serialNo, H.handOverComment FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.applicantID  = S.applicantID INNER JOIN HANDOVERTB AS H ON S.applicantID=H.handOverApplicantID INNER JOIN MOVEMENTTB AS M ON H.handOverApplicantID=M.movedFromApplicantID WHERE A.applicantID = ? AND A.pfNo ='".$_SESSION['userpf@ttclassetsystem']."' and A.allocated = 'Yes' and A.acceptSupporter='Yes' AND H.ifHandOver='No' AND A.confirm='Yes' AND M.movementReq='No' order by A.appliedDate";
		return $this->getRow($sql, [$handover_id]);
	}

	public function add_handover_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID){
		$sql = "UPDATE HANDOVERTB SET ifHandOver=?, handOverDate=?,handOverAttachment=?, handOverFrom=?, handOverTo=? WHERE serialNo=? and handOverApplicantID=?";
		return $this->updateRow($sql, [$handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID]);
	}

	public function all_handover_status(){
		$sql = "SELECT A.pfNo,A.firstName,A.secondName,A.surName, D.serialNo,A.quantity,A.deviceType,D.brand,D.model,S.processorSpeed,S.RAM,S.storage, S.capacity,D.status,A.applicantID,A.allocated, H.ifHandOver, H.handOverDate,H.handOverFrom,H.handOverTo,H.handOverAttachment, A.deviceOwnership, H.handOverConfirmation FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.serialNo  = S.serialNo INNER JOIN HANDOVERTB AS H ON S.serialNo=H.serialNo WHERE A.pfNo='".$_SESSION['userpf@ttclassetsystem']."' AND A.allocated = 'Yes' and A.acceptSupporter='Yes' AND H.ifHandOver='Yes' AND A.confirm='Yes' order by A.appliedDate";
		return $this->getRows($sql);
	}

	public function all_handover_staffs_requests(){
		$sql = "SELECT * FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.serialNo  = S.serialNo INNER JOIN HANDOVERTB AS H ON S.serialNo=H.serialNo WHERE A.allocated = 'Yes' and A.acceptSupporter='Yes' AND H.handOverConfirmation='No' AND H.ifHandOver='Yes' AND A.confirm='Yes' order by A.appliedDate";
		return $this->getRows($sql);
	}

	public function get_staff_handover_request_approve($handover_id){
		$sql = "SELECT * FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB S ON D.serialNo  = S.serialNo INNER JOIN HANDOVERTB AS H ON S.serialNo=H.serialNo WHERE A.allocated = 'Yes' and A.acceptSupporter='Yes' AND H.handOverConfirmation='No' AND H.ifHandOver='Yes' AND A.confirm='Yes' AND A.applicantID = ?  order by A.appliedDate";
		return $this->getRow($sql, [$handover_id]);
	}

	public function approve_staffs_handover_request($handoverreqstaffifhandover, $handoverdatereq, $handoverreqstaffconfirm, $handoverreqstaffAttach, $handoverFrom, $handoverTo, $receivingOff,$handoverAppliID, $handOverPFNO, $handoverComm, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba){
		$sql = "UPDATE HANDOVERTB SET ifHandOver=?,handOverDate=?, handOverConfirmation=?,handOverAttachment=?, handOverFrom=?, handOverTo=?, receivingOfficial=?, handOverApplicantID=?, handOverFromPFNO=?, handOverComment=? WHERE handOverApplicantID=? AND serialNo=? AND handOverFromPFNO=?";
		return $this->updateRow($sql, [$handoverreqstaffifhandover, $handoverdatereq, $handoverreqstaffconfirm, $handoverreqstaffAttach, $handoverFrom, $handoverTo, $receivingOff,$handoverAppliID, $handOverPFNO, $handoverComm, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba]);
	}

	public function reject_staff_requests_to_handover($handoverstaffrejrejectedjustif,$handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation, $handover_id, $handoverstaffreqrejserialno){
		$sql = "UPDATE HANDOVERTB SET handOverComment=?,receivingOfficial=?, ifHandOver=?, handOverConfirmation=? WHERE handOverApplicantID=? AND serialNo=?";
		return $this->updateRow($sql, [$handoverstaffrejrejectedjustif,$handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation, $handover_id, $handoverstaffreqrejserialno]);
	}

	public function update_movement_to_handover($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE HANDOVERTB SET handOverFromPFNO = ? WHERE handOverFromPFNO=? AND serialNo=? AND handOverApplicantID = ?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}

}

$handover = new Handover();

?>


