<!DOCTYPE  html>
<html>
<head>
<title>  College Social Network | Manage Student</title>
</head>
<link href="backdes.css" rel="stylesheet" />
<style>
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

 .box
   {
        position:fixed;
        left:15%;
        width:70%;
        padding-top:10%;
        background-color:#eee;
        height:60%;
   }
</style>

<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
<body style=" background-color:cadetblue;">
<div class="customDiv drop-shadow box" >
<form method="POST"  action=" ">
<h3  class="well"  style="margin-top:-10%;margin-left:10%;width:80%;background-color:white;" >  <button class="btn btn-info pull-left " name="sea" > <a href="adhome.php" style='text-decoration:none;color:white;'> <span class="glyphicon glyphicon-home"> </span>Home</a> </button>  Student List  </h3>
<form method="post"  >
<table class="table-responsive"  style="margin-left:20%;"  >
<tr>
<td width="360px">
<div class="form-group input-group">
<span class="input-group-addon " > Semester:   <span class="glyphicon glyphicon-user">  </span> </span>
<span class="col-xs-12">
<select class="form-control" name="sem"><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>  </select>
              </span>
</td>
<td>
<button class="btn btn-info pull-right " type="submit" name="sea" ><span class="glyphicon glyphicon-search">   </span> Search </button>
</td>
</tr>
</table>
</form>
<?php
include 'connection.php';
if(isset($_POST['sea']))
{
    $sem=$_POST['sem'];
    $query=mysql_query("SELECT id,name,semester,reg_no,email from studreg where semester='$sem'");
    $res=mysql_num_rows($query);
    if($res==0)
    {
        echo "<script>  alert('Student List  Already  Generated');          </script>";
    }
    else
    {


        echo   "<table border='1' class='table table-striped table-bordered table-hover  table-condensed'>
                <tr>
                 <th style='font-weight:bold;'>ID</th>
<th style='font-weight:bold;'>Name</th>
<th style='font-weight:bold;'>Semester</th>
<th style='font-weight:bold;'>Register Number</th>
<th style='font-weight:bold;'>Email</th>
<th style='font-weight:bold;'>Update</th>
<th style='font-weight:bold;'>Delete</th>
</tr>";

while($row=mysql_fetch_array($query)) {
?>
  <tr>
  <td><?php echo $row['id'] ?></td>
  <td><?php echo $row['name'] ?> </td>
  <td><?php echo $row['semester'] ?> </td>
  <td> <?php echo $row['reg_no'] ?> </td>
  <td><?php   echo $row['email']  ?> </td>
  <td><button class="btn btn-danger " ><a href="delstudent.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit </a></button>   </td>
  <td> <button class="btn btn-danger" > <a href="delstudent.php?id1=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Delete </a></button> </td>
  </tr>


    <?php
}
    }
    echo "</table> ";
    echo "<button class='btn btn-danger' onclick='return confirm('Do You want to delete it');'  name='del'> <a href='genpdf.php?sm=$sem'    style='text-decoration:none;color:white'>  Delete Students </a> </button>";
}




?>

<?php

if(isset($_GET['id1']))
{
    $id=$_GET['id1'];

    $delete=mysql_query("DELETE from studreg where id='$id' ");

    if($delete)
    {
        echo "<script> alert('deleted');  </script>";
    }
    else
    {
        die(mysql_error());
    }


}


if(isset($_GET['id']))
{


    $id=$_GET['id'];

$get1=mysql_query("SELECT * FROM studreg where id='$id'");

$res=mysql_fetch_assoc($get1);

$dec=base64_decode($res['passtud']);
 echo "<form method='POST' action='delstudent.php'  enctype='multipart/form-data' >
        <input type='text'   name='id'  style='display:none'  value='$id' />
        Name: <input type='text' name='sname' value='{$res['name']}' /><br/>
        <br/>
        Email: <input type='mail' name='mail' value='{$res['email']}' /><br/>
        <br/>
        Profile-Picture:<input  type='file' id='file-input' accept='.jpg,.png,.JPEG'  name='ppic'   /><br/>
        <br/>
         Semester:
               <select  name='sem'><option>1<sup>st</sup> Semester</option>
              <option>2<sup>nd</sup> Semester</option>
              <option>3<sup>rd</sup> Semester</option>
              <option>4<sup>th</sup> Semester</option>
              <option>5<sup>th</sup> Semester</option>
              <option>6<sup>th</sup> Semester</option>
             </select>
             <br/>
        Username:<input type='text'  name='uname'   value='{$res['userstud']}' /><br/>
        <br/>
        Password:<input type='text' minlength='8' name='pass' value='$dec' /><br/>
        <br/>
        <input type='submit' class='btn btn-primary' name='upbtn' value='Update'  /></form>";
}


if(isset($_POST['upbtn']))
{
  $name=$_POST['sname'];
  $mail=$_POST['mail'];
  $id=$_POST['id'];
  $u=$_POST['uname'];
  $p=base64_encode($_POST['pass']);
  $upic=$_FILES['ppic']['name'];
  $sem=$_POST['sem'];
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


 $update=mysql_query("UPDATE studreg set   semester='$sem', name='$name' ,email='$mail',userstud='$u' ,passtud='$p' where id='$id' ");

 if($update)
 {


   echo "<script>alert('Record updated') </script>";

 }
 else
 {
   die(mysql_error());
 }
}
  else
  {
    $id=$_GET['id'];
    $update=mysql_query("UPDATE studreg set semester='$sem',  name='$name' ,email='$mail',stu_pic='$upic',userstud='$u' ,passtud='$p' where id='$id' ");
    if($update)
    {
     echo $upic;
      echo "<script>alert('Record updated') </script>";
    }
    else
    {
      die(mysql_error());
    }
  }
}
}
?>
<form method="POST"  action=" ">
<h3  class="well"  style="margin-top:15%;margin-left:10%;width:80%;background-color:white;" >  Faculty List  </h3>
<form method="post"  >
<table class="table-responsive"  style="margin-left:20%;"  >
<tr>

<td>
<button class="btn btn-info" type="submit" name="seaf" ><span class="glyphicon glyphicon-search">   </span> Search </button>
</td>
</tr>
</table>
</form>
<?php

include 'connection.php';

if(isset($_POST['seaf']))
{



    $query=mysql_query("SELECT * from facreg ");




    $res=mysql_num_rows($query);
    if(!$query)
    {
      die(mysql_error());
    }

    else
    {


        echo   "<table border='1' class='table table-striped table-bordered table-hover  table-condensed'>
                <tr>
                 <th style='font-weight:bold;'>ID</th>
<th style='font-weight:bold;'>Name</th>
<th style='font-weight:bold;'>Designation</th>
<th style='font-weight:bold;'>Email</th>
<th style='font-weight:bold;'>Update</th>
<th style='font-weight:bold;'>Delete</th>
</tr>";

while($row=mysql_fetch_array($query)) {
?>
  <tr>
  <td><?php echo $row['id'] ?></td>
  <td><?php echo $row['name'] ?> </td>
  <td><?php echo $row['Designation'] ?> </td>
  <td> <?php echo $row['email'] ?> </td>
  <td><button class="btn btn-danger " ><a href="delstudent.php?fid=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit </a></button>   </td>
  <td> <button class="btn btn-danger" > <a href="delstudent.php?fid1=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Delete </a></button> </td>
  </tr>


    <?php
}
    }
    echo "</table> ";
    echo "<button class='btn btn-danger' onclick='return confirm('Do You want to delete it');'  name='del'>     Delete Students  </button>";
}


if(isset($_GET['fid1']))
{
    $id=$_GET['fid1'];

    $delete=mysql_query("DELETE from facreg where id='$id' ");

    if($delete)
    {
        echo "<script> alert('deleted');  </script>";
    }
    else
    {
        die(mysql_error());
    }


}


if(isset($_GET['fid']))
{


    $id=$_GET['fid'];

$get1=mysql_query("SELECT * FROM facreg where id='$id'");

$res=mysql_fetch_assoc($get1);

$dec=base64_decode($res['password']);
 echo "<form method='POST'   enctype='multipart/form-data' >
        <input type='text'   name='id' style='display:none'  value='$id' />
        Name: <input type='text' name='sname' value='{$res['name']}' /><br/>
        <br/>
        Email: <input type='mail' name='mail' value='{$res['email']}' /><br/>
        <br/>
        Profile-Picture:<input  type='file' id='file-input' accept='.jpg,.png,.JPEG'  name='ppic'   /><br/>
        
        Username:<input type='text'  name='uname'   value='{$res['userfac']}' /><br/>
        <br/>
        Password:<input type='text' minlength='8' name='pass' value='$dec' /><br/>
        <br/>
        <input type='submit' class='btn btn-primary' name='upfbtn' value='Update'  /></form>";
}


if(isset($_POST['upfbtn']))
{
  $name=$_POST['sname'];
  $mail=$_POST['mail'];
  $id=$_POST['id'];
  $u=$_POST['uname'];
  $p=base64_encode($_POST['pass']);
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
 $update=mysql_query("UPDATE facreg set    name='$name' ,email='$mail',userfac='$u',password='$p' where id='$id' ");

 if($update)
 {


   echo "<script>alert('Record updated') </script>";

 }
 else
 {
   die(mysql_error());
 }
}
  else
  {
    $id=$_GET['id'];
    $update=mysql_query("UPDATE studreg set semester='$sem',  name='$name' ,email='$mail',stu_pic='$upic',userstud='$u' ,passtud='$p' where id='$id' ");
    if($update)
    {
     echo $upic;
      echo "<script>alert('Record updated') </script>";
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
</body>
</html>
