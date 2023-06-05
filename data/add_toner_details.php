<?php 
require_once('../class/Toner.php');
if(isset($_POST['tonnerbrand']) && isset($_POST['tonermodel'])){
	$tonnerbrand = $_POST['tonnerbrand'];
	$tonermodel = $_POST['tonermodel'];
	$tonerstatus = $_POST['tonerstatus'];
	$toneraddedby = $_POST['toneraddedby'];
	$toneraddedon = $_POST['toneraddedon'];
	$initialtonerqty=$_POST['initialtonerqty'];  
	
	$tonermodel = strtoupper(strtolower($tonermodel));

	$saveItem = $toner->add_toner_details($tonnerbrand, $tonermodel, $tonerstatus, $initialtonerqty, $toneraddedby, $toneraddedon);
	if($saveItem){
		$return['valid'] = true;
		$return['msg'] = "New toner added successfully";
	}else{
		$return['valid'] = false;
	}
	echo json_encode($return);
}

$toner->Disconnect();