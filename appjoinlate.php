<?php session_start();
?>
<HTML>
<head>
<title>Late Join</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet"  type="text/css" href="apphome.css">
</head>
<body>
<!-- <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">Mess Join/</a><a href="late_join.php">LateJoin</a></strong> -->
<div class="background">
<!-- <h2 align="center"><b><u>LATE JOIN</u></b></h2> -->
<strong><a href="apphome.php">Home/</a><a href="appjoinlate.php">LateJoin</a></strong>
<form id="menuchoice" action="appjoinlate.php" method="post">


Menu
<select name="menu">
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
<input id="" type="submit" onclick="return confirm('Are you sure you want to Added in Late Join?')" name="submit" value="Submit" >
</form>
</div>

</body>
</HTML>


<?php

// if($_SESSION['prcommlogin'] != "1")
// {
//   // session_destroy();
//   echo"<script> window.open('login.php','_self');</script>";
// }
// else {

// include"header.php";
if($_SESSION['studlogin']==0)
{
  echo"<script>window.open('applogin.php','_self');</script>";
}
else
{
  include"header1.php";
include 'dbconnect.php';

$uname = $_SESSION['studlogin'];
$mid = $uname;
//check for messcut
  $flagg=0;
  $mont = date('m');
  $query9 = "select * from messcut2";
  $rr = mysqli_query($link,$query9);
  while($rrr = mysqli_fetch_array($rr))
  {
    if($mid==$rrr['id'])
    {
      $mon = $rrr['month'];
      if($mon!=$mont)
      {
        $flagg=1;
      }
      break;
    }
  }
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
  $messblock=0;
  $query12 = "select * from messblock";
  $blockquery = mysqli_query($link,$query12);
  while($blockrow = mysqli_fetch_array($blockquery))
  {
    if($mid==$blockrow['id'])
    {
      if($mont==$blockrow['temp'])
      {
        $messblock=1;
      }
      break;
    }
  }

  if($flagg==1)
  {
    echo ' <script type="text/javascript">
      alert("Sorry!!!! This ID cannot join as it is in the MESS CUT LIST. Please Clear the dues.");
     </script>
    ';
  }
  else if($flaggg==1)
{
  echo ' <script type="text/javascript">
    alert("Sorry!!!! MESS OUT IS ACTIVATED");
   </script>
  ';
}
else if($messblock==1)
  {
    echo ' <script type="text/javascript">
      alert("Sorry!!!! This ID cannot join as it is in the MESS BLOCK LIST. Please contact Mess Secretary.");
     </script>
    ';
  }
else
{
$query1 = "select NAME from users where ID = '$uname'";
$r = mysqli_query($link,$query1);
while($row=mysqli_fetch_array($r))
{
  $name = $row['NAME'];
  break;
}

 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY JOINED";
 if(isset($_POST['submit']))
 {


  $userchecker=0;
  $flag=1;
  $flagforjoin=0;
  $mid = $_SESSION['studlogin'];
  $menu = mysqli_real_escape_string($link, $_POST['menu']);
  // $dd = mysqli_real_escape_string($link, $_POST['dd']);
  $dates=date("Y-m-d");
  $day=date("d");
  $total=date("t");
  $month=date("n");
  $year=date("Y");
  $hour=date("G");
  if($day==$total)
  {
   if($month==12)
   {
    $month=1;
    $year+=1;
   }
   else
   {
    $month+=1;
   }
   $number = cal_days_in_month(CAL_GREGORIAN,"$month", "$year");
   $effective=$number;
  }
  else
  {
   $effective=($total-$day);
  }

  // if(($hour>=0)and($hour<=12))
  // {
  //  $effective+=1;
  // }
// $next_date=date('Y-m-d', strtotime('+1 day', strtotime($dd)));
   $query2="SELECT ID from users";    //first check with user db
   $users=mysqli_query($link,$query2);
   while($rowuser=mysqli_fetch_array($users))
   {
     if(($rowuser[0]==$mid))
     {
      $userchecker=1; //found in user table

      $query="SELECT * from messjoin";   //check if already joined
      $search=mysqli_query($link,$query);

      while ($row=mysqli_fetch_row($search))
      {
       if(($row[0]==$mid)&&($row[3]==1))  //found in messjoin but active
       {
         echo ' <script type="text/javascript">
           alert("'.$errormsg.'");
          </script>
         ';

        break;  //end searching in messjoin
       }
       else if(($row[0]==$mid)&&($row[3]==0)) //found in messjoin but inactive
       {
         $sql="UPDATE messjoin set active=1,late=1,count=0 where id='$mid'";
         if( mysqli_query($link,$sql))
         {
          echo ' <script type="text/javascript">
            alert("'.$successmsg.'");
           </script>
          ';
         }

         $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
         $reduced=mysqli_query($link,$query_for_reduction);
         while($rowred=mysqli_fetch_row($reduced))
         {
          if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
          {
           $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
           mysqli_query($link,$query3);
          }
          else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
          {
           $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
           mysqli_query($link,$query4);
          }
         }


         break; //end searching in messjoin
       }
       else
       {
         $sql = "INSERT INTO messjoin (ID, menu,effective,active,late,count) VALUES ('$mid', '$menu','$effective',1,1,0)";
         if(mysqli_query($link, $sql))
         {
          echo ' <script type="text/javascript">
             alert("'.$successmsg.'");
            </script>
          ';
          }

          $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
          $reduced=mysqli_query($link,$query_for_reduction);
          while($rowred=mysqli_fetch_row($reduced))
          {
           if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
           {
            $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
            mysqli_query($link,$query3);
           }
           else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
           {
            $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
            mysqli_query($link,$query4);
           }
          }


       }


      }
    }
  }
  if($userchecker==0) //not found in user table
  {
   echo ' <script type="text/javascript">
      alert("'.$errormsg2.'");
     </script>
   ';
   }


// else if($next_date==$dates)
// {
//   ++$effective;
//   $query2="SELECT ID from users";    //first check with user db
//   $users=mysqli_query($link,$query2);
//   while($rowuser=mysqli_fetch_array($users))
//   {
//     if(($rowuser[0]==$mid))
//     {
//      $userchecker=1; //found in user table
//
//      $query="SELECT * from messjoin";   //check if already joined
//      $search=mysqli_query($link,$query);
//
//      while ($row=mysqli_fetch_row($search))
//      {
//       if(($row[0]==$mid)&&($row[3]==1))  //found in messjoin but active
//       {
//         echo ' <script type="text/javascript">
//           alert("'.$errormsg.'");
//          </script>
//         ';
//
//        break;  //end searching in messjoin
//       }
//       else if(($row[0]==$mid)&&($row[3]==0)) //found in messjoin but inactive
//       {
//         $sql="UPDATE messjoin set active=1,late=1,count=1 where id='$mid'";
//         if( mysqli_query($link,$sql))
//         {
//          echo ' <script type="text/javascript">
//            alert("'.$successmsg.'");
//           </script>
//          ';
//         }
//
//         $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
//         $reduced=mysqli_query($link,$query_for_reduction);
//         while($rowred=mysqli_fetch_row($reduced))
//         {
//          if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
//          {
//           $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
//           mysqli_query($link,$query3);
//          }
//          else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
//          {
//           $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
//           mysqli_query($link,$query4);
//          }
//         }
//
//
//         break; //end searching in messjoin
//       }
//       else
//       {
//         $sql = "INSERT INTO messjoin (ID, menu,effective,active,late,count) VALUES ('$mid', '$menu','$effective',1,1,1)";
//         if(mysqli_query($link, $sql))
//         {
//          echo ' <script type="text/javascript">
//             alert("'.$successmsg.'");
//            </script>
//          ';
//          }
//
//          $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
//          $reduced=mysqli_query($link,$query_for_reduction);
//          while($rowred=mysqli_fetch_row($reduced))
//          {
//           if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
//           {
//            $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
//            mysqli_query($link,$query3);
//           }
//           else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
//           {
//            $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
//            mysqli_query($link,$query4);
//           }
//          }
//
//
//       }
//
//
//      }
//    }
//  }
//  if($userchecker==0) //not found in user table
//  {
//   echo ' <script type="text/javascript">
//      alert("'.$errormsg2.'");
//     </script>
//   ';
//   }
//
// }
// else
//   {
//     echo ' <script type="text/javascript">
//      alert("Please Enter Todays or Yesterdays Date");
//     </script>
//   ';
// }
//
//
// }
}
}
}
?>
