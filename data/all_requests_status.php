<?php 
require_once('../class/RequestsStatus.php');
$requests_statuss = $requests_status->all_requests_status();
?>

<div class="table-responsive">
    <table id="datable_asset" width="100%" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Date Of Application</th>
                <th>Full Name</th>
                <th>Asset Type</th>
                <th>Direct Manager</th>
                <th>IT Support</th>
                <th>ISS Manager</th>
                <th width="20%">Comments</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            <?php $snn=0; foreach ($requests_statuss as $it): $snn++; ?>
            <tr>
                <td><?= $snn; ?></td>
                <td><?= $it['appliedDate']; ?></td>
                <td><?= $it['firstName']." &nbsp".$it['secondName']." &nbsp".$it['surName']; ?></td>
                <td><?= $it['deviceType'] ."  ".$it['quantity']; ?></td>
                <td><?php if(empty($it['directManager'])){echo '<span class="badge badge-light">No action</span>';}else{
                    if($it['directManager']==='Not checked by Direct Manager'){
                        echo '<span class="badge badge-secondary">No action</span>';
                    }else if($it['directManager']==='Checked by Direct Manager'){
                        echo '<span class="badge badge-success">Approved</span>';
                    }else if($it['directManager']==='Rejected'){
                        echo '<span class="badge badge-danger">Rejected</span>';
                    }else if($it['directManager']===''){
                        echo '<span class="badge badge-light">No action</span>';
                    }
                } ?></td>
                <td><?php if(empty($it['itSupportSupervisor'])){echo '<span class="badge badge-secondary">No action</span>';}else{
                    if($it['itSupportSupervisor']==='Not Verified by IT Support Supervisor'){
                        echo '<span class="badge badge-secondary">No action</span>';
                    }else if($it['itSupportSupervisor']==='Verified by IT Support Supervisor'){
                        echo '<span class="badge badge-success">Verified</span>';
                    }else if($it['itSupportSupervisor']==='Rejected'){
                        echo '<span class="badge badge-danger">Rejected</span>';
                    }
                } ?></td>
                <td><?php if(empty($it['itManager'])){echo '<span class="badge badge-secondary">No action</span>';}else{
                    if($it['itManager']=='Not approvec by IT Manager'){
                        echo '<span class="badge badge-secondary">No action</span>';
                    }else if($it['itManager']=='Approvec by IT Manager'){
                        echo '<span class="badge badge-success">Approved</span>';
                    }else if($it['itManager']=='Rejected'){
                        echo '<span class="badge badge-danger">Rejected</span>';
                    }
                } ?></td>

                <td>
                    <?php if($it['itManager'] =='Not approvec by IT Manager' && $it['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $it['directManager'] =='Not checked by Direct Manager' && $it['allocated'] == '') {
                        echo "<center>-</center>";
                      }else if($it['itManager'] =='Not approvec by IT Manager' && $it['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $it['directManager'] =='Not checked by Direct Manager' && $it['allocated'] != '') {
                          echo $it['allocated'];
                      }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] == '') {
                        echo "On process";
                      }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] != '') {
                        echo $it['allocated'];
                      }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] == '') {
                        echo "On process";
                      }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor']==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] == 'No') {
                        echo 'On process';
                      }else if($it['itManager'] =='Approvec by IT Manager' && $it['itSupportSupervisor']=='Verified by IT Support Supervisor' && $it['directManager'] =='Checked by Direct Manager' && $it['allocated'] == 'No'){
                        echo "You are on the allocation waiting list. Once devices are available. You will be notified";
                      }else if($it['itManager'] =='Approvec by IT Manager' && $it['itSupportSupervisor']=='Verified by IT Support Supervisor' && $it['directManager'] =='Checked by Direct Manager' && $it['allocated'] == 'Yes' && $it['itSupportAllocationJustif'] != ''){
                        echo "Allocated";
                      }else if($it['itManager'] =='Approvec by IT Manager' && $it['itSupportSupervisor']=='Verified by IT Support Supervisor' && $it['directManager'] =='Checked by Direct Manager' && $it['allocated'] == 'Yes' && $it['itSupportAllocationJustif'] != ''){
                        echo "Complete and Asset allocated";
                      }else if($it['itManager'] ==='Rejected' && $it['itSupportSupervisor']==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager'){?> 
                        <button onclick="checkRejectedComment('<?= $it['applicantID']; ?>');" class="btn btn-danger btn-wth-icon icon-wthot-bg btn-sm icon-right"><span class="btn-text">Why rejected</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>
                      <?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Rejected' && $it['allocated'] == '') {?>
                        <button onclick="checkRejectedComment('<?= $it['applicantID']; ?>');" class="btn btn-danger btn-wth-icon icon-wthot-bg btn-sm icon-right"><span class="btn-text">Why rejected</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>

                      <?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor']==='Rejected' && $it['directManager'] ==='Checked by Direct Manager'){?>
                        <button onclick="checkRejectedComment('<?= $it['applicantID']; ?>');" class="btn btn-danger btn-wth-icon icon-wthot-bg btn-sm icon-right"><span class="btn-text">Why rejected</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>
                      <?php }else if((empty($it['itManager'])) && (empty($it['itSupportSupervisor'])) && (empty($it['directManager']))){
                        echo "";
                      } ?>
                  </td>


                <td><?php if($it['itManager'] =='Not approvec by IT Manager' && $it['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $it['directManager'] =='Not checked by Direct Manager' && $it['allocated'] == '') {?>
                    <center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                    <?php }else if($it['itManager'] =='Not approvec by IT Manager' && $it['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $it['directManager'] =='Not checked by Direct Manager' && $it['allocated'] != ''){?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                    <?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] == '') {
                        echo "<center>--</center>";
                    }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] != ''){
                    ?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                   <?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] == '') {
                    echo "<center>--</center>";
                   }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor']==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager' && $it['allocated'] != '') {?>
                    <center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                   <?php }else if($it['itManager'] =='Approvec by IT Manager' && $it['itSupportSupervisor']=='Verified by IT Support Supervisor' && $it['directManager'] =='Checked by Direct Manager'){
                          echo "<center>--</center>";
                    }else if($it['itManager'] ==='Rejected' && $it['itSupportSupervisor']==='Verified by IT Support Supervisor' && $it['directManager'] ==='Checked by Direct Manager'){?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center><?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $it['directManager'] ==='Rejected' && $it['allocated'] == '') {?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                    <?php }else if($it['itManager'] ==='Not approvec by IT Manager' && $it['itSupportSupervisor']==='Rejected' && $it['directManager'] ==='Checked by Direct Manager'){?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center><?php }else if((empty($it['itManager'])) && (empty($it['itSupportSupervisor'])) && (empty($it['directManager']))){?><center><button onclick="deleteRequestModal('<?= $it['applicantID']; ?>');" type="button" class="btn btn-sm btn-danger">Delete</button></center>
                <?php }?>
                </td>
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
$requests_status->Disconnect();
?>