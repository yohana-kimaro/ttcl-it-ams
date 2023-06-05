<?php 
require_once('../class/ITSupportSupervisor.php');
$it_support_supervisors = $it_support_supervisor->all__iss_allocation_requests();
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
                <?php if($_SESSION['userpf@ttclassetsystem'] === (90820)){ ?>
                <th>Actions</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($it_support_supervisors as $it): $snn++; ?>
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
                <?php if($_SESSION['userpf@ttclassetsystem'] === (90820)){?>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="allocateITSSRequest('<?= $it['applicantID']; ?>');" class="btn btn-sm btn-success">Allocate</button>
                            </div>
                        </div>
                    </div>
                </td>
                <?php }?>
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
$it_support_supervisor->Disconnect();
?>