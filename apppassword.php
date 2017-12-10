<?php
session_start();
?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="apphome.css">
<body>
  <div class="background">
    <strong><a href="apphome.php">Home/</a><a href="apppassword.php">ChangePassword</a></strong>

<form id="pass" method="post" action="apppassword.php">

  &nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter New Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br><br>
  <input type="text" name="pass" placeholder="Enter New Password" required><br><br><br>
   <input type="submit" name="passwordc" value="SUBMIT" onclick="return(confirm('Are you sure you want to Change Password?'))">
</form>
</div>
</body>
<html>
<?php
include"header.php";
if($_SESSION['studlogin']==0)
{
  echo"<script>window.open('applogin.php','_self');</script>";
}
else
{
include 'dbconnect.php';
$uname = $_SESSION['studlogin'];
//echo"$uname";
$query1 = "select NAME from users where ID = '$uname'";
$r = mysqli_query($link,$query1);
while($row=mysqli_fetch_array($r))
{
  $name = $row['NAME'];
  break;
}
//echo"$name";
if(isset($_POST['passwordc']))
{
  $npass = $_POST['pass'];
  $query="update users set password='$npass' where id='$uname'";
  if(mysqli_query($link,$query))
  {
    echo '<script language="javascript">';
echo 'alert("Password Successfully Changed")';
echo '</script>';
  }
  else{
    echo '<script language="javascript">';
echo 'alert("ERROR!!!!")';
echo '</script>';
  }
}
}
 ?>
