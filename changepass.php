<!DOCTYPE html>
<html>
<head>
<title>
   Forget Password
</title>
<style>

body {
  background-image:url("page2.jpg");
  background-size:cover;
  background-repeat:no-repeat;
}
 
.customDiv     /*  The div creating shadow Effect    */
{ 
    margin:3px;
    min-height:80%;
    text-align:center;
    font-size:large;
    background-color:white;
    margin-top:5%;
    
}

.drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        border:none;
    }


   body {
    background-color:cadetblue;
   }
   

   .box
   {
        position:fixed;
        left:33%;
        width:40%; 
        padding-top:10%;
        background-color:#eee;   
   }
 
</style>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
</head>
<body>
   

   <div class="customDiv drop-shadow box" >
   <form method="POST" class="form-horizontal" style="padding-top:12px;" action="" enctype="multipart/form-data" > 
   <h3  class="well"  style="margin-top:-10%;margin-left:10%;width:80%;background-color:white;" >  <button class="btn btn-info pull-left " name="sea" ><span class="glyphicon glyphicon-Home">   </span> <a href='index.php' style="text-decoration: none">Home </a> </button>  Change Password  </h3>
     <div class="form-group" >
      <table class="table table-hover text-centered"  border="1"  style="font-size:25px;margin-left:2%;width:95.5%" >      
      <tr>
    
        <td > <input type="text" onfocus="(this.type='date')"   class="form-control" name="dob" placeholder="Date of Birth" /></td>
      </tr>
      <tr>
      
        <td  cellsapcing="10" ><input type="text" class="form-control"  name="reg" placeholder="Register Number:" /> </td>
      </tr>
      <tr>
      
        <td cellsapcing="10" ><input type="text" class="form-control" maximum="8" name="email" placeholder="Email" /></td>
      </tr>
      
      <tr>
        <td>
        <button class="btn btn-primary"  name="chan" >Submit</button>
        </td>
       
      </tr>
      </table>  
    </div>
    </form>    
<div>

<?php
include 'connection.php';
if(isset($_POST['chan']))
{
  $dob=$_POST['dob'];
  $reg_no=$_POST['reg'];
   $mail=$_POST['email'];

   $query=mysql_query("Select DOB,reg_no,email from studreg where DOB='$dob' and reg_no='$reg_no' and email='$mail'  ");
   $row=mysql_fetch_array($query);
    $reg=$row['reg_no'];
   if(mysql_num_rows($query)>0)
   {

   
    
        echo  "<a href='passreset.php?id1={$row['reg_no']}' ?>Click Here to Change Your Password </a>";
   

      
      // $_SESSION['register']=$reg_no;  
      //  header("location:passreset.php");
    //  echo "<h3>Reset Password</h3>";
    //  echo "<form class='form-group' method='POST' action=''>
    //       <input type='text' class='form-control' name='pass' placeholder='Password' /><br/><br/>
        
    //        <input type='text' class='form-control' name='sid' style='display:none;'  value='.$sid.' />
    //       <input type='text' class='form-control' name='repass' placeholder='ReEnter-Password' /><br/><br/>
    //       <input type='submit' class='btn btn-primary' name='upbtn' </from>";
         
         
   
 
    
  }
  else
  {
    echo "Invalid Information";
    echo "<script>   </script>";
  } 
}



 

  
//} 


?>





   </div>






</body>
</html>






