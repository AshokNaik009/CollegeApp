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
    background-color:white;
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
      height:370px;
      border-style:groove;

    }
.scroll
{
   
   
    border-style:groove;
    overflow:scroll;
    font-size: 20px;
  
}

.classwidth{
    margin:10px;
    padding:3px;
}
.classwi{
    margin-left:12%;
    padding:3px;
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
    <a href="stud2.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
<a href="stud2.php" ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="examresult.php" > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt2.php"> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="not2.php" class="active "> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">

<div class="row">

  <div class="col-sm-3 drop-shadow " style="min-height:65px; overflow:scroll;">
  
  <div class="panel panel-default ">
                            <div class="panel-body text-center scrollable">
  <h3> Suggestions</h3>
  <?php
include 'tryfunction.php';
showSuggest();
?>
  </div>
  </div>
 
  

</div><!-- End of the panel Default-->

<div class="col-sm-8  col-sm-offset-1 drop-shadow ">

<div class="panel panel-default ">
                            <div class="panel-body text-center">
                            <h3> Notifications </h3>
                            </div>                        
  </div><!-- End of the First Panel -->
  <?php

$query=mysql_query("SELECT * from Notifications");

while($row=mysql_fetch_array($query)){
?>
  <div class="panel panel-default  ">
                            <div class="panel-body text-center ">
                            <br/><span class="pull-left"> Faculty Name:   <?php echo $row['fac_name']; ?>   </span></br/>
   <!-- <p style='padding:90px;background-color:#1ddced;color:white;font-size:20px'>--> <?php   echo $row['Message']; ?>  <hr style="border:1px solid;"/>
  <?php  echo "</div> </div>"; }    ?>
                         



</div><!-- End of col sm 8-->

</div><!-- End of first Row -->

<div class="row">
<div class="col-sm-3 drop-shadow  ">
  <div class="panel panel-default">
                            <div class="panel-body  text-center scrollable">
                            <?php
                     showRequest();
                            ?>
</div>
</div>

</div><!-- End of the panel Default-->




</div><!-- End of Second Row -->




</div><!-- End of Container Div-->




</body>
</html>
