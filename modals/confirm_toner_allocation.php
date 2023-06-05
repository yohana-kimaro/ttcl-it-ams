<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-confirm-toner-allocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-confirm-toner-allocation">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="confirm-toner-allocation-id" name="confirm-toner-allocation-id" readonly>
                            <input type="hidden" class="form-control" id="confirm-toner-allocation-pfnamba" name="confirm-toner-allocation-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="confirm-toner-allocation-model" name="confirm-toner-allocation-model" readonly>
                            <input type="hidden" class="form-control" id="confirm-toner-allocation-text" name="confirm-toner-allocation-text" readonly value="I certify that I have received the toner">
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Allocated on</label>
                                <div class="col-sm-8">
                                    <h6 class="confirm-toner-allocation-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Toner model</label>
                                <div class="col-sm-8">
                                    <h6 class="confirm-toner-allocation-model-display"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Toner quantity</label>
                                <div class="col-sm-8">
                                    <h6 class="confirm-toner-allocation-model-quantity"></h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="staffAppliDate" class="col-sm-12 col-form-label">I certify that, I have received the toner cartridge of the model stated above.</label>
                            </div>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-confirmed-by" name="staff-movement-staff-req-itss-confirmed-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="confirm-toner-allocation-date" name="confirm-toner-allocation-date" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-confirm-toner-allocation" name="submit-confirm-toner-allocation">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>