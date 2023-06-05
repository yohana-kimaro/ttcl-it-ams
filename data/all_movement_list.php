<?php 
require_once('../class/Movement.php');
$movement_form = $movement->all_staff_movement_form();
?>

<div class="table-responsive">
    <table id="tbl_req_move" class="table table-hover table-bordered">
        <thead> 
            <tr> 
                <th>SN</th>
                <!-- <th>Date Of Application</th> -->
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Last Name</th> -->
                <th>Device Type</th> 
                <th>Brand</th> 
                <th>Model</th> 
                <th>Quantity</th>
                <th>Serial No</th>
                <!-- <th>Justification</th> -->
                <!-- <th>Comment</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($movement_form as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <!-- <td><?= $it['appliedDate']; ?></td> -->
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['surName']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <td><?= $it['brand']; ?></td>
                <td><?= $it['model']; ?></td>
                <td><?= $it['quantity']; ?></td>
                <td><?= $it['serialNo'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <!-- <td><label><span class="w-130p d-block text-truncate"><?php if($it['handOverComment']=='NULL'){echo '<center>--<center>';}else if($it['handOverComment']!=='NULL'){echo $it['handOverComment'] .".&nbsp;Please upload again.";} ?></span></label></td> -->
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="attachMovementForm('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Movement</button>
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
            $('#tbl_req_move').DataTable( {
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