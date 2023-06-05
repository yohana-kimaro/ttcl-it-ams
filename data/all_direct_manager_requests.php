<?php 
require_once('../class/DirectManager.php');
$direct_managers = $direct_manager->all_direct_manager_requests();
?>

<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <!-- <th>Request Date </th> -->
                <th>First Name</th>
                <!-- <th>Middle Name</th> -->
                <th>Last Name</th> 
                <th>Device Type</th>
                <th>Quantity</th>
                <th>Reason For</th>
                <!-- <th>Justification</th> -->
                <th>Loss Report</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($direct_managers as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <!-- <td><label><span class="w-100p d-block text-truncate"><?= $it['appliedDate']; ?></span></label></td> -->
                <td><?= $it['firstName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <td><?= $it['surName']; ?></td>
                <td><?= $it['deviceType']; ?></td>
                <td><?= $it['quantity']; ?></td>
                <td><?= $it['reasonFor'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['image'])){echo '<center>--<center>';}else{echo '<a href="upload/'.$it['image'].'" target="_blank">'.$it['image'].'</a>';} ?></span></label></td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="approveDirectManagerRequest('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Approve</button>
                                <button type="button" onclick="rejectDirectManagerRequest('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-danger">Reject</button>
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
$direct_manager->Disconnect();
?>