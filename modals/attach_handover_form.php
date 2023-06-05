<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-it-handover" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-handover-it-asset" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-it-handover-id" name="staff-it-handover-id" readonly>
                            <input type="hidden" class="form-control" id="staff-it-handover-pfnamba" name="staff-it-handover-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-it-handover-serialno" name="staff-it-handover-serialno" readonly>
                            <input type="hidden" class="form-control" id="staff-it-handover-fname" name="staff-it-handover-fname" readonly>
                            <input type="hidden" class="form-control" id="staff-it-handover-sname" name="staff-it-handover-sname" readonly>
                            <input type="hidden" class="form-control" id="staff-it-handover-lname" name="staff-it-handover-lname" readonly>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-device-name"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-serial-number"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-asset-type"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-asset-brand"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-processor-speed"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-handover-storage"></h6>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-12 mb-10">
                                <label for="staffMiddleName">Please attach scanned handover form. (png/jpg/pdf max. 2MB)</label>
                                    <input type="file" class="form-control" id="staff-it-handover-form" name="staff-it-handoverd-form" required accept=".jpg,.jpeg,.png,.pdf" max="2MB">
                                </div>
                            </div>
                            <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-it-handoverd-name" class="col-sm-4 col-form-label text-end">Verified by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-handoverd-by" name="staff-it-handoverd-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-it-handoverd-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-handoverd-on" name="staff-it-handoverd-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-it-handover" name="submit-it-handover">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>