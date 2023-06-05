<?php 
session_start();
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./../connection.php');
?>


<section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">Toner catridges details</h5>
    <div class="row">
        <div class="col-sm">
            <form id="form-record-toner-cartridge">
            <input type="hidden" name="recordtonercartridgeqty" id="recordtonercartridgeqty" value="0">             
                <div class="row">
                    <div class="form-group col-md-3 mb-10">
                        <label for="tonertype">Tonner Brand</label>
                        <select class="form-control custom-select d-block w-100" id="recordtonercartridgetonerbrand" name="recordtonercartridgetonerbrand" required>
                            <option value="">Choose...</option>
                            <?php
                            $sqlDevices="SELECT * FROM tonerBrand ORDER BY tonerBrandName ASC";
                            $queryTonerType=sqlsrv_query($conn, $sqlDevices);
                            while($row=sqlsrv_fetch_array($queryTonerType)){
                                echo"<option value='".$row['tonerBrandName']."'>".$row['tonerBrandName']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5 mb-10">
                        <label for="tonermodel">Toner Model</label>
                        <input class="form-control" id="recordtonercartridgetonermodel" id="recordtonercartridgetonermodel" type="text" required autocomplete="off" onBlur="tonerModelAvailability()">
                        <span id="tonner-model-availability-status" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group col-md-4 mb-10">
                        <label for="tonerstatus">Status</label>
                        <select class="form-control custom-select d-block w-100" id="recordtonercartridgetonerstatus" name="recordtonercartridgetonerstatus" required>
                            <option value="">Choose...</option>
                            <?php
                            $sqlTonerStatus="SELECT * FROM tonerStatus";
                            $queryTonerDev=sqlsrv_query($conn, $sqlTonerStatus);
                            while($row=sqlsrv_fetch_array($queryTonerDev)){
                                echo"<option value='".$row['tonerStatus']."'>".$row['tonerStatus']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input class="form-control" id="record-toner-cartridge-recorded-by" placeholder="" id="record-toner-cartridge-recorded-by" type="hidden" value="<?= $_SESSION['username@ttclassetsystem']; ?>">
                    <input class="form-control" id="record-toner-cartridge-recorded-on" placeholder="" id="record-toner-cartridge-recorded-on" type="hidden" value="<?= date('d-m-Y H:i:s');?>">
                </div>
                <hr>
                <div class="text-right">
                    <button class="btn btn-dark" type="submit" id="submit-record-toner-cartridge" name="submit-record-toner-cartridge" value="add">Record</button>
                </div>
            </form>
        </div>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function () {
    $("#form-record-toner-cartridge").validate({
        rules: {
            recordtonercartridgetonerbrand: {
                required: true
            },
            recordtonercartridgetonermodel: {
                required: true
            },
            recordtonercartridgetonerstatus: {
                required: true
            }
        },
        messages: {
            recordtonercartridgetonerbrand: {
                required: "Please choose brand"
            },
            recordtonercartridgetonermodel: {
                required: "Please enter model"
            },
            recordtonercartridgetonerstatus: {
                required: "Please choose status"
            }
        },
        errorElement:"span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        }
    });
});
</script>