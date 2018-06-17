<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();
if(isset($_POST['btnpost']))/*  Button to add a new feed into the feed table (Posting text or images)    */
{
    $id=$_SESSION['uid'];
  $pt = $_POST['pt'];
  $result=mysql_query("select * from  studreg  where id='$id'");
       $row= mysql_fetch_assoc($result);
        /*  Fetching username based on session variable    */     
  $u=$row['userstud'];
  $tm =date("h:i:sa");
  $dt= date("Y/m/d");
  if(isset($_FILES['img1']))
  {
    if($_FILES['img1']['size']  > 2000000 )
    {
       echo "<script>alert('File to Large')</script>";
    }
    else
    {
  $img=$_FILES['img1']['name'];
  $temp=$_FILES['img1']['tmp_name'];
  $status=0;

  move_uploaded_file($temp,"images/$img");
    
  
  if(trim($_POST['pt']) == ""  && trim($_FILES['img1']['name']) == "" )
  {
    ?>
    <script>
       alert("Post Not Uploaded");
    </script>
 <?php

  } 
  else{
      /*  Insert query for the feed table  */
    $insert=mysql_query("INSERT INTO feed(username,uptime,upldate,image,Ptext,app_post) Values('$u','$tm','$dt','$img','$pt','$status')");
   if($insert)
   {
    ?>
    <script>
       alert("Post Uploaded");
    </script>
 <?php
  
   }
   else
   {
    die(mysql_error());  
   }   
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
<script language='javascript'>

<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width intital-scale=1">
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

.customDiv     /*  The div creating shadow Effect    */
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
 
 <div style="margin-left:40%">
 <a href="stuhome.php"  class="active " ><span class="glyphicon glyphicon-home"> </span>Home</a> 
    <a  href="examresult.php" > <span class="glyphicon glyphicon-list-alt"> </span>Exam Result</a>
       <a  href="examtt.php"> <span class="glyphicon glyphicon-calendar"> </span>Exam TimeTable</a>
       <a  href="notfi.php"> <span class="	glyphicon glyphicon-bell"></span> Notifications</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-off"></span> Logout</a>
</div>
  
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div class="container text-center " >
          <div class="row">
              <div class='col-md-2 container drop-shadow'>
              <?php  
    $id=$_SESSION['uid'];
    $query=mysql_query("SELECT * from studreg where id='$id'");
    while($res=mysql_fetch_array($query)) {
      $p2=$res['stu_pic'];
   ?>

  

    <h4>Profile Details</h4>
  <?php  echo "<img src='sprofile/$p2' width='150px' height='150px' padding-bottom='50%' style='border-radius:50%;'>"; ?>
  <p><span class="glyphicon glyphicon-user"></span>  <?php  echo $res['name'] ?></p> 
  <p><span class="glyphicon glyphicon-education"></span>  <?php  echo $res['semester'] ?></p> 
  <p><span class="glyphicon glyphicon-pencil"></span>  <?php  echo $res['reg_no'] ?></p> 
  <p><span class="glyphicon glyphicon-envelope"></span>  <?php  echo $res['email'] ?></p> 
 
   <button class="btn-btn" ><a href="stuhome.php?id=<?php echo $res['reg_no'] ?>"><span class="glyphicon glyphicon-edit"></span> Update Details </a></button>
    <?php } ?>

    
   
<?php
if(isset($_GET['id']))
{
$get1=mysql_query("SELECT * FROM studreg where reg_no='{$_GET['id']}'");

$res=mysql_fetch_assoc($get1);
 echo "<form method='POST' action='stuhome.php'  enctype='multipart/form-data' >
        Name: <input type='text' name='sname' value='{$res['name']}' />
        Email: <input type='mail' name='mail' value='{$res['email']}' />
        Profile-Picture:<input type='file' id='file-input' accept='.jpg,.png,.JPEG'  name='ppic'   />
        Username:<input type='text'  name='uname'   value='{$res['userstud']}' />
        Password:<input type='text' minlength='8' name='pass' value='{$res['passtud']}' /> 
        <input type='submit' class='btn btn-primary' name='upbtn' value='Update'  /></form>"; 
}

if(isset($_POST['upbtn']))
{
  $name=$_POST['sname'];
  $mail=$_POST['mail'];
  $id=0;
  $u=$_POST['uname'];
  $p=$_POST['pass'];
  $upic=$_FILES['ppic']['name'];
  $temp=$_FILES['ppic']['tmp_name'];
  move_uploaded_file($temp,"sprofile/$upic");

  if($_FILES['ppic']['size']  > 2000000 )
  {
     echo "<script>alert('File to Large')</script>";
  }
  else
  {
  
  if(trim($_FILES['ppic']['name']) == ""  )
  {
    $id=$_SESSION['uid'];

 $update=mysql_query("UPDATE studreg set  name='$name' ,email='$mail',userstud='$u' ,passtud='$p' where id='$id' ");
 
 if($update)
 {
  

   echo "<script>alert('Record updated') </script>";
      echo  "<script>window.location.href='stuhome.php'</script>";
 }
 else
 {
   die(mysql_error());
 } 
}
  else
  {
    $id=$_SESSION['uid'];

    $update=mysql_query("UPDATE studreg set  name='$name' ,email='$mail',stu_pic='$upic',userstud='$u' ,passtud='$p' where id='$id' ");
    
    if($update)
    {
     echo $upic;
   
      echo "<script>alert('Record updated') </script>";
         echo  "<script>window.location.href='stuhome.php'</script>";
    }
    else
    {
      die(mysql_error());
    } 
  
   
  }

  
 
 
  


}
}
?>    
</div>
<div class="col-md-6 col-sm-offset-1"    >
<div  id="post" class='container drop-shadow'    style="width:65%;background-color:white; ;z-index: -1;  text-align:center; padding:25px; margin-bottom:70px; font-size:large; ">
  <form method="POST" name="f1" class="form-control-lg"  enctype='multipart/form-data' action=""  >
   <label class="pull-left">POST: </label><br/>
   <textarea  style="resize:none; width:75%" class="form-control" name="pt" id="pt" rows="5" title="What's on your mind?"  >  </textarea>
   <span class="image-upload">
    <label for="file-input" class="pull-left">
        <img  src="placeholder.jpg" height="55px" width="95px" />
    </label>
    <input id="file-input"   name="img1" type="file"  accept=".jpg,.png,.JPEG"  />
    </span>
    <button type="submit" class="btn btn-primary pull-right"  name="btnpost"><span class="glyphicon glyphicon-send"> </span> &nbsp;POST </button>
   </form>
</div>

<?php
    $p=date("Y/m/d");
    $st='1';
           $tb=mysql_query("select * from Feed   where upldate='$p' and app_post='$st'  order by  id DESC  ");

           while($res=mysql_fetch_array($tb))
           {
            echo " <div class=' drop-shadow'style='width:100%;background-color:white;overflow:auto;z-index: -1 ;  height:15%;text-align:center;padding:15px;margin-bottom:5px; font-size:large; '>";
            $u=$res['username'];
            $tb1=mysql_query("select stu_pic from studreg where userstud='$u'");
            $res1=mysql_fetch_assoc($tb1);
            $p1= $res['image'];
            $p2=$res1['stu_pic'];
        ?>

       <table class="table table-hover  table-bordered table-hover  table-condensed"  >
         <tr>
              <td width="5%">
             <span class="pull-left"><?php if($p2!=""){ echo "<img src='sprofile/$p2' width='50px' height='50px' style='border-radius:50%;'>";}?>
              
           <?php echo $res['username'] ?></span>
                
          <?php   if($p1!=""){ echo "<img src='images/$p1' width='200px' height='200px'  >";}?>
                 
          <span class="pull-right">  <?php echo $res['uptime']  ?> </span>
             
                </td>
                 <tr>
                <td>
           <textarea rows='5'  cols='50' disabled readonly style='resize:none; border:none;' ><?php echo $res['ptext'] ?> </textarea>
                </td>
            </tr></table>
            <?php
           echo "</div>";
           ?>
            <?php
           }
?>
</div>


<div class="col-md-3 container drop-shadow  " >
            
<?php
 include 'connection.php';
 $id=$_SESSION['uid'];
    echo "<center><h3 class='well'><span class='glyphicon glyphicon-inbox'></span>   INBOX</h3></center>";

 $query=mysql_query("select DISTINCT send_id from chat where status='1' and rec_id='$id'");
 if($res=mysql_num_rows($query)==0)
 {
  ?>
  <?php
  include 'friendlist.php';
  getfriends();
  ?>
 <?php     
 }
 else
 {
  while($res=mysql_fetch_array($query))
  {  
      $sid=$res['send_id'];
      $fec=mysql_query("SELECT  userstud,stu_pic  from studreg where  id ='$sid'  ");
      $row=mysql_fetch_array($fec);
      $sid=$row['userstud'];
      $p2=$row['stu_pic'];

      echo " <p class='text-center'><br/><img src='sprofile/$p2' width='50px' height='50px' style='border-radius:50%;'><br/>";
        echo    "<br/>".$sid."";
             echo "<br/><a class='btn btn-success' href='chatroom.php?id=$sid'> Message(1) </a></p>";
       
 }
 
 }

?>
           
             


          </div>
   </div>


































































































































</div>
</div>
     <a href="stuhome.php" class="pull-right"  style="postion:fixed;top:550px"> <img src="up.png"  width="25px" height="25px"/> </a> 
</div>

</body>
</html>

