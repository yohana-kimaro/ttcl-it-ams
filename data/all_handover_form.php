<?php 
require_once('../class/Handover.php');
$handover_form = $handover->all_handover_form();
?>
 
<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead> 
            <tr> 
                <th>SN</th>
                <!-- <th>Date Of Application</th> -->
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Last Name</th> -->
                <th>Device Type</th> 
                <th>Quantity</th>
                <th>Serial No</th>
                <!-- <th>Justification</th> -->
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($handover_form as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <!-- <td><?= $it['appliedDate']; ?></td> -->
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['surName']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <td><?= $it['quantity']; ?></td>
                <td><?= $it['serialNo'];?></td>
                <!-- <td><?= $it['justification'];?></td> -->
                <td><label><span class="w-130p d-block text-truncate"><?php if($it['handOverComment']=='NULL'){echo '<center>--<center>';}else if($it['handOverComment']!=='NULL'){echo $it['handOverComment'] .".&nbsp;Please upload again.";} ?></span></label></td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="attachHandoverForm('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Handover</button>
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
$handover->Disconnect();
?>