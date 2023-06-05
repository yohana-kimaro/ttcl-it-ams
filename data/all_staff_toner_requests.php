<?php 
require_once('../class/TonerRequest.php');
$toner_requests = $toner_request->all_staffs_toner_requests();
?>

<div class="table-responsive">
    <table id="tbl_toner_req_statu" class="table table-hover table-bordered">
        <thead> 
            <tr>
                <th>SN</th>
                <th>Requested On</th>
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
            <?php $snn=0; foreach ($toner_requests as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['requestedDate']; ?></td>
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
                                <?php if($_SESSION['userpf@ttclassetsystem'] ===(90820) || $_SESSION['userpf@ttclassetsystem'] ===(91024)){?>
                                <button type="button" onclick="approveTonerStaffReq('<?= $it['tonerApplID']; ?>');" class="btn btn-sm btn-success">Approve</button>
                                <button type="button" onclick="rejectTonerStaffReq('<?= $it['tonerApplID']; ?>');" class="btn btn-sm btn-danger">Reject</button>
                                <?php } ?>
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