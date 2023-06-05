<?php
$serverName = "10.0.7.28"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"Manpower","UID"=>"sa", "PWD"=>"intra123");
$conn1 = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn1 ) {
     // echo "Connection established.<br />";
}else{
     echo "Connection one could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>