<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./database/Database.php');
?>


<!-- Modal forms-->
<div class="modal fade" id="modal-toner-cartridge-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-update-toner-cartridge">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="toner-cartridge-id" name="toner-cartridge-id" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Recorded on</label>
                                <div class="col-sm-8">
                                    <h6 class="toner-cartridge-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Recorded by</label>
                                <div class="col-sm-8">
                                    <h6 class="toner-cartridge-recorded-by"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-4 col-form-label">Updated on</label>
                                <div class="col-sm-8">
                                    <h6 class="toner-cartridge-up-appli-date"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <label for="staffFullName" class="col-sm-4 col-form-label">Updated by</label>
                                <div class="col-sm-8">
                                    <h6 class="toner-cartridge-updated-by"></h6>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="staffAssetType" class="col-form-label text-end">Toner brand</label>
                                <select id="toner-cartridge-brand" name="toner-cartridge-brand" class="form-control" required>
                                    <option value="">Select..</option>
                                    <?php
                                    $sqlDevices="SELECT * FROM tonerBrand ORDER BY tonerBrandName ASC";
                                    $queryDev=sqlsrv_query($conn, $sqlDevices);
                                    while($row=sqlsrv_fetch_array($queryDev)){
                                        echo"
                                        <option value='".$row['tonerBrandName']."'>".$row['tonerBrandName']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="staffAssetType" class="col-form-label text-end">Toner model</label>
                                <input type="text" class="form-control" name="toner-cartridge-model" id="toner-cartridge-model" required autocomplete="off">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="staffAssetType" class="col-form-label text-end">Toner status</label>
                                <select id="toner-cartridge-status" name="toner-cartridge-status" class="form-control" required>
                                    <option value="">Select..</option>
                                    <?php
                                    $sqlDevices="SELECT * FROM tonerStatus ORDER BY tonerStatus ASC";
                                    $queryDev=sqlsrv_query($conn, $sqlDevices);
                                    while($row=sqlsrv_fetch_array($queryDev)){
                                        echo"
                                        <option value='".$row['tonerStatus']."'>".$row['tonerStatus']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" id="toner-cartridge-updated-by1" name="toner-cartridge-updated-by1" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="toner-cartridge-up-appli-date-one" name="toner-cartridge-up-appli-date-one" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-toner-cartridge-update" name="submit-toner-cartridge-update">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>