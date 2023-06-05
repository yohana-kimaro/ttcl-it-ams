<?php
require_once('./connection.php');

?>



<!-- Modal -->
<div class="modal fade" id="modal-update-asset-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge01" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
                <form method="post" id="form-update-it-asset">
                    <div class="modal-body">
                        <div class="row"> 
                            <div class="col-sm">
                                <h5 class="hk-sec-title">IT Asset's details.</h5>
                                <div class="form-row">
                                    <input type="hidden" name="updateITAssetserialNamba" id="updateITAssetserialNamba" class="form-control">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetstatus">Computer Type</label>
                                        <select class="form-control" name="updateITAssetassetsType" id="updateITAssetassetsType" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM computerTypes";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['computerName']."'>".$rowsR['computerName']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetserialNo">Serial No.</label>
                                        <input type="text" class="form-control"  onBlur="nambaSerialAvailability()" id="updateITAssetserialNo" placeholder="Enter Serial number"  name="updateITAssetserialNo" required>
                                        <span id="ser-namba-availability" style="font-size:12px;"></span>
                                    </div>
                                    <input type="hidden" class="form-control form-control-user" id="updateITAssetdeviceOwnership"  name="updateITAssetdeviceOwnership" value="Personal" readonly>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetBrand">Brand</label>
                                        <select class="form-control" name="updateITAssetBrand" id="updateITAssetBrand" required>
                                            <option value="">Select..</option>
                                            <?php 
                                            $sqlSelectBr="SELECT * FROM COMPUTERSTYPE";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['computerType']."'>".$rowsR['computerType']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetmodel">Model</label>
                                        <input type="text" class="form-control" id="updateITAssetmodel" placeholder="Eg. Latitude E5420" name="updateITAssetmodel" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetmac">MAC address</label>
                                        <input type="text" class="form-control" id="updateITAssetmac" placeholder="Eg. 129:8:90:1:09:1" name="updateITAssetmac" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetyear">Purchased year</label>
                                        <input type="text" class="form-control" id="updateITAssetyear" name="updateITAssetyear" placeholder="Eg. 2010" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetstorage">Storage type</label>
                                        <select class="form-control" name="updateITAssetstorage" id="updateITAssetstorage" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM STORAGETB";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['storageType']."'>".$rowsR['storageType']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetcapacity">Capacity</label>
                                        <select class="form-control" name="updateITAssetcapacity" id="updateITAssetcapacity" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM DEVICECAP";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['deviceCap']."'>".$rowsR['deviceCap']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetprocessor">Processor speed</label>
                                        <input type="text" class="form-control" id="updateITAssetprocessor" placeholder="Eg. 1.7 GHz" name="updateITAssetprocessor" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetram">RAM</label>
                                        <input type="text" class="form-control" id="updateITAssetram" name="updateITAssetram" placeholder="Eg. 4GB" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetcdRom">CD-ROM Drive</label>
                                        <select class="form-control" name="updateITAssetcdRom" id="updateITAssetcdRom" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM HIGHLOW";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['onOff']."'>".$rowsR['onOff']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetos">Operating System</label>
                                        <select class="form-control" name="updateITAssetos" id="updateITAssetos" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM [dbo].[DEVICEOS]";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['deviceOS']."'>".$rowsR['deviceOS']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetofficeApp">Office applications</label>
                                        <select class="form-control" name="updateITAssetofficeApp" id="updateITAssetofficeApp" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM [dbo].[HIGHLOW]";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['onOff']."'>".$rowsR['onOff']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetanti">Antivirus</label>
                                        <select class="form-control" name="updateITAssetanti" id="updateITAssetanti" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM [dbo].[HIGHLOW]";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['onOff']."'>".$rowsR['onOff']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetpdfReader">PDF Reader</label>
                                        <select class="form-control" name="updateITAssetpdfReader" id="updateITAssetpdfReader" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM [dbo].[PDFTB]";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['pdfReader']."'>".$rowsR['pdfReader']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITAssetstatus">Status</label>
                                        <select class="form-control" name="updateITAssetstatus" id="updateITAssetstatus" required>
                                            <option value="">Select..</option>
                                            <?php
                                            $sqlSelectBr="SELECT * FROM DEVICESTATUS";
                                            $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='".$rowsR['deviceStatus']."'>".$rowsR['deviceStatus']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit-update-it-asset" id="submit-update-it-asset">Save changes</button>
                    </div>
                </form>

        </div>
    </div>
</div>
<!-- Modal -->

<script type="text/javascript">
      function nambaSerialAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
          url: "../check/check_availability_ser_desk_modal.php",
          data:'updateITLaptopserialNo='+$("#updateITLaptopserialNo").val(),
          type: "POST",
          success:function(data){
            $("#ser-namba-availability").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
        });
      }
    </script>