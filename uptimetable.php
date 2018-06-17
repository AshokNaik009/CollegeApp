<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();

 if(isset($_REQUEST['sub'])){

    $fac_id=$_SESSION['uid'];


    $fec=mysql_query("SELECT  name  from facreg where  id ='$fac_id' ");
    $row=mysql_fetch_array($fec);
    $u=$row['name'];

    $sem=$_POST['sem'];
    $file=$_FILES['timet']['name'];
    $file_loc=$_FILES['timet']['tmp_name'];
    move_uploaded_file($file_loc,"TimeT/$file");

    if(trim($_FILES['timet']['name']) == ""  )
    {
        echo "<script>  alert('Please Select A File');    </script>";
    }
    else
    {

   $valid=mysql_query("select * from ExamTTable where  timetable='$file' or sem='$sem' ");

   if(mysql_num_rows($valid)>0)
   {

       echo "<script>alert('File already Uploaded')</script>";
   }

   else
   {
    $insert=mysql_query("INSERT INTO ExamTTable(sem,facq,timetable) values('$sem','$u','$file')");
    if($insert)
    {
        echo "<script>alert('File Uploaded'); </script>";

    }
    else
    {
        die(mysql_error());
    }
   }
}




 }





?>

<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Student TimeTable
</title>
</head>

<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" href="navdes.css">
<meta name="viewport" content="width=device-width intital-scale=1">
<style>
 .outer
{
  width:85%;
  margin-left:auto;
  margin-right:auto;
  border: double;
  border-radius: 12px;
  padding:150px;
  text-align:center;
  margin-top:19%;

}
body {
    background-color:cadetblue;
}

.customDiv
{
    margin:3px;
    min-height:90%;
    text-align:center;
    font-size:medium;
    background-color:white;

}

.drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        border:none;
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
   background-color:black;
}
.image-upload > input
{
    display: none;
}
</style>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

<body >
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
    <a href="fachome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
 <a href="fachome.php"  ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="sendpost.php" > <span class="glyphicon 	glyphicon glyphicon-send"> </span>Send Post</a>
       <a  href="entermarks.php"> <span class="glyphicon glyphicon-pencil"> </span>Enter Marks</a>
       <a  href="uptimetable.php"  class="active "> <span class="	glyphicon glyphicon-upload"></span> Exam TimeTable</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">
<div class="row">

<div class="outer customDiv drop-shadow" style="margin-top:10%;margin-left:10%;font-size:18px; background-color:white;height:120%;" >
 <h2 style="align:center;margin-top:-120px;margin-bottom:10px;">Exam TimeTable</h2>
 <form  method="POST" style="margin-top:7%;padding:15px;"  enctype="multipart/form-data" >

<table class="table-responsive"   style="margin-left:-2%;"  >
<tr>
<td >
<div class="form-group input-group">
<span class="input-group-addon " > Semseter:   <span class="glyphicon glyphicon-user">  </span> </span>
<span class="col-xs-12">
<select class="form-control" name="sem"><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>  </select>
              </span>
</td>
<td >
 <input type="file" name="timet" accept=".pdf" />
</td>
<button class="btn btn-info pull-right " name="sub" ><span class="glyphicon glyphicon-upload ">   </span> upload </button>
</td>
</tr>
</table>
</form>
 <div class="displayTimeTable" id="area" style="padding-bottom:0px;border:1px solid;border-raidus:12px;">
  <?php

 $query=mysql_query("SELECT * FROM ExamTTable  ORDER BY id  DESC LIMIT 1");

 while($res=mysql_fetch_assoc($query)){
 ?>



   <iframe src="TimeT/<?php echo $res['timetable']; ?>"  style="width:700px; height:550px;" frameborder="0">  </iframe>
   </div>



</div>

 <?php } ?>


</div>
</div>
</body>
</html>
