<?php
 include 'connection.php';
 if(isset($_REQUEST['rfac']))
 {
   $fname=$_POST['fname'];
   $fdes=$_POST['fdesig'];
   $fdob=$_POST['dob'];
   $gen=$_POST['gen'];
   $fmail=$_POST['femail'];
   $funame=$_POST['funame'];
    $fpass=base64_encode($_POST['fpass']);


   $fmob=$_POST['mob'];

   $fprofile=$_FILES['fProfile']['name'];
   $ftemp=$_FILES['fProfile']['tmp_name'];
   $target_dir = "profile/";
$base = $target_dir . basename($_FILES["fProfile"]["name"]);
$imageFileType = pathinfo($base, PATHINFO_EXTENSION);
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" )  {
     echo "<script>alert('Invalid File Type')</script>";
   }
   else if($_FILES['fProfile']['size']  > 2000000 )
   {

       echo "<script>alert('File to Large Please Select another File')</script>";
   }
   else
   {
   move_uploaded_file($ftemp,"profile/$fprofile");
   $val=mysql_query("select userfac,password from facreg where userfac='$funame' and password='$fpass' ");
   if(mysql_num_rows($val)>0)
   {
    echo "<script> alert('Already Registered');  </script>";
   }
    else
    {

     /*Start of SMS Package */

     // Authorisation details.
     $username = "naikashok08@gmail.com";
     $hash = "486dbbf9b90cbe85b8e6581058e0616b8d8747ecb537d3dbc1000d1e0df76b66";


	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
  // $numbers = "8879920190,$fmob";
       // A single number or a comma-seperated list of numbers

       $f=base64_decode($fpass);
	$message = "  Your Username=".$funame." password=".$f."  now you are a part of college Socail network .";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$fmob."&test=".$test;
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

      $query=mysql_query("INSERT INTO facreg(name,Designation,DOB,gender,email,fac_pic,mob,userfac,password) Values('$fname','$fdes','$fdob','$gen','$fmail','$fprofile','$fmob','$funame','$fpass')");
      if($query)
      {
       echo "<script> alert('Faculty Member Registered');</script>";
      //  die(mysql_error());
      //  echo "<script> window.location.href='adhome.php';</script>" ;

    }
    }
  }
}


if (isset($_REQUEST['rstud'])){
  $sname=$_POST['sname'];
  $suname=$_POST['suname'];
  $spass=base64_encode($_POST['spass']);

  $sem=$_POST['sem'];
  $sreg=$_POST['sreg'];
  $dob=$_POST['dob'];
  $gen=$_POST['gen'];
  $smob=$_POST['smob'];
  $smail=$_POST['smail'];
  $sprofile=$_FILES['sProfile']['name'];

     $target_dir = "profile/";
$base = $target_dir . basename($_FILES["sProfile"]["name"]);
  $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

  $stemp=$_FILES['sProfile']['tmp_name'];
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" )  {
    echo "<script>alert('Invalid format')</script>";
  }


else if($_FILES['sProfile']['size']  > 2000000 )
  {

     echo "<script>alert('File to Large Please Select another File')</script>";
  }
   else
  {
  move_uploaded_file($stemp,"profile/$sprofile");




  $val1=mysql_query("select userstud,passtud from studreg where userstud='$suname' and passtud='$spass' ");
  if(mysql_num_rows($val1)>0) //Checking the value already exists.
  {
   ?>
   <script>
   alert(" You have already Registered");
</script>
  <?php
  }
   else {




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
       $sp=base64_decode($spass);
	$message = "  Your Username=".$suname."  and password=".$sp."  now you are a part of College Socail Network .";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
  $message = urlencode($message);

	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$smob."&test=".$test;
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
   $id=$rndno=rand(1000, 9999);
    $query=mysql_query("INSERT INTO studreg(id,name,semester,reg_no,dob,gender,stu_pic,mob,email,userstud,passtud) Values('$id','$sname','$sem','$sreg','$dob','$gen','$sprofile','$smob','$smail','$suname','$spass')");

    if($query)
    {

      echo "<script> alert('Student Registred');</script>";
      echo "<script> window.location.href='adhome.php';</script>";
    }
   }
  }
}
?>



<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network
</title>
</head>
<link rel="stylesheet" href="navdes.css">
<link rel="stylesheet" href="formdes.css">
<link rel="stylesheet" href="restable.css">
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width intital-scale=1">
<link href="backdes2.css" rel="stylesheet" />
<style>
table{
   margin: 0 auto;
}

.box1
{
  width:85%;
  margin-left:auto;
  margin-right:auto;
  border:solid;
  padding:50px;
  margin-top:10%;
  font-size:large;
}
.nav-pills
{
  font-size:1.7em;
  background-color:black;
  opacity:.8;
  margin-top:0px;
  padding:15px;

}
.header
{
  position: sticky;
   top: 0;
   z-index: 100;
}
</style>
 <script>

 function alert_once() {
     var size=2000000;
     var file_size=document.getElementById('file_upload').files[0].size;
     if(file_size>size)
     {
         alert('File Size to Large');
      return false;
     }
     return true;
     }

     function validate1() {
         var size=2000000;
         var file_size=document.getElementById('file_up').files[0].size;
         if(file_size>size)
         {
             alert('File Size to Large');
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
function myFunction() {
    var x = document.getElementById("myDate").max = "2000-01-01";

    var y=document.getElementById("m")

}

</script>
<body>
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
<a href="adhome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:20%">
 <a href="adhome.php"  class="active " ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="#regfact"   > <span class="glyphicon 	glyphicon glyphicon-pencil"> </span>Register Faculty</a>
       <a  href="#regstud"> <span class="glyphicon glyphicon-pencil"> </span>Register Student</a>
       <a  href="#apppost"> <span class="	glyphicon glyphicon-check"></span> Approve Post</a>
       <a  href="delstudent.php"> <span class="	glyphicon glyphicon-cog"></span> Manage Student</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<?php
session_start();
if($_SESSION['useradmin']=="")
  {
       header("location:index.php");
  }
?>
<div id="regfact" class="container" style="border:solid ;background: #3AAFAB;
    color: black;">

    <h3 class="text-center">Register Faculty</h3>
     <form method="POST"   class="form form-group-lg" style ="padding-top:12px;" action="" enctype="multipart/form-data" >
           <ul class="flex-outer">
             <li>
               <label for="first-name"> <span class="glyphicon glyphicon-user">  </span> Name</label>
               <input type="text" id="first-name" class="form-control"  name="fname"  pattern="[A-Za-z\s]{1,32}"    title="Name Should Contains Only Characters" required >
             </li>
             <li>
               <label for="for-des"><span class="glyphicon glyphicon-briefcase">  </span>  Designation:</label>
                 <select  name="fdesig" class="form-control" > <option  > Lecturer</option>
                            <option  > Professor   </option>
                            <option > Asst Professor </option>
                  </select>
             </li>
             <li>
               <label for="Date of Birth"><span class="glyphicon glyphicon-calendar">  </span>  Date of Birth:</label>


               <input type="date"  id="myDate"   class="form-control"  min="1980-01-01" max="2000-01-01" onchange="myFun()"   class="form-control"   name="dob"     required/>


             </li>
             <li>
      <label for="Date of Birth"><span class="	glyphicon glyphicon-user">  </span>  Gender:</label>

                <select class="form-control"  name="gen" required  >
                <option value="Male"  >Male</option>
                <option value="Female">Female</option>
                </select>



             </li>



             <li>
               <label for="email"> <span class="glyphicon glyphicon-envelope">  </span>Email</label>
               <input type="email" id="email" name="femail"  class="form-control"  >
             </li>
             <li>
               <label for="pofil-pic"> <span class="glyphicon glyphicon-camera">  </span>Profile-Picture:</label>
               <input type="file" name="fProfile"  onChange='alert_once()'   class="form-control"   id="file_upload"  accept=".jpg,.png,.JPEG" />
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-phone">  </span>Mobile No</label>
               <input type="tel" id="phone"   class="form-control" name="mob" >
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-pencil">  </span>Username:</label>
               <input type="text"   name="funame" class="form-control"   pattern="[A-Za-z\s]{1,32}"   required >
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-lock">  </span>Password:</label>
               <input type="password" minlength="8"  name="fpass" class="form-control"  >
             </li>
 <button class="btn btn-primary  pull-right " name="rfac" ><span class="glyphicon glyphicon-pencil"></span>Register </button>
 <button  type="reset " class="btn btn-primary " name="refac" >Reset </button>

             </form>
       </div>




     <div id="regstud" class="container" style="border:solid ;background: #3AAFAB;margin-top:10%;
    color: black;">

    <h3 class="text-center">Register Student</h3>
     <form  class=" form-group-lg"method="POST"   style ="padding-top:12px;" action="" enctype="multipart/form-data" >
           <ul class="flex-outer">
             <li>
               <label for="first-name"> <span class="glyphicon glyphicon-user">  </span> Name:</label>
               <input type="text" class="form-control"  name="sname"  pattern="[A-Za-z\s]{1,32}"    title="Name Should Contains Only Characters" required >
             </li>
             <li>
               <label for="for-des"><span class="glyphicon glyphicon-education">  </span>  Semester:</label>
               <select class="form-control" name="sem"><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>
             </select>
             </li>
             <li>
             <li>
               <label for="first-name"> <span class="glyphicon glyphicon-user">  </span> Register Number:</label>
               <input type="text"   type="text"  class="form-control" maximum="8" name="sreg"  pattern="[A-Za-z0-9]+"    title="Name Should Contains Only Characters" required >
             </li>

               <li>
               <label for="Date of Birth"><span class="glyphicon glyphicon-calendar">  </span>  Date of Birth:</label>


          <input type="text"    onfocus="(this.type='date')"     class="form-control"   name="dob"     required/>
             </li>
             <li>
                <label for="Date of Birth"><span class="	glyphicon glyphicon-user">  </span>  Gender:</label>
                <select class="form-control"  name="gen" required  >
                <option value="Male"  >Male</option>
                <option value="Female">Female</option>
                </select>
           </li>
             <li>
               <label for="email"> <span class="glyphicon glyphicon-envelope">  </span>Email</label>
               <input type="email"  class="form-control" id="email" name="smail"  >
             </li>
             <li>
               <label for="pofil-pic"> <span class="glyphicon glyphicon-camera">  </span>Profile-Picture:</label>
               <input type="file" name="sProfile" class="form-control"    onChange='validate1()'    id="file_up"  accept=".jpg,.png,.JPEG" />
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-phone">  </span>Mobile No</label>
               <input type="tel" id="phone" class="form-control" minlength='10' pattern="[0-9]+"  name="smob" >
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-pencil">  </span>Username:</label>
               <input type="text"   name="suname"  class="form-control"  pattern="[A-Za-z0-9]+"  required >
             </li>
             <li>
               <label for="phone"><span class="glyphicon glyphicon-lock">  </span>Password:</label>
               <input type="password" minlength="8"  class="form-control"  name="spass"  required  >
             </li>
 <button class="btn btn-primary  pull-right " name="rstud" ><span class="glyphicon glyphicon-pencil"></span>Register </button>
 <button type="reset " class="btn btn-primary " name="refac" >Reset </button>

             </form>
       </div>
<div class="box1" id="apppost" style="padding:90px;">
<?php
           $st=0;
           $tb=mysql_query("select * from Feed where app_post='$st'   order by  id DESC  ");
           $res=mysql_num_rows($tb);

           if($res == 0)
           {
              echo "<h3  ><center> No Post Uploaded</center></h3>";
           }
           else
           {
            echo  "<div class='table'>

            <div class='row header'>
              <div class='cell'>
                Post Id
              </div>
              <div class='cell'>
               Username
              </div>
              <div class='cell'>
                 Post Text
              </div>
              <div class='cell'>
                Image
              </div>
              <div class='cell'>
                Upload Time
              </div>
              <div class='cell'>
              Upload Date
              </div>
              <div class='cell'>
             Approve Post
              </div>
            </div>";

           while($res=mysql_fetch_array($tb))
           {

            $u=$res['uid'];
            $tb1=mysql_query("select userstud,stu_pic from studreg where id='$u'");
            $res1=mysql_fetch_assoc($tb1);
            $p1= $res['image'];
            $p2=$res1['stu_pic'];

        ?>

           <div class="row">
              <div class="cell" data-title="Name">
              <?php   echo $res['id'];     ?>
              </div>
              <div class="cell" data-title="Username">
              <?php   echo $res1['userstud']; ?>
              </div>
              <div class="cell" data-title="PostText">
              <?php   echo $res['ptext']; ?>
              </div>
              <div class="cell" data-title="Image">
              <?php   echo "<img src='images/$p1' width='100px' height='100px'  >" ?>
              </div>
              <div class="cell" data-title="Upload Time">
              <?php   echo $res['uptime']; ?>
              </div>
              <div class="cell" data-title="Upload Date">
              <?php   echo $res['upldate']; ?>
              </div>
              <div class="cell" data-title="Approve">
              <form method="POST"> <input type="text" name="pid" value="<?php echo $res['id'] ?>" style="display:none;"/>       <button class="btn btn-primary"   name="sub" type="submit">Approve</button> <br/> <br/>  <button class="btn btn-primary" name="del" type="submit" onclick="return confirm('Do You want to delete it');"  >Delete</button>     </form>
              </div>
            </div>

            <?php
           }}
?>

</div>
<?php

if(isset($_POST['sub'])){


   $pid=$_POST['pid'];
  $query=mysql_query("Update feed set app_post='1' where app_post='0'  and id='$pid' ");
  if($query)
  {
    echo "<script> alert('Post Approved'); </script>";
    echo "<script> window.location.href='adhome.php'</script>";
  }
  else
  {
    die(mysql_error());
  }

}


if(isset($_POST['del'])){
 $pid=$_POST['pid'];

  $del=mysql_query("delete from feed where id='$pid'");

   if($del)
   {
     echo "<script>   alert('Post Deleted');</script>";
     echo "<script>    window.location.href='adhome.php'; </script>";
   }
   else
   {
      die(mysql_error());
   }

}



?>
</div>



<div id="footer">
</div>

</body>
</html>
