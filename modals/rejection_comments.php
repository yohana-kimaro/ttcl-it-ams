<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-rejection-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-reject-dmanager">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-comment-reject-id" name="staff-comment-reject-id" readonly>
                            <input type="hidden" class="form-control" id="staff-comment-reject-pfnamba" name="staff-comment-reject-pfnamba" readonly>
                            <!-- <div class="form-group form-inline row"> -->
                                <!-- <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <!-- <h6 class="staff-comment-appli-date"></h6> -->
                                <!-- </div>
                            </div> -->
                            <div class="form-group">
                                <label for="staffMiddleName" class="col-form-label">Reason for rejecting your application</label>
                                <div class="">
                                    <h6 class="staff-comment-justif"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>