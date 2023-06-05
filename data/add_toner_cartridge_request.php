<?php 
require_once('../class/Toner.php');
require_once('../class/TonerStock.php');

if(isset($_POST['tonerreqdate']) && isset($_POST['tonerreqqty'])){
	$tonerreqdate = $_POST['tonerreqdate'];
	$tonerreqqty = $_POST['tonerreqqty'];
	$tonerreqmodel = $_POST['tonerreqmodel'];
	$tonerreqregion = $_POST['tonerreqregion'];
	$tonerreqoffbuild = $_POST['tonerreqoffbuild'];
	$tonerreqdepartment = $_POST['tonerreqdepartment'];
	$tonerreqdesignation = $_POST['tonerreqdesignation'];
	$tonerreqpfno = $_POST['tonerreqpfno'];
	$tonerreqlastname = $_POST['tonerreqlastname'];
	$tonerreqmiddlename = $_POST['tonerreqmiddlename'];
	$tonerreqfirstname = $_POST['tonerreqfirstname'];
	$tonerreqdirectmanager = $_POST['tonerreqdirectmanager'];
	$tonerwherereqmodel=$_POST['tonerwherereqmodel'];

	

	

	$modqty = $toner_stock->get_stockModelName($tonerreqmodel);
	$currentTotalQty = $modqty['tonerStockQuantity'];
	if ($currentTotalQty<$tonerreqqty) {
		$return['valid'] = false;
		$return['msgerror'] = "Toner cartridges stock not enough";
	}else{
		$remainingModelQuantity=$currentTotalQty-$tonerreqqty;

		$saveItem = $toner->add_toner_staff_request($tonerreqdate, $tonerreqqty, $tonerreqmodel, $tonerreqregion, $tonerreqoffbuild, $tonerreqdepartment,$tonerreqdesignation, $tonerreqpfno,$tonerreqlastname, $tonerreqmiddlename,$tonerreqfirstname,$tonerreqdirectmanager);

		$saveItemSubstract = $toner_stock->substract_requested_toner_model($remainingModelQuantity, $tonerwherereqmodel);
		if($saveItem && $saveItemSubstract){
			$return['valid'] = true;
			$return['msg'] = "Toner cartridge request has been sent successfully";
		}else{
			$return['valid'] = false;
		}
	}
	echo json_encode($return);
}

$toner->Disconnect();
$toner_stock->Disconnect();
?>