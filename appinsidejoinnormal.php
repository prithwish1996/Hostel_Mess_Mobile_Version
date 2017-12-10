<?php
session_start();
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="apphome.css">


<body>

  <div class="background">
  <!-- <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a></strong> -->
  <strong><a href="apphome.php">Home/</a><a href="appinsidejoinnormal.php">Join/</a></strong>

    <!-- <p><strong></strong></p> -->
  <!-- <h1 align="center"><u>MESS JOIN/VIEW</u></h1> -->
  <section>

      <button  name="normaljoin" id="nj" onclick="funcnj()" type="button" class="btn btn-success" color="white">NORMAL JOIN</button><br><br>

         <button  name="latejoin" id="lj" onclick="funclj()" type="button" class="btn btn-success" color="white">LATE JOIN</button>



  </section>
</div>
</body>
<script>
function funcnj()
{

 window.open("appjoinnormal.php","_self");

}
function funclj()
{

 window.open("appjoinlatenextday.php","_self");

}
</script>
  </html>

  <?php
  if($_SESSION['studlogin']==0)
  {
    echo"<script>window.open('applogin.php','_self');</script>";
  }
  else
  {
  include"dbconnect.php";
 include"header.php";
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
  // echo"$uname";
if(isset($_POST['join']))
{


$time = date('H:i');
// $time="22:00";
// echo"$time";
if($time>"21:30" and $time<="23:59")
{
  echo"<script> window.open('appjoinlate.php','_self'); </script>";
}
else{

  echo"<script> window.open('appinsidejoinnormal.php','_self'); </script>";

}
}
if(isset($_POST['reduction']))
{


// $time = date('H:i');
 $time="20:00";
// echo"$time";
if($time>"21:30" and $time<="23:59")
{
  echo"<script> window.open('appjoinlate.php','_self'); </script>";
}
else{

  echo"<script> window.open('appjoinnormal.php','_self'); </script>";

}
}
}
?>
