<?php
include('session.php'); 
include("connection.php");
include("connection_one.php");

if($_SESSION['userpf@ttclassetsystem']===91019||$_SESSION['userpf@ttclassetsystem']===91024||$_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['userpf@ttclassetsystem'] === 90914 || $_SESSION['userpf@ttclassetsystem'] === 91024){

}else{ 
  header("Location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>TTCL IT AMS | Record toner cartridges</title>
    <meta name="description" content="TTCL IT Assets Management System" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <link rel="icon" href="dist/img/favicon.png" type="image/x-icon">
    
    <!-- Toggles CSS -->
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

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
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="index.php">
                <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="TTCL IT AMS" />
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="dist/img/userprofile.png" alt="Profile" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span><?php echo $_SESSION['staffFName@ttclassetsystem']."&nbsp;". $_SESSION['staffLName@ttclassetsystem'];?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item"><i class="dropdown-icon zmdi zmdi-card"></i><span><?php echo $_SESSION['userposit@ttclassetsystem'];?></span></a>
                        <a class="dropdown-item"><i class="dropdown-icon zmdi zmdi-home"></i><span><?=$_SESSION['regionName@ttclassetsystem'];?></span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="signout.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Sign out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-dark">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <?php if ($_SESSION['userpf@ttclassetsystem']===90128||$_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['userpf@ttclassetsystem'] === 90914) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard.php">
                                <span class="feather-icon"><i data-feather="aperture"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <hr class="nav-separator">
                        <?php } if ($_SESSION['userpf@ttclassetsystem']!='') { ?>
                        <div class="nav-header">
                            <span>Staffs interface</span>
                            <span>SI</span>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                <span class="feather-icon"><i data-feather="command"></i></span>
                                <span class="nav-link-text">Task to do</span>
                            </a>
                            <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="request-form.php">Request form</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="request-status.php">Requests status</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="acceptance-form.php">Attach acceptance form</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="allocated-devices.php">Allocated devices</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#toner_drp">
                                <span class="feather-icon"><i data-feather="printer"></i></span>
                                <span class="nav-link-text">Toner cartridges</span>
                            </a>
                            <ul id="toner_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="toner-cartridges.php">Request toner cartridges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="toner-cartridges-status.php">Toner cartridges request status</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="confirm-toner-allocation.php">Confirm toner cartridges allocation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="allocated-toner-cartridges.php">Allocated toner cartridges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="available-toner-cartridges.php">Available toner cartridges</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                                <span class="feather-icon"><i data-feather="paperclip"></i></span>
                                <span class="nav-link-text">Handover</span>
                            </a>
                            <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="handover-devices.php">Handover device</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-handover-status.php">View handover status</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="feather"></i></span>
                                <span class="nav-link-text">Movement</span>
                            </a>
                            <ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="request-device-movement.php">Request device movement</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-movement-status.php">View movement status</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="device-movement-confirm.php">Device movement confirmation</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php if ($_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['dmanager'] == 1) {?>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Managers Interface</span>
                        <span>MI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Components_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Managing request</span>
                            </a>
                            <ul id="Components_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-department-requests.php">View department requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-staffs-req-status.php">View staff's request status</a>
                                        </li>
                                        <?php if ($_SESSION['userpf@ttclassetsystem'] === 91119) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="complete-requests.php">Finalize all requests</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>                 
                    <hr class="nav-separator">
                    <?php } ?>
                    <?php if ($_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 90128||$_SESSION['userpf@ttclassetsystem'] === 91119 || $_SESSION['userpf@ttclassetsystem'] === 91024) { ?>
                    <div class="nav-header">
                        <span>IT Support Interface</span>
                        <span>ITSI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#support_drp">
                                <span class="feather-icon"><i data-feather="minimize"></i></span>
                                <span class="nav-link-text">Support requests</span>
                            </a>
                            <ul id="support_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-staffs-requests.php">View all staff's requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-staffs-allocation-requests.php">View all staff's allocation requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-staffs-accept-form.php">View staff's acceptance form</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-allocation-lists.php">View allocation lists</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-handover-requests.php">View handover requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-movement-requests.php">View movement requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="finalize-movement.php">Finalize movement requests</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } if ($_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 90128||$_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['userpf@ttclassetsystem'] === 91019||$_SESSION['userpf@ttclassetsystem'] === 91024) { ?>
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#device_drp">
                                    <span class="feather-icon"><i data-feather="link"></i></span>
                                    <span class="nav-link-text">Devices section</span>
                                </a>
                                <ul id="device_drp" class="nav flex-column collapse show collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#view_it_drp1">View IT Devices</a>
                                                <ul id="view_it_drp1" class="nav flex-column collapse collapse-level-2">
                                                    <li class="nav-item">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="view-devices.php"> View all devices</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="view-laptops.php"> View Laptops</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="view-desktops.php">View Desktops</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="view-printers.php">View Printers</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="view-scanners.php">View Scanners</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#record_it_drp1">Record IT Devices</a>
                                                <ul id="record_it_drp1" class="nav flex-column collapse collapse-level-2">
                                                    <li class="nav-item">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="record-computer.php"> Record Computer</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="record-printer.php">Record Printer</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="record-scanner.php">Record Scanner</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#mantain_drp">
                                <span class="feather-icon"><i data-feather="zap"></i></span>
                                <span class="nav-link-text">Mantainance section</span>
                            </a>
                            <ul id="mantain_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="record-mantained-device.php">Record mantainance device</a>
                                        </li> 
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#signup_drp1">Maintained devices</a>
                                            <ul id="signup_drp1" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="mantained-devices-lists.php">All mantained devices</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="mantained-laptops-lists.php">Laptops</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="mantained-desktops-lists.php">Desktops</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="mantained-printers-lists.php">Printers</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="mantained-scanners-lists.php">Scanners</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_drp">
                                <span class="feather-icon"><i data-feather="credit-card"></i></span>
                                <span class="nav-link-text">Toner cartridge section</span>
                            </a>
                            <ul id="dash_drp" class="nav flex-column collapse show collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="record-toner-cartridges.php">Record toner cartridges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-toner-cartridges.php">View toner cartridges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="update-toner-cartridges-stock.php">Update toner cartridges stock</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-toner-cartridges-stock.php">View toner cartridges stock</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="toner-cartridges-requests.php">Toner cartridges requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view-allocated-toner-cartridges.php">View allocated toner cartridges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="finalize-toner-cartridges.php">Finalize toner cartridge requests</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="available-toner-cartridges.php">Available toner cartidges</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <?php } if ($_SESSION['userpf@ttclassetsystem']!='') {?>
                    <div class="nav-header">
                        <span>Utilities</span>
                        <span>US</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="documentation.html" >
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Documentation</span>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href="">
                                <span class="feather-icon"><i data-feather="eye"></i></span>
                                <span class="nav-link-text">Version</span>
                                <span class="badge badge-sm badge-danger badge-pill"><?= $_SESSION['version@ttclassetsystem']; ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="feather-icon"><i data-feather="headphones"></i></span>
                                <span class="nav-link-text">Support</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./signout.php">
                                <span class="feather-icon"><i data-feather="power"></i></span>
                                <span class="nav-link-text">Sign out</span>
                            </a>
                        </li>
                        <div class="nav-header">
                            <span><?php $Today = date('y:m:d'); $new = date('l, F d, Y', strtotime($Today)); echo $new; ?></span>
                            <span><?php $Today = date('y:m:d'); $new = date('l, F d, Y', strtotime($Today)); echo $new; ?></span>
                        </div>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Devices section</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Record toner cartridge</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="credit-card"></i></span></span>Record Toner Cartridges.</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div id="all-record-tonner-cartridge">
                            
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
            
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script><a href="https://www.ttcl.co.tz/" target="_blank">TTCL</a> | All Rights Reserved</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery --> 
    <script src="dist/js/jquery-3.6.0.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Data Table JavaScript -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    
    <!-- Counter Animation JavaScript -->
    <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
    
    <!-- EChartJS JavaScript -->
    <script src="vendors/echarts/dist/echarts-en.min.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    
    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/assets.js"></script>
    <script type="text/javascript">
        function tonerModelAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
          url: "check/check_toner_model.php",
          data:'recordtonercartridgetonermodel='+$("#recordtonercartridgetonermodel").val(),
          type: "POST",
          success:function(data){
            $("#tonner-model-availability-status").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
        });
      }
    </script>

    <?php include_once('load_all_modals.php'); ?>
    
</body>

</html>