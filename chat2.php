<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();


    $id=$_SESSION['uid'];

  $result=mysql_query("select * from  studreg  where id='$id'");
       $row= mysql_fetch_assoc($result);


       if(isset($_POST['submit']))
       {
           $sen_id=$_SESSION['uid'];;
           $rec=$_POST['rec_name'];
           $tm =date("h:i:sa");
            $st=1;

           $result=mysql_query("select id from  studreg  where userstud='$rec'");
           $row= mysql_fetch_assoc($result);
           $rec_id=$row['id'];


           $msg=$_POST['msg'];

           $insert=mysql_query("INSERT INTO chat(send_id,rec_id,msg,date,status) values('$sen_id','$rec_id','$msg','$tm','$st')");
           $db1= new PDO('mysql:host=127.0.0.1;dbname=collegedb','root','');
           $run=$db1->query($insert);


            if($insert)
            {


                $sec=1;
                 header("Refresh:$sec;url='chat2.php?id=$rec'");
               ?>
               <script>
                  alert("Message sent");



               </script>
            <?php


            }
       }



?>


<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network
</title>
<meta name="viewport" content="width=device-width intital-scale=1">
<link rel="stylesheet" href="navdes.css">
<meta http-equiv="refresh"  content="1:url=http://localhost/collegeApp/chat2.php?id=$_GET['id'];"/>
</head>


<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="backdes2.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<style>
 /* div
{
  width:85%;
  margin-left:auto;
  margin-right:auto;
  border: double;
  border-radius: 12px;
  padding:150px;
  text-align:center;
} */

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




.chatbox
{
    width:500px;
    min-width:390px;
    height:500px;
    background: #fff;
    padding: 25px;
    margin:20px auto;
    box-shadow:0 3px #ccc;
}
.chatlogs {
    padding:10px;
    width:100%;
    height:350px;
    overflow-x:hidden;
    overflow-y: scroll;
}
.chatlogs::-webkit-scrollbar{
  width:10px;
}
.chatlogs::-webkit-scrollbar-thumb{
     border-radius: 5px;
     background: rgba(0,0,0,.1);
  }
.chat {
    display:flex;
    flex-flow:row wrap;
    align-items:flex-start;
    margin-bottom:10px;

}

.chat .user-photo {
    width:60px;
    height:60px;
    background: #ccc;
    border-radius:50%;
     overflow: hidden;
}

.chat .user-photo img
{
    width:100%;

}

.chat .chat-message {
     width:70%;
     padding:15px;
     margin:5px 10px 0;
     background: #1ddced;
     border-radius: 10px;
     color:#fff;
     font-size:20px;

}

.friend  .chat-message {
      background: #1adda4;

}
.self .chat-message{
    background: #1ddced;
    order:-1;
}

.chat-form{
    margin-top:20px;
    display:flex;
    align-items:flex-start;
}

.chat-form textarea {
     background: #fbfbfb;
     width:155%;
     height:70px;
     border: 2px solid #eee;
     border-radius: 3px;
     resize: none;
     padding: 10px;
     font-size:8px;
     color:#333;


}
.chat-form  input
{
    display: none;
}

.chat-form textarea:focus {
    background: #fff;
    font-size: 24px;
}
.chat-form textarea::-webkit-scrollbar{
    width:10px;
  }
  .chat-form textarea::-webkit-scrollbar-thumb{
       border-radius: 5px;
       background: rgba(0,0,0,.1);
    }

/* .chat-form button {
    background:#1ddced;
    padding :5px 15px;
    font-size:30px;
    color:#fff;
    border:none;
    margin:0 10px;
    border-radius: 3px;
    box-shadow: 0 3px 0 #0eb2c1;
    cursor: pointer;

    -webkit-transition: background .2s ease;
    -moz-transition: background .2s ease;
    -o-transition: background .2s ease;
}

.chat-form button:hover {
    background: #13c8d9;

} */

.messagePanel{

    position: absolute;
    border:1px solid;
    width:20%;
    padding:245px;
     left:67%;
}
.fetname{

    position: absolute;
    padding-top:-10%;


}

table td
{
  width:auto !important;
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


<body>
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
  <a href="stud2.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>

 <div style="margin-left:40%">
 <a href="stud2.php"  class="active " ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="examresult.php" > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt2.php"> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="not2.php"> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>

          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

 
 <div class="container">  
<div class="row">
<div class="col-sm-2   col-sm-offset-0  drop-shadow text-center" style="background-color:white">
<?php
    $rec=$_GET['id'];
    $query=mysql_query("SELECT * from studreg where userstud='$rec'");
    while($res=mysql_fetch_array($query)) {
      $p2=$res['stu_pic'];
       $u=$_SESSION['uid'];
       $rid=$res['id'];

   $up=mysql_query("update chat set status='0' where rec_id='$u'   and send_id='$rid' and status='1'");
   if($up)
   {
    //   echo "<script>  alert('Status Updated');   </script>";
   }


   ?>

  <div  style="width:100%">

  <?php  echo "<img src='profile/$p2' width='150px' height='150px' padding-bottom='50%' style='border-radius:50%;'>"; ?>
  <br/> <br/>
  <p><span class="glyphicon glyphicon-user"></span>  <?php  echo $res['name'] ?></p>
  <p><span class="glyphicon glyphicon-education"></span>  <?php  echo $res['semester'] ?></p>
  <p><span class="glyphicon glyphicon-pencil"></span>  <?php  echo $res['reg_no'] ?></p>
  <p><span class="glyphicon glyphicon-envelope"></span>  <?php  echo $res['email'] ?></p>


  <form method='post'> <input type='text' name='df'  value="<?php echo $res['id'];}   ?>"   style="display:none;" /> <br/>   <button class="btn btn-danger" type="submit" name='del' onclick="return confirm('Do You want to delete it');" ><span class="glyphicon glyphicon-trash">   </span> Delete Friend </button>   </form>;



 </div>

</div><!--End of the First Row -->


<div class="row" >


<div class="col-sm-4   col-md-6 " style="margin-left:2%;">
<div class="panel panel-default">
<div class="panel-body">

<?php
 include 'connection.php';

$db1= new PDO('mysql:host=127.0.0.1;dbname=collegedb','root','');
if(isset($_GET['id']))
{

      $rec=$_GET['id'];
      $u=$_SESSION['uid'];


      $result=mysql_query("select id,stu_pic from  studreg  where userstud='$rec'");
    $row= mysql_fetch_assoc($result);


    $rid=$row['id'];
    $p3=$row['stu_pic'];

    echo "<h2 style='border:1px solid;padding:5px;background-color:#1adda4;color:white' ><img src='profile/$p3' width='50px' height='50px' style='border-radius:50%;'>&nbsp".  $rec."</h2></p>";


      $q1 ="select * from chat where send_id='$u' and rec_id='$rid' or send_id='$rid' and rec_id='$u'  ORDER by id DESC";




     $run =$db1->query($q1);

      echo "<div class='chatlogs' style=' ' >";
    while ($row= $run->fetch(PDO::FETCH_ASSOC)) :



    ?>
        <?php   if($row['send_id'] == $_SESSION['uid']){ ?>
          <div class='chat self'>
          <p class='chat-message'> <?php echo $row['msg'] ?></p>
          <p style="margin-top:15px;" > <?php echo $row['date'] ?> </p>
           </div>
          <?php }
         else
         { ?>
        <div class='chat friend'>
        <p style="margin-top:15px;" > <?php echo $row['date'] ?> </p>
            <p class='chat-message'><?php echo  $row['msg'] ?></p>

        </div>

       <?php
          }  endwhile;}
        echo "</div>";




        ?>


<form name='msg-form' method="POST">
<input type="text" name="rec_name" style="display:none;"  value="<?php  echo $_GET['id'];  ?>"  />
<textarea name="msg"  rows='5'  cols='30'     style='resize:none;width:40%; ' ></textarea><br/>
             <button class="btn btn-success pull-left" style="width:15%;margin-left:65%;margin-top:-35px;" name="submit"> Send</button>
</form>




</div><!--End of panel body -->
</div><!--End of panel default -->
</div><!--End of complex -->
<div class="col-sm-3  drop-shadow text-center" style="background-color:white">
<h3>Friend List</h3>
<?php
  include 'friendlist.php';
  getfriends();
  ?>
  </div>

</div><!--End of the second Row -->









 







</div><!-- End of col sm2 >

</div><!--End of Container -->
</body>
</html>
<?php
if(isset($_REQUEST['del']))
{
  $u1=$_POST['df'];
  $u2=$_SESSION['uid'];

//   echo $u1;
//   echo $u2;
 $delfriend=mysql_query("DELETE from friends where user_one='$u1' and user_two='$u2' or  user_one='$u2' and user_two='$u1'");

  if($delfriend)
  {
    echo "<script>  alert('Friend Deleted');  </script>";
    echo "<script>  window.location.href='stud2.php'</script>";
  }
  else
  {
    die(mysql_error());
  }


}

?>
