<?php 
// include './connection.php';
include './connection_one.php';
date_default_timezone_set("Africa/Dar_es_salaam");
?>

<script type="text/javascript">
    $(document).ready(function(){    
    $('#staff-it-staff-movement-to-pfnumber').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'./ajaxMovement.php',
                data:'pf_number='+stateID,
                success:function(html){
                    $('#staff-iss-allocate-other-staff-details').html(html);
                }
            }); 
        }else{
            $('#staff-iss-allocate-other-staff-details').html('Select staff PF Number first'); 
        }
    });
});
</script>



<!-- Modal forms-->
<div class="modal fade" id="modal-it-movement-device" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <form  method="post" id="form-movement-it-asset" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="staff-it-movement-id" name="staff-it-movement-id" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-pfnamba" name="staff-it-movement-pfnamba" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-serialno" name="staff-it-movement-serialno" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-duty-station" name="staff-it-movement-duty-station" readonly>
                            <!-- ---------------------------------------------------- -->

                            <input type="hidden" class="form-control" id="staff-it-movement-fname-one" name="staff-it-movement-fname-one" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-sname-one" name="staff-it-movement-sname-one" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-lname-one" name="staff-it-movement-lname-one" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-department-one" name="staff-it-movement-department-one" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movement-devtype-one" name="staff-it-movement-devtype-one" readonly>


                            <!-- <input type="hidden" class="form-control" id="staff-it-movement-designation-one" name="staff-it-movement-designation-one" readonly> -->

                            <div class="form-group form-inline row">
                                <div class="col-sm-12">
                                    <h6 class="staff-it-movement-fname"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-12">
                                    <h6 class="staff-it-movement-desination"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-movement-department"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-movement-asset-device-type"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-movement-brand"></h6>
                                </div>
                            </div>
                            <div class="form-group form-inline row">
                                <div class="col-sm-8">
                                    <h6 class="staff-it-movement-storage"></h6>
                                </div>
                            </div>
                            <hr>
                            <p><strong>RECEIVING STAFF</strong></p>
                            <div class="row">
                                <div class="form-group col-md-4 mt-10">
                                    <label for="staffPFNumber">PF Number</label>
                                    <select id="staff-it-staff-movement-to-pfnumber" name="staff-it-staff-movement-to-pfnumber" class="form-control" required>
                                        <option value="">Select..</option>
                                        <?php
                                        $sqlSelectStaffPF="SELECT * FROM vwASSETMANAGEMENT";
                                        $sqlBRQuery=sqlsrv_query($conn1, $sqlSelectStaffPF);
                                        $staffPFRows = sqlsrv_has_rows( $sqlBRQuery );
                                        if($staffPFRows){
                                            while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                                echo"<option value='". $rowsR['pfNumber'] ."'>" .$rowsR['pfNumber'] ."</option>";
                                            }
                                        }else{
                                            echo "<option value=''>Not available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mt-10">
                                    <!-- <label for="assetOtherSpec">Other Asset Specification</label> -->
                                    <div id="staff-iss-allocate-other-staff-details"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-12 mb-10">
                                    <label for="staffMiddleName">Please attach scanned movement form. (png/jpg/pdf max. 2MB)</label>
                                    <input type="file" class="form-control" id="staff-it-movement-form" name="staff-it-movementd-form" required accept=".jpg,.jpeg,.png,.pdf" max="2MB">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-12 mb-10">
                                    <label for="staffReasonFor" class="col-form-label">Movement Justification</label>
                                    <textarea class="form-control" id="staff-movement-request-justif" name="staff-movement-request-justif" rows="2" placeholder="Textarea" required></textarea>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="staff-it-movementd-by" name="staff-it-movementd-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="staff-it-movementd-on" name="staff-it-movementd-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" id="submit-staff-it-movement" name="submit-staff-it-movement">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>