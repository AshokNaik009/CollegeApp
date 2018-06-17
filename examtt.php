<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Student TimeTable
</title>
</head>
<link rel="stylesheet" href="navdes.css">
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
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

.customDiv
{
    margin:3px;
    min-height:90%;
    text-align:center;
    font-size:medium;
    background-color:white;

}
body {
  background: linear-gradient(to bottom, #20c9aa, #20c98f, #4fa4c3);
  font-family: 'Raleway', sans-serif;
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
.iframe-container {
  position: relative;
  padding-bottom: 56.25%;
  margin: 0 auto;
  width: 100%;
}

iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
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
    <a href="index.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
<a href="stuhome.php" ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="examresult.php"  > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt.php" class="active "> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="notfi.php"> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">
<div class="row">

<div class="outer customDiv drop-shadow" style="margin-top:10%;margin-left:10%;font-size:18px; background-color:white;height:80%;" >
 <h2 style="align:center;margin-top:-120px;margin-bottom:10px;">Exam TimeTable</h2>
 <form  method="POST" style="margin-top:7%;padding:15px;" >
 <label class="form-control col-xs-6/" >Semester:</label><select class="form-control col-xs-6" name="sem"><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>
              </select>
              <br/><br/>
              <button class="btn btn-info  " name="sub" ><span class="glyphicon glyphicon-search">   </span> Search </button>
              <button class="btn btn-success  " name="sub" ><span class="glyphicon glyphicon-download">   </span><a href='dwnldnotes.php' style='text-decoration:none;color:white;' >Download Notes</a> </button>


 </form>
 <?php

   if(isset($_REQUEST['sub'])){
  $sem=$_POST['sem'];
  $query=mysql_query("SELECT * FROM ExamTTable where sem ='$sem'");

  while($res=mysql_fetch_assoc($query)){
  ?>
 
 <div class="embed-responsive embed-responsive-4by3"x>
   <iframe class="embed-responsive-item" src="TimeT/<?php echo $res['timetable']; ?>"  style="width:700px; height:550px;" frameborder="0">  </iframe>
   </div>
    


 </div>

  <?php }}?>



</div>




</div>
</div>
</body>
</html>
