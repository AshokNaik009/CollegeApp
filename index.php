<?php
include 'connection.php';
session_start();
if(isset($_REQUEST['stdlog'])) //Login for Student
      {
        $u=$_POST['suname'];

        $p=base64_encode($_POST['spass']);
        
       $result=mysql_query("select id from  studreg  where userstud='$u' and passtud='$p'");
       $row= mysql_fetch_assoc($result);
       $id=$row['id'];
       if(mysql_num_rows($result)>0)
       {
          $_SESSION['uid']=$id;
         header("location:stud2.php");
        ?>
        <script>
           alert("You have logged in");
        </script>
     <?php
       }
       else
       {
        ?>
        <script>
           alert("Please Sign-Up first");
        </script>
     <?php
       }
      }
if(isset($_REQUEST['faclog'])) //Login for Faculty
      {
        $u=$_POST['funame'];
        $p=base64_encode($_POST['fpass']);
        // $p1=md5($p);
       $result=mysql_query("select id  from facreg where userfac='$u' and password='$p'");
       $row= mysql_fetch_assoc($result);
       $id=$row['id'];

       if(mysql_num_rows($result)>0)
       {
          $_SESSION['uid']=$id;
         header("location:fachome.php");
        ?>
        <script>
           alert("You have logged in");
        </script>
     <?php
       }
       else
       {
        ?>
        <script>
           alert("Please Sign-Up first");
        </script>
     <?php
       }
      }

if(isset($_REQUEST['adminlog'])){  //Login for Admin

  $u=$_POST['adusn'];
  $p=$_POST['adpass'];
  
 $result=mysql_query("select * from adminreg where username='$u' and password='$p'");
 if(mysql_num_rows($result)>0)
 {
   $_SESSION['useradmin']=$u;
   header("location:adhome.php");
  ?>
  <script>
     alert("You have logged in");
  </script>
<?php
 }
 else
 {
  ?>
  <script>
     alert("Please Sign-Up first");
  </script>
<?php
 }
}




?>
<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network
</title>
<link rel="stylesheet" href="navdes.css">
<script>


function val()
       {

         if(!/^[a-zA-Z]*$/g.test(document.myForm.suname.value))
         {
           alert('Enter Only Name');
           document.myForm.suname.focus();
           return false;
         }
         return true;
        }



      

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</head>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width intital-scale=1">

<style>
.box/* Used for the rectangular Div  */
{
  width:85%;
  margin-left:auto;
  margin-right:auto;
  border: 1px solid;
  padding:154px;
  margin-top:10%;
  text-align:center;
  border-style:double;
}

.nav-pills /*used  for the Menu Bar  */
{
  font-size:20px;
  background-color:#20282e;

  margin-top:0px;
  padding:25px;


}
.header
{
  position: sticky;
   top: 0;
   z-index: 100;
   background-color:black;
}









/* {
box-sizing: border-box;
}

*:focus {
	outline: none;
}
body {
font-family: Arial;
background-color: #3498DB;
padding: 50px;

}*/
.login {
margin: 20px auto;
width: 800px;

}

.login-screen {
background-color: #FFF;
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
color: #777;
}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ECF0F1;
border: 2px solid transparent;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
	margin-top: 12px;
}






.container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;

}
#myPageContent, section {
	height:100% !important;
	width:100% !important;
}


/* Slider */
#textSlider.row {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 100% !important;
}
#textSlider div {
	color: #FFF;
	font-family: 'Lato', sans-serif;
	text-transform: uppercase;
}

.iamCol {
    text-align: right;
	float: left;
	font-weight: 300;
	font-size:30pt;

}
.iamCol p:nth-child(2) { margin-top: -20pt !important; }
.slideCol {
	text-align: left;
    overflow: hidden;
	font-weight: 900;
	font-size:70pt;
	display: block;
	white-space: nowrap;
}
.slideCol p { margin: 0px !important; }

.scroller {
   height: 70pt;
   line-height: 70pt;
   overflow: hidden;
}
.scroller .inner { animation: 10s normal infinite running scroll; }
@keyframes scroll {
   0%  	{margin-top: 0px;}
   15% 	{margin-top: 0px;}

   25%  {margin-top: -70pt;}
   40%  {margin-top: -70pt;}

   50%  {margin-top: -140pt;}
   65%  {margin-top: -140pt;}

   75%  {margin-top: -210pt;}
   90%  {margin-top: -210pt;}

   100% {margin-top: 0px;}
}


/*==========  Mobile First Method  ==========*/

/* Custom, iPhone Retina */
@media only screen and (min-width : 320px) and (max-width : 479px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
    .iamCol { text-align: center; font-size:20pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 25pt; text-align: center; margin-top: -20px; }
}

/* Extra Small Devices, Phones */
@media only screen and (min-width : 480px) and (max-width : 765px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
    .iamCol { text-align: center; font-size:25pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 38pt; text-align: center; margin-top: -20px; }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) and (max-width : 992px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
	.iamCol { text-align: center; font-size:30pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 50pt; text-align: center; margin-top: 5px; }
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 992px) and (max-width : 1200px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
	.iamCol { text-align: right; font-size:30pt; }
	.slideCol { font-size: 55pt; text-align: left; }
}



</style>
<script src="js/bootstrap.min.js"></script>
<link href="backdes.css" rel="stylesheet" />
<body >
 <div class="topnav header nav-pills" id="myTopnav"   style="background-color:#20282e; padding:15px;">
 <a href="index.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
   <div style="margin-left:50%">


 <a href="#home" class="active "><span class="glyphicon glyphicon-home"> </span>Home</a>
      <a  href="#about" > <span class="glyphicon glyphicon-info-sign"> </span>About</a>
         <a  href="#student"> <span class="glyphicon glyphicon-user"> </span>Student</a>
         <a  href="#admin"> <span class="glyphicon glyphicon-cog"></span> Admin</a>
      <a   href="#faculty"> <span class="glyphicon glyphicon-briefcase"></span> Faculty</a>
</div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
 </div>
  <div class="container" id="about"  >
          <div class="row  "    >

             <div class="col-md-12" style="margin-top:10%;" >
             <div id="myPageContent" class="container-fluid"   >
                <section id="home">




                <div id="textSlider" class="row" >
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 iamCol">
                                        <p>College Social </p>
                                        <p>Network</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 slideCol">
                                        <div class="scroller">
                                            <div class="inner">

                                                <p>Dreamers</p>
                                                <p>Thinkers</p>
                                                <p>Doers</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>





                            </section>
                </div>

               </div>


              <div class="col-md-12 centered"  style="margin-bottom:40%;margin-top:20%;">
     <h3>About</h3>
      <h4 style="padding:2px;">Web application intends to provide a well-established web-based Social Network system between a job seeker and a recruiter. This documents a networking system scope, functionalities, requirements and feasibility. This project aims to develop a website which provides a Communication among peoples on network, which works quite similar to Social Media Site. This website also provides the features of writing and posting a post or any event all at one place. The main idea behind it is to share the job related details posted by placement officer via adding a post which can be read by all the student as well as faculty using the website. This web application can be handled by the admin and manage student as well as faculty. </h4>
</div>


<div class="col-md-8  col-md-offset-2" id="student"  style="margin-bottom:40%;margin-top:20%;background-color:white;"  onmouseover="this.style.background='#3498DB';"  onmouseout="this.style.background='white';this.style.color='black';"><!-- For Student -->
<h3 class="well" style="margin-bottom:10%;"> <center> Login </center></h3> <h3><center>  Student Login </center> </h3>
     <form method="POST"  name="myForm"   sttyle="margin-top:90%"  >

		<div class="login-screen">
			<div class="app-title">

			</div>

			<div class="login-form">
				<div class="control-group">
        <span class="glyphicon glyphicon-user"></span> <input type="text"  required maximum="8" name="suname" placeholder="Username" >

				</div>

				<div class="control-group">
        <span class="glyphicon glyphicon-lock"></span>	<input type="password" required maximum="8" name="spass" placeholder="Password" >
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<button class="btn btn-primary btn-large btn-block" name="stdlog"  onclick="val()"><span class="glyphicon glyphicon-log-in"> </span> &nbsp;Login</button>
        <a href="changepass.php" style="text-decoration:none;color:black; "> Forget/Reset  Password  </a>
			</div>
    </div>
   </form>
</div><!-- End For Div of Student -->






<div class="col-md-8  col-md-offset-2" id="admin"   style="margin-bottom:40%;margin-top:20%;background-color:white;"  onmouseover="this.style.background='#3498DB';"  onmouseout="this.style.background='white';this.style.color='black';" ><!-- For Admin-->
<h3 class="well" style="margin-bottom:10%;"> <center> Login </center></h3> <center>   <h3>Admin Login</h3> </center>
     <form method="POST" name="myForm1"   >
     <div class="login-screen">
			<div class="app-title">

			</div>
			<div class="login-form">
				<div class="control-group">
        <span class="glyphicon glyphicon-user"></span> <input type="text"  required class="login-field"  id="utxt" maximum="8" name="adusn" placeholder="Username"  >
				</div>
				<div class="control-group">
        <span class="glyphicon glyphicon-lock"></span>	<input type="password" required class="login-field"  maximum="8" name="adpass" placeholder="Password" >
				</div>
				<button class="btn btn-primary btn-large btn-block" name="adminlog" onclick="val1()"><span class="glyphicon glyphicon-log-in"> </span> &nbsp;  Login</button>
			</div>

    </div>
    </form>
</div>


<div class="col-md-8  col-md-offset-2" id="faculty"  style="margin-bottom:40%;margin-top:20%;background-color:white;"  onmouseover="this.style.background='#3498DB';"  onmouseout="this.style.background='white';this.style.color='black';" ><!-- For Faculty -->
<form method="POST"  name="myForm2" >
<h3 class="well" style="margin-bottom:10%;"> <center> Login </center></h3><center> <h3>  Faculty Login </h3> </center>
		<div class="login-screen" >
			<div class="app-title">
      <h3> </h3>
			</div>

			<div class="login-form" >
				<div class="control-group">
        <span class="glyphicon glyphicon-user"></span> <input type="text" class="login-field" required   id="utxt" maximum="8" name="funame" placeholder="Username" >
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
        <span class="glyphicon glyphicon-lock"></span>	<input type="password" required class="login-field"  placeholder="password" maximum="8" name="fpass" placeholder="Password" >
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<button class="btn btn-primary  btn-large btn-block"   onclick="val2()"   name="faclog"><span class="glyphicon glyphicon-log-in"> </span> &nbsp;  Login</button>
        <a    href="fchangepass.php" style="text-decoration:none;color:black; " > Forget/Reset  Password  </a>
        </div>

    </div>
      </form>
</div>
</div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
<div class="container">
    <p class="text-justify"><strong><center> College Social Network &copy;</center> </strong>   </p>
</div>
</div>
</body>
</html>
