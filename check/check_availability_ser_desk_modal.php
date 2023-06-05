<?php 
require_once("../connection.php");
if(!empty($_POST["updateITLaptopserialNo"])) {
	$updateITLaptopserialNo= $_POST["updateITLaptopserialNo"];

	$sql = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and  dev.serialNo='$updateITLaptopserialNo'";
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	
		$result =sqlsrv_query($conn,$sql , $params, $options);
		$count=sqlsrv_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Srial number already exists .</span>";
 echo "<script>$('#submit-update-it-asset').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Serial number available for registration .</span>";
 echo "<script>$('#submit-update-it-asset').prop('disabled',false);</script>";
}
}


?>