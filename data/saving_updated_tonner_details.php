<?php 
require_once('../class/Toner.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$uptonerstatus = $_POST['uptonerstatus'];
	$uptonermodel = $_POST['uptonermodel'];
	$uptonerbrand = $_POST['uptonerbrand'];
	$updatedtonerby = $_POST['updatedtonerby'];
	$updatedtoneron= $_POST['updatedtoneron'];

	$uptonermodel=strtoupper(strtolower($uptonermodel));

	$saveEdit = $toner->update_toner_details($uptonerbrand, $uptonermodel, $uptonerstatus, $updatedtonerby, $updatedtoneron, $toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner details updated successfully";
	}
	echo json_encode($return);
}
$toner->Disconnect();
?>
