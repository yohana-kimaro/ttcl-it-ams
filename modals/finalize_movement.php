<?php 
include 'connection.php';
date_default_timezone_set("Africa/Dar_es_salaam");
?>

<!-- Modal forms-->
<div class="modal fade" id="modal-it-finalize" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-finalize-it">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-it-finalize-id" name="staff-it-finalize-id" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-pfnamba" name="staff-it-finalize-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-pfnamba" name="staff-it-finalize-to-pfnamba" readonly>
                            <!-- -------------------------------- -->
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-fname" name="staff-it-finalize-to-fname" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-mname" name="staff-it-finalize-to-mname" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-lname" name="staff-it-finalize-to-lname" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-offbuild" name="staff-it-finalize-to-offbuild" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-designation" name="staff-it-finalize-to-designation" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-department" name="staff-it-finalize-to-department" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-region" name="staff-it-finalize-to-region" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-to-directmanager" name="staff-it-finalize-to-directmanager" readonly>

                            <!-- <input type="hidden" class="form-control" id="staff-it-finalize-to-pfnamba" name="staff-it-finalize-to-pfnamba" readonly> -->

                            <input type="hidden" class="form-control" id="staff-it-finalize-to-serialno" name="staff-it-finalize-to-serialno" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalize-text" name="staff-it-finalize-text" value="Approvec by IT Manager" readonly>
                            <div class="form-row">
                                <label for="staffAppliDate" class="col-sm-12 col-form-label">I certify that, this movement is correct.</label>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffAssetStatus" class="col-sm-8 col-form-label text-end">Current device status</label>
                                <div class="col-sm-4">
                                    <select id="staff-it-finalize-devstatus" name="staff-it-finalize-devstatus" class="form-control" required>
                                        <option value="">Select..</option>
                                        <?php
                                        $sqlDevices="SELECT * FROM [dbo].[DEVICESTATUS]";
                                        $queryDev=sqlsrv_query($conn, $sqlDevices);
                                        while($row=sqlsrv_fetch_array($queryDev)){
                                            echo"
                                            <option value='".$row['deviceStatus']."'>".$row['deviceStatus']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="staff-it-finalized-by" name="staff-it-finalized-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-it-finalized-on" name="staff-it-finalized-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-it-finalize-final" name="submit-it-finalize-final">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>