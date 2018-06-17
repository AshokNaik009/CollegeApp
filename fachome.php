<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
  session_start();
 if(isset($_REQUEST['sub'])){

    $fac_id=$_SESSION['uid'];
    $msg=$_POST['noti'];
    $valid=mysql_query("SELECT Message,id from Notifications where id='$fac_id' and Message='$msg'");
    $row=mysql_fetch_array($valid);
    if(mysql_num_rows($valid)>0)
    {
        ?>
        <script>
           alert("Notification is Already been Sent");
        </script>
     <?php
    }
    else
     {
         $fec=mysql_query("SELECT  name  from facreg where  id ='$fac_id' ");
         $row=mysql_fetch_array($fec);
         $fac_name=$row['name'];

        $insert=mysql_query("INSERT INTO Notifications(fac_name,Message) values('$fac_name','$msg')");

         if($insert)
         {
             ?>
              <script>
                  alert("Notification Sent Succesfully");
              </script>
             <?php
         }
         else
         {
             die(mysql_error());
         }



    }






 }





?>

<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Faculty Home
</title>
</head>
<meta name="viewport" content="width=device-width intital-scale=1">
<link href="backdes.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="navdes.css">
<link rel="stylesheet" href="restable.css">
<link href="css/bootstrap-theme.css" rel="stylesheet" />
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
body {
    background-color:cadetblue;
}
.scrollable
{
 width:70%;
 margin-left:25%;
 margin-right:15%;

}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row1 {
  display: table-row;
  background: #f6f6f6;
}
.row1:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header1 {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;

}
.row1.green {
  background: #27ae60;
}
.row1.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row1 {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header1 {
    padding: 0;
    height: 6px;
  }
  .row.header1 .cell {
    display: none;
  }
  .row1 .cell {
    margin-bottom: 10px;
  }
  .row1 .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
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
  <a href="fachome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
  <div style="margin-left:40%">

 <a href="fachome.php"  class="active " ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="sendpost.php" > <span class="glyphicon 	glyphicon glyphicon-send"> </span>Send Post</a>
       <a  href="entermarks.php"> <span class="glyphicon glyphicon-pencil"> </span>Enter Marks</a>
       <a  href="uptimetable.php"> <span class="	glyphicon glyphicon-upload"></span> Exam TimeTable</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>

          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">


<div class="customDiv drop-shadow" style="overflow:auto;margin-top:10%;margin-left:10%;font-size:18px; background-color:white;height:80%;" >
 <h2 style="align:center;margin-top:15px;margin-bottom:10px;padding-top:12px;"> Send Notifications</h2>
 <form  method="POST" style="margin-top:7%;padding:15px;" >
  <label style="margin-left:-60%;" >Notification Message:</label><br/>

      <textarea rows="10" cols="35" name="noti" maxlength="75"  style="width:634px;height:134px;resize:none;"   required></textarea><br/>
 <button class="btn btn-primary" name="sub" ><span class="glyphicon glyphicon-send">   </span> Send </button>




 </form>
 <form method="POST">
 <button class="btn btn-primary" name="viw" ><span class="glyphicon glyphicon-eye-open">   </span> ViewNotifications </button>
 </form>

<?php

if(isset($_REQUEST['viw']))
{


$fac_id=$_SESSION['uid'];
$fec=mysql_query("SELECT  name  from facreg where  id ='$fac_id' ");
$row=mysql_fetch_array($fec);
$fac_name=$row['name'];

 $query=mysql_query("select * from Notifications where fac_name='$fac_name'  order by  id DESC");
 $res=mysql_num_rows($query);

 if($res == 0)
 {

        echo "<h3>  No Notifications  Uploaded Yet   </h3>";
  }
else
{


    echo    "<div class='wrapper'    >


             <div class='table'>

               <div class='row header'>
                 <div class='cell'>
                   Notification-ID
                 </div>
                 <div class='cell'>
                   Faculty Name
                 </div>
                 <div class='cell'>
                    Message
                 </div>
                 <div class='cell'>
                     Time Sent
                 </div>
                 <div class='cell'>
                  Delete
                 </div>
                 </div>
               ";


 while($row=mysql_fetch_array($query)) {
  ?>

  <div class="row" style="color:black;">
            <div class="cell" data-title="id">
              <?php echo $row['id'] ?>
            </div>
            <div class="cell" data-title="Faculty Name">
             <?php echo $row['fac_name'] ?>
            </div>
            <div class="cell" data-title="Message">
              <?php echo $row['Message'] ?>
            </div>
            <div class="cell" data-title="Time Sent">
               <?php echo $row['time_sent'] ?>
            </div>
            <div class="cell" data-title="Delete">
              <form method='post'> <input type='text'  name='nid' value=<?php  echo $row['id'];   ?> style="display:none;" /> <br/><button name='del' class='btn btn-danger' onclick="return confirm('Do You want to delete it');"   type='submit'> <span class="glyphicon glyphicon-trash"> </span>Delete  </button>  </form>
            </div>
    </div>







<?php  ; }?>

</div>
<?php



 }

}





?>

<?php
if(isset($_REQUEST['del']))
{

$nid=$_POST['nid'];

$delete=mysql_query("DELETE from Notifications where   id='$nid' " );

if($delete)
{
    echo "<script> alert('Notification  Deleted');   </script>";
}
else
{
    die(mysql_error());
}
}
?>
</div>
</div>
</body>
</html>
