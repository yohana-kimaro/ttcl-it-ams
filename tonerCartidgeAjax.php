<?php
//Include database configuration file
include('./connection.php');

if(isset($_POST["tonermodel_id"])){
    //Get all state data
	$tonermodel_id= $_POST['tonermodel_id'];
    $query = "SELECT * FROM tonerCartridgeTB WHERE tonerModel = '$tonermodel_id' 
    ORDER BY tonerModel ASC";
    $run_query = sqlsrv_query($conn, $query);    
    while($row = sqlsrv_fetch_array($run_query, SQLSRV_FETCH_ASSOC)){
    $toner_quantity=$row['tonerStockQuantity'];    
    //Display quantity list
    if($toner_quantity!==0){
        $queryQuantity = "SELECT * FROM tonerRequestedQty ORDER BY tonerQuantity ASC";
        $run_query123 = sqlsrv_query($conn, $queryQuantity);
        echo '<option value="">Choose quantity</option>';
        while($row1 = sqlsrv_fetch_array($run_query123, SQLSRV_FETCH_ASSOC)){
            $toner_model_qty=$row1['tonerQuantity'];
            echo "<option value='$toner_model_qty'>$toner_model_qty</option>";
        }
    }else if($toner_quantity==0){
        echo '<option value="">Not available</option>';
    }
    }
}

?>