<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-view-asset-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-more-it-asset">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="more-asset-serialnumber" name="more-asset-serialnumber" readonly>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Serial Number</label>
                                <div class="col-sm-8">
                                    <h6 class="more-asset-serialnumber"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Device Name</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-name"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Operating System</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-os"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Status</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-status"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Processor Speed</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-processor-speed"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">CD ROM</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-cdrom"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">MS Office</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-msoffice"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Recorded On</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-recorded-on"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Recorded By</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-recorded-by"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Last Updated By</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-updated-by"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetUpdatedOn" class="col-sm-4">Last Updated On</label>
                                <div class="col-sm-8">
                                    <h6 class="more-it-asset-updated-on"></h6>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                            <!-- <button type="submit" class="btn btn-success" id="submit-more-it-asset" name="submit-more-it-asset">Yes</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>