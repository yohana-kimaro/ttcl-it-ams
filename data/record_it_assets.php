<?php 
require_once('../class/StaffDetails.php');
require_once('../class/AssetsRegister.php');
require_once('../class/RequestReason.php');
require_once('../class/DeviceRequested.php');

$device_os = $assets_brands->all_assets_os();
$device_brands = $assets_brands->all_assets_brands();
$device_status = $assets_brands->all_assets_status();
$device_cdrom = $assets_brands->all_device_cdrom();
$device_storage = $assets_brands->all_device_storage();
$device_capacity = $assets_brands->all_device_capacity();
$device_pdfreader = $assets_brands->all_assets_pdfreader();
$staff_det = $staff_details->all_staff_details();
$reasons_req = $reason_request->all_request_reason();
$devices_req = $devices_requested->all_devices_requested(); 
?>


<div class="">
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title text-center display-6 mb-4"><strong>Register IT Assets</strong></h5>

    <?php
    if(isset($_SESSION['insert'])){
      if ($_SESSION['insert'] == 1) {
        // unset($_SESSION['pokea']);
        $_SESSION['insert'] = 0;
        echo '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span> New asset recorded successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      if ($_SESSION['insert'] == 2) {
        // unset($_SESSION['pokea']);
        $_SESSION['insert'] = 0;
        echo '<div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> New asset not recorded.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }

      if ($_SESSION['insert'] == 3) {
      // unset($_SESSION['pokea']);
        $_SESSION['insert'] = 0;
        echo '<div class="alert alert-inv alert-inv-secondary alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-notifications-active"></i></span> Asset already exist in database
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
      }
    } 

    if(isset($_SESSION['record_asset'])){
      if ($_SESSION['record_asset'] == 1) { 
      // unset($_SESSION['pokea']);
        $_SESSION['record_asset'] = 0;
        echo '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>New asset recorded successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      } 
      if ($_SESSION['record_asset'] == 2) {
      // unset($_SESSION['pokea']);
        $_SESSION['record_asset'] = 0;
        echo '<div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> New asset not recorded.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
      } 
    } 
    ?>

    <div class="row">
      <div class="col-sm">
        <div class="form-row">
          <div class="form-group col-md-4 mb-10">
            <label for="assetsType">Choose IT Asset type</label>
            <select class="form-control" id="assetsType" name="assetsType" onchange="showDiv(this)" required>
              <option value="">Select..</option>
              <?php foreach($devices_req as $t1): ?>
                <option value="<?= $t1['deviceType']; ?>"><?= $t1['deviceType']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-------Desktop------->
    <div class="row" id="desktops" style="display: none;">
      <div class="col-sm">
        <form  role="form" id="form-record-desktop" method="POST">
          <h5 class="hk-sec-title">Desktop's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="desktopserialNo">Serial No.</label>
              <input type="text" class="form-control" id="desktopserialNo" placeholder="Enter Serial number"  name="desktopserialNo" required  onBlur="serialNoAvailability()">
              <span id="serialno-availability-serial-no" style="font-size:12px;"></span>
            </div>
            <input type="hidden" class="form-control form-control-user" id="desktopassetsType"  name="desktopassetsType" value="Desktop" readonly>
            <input type="hidden" class="form-control form-control-user" id="desktopdeviceOwnership"  name="desktopdeviceOwnership" value="Personal" readonly>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopbrand">Brand</label>
              <select class="form-control" name="desktopbrand" id="desktopbrand" required>
                <option value="">Select..</option>
                <?php foreach($device_brands as $t1): ?>
                  <option value="<?= $t1['computerType']; ?>"><?= $t1['computerType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopmodel">Model</label>
              <input type="text" class="form-control" id="desktopmodel" placeholder="Eg. Latitude E5420" name="desktopmodel" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopstatus">Status</label>
              <select class="form-control" name="desktopstatus" id="desktopstatus" required>
                <option value="">Select..</option>
                <?php foreach($device_status as $t3): ?>
                  <option value="<?= $t3['deviceStatus']; ?>"><?= $t3['deviceStatus']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="desktopprocessor">Processor speed</label>
              <input type="text" class="form-control" id="desktopprocessor" placeholder="Eg. 1.7 GHz" name="desktopprocessor" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopram">RAM</label>
              <input type="text" class="form-control" id="desktopram" name="desktopram" placeholder="Eg. 4GB" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopstorage">Storage type</label>
              <select class="form-control" name="desktopstorage" id="desktopstorage" required>
                <option value="">Select..</option>
                <?php foreach($device_storage as $t4): ?>
                  <option value="<?= $t4['storageType']; ?>"><?= $t4['storageType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopcapacity">Capacity</label>
              <select class="form-control" name="desktopcapacity" id="desktopcapacity" required>
                <option value="">Select..</option>
                <?php foreach($device_capacity as $t5): ?>
                  <option value="<?= $t5['deviceCap']; ?>"><?= $t5['deviceCap']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="desktopmac">MAC address</label>
              <input type="text" class="form-control" id="desktopmac" placeholder="Eg. 129:8:90:1:09:1" name="desktopmac" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopyear">Purchased year</label>
              <input type="text" class="form-control" id="desktopyear" name="desktopyear" placeholder="Eg. 2010" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopcdRom">CD-ROM Drive</label>
              <select class="form-control" name="desktopcdRom" id="desktopcdRom" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t6): ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopos">Operating System</label>
              <select class="form-control" name="desktopos" id="desktopos" required>
                <option value="">Select..</option>
                <?php foreach($device_os as $t7): ?>
                  <option value="<?= $t7['deviceOS']; ?>"><?= $t7['deviceOS']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="desktopofficeApp">Office applications</label>
              <select class="form-control" name="desktopofficeApp" id="desktopofficeApp" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t6): ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktopanti">Antivirus</label>
              <select class="form-control" name="desktopanti" id="desktopanti" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t8): ?>
                  <option value="<?= $t8['onOff']; ?>"><?= $t8['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="desktoppdfReader">PDF Reader</label>
              <select class="form-control" name="desktoppdfReader" id="desktoppdfReader" required>
                <option value="">Select..</option>
                <?php foreach($device_pdfreader as $t61): ?>
                  <option value="<?= $t61['pdfReader']; ?>"><?= $t61['pdfReader']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" value="add" id="btn_record_desktop" name="btn_record_desktop" class="btn btn-dark float-end">Record</button>
          </div>
        </form>
      </div>
    </div>

    <!-------Laptop------->
    <div class="row" id="laptops" style="display: none;">
      <div class="col-sm">
        <form  role="form" id="form-record-laptop" method="POST">
          <h5 class="hk-sec-title">Laptop's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="laptopserialNo">Serial No.</label>
              <input type="text" class="form-control" id="laptopserialNo" placeholder="Enter Serial number"  name="laptopserialNo" required onBlur="serialNoLapAvailability()">
              <span id="laptop-availability-serial-no" style="font-size:12px;"></span>
            </div>
            <input type="hidden" class="form-control form-control-user" id="laptopassetsType"  name="laptopassetsType" value="Laptop" readonly>
            <input type="hidden" class="form-control form-control-user" id="laptopdeviceOwnership"  name="laptopdeviceOwnership" value="Personal" readonly>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopbrand">Brand</label>
              <select class="form-control" name="laptopbrand" id="laptopbrand" required>
                <option value="">Select..</option>
                <?php foreach($device_brands as $t1): ?>
                  <option value="<?= $t1['computerType']; ?>"><?= $t1['computerType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopmodel">Model</label>
              <input type="text" class="form-control" id="laptopmodel" placeholder="Eg. Latitude E5420" name="laptopmodel" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopstatus">Status</label>
              <select class="form-control" name="laptopstatus" id="laptopstatus" required>
                <option value="">Select..</option>
                <?php foreach($device_status as $t3): ?>
                  <option value="<?= $t3['deviceStatus']; ?>"><?= $t3['deviceStatus']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="laptopprocessor">Processor speed</label>
              <input type="text" class="form-control" id="laptopprocessor" placeholder="Eg. 1.7 GHz" name="laptopprocessor" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopram">RAM</label>
              <input type="text" class="form-control" id="laptopram" name="laptopram" placeholder="Eg. 4GB" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopstorage">Storage type</label>
              <select class="form-control" name="laptopstorage" id="laptopstorage" required>
                <option value="">Select..</option>
                <?php foreach($device_storage as $t4): ?>
                  <option value="<?= $t4['storageType']; ?>"><?= $t4['storageType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopcapacity">Capacity</label>
              <select class="form-control" name="laptopcapacity" id="laptopcapacity" required>
                <option value="">Select..</option>
                <?php foreach($device_capacity as $t5): ?>
                  <option value="<?= $t5['deviceCap']; ?>"><?= $t5['deviceCap']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="laptopmac">MAC address</label>
              <input type="text" class="form-control" id="laptopmac" placeholder="Eg. 129:8:90:1:09:1" name="laptopmac" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopyear">Purchased year</label>
              <input type="text" class="form-control" id="laptopyear" name="laptopyear" placeholder="Eg. 2010" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopcdRom">CD-ROM Drive</label>
              <select class="form-control" name="laptopcdRom" id="laptopcdRom" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t6): ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopos">Operating System</label>
              <select class="form-control" name="laptopos" id="laptopos" required>
                <option value="">Select..</option>
                <?php foreach($device_os as $t7): ?>
                  <option value="<?= $t7['deviceOS']; ?>"><?= $t7['deviceOS']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="laptopofficeApp">Office applications</label>
              <select class="form-control" name="laptopofficeApp" id="laptopofficeApp" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t6): ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptopanti">Antivirus</label>
              <select class="form-control" name="laptopanti" id="laptopanti" required>
                <option value="">Select..</option>
                <?php foreach($device_cdrom as $t8): ?>
                  <option value="<?= $t8['onOff']; ?>"><?= $t8['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="laptoppdfReader">PDF Reader</label>
              <select class="form-control" name="laptoppdfReader" id="laptoppdfReader" required>
                <option value="">Select..</option>
                <?php foreach($device_pdfreader as $t61): ?>
                  <option value="<?= $t61['pdfReader']; ?>"><?= $t61['pdfReader']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" value="add" id="btn_record_laptop" name="btn_record_laptop" class="btn btn-dark float-end">Record</button>
          </div>
        </form>
      </div>
    </div>

    <!-------Printer------->
    <div class="row" id="printers" style="display: none;">
      <div class="col-sm">
        <form  role="form" method="POST" id="form-record-printer">
          <h5 class="hk-sec-title">Printer's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="printerserialNo">Serial No.</label>
              <input type="text" class="form-control" id="printerserialNo" placeholder="Enter Serial number"  name="printerserialNo" required onBlur="sernialNo3Availability()">
              <span id="user-availability-serial-no3" style="font-size:12px;"></span>
            </div>
            <input type="hidden" class="form-control form-control-user" id="printerassetsType"  name="printerassetsType" value="Printer" readonly>
            <input type="hidden" class="form-control form-control-user" id="printerdeviceOwnership"  name="printerdeviceOwnership" value="Personal" readonly>
            <div class="form-group col-md-3 mb-10">
              <label for="printerbrand">Brand</label>
              <select class="form-control" name="printerbrand" id="printerbrand" required>
                <option value="">Select..</option>
                <?php foreach($device_brands as $t1): ?>
                  <option value="<?= $t1['computerType']; ?>"><?= $t1['computerType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="printermodel">Model</label>
              <input type="text" class="form-control" id="printermodel" placeholder="Eg. Latitude E5420" name="printermodel" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="printerstatus">Status</label>
              <select class="form-control" name="printerstatus" id="printerstatus" required>
                <option value="">Select..</option>
                <?php foreach($device_status as $t3): ?>
                  <option value="<?= $t3['deviceStatus']; ?>"><?= $t3['deviceStatus']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="printermac">MAC address</label>
              <input type="text" class="form-control" id="printermac" placeholder="Eg. 129:8:90:1:09:1" name="printermac" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="printeryear">Purchased year</label>
              <input type="text" class="form-control" id="printeryear" name="printeryear" placeholder="Eg. 2010" required>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" value="add" id="btn_record_printer" name="btn_record_printer" class="btn btn-dark float-end">Record</button>
          </div>
        </form>
      </div>
    </div>

    <!-------Scanner------->
    <div class="row" id="scanners" style="display: none;">
      <div class="col-sm">
        <form  role="form" method="POST" id="form-record-scanner">
          <h5 class="hk-sec-title">Scanner's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="scannerserialNo">Serial No.</label>
              <input type="text" class="form-control" id="scannerserialNo" placeholder="Enter Serial number"  name="scannerserialNo" required onBlur="sernialNo4Availability()">
              <span id="user-availability-serial-no4" style="font-size:12px;"></span>
            </div>
            <input type="hidden" class="form-control form-control-user" id="scannerassetsType"  name="scannerassetsType" value="Scanner" readonly>
            <input type="hidden" class="form-control form-control-user" id="scannerdeviceOwnership"  name="scannerdeviceOwnership" value="Personal" readonly>
            <div class="form-group col-md-3 mb-10">
              <label for="scannerbrand">Brand</label>
              <select class="form-control" name="scannerbrand" id="scannerbrand" required>
                <option value="">Select..</option>
                <?php foreach($device_brands as $t1): ?>
                  <option value="<?= $t1['computerType']; ?>"><?= $t1['computerType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="scannermodel">Model</label>
              <input type="text" class="form-control" id="scannermodel" placeholder="Eg. Latitude E5420" name="scannermodel" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="scannerstatus">Status</label>
              <select class="form-control" name="scannerstatus" id="scannerstatus" required>
                <option value="">Select..</option>
                <?php foreach($device_status as $t3): ?>
                  <option value="<?= $t3['deviceStatus']; ?>"><?= $t3['deviceStatus']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="scannermac">MAC address</label>
              <input type="text" class="form-control" id="scannermac" placeholder="Eg. 129:8:90:1:09:1" name="scannermac" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="scanneryear">Purchased year</label>
              <input type="text" class="form-control" id="scanneryear" name="scanneryear" placeholder="Eg. 2010" required>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" value="add" id="btn_record_scanner" name="btn_record_scanner" class="btn btn-dark float-end">Record</button>
          </div>
        </form>
      </div>
    </div>


  </section>
</div>

<!-- <script src="dist/js/jquery-3.6.0.min.js"></script> -->
<script src="dist/js/jquery.validate.min.js"></script>

<script type="text/javascript">

  function showDiv(select){
    if(select.value == "Desktop"){
      document.getElementById('desktops').style.display = "block";
      document.getElementById('laptops').style.display = "none";
      document.getElementById('printers').style.display = "none";
      document.getElementById('scanners').style.display = "none";
    }else if(select.value == "Laptop"){
      document.getElementById('laptops').style.display = "block";
      document.getElementById('desktops').style.display = "none";
      document.getElementById('scanners').style.display = "none";
      document.getElementById('printers').style.display = "none";
    }else if(select.value == "Printer"){
      document.getElementById('printers').style.display = "block";
      document.getElementById('desktops').style.display = "none";
      document.getElementById('laptops').style.display = "none";
      document.getElementById('scanners').style.display = "none";
    }else if(select.value == "Scanner"){
      document.getElementById('scanners').style.display = "block";
      document.getElementById('printers').style.display = "none";
      document.getElementById('desktops').style.display = "none";
      document.getElementById('laptops').style.display = "none";
    }else{
      document.getElementById('scanners').style.display = "none";
      document.getElementById('printers').style.display = "none";
      document.getElementById('desktops').style.display = "none";
      document.getElementById('laptops').style.display = "none";
    }
  }


  $(document).ready(function () {
    $('#form-record-desktop').validate({
      rules: {
        desktopserialNo: {
          required: true
        },
        desktopassetsType: {
          required: true
        },
        desktopbrand: {
          required: true
        },
        desktopstatus: {
          required: true
        },
        desktopprocessor: {
          required: true
        },
        desktopram: {
          required: true
        },
        desktopstorage: {
          required: true
        },
        desktopcapacity: {
          required: true
        },
        desktopmac: {
          required: true
        },
        desktopyear: {
          required: true
        },
        desktopcdRom: {
          required: true
        },
        desktopos: {
          required: true
        },
        desktopmodel: {
          required: true
        },
        desktopanti: {
          required: true
        },
        desktopterms: {
          required: true
        },
        desktopramsize: {
          required: true
        },
        desktophddsize: {
          required: true
        },
        desktopterms: {
          required: true
        },
        desktopofficeSelect: {
          required: true
        },
        desktopregionSelect: {
          required: true
        },
        desktopreasonSelect: {
          required: true
        },
        desktopyear: {
          required: true
        },
        desktopofficeApp: {
          required: true
        },
        desktoppdfReader: {
          required: true
        }
      },
      messages: {
        desktopserialNo: {
          required: "Please enter serial number"
        },
        desktopassetsType: {
          required: "Please select asset type"
        },
        desktopstatus: {
          required: "Please select device status"
        },
        desktopprocessor: {
          required: "Please enter processor speed"
        },
        desktopram: {
          required: "Please enter RAM size"
        },
        desktopstorage: {
          required: "Please select type of storage"
        },
        desktopcapacity: {
          required: "Please select capacity size"
        },
        desktopmac: {
          required: "Please enter MAC address"
        },
        desktopyear: {
          required: "Please enter purchased year"
        },
        desktoppfno: {
          required: "Please enter PF Number",
          pfno: "Please enter a vaild PF Number"
        },
        desktopbrand: {
          required: "Please select brand name"
        },
        desktopcdRom: {
          required: "Please choose selection for CD-ROM"
        },
        desktopos: {
          required: "Please select operating system"
        },
        desktopanti: {
          required: "Please select selection for anti-virus"
        },
        desktopnewreqjustification: {
          required: "Enter new device justification"
        },
        desktopofficeApp: {
          required: "Please select office application"
        },
        desktoppdfReader: {
          required: "Please select pdf reader"
        },
        desktopmodel: {
          required: "Please enter model"
        },
        desktopramsize: {
          required: "Please enter RAM size"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    
    $('#form-record-laptop').validate({
      rules: {
        laptopserialNo: {
          required: true
        },
        laptopassetsType: {
          required: true
        },
        laptopbrand: {
          required: true
        },
        laptopstatus: {
          required: true
        },
        laptopprocessor: {
          required: true
        },
        laptopram: {
          required: true
        },
        laptopstorage: {
          required: true
        },
        laptopcapacity: {
          required: true
        },
        laptopmac: {
          required: true
        },
        laptopyear: {
          required: true
        },
        laptopcdRom: {
          required: true
        },
        laptopos: {
          required: true
        },
        laptopmodel: {
          required: true
        },
        laptopanti: {
          required: true
        },
        laptopterms: {
          required: true
        },
        laptopramsize: {
          required: true
        },
        laptophddsize: {
          required: true
        },
        laptopterms: {
          required: true
        },
        laptopofficeSelect: {
          required: true
        },
        laptopregionSelect: {
          required: true
        },
        laptopreasonSelect: {
          required: true
        },
        laptopyear: {
          required: true
        },
        laptopofficeApp: {
          required: true
        },
        laptoppdfReader: {
          required: true
        }
      },
      messages: {
        laptopserialNo: {
          required: "Please enter serial number"
        },
        laptopassetsType: {
          required: "Please select asset type"
        },
        laptopstatus: {
          required: "Please select device status"
        },
        laptopprocessor: {
          required: "Please enter processor speed"
        },
        laptopram: {
          required: "Please enter RAM size"
        },
        laptopstorage: {
          required: "Please select type of storage"
        },
        laptopcapacity: {
          required: "Please select capacity size"
        },
        laptopmac: {
          required: "Please enter MAC address"
        },
        laptopyear: {
          required: "Please enter purchased year"
        },
        laptoppfno: {
          required: "Please enter PF Number",
          pfno: "Please enter a vaild PF Number"
        },
        laptopbrand: {
          required: "Please select brand name"
        },
        laptopcdRom: {
          required: "Please choose selection for CD-ROM"
        },
        laptopos: {
          required: "Please select operating system"
        },
        laptopanti: {
          required: "Please select selection for anti-virus"
        },
        laptopnewreqjustification: {
          required: "Enter new device justification"
        },
        laptopofficeApp: {
          required: "Please select office application"
        },
        laptoppdfReader: {
          required: "Please select pdf reader"
        },
        laptopmodel: {
          required: "Please enter model"
        },
        laptopramsize: {
          required: "Please enter RAM size"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    
    $('#form-record-printer').validate({
      rules: {
        printerserialNo: {
          required: true
        },
        printerassetsType: {
          required: true
        },
        printerbrand: {
          required: true
        },
        printerstatus: {
          required: true
        },
        printermac: {
          required: true
        },
        printeryear: {
          required: true
        },
        printermodel: {
          required: true
        }
      },
      messages: {
        printerserialNo: {
          required: "Please enter serial number"
        },
        printerassetsType: {
          required: "Please select asset type"
        },
        printerstatus: {
          required: "Please select device status"
        },
        printermac: {
          required: "Please enter MAC address"
        },
        printeryear: {
          required: "Please enter purchased year"
        },
        printerbrand: {
          required: "Please select brand name"
        },
        printermodel: {
          required: "Please enter model"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    $('#form-record-scanner').validate({
      rules: {
        scannerserialNo: {
          required: true
        },
        scannerassetsType: {
          required: true
        },
        scannerbrand: {
          required: true
        },
        scannerstatus: {
          required: true
        },
        scannermac: {
          required: true
        },
        scanneryear: {
          required: true
        },
        scannermodel: {
          required: true
        }
      },
      messages: {
        scannerserialNo: {
          required: "Please enter serial number"
        },
        scannerassetsType: {
          required: "Please select asset type"
        },
        scannerstatus: {
          required: "Please select device status"
        },
        scannermac: {
          required: "Please enter MAC address"
        },
        scanneryear: {
          required: "Please enter purchased year"
        },
        scannerbrand: {
          required: "Please select brand name"
        },
        scannermodel: {
          required: "Please enter model"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

<script src="./dist/js/check-exist.js"></script>
