<?php 
require_once('../class/Handover.php');
$handover_staff_req = $handover->all_handover_staffs_requests();
?>
 
<div class="table-responsive">
    <table id="tbl_staff_req" class="table table-hover table-bordered">
        <thead> 
            <tr> 
                <th>SN</th>
                <th>Handover Date </th>
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Last Name</th> -->
                <th>Device Type</th> 
                <th>Quantity</th>
                <th>Serial No</th>
                <!-- <th>Justification</th> -->
                <th>Attachment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($handover_staff_req as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['handOverDate']; ?></td>
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['surName']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <td><?= $it['quantity']; ?></td>
                <td><?= $it['serialNo'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['handOverAttachment'])){echo '<center>--<center>';}else{echo '<a href="./handover/'.$it['handOverAttachment'].'" target="_blank">'.$it['handOverAttachment'].'</a>';} ?></span></label>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="approveHandoverStaffRequest('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Approve</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="rejectHandoverStaffRequest('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-danger">Reject</button>
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
$handover->Disconnect();
?>