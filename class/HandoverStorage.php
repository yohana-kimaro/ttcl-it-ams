<?php
require_once('../database/Database.php');
require_once('../interface/iHandoverStorage.php');
class HandoverStorage extends Database implements iHandoverStorage {
	public function add_scanner_handOverSto($scannerSerialNo){
		$sql = "INSERT INTO HANDOVERSTORAGETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	}

	public function add_printer_handOverSto($printerSerialNo){
		$sql = "INSERT INTO HANDOVERSTORAGETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]);
	}

	public function add_desktop_handOverSto($desktopSerialNo){
		$sql = "INSERT INTO HANDOVERSTORAGETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo]);
	}

	public function add_laptop_handOverSto($laptopSerialNo){
		$sql = "INSERT INTO HANDOVERSTORAGETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo]);
	}

	public function add_computer_handOverSto($computerSerialNo){
		$sql = "INSERT INTO HANDOVERSTORAGETB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$computerSerialNo]);
	}

	public function update_computer_handOverSto($compupdseralno, $updatedcompsernowhere){
		$sql = "UPDATE HANDOVERSTORAGETB SET serialNo = ? WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $updatedcompsernowhere]);
	}

	public function delete_it_asset_handOverSto($itAssetDeleteSerialNo){
		$sql = "DELETE from  HANDOVERSTORAGETB  where serialNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_hand_storage($allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no){
		$sql = "UPDATE HANDOVERSTORAGETB SET handOverFromPFNO=?, handOverApplicantID=? WHERE serialNo=?";	
	 	return $this->updateRow($sql, [$allocated_applicant_pfnamba, $allocated_applicant_id, $allocated_asset_serial_no]);
	}

	public function add_handover_storage_form($handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID){
		$sql = "UPDATE HANDOVERSTORAGETB SET ifHandOver=?, handOverDate=?,handOverAttachment=?, handOverFrom=?, handOverTo=? WHERE serialNo=? and handOverApplicantID=?";
		return $this->updateRow($sql, [$handoverConfirm, $staffHandoverDate, $fileUploadedName, $staffFullName, $itSupportSup, $staffHandoverSerialNo, $staffHandoverID]);
	}

	public function update_staffs_handover_to_handover_storage($HSifHandOver, $handOverConfirmation, $handoverreqstaffreceivedby, $handoverreqstaffjustif, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba){
		$sql = "UPDATE HANDOVERSTORAGETB SET ifHandOver=?,handOverConfirmation=?, receivingOfficial=?, handOverComment=? WHERE handOverApplicantID=? AND serialNo=? AND handOverFromPFNO=?";
		return $this->updateRow($sql, [$HSifHandOver, $handOverConfirmation, $handoverreqstaffreceivedby, $handoverreqstaffjustif, $handover_id, $handoverreqstaffserialnamba, $handoverreqstaffpfnamba]);
	}

	public function reject_staff_requests_to_handover_storage($handoverstaffrejrejectedjustif, $handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation,$handover_id, $handoverstaffreqrejserialno){
		$sql = "UPDATE HANDOVERSTORAGETB SET handOverComment=?,receivingOfficial=?, ifHandOver=?, handOverConfirmation=? WHERE handOverApplicantID=? AND serialNo=?";
		return $this->updateRow($sql, [$handoverstaffrejrejectedjustif, $handoverstaffreqrejrejectedby, $ifHandOver, $handOverConfirmation,$handover_id, $handoverstaffreqrejserialno]);
	}

	public function update_movement_to_handover_storage($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE HANDOVERSTORAGETB SET handOverFromPFNO = ? WHERE handOverFromPFNO=? AND serialNo=? AND handOverApplicantID = ?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}
}

$handover_storage = new HandoverStorage();

?>


