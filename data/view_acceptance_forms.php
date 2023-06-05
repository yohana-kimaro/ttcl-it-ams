<?php 
require_once('../class/ITAcceptanceForms.php');
$itsupportreqs = $itsupportreq->all_it_accept_request();
?>

<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <!-- <th>Request Date </th> -->
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Last Name</th> -->
                <th>Device Type</th>
                <th>Quantity</th>
                <th>Serial No</th>
                <!-- <th>Justification</th> -->
                <th>Acceptance Form</th>
                <?php if($_SESSION['userpf@ttclassetsystem'] ===90820) {?>
                <th>Actions</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($itsupportreqs as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <!-- <td><label><span class="w-100p d-block text-truncate"><?= $it['appliedDate']; ?></span></label></td> -->
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['surName']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <td><?= $it['quantity']; ?></td>
                <td><?= $it['serialNo'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['acceptance'])){echo '<center>--<center>';}else{echo '<a href="acceptance/'.$it['acceptance'].'" target="_blank">'.$it['acceptance'].'</a>';} ?></span></label></td>
                <?php if($_SESSION['userpf@ttclassetsystem'] === 90820) {?>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="acceptITAcceptanceForm('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Verify</button>
                                <button type="button" onclick="rejectITAcceptanceForm('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-danger">Reject</button>
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
$itsupportreq->Disconnect();
?>