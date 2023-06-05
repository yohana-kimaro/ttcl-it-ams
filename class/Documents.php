<?php
require_once('../database/Database.php');
require_once('../interface/iDocuments.php');
class Documents extends Database implements iDocuments {
	public function add_scanner_doc($scannerSerialNo){
		$sql = "INSERT INTO DOCUMENTSTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$scannerSerialNo]);
	} 

	public function addprinter_doc($printerSerialNo){
		$sql = "INSERT INTO DOCUMENTSTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$printerSerialNo]);
	}

	public function adddesktop_doc($desktopSerialNo){
		$sql = "INSERT INTO DOCUMENTSTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$desktopSerialNo]);
	}

	public function addlaptop_doc($laptopSerialNo){
		$sql = "INSERT INTO DOCUMENTSTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$laptopSerialNo]);
	}

	public function addcomputer_doc($computerSerialNo){
		$sql = "INSERT INTO DOCUMENTSTB(serialNo) VALUES(?)";		
	 	return $this->insertRow($sql, [$computerSerialNo]);
	}

	public function updatecomputer_doc($compupdseralno, $updatedcompsernowhere){
		$sql = "UPDATE DOCUMENTSTB SET serialNo = ? WHERE serialNo = ?";
		return $this->updateRow($sql, [$compupdseralno, $updatedcompsernowhere]);
	}

	public function delete_it_asset_doc($itAssetDeleteSerialNo){
		$sql = "DELETE from  DOCUMENTSTB  where serialNo = ?";		
	 	return $this->deleteRow($sql, [$itAssetDeleteSerialNo]);
	}

	public function allocate_it_asset_documents($allocated_asset_user_manual, $allocated_asset_accepted_policy, $allocated_asset_user_response, $allocated_applicant_id, $allocated_asset_how_to_guide, $allocated_applicant_pfnamba, $allocated_asset_serial_no){
		$sql = "UPDATE DOCUMENTSTB SET userManual=?, acceptedUserPolicy=?, userResponsibility=?, applicantID=?, howToGuide=?, pfnumber=? WHERE serialNo=?";		
	 	return $this->updateRow($sql, [$allocated_asset_user_manual, $allocated_asset_accepted_policy, $allocated_asset_user_response, $allocated_applicant_id, $allocated_asset_how_to_guide, $allocated_applicant_pfnamba, $allocated_asset_serial_no]);
	}

	public function update_staffs_handover_to_documents($handOverPFNO, $movedToDutyS, $itSuppSupp, $itSupEng, $handoverTo, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba){
		$sql = "UPDATE DOCUMENTSTB SET pfnumber =?,userManual=?,acceptedUserPolicy=?,userResponsibility=?, howToGuide=?, applicantID=? WHERE pfnumber=? AND serialNo=?";
		return $this->updateRow($sql, [$handOverPFNO, $movedToDutyS, $itSuppSupp, $itSupEng, $handoverTo, $applicantID, $handoverreqstaffpfnamba, $handoverreqstaffserialnamba]);
	}

	public function update_movement_to_documents($movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id){
		$sql = "UPDATE DOCUMENTSTB SET pfnumber =? WHERE pfnumber=? AND serialNo=? AND applicantID=?";
		return $this->updateRow($sql, [$movem_topfnamba, $movem_frompfnamba, $movem_serialno, $movem_id]);
	}
}

$documents = new Documents();

?>


