<?php 
require_once('./connection.php');

if(isset($_POST["devicetype_name"])){
    //Get all state data
	$devicetype_name= $_POST['devicetype_name'];
    $query = "SELECT dev.serialNo, dev.status,dev.itAssetType,dev.deviceName,dev.purchasedYear,spe.macAddress,dev.brand,dev.model, spe.RAM,spe.storage, spe.capacity,spe.cdRomDrive,spe.processorSpeed,softw.os,softw.msOffice,softw.pdfReader,softw.antiVirus FROM SOFTWARETB as softw,DEVICETB as dev,SPECIFICATIONSTB as spe WHERE dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo AND dev.allocated='No' AND dev.itAssetType = '$devicetype_name'";
	$run_query = sqlsrv_query($conn, $query);
    
    //Count total number of rows
    $count = sqlsrv_has_rows($run_query);
    
    //Display states list
    if($count){
        echo '<option value="">Select serial number</option>';
        while($row = sqlsrv_fetch_array($run_query)){
		$serial_number=$row['serialNo'];
        echo "<option value='$serial_number'>$serial_number</option>";
        }
    }else{
        echo '<option value="">Not available</option>';
    }
}

if(isset($_POST["serial_number"])){
	$serial_number= $_POST['serial_number'];
    //Get all city data
    $query = "SELECT dev.serialNo, dev.status,dev.itAssetType,dev.deviceName,dev.purchasedYear,spe.macAddress,dev.brand,dev.model,
    spe.RAM,spe.storage, spe.capacity,spe.cdRomDrive,spe.processorSpeed,softw.os,softw.msOffice,softw.pdfReader,softw.antiVirus
    FROM SOFTWARETB as softw,DEVICETB as dev,SPECIFICATIONSTB as spe
    WHERE dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and dev.serialNo  = '$serial_number'";
    $run_query = sqlsrv_query($conn, $query);
    //Count total number of rows
    $count = sqlsrv_has_rows($run_query);
    
    //Display cities list
    if($count){
        // echo '<option value="">Select city</option>';
        while($row = sqlsrv_fetch_array($run_query)){
            // $asset_serial_no=$row['serialNo'];
            echo '
            <div class="form-row">
            <div class="col-md-6 form-group">
            <label for="firstName">Serial Number</label>
            <input class="form-control" id="other-spec-serial-no" name="other-spec-serial-no" type="text" value="'.$row['serialNo'].'" readonly>';
            ?><?php echo '
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Brand</label>
            <input class="form-control" id="other-spec-brand" name="other-spec-brand" type="text" value="'.$row['brand'].'" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">Model</label>
            <input class="form-control" name="other-spec-model" id="other-spec-model" value="'.$row['model'].'" type="text" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Status</label>
            <input class="form-control" id="other-spec-status" name="other-spec-status" type="text" value="'.$row['status'].'" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">Processor Speed</label>
            <input class="form-control" id="other-spec-processor" name="other-spec-processor" type="text" value="'.$row['processorSpeed'].'" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">RAM</label>
            <input class="form-control" id="other-spec-ram" name="other-spec-ram" value="'.$row['RAM'].'" type="text" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">Storage Type</label>
            <input class="form-control" id="other-spec-storage" name="other-spec-storage" value="'.$row['storage'].'" type="text" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Capacity</label>
            <input class="form-control" id="other-spec-capacity" name="other-spec-capacity" type="text" value="'.$row['capacity'].'" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">MAC Address</label>
            <input class="form-control" id="other-spec-mac" name="other-spec-mac" value="'.$row['macAddress'].'" type="text" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Purchased Year</label>
            <input class="form-control" id="other-spec-purchased-year" name="other-spec-purchased-year" value="'.$row['purchasedYear'].'" type="text" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">CD ROM</label>
            <input class="form-control" id="other-spec-cdrom" name="other-spec-cdrom" value="'.$row['cdRomDrive'].'" type="text" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Operating System</label>
            <input class="form-control" id="other-spec-os" name="other-spec-os" type="text" value="'.$row['os'].'" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">Office Application</label>
            <input class="form-control" id="other-spec-office-app" name="other-spec-office-app" value="'.$row['msOffice'].'" type="text" readonly>
            </div>
            <div class="col-md-6 form-group">
            <label for="firstName">Antivirus</label>
            <input class="form-control" id="other-spec-antivirus" name="other-spec-antivirus" type="text" value="'.$row['antiVirus'].'" readonly>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
            <label for="firstName">PDF Reader</label>
            <input class="form-control" id="other-spec-pdf-reader" name="other-spec-pdf-reader" value="'.$row['pdfReader'].'" type="text" readonly>
            </div>
            </div>            
            ';
        }
    }else{
        echo 'Not available';
    }
}
?>