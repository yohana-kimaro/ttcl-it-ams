<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-handover-request-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-staff-reject-handover-request">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-handover-request-rej-reject-id" name="staff-handover-request-rej-reject-id" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-rej-serial-no" name="staff-handover-request-rej-serial-no" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-reject-text" name="staff-handover-request-reject-text" value="Rejected" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqAppliDate" class="col-sm-4 col-form-label">Handover date</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-rej-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-rej-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqDesignat" class="col-sm-4">Department</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-rej-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-rej-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqAssetType" class="col-sm-4 col-form-label text-end">Device type</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-rej-asset-type"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Current device status</label>
                                <div class="col-sm-4">
                                    <h6 class="staff-handover-request-rej-current-status"></h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staffReasonFor" class="col-form-label">Handover Rejection Justification</label>
                                <textarea class="form-control" id="staff-handover-request-rej-justif" name="staff-handover-request-rej-justif" rows="2" placeholder="Textarea" required></textarea>
                            </div>
                            <input type="hidden" class="form-control" id="staff-handover-request-rejectd-by" name="staff-handover-request-rejectd-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-rejectd-on" name="staff-handover-request-rejectd-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-staff-handover-request-reject" name="submit-staff-handover-request-reject">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>