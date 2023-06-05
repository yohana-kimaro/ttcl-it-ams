<?php 
session_start();

include '../connection.php';
include '../connection_one.php';
$regID = $_SESSION['regID@ttclassetsystem'];
$regionID = $_SESSION['region@ttclassetsystem'];
$position = $_SESSION['userposit@ttclassetsystem'];
$positionCode = '';
$manager_pfNo = ''; 


    
 ?>


<div class="table-responsive">
  <table id="tbl_dept_status" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>SN</th>
        <th>Date of request</th>
        <th>PF No.</th>
        <th>Staff Name</th>
        <!-- <th>Middle Name</th>
        <th>Last Name</th> -->
        <th>Designation</th>
        <th>Reason For</th>
        <th>Justification</th>
        <th>Quantity</th>
        <th>Device Type</th>
        <th>Loss Report</th>
        <th>Direct Manager</th>
        <th>Date of Approval(DM)</th>
        <th>IT Support Supervisor</th>
        <th>Date of Verification(IT-SS)</th>
        <th>IT Manager</th>
        <th>Date of Approval(IT-M)</th>
        <th>Comment</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <?php 
        
        $snn=0;
        $sql_manager = "select * from Position where Name = '$position'";
  $sql_manager_run = sqlsrv_query($conn1, $sql_manager);
  while($manager_row = sqlsrv_fetch_array($sql_manager_run)) {
    $positionCode = $manager_row[1];
  }

  // search for manager pfno
  $sql_manager_pfNum = "select * from EmploymentDetails where PositionCode = '$positionCode' and regionID = '$regionID'";
  $sql_manager_pfNum_run = sqlsrv_query($conn1, $sql_manager_pfNum);
  while($manager_pfno_row = sqlsrv_fetch_array($sql_manager_pfNum_run)) {
    $manager_pfNo = $manager_pfno_row[0];
  }
  //echo $position;

  // search for staff of that direct manager
  $sql_pfno = "select * from vwASSETMANAGEMENT where (directManager = '".$position."')  and Region = '".$regID."'";
  $sql_pfno_run = sqlsrv_query($conn1, $sql_pfno);

  // search pfNumber in ApplicantTb
  $sql_appl = "SELECT distinct pfNo FROM APPLICANTTB";
  $sql_appl_run = sqlsrv_query($conn, $sql_appl);
  while ($my_data = sqlsrv_fetch_array($sql_pfno_run)){
    $sql = "SELECT * FROM APPLICANTTB as a where (a.pfNo = '$my_data[0]') order by a.applicantID";
    $query = sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' ));
      
      while($row=@sqlsrv_fetch_array($query)){$snn++;

        echo"<td>";?><?= $snn; ?><?php echo"</td>
        <td>$row[12]</td>
        <td>";?><?= $row['pfNo'];?><?php echo "</td>
      <td>";?> <?= $row['firstName']." &nbsp".$row['secondName']." &nbsp".$row['surName']; ?><?php echo "</td>
      
      <td>$row[5]</td>
      <td>$row[6]</td>
      <td>$row[7]</td>
      <td>$row[8]</td>
      <td>$row[9]</td>
      <td><center>";if(empty($row[10])){echo '--';}else{echo '<a href="upload/'.$row[10].'" target="_blank">'.$row[10].'</a>';}
      echo "</center></td>
      <td>";
      if(empty($row['directManager'])){echo 'No action';}else{
        if($row['directManager']==='Not checked by Direct Manager'){
          echo 'Not approved';
        }else if($row['directManager']==='Checked by Direct Manager'){
          echo 'Approved';
        }else if($row['directManager']==='Rejected'){
          echo 'Rejected';
        }else if($row['directManager']===''){
          echo 'No action';
        }
        }
      echo "</td>
      <td><center>"; if(empty($row[27])){echo '--';}else{echo $row[27];} echo"
      </center></td>
      <td>";
      if(empty($row['itSupportSupervisor'])){echo 'No action';}else{
        if($row['itSupportSupervisor']==='Not Verified by IT Support Supervisor'){
          echo 'Not verified';
        }else if($row['itSupportSupervisor']==='Verified by IT Support Supervisor'){
          echo 'Verified';
        }else if($row['itSupportSupervisor']==='Rejected'){
          echo 'Rejected';
        }
      }
      echo "</td>
      <td><center>"; if(empty($row[29])){echo '--';}else{echo $row[29];} echo"
      </center></td>
      <td>";if(empty($row['itManager'])){echo 'No action';}else{
        if($row['itManager']=='Not approvec by IT Manager'){
          echo 'Not approved';
        }else if($row['itManager']=='Approvec by IT Manager'){
          echo 'Approved';
        }else if($row['itManager']=='Rejected'){
          echo 'Rejected';
        }
      }
      echo "</td>
      <td><center>"; if(empty($row[28])){echo '--';}else{echo $row[28];} echo"
      </center></td>
      <td>";
      if($row['itManager'] =='Not approvec by IT Manager' && $row['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $row['directManager'] =='Not checked by Direct Manager' && $row['allocated'] == '') {
        echo "No action";
      }else if($row['itManager'] =='Not approvec by IT Manager' && $row['itSupportSupervisor'] =='Not Verified by IT Support Supervisor' && $row['directManager'] =='Not checked by Direct Manager' && $row['allocated'] != '') {
        echo $row['allocated'];
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $row['directManager'] ==='Checked by Direct Manager' && $row['allocated'] == '') {
        echo "On process";
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $row['directManager'] ==='Checked by Direct Manager' && $row['allocated'] != '') {
        echo $row['allocated'];
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor'] ==='Verified by IT Support Supervisor' && $row['directManager'] ==='Checked by Direct Manager' && $row['allocated'] == '') {
        echo "On process";
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor']==='Verified by IT Support Supervisor' && $row['directManager'] ==='Checked by Direct Manager' && $row['allocated'] != '') {
        echo $row['allocated'];
      }else if($row['itManager'] =='Approvec by IT Manager' && $row['itSupportSupervisor']=='Verified by IT Support Supervisor' && $row['directManager'] =='Checked by Direct Manager'){
        echo "Succeeded";
      }else if($row['itManager'] ==='Rejected' && $row['itSupportSupervisor']==='Verified by IT Support Supervisor' && $row['directManager'] ==='Checked by Direct Manager'){
        echo $row['comment'];
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor'] ==='Not Verified by IT Support Supervisor' && $row['directManager'] ==='Rejected' && $row['allocated'] == '') {
        echo $row['comment'];
      }else if($row['itManager'] ==='Not approvec by IT Manager' && $row['itSupportSupervisor']==='Rejected' && $row['directManager'] ==='Checked by Direct Manager'){
        echo $row['comment'];
      }else if((empty($row['itManager'])) && (empty($row['itSupportSupervisor'])) && (empty($row['directManager']))){
        echo "";
      }
      echo "</td>
        </tr>
    </tbody>";
  }}?>
    <!-- <tfoot>
      <tr>
        <th scope='col'>SN</th>
        <th scope='col'>Date of request</th>
        <th scope='col'>PF No.</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Middle Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Designation</th>
        <th scope='col'>Reason For</th>
        <th scope='col'>Justification</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Device Type</th>
        <th scope='col'>Loss Report</th>
        <th scope='col'>Direct Manager</th>
        <th scope='col'>Date of Approval(DM)</th>
        <th scope='col'>IT Support Supervisor</th>
        <th scope='col'>Date of Verification(IT-SS)</th>
        <th scope='col'>IT Manager</th>
        <th scope='col'>Date of Approval(IT-M)</th>
        <th scope='col'>Comment</th>
      </tr>
    </tfoot> -->
  </table>
  <script>
        $(document).ready(function() {
            $('#tbl_dept_status').DataTable( {
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