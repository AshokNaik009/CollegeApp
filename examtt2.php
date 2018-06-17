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
 /* CSS for responsive iframe */
/* ========================= */

/* outer wrapper: set max-width & max-height; max-height greater than padding-bottom % will be ineffective and height will = padding-bottom % of max-width */
#Iframe-Master-CC-and-Rs {
  max-width: 712px;
  max-height: 100%; 
  overflow: hidden;
}

/* inner wrapper: make responsive */
.responsive-wrapper {
  position: relative;
  height: 0;    /* gets height from padding-bottom */
  
  /* put following styles (necessary for overflow and scrolling handling on mobile devices) inline in .responsive-wrapper around iframe because not stable in CSS:
    -webkit-overflow-scrolling: touch; overflow: auto; */
  
}
 
.responsive-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  
  margin: 0;
  padding: 0;
  border: none;
}

/* padding-bottom = h/w as % -- sets aspect ratio */
/* YouTube video aspect ratio */
.responsive-wrapper-wxh-572x612 {
  padding-bottom: 90%;
}

/* general styles */
/* ============== */
.set-border {
  border: 5px double #4f4f4f;
}
.set-box-shadow { 
  -webkit-box-shadow: 4px 4px 14px #4f4f4f;
  -moz-box-shadow: 4px 4px 14px #4f4f4f;
  box-shadow: 4px 4px 14px #4f4f4f;
}
.set-padding {
  padding: 10px;
}
.set-margin {
  margin: 30px;
}
.center-block-horiz {
  margin-left: auto !important;
  margin-right: auto !important;
}


.form{
  border: 1px solid red;
  display: flex;

  margin-left:20%;
  width: 60%;
  clear:both;
}
.text{
  outline:1px solid black;
  flex:1 1 200px;
  width:33%;
  float:left;
  margin-right: 10px;
  padding: 8px 10px;
}
.text--grande{
  flex:1 0 40%;
}
input{
  width: 100%;
}





@media only  screen and (max-width:977px) {
.form{
  border: 1px solid red;
  display: flex;
  flex-wrap:wrap;
  max-width: 90%;
  width: 100%;
    margin-left:0%;
  clear:both;
}
.text{
  outline:1px solid black;
  flex:1 1 200px;
  width:23%;
  float:left;
  margin-right: 10px;
  padding: 8px 10px;
}
.text--grande{
  flex:1 0 40%;
}
input{
  width: 100%;
}







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
    <a href="stud2.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
<a href="stud2.php" ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="examresult.php"  > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt2.php" class="active "> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="not2.php"> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>




<form  method="POST" name="f1" >
<h2 class="text-center">Exam TimeTable</h2>
<div class="form  customDiv drop-shadow"   style="position:relative;left:5%;margin-top:2%;">

<div class="text"> Semester: <select   id="select_path" name='sem' ><option  name='sem' >1<sup>st</sup> Semester</option>
                               <option  id="select_path" name="sem">2<sup>nd</sup> Semester</option>
                               <option id="select_path" name="sem"> 3<sup>rd</sup> Semester</option>
                               <option  id="select_path" name="sem">4<sup>th</sup> Semester</option>
                               <option    id="select_path" name="sem">5<sup>th</sup> Semester</option>
                           <option   id="select_path"  name="sem">6<sup>th</sup> Semester</option>   </select></div>
<div class="text"><button class="btn btn-info  " name="sub" ><span class="glyphicon glyphicon-search">   </span> Search </button></div>
<div class="text"><button class="btn btn-success  " name="sub" ><span class="glyphicon glyphicon-download">   </span><a href='dwnldnotes.php' style='text-decoration:none;color:white;' >Download Notes</a> </button></div>
</form>
</div>
</div>




 <!-- <form  method="POST" style="margin-top:7%;padding:15px;" >
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


 </form> -->
 <?php

   if(isset($_REQUEST['sub'])){
  $sem=$_POST['sem'];
  $query=mysql_query("SELECT * FROM ExamTTable where sem ='$sem'");

  while($res=mysql_fetch_assoc($query)){
  ?>
 
 
   <!-- <iframe class="embed-responsive-item" src="TimeT/<?php echo $res['timetable']; ?>"  style="width:700px; height:550px;" frameborder="0">  </iframe> -->
  
  








 
 <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                        <div class="responsive-wrapper 
                           responsive-wrapper-wxh-572x612"
                           style="-webkit-overflow-scrolling: touch; overflow: auto;">
                      
                           <iframe class="embed-responsive-item" src="TimeT/<?php echo $res['timetable']; ?>"  style="width:700px; height:550px;" frameborder="0">  </iframe>
                            <p style="font-size: 110%;"><em><strong>ERROR: </strong>  
                      An &#105;frame should be displayed here but your browser version does not support &#105;frames. </em>Please update your browser to its most recent version and try again.</p>
                          </iframe>

  <?php }}?>



</div>







</body>
</html>
