<?php session_start();
?>
<HTML>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="apphome.css">
<head>
<title>Coupon</title>

</head>
<body>

    <div class="background">
  <!-- <strong>  <a href="optioncomm.php">Home/</a><a href="insidecoupon.php">Coupon/</a><a href="coupon2.php">EnterNormalCoupon</a></strong> -->
<!-- <h2 align="center"><u>ENTER COUPON</u></h2> -->
<!-- <p><strong></strong</p> -->
<strong><a href="apphome.php">Home/</a><a href="appinsidecoupon.php">TakeCoupon/</a><a href="appnormalcoupon.php">NormalCoupon/</a></strong>

<section>
<form id="appcoupon" action="appnormalcoupon.php" method="post">

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%"  >Menu</font>
<select id="menus" name="menu" style="width: 170px">
  <option value="VEG">Veg</option>
  <option value="VE">Veg+Egg</option>
  <option value="VF">Veg+Fish</option>
  <option value="VFC">Veg+FishCurry</option>
  <option value="VFF">Veg+FishFry</option>
  <option value="VC">Veg+Chicken</option>
  <option value="NV">Non.Veg</option>
  <option value="NVE">Non.Veg-Egg</option>
  <option value="NVF">Non.Veg-Fish</option>
  <option value="NVFC">Non.Veg-FishCurry</option>
  <option value="NVFF">Non.Veg-FishFry</option>
  <option value="NVC">Non.Veg-Chicken</option>
</select> <br> <br>
<div>
<font size="4%">
Breakfast&nbsp
<input type="checkbox" name="breakfast" value="1">&nbsp&nbsp&nbsp


Lunch&nbsp
<input type="checkbox" name="lunch" value="1">&nbsp&nbsp&nbsp



Tea&nbsp
<input type="checkbox" name="tea" value="1">&nbsp&nbsp&nbsp



Tea+Snacks&nbsp
<input type="checkbox" name="tea+snacks" value="1">&nbsp&nbsp&nbsp



Snacks&nbsp
<input type="checkbox" name="snacks" value="1">&nbsp&nbsp&nbsp


Dinner&nbsp
<input type="checkbox" name="dinner" value="1">&nbsp&nbsp&nbsp

Milk&nbsp
<input type="checkbox" name="milk" value="1">&nbsp&nbsp&nbsp
</font>
<br><br>

</div>

<input id="submit" type="submit" name="submit" value="Submit" onclick="return(confirm('Are you sure you want to take Normal Coupon for Tommorrow?'))">
</form>
</section>
</div>
</body>
</HTML>


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
include"header1.php";
$flaggg=0;
$query10 = "select * from messout";
$messout = mysqli_query($link,$query10);
while($mrow=mysqli_fetch_array($messout))
{
  if($mrow['messout']==1)
  {
    $flaggg=1;
    break;
  }

}
if($flaggg==1)
{
  echo ' <script type="text/javascript">
    alert("Sorry!!!! MESS OUT IS ACTIVATED");
   </script>
  ';
}
else{
$uname = $_SESSION['studlogin'];
$query1 = "select * from users where ID = '$uname'";
$r = mysqli_query($link,$query1);
while($row=mysqli_fetch_array($r))
{
  $name = $row["NAME"];
  $room = $row["ROOM_NO"];
  break;
}

// include"header.php";

 $breakfast=0; $lunch=0; $tea=0; $teasnacks=0; $snacks=0; $dinner=0; $milk=0;
 $successmsg="COUPON ADDED SUCCESSFULLY!";
 $errormsg="ERROR!";

 if(isset($_POST['submit']))
 {


  $menu= mysqli_real_escape_string($link, $_POST['menu']);
  if(isset($_POST['breakfast']))
  {
   $breakfast=mysqli_real_escape_string($link, $_POST['breakfast']);
  }
  if(isset($_POST['lunch']))
  {
   $lunch=mysqli_real_escape_string($link, $_POST['lunch']);
  }
  if(isset($_POST['tea']))
  {
   $tea=mysqli_real_escape_string($link, $_POST['tea']);
  }
  if(isset($_POST['tea+snacks']))
  {
   $teasnacks=mysqli_real_escape_string($link, $_POST['tea+snacks']);
  }
  if(isset($_POST['snacks']))
  {
   $snacks=mysqli_real_escape_string($link, $_POST['snacks']);
  }
  if(isset($_POST['dinner']))
  {
   $dinner=mysqli_real_escape_string($link, $_POST['dinner']);
  }
  if(isset($_POST['milk']))
  {
   ++$milk;
  }
  $query="select id from coupon";
  $coupon=1;
  $result=mysqli_query($link,$query);
  while ($row = mysqli_fetch_assoc($result))
  {
   if($coupon==$row["id"])
   {
     ++$coupon;
   }
   else {
     break;
   }
  }
  $id=$coupon;
  if($teasnacks==1)
  {
    $tea=0;
    $snacks=0;
  }

  // echo $id;
  // echo $name;
  // echo $breakfast;
  // echo $snacks;

 $query="INSERT into coupon (id,Name,room,Menu,Breakfast,Lunch,Tea,TeaSnacks,Snacks,Milk,Dinner) VALUES ('$id','$name','$room','$menu','$breakfast','$lunch','$tea','$teasnacks','$snacks','$milk','$dinner')";
 if(mysqli_query($link,$query))
 {
  echo ' <script type="text/javascript">
             alert("'.$successmsg.'");
            </script>
          ';
 }
 else {
    echo ' <script type="text/javascript">
             alert("'.$errormsg.'");
            </script>
          ';
  }


 }

}
}


 ?>
