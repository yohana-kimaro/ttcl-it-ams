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
    <h5 class="hk-sec-title text-center display-6 mb-4"><strong>Register New Scanner</strong></h5>

    <!-------Scanner------->
    <div class="row" id="scanners">
      <div class="col-sm">
        <form  role="form" method="POST" id="form-record-scanner">
          <h5 class="hk-sec-title">Scanner's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="scannerserialNo">Serial No.</label>
              <input type="text" class="form-control" id="scannerserialNo" placeholder="Enter Serial number"  name="scannerserialNo" required onBlur="serialNoScannerAvailability()">
              <span id="scanner-availability-serial-no" style="font-size:12px;"></span>
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

  $(document).ready(function () {  
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

<script src="./dist/js/check-exist-scanner.js"></script>
