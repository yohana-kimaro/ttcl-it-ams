<?php 
require_once('../class/TotalAllocationLists.php');
$allocationLists = $allocationList->total_allocation_lists();
?>
 
<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead> 
            <tr>
                <th>SN</th>
                <th>Date Of Application</th>
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Last Name</th> -->
                <th>Device Type</th> 
                <!-- <th>Quantity</th> -->
                <th>Serial No</th>
                <!-- <th>Justification</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($allocationLists as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['appliedDate']; ?></td>
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['surName']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <!-- <td><?= $it['quantity']; ?></td> -->
                <td><?= $it['serialNo'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="viewOtherAllocatedAssetSpec('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">View More</button>
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
$allocationList->Disconnect();
?>