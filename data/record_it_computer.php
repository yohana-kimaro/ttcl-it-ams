<?php
require_once('../class/StaffDetails.php');
require_once('../class/AssetsRegister.php');
require_once('../class/RequestReason.php');
require_once('../class/DeviceRequested.php');
require_once('../class/ComputerTypes.php');

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


$comp_type = $computer_type->all_computer_types();

?>


<div class="">
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title text-center display-6 mb-4"><strong>Register New Computer</strong></h5>

    <!-------Computer------->
    <div class="row" id="computers">
      <div class="col-sm">
        <form role="form" id="form-record-computer" method="POST">
          <h5 class="hk-sec-title">Computer's details.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="computerstatus">Computer Type</label>
              <select class="form-control" name="computertype" id="computertype" required>
                <option value="">Select..</option>
                <?php foreach ($comp_type as $ctyp) : ?>
                  <option value="<?= $ctyp['computerName']; ?>"><?= $ctyp['computerName']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computerserialNo">Serial No.</label>
              <input type="text" class="form-control" id="computerserialNo" placeholder="Enter Serial number" name="computerserialNo" required onBlur="serialNoAvailability()">
              <span id="serialno-availability-serial-no" style="font-size:12px;"></span>
            </div>
            <input type="hidden" class="form-control form-control-user" id="computerdeviceOwnership" name="computerdeviceOwnership" value="Personal" readonly>
            <div class="form-group col-md-3 mb-10">
              <label for="computerbrand">Brand</label>
              <select class="form-control" name="computerbrand" id="computerbrand" required>
                <option value="">Select..</option>
                <?php foreach ($device_brands as $t1) : ?>
                  <option value="<?= $t1['computerType']; ?>"><?= $t1['computerType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computermodel">Model</label>
              <input type="text" class="form-control" id="computermodel" placeholder="Eg. Latitude E5420" name="computermodel" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="computerprocessor">Processor speed</label>
              <input type="text" class="form-control" id="computerprocessor" placeholder="Eg. 1.7 GHz" name="computerprocessor" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computerram">RAM</label>
              <input type="text" class="form-control" id="computerram" name="computerram" placeholder="Eg. 4GB" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computerstorage">Storage type</label>
              <select class="form-control" name="computerstorage" id="computerstorage" required>
                <option value="">Select..</option>
                <?php foreach ($device_storage as $t4) : ?>
                  <option value="<?= $t4['storageType']; ?>"><?= $t4['storageType']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computercapacity">Capacity</label>
              <select class="form-control" name="computercapacity" id="computercapacity" required>
                <option value="">Select..</option>
                <?php foreach ($device_capacity as $t5) : ?>
                  <option value="<?= $t5['deviceCap']; ?>"><?= $t5['deviceCap']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="computermac">MAC address</label>
              <input type="text" class="form-control" id="computermac" placeholder="Eg. 129:8:90:1:09:1" name="computermac" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computeryear">Purchased year</label>
              <input type="text" class="form-control" id="computeryear" name="computeryear" placeholder="Eg. 2010" required>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computercdRom">CD-ROM Drive</label>
              <select class="form-control" name="computercdRom" id="computercdRom" required>
                <option value="">Select..</option>
                <?php foreach ($device_cdrom as $t6) : ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computeros">Operating System</label>
              <select class="form-control" name="computeros" id="computeros" required>
                <option value="">Select..</option>
                <?php foreach ($device_os as $t7) : ?>
                  <option value="<?= $t7['deviceOS']; ?>"><?= $t7['deviceOS']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="computerofficeApp">Office applications</label>
              <select class="form-control" name="computerofficeApp" id="computerofficeApp" required>
                <option value="">Select..</option>
                <?php foreach ($device_cdrom as $t6) : ?>
                  <option value="<?= $t6['onOff']; ?>"><?= $t6['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computeranti">Antivirus</label>
              <select class="form-control" name="computeranti" id="computeranti" required>
                <option value="">Select..</option>
                <?php foreach ($device_cdrom as $t8) : ?>
                  <option value="<?= $t8['onOff']; ?>"><?= $t8['onOff']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3 mb-10">
              <label for="computerpdfReader">PDF Reader</label>
              <select class="form-control" name="computerpdfReader" id="computerpdfReader" required>
                <option value="">Select..</option>
                <?php foreach ($device_pdfreader as $t61) : ?>
                  <option value="<?= $t61['pdfReader']; ?>"><?= $t61['pdfReader']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>            
            <div class="form-group col-md-3 mb-10">
              <label for="computerstatus">Status</label>
              <select class="form-control" name="computerstatus" id="computerstatus" required>
                <option value="">Select..</option>
                <?php foreach ($device_status as $t3) : ?>
                  <option value="<?= $t3['deviceStatus']; ?>"><?= $t3['deviceStatus']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" value="add" id="btn_record_computer" name="btn_record_computer" class="btn btn-dark float-end">Record</button>
          </div>
        </form>
      </div>
    </div>


  </section>
</div>

<!-- <script src="dist/js/jquery-3.6.0.min.js"></script> -->
<script src="dist/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#form-record-computer').validate({
      rules: {
        computerserialNo: {
          required: true
        },
        computerassetsType: {
          required: true
        },
        computerbrand: {
          required: true
        },
        computerstatus: {
          required: true
        },
        computerprocessor: {
          required: true
        },
        computerram: {
          required: true
        },
        computerstorage: {
          required: true
        },
        computercapacity: {
          required: true
        },
        computermac: {
          required: true
        },
        computeryear: {
          required: true
        },
        computercdRom: {
          required: true
        },
        computeros: {
          required: true
        },
        computermodel: {
          required: true
        },
        computeranti: {
          required: true
        },
        computerterms: {
          required: true
        },
        computerramsize: {
          required: true
        },
        computerhddsize: {
          required: true
        },
        computerterms: {
          required: true
        },
        computerofficeSelect: {
          required: true
        },
        computerregionSelect: {
          required: true
        },
        computerreasonSelect: {
          required: true
        },
        computeryear: {
          required: true
        },
        computerofficeApp: {
          required: true
        },
        computerpdfReader: {
          required: true
        },
        computertype:{
          required: true
        }
      },
      messages: {
        computerserialNo: {
          required: "Please enter serial number"
        },
        computerassetsType: {
          required: "Please select asset type"
        },
        computerstatus: {
          required: "Please select device status"
        },
        computerprocessor: {
          required: "Please enter processor speed"
        },
        computerram: {
          required: "Please enter RAM size"
        },
        computerstorage: {
          required: "Please select type of storage"
        },
        computercapacity: {
          required: "Please select capacity size"
        },
        computermac: {
          required: "Please enter MAC address"
        },
        computeryear: {
          required: "Please enter purchased year"
        },
        computerpfno: {
          required: "Please enter PF Number",
          pfno: "Please enter a vaild PF Number"
        },
        computerbrand: {
          required: "Please select brand name"
        },
        computercdRom: {
          required: "Please choose selection for CD-ROM"
        },
        computeros: {
          required: "Please select operating system"
        },
        computeranti: {
          required: "Please select selection for anti-virus"
        },
        computernewreqjustification: {
          required: "Enter new device justification"
        },
        computerofficeApp: {
          required: "Please select office application"
        },
        computerpdfReader: {
          required: "Please select pdf reader"
        },
        computermodel: {
          required: "Please enter model"
        },
        computerramsize: {
          required: "Please enter RAM size"
        },
        computertype: {
          required: "Please select computer type"
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

  });
</script>

<script src="./dist/js/check-exist.js"></script>