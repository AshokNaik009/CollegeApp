<!DOCTYPE html>
<html>
<head>
<title>Friend|Request</title>
<meta name="viewport" content="width=device-width intital-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" href="navdes.css">

<style>
.hidden{
display:none;
}
.header
{
  position: sticky;
   top: 0;
   z-index: 100;
   background-color:black;
}
.customDiv
{
    margin:3px;
    min-height:90%;
    text-align:center;
    font-size:medium;
  
}
body {
  background: linear-gradient(to bottom, #20c9aa, #20c98f, #4fa4c3);
  font-family: 'Raleway', sans-serif;
}

.nav-pills
{
  font-size:1.7em;
  background-color:black;
  opacity:.9;
  margin-top:0px;
  padding:15px;

}

.drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        border:none;
    }
    .scrollable{
      overflow:scroll;
      height:67px;
      border-style:groove;

      border-radius:12px;
    }
.scroll
{
    height:370px;
    width:450px;
    resize:both;
    overflow:scroll;
    font-size: 20px;

  left:30%;
  position: absolute;;
  background-color: white;
  border-style:double;
  border-color: black;
  border-radius:12px;
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
</head>
<script src="js/bootstrap.min.js"></script>
<body>
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
    <a href="stuhome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
<a href="stuhome.php" ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="examresult.php" > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt.php"> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="notfi.php" class="active "> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="conatiner" >
<div class="rows" >

<div class="col-md-4 customDiv drop-shadow scrollable" style="width:23%;padding-bottom:20%;margin-top:25px;margin-left:7%;height:65px;background-color:white;" >
<h2 style="align:left;top:-10px;margin-bottom:1px;padding-top:12px;">Suggestions</h2>

<?php
include 'tryfunction.php';
showSuggest();
?>
</div>



<div class="col-md-8  customDiv drop-shadow  scroll"  style='width:60%;margin:27px;height:20%;padding:5%'>
<h2 style="align:center;top:0px;margin-bottom:17px;padding-top:12px;padding-bottom:12px">Notifications</h2>
<?php

$query=mysql_query("SELECT * from Notifications");

while($row=mysql_fetch_array($query)){
?>
   <br/><span class="pull-left"> Faculty Name:   <?php echo $row['fac_name']; ?>   </span></br/>
   <!-- <p style='padding:90px;background-color:#1ddced;color:white;font-size:20px'>--> <?php   echo $row['Message']; ?>  <hr style="border:1px solid;"/>
  <?php } ?>


</div>


<div class="col-md-2 customDiv drop-shadow scrollable" style="width:23%;padding-bottom:20%;margin-top:395px;margin-left:-23%;height:65px;background-color:white;" >
<div dir='rtl'>
<?php

  showRequest();
?>




</div>
</div>


</div>
</div>



</body>
</html>
