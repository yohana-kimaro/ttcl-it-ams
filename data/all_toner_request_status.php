<?php 
require_once('../class/TonerRequest.php');
$toner_requests = $toner_request->all_toner_request_status();
?>

<div class="table-responsive">
    <table id="tbl_toner_req_status" class="table table-hover table-bordered">
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
                <th>Status</th>
                <th>Comment</th>
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
                <td><?php if ($it['itSupportSupervisor']=='Toner cartridge request not approved') { echo '<span class="badge badge-secondary mt-15 mr-10">No action</span>';}else if ($it['itSupportSupervisor']=='Rejected') { echo '<span class="badge badge-danger mt-15 mr-10">Rejected</span>';}else if ($it['itSupportSupervisor']=='Toner cartridge request approved') { echo '<span class="badge badge-success mt-15 mr-10">Approved</span>';} ?></td>
                <td><?php if (empty($it['rejectionComment'])){echo '<center>-</center>';}else if ($it['rejectionComment']!='NULL'){echo $it['rejectionComment'];} ?></td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <?php 
                                if ($it['itSupportSupervisor']=='Toner cartridge request not approved') {?>
                                    <button type="button" onclick="deleteTonerStaffRequest('<?= $it['tonerApplID']; ?>');" class="btn btn-sm btn-danger">Delete</button>
                                <?php }else if ($it['itSupportSupervisor']=='Toner cartridge request approved') {
                                    echo '<center>-</center>';
                                }else if ($it['itSupportSupervisor']=='Rejected') {?>
                                    <button type="button" onclick="deleteTonerStaffRequest('<?= $it['tonerApplID']; ?>');" class="btn btn-sm btn-danger">Delete</button>
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