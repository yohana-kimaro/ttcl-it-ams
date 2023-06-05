<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-it-finalize-toner" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-finalize-toner">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="finalize-toner-id" name="finalize-toner-id" readonly>
                            <input type="hidden" class="form-control" id="finalize-toner-pfnamba1" name="finalize-toner-pfnamba1" readonly>
                            <input type="hidden" class="form-control" id="finalize-toner-text" name="finalize-toner-text" value="Yes" readonly>
                            <input type="hidden" class="form-control" id="finalize-toner-model1" name="finalize-toner-model1" value="Yes" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="finalize-toner-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Toner model</label>
                                <div class="col-sm-8">
                                    <h6 class="finalize-toner-model"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <h6 class="finalize-toner-quantity"></h6>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="staff-it-approved-by" name="staff-it-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="finalize-tonerallocated-on" name="finalize-tonerallocated-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-finalize-toner" name="submit-finalize-toner">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>