<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-iss-verify" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-verify-iss">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-iss-verify-id" name="staff-iss-verify-id" readonly>
                            <input type="hidden" class="form-control" id="staff-iss-verify-pfnamba" name="staff-iss-verify-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-iss-verify-text" name="staff-iss-verify-text" value="Verified by IT Support Supervisor" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Asset Type</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-quantity"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Reason For</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-reason-for"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Staff Justification</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-iss-justif"></h6>
                                </div>
                            </div>                         
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-6">Direct Manager Justification</label>
                                <div class="col-sm-6">
                                    <h6 class="dmgr-appr-req-justif"></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="staffVerifyJustifica">Verification justification <em>(100 characters)</em></label>
                                    <textarea class="form-control" id="staff-iss-verify-justificati" required name="staff-iss-verify-justificati" rows="3" placeholder="Provide a justification for verifying this request by entering some meaningful text" maxlength="100"></textarea>
                            </div>
                            <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-iss-verified-name" class="col-sm-4 col-form-label text-end">Verified by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-iss-verified-by" name="staff-iss-verified-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-iss-verified-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-iss-verified-on" name="staff-iss-verified-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-iss-verify" name="submit-iss-verify">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>