<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Student
</title>
</head>
<link rel="stylesheet" href="navdes.css">
<link rel="stylesheet" href="tabledes.css">
<script src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width intital-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<style>
 .outer
{
  width:55%;
  margin-left:auto;
  margin-right:auto;
  border: double;
  border-radius: 12px;

  text-align:center;
  margin-top:8%;

}
body {
  background: linear-gradient(to bottom, #20c9aa, #20c98f, #4fa4c3);
  font-family: 'Raleway', sans-serif;
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






.form{
  border: 1px solid red;
  display: flex;

  margin-left:20%;
  width: 40%;
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

@media only screen and (max-width: 480px) {
    table {
        width:105%;
       
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
    <a  href="examresult.php" class="active " > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt2.php"> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="not2.php"> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>




<form  method="POST" name="f1" >
<div class="form  customDiv drop-shadow"   style="position:relative;left:10%;margin-top:5%;">
<div class="text text--grande"><input type="text"  name="reg" maximum="8"  placeholder="Register Number" required /></div>
<div class="text"> <select   id="select_path" name='sem' ><option  name='sem' >1<sup>st</sup> Semester</option>
                               <option  id="select_path" name="sem">2<sup>nd</sup> Semester</option>
                               <option id="select_path" name="sem"> 3<sup>rd</sup> Semester</option>
                               <option  id="select_path" name="sem">4<sup>th</sup> Semester</option>
                               <option    id="select_path" name="sem">5<sup>th</sup> Semester</option>
                           <option   id="select_path"  name="sem">6<sup>th</sup> Semester</option>   </select></div>
<div class="text"><button class="btn btn-default"   name="sub" >  <span class="glyphicon glyphicon-search">   </span>    Search </button></div>
</form>
</div>
</div>
<?php

if(isset($_REQUEST['sub'])){
  $reg=$_POST['reg'];
  $sem=$_POST['sem'];
  $sid=$_SESSION['uid'];

  $valid = mysql_query("SELECT * from studreg where    id='$sid' and reg_no='$reg' or semester='$sem'");

  if(mysql_num_rows($valid)>0)
  {
  $query=mysql_query("SELECT * FROM Marks where reg_no='$reg' and semester='$sem' ");
  $res=mysql_num_rows($query);

  if($res == 0)
  {
     echo "<h3 ><center> Marks Not Uploaded</center></h3>";
  }
  else
  {
  while($row=mysql_fetch_array($query)) :
?>



<div  class="container ">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
    <table  style="background-color:white;font-size:16px;" class="table table-striped table-bordered table-hover  table-condensed" >
      <th>Subject No</th>
      <th>Marks</th>
      <tr>
          <th> Subject 1:</th>
           <td>
           <?php echo $row['sub1']?>
           </td>
      </tr>
      <tr>
          <th> Subject 2:</th>
           <td>
           <?php echo $row['sub2']?>
           </td>
      </tr>
      <tr>
          <th> Subject 3:</th>
           <td>
           <?php echo $row['sub3']?>
           </td>
      </tr>
      <tr>
          <th> Subject 4:</th>
           <td>
           <?php echo $row['sub4']?>
           </td>
      </tr>
      <tr>
          <th> Subject 5:</th>
           <td>
           <?php echo $row['sub5']?>
           </td>
      </tr>
      <tr id="overall0"> 
          <th> Subject 6:</th>
           <td>
           <?php echo $row['sub6']?>
           </td>
      </tr>
      <?php  if( $row['sub6'] ==0 )
     
     {  echo "<script>  document.getElementById('overall0').style.display = 'none';    </script>"; } ?>  
      <tr id="overall">
          <th> Subject 7:</th>
           <td>
           <?php echo $row['sub7']?>
           </td>
      </tr>
      <?php  if( $row['sub7'] ==0 )
     
     {  echo "<script>  document.getElementById('overall').style.display = 'none';    </script>"; } ?>  
     <tr>
         <th>Total</th>
         <td> <?php echo $row['total'] ?></td>

     </tr>
       

    </table>
  </div>
</div>



<?php endwhile; } }

else
{
   echo "<script>  alert('Invalid Register Number and Semester');  </script>";
}

}
?>

</div>
    <center><a   style='color:white' href="http://rcub.ac.in/examination/results-page" target="_blank">Link to University Website</a></center> 








</form>

</body>
</html>
