<?php session_start();

$_SESSION['studlogin'] = "0";
session_destroy();
echo"<script> window.open('applogin.php','_self');</script>";
?>
