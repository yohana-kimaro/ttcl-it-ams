<?php
session_start();
unset($_SESSION["username@ttclassetsystem"]);
unset($_SESSION["userpf@ttclassetsystem"]);
unset($_SESSION["region@ttclassetsystem"]);
unset($_SESSION["staffFName@ttclassetsystem"]);
unset($_SESSION["userposit@ttclassetsystem"]);
unset($_SESSION["version@ttclassetsystem"]);
unset($_SESSION["regID@ttclassetsystem"]);
unset($_SESSION["staffLName@ttclassetsystem"]);
unset($_SESSION["regionName@ttclassetsystem"]);
unset($_SESSION["dmanager"]);
unset($_SESSION["timeout"]);
header("Location:signin.php");
?>