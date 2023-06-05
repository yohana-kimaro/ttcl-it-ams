<?php 
require_once('../class/RequestsStatus.php');
if(isset($_POST['applicant_id'])){
	$applicant_id = $_POST['applicant_id'];
	$itemDetails = $requests_status->get_rejection_comments($applicant_id);
	$return['title'] = "Message";
	$return['event'] = "rejectComment";
	if($itemDetails > 0){
		$return['commentID'] = $itemDetails['applicantID'];
		$return['commentPFNamb'] = $itemDetails['pfNo'];		
		$return['rejectedComment'] = $itemDetails['comment'];		
		$return['rejectedCommentDate'] = $itemDetails['appliedDate'];
	}
	echo json_encode($return);	
	
}//end isset

$requests_status->Disconnect();

?>