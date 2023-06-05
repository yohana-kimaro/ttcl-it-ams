<?php 
require_once('../class/Movement.php');
$movement_staff_req = $movement->all_devices_movement_staffs_requests();
?>
 
<div class="table-responsive">
    <table id="tbl_staff_req" class="table table-hover table-bordered">
        <thead> 
            <tr> 
                <th>SN</th>
                <th>Movement date</th>
                <th>Moved From</th>
                <th>Serial No</th>
                <th>Moved To</th>
                <th>Movement Justification</th>
                <th>Attachment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($movement_staff_req as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['movedFromDate']; ?></td>
                <td><?= $it['movedFromName']." &nbsp".$it['movedFromMName']." &nbsp".$it['movedFromLName']; ?></td>
                <td><?= $it['devFromSeralNo']; ?></td>
                <td><?= $it['movedTOName']." &nbsp".$it['movedTomName']." &nbsp".$it['movedTolName']; ?></td>
                <td><?= $it['movemRejectComm'];?></td>
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['movementAttachment'])){echo '<center>--<center>';}else{echo '<a href="./movement/'.$it['movementAttachment'].'" target="_blank">'.$it['movementAttachment'].'</a>';} ?></span></label>
                </td>
                <?php if($_SESSION['userpf@ttclassetsystem'] === (90820)){?>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="approveMovementITSupportRequest('<?= $it['movedFromApplicantID']; ?>');" class="btn btn-sm btn-success">Approve</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="rejectMovementITSupportRequest('<?= $it['movedFromApplicantID']; ?>');" class="btn btn-sm btn-danger">Reject</button>
                            </div>
                        </div>
                    </div>
                </td>
            <?php } ?>
            </tr>
            
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#tbl_staff_req').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "drawCallback": function () {
                    $('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
                },
                language: { search: "",searchPlaceholder: "Search" }
            });
        });
    </script>
</div>

<?php 
$movement->Disconnect();
?>