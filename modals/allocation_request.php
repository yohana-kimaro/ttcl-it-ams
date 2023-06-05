<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
require_once('./connection.php');
?>

<script type="text/javascript">
    $(document).ready(function(){
    $('#staff-iss-allocate-devtype').on('change',function(){
        var deviceTypeName = $(this).val();
        if(deviceTypeName){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'devicetype_name='+deviceTypeName,
                success:function(html){
                    $('#staff-iss-allocate-serialnumber').html(html);
                    $('#staff-iss-allocate-other-spec').html('<option value=""></option>');
                }
            }); 
        }else{
            $('#staff-iss-allocate-serialnumber').html('<option value="">Select asset type first</option>'); 
            $('#staff-iss-allocate-other-spec').html('<option value=""></option>'); 
        } 
    }); 
    
    $('#staff-iss-allocate-serialnumber').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'serial_number='+stateID,
                success:function(html){
                    $('#staff-iss-allocate-other-spec').html(html);
                }
            }); 
        }else{
            $('#staff-iss-allocate-other-spec').html(''); 
        }
    });
});
</script>


<!-- Modal -->
<div class="modal fade" id="modal-iss-allocate" tabindex="-1" role="dialog" aria-labelledby="exampleModalAllocate" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="modal-form-allocate" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalAllocateTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="staff-iss-allocated-id" name="staff-iss-allocated-id" readonly>
                    <input type="hidden" class="form-control" id="staff-iss-allocated-pfnamba" name="staff-iss-allocated-pfnamba" readonly>
                    <input type="hidden" class="form-control" id="staff-iss-allocated-text" name="staff-iss-allocated-text" value="Yes" readonly>
                    <div class="form-group form-inline row">
                        <label for="staffAppliDate" class="col-sm-4 col-form-label">Applied on</label>
                        <div class="col-sm-8">
                            <h6 class="staff-iss-allocated-appli-date"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffFullName" class="col-sm-4 col-form-label">Staff Full Name</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-fullname"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffFullName" class="col-sm-4 col-form-label">Department</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-depart"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffDesignat" class="col-sm-4">Designation</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-designation"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffReasonFor" class="col-sm-4 col-form-label">Asset Type</label>
                        <div class="col-sm-8">
                            <h6 class="staff-iss-allocated-asset-type"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffReasonFor" class="col-sm-4 col-form-label">Reason For</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-iss-reason-for"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffMiddleName" class="col-sm-4">Staff Justification</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-iss-justif"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffMiddleName" class="col-sm-4">Direct Manager Justification</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-dmgr-justif"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffMiddleName" class="col-sm-4">IT Support Justification</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-itsupport-justif"></h6>
                        </div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="staffMiddleName" class="col-sm-4">IT Manager Justification</label>
                        <div class="col-sm-8">
                            <h6 class="staff-allocated-itmgr-justif"></h6>
                        </div>
                    </div>
                    <p><strong>System Components</strong></p>
                    <div class="row">
                        <div class="form-group col-md-6 mt-10">
                            <label for="staffAssetType">Asset type</label>
                            <select id="staff-iss-allocate-devtype" name="staff-iss-allocate-devtype" class="form-control" required>
                                <option value="">Select..</option>
                                <?php
                                $sqlSelectBr="SELECT * FROM DEVICETYPETB ORDER BY deviceType";
                                $sqlBRQuery=sqlsrv_query($conn, $sqlSelectBr);
                                $deviceRows = sqlsrv_has_rows( $sqlBRQuery );
                                if($deviceRows){
                                while ($rowsR=sqlsrv_fetch_array($sqlBRQuery)) {
                                    $devicetype_name=$rowsR['deviceType'];
                                    echo"<option value='$devicetype_name'>$devicetype_name</option>";
                                }}else{
                                    echo "<option value=''>Not available</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8 mt-10">
                            <label for="staffSerialNumber">Serial number</label>
                            <select id="staff-iss-allocate-serialnumber" name="staff-iss-allocate-serialnumber" class="form-control" required>
                                <option value="">Select asset type first</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 mt-10">
                            <label for="assetOtherSpec">Other Asset Specification</label>
                            <div id="staff-iss-allocate-other-spec"></div>
                        </div>
                    </div>

                    <!-- <div id=""></div> -->
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="computerName">Computer Name</label>
                            <input class="form-control" id="asset-allocated-computer-name" placeholder="TTCLHQLT001" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="firstName">Other devices</label>
                            <textarea class="form-control" id="asset-allocated-other-devices" name="asset-allocated-other-devices" maxlength="200" placeholder="Eg. Flash Disk, Bag" rows="3" required></textarea>
                        </div>
                    </div>
                    <p class="">Documents</p>
                    <div class="row">
                        <div class="col-md-6 mt-10">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="asset-allocated-user-manual" name="asset-allocated-user-manual" value="User manual">
                                <label class="custom-control-label" for="asset-allocated-user-manual">User manual</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-10">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="asset-allocated-accepted-policy" name="asset-allocated-accepted-policy" value="Accepted user policy">
                                <label class="custom-control-label" for="asset-allocated-accepted-policy">Accepted user policy</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-10">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="asset-allocated-user-respons" name="asset-allocated-user-respons" value="User responsibility">
                                <label class="custom-control-label" for="asset-allocated-user-respons">User responsibility</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-10">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="asset-allocated-how-to-guide" name="asset-allocated-how-to-guide" value="How to guide">
                                <label class="custom-control-label" for="asset-allocated-how-to-guide">How to guide</label>
                            </div>
                        </div>                       
                    </div>
                    <div class="row">                    
                        <div class="col-md-6 mt-10  col-lg-12">                        
                            <div class="form-group">
                                <label for="staffRejectJustifica">Allocation justification <em>(150 characters)</em></label>
                                    <textarea class="form-control" id="itsupport-allocate-justif123" required name="itsupport-allocate-justif123" rows="3" placeholder="Provide a justification for allocating this device to this staff by entering some meaningful text" maxlength="150"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row"> -->
                                <!-- <label for="staff-it-support-supervisor-verified-name" class="col-sm-4 col-form-label text-end">Allocated by</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-iss-allocated-by" name="staff-iss-allocated-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div>
                            <div class="form-group row"> -->
                                <!-- <label for="staff-iss-allocated-date" class="col-sm-4 col-form-label">Verified on</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" class="form-control" id="staff-iss-allocated-on" name="staff-iss-allocated-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" id="submit-iss-allocate" name="submit-iss-allocate" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div> 

