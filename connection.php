<?php
$serverName = "DESKTOP-3DTP1JF\MSSQLSERVER1"; //serverName\instanceName
$connectionInfo = array( "Database"=>"TTCLASSETS", "UID"=>"sa", "PWD"=>"Engineer@2020");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     // echo "Connection established.<br />";
}else{
     echo "Connection. could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>