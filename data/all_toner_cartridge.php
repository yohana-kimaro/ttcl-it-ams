<?php 
require_once('../class/Toner.php');
$toner_lists = $toner->all_toner_lists();
?>

<div class="table-responsive">
    <table id="tbl_req_status" class="table table-hover table-bordered">
        <thead> 
            <tr>
                <th>SN</th>
                <th>Recorded on</th>
                <th>Toner brand</th>
                <th>Toner model</th>
                <th>Toner status</th>
                <?php if($_SESSION['userpf@ttclassetsystem'] ===90820 || $_SESSION['userpf@ttclassetsystem'] ===91019 || $_SESSION['userpf@ttclassetsystem'] ===91024) { ?>
                <th><center>Actions</center></th>
            <?php } ?> 
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($toner_lists as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['addedOn']; ?></td>
                <td><?= $it['tonerBrand']; ?></td>
                <td><?= $it['tonerModel']; ?></td>
                <td><?= $it['tonerStatus']; ?></td>
                <?php if($_SESSION['userpf@ttclassetsystem'] ===90820 || $_SESSION['userpf@ttclassetsystem'] ===91019 || $_SESSION['userpf@ttclassetsystem'] ===91024 || $_SESSION['userpf@ttclassetsystem'] === 91024) { ?>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <div class="button-list">
                                <button type="button" onclick="updateTonerCartridge('<?= $it['tonerID']; ?>');" class="btn btn-sm btn-success">Update</button>
                                <button type="button" onclick="deleteTonerCartridge('<?= $it['tonerID']; ?>');" class="btn btn-sm btn-danger">Delete</button>
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
$toner->Disconnect();
?>