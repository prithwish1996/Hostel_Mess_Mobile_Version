<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">


<title>Cochin University</title>
<style type="text/css">
@media screen and (min-width: 768px){
    body{


        padding-top:10.0%;
        padding-bottom: 3%;
    }
    .container{
        width: 80%;
        margin-left: 9%;
        font-size:15px;
        margin-bottom: 0%;

    }
    .fixed-header{
        width: 100%;
        position: fixed;
        overflow:auto;
        background: #960A0A;
         padding:0.3%;
        /*z-index: auto;*/
        color: #fff;
        top: 0;

    /*background-size:100% 100%;*/
    /*padding-bottom: ;*/


    }


	 .fixed-footer{
        width: 100%;
        position: fixed;
        background: #333;
        padding: 0.505%;
        color: #fff;
        margin: auto;
    }



    .fixed-footer{
        bottom: 0;

    /*flex-shrink:0;*/
    }
    /*.background-image{
	width=50px;
	}*/
  #arrow{

    margin-left: 400px;
  }
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px;
    }
	#image{
			margin-top:10px;
			margin-left:-100px;
      width:100px; height:100px;
			}
      #developer{
        color: white;

      }
	.headertext{
				margin-top:-100px;
				margin-left:10px;
				}
  .subtext{
    margin-top: 10px;
  }
  a {
      color: black;
      text-decoration: none;
      font-weight: bold;
  }

  a:hover
  {
       color:#00A0C6;
       text-decoration:none;
       cursor:pointer;

  }
  #developer{
    margin-left: 10%;
  }
  #main{
  font-weight: bold;
  font-size: 115%;
  }
  #maind{
  font-weight: bold;
  font-size: 100%;
  /*padding: -10%;*/
  }
  #da{
    /*margin-left: 35%;*/
  }
}
@media screen and (min-width : 0px) and (max-width : 767px){
  body{


      padding-top:10.0%;
      padding-bottom: 3%;
  }
  .container{
      width: 80%;
      margin-left: 9%;
      font-size:15px;
      margin-bottom: 0%;

  }
  .fixed-header{
      width: 100%;
      position: fixed;
      overflow:auto;
      background: #960A0A;
       padding:0%;
      /*z-index: auto;*/
      color: #fff;
      top: 0;

  /*background-size:100% 100%;*/
  /*padding-bottom: ;*/


  }


  .fixed-footer{
      width: 100%;
      position: fixed;
      background: #333;
      padding: 0.505%;
      color: #fff;

  }



  .fixed-footer{
      bottom: 0%;

  /*flex-shrink:0;*/
  }
  /*.background-image{
  width=50px;
  }*/
  #arrow{

  margin-left: 400px;
  }
  nav a{
      /*color: #fff;*/
      text-decoration: none;
      padding: 7px 25px;
      display: inline-block;
  }
  .container p{
      line-height: 200px;
  }
  #image{
    margin-top:2%;
    margin-left:-12%;
    /*margin-bottom: 5%;*/

    padding-bottom: 15%;
      width:20%;

    }
    #developer{
      color: white;
      margin-left: -25%;
      

    }
  .headertext{
      margin-top:-35%;
      margin-left:12%;

      }
  .subtext{
  margin-top: -8%;
  margin-left:11%;
  }
  a {
    /*color: black;*/
    text-decoration: none;
    font-weight: bold;
  }

  a:hover
  {
     color:#00A0C6;
     text-decoration:none;
     cursor:pointer;

  }
  /*#developer{
   visibility: hidden;
   margin-bottom: 0%;

  }*/
  #main{
  font-weight: bold;
  /*margin-top: 5%;*/
  font-size: 63%;
  }
  #maind{
  font-weight: bold;
  font-size: 80%;
  margin-left: 0%;
  margin-right: -5%;


  }
#home{
   padding: 1%;


}
#contact{
  padding: 1%;

}
#logout{
padding: 1%;
margin-right: -7%;
}
#dev{
  margin-left: 1%;
}
}
</style>
</head>
<body>

    <div class="fixed-header" >
        <div class="container">
		<img id="image" src="logo3.jpg" style="" ></img>
		<div class="headertext"><font id="main">COCHIN UNIVERSITY OF SCIENCE AND TECHNOLOGY</font></div><br>
    <div class="subtext"><font id="main">&nbsp&nbspATHULYA GIRLS HOSTEL</font></div>
            <nav align="right"  >

                <a id="home" style="color:white" href="home.php">Home</a>
                <a  id="contact" style="color:white" href="developers.php">Contact</a>
                <a id="logout" href="logout.php" style="color:white" >Logout</a>

            </nav>
        </div>
    </div>

    <div class="container">

    </div>
    <div class="fixed-footer">
        <div id="dev" class="container"><?php $r = date("Y"); echo"<font id='maind'>Cochin University of Science And Technology $r" ?><font id='maind'><a id="developer" href="developers.php"><span id="arrow">&#8594;</span>Developers</a></div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
</body>

</html>
