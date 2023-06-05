<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?> 

<div class="modal fade" id="modal-reject-acceptance-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="form-reject-acceptance" method="post">
        <div class="modal-body">
          <input type="hidden" id="acceptance-reject-id" class="form-control" />
          <input type="hidden" id="rejected-acceptance-name" value="No" class="form-control" />
          <div class="form-group form-inline row">
            <label for="staffFullName" class="col-sm-4 col-form-label">Staff Full Name</label>
            <div class="col-sm-8">
              <h6 class="staff-it-asset-attached-rej-fullname"></h6>
            </div>
          </div>
          <div class="form-group form-inline row">
            <label for="staffDesignat" class="col-sm-4">Designation</label>
            <div class="col-sm-8">
              <h6 class="staff-it-asset-attached-rej-designation"></h6>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Rejection comment</label>
            <textarea id="acceptRejectionJustif" required class="form-control" placeholder="Justify the reason for rejecting this acceptance form"></textarea>
          </div>
          <!-- <div class="form-group"> -->
            <!-- <label for="exampleDropdownFormPassword1">Rejected date and time</label> -->
            <input type="hidden" class="form-control" id="itAcceptanceRejectedTime" value="<?= date('d-m-Y H:i:s'); ?>" readonly>
          <!-- </div> -->
          <!-- <div class="form-group"> -->
            <!-- <label for="exampleDropdownFormPassword1">Rejected by</label> -->
            <input type="hidden" class="form-control" id="acceptanceRejectedBy" value="<?php echo $_SESSION['username@ttclassetsystem']; ?>" readonly>
          <!-- </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" id="submit-reject-acceptance" value="add" class="btn btn-success">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>