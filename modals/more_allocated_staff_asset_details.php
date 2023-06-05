<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-view-staff-asset-alloc-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-more-it--allocasset">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="more-alloc-it-asset-ids" name="more-alloc-it-asset-ids" readonly>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Staff Full Name</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-staff-name"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-desgnation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-staff-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Serial Number</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-serialnumber"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="itAssetName" class="col-sm-4 col-form-label">Device Name</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-dev-name"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Device type</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-devtype"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Brand</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-brand"></h6>
                                </div>
                            </div>                            
                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Model</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-model"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Storage</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-storage"></h6>
                                </div>
                            </div>

                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">RAM</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-ram"></h6>
                                </div>
                            </div>

                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Processor Speed</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-processor"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Volume</label>
                                <div class="col-sm-8">
                                    <h6 class="more-alloc-it-asset-capacity"></h6>
                                </div>
                            </div>                          
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="more-alloc-it-asset-submit" name="more-alloc-it-asset-submit" class="btn btn-success" data-dismiss="modal">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>