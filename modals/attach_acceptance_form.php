<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-it-acceptance" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-acceptance-it-asset" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-it-acceptance-id" name="staff-it-acceptance-id" readonly>
                            <input type="hidden" class="form-control" id="staff-it-acceptance-pfnamba" name="staff-it-acceptance-pfnamba" readonly>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-device-name"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-serial-number"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-asset-type"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-asset-brand"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-processor-speed"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-acceptance-storage"></h6>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-12 mb-10">
                                <label for="staffMiddleName">Please attach scanned computer system acceptance form. (png/jpg/pdf max. 2MB)</label>
                                    <input type="file" class="form-control" id="staff-it-acceptance-form" name="staff-it-acceptanced-form" required accept=".jpg,.jpeg,.png,.pdf" max="2MB">
                                </div>
                            </div>
                            <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-it-acceptanced-name" class="col-sm-4 col-form-label text-end">Verified by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-acceptanced-by" name="staff-it-acceptanced-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-it-acceptanced-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-it-acceptanced-on" name="staff-it-acceptanced-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-it-acceptance" name="submit-it-acceptance">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>