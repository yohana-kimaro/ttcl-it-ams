<?php
require_once('../database/Database.php');
require_once('../interface/iTonerStock.php');
class TonerStock extends Database implements iTonerStock {

	public function all_toner_stock_list(){
		$sql = "SELECT * FROM tonerCartridgeTB ORDER BY tonerModel ASC";
		return $this->getRows($sql);
	}

	public function get_new_adding_stock($toner_id){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerID = ?";
		return $this->getRow($sql, [$toner_id]);
	}

	public function reset_toner_details($toner_reset, $toner_model, $toner_id){
		$sql = "UPDATE tonerCartridgeTB SET tonerStockQuantity=? WHERE tonerModel=? AND tonerID= ?";
		return $this->updateRow($sql, [$toner_reset, $toner_model, $toner_id]);
	}

	public function del_stockList($stock_id){
		$sql = "DELETE FROM stock 
				WHERE stock_id = ?";
		return $this->deleteRow($sql, [$stock_id]);
	}

	public function add_stock($item_id, $qty, $xDate, $manu, $purc){
		$sql = "INSERT INTO stock(item_id, stock_qty, stock_expiry, stock_manufactured, stock_purchased)
				VALUES(?,?,?,?,?)";
		// return true;
		return $this->insertRow($sql, [$item_id, $qty, $xDate, $manu, $purc]);
	}

	public function add_toner_stock_quantity($newstockquantity, $newstockaddedon, $newstockaddedby, $toner_id){
		$sql = "UPDATE tonerCartridgeTB SET tonerStockQuantity=?, tonerStockAddedOn=?, tonerStockAddedBy=? WHERE tonerID = ?";
		return $this->updateRow($sql, [$newstockquantity, $newstockaddedon, $newstockaddedby, $toner_id]);
	}

	public function get_stockQty($toner_id){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerID = ?";
		return $this->getRow($sql, [$toner_id]);
	}

	public function get_stockModelName($toner_model_name){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerModel = ?";
		return $this->getRow($sql, [$toner_model_name]);
	}

	public function get_stock_model_name($appli_toner_mod){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerModel = ?";
		return $this->getRow($sql, [$appli_toner_mod]);
	}

	public function get_toner_to_remove_details($toner_id){
		$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerID = ?";
		return $this->getRow($sql, [$toner_id]);
	}

	public function update_toner_stock($totalCurrentQty,$currentID,$appli_toner_mod){
		$sql = "UPDATE tonerCartridgeTB SET tonerStockQuantity = ? WHERE tonerID = ? AND tonerModel = ?";
		return $this->updateRow($sql, [$totalCurrentQty,$currentID,$appli_toner_mod]);
	}

	public function substract_requested_toner_model($remainingModelQuantity, $tonerwherereqmodel){
		$sql = "UPDATE tonerCartridgeTB	SET tonerStockQuantity = ?	WHERE tonerModel = ?";
		return $this->updateRow($sql, [$remainingModelQuantity, $tonerwherereqmodel]);
	}

}
$toner_stock = new TonerStock();

?>