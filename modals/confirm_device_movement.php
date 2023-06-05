<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-movement-staff-req-itss-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-confirm-movement-staff-req-itss">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-confirm-id" name="staff-movement-staff-req-itss-confirm-id" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-confirm-pfnamba" name="staff-movement-staff-req-itss-confirm-pfnamba" readonly>
                            <div class="form-row">
                                <label for="staffAppliDate" class="col-sm-12 col-form-label">I certify that, I have received the equipment in the condition stated on the form.</label>
                            </div>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-confirmed-by" name="staff-movement-staff-req-itss-confirmed-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-movement-staff-req-itss-confirmed-on" name="staff-movement-staff-req-itss-confirmed-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-movement-staff-req-itss-confirm" name="submit-movement-staff-req-itss-confirm">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>