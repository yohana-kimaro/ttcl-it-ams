<?php 
session_start();

if($_SESSION['userpf@ttclassetsystem']===90128||$_SESSION['userpf@ttclassetsystem'] === 90820||$_SESSION['userpf@ttclassetsystem'] === 91119||$_SESSION['userpf@ttclassetsystem'] === 90914 || $_SESSION['userpf@ttclassetsystem'] === 91024){
	header('location:dashboard.php');
}else if($_SESSION['userpf@ttclassetsystem']!=''){
    header('Location:request-form.php');
}else{
	header("Location: signin.php");
}

?>