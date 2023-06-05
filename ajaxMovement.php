<?php 
require_once('./connection_one.php');

if(isset($_POST["pf_number"])){
	$pf_number= $_POST['pf_number'];

    //Get all city data
    $query = "SELECT * FROM vwASSETMANAGEMENT WHERE pfNumber = '$pf_number'";
    $run_query = sqlsrv_query($conn1, $query);

    //Count total number of rows
    $count = sqlsrv_has_rows($run_query);
    
    //Display cities list
    if($count){
        while($data = sqlsrv_fetch_array($run_query)){
            echo '
    <div class="form-row">
    <div class="form-group col-md-4">
    <label class="control-label">First name</label>
    <input class="form-control" id="staff-device-moved-to-fname" name="staff-device-moved-to-fname" value="'.$data['firstName'].'" readonly>
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Middle name  </label>
    <input type="text" name="staff-device-moved-to-mname" value="'.$data['middleName'].'" class="form-control" id="staff-device-moved-to-mname" readonly>
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Last name </label>
    <input type="text" name="staff-device-moved-to-lname" class="form-control" id="staff-device-moved-to-lname" value="'.$data['lastName'].'" readonly>
    </div>
    </div>';
    echo '
    <div class="form-row">
    <div class="form-group col-md-4">
    <label class="control-label">Department </label>
    <input type="text" name="staff-device-moved-to-department" class="form-control" id="staff-device-moved-to-departmaent" value="'.$data['Department'].'" readonly>
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Location</label>
    <input type="text" name="staff-device-moved-to-location" class="form-control" id="staff-device-moved-to-location" value="'.$data['Location'].'" readonly>
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Region </label>
    <input type="text" name="staff-device-moved-to-region" class="form-control" id="staff-device-moved-to-region" value="'.$data['Region'].'" readonly>
    </div>
    </div>';
    echo '
    <div class="form-row">
    <div class="form-group col-md-8">
    <label class="control-label">Designation </label>
    <input type="text" name="staff-device-moved-to-designation" class="form-control" id="staff-device-moved-to-designation" value="'.$data['Department'].'" readonly>
    </div>
    </div>';
    echo '
    <div class="form-row">
    <div class="form-group col-md-8">
    <label class="control-label">Direct Manager</label>
    <input type="text" name="staff-device-moved-to-dmanager" class="form-control" id="staff-device-moved-to-dmanager" value="'.$data['directManager'].'" readonly>
    </div>
    </div>';
    }
    }else{
        echo 'Not available';
    }
}
?>