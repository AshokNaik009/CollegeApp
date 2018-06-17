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
    font-size:medium;
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
        left:35%;
        width:40%; 
        padding-top:10%;   
   }
 
</style>
<script>
 

</script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
</head>
<body>
   

   <div class="customDiv drop-shadow box" >
   <form method="POST" name="f1" class="form-horizontal" style="padding-top:12px;" action=" " enctype="multipart/form-data" > 
   <h3  class="well"  style="margin-top:-10%;margin-left:10%;width:80%;background-color:white;" >  <button class="btn btn-info pull-left " name="sea" ><span class="glyphicon glyphicon-Home"></span><a href="index.php">Home </a> </button> Reset Password  </h3>
     <div class="form-group" >
      <table class="table table-hover text-centered"  border="1"  style="font-size:25px;margin-left:2%;width:95.5%" >      
      <tr>
    
        <td > 
        <input  id="groupidtext" minlength="8" type="password" maxlength="8" name="pass" placeholder="Password"  />  
      </tr>
      <tr>
        <td>
        <input onblur="checkLength(this)" minlength="8"   type="password" maxlength="8" name="repass" placeholder="ReEnter Password" />
      </tr>
      <tr>
        <td>
        <button class="btn btn-primary"  name="upbtn" >Submit</button>
        </td>
       
      </tr>
      </table>  
    </div>



<?php
include 'connection.php';


if(isset($_REQUEST['upbtn']))
{
   
    $pass=$_POST['pass'];
    $pass2=$_POST['repass'];
    $enc =base64_encode($_POST['pass']);
     if($pass==$pass2) {

    $reg_no=$_GET['id1'];

        
    
    $fec=mysql_query("SELECT  *  from  studreg where  reg_no='$reg_no' ");
    $row=mysql_fetch_array($fec);
    $mob=$row['mob'];

    
    $up=mysql_query("update  studreg set passtud='$enc' where reg_no='$reg_no'");
    if($up)
    {
       /*Start of SMS Package */

     // Authorisation details.
     $username = "naikashok08@gmail.com";
     $hash = "486dbbf9b90cbe85b8e6581058e0616b8d8747ecb537d3dbc1000d1e0df76b66";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
  // $numbers = "8879920190,$smob";
       // A single number or a comma-seperated list of numbers
       
	$message = "Your Password has been Updated Your New Password is:".$pass."Please Login Once" ;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
  $message = urlencode($message);

	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$mob."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    /*
    echo "<pre>";
    print_r($result);
    exit;
   End of SMS Package */




      echo "<script>alert('Password Updated');</script>";
      echo "<script> window.location.href='index.php';</script>";
       
    }
    else
    {
        die(mysql_error());
    }
  }
  else
  {
    echo "<script>  alert('Password do not Match');  </script>";
  }
 
}


?>

    
</body>
</html>