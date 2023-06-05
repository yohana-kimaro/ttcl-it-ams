<?php
require_once('./connection.php');

?>



<!-- Modal -->
<div class="modal fade" id="modal-update-laptop-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge01" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div> 
                <form method="post" id="form-update-it-laptop">
                    <div class="modal-body">
                        <div class="row"> 
                            <div class="col-sm">
                                <h5 class="hk-sec-title">IT Asset's details.</h5>
                                <div class="form-row">
                                    <input type="hidden" name="updateITLaptopserialNamba" id="updateITLaptopserialNamba" class="form-control">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopstatus">Computer Type</label>
                                        <select class="form-control" name="updateITLaptopassetsType" id="updateITLaptopassetsType" required>
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
                                        <label for="updateITLaptopserialNo">Serial No.</label>
                                        <input type="text" class="form-control"  onBlur="serialNambaAvailability()" id="updateITLaptopserialNo" placeholder="Enter Serial number"  name="updateITLaptopserialNo" required>
                                        <span id="nam-serial-availability" style="font-size:12px;"></span>
                                    </div>
                                    <input type="hidden" class="form-control form-control-user" id="updateITLaptopdeviceOwnership"  name="updateITLaptopdeviceOwnership" value="Personal" readonly>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopBrand">Brand</label>
                                        <select class="form-control" name="updateITLaptopBrand" id="updateITLaptopBrand" required>
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
                                        <label for="updateITLaptopmodel">Model</label>
                                        <input type="text" class="form-control" id="updateITLaptopmodel" placeholder="Eg. Latitude E5420" name="updateITLaptopmodel" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopmac">MAC address</label>
                                        <input type="text" class="form-control" id="updateITLaptopmac" placeholder="Eg. 129:8:90:1:09:1" name="updateITLaptopmac" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopyear">Purchased year</label>
                                        <input type="text" class="form-control" id="updateITLaptopyear" name="updateITLaptopyear" placeholder="Eg. 2010" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopstorage">Storage type</label>
                                        <select class="form-control" name="updateITLaptopstorage" id="updateITLaptopstorage" required>
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
                                        <label for="updateITLaptopcapacity">Capacity</label>
                                        <select class="form-control" name="updateITLaptopcapacity" id="updateITLaptopcapacity" required>
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
                                        <label for="updateITLaptopprocessor">Processor speed</label>
                                        <input type="text" class="form-control" id="updateITLaptopprocessor" placeholder="Eg. 1.7 GHz" name="updateITLaptopprocessor" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopram">RAM</label>
                                        <input type="text" class="form-control" id="updateITLaptopram" name="updateITLaptopram" placeholder="Eg. 4GB" required>
                                    </div>
                                    <div class="form-group col-md-3 mb-10">
                                        <label for="updateITLaptopcdRom">CD-ROM Drive</label>
                                        <select class="form-control" name="updateITLaptopcdRom" id="updateITLaptopcdRom" required>
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
                                        <label for="updateITLaptopos">Operating System</label>
                                        <select class="form-control" name="updateITLaptopos" id="updateITLaptopos" required>
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
                                        <label for="updateITLaptopofficeApp">Office applications</label>
                                        <select class="form-control" name="updateITLaptopofficeApp" id="updateITLaptopofficeApp" required>
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
                                        <label for="updateITLaptopanti">Antivirus</label>
                                        <select class="form-control" name="updateITLaptopanti" id="updateITLaptopanti" required>
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
                                        <label for="updateITLaptoppdfReader">PDF Reader</label>
                                        <select class="form-control" name="updateITLaptoppdfReader" id="updateITLaptoppdfReader" required>
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
                                        <label for="updateITLaptopstatus">Status</label>
                                        <select class="form-control" name="updateITLaptopstatus" id="updateITLaptopstatus" required>
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
                        <button type="submit" class="btn btn-primary" name="submit-update-it-laptop" id="submit-update-it-laptop">Save changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- Modal -->
