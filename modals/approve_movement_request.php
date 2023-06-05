<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-movement-staff-req-itss-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-approve-movement-staff-req-itss">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approve-id" name="staff-movement-staff-req-itss-approve-id" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approve-serialno" name="staff-movement-staff-req-itss-approve-serialno" readonly>

                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approve-text-sits" name="staff-movement-staff-req-itss-approve-text-sits" value="Approved by Supervisor IT Support" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approve-text-itse" name="staff-movement-staff-req-itss-approve-text-itse" value="Approved by IT Support Engineer" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approve-text-rpam" name="staff-movement-staff-req-itss-approve-text-rpam" value="Approved by RP&AM" readonly>

                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Requested on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-movement-staff-req-itss-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Moved from</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-movement-staff-req-itss-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Staff justification</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-movement-staff-req-itss-movem-justif"></h6>
                                </div>
                            </div>                            
                            <div class="form-group form-inline row">
                                <label for="staffToFullName" class="col-sm-4 col-form-label">Moved to</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-movement-staff-req-itss-to-fullname"></h6>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approved-by" name="staff-movement-staff-req-itss-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-approved-on" name="staff-movement-staff-req-itss-approved-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-movement-staff-req-itss-approve" name="submit-movement-staff-req-itss-approve">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>