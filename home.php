<?php
session_start();
if($_SESSION['studlogin']!=0)
{
echo"<script> window.open('apphome.php','_self');</script>";
}
else
{
  echo"<script> window.open('applogin.php','_self');</script>";

}
?>
