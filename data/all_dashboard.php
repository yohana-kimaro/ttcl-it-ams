<?php 
include("../connection.php");
include("../connection_one.php");

session_start();
if($_SESSION['userpf@ttclassetsystem']===90128||$_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['userpf@ttclassetsystem'] === 90914){

}else if($_SESSION['userpf@ttclassetsystem']!=''){
    header('Location:request-form.php');
}else{
  header("Location: signin.php");
}

// total alocation
$sqltloc="SELECT A.firstName,A.secondName,A.surName,D.pfnumber,A.quantity,D.itAssetType,D.serialNo,D.devOwnership, D.deviceName, D.brand,D.model,D.status,S.processorSpeed,S.RAM,S.storage,S.capacity,D.purchasedYear,D.other, D.allocated, D.dateIssued FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB AS S ON D.serialNo  = S.serialNo where D.allocated = 'Yes'";
$num11 = sqlsrv_query($conn, $sqltloc,array(), array( "Scrollable" => 'static' ));
$row_countTl = sqlsrv_num_rows($num11);

// total allocated devices
$totalAlDev="SELECT A.firstName,A.secondName,A.surName,D.pfnumber,A.quantity,D.itAssetType,D.serialNo,D.devOwnership, D.deviceName, D.brand,D.model,D.status,S.processorSpeed,S.RAM,S.storage,S.capacity,D.purchasedYear,D.other, D.allocated, D.dateIssued FROM APPLICANTTB AS A INNER JOIN DEVICETB AS D ON A.applicantID = D.applicantID INNER JOIN SPECIFICATIONSTB AS S ON D.serialNo  = S.serialNo where D.allocated = 'Yes'";
$num12 = sqlsrv_query($conn, $totalAlDev,array(), array( "Scrollable" => 'static' ));
$row_countAlDev = sqlsrv_num_rows($num12);

// total unallocated devices
$totalUnAlDev="SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, spe.processorSpeed, spe.RAM, spe.storage, spe.capacity, spe.cdRomDrive, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, spe.macAddress, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, SPECIFICATIONSTB as spe, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=spe.serialNo and  spe.serialNo=doc.serialNo and dev.allocated='No'";
$num123 = sqlsrv_query($conn, $totalUnAlDev,array(), array( "Scrollable" => 'static' ));
$row_countAlUnDev = sqlsrv_num_rows($num123);


$sqlCountRow = "SELECT dev.serialNo,dev.deviceName, dev.itAssetType, dev.status, dev.brand, dev.model, softw.os,softw.msOffice,softw.antiVirus, softw.pdfReader, dev.purchasedYear, dev.devOwnership FROM SOFTWARETB as softw, DEVICETB as dev, DOCUMENTSTB as doc WHERE   dev.serialNo=softw.serialNo and dev.serialNo=doc.serialNo";
$num = sqlsrv_query($conn, $sqlCountRow,array(), array( "Scrollable" => 'static' ));
$row_count = sqlsrv_num_rows($num);

$sqlCountRow2 = "SELECT * FROM APPLICANTTB where itSupportSupervisor<>'Not Verified by IT Support Supervisor' and itManager<>'Not approvec by IT Manager' and directManager<>'Not checked by Direct Manager' AND allocated='No'";
$num2 = sqlsrv_query($conn, $sqlCountRow2,array(), array( "Scrollable" => 'static' ));
$row_count2 = sqlsrv_num_rows($num2);  

$sqlCountRow3 = "select * from vwASSETMANAGEMENT";
$num3 = sqlsrv_query($conn1, $sqlCountRow3,array(), array( "Scrollable" => 'static' ));
$row_count3 = sqlsrv_num_rows($num3); 

$sqlCountRow21 = "SELECT * FROM APPLICANTTB where itSupportSupervisor='Not Verified by IT Support Supervisor' and itManager='Not approvec by IT Manager' and directManager='Not checked by Direct Manager'";
$numdmanager = sqlsrv_query($conn, $sqlCountRow21,array(), array( "Scrollable" => 'static' ));
$directManagersReq = sqlsrv_num_rows($numdmanager);

$sqlCountRow29 = "SELECT * FROM APPLICANTTB where itSupportSupervisor='Not Verified by IT Support Supervisor' and itManager='Not approvec by IT Manager' and directManager='Checked by Direct Manager'";
$num90 = sqlsrv_query($conn, $sqlCountRow29,array(), array( "Scrollable" => 'static' ));
$rowitsupport = sqlsrv_num_rows($num90);

$sqlCountRowISS = "SELECT * FROM APPLICANTTB WHERE itSupportSupervisor='Verified by IT Support Supervisor' AND itManager='Not approvec by IT Manager' AND directManager='Checked by Direct Manager'";
$num2ISS = sqlsrv_query($conn, $sqlCountRowISS,array(), array( "Scrollable" => 'static' ));
$issmangerreq = sqlsrv_num_rows($num2ISS);

$sqlCountRowaLLOC = "SELECT * FROM APPLICANTTB where itSupportSupervisor='Verified by IT Support Supervisor' and itManager='Approvec by IT Manager' and directManager='Checked by Direct Manager' AND allocated='No'";
$numitsalloc = sqlsrv_query($conn, $sqlCountRowaLLOC,array(), array( "Scrollable" => 'static' ));
$row_itsupport= sqlsrv_num_rows($numitsalloc); 

?>


<div class="hk-row">
    <div class="col-sm-12">
        <div class="card-group hk-dash-type-2">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">Staff with Devices</span>
                        </div>
                        <!-- <div>
                            <span class="text-success font-14 font-weight-500"></span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?= $row_countTl; ?></span>
                        <small class="d-block">Total staffs allocated with devices</small>
                    </div>
                </div>
            </div>

            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">Devices allocated</span>
                        </div>
                        <!-- <div>
                            <span class="text-success font-14 font-weight-500">+12.5%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><span class="counter-anim"><?= $row_countAlDev; ?></span></span>
                        <small class="d-block">Total devices allocated</small>
                    </div>
                </div>
            </div>

            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">Allocation requests</span>
                        </div>
                        <!-- <div>
                            <span class="text-warning font-14 font-weight-500">-2.8%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?= $row_count2; ?></span>
                        <small class="d-block">Total allocation requests</small>
                    </div>
                </div>
            </div>

            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">Free devices</span>
                        </div>
                        <!-- <div>
                            <span class="text-danger font-14 font-weight-500">-75%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?= $row_countAlUnDev;?></span>
                        <small class="d-block">Total unallocated devices</small>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="col-sm-12">
        <div class="card-group hk-dash-type-2">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">Direct Manager's requests</span>
                        </div>
                        <!-- <div>
                            <span class="text-success font-14 font-weight-500">+10%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?= $directManagersReq; ?></span>
                        <small class="d-block">Total requests to direct managers</small>
                    </div>
                </div>
            </div>
            
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">IT Support Requests</span>
                        </div>
                        <!-- <div>
                            <span class="text-success font-14 font-weight-500">+12.5%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><span class="counter-anim"><?= $rowitsupport; ?></span></span>
                        <small class="d-block">IT Support Requests from Direct Managers</small>
                    </div>
                </div>
            </div>
            
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">IS Manager requests</span>
                        </div>
                        <!-- <div>
                            <span class="text-warning font-14 font-weight-500">-2.8%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?=$issmangerreq; ?></span>
                        <small class="d-block">Total staff's requests to IS Manager from IT Support</small>
                    </div>
                </div>
            </div>
            
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <span class="d-block font-15 text-dark font-weight-500">IT Support Allocation Requests</span>
                        </div>
                        <!-- <div>
                            <span class="text-danger font-14 font-weight-500">-75%</span>
                        </div> -->
                    </div>
                    <div>
                        <span class="d-block display-4 text-dark mb-5"><?= $row_itsupport; ?></span>
                        <small class="d-block">Total requests from IS Manager to IT Support for allocation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>