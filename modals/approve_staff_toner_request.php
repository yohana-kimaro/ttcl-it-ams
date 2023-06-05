<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-staff-toner-req-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-approve-staff-toner-req">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-staff-toner-req-approve-id" name="staff-staff-toner-req-approve-id" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-req-approve-pfnamba" name="staff-staff-toner-req-approve-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-req-approve-text" name="staff-staff-toner-req-approve-text" value="Toner cartridge request approved" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Department</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Toner Model</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-model"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-staff-toner-req-quantity"></h6>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="staff-staff-toner-req-approved-by" name="staff-staff-toner-req-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-staff-toner-req-approved-on" name="staff-staff-toner-req-approved-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-staff-toner-req-approve" name="submit-staff-toner-req-approve">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>