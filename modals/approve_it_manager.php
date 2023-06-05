<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-it-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-approve-it">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-it-approve-id" name="staff-it-approve-id" readonly>
                            <input type="hidden" class="form-control" id="staff-it-approve-pfnamba" name="staff-it-approve-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-it-approve-text" name="staff-it-approve-text" value="Approvec by IT Manager" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-it-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-it-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-it-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Asset Type</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-it-quantity"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Reason For</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-it-reason-for"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-6">Staff Justification</label>
                                <div class="col-sm-6">
                                    <h6 class="staff-it-justif"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-6">Direct Manager Justification</label>
                                <div class="col-sm-6">
                                    <h6 class="staff-direct-mgr-justif"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-6">IT Support Justification</label>
                                <div class="col-sm-6">
                                    <h6 class="it-support-superv-justif"></h6>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="staffApproveJustifica">IT Manager Approve justification <em>(150 characters)</em></label>
                                    <textarea class="form-control" id="itmanager-approve-justif321" required name="itmanager-approve-justif321" rows="3" placeholder="Provide a justification for approving this request by entering some meaningful text" maxlength="150"></textarea>
                            </div>

                            <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-it-approved-name" class="col-sm-4 col-form-label text-end">Verified by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-approved-by" name="staff-it-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-it-approved-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-approved-on" name="staff-it-approved-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-it-approve" name="submit-it-approve">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>