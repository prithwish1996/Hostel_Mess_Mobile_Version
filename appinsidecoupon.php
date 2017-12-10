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
    <strong><a href="apphome.php">Home/</a><a href="appinsidecoupon.php">TakeCoupon/</a></strong>
  <!-- <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a></strong> -->

    <!-- <p><strong></strong></p> -->
  <!-- <h1 align="center"><u>MESS JOIN/VIEW</u></h1> -->
  <section>



         <button  name="latecoupon"  id="lc" onclick="funclc()" type="button" class="btn btn-success">LATE COUPON</button><br><br>
         <button  name="normalcoupon" id="nc" onclick="funcnc()" type="button" class="btn btn-success">NORMAL COUPON</button>




  </section>
</div>
</body>
<script>
function funclc()
{
  if(confirm('Are you sure you want to take Late Coupon for Today?'))
{
 window.open("applatecoupon.php","_self");
}
}
function funcnc()
{
  if(confirm('Are you sure you want to take Normal Coupon for Tommorrow?'))
{
 window.open("appnormalcoupon.php","_self");
}
}


</script>
  </html
  <?php
  $time = date('H:i');
  if($_SESSION['studlogin']==0)
  {
    echo"<script>window.open('applogin.php','_self');</script>";
  }
  else if($time>"21:30" and $time<"00:30")
  {
    echo"<script>window.open('apphome.php','_self');</script>";
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
}
?>
