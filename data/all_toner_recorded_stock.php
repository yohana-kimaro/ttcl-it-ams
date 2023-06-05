<?php 
require_once('../class/TonerStock.php');
$toner_stocks = $toner_stock->all_toner_stock_list();
?>

<div class="table-responsive">
    <table id="tbl_req_toner_stock" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Stock added on</th>
                <th>Toner Brand</th>
                <th>Toner Model</th>
                <th>Tonner Status</th>
                <th>Stock Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($toner_stocks as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?php if (empty($it['tonerStockAddedOn'])) { echo "<center>-</center>";}else{ echo $it['tonerStockAddedOn'];} ?></td>
                <td><?= $it['tonerBrand']; ?></td>
                <td><?= $it['tonerModel']; ?></td>
                <td><?= $it['tonerStatus']; ?></td>
                <td><?php if (empty($it['tonerStockQuantity'])) { echo "<center>-</center>";}else{ echo $it['tonerStockQuantity'];} ?></td>
            </tr>
            
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#tbl_req_toner_stock').DataTable( {
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
$toner_stock->Disconnect();
?>