<?php 
require_once('../class/Handover.php');
$handover_status = $handover->all_handover_status();
?>

<div class="table-responsive">
    <table id="datable_asset" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Date Of Handover</th>
                <th>Full Name</th>
                <!-- <th>Middle Name</th> -->
                <!-- <th>Serial No</th> -->
                <th>Asset Type</th>
                <!-- <th>Handover</th> -->
                <th>Handover from</th>
                <th>Handover to</th>
                <th>Attachment</th>
                <th>Confirmation</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($handover_status as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['handOverDate']; ?></td>
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <!-- <td><?= $it['secondName']; ?></td> -->
                <!-- <td><?= $it['serialNo']; ?></td> -->
                <td><?= $it['deviceType']; ?></td>
                <!-- <td><?= $it['ifHandOver']; ?></td> -->
                <td><?php echo $it['handOverFrom']; ?></td>
                <td><?php echo $it['handOverTo']; ?></td>
                <td><label><span class="w-130p d-block text-truncate"><?php if(empty($it['handOverAttachment'])){echo '<center>-</center>';}else{ echo '<a href="'; echo 'handover/'.$it['handOverAttachment'];?>" target="_blank">
                    <?php echo $it['handOverAttachment'];}?></a></span></label>
                </td>
                <td><center><?php if ($it['handOverConfirmation']=='No') {
                    echo '<span class="badge badge-secondary mt-15 mr-10">Pending</span>';
                }else if ($it['handOverConfirmation']=='Yes'){
                    echo '<span class="badge badge-success mt-15 mr-10">Success</span>';
                }?></center></td>
            </tr>
            
        <?php endforeach; ?>
        </tbody>
    </table>    
    <script>
        $(document).ready(function() {
            $('#datable_asset').DataTable( {
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