<HTML>
<head>
<title>COCHIN UNIVERSITY</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="appviewdetails.css"></head>
<body>
<div class="background">


</div>
</body>
<strong><a href="apphome.php">Home/</a><a href="appviewpassword.php">ViewPassword</a></strong>
</html>



<?php session_start();
include"header1.php";
if($_SESSION['studlogin']==0)
{
  echo"<script>window.open('applogin.php','_self');</script>";
}
else
{
include 'dbconnect.php';
$uname = $_SESSION['studlogin'];
// echo"$uname";
$query1 = "select NAME from users where ID = '$uname'";
$r = mysqli_query($link,$query1);
while($row=mysqli_fetch_array($r))
{
  $name = $row['NAME'];
  break;
}
// echo"$name";
$query1 = "select password from users where id='$uname'";
$r = mysqli_query($link,$query1);
while($row=mysqli_fetch_array($r))
{
  $pass = $row[0];
  break;
}
echo "<br><table align='center' border='5%'><tr bgcolor='#FFF8DC'><th><h4>ID</h4></th><th><h4>NAME</h4></th><th><h4>PASSWORD</h4></th></tr><br>";
echo "<tr bgcolor='#979A9A'>";
echo "<td>" . $uname . "</td>";
echo "<td>" . $name . "</td>";
echo "<td>" . $pass . "</td>";
echo"</tr>";
echo"</table>";
}
?>
