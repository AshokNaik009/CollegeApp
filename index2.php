<?php
include 'connection.php';
session_start();
if(isset($_REQUEST['stdlog'])) //Login for Student
      {
        $u=$_POST['suname'];
        $p=$_POST['spass'];

       $result=mysql_query("select id from  studreg  where userstud='$u' and passtud='$p'");
       $row= mysql_fetch_assoc($result);
       $id=$row['id'];
      
       if(mysql_num_rows($result)>0)
       {
          $_SESSION['uid']=$id;
         
         header("location:stuhome.php");  
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
        $p=$_POST['fpass'];     
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

function val1()
       {
        
         if(!/^[a-zA-Z]*$/g.test(document.myForm1.adusn.value))
         {
           alert('Enter Only Name');
           document.myForm.adusn.focus();
           return false;
         }
         return true;
        }

        function val2()
       {
        
         if(!/^[a-zA-Z]*$/g.test(document.myForm2.funame.value))
         {
          alert('Enter Only Characters');
           document.myForm.funame.focus();
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
<link href="newlog.css" rel="stylesheet">
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


   * {
    margin:0;
}


@keyframes slider
 {
  0%
  {
    left:0%;
  }
  20%
  {
    left:0%;
  }
  25%
  {
    left:-100%;
  }
  45%
  {
    left:-100%;
  }
  50%
  {
    left:-200%
  }
  70%
  {
      left:-200%;
  }
  75%
  {
    left:-300%
  }
  95%
  {
    left:-300%  
  }
  100%
  {
      left:-400%
  } 

 }

 #slider
 {
     overflow: hidden;
     border:1px solid;
 }
 #slider figure img{
     width:20%;
     float:left;
 }
 #slider figure 
 {
     position: relative;
     width:500%;
     margin:0;
     left:0;
     animation: 15s  slider infinite;
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




</style>
<script src="js/bootstrap.min.js"></script>

<body style="background:#57cccb">
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


<div class="wrapper">   
        <div class="container" id="student"  >
          <h1>Student Login</h1>
          
          <form class="form" method="post">
          <span class="glyphicon glyphicon-user"></span>    <input type="text"  maximum="8" name="suname" placeholder="Username" >
          <span class="glyphicon glyphicon-lock"></span>   <input type="password" maximum="8" name="spass" placeholder="Password" >
          <button type="submit" id="login-button" name="stdlog"  onclick="val()"> <span class="glyphicon glyphicon-log-in"> </span>Login</button>
         
        <br/> <a href="changepass.php" id="login-button"  style="text-decoration:none;color:black; "> Forget/Reset  Password  </a>
          </form>
      </div>
        
        <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>


         
        












        <div class="container" id="admin"  >
          <h1>Admin Login</h1>
          
          <form class="form" method="post">
          <span class="glyphicon glyphicon-user"></span>    <input type="text"  maximum="8" name="suname" placeholder="Username" >
          <span class="glyphicon glyphicon-lock"></span>   <input type="password" maximum="8" name="spass" placeholder="Password" >
          <button type="submit" id="login-button" name="stdlog"  onclick="val()"> <span class="glyphicon glyphicon-log-in"> </span>Login</button>
         
        <br/> <a href="changepass.php" id="login-button"  style="text-decoration:none;color:black; "> Forget/Reset  Password  </a>
          </form>
      </div>
        
        <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      
      



      



      















        




  










     <div class="navbar navbar-default navbar-fixed-bottom">
<div >
                  <h4 class="navbar text"> WebSite Built by <i>  Pranali Patil</i> <br/>  All rights Reserved &copy;2018. </h4>
</div> 
</div>




</body>
</html>

