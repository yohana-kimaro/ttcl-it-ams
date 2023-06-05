<?php 
require_once('../class/StaffDetails.php');
require_once('../class/RequestReason.php');
require_once('../class/DeviceRequested.php');

$staff_det = $staff_details->all_staff_details();
$reasons_req = $reason_request->all_request_reason();
$devices_req = $devices_requested->all_devices_requested();
?>


<div class="">
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title text-center display-6 mb-4"><strong>IT Assets request form</strong></h5>
    <?php
    if(isset($_SESSION['insert'])){
      if ($_SESSION['insert'] == 1) {
        $_SESSION['insert'] = 0;
        echo '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span> Your request has been sent successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      if ($_SESSION['insert'] == 2) {
        $_SESSION['insert'] = 0;
        echo '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Your request has not been sent.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    }
    ?>
    <div class="row">
      <div class="col-sm">
        <form  role="form" id="requestForm" action="insert.php" method="POST" enctype="multipart/form-data">
          <h5 class="hk-sec-title">1. Applicant's Details.</h5>
          <?php foreach($staff_det as $t11): ?>
            <div class="form-row">
              <div class="col-md-4 mb-10">
                <label for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?= $t11['firstName']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="mname">Middle name</label>
                <input type="text" class="form-control" id="mname" name="mname" value="<?= $t11['middleName']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?= $t11['lastName']; ?>" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-10">
                <label for="pfno">Staff PF number</label>
                <input type="text" class="form-control" id="pfno" name="pfno" value="<?= $t11['pfNumber']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?= $t11['Designation']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="<?= $t11['Department']; ?>" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-10">
                <label for="officeSelect">Office building location</label>
                <input type="text" class="form-control" id="officeSelect" name="officeSelect" value="<?= $t11['Location']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="regionSelect">Region</label>
                <input type="text" class="form-control" id="regionSelect" name="regionSelect" value="<?= $t11['Region']; ?>" readonly>
              </div>
              <div class="col-md-4 mb-10">
                <label for="dManager">Direct manager</label>
                <input type="text" class="form-control" id="dManager" name="dManager" value="<?= $t11['directManager']; ?>" readonly>
              </div>
            </div>
          <?php endforeach; ?>
          <h5 class="hk-sec-title mt-4">2. Device Requested.</h5>
          <div class="form-row">
            <div class="form-group col-md-4 mb-10">
              <label for="itemType">IT Asset type</label>
              <select class="form-control" id="itemType" name="itemType" required>
                <option value="">Select..</option>
                <?php foreach($devices_req as $t1): ?>
                  <option value="<?= $t1['deviceType']; ?>"><?= ucwords($t1['deviceType']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-10">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="5" required>
            </div>
          </div>
          <h5 class="hk-sec-title mt-4">3. Reason.</h5>
          <div class="form-row">
            <div class="form-group col-md-3 mb-10">
              <label for="reasonSelect">Reason for request</label>
              <select  class="form-control" id="reasonSelect" onchange="showDiv(this)"  name="reasonSelect" required>
                <option value="">Select</option>
                <?php foreach($reasons_req as $t12): ?>
                  <option value="<?= $t12['reasonName']; ?>"><?= $t12['reasonName']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-10" id="lost" style="display: none;">
              <label for="lostRep">Attach a loss report <em>(pdf/jpg/png)</em> max 2MB</label>
              <input type="file" class="form-control" id="lostRep" name="lostRep" data-max-file-size="2M" accept=".pdf,.jpg,.jpeg,.png," required>
              <span id="error-message-loss-report" class="validation-error-label"></span>
            </div>
            <div class="form-group col-md-7 mb-10" id="replacement" style="display: none;">
              <label for="replacement2">Justification <em> (150 characters)</em></label>
              <textarea class="form-control" id="replacement2" name="replacement2" rows="4" placeholder="Why replacement"  required="required" maxlength="150"></textarea>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" name="submit-request" id="submit-request" class="btn btn-dark float-end">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  document.getElementById("lostRep").addEventListener("change", validateFile)
      function validateFile(){
        const allowedExtensions =  ['jpg','jpeg','pdf','png'],
        sizeLimit = 2_000_000; // 1 megabyte
        // destructuring file name and size from file object
        const { name:fileName, size:fileSize } = this.files[0];
        const fileExtension = fileName.split(".").pop();

        if(!allowedExtensions.includes(fileExtension)){
          alert("File type not allowed. Please upload only jpg, jpeg, png or pdf files");
          this.value = null;
        }else if(fileSize > sizeLimit){
          alert("File size too large. (Maximum size is 2MB)")
          this.value = null;
        }
      }
</script>
<script src="dist/js/jquery.validate.min.js"></script>
<script src="dist/js/requests-verification.js"></script>