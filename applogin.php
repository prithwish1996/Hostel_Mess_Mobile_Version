<?php
session_start();
$_SESSION['studlogin']="0";

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
  <section>

  <div class="font">
    <form id = "applogin" name="login"  method="post" accept-charset="utf-8">
      <!-- <div class="form-group"> -->
      <div class = "wrapper">
      <p id="sl"><u>STUDENTS LOGIN</u></p><br>
  <ul style="list-style-type:none">
    <li id=""><label for="usermail">Username&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" name="username" placeholder="Enter Student ID" required></li><br>
    <li id="password"><label for="password">Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="password" name="password" placeholder="Enter Password" required></li><br>
    <li id="">
    <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary"></li>
  </ul>
</div>
<!-- </div> -->
</form>
</font>
  </section>
  </div>
  </html>
  <?php
  // include "header.php";
  // include"dbconnect.php";


$_SESSION['studlogin']="0";


    //   function func()
    //   {
    //     $link = "<script>window.open('Purchases.php')</script>";
    //     echo "$link";
    // }
   include"dbconnect.php";
   include"header.php";


  // $_SESSION['seclogin'] = "0";
  // $_SESSION['prcommlogin'] = "0";
  // $_SESSION['expcommlogin'] = "0";


  if(isset($_POST['submit']))
  {

     $uname = $_POST['username'];
     $pass = $_POST['password'];

     $flag=0;
     $query1 = "select id from users";
     $r = mysqli_query($link,$query1);
     while($row=mysqli_fetch_array($r))
     {
       if($uname==$row['id'])
       {
         $flag=1;
         break;
       }
     }
     if($flag==0)
     {
       echo '<script language="javascript">';
        echo 'alert("This ID is not Registered. Please Contact Mess Secretary.")';
        echo '</script>';
     }
     else
     {
       $query2 = "select password from users where id='$uname'";
       $p = mysqli_query($link,$query2);
       while($pp = mysqli_fetch_array($p))
       {
         $pa = $pp['password'];

       }
       if($pa==$pass)
       {
        //  echo"$pa $pass";

         $_SESSION['studlogin'] = $uname;
         echo"<script>window.open('apphome.php','_self'); </script>";
       }
       else {
        //  echo"$p";
         echo '<script language="javascript">';
          echo 'alert("OOPS!!!! It seems that you have entered a wrong password.")';
          echo '</script>';
       }
     }

  }

?>
