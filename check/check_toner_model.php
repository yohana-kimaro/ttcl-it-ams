 <?php 
 require_once("../connection.php");
 if(!empty($_POST["recordtonercartridgetonermodel"])) {
 	$recordtonercartridgetonermodel= $_POST["recordtonercartridgetonermodel"];

 	$sql = "SELECT * FROM tonerCartridgeTB WHERE tonerModel='$recordtonercartridgetonermodel'";
 	$params = array();
 	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
 	$result =sqlsrv_query($conn,$sql , $params, $options);
 	$count=sqlsrv_num_rows($result);
 	if($count>0)
 	{
 		echo "<span style='color:red'> Toner model already exists .</span>";
 		echo "<script>$('#submit-record-toner-cartridge').prop('disabled',true);</script>";
 	} else{

 		echo "<span style='color:green'> Toner model available for registration .</span>";
 		echo "<script>$('#submit-record-toner-cartridge').prop('disabled',false);</script>";
 	}
 }


?>