<?php 
require_once('../class/TonerRequest.php');
$toner_requests = $toner_request->all_staffs_toner_allocated();
?>

<div class="table-responsive">
    <table id="tbl_toner_req_statu" class="table table-hover table-bordered">
        <thead> 
            <tr>
                <th>SN</th>
                <th>Allocated</th>
                <!-- <th>PF Number</th> -->
                <th>Full Name</th>
                <!-- <th>Designation</th>
                <th>Region</th> -->
                <th>Toner requested</th>
                <th>Toner Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($toner_requests as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['tonerAllocationDate']; ?></td>
                <!-- <td><?= $it['pfNumber']; ?></td> -->
                <td><?= $it['firstName'];?>  <?=$it['secondName'];?>  <?=$it['lastName']; ?></td>
                <!-- <td><?= $it['designation']; ?></td>
                <td><?= $it['region']; ?></td> -->
                <td><?= $it['requestedTonerModel']; ?></td>
                <td><?= $it['requestedQuantity']; ?></td>
            </tr>            
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#tbl_toner_req_statu').DataTable( {
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