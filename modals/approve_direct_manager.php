<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-dmanager-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-approve-dmanager">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-dmanager-approve-id" name="staff-dmanager-approve-id" readonly>
                            <input type="hidden" class="form-control" id="staff-dmanager-approve-pfnamba" name="staff-dmanager-approve-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-dmanager-approve-text" name="staff-dmanager-approve-text" value="Checked by Direct Manager" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmnanager-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Staff full name</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmanager-fullname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffDesignat" class="col-sm-4">Designation</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmanager-designation"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffAssetType" class="col-sm-4 col-form-label text-end">Asset type</label>
                                <div class="col-sm-8">
                                    <select id="staff-dmanager-approve-devtype" name="staff-dmanager-approve-devtype" class="form-control" required>
                                        <option value="">Select..</option>
                                        <?php
                                        $sqlDevices="SELECT * FROM DEVICETYPETB ORDER BY deviceType ASC";
                                        $queryDev=sqlsrv_query($conn, $sqlDevices);
                                        while($row=sqlsrv_fetch_array($queryDev)){
                                            echo"
                                            <option value='".$row['deviceType']."'>".$row['deviceType']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmanager-quantity"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffReasonFor" class="col-sm-4 col-form-label">Reason For</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmanager-reason-for"></h6>
                                </div>
                            </div>

                            <div class="form-group form-inline row">
                                <label for="staffMiddleName" class="col-sm-4">Staff Justification</label>
                                <div class="col-sm-8">
                                    <h6 class="staff-dmanager-justif"></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="staffRejectJustifica">Direct Manager Approve justification <em>(150 characters)</em></label>
                                    <textarea class="form-control" id="dmanager-approve-justif123" required name="dmanager-approve-justif123" rows="3" placeholder="Provide a justification for approving this request by entering some meaningful text" maxlength="150"></textarea>
                            </div>

                            <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-it-support-supervisor-verified-name" class="col-sm-4 col-form-label text-end">Verified by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-dmanager-approved-by" name="staff-dmanager-approved-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-it-support-supervisor-verified-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-dmanager-approved-on" name="staff-dmanager-approved-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-dmanager-approve" name="submit-dmanager-approve">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>