<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-handover-request-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-staff-approve-handover-request">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-handover-request-approve-id" name="staff-handover-request-approve-id" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-approve-pfnamba" name="staff-handover-request-approve-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-serial-no" name="staff-handover-request-serial-no" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-approve-text" name="staff-handover-request-approve-text" value="Checked by Direct Manager" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqAppliDate" class="col-sm-4 col-form-label">Handover date</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqDesignat" class="col-sm-4">Department</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffHandoverReqAssetType" class="col-sm-4 col-form-label text-end">Device type</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-asset-type"></h6>
                                </div>
                            </div>
                            <!-- <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Serial No</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-handover-request-serial-no"></h6>
                                </div>
                            </div> -->
                            <div class="form-group form-inline row">
                                <label for="staffAssetType" class="col-sm-4 col-form-label text-end">Current device status</label>
                                <div class="col-sm-8">
                                    <select id="staff-handover-request-approve-current-status" name="staff-handover-request-approve-current-status" class="form-control" required>
                                        <option value="">Select..</option>
                                        <?php
                                        $sqlDevices="SELECT * FROM DEVICESTATUS";
                                        $queryDev=sqlsrv_query($conn, $sqlDevices);
                                        while($row=sqlsrv_fetch_array($queryDev)){
                                            echo"
                                            <option value='".$row['deviceStatus']."'>".$row['deviceStatus']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staffReasonFor" class="col-form-label">Handover Justification</label>
                                <textarea class="form-control" id="staff-handover-request-justif" name="staff-handover-request-justif" rows="2" placeholder="Textarea" required></textarea>
                            </div>
                            <input type="hidden" class="form-control" id="staff-handover-request-approved-by" name="staff-handover-request-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-handover-request-approved-on" name="staff-handover-request-approved-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-staff-handover-request-approve" name="submit-staff-handover-request-approve">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>