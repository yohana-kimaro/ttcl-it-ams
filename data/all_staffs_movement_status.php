<?php 
require_once('../class/Movement.php');
$movement_status = $movement->all_movement_status();
?>

<div class="table-responsive">
    <table id="datable_asset_status" class="table table-hover table-bordered">
        <thead>
            <tr>
                  <th>SN</th>
                  <th>Movement date</th>
                  <!-- <th>PF No</th> -->
                  <th>Moved from</th>
                  <!-- <th>Department</th> -->
                  <!-- <th>Duty station</th> -->
                  <th>Serial No</th>
                  <!-- <th>Device Type</th> -->
                  <!-- <th>PF Number(receiving)</th> -->
                  <th>Moved to</th>
                  <!-- <th>Department(receiving)</th> -->
                  <!-- <th>Duty station(receiving)</th> -->
                  <th>IT Support Supervisor</th>
                  <th>IT Support Engineer</th>
                  <th>RP&AM</th>
                  <th>Comment</th>
                  <th>Movement rejected</th>
                  <!-- <th>Staff movement comment</th> -->
                </tr>
            </thead>
            <tbody>
                <?php   $snn=0; foreach($movement_status as $it): $snn++; ?>
                    <tr>
                        <td><?= $snn; ?></td>                        
                        <td><?php echo $it['movedFromDate']; ?></td>
                        <!-- <td><?= $it['PFNumber']; ?></td> -->
                        <td><?= $it['movedFromName'];?>  <?= $it['movedFromMName'];?>  <?=$it['movedFromLName'];?></td>
                        <!-- <td><?php echo $it['movedFromDep']; ?></td> -->
                        <!-- <td><?php echo $it['movedFromDutyS']; ?></td> -->
                        <td><?php echo $it['devFromSeralNo']; ?></td>
                        <!-- <td><?php echo $it['movedFromDevType']; ?></td> -->
                        <!-- <td><?php echo $it['moveTopfNo']; ?></td> -->
                        <td><?= $it['movedTOName'];?>  <?=$it['movedTomName'];?>  <?=$it['movedTolName']; ?></td>
                        <!-- <td><?php echo $it['movedToDep']; ?></td> -->
                        <!-- <td><?php echo $it['movedToDutyS']; ?></td> -->
                        <!--DIRECT MANAGER-->
                        <td>
                            <?php 
                            if(empty($it['itSuppSA'])){echo 'No action';}else{
                                if($it['itSuppSA']==='Not approved by Supervisor IT Support'){
                                    echo '<span class="badge badge-secondary mt-15">Pending</span>';
                                }else if($it['itSuppSA']==='Approved by Supervisor IT Support'){
                                    echo 'Approved';
                                }else if($it['itSuppSA']==='Rejected'){
                                    echo 'Rejected';
                                }else if($it['itSuppSA']===''){
                                    echo 'No action';
                                }
                            }
                            ?>                            
                        </td>

                        <!--IT Support Supervisor Engineer Column-->
                        <td>
                            <?php
                            if(empty($it['itSuppEA'])){echo 'No action';}else{
                        if($it['itSuppEA']==='Not approved by IT Support Engineer'){
                            echo '<span class="badge badge-secondary mt-15">Pending</span>';
                          }else if($it['itSuppEA']==='Approved by IT Support Engineer'){
                            echo 'Approved';
                            }else if($it['itSuppEA']==='Rejected'){
                              echo 'Rejected';
                            }
                          }
                            ?>
                        </td>

                        <!--RP&AM Column-->
                        <td>
                            <?php
                            if(empty($it['rpamA'])){echo 'No action';}else{
                        if($it['rpamA']=='Not approved by RP&AM'){
                            echo '<span class="badge badge-secondary mt-15">Pending</span>';
                          }else if($it['rpamA']=='Approved by RP&AM'){
                            echo 'Approved';
                            }else if($it['rpamA']=='Rejected'){
                              echo 'Rejected';
                            }
                          }
                            ?>                             
                         </td>
                        <td>
                            <?php 
                            if($it['rpamA'] =='Not approved by RP&AM' && $it['itSuppEA'] =='Not approved by IT Support Engineer' && $it['itSuppSA'] =='Not approved by Supervisor IT Support' && $it['ifMovemDone'] == '') {
                        echo "No action";
                      }else if($it['rpamA'] =='Not approved by RP&AM' && $it['itSuppEA'] =='Not approved by IT Support Engineer' && $it['itSuppSA'] =='Not approved by Supervisor IT Support' && $it['ifMovemDone'] != '') {
                          echo $it['ifMovemDone'];
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA'] ==='Not approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support' && $it['ifMovemDone'] == '') {
                        echo "On process";
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA'] ==='Not approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support' && $it['ifMovemDone'] != '') {
                        echo $it['ifMovemDone'];
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA'] ==='Approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support' && $it['ifMovemDone'] == '') {
                        echo "On process";
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA']==='Approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support' && $it['ifMovemDone'] != '') {
                        echo $it['ifMovemDone'];
                      }else if($it['rpamA'] ==='Approved by RP&AM' && $it['itSuppEA']==='Approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support'){
                        echo "Succeeded";
                      }else if($it['rpamA'] ==='Rejected' && $it['itSuppEA']==='Approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support'){
                        echo $it['movemRejectComm'];
                      }else if($it['rpamA'] ==='Rejected' && $it['itSuppEA']==='Not approved by IT Support Engineer' && $it['itSuppSA'] ==='Approved by Supervisor IT Support'){
                        echo $it['movemRejectComm'];
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA'] ==='Not approved by IT Support Engineer' && $it['itSuppSA'] ==='Rejected') {
                        echo $it['movemRejectComm'];
                      }else if($it['rpamA'] ==='Not approved by RP&AM' && $it['itSuppEA']==='Rejected' && $it['itSuppSA'] ==='Approved by Supervisor IT Support'){
                        echo $it['movemRejectComm'];
                      }else if((empty($it['rpamA'])) && (empty($it['itSuppEA'])) && (empty($it['itSuppSA']))){
                        echo "No action";
                      }
                            ?>                             
                        </td>
                        <td><center><?php echo $it['ifMovementRejected']; ?></center></td>
                        <!-- <td><?php if(empty($it['movemRejectComm'])){echo '<center>--</center>';}else{
                        echo $it['movemRejectComm']; } ?></td> -->
                    </tr>
            
        <?php endforeach; ?>
        </tbody>
    </table>    
    <script>
        $(document).ready(function() {
            $('#datable_asset_status').DataTable( {
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