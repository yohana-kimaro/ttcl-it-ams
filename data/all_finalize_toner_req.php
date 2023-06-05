<?php 
require_once('../class/TonerRequest.php');
$toner_allocations = $toner_request->all_toner_staff_finalize_req();
?>

<div class="table-responsive">
    <table id="tbl_toner_req_status" class="table table-hover table-bordered">
        <thead> 
            <tr>
                <th>SN</th>
                <th>Staff Confirmed it On</th>
                <!-- <th>PF Number</th> -->
                <th>Full Name</th>
                <!-- <th>Designation</th>
                <th>Region</th> -->
                <th>Toner requested</th>
                <th>Toner Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($toner_allocations as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['receivingVerificDate']; ?></td>
                <!-- <td><?= $it['pfNumber']; ?></td> -->
                <td><?= $it['firstName'];?>  <?=$it['secondName'];?>  <?=$it['lastName']; ?></td>
                <!-- <td><?= $it['designation']; ?></td>
                <td><?= $it['region']; ?></td> -->
                <td><?= $it['requestedTonerModel']; ?></td>
                <td><?= $it['requestedQuantity']; ?></td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="finalizeTonerStaffAlloc('<?= $it['tonerApplID']; ?>');" class="btn btn-sm btn-success">Finalize</button>
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
            $('#tbl_toner_req_status').DataTable( {
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
$toner_request->Disconnect();
?>