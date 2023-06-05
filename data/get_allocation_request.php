<?php 
require_once('../class/ITSupportSupervisor.php');
if(isset($_POST['applicant_id'])){
    $applicant_id = $_POST['applicant_id'];
    $itemDetails = $it_support_supervisor->get_applicant_to_allocate($applicant_id);
    $return['title'] = "Are you sure you want to allocate device to this staff?";
    $return['event'] = "allocateasset";
    if($itemDetails > 0){ 
        $return['allocateStaffFName'] = $itemDetails['firstName'];
        $return['allocateStaffMName'] = $itemDetails['secondName'];
        $return['allocateID'] = $itemDetails['applicantID'];
        $return['allocateStaffLName'] = $itemDetails['surName'];
        $return['allocateStaffDevType'] = $itemDetails['deviceType'];
        $return['allocateStaffQuantity'] = $itemDetails['quantity'];
        $return['allocateStaffPF'] = $itemDetails['pfNo'];
        $return['allocateStaffDesigna'] = $itemDetails['designation'];
        $return['allocateStaffReg'] = $itemDetails['region'];
        $return['allocateStaffReasonF'] = $itemDetails['reasonFor'];
        $return['allocateStaffJustif'] = $itemDetails['justification'];
        $return['allocateStaffDepart'] = $itemDetails['department'];
        $return['allocateStaffDate'] = $itemDetails['appliedDate'];


        $return['itSupportVerJustf'] = $itemDetails['verificationJustif'];
        $return['dManagerApJustf'] = $itemDetails['dManagerApproveJustif'];
        $return['itMangrApprovJustf'] = $itemDetails['itManagerApproveJustif'];
    }
    echo json_encode($return);  
    
}

$it_support_supervisor->Disconnect();
?>