<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?> 


<!-- Modal forms-->
<div class="modal fade" id="modal-staff-toner-requ-rej-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm">
                    <form  method="post" id="form-reject-staff-toner-requ">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rej-id" name="staff-staff-toner-requ-rej-id" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rej-pfnamba" name="staff-staff-toner-requ-rej-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rej-qty" name="staff-staff-toner-requ-rej-qty" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rej-mod" name="staff-staff-toner-requ-rej-mod" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rej-text" name="staff-staff-toner-requ-rej-text" value="Rejected" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Department</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Toner Model</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-model"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-requ-rej-quantity"></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="staffRejectJustifica">Rejection justification <em>(100 characters)</em></label>
                                    <textarea class="form-control" id="staff-staff-toner-requ-justif" required name="staff-staff-toner-requ-justif" rows="3" placeholder="Provide a justification for rejecting this request by entering some meaningful text" maxlength="100"></textarea>
                            </div>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rejected-by" name="staff-staff-toner-requ-rejected-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-requ-rejected-on" name="staff-staff-toner-requ-rejected-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-staff-toner-requ-rej" name="submit-staff-toner-requ-rej">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>