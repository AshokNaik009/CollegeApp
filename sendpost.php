<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
  session_start();
  if(isset($_POST['btnpost']))
  {
    $id=$_SESSION['uid'];
    $tm =date("h:i:sa");
    $dt= date("Y/m/d");
    $pt=$_POST['pt'];
    $img=$_FILES['img1']['name'];
    $temp=$_FILES['img1']['tmp_name'];
    if($_FILES['img1']['size']  > 2000000 )
    {
       echo "<script>alert('File to Large')</script>";
    }
    else
    {
    move_uploaded_file($temp,"images/$img");
    if($_SESSION['uid']=="")
    {
         header("location:index.php");
    }

    if(trim($_POST['pt']) == ""  && trim($_FILES['img1']['name']) == "" )
    {
      ?>
      <script>
         alert("Post Not Uploaded");
      </script>
   <?php

    }
    else{
            $fac_id=$_SESSION['uid'];
        $fec=mysql_query("SELECT  userfac  from facreg where  id ='$fac_id' ");
        $row=mysql_fetch_array($fec);
        $u=$row['userfac'];
      $insert=mysql_query("INSERT INTO feed(username,uptime,upldate,image,Ptext) Values('$u','$tm','$dt','$img','$pt')");
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

?>

<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Faculty Home
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
</style>
<script>
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


</script>

<body >
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
  <a href="fachome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
<div style="margin-left:40%">

 <a href="fachome.php"   ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="sendpost.php"  class="active " > <span class="glyphicon 	glyphicon glyphicon-send"> </span>Send Post</a>
       <a  href="entermarks.php"> <span class="glyphicon glyphicon-pencil"> </span>Enter Marks</a>
       <a  href="uptimetable.php"> <span class="	glyphicon glyphicon-upload"></span> Exam TimeTable</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<div class="container">
<div class="row">
<!-- DIV for Update -->
<div class="col-lg-2   customDiv drop-shadow" style="width:22%;background-color:white;font-size:14px;" >
<?php

  $id=$_SESSION['uid'];



  $query=mysql_query("select * from facreg  where id='$id'");


  while($res=mysql_fetch_array($query))
  {
   $p1=$res['fac_pic'];

  ?>

   <div style="width:100%;">

    <?php  echo "<img src='profile/$p1' width='150px' height='150px' padding-bottom='50%' style='border-radius:50%;'>"; ?>
    <p><span class="glyphicon glyphicon-user"></span>  <?php  echo $res['name'] ?></p>
  <p><span class="glyphicon glyphicon-briefcase"></span>  <?php  echo $res['Designation']?></p>
  
  <p><span class="glyphicon glyphicon-envelope"></span>  <?php  echo $res['email']  ?></p>

   </div>
   <br/>
   <br/>
   <button class="btn btn-default" ><a href="sendpost.php?id=<?php echo $res['id'] ?>"> <span class="glyphicon glyphicon-edit"></span> Update Details </a></button>
    <?php } ?>



<?php
if(isset($_GET['id']))
{
$get1=mysql_query("SELECT * FROM facreg where id='{$_GET['id']}'");

// function decryptIt( $q ) {
//   $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
//   $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
//   return( $qDecoded );
// }
 $res=mysql_fetch_assoc($get1);
          $enc =base64_decode($res['password']);
         
         
// $decrypted = decryptIt( $enc );
// echo $decrypted;
 echo "<form method='POST' action='sendpost.php'  enctype='multipart/form-data' ><br/><br/>
        Name: <input type='text' name='sname' value='{$res['name']}' /><br/><br/>
        Email: <input type='mail' name='mail' value='{$res['email']}' /><br/><br/>
        Profile-Picture:<input type='file' id='file-input' accept='.jpg,.png,.JPEG'  name='ppic'   /><br/><br/>
        Username:<input type='text'  name='uname'   value='{$res['userfac']}' /><br/><br/>
        
        Password:<input type='text'  minlength='8' name='pass' value='$enc' /><br/><br/>
        <input type='submit' class='btn btn-primary' name='upbtn' value='Update'  /></form>";
}

if(isset($_POST['upbtn']))
{
  $name=$_POST['sname'];
  $mail=$_POST['mail'];
  $id=0;
  $u=$_POST['uname'];
  $p=  base64_encode($_POST['pass']);
  $upic=$_FILES['ppic']['name'];
      $temp=$_FILES['ppic']['tmp_name'];
      move_uploaded_file($temp,"profile/$upic");

  if($_FILES['ppic']['size']  > 2000000 )
  {
     echo "<script>alert('File to Large')</script>";
  }
  else
  {
    if(trim($_FILES['ppic']['name']) == ""  )
  {
    $id=$_SESSION['uid'];
    $update=mysql_query("UPDATE facreg set  name='$name' ,email='$mail',userfac='$u' ,password='$p' where id='$id' ");

    if($update)
    {
      echo "<script>alert('Record updated') </script>";
         echo  "<script>window.location.href='sendpost.php'</script>";
    }
    else
    {
      die(mysql_error());
    }
  }
  else
  {
      $id=$_SESSION['uid'];
      $update=mysql_query("UPDATE facreg set  name='$name' ,email='$mail',fac_pic='$upic',userfac='$u' ,password='$p' where id='$id' ");

      if($update)
      {
        echo "<script>alert('Record updated') </script>";
           echo  "<script>window.location.href='sendpost.php'</script>";
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
<div class="col-lg-7" style="left:3%;margin-top:20px;" >
 <!--POST Section to  POST a image or an update    -->
<div  id="post" class='container drop-shadow'    style="width:85%;background-color:white;z-index: -1;  text-align:center; padding:25px; margin-bottom:70px; font-size:large; ">
  <form method="POST" name="f1" class="form-control-lg" enctype="multipart/form-data"  >
   <label class="pull-left">POST: </label><br/>
   <textarea  style="resize:none; width:75%" class="form-control" name="pt" id="pt" rows="5" title="What's on your mind?"  >  </textarea>
   <span class="image-upload">
    <label for="file-input" class="pull-left">
        <img  src="placeholder.jpg" height="55px" width="95px" />
    </label>
    <input id="file-input" name="img1" type="file" accept=".jpg,.png,.JPEG"  />
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
            echo " <div class=' drop-shadow'style='width:100%;background-color:white; ;z-index: -1 ;  height:35%;text-align:center;padding:55px;margin-bottom:10px; font-size:large; '>";
            $u=$res['username'];
            $tb1=mysql_query("select fac_pic from facreg where userfac='$u'");
            $res1=mysql_fetch_assoc($tb1);
            $p1= $res['image'];
            $p2=$res1['fac_pic'];
        ?>
            <span class="pull-left" style=" margin-top:-40px;margin-left:-12px;"><?php   if($p2!=""){ echo "<img src='profile/$p2' width='50px' height='50px' style='border-radius:50%;'>";}?></span>
            <span  class="pull-left" style="margin-top:-30px ;margin-right:45px;"> <?php echo $res['username'] ?> </span>

            <span  style=" position: absolute; margin-top:-7%;margin-left:-70px"><?php   if($p1!=""){ echo "<img src='images/$p1' width='100px' height='100px'  >";}?></span>
            <span  class="pull-right" style="position:relative; margin-top:-10%"><?php echo $res['uptime']  ?><br/><?php echo $res['upldate']  ?></span><br/>
              <br/>
            <span style=" position:relative;margin-left:-10%;margin-top:100%; " ><textarea rows='5'  cols='50' disabled readonly style='resize:none; border:none;' ><?php echo $res['ptext'] ?> </textarea></span>
            <?php
           echo "</div>";
           ?>
            <?php
           }
?>
 <!--END OF POST   -->
</div>




<div  class="col-lg-2 customDiv drop-shadow" style="left:3%;margin-top:20px;padding-bottom:10%;padding-top:5%;font-size:14%;" >
 <form method="POST" class="form-control-lg" enctype='multipart/form-data' >

    <input type="text"    class="form-control" name="subname"  placeholder="Subject"   required/>
    <br/> <br/>
    <span class="input-group-addon " ><label class="control-label pull-left" > Semseter:  </label> <span class="glyphicon glyphicon-user">  </span> </span>
<select class="form-control" name="sem"><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>  </select>
    <input type="file"    class="form-control" name="sub"    accept=".pdf"    required />
    <br/> <br/>
    <button class="btn btn-primary" name="subj" ><span class="glyphicon glyphicon-upload">   </span> Upload Notes </button>
 </form>
 <?php

if(isset($_POST['subj'])){

  $sub_name=$_POST['subname'];
  $id=$_SESSION['uid'];
  $fec=mysql_query("SELECT  name  from facreg where  id ='$id' ");
    $row=mysql_fetch_array($fec);
    $u=$row['name'];

    $sem=$_POST['sem'];
    $file=$_FILES['sub']['name'];
    $file_loc=$_FILES['sub']['tmp_name'];
    move_uploaded_file($file_loc,"Notes/$file");

    if($_FILES['sub']['size']  > 5000000 )
    {
       echo "<script>alert('File to Large')</script>";
    }
    else
    {
      $val=mysql_query("select * from notes where  Note='$file' and  Subject='$sub_name' and semester='$sem' ");

      if(mysql_num_rows($val)>0)
      {

        echo "<script>alert('File Already Uploaded');</script>";

      }

      else
      {
        echo $u;


        $insert=mysql_query("INSERT INTO notes(uploaded_by,Subject,semester,Note) values('$u','$sub_name','$sem','$file') ");

         if($insert)
         {
           echo "<script> alert('Notes Uploaded Succesfully');  </script>";
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




</div>
</div>
</body>
</html>
