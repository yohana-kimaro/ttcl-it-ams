<?php
include("../connection.php");

if(isset($_GET['alloc']) && trim($_GET['alloc']) != "") { 
    $alloc = $_GET['alloc'];
    // $alloc = 'CXB6M000NX';
    // $_SESSION['alloc'] = $alloc;



   $res=sqlsrv_query($conn,"SELECT dev.status,dev.itAssetType,dev.deviceName,dev.purchasedYear,spe.macAddress,dev.brand,dev.model,
    spe.RAM,spe.storage, spe.capacity,spe.cdRomDrive,spe.processorSpeed,softw.os,softw.msOffice,softw.pdfReader,softw.antiVirus
    FROM SOFTWARETB as softw,DEVICETB as dev,SPECIFICATIONSTB as spe
    WHERE dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and dev.serialNo ='$alloc'");
   while($data=sqlsrv_fetch_array($res))
   {

    echo '
    <div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label">Status</label>
    <input class="form-control" id="status" name="status" value="'.$data['status'].'" readonly>
    ';

    ?>




    <?php
    echo '

    </div>
    <div class="form-group col-md-6">
    <label class="control-label">IT Asset Type</label>
    <input type="text" name="assetnumber" value="'.$data['itAssetType'].'" class="form-control" id="assetnumber" readonly>
    </div>
    </div>

    ';
    ?>
    <?php
    echo '

    <div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label">Manufactured Year</label>
    <input type="text" name="manuyear" class="form-control" id="exampleInputManuYear" value="'.$data['purchasedYear'].'" readonly>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label">MAC Address</label>
    <input type="text" name="macaddress" class="form-control" id="exampleInputMACAddress" value="'.$data['macAddress'].'" readonly>
    </div>
    </div>


    ';


    ?>

    <?php

    echo '

    <div class="form-row">
    <div class="col-md-12">
    <h5><b>SYSTEM UNIT</b></h5>
    </div>

    <div class="form-group col-md-6">
    <label class="control-label">Brand</label>
    <input class="form-control" id="exampleFormControlSelectBrand" name="brand" value="'.$data['brand'].'" readonly>
    ';
    ?>



    <?php

    echo '
    </div>
    <div class="form-group col-md-6">
    <label class="control-label">Model</label>
    <input type="text" name="model" class="form-control" id="exampleInputModel" value="'.$data['model'].'" readonly />
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">RAM Size</label>
    <input type="text" name="ram" class="form-control" id="exampleInputRam" value="'.$data['RAM'].'" readonly />
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Storage type</label>
    <input type="text" name="hdd" class="form-control" id="exampleInputHDD" value="'.$data['storage'].'" readonly />
    </div>
    <div class="form-group col-md-4">
    <label class="control-label">Capacity</label>
    <input type="text" name="hdd" class="form-control" id="exampleInputHDD" value="'.$data['capacity'].'" readonly />
    </div>

    ';
    ?>

    <?php
    echo '

    <div class="form-group col-md-4">
    <label class="control-label"="exa>CD ROM Drive</label>
    <input class="form-control" id="exampleFormControlSelectCDROM" name="cdRowDrive" value="'.$data['cdRomDrive'].'" readonly />';
    ?>


    <?php
    echo '
    </div>
    <div class="form-group col-md-12">
    <label class="control-label">Processor Speed</label>
    <input type="text" name="proType" class="form-control" value="'.$data['processorSpeed'].'" readonly />
    </div>
    </div>
    ';

    ?>




    <?php
    echo '
    

    <div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label">Operating System</label>
    <input class="form-control" id="exampleFormControlSelectWindows" name="window" value="'.$data['os'].'" readonly />
    ';
    ?>


    <?php

    echo '

    </div>
    <div class="form-group col-md-6">
    <label class="control-label">MS Office</label>
    <input class="form-control" id="exampleFormControlSelectOffice" name="office" value="'.$data['msOffice'].'" readonly />
    ';
    ?>

    <?php
    echo '
    </div>
    <div class="form-group col-md-6">
    <label class="control-label">PDF Reader</label>
    <input class="form-control" id="exampleFormControlSelectAcrob" value="'.$data['pdfReader'].'" name="acrobatReader" readonly />
    ';
    ?>

    <?php
    echo '
    </div>

    <div class="form-group col-md-6">
    <label class="control-label">Anti Virus</label>
    <input class="form-control" id="exampleFormControlSelectAntiVirus" value="'.$data['antiVirus'].'" name="antiV" readonly />
    
    </div>
    ';
    ?>
    

 

    <?php
    echo '


    </div>


    ';
}



}


if(isset($_GET['dev']) && trim($_GET['dev']) !== ""){
    $dev = $_GET['dev'];

    $records = sqlsrv_query($conn, "SELECT * FROM DEVICETB where allocated='No' and itAssetType = '$dev'");

    echo "<option value=''>Select...</option>";

    while($data = sqlsrv_fetch_array($records))
    {
    // $data = $data;
        // echo "<option value='".$data['serialNo']."'>".$data['serialNo']."</option>";?>

        <option value="<?= $data['serialNo']; ?>"><?= $data['serialNo']; ?></option>


<?php
    }
}
else if(isset($_GET['dev']) && trim($_GET['dev']) === "" ){
    echo "<option value=''>Select...</option>";

 

}

?>





