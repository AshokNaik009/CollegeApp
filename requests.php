<?php
session_start();
 $requestid=$_GET['id'];
 $requesting=$_SESSION['uid']; 
 $con = mysql_connect('localhost','root','');
 $con1=mysql_select_db('collegedb',$con);
  $insert=mysql_query("INSERT INTO friend_request(user_to,user_from) values($requestid,$requesting)");
  
  if($insert)
  {
    ?>
    <script>
       alert("Friend Request Sent");
    </script>
  <?php
    header('location:notfi.php');
  }
  else
  {
    ?>
    <script>
       alert("Check for some Errors");
    </script>
  <?php
  }
?>
