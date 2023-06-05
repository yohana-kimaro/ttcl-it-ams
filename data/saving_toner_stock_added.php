<?php 
require_once('../class/TonerStock.php');
if(isset($_POST['toner_id'])){
	$toner_id = $_POST['toner_id'];
	$newstockquantity = $_POST['newstockquantity'];
	$newstockaddedon = $_POST['newstockaddedon'];
	$newstockaddedby = $_POST['newstockaddedby'];
	$lastqty=$_POST['lastqty'];

	$cqty = $toner_stock->get_stockQty($toner_id);
	$currentQty = $cqty['tonerStockQuantity'];
	$newstockquantity += $currentQty;

	// $newstockquantity+=$lastqty;

	$saveEdit = $toner_stock->add_toner_stock_quantity($newstockquantity, $newstockaddedon, $newstockaddedby, $toner_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Toner stock added successfully";
	}
	echo json_encode($return);
}
$toner_stock->Disconnect();
