<!DOCTYPE html>
<html>
<head>
<title>
   College Social Network|Student
</title>
</head>

<script>
 function val()
       {

         if(!/^[a-zA-Z]*$/g.test(document.myForm2.sub.value))
         {
          alert('Enter Only Characters');
           document.myForm.sub.focus();
           return false;
         }
         return true;
        }
</script>
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
<link rel="stylesheet" href="restable.css">

<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" rel="stylesheet" />
 <body background-color="cadetblue">

<div class="customDiv drop-shadow box" >
<div class="container">
<h3  class="well"  style="margin-top:-10%;margin-left:5%;width:80%;background-color:white;" >  <button class="btn btn-info pull-left " name="sea" ><a href='stud2.php' ><span class="glyphicon glyphicon-home"> </span>Home</a> </button>  Download Notes  </h3>
<div class="col-sm-12" style="width:80%;margin-top:-5%;margin-left:70px;border-raidus:12px;">
<div class="jumbotron form-group-lg  ">
<form   name="myform2" method="POST" action="" >

<div class="form-group input-group ">

<table class="table-responsive"  >
<tr>
<td width="360px">
<div class="form-group input-group">
<span class="input-group-addon  " ><label class="control-label pull-left" > Subject:  </label> <span class="glyphicon glyphicon-book">  </span> </span>
   <span class="col-xs-12"> <input type="text" class="form-control"   name="sub" placeholder="Subject" required/> </span>
</div>
</td>
<td width="360px">
<div class="form-group input-group">
<span class="input-group-addon " ><label class="control-label pull-left" > Semseter:  </label> <span class="glyphicon glyphicon-user">  </span> </span>
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
<button class="btn btn-info pull-right" onclick="val()" name="sea" ><span class="glyphicon glyphicon-search">   </span> Search </button>
</td>
</tr>

</table>
</div>
  </form>
  <?php
include 'connection.php';
if(isset($_REQUEST['sea'])){


  $sub=$_POST['sub'];
  $sem=$_POST['sem'];

  $search=mysql_query("Select * from notes where Subject='$sub' and  semester='$sem' ");
  $res=mysql_num_rows($search);

     if($res == 0)
     {
        echo "Notes Are Not Available";
     }

     echo    "<div class='wrapper'    >


              <div class='table'>

                <div class='row header'>
                  <div class='cell'>
                    Uploaded By
                  </div>

                  <div class='cell'>
                    Subject Name
                  </div>

                  <div class='cell'>
                  File
                  </div>
                  </div>
                ";
   while($row=mysql_fetch_array($search))
  {

?>
      <div class="row" style="color:black;">

                <div class="cell" data-title="Faculty Name">
                 <?php echo $row['uploaded_by'] ?>
                </div>
                <div class="cell" data-title="Message">
                  <?php echo $row['Subject'] ?>
                </div>
                <div class="cell" data-title="Time Sent">
                   <?php echo $row['Note'] ?> <a href='Notes/<?php echo $row['Note'] ?>'>Click Here</a>
                </div>

        </div>




<?php



  }


}






?>

  </div>
  </div>
  </div>
</div>
</body>
</html>
