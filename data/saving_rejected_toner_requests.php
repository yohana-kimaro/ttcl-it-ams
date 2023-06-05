<?php 
require_once('../class/TonerRequest.php');
require_once('../class/TonerStock.php');

if(isset($_POST['appli_toner_rid'])){
	$appli_toner_rid = $_POST['appli_toner_rid'];
	$appli_toner_rpfno = $_POST['appli_toner_rpfno'];
	$appli_toner_rtext = $_POST['appli_toner_rtext'];
	$appli_toner_rejected_by = $_POST['appli_toner_rejected_by'];
	$appli_toner_rejected_on = $_POST['appli_toner_rejected_on'];
	$appli_toner_rjustif= $_POST['appli_toner_rjustif'];
	$appli_toner_qty=$_POST['appli_toner_qty'];
	$appli_toner_mod=$_POST['appli_toner_mod'];

	$appli_toner_rjustif=ucfirst(strtolower($appli_toner_rjustif));

	$cqty = $toner_stock->get_stock_model_name($appli_toner_mod);
	$currentQty = $cqty['tonerStockQuantity'];
	$currentMod = $cqty['tonerModel'];
	$currentID = $cqty['tonerID'];


	if ($appli_toner_mod===$currentMod) {
		$totalCurrentQty=$currentQty+$appli_toner_qty;

		$saveEditStock = $toner_stock->update_toner_stock($totalCurrentQty,$currentID,$appli_toner_mod);
		$saveEdit = $toner_request->saving_reject_toner_requ($appli_toner_rejected_on, $appli_toner_rejected_by, $appli_toner_rtext, $appli_toner_rjustif, $appli_toner_rpfno, $appli_toner_rid);
	
	$return['valid'] = false;
	if($saveEdit && $saveEditStock){
		$return['valid'] = true;
		$return['msg'] = "Toner request rejected successfully";
	}
}
	echo json_encode($return);
}
$toner_request->Disconnect();
$toner_stock->Disconnect();

?>
