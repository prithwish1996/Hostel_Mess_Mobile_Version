<?php
session_start();
// include"header.php";
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="apphome.css">

<body>

  <div class="background">
    <strong><a href="apphome.php">Home/</a></strong>
      <!-- <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a></strong> -->

    <!-- <p><strong></strong></p> -->
  <!-- <h1 align="center"><u>MESS JOIN/VIEW</u></h1> -->
  <section>

      <form id="options" method="post">
         <input  type="submit" id="join" name="join" value="MESS JOIN" class="btn btn-success"><br><br>
      </form>

         <button  id="reduction" name="reduction"  onclick="funcred()" type="button" class="btn btn-success">MESS REDUCTION</button><br><br>
         <button  id="milkjoin" name="milkjoin"  onclick="funcmilkjoin()" type="button" class="btn btn-success">MILK JOIN</button><br><br>
         <form method="post">
            <input type="submit" id="coupon" name="coupon" value="TAKE COUPON" class="btn btn-success"><br><br>
         </form>
         <button   id="cp" onclick="funccp()" type="button" class="btn btn-success">CHANGE PASSWORD</button><br><br>
         <button   id="vpp" onclick="funcvp()" type="button" class="btn btn-success">VIEW PRESENT PASSWORD</button><br><br>
         <button  id="vd" onclick="funcvd()" type="button" class="btn btn-success">VIEW DETAILS</button><br><br>




  </section>
  </div>


</body>

<script>
function funcred()
{
  if(confirm('Are you sure you want to be in the Reduction List?'))
{
 window.open("appreduction.php","_self");
}
}
function funcmilkjoin()
{
  if(confirm('Are you sure you want to take Milk?'))
{
 window.open("appmilk.php","_self");
}
}
function funccp()
{
  window.open("apppassword.php","_self");
}
function funcvp()
{
  window.open("appviewpassword.php","_self");
}
function funcvd()
{
  window.open("appviewdetails.php","_self");
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
// $t = date('H:i');
// echo"$t";
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
// $time="20:00";
// echo"$time";
if($time>"21:30" and $time<="23:59")
{
  echo"<script> window.open('appjoinlate.php','_self'); </script>";
}
else{

  echo"<script> window.open('appinsidejoinnormal.php','_self'); </script>";

}
}
if(isset($_POST['coupon']))
{


$time = date('H:i');
// $time="22:00";
// echo"$time";
if(($time>="00:30" and $time<="21:30"))
{
  echo"<script> window.open('appinsidecoupon.php','_self'); </script>";
}
else{

  echo '<script language="javascript">';
   echo 'alert("Sorry!!! Time for taking Coupon is between 00:30 to 21:30. Please Contact Mess Committee.")';
   echo '</script>';

}
}
}
?>
