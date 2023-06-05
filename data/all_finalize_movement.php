<?php 
require_once('../class/Movement.php');
$it_movement_confirm = $movement->all_staff_movement_finalize();
?>
 
<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Request Date </th>
                <th>New user</th>
                <th>Serial No.</th>
                <th>Old User</th>
                <th>Movement Form</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($it_movement_confirm as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><label><span class="w-100p d-block text-truncate"><?= $it['movedFromDate']; ?></span></label></td>
                <td><?= $it['movedTOName'];?>  <?=$it['movedTomName'];?>  <?=$it['movedTolName']; ?></td>
                <td><?= $it['devFromSeralNo']; ?></td>
                <td><?= $it['movedFromName'];?>  <?= $it['movedFromMName'];?>  <?=$it['movedFromLName'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['movementAttachment'])){echo '<center>--<center>';}else{echo '<a href="movement/'.$it['movementAttachment'].'" target="_blank">'.$it['movementAttachment'].'</a>';} ?></span></label></td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="finalizeMovemRequest('<?= $it['movedFromApplicantID']; ?>');" class="btn btn-sm btn-success">Finalize</button>
                                <!-- <button type="button" onclick="rejectMovemRequest('<?= $it['movedFromApplicantID']; ?>');" class="btn btn-sm btn-danger">Reject</button> -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#tbl_req_status').DataTable( {
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