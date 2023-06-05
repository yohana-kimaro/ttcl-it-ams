<?php 
require_once('../class/ITDevices.php');
$it_assets = $it_devices->all_it_devices();
?>

<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead> 
            <tr> 
                <th>SN</th>
                <th>Serial No</th>
                <th>Device Type</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Capacity</th>
                <th>RAM</th>
                <th>Storage</th>
                <th>Year</th>
                <?php if($_SESSION['userpf@ttclassetsystem']===91019||$_SESSION['userpf@ttclassetsystem']===91024||$_SESSION['userpf@ttclassetsystem'] === 90820) { ?>
                <th>Actions</th>
            <?php } ?> 
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($it_assets as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['serialNo']; ?></td>
                <td><?= $it['itAssetType']; ?></td>
                <td><?= $it['brand']; ?></td>
                <td><?= $it['model']; ?></td>
                <td><?= $it['capacity']; ?></td>
                <td><?= $it['RAM']; ?></td>
                <td><?= $it['storage'];?></td>
                <td><?= $it['purchasedYear']; ?></td>
                <?php if($_SESSION['userpf@ttclassetsystem']===91019||$_SESSION['userpf@ttclassetsystem']===91024||$_SESSION['userpf@ttclassetsystem'] === 90820) { ?>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="viewmoreITAsset('<?= $it['serialNo']; ?>');" class="btn btn-sm btn-info">View</button>
                                <!-- <button type="button" onclick="updateITAsset('<?= $it['serialNo']; ?>');" class="btn btn-sm btn-success">Update</button> -->
                                <button type="button" onclick="deleteITAsset('<?= $it['serialNo']; ?>');" class="btn btn-sm btn-danger">Delete</button>
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
$it_devices->Disconnect();
?>