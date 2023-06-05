<?php
session_start();

include "connection.php";
include "connection_one.php"; 


// if session not set go to login page
if(!isset($_SESSION['username@ttclassetsystem'])){
}
if(isset($_SESSION['username@ttclassetsystem'])){
  header('location:index.php');
} 

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>TTCL-IT-AMS | Staff Signin</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    
    <!-- Toggles CSS -->
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader-it">
      <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
    
    <!-- HK Wrapper -->
    <div class="hk-wrapper">
      
      <div class="hk-pg-wrapper hk-auth-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12 pa-0">
              <div class="auth-form-wrap pt-xl-0 pt-70">
                <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                  <div class="card">
                  <div class="card-body">
                    <a class="auth-brand text-center d-block" href="#">
                      <img class="brand-img" src="dist/img/ttcl.png" alt="TTCL Corporation"/>
                    </a>
                    <a class="auth-brand text-center d-block">
                      <h6>TTCL IT ASSETS MANAGEMENT SYSTEM</h6>
                    </a>
                    <a class="auth-brand text-center d-block">
                      <h6>TTCL-IT-AMS | STAFF'S PANEL</h6>
                    </a>
                    <form class="pt-3" id="login-form" method="post">
                      <?php
                      if(isset($_SESSION['ldapError'])){
                        if ($_SESSION['ldapError'] == 1) {
                          $_SESSION['ldapError'] = 0;
                          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Incorrect username <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>';
                        }

                        if ($_SESSION['ldapError'] == 2) {
                          $_SESSION['ldapError'] = 0;
                          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Incorrect password <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>';
                        }
                      }
                      ?>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg" id="itamsUname" name="itamsUname" placeholder="Eg. john.doe" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="itamsPword" name="itamsPword" placeholder="Password" required>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn" name="login_button" id="login_button">SIGN IN</button>
                      </div>
                      <div class="mt-3">
                        <p class="text-right"><a href="./usermanual/TTCL IT ASSETS MANAGEMENT SYSTEM USER MANUAL.pdf" target="_blank"  style="color: #0d1113;"><strong>USER MANUAL</strong></a></p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    </div>
    <!-- /HK Wrapper -->
    
    <!-- JavaScript -->
    
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/jquery-3.6.0.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/login.js"></script>
  </body>
</html>

<?php 

$_SESSION['login'] = 0;

if(isset($_POST['login_button'])) {
  $username = $_POST['itamsUname'];
  $username=addslashes($username);
  $password = $_POST['itamsPword'];

  // $username=htmlspecialchars(strtolower($username));
  // set time for session timeout
  $currentTime = time() + 25200;
  $expired = 3600;

  // LDAP Connection
  $ldap_dn = "ttclhq"."\\".trim($username);
  $ldap_password = $password;
 
  // echo $ldap_dn;

  // Set debugging
  ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
  $ldap_con = ldap_connect("ttcl.co.tz");

  if($ldap_con){
    // echo "connected<br>";
  }
  else{
    echo "not connected..!";
  }

  ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
  ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);

  // binding to ldap server
  $ldapbind = false;

   $ldapbind = ldap_bind($ldap_con, $ldap_dn, $ldap_password);


  // check a user in db first
  $ldap_to_db = "select pfNumber from Employee where username = '".$username."'";
  $ldap_to_db_run = sqlsrv_query($conn1, $ldap_to_db);
  $ldap_to_db_run2 = sqlsrv_has_rows($ldap_to_db_run);

  // echo $ldap_to_db_run2;

  if($ldap_to_db_run2 === true) {
    if(!$ldapbind) {
  echo "Bind successful!";
    // "ou=TTCL-STAFF, dc=HIS-STAFF"
    // $filter = "(uid=yohana.kimaro)";
      //  $Username = $username;
      //  $filter = '(sAMAccountName='. $Username .')';
      //  $ld_data = array('dn=*');
      //  $result = ldap_search($ldap_con,"ou=Users,dc=ttcl,dc=co.tz",$filter,$ld_data) or exit("Unable to search");
      //  $entries = ldap_get_entries($ldap_con, $result);
      //  $pfNo = '';

      $exist = sqlsrv_has_rows($ldap_to_db_run);
      if($exist != true){
        $_SESSION['login'] = 1;
      // header("Location: login.php");
        echo "string";
      }else{
        while ($row = sqlsrv_fetch_array($ldap_to_db_run)) {
          $pfNo = $row[0];

        }
        $sql_position = "select p.Name,e.regionID from EmploymentDetails as e, Position as p where e.positionCode = p.positionCode and e.pfNumber = '$pfNo'";
        $ldap_position_run = sqlsrv_query($conn1, $sql_position);
        while ($rows = sqlsrv_fetch_array($ldap_position_run)) {
          $_SESSION['userposit@ttclassetsystem'] = $rows[0];
          $_SESSION['userpf@ttclassetsystem'] = $pfNo;
          $_SESSION['region@ttclassetsystem'] = $rows[1];
          $_SESSION['username@ttclassetsystem'] = $username;
          $_SESSION['version@ttclassetsystem']='1.3.0';
          $_SESSION['timeout'] = $currentTime + $expired;
        }

        $sqlReqID="SELECT * FROM vwASSETMANAGEMENT WHERE pfNumber = '".$_SESSION['userpf@ttclassetsystem']."'";
        $RegIDQ = sqlsrv_query($conn1, $sqlReqID);
        while ($xyzV12 = sqlsrv_fetch_array($RegIDQ)) {
          echo $xyzV12[7];
          $_SESSION['regID@ttclassetsystem']=$xyzV12[7];
          $_SESSION['staffFName@ttclassetsystem']=$xyzV12['firstName'];
          $_SESSION['staffLName@ttclassetsystem']=$xyzV12['lastName'];
          $_SESSION['regionName@ttclassetsystem']=$xyzV12['Region'];
        }

        // $str = "Manager Information Solutions and Services";
        $pattern = "/manager/i";
        $pattern2 = "/director/i";
        $match = preg_match($pattern, $_SESSION['userposit@ttclassetsystem']);
        $match2 = preg_match($pattern2, $_SESSION['userposit@ttclassetsystem']);
        $_SESSION['dmanager'] = ($match or $match2);

        if($_SESSION['username@ttclassetsystem']){
          $_SESSION['username@ttclassetsystem'] = $username;
          header("Location: index.php");

        }else {
          $_SESSION['userpf@ttclassetsystem'] = $pfNo;
          header("Location: index.php");
        }
      }

    } else {

      $_SESSION['ldapError'] = 2;
      header("Location: signin.php");

    }
  }else {
    $_SESSION['ldapError'] = 1;
    header("Location: signin.php");
  }
}

?>