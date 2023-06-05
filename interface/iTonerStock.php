<?php 
interface iTonerStock {
	public function all_toner_stock_list();
	public function get_new_adding_stock($toner_id);
	public function get_toner_to_remove_details($toner_id);
	public function reset_toner_details($toner_reset, $toner_model, $toner_id);
	public function del_stockList($stock_id);
	public function add_stock($item_id, $qty, $xDate, $manu, $purc);
	public function add_toner_stock_quantity($newstockquantity, $newstockaddedon, $newstockaddedby, $toner_id);
	public function get_stockModelName($toner_model_name);
	public function get_stock_model_name($appli_toner_mod);
	public function get_stockQty($toner_id);
	public function update_toner_stock($totalCurrentQty,$currentID,$appli_toner_mod);
	public function substract_requested_toner_model($remainingModelQuantity, $tonerwherereqmodel);
}

?>