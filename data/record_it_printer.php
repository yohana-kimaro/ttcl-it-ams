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
    <h5 class="hk-sec-title text-center display-6 mb-4"><strong>Register New Printer</strong></h5>

    <!-------Printer------->
    <div class="row" id="printers">
      <div class="col-sm">
        <form  role="form" method="POST" id="form-record-printer">
          <h5 class="hk-sec-title">Printer's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="printerserialNo">Serial No.</label>
              <input type="text" class="form-control" id="printerserialNo" placeholder="Enter Serial number"  name="printerserialNo" required onBlur="serialNoPrinterAvailability()">
              <span id="printer-availability-serial-no" style="font-size:12px;"></span>
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

  </section>
</div>

<!-- <script src="dist/js/jquery-3.6.0.min.js"></script> -->
<script src="dist/js/jquery.validate.min.js"></script>

<script type="text/javascript">


  $(document).ready(function () {
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
  });
</script>

<script src="./dist/js/check-exist-printer.js"></script>
