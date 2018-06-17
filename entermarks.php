<?php
include 'connection.php';
 date_default_timezone_set('Asia/Kolkata');
 session_start();

 if(isset($_REQUEST['sub'])){


  $fac_id=$_SESSION['uid'];


  $fec=mysql_query("SELECT  name  from facreg where  id ='$fac_id' ");
         $row=mysql_fetch_array($fec);
         $u=$row['name'];


      

    $reg=$_POST['reg'];
    $sem=$_POST['sem'];

    $sub1=$_POST['sm1'];
    $sub2=$_POST['sm2'];
    $sub3=$_POST['sm3'];
    $sub4=$_POST['sm4'];
    $sub5=$_POST['sm5'];
    $sub6=$_POST['sm6'];
    $sub7=$_POST['sm7'];

    $total=$_POST['total'];


   $val2=mysql_query("select * from  studreg where reg_no='$reg' ");
   $res=mysql_num_rows($val2);
   if($res == 0)
   {
      echo "<script> alert('Invalid Register Number');    </script>";
   }


   else
   {
    $val=mysql_query("SELECT * FROM marks where reg_no='$reg' and semester='$sem'");
    if($row=mysql_fetch_array($val)>0)
    {
      echo "<script> alert('Marks Already Entered');</script>";
    }
    else
    {
   $insert=mysql_query("INSERT INTO Marks(reg_no,fac_name,semester,sub1,sub2,sub3,sub4,sub5,sub6,sub7,total) values('$reg','$u','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$total')");
   if($insert)
   {
     ?>
     <script>
  alert("Marks Entered");
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
   College Social Network|Student
</title>
</head>
<script>
  function cal()
  {
 
  
    var value=document.getElementById('select_path').value;
   
      if(value=='6th Semester')
      {
        
        var sub1=document.f1.sm1.value;
        var sub2=document.f1.sm2.value;
        var sub3=document.f1.sm3.value;
        var sub4=document.f1.sm4.value;
        var sub5=document.f1.sm5.value;
       
        var total=parseInt(sub1)+parseInt(sub2)+parseInt(sub3)+parseInt(sub4)+parseInt(sub5);
     if(total>0)
     {
      document.getElementById('total').value =total;
      return false;
     }
      }
      else if( value=='5th Semester' || value=='4th Semester' || value=='3rd Semester' || value=='2nd Semester' || value=='1st Semester'  )
      {
        
        var sub1=document.f1.sm1.value;
     
        var sub2=document.f1.sm2.value;
        
        var sub3=document.f1.sm3.value;
        
        var sub4=document.f1.sm4.value;
       
        var sub5=document.f1.sm5.value;
        
        var sub6=document.f1.sm6.value;
      
        var sub7=document.f1.sm7.value;
        
        // var sub8=document.f1.sm8.value;
        
        var total=parseInt(sub1)+parseInt(sub2)+parseInt(sub3)+parseInt(sub4)+parseInt(sub5)+parseInt(sub6)+parseInt(sub7);
        
     if(total>0)
     {
      document.getElementById('total').value =total;
      return false;
     }
     return true;
      }




      return true;
  }





   function  hidetxt()
  {


   var value=document.getElementById('select_path').value;

     if(value === '6th Semester')
     {
      document.getElementById('overall').style.display = 'none';
      
      document.getElementById('overall1').style.display = 'none';
      
     }

  //    if(value === '4th Semester')
  //    {

  //       var table = document.getElementById("myTable");
  //       // Create an empty <tr> element and add it to the 1st position of the table:
  // var row = table.insertRow(-1);

  // // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
  // var cell1 = row.insertCell(0);
  // var cell2 = row.insertCell(1);
  //   var cell3 = row.insertCell(2);
  // // Add some text to the new cells:
  // cell1.innerHTML = "Subject 8: ";
  // cell2.innerHTML = "<input  type='range' name='rangeInput' min='0' max='20' onchange='updateTextInput7(this.value);' style='width:80%;''>";
  //   cell3.innerHTML = "<input type='text' id='textInput7' name='sm8'  readonly>  ";
  //    }



  }
     function updateTextInput(val) {
       

          document.getElementById('textInput').value=val;
        }

        function updateTextInput1(val) {
          document.getElementById('textInput1').value=val;
        }
        function updateTextInput2(val) {
          document.getElementById('textInput2').value=val;
        }
        function updateTextInput3(val) {
          document.getElementById('textInput3').value=val;
        }
        function updateTextInput4(val) {
          document.getElementById('textInput4').value=val;
        }
        function updateTextInput5(val) {
          document.getElementById('textInput5').value=val;
        }
        function updateTextInput6(val) {
          document.getElementById('textInput6').value=val;
        }
        function updateTextInput7(val) {
          document.getElementById('textInput7').value=val;
        }

        function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<meta name="viewport" content="width=device-width intital-scale=1">
<link rel="stylesheet" href="navdes.css">
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" />
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
  margin-top:9%;

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

<body >
<div class="topnav header  nav-pills" id="myTopnav"   style="background-color:#20282e; padding:10px;">
    <a href="fachome.php" > <img src="ASHOK logo1.png"  height="45px" width="55px" /></a>
 <div style="margin-left:40%">
 <a href="fachome.php"  ><span class="glyphicon glyphicon-home"> </span>Home</a>
    <a  href="sendpost.php" > <span class="glyphicon 	glyphicon glyphicon-send"> </span>Send Post</a>
       <a  href="entermarks.php" class="active " > <span class="glyphicon glyphicon-pencil"> </span>Enter Marks</a>
       <a  href="uptimetable.php"> <span class="	glyphicon glyphicon-upload"></span> Exam TimeTable</a>
    <a   href="studlogout.php"> <span class="	glyphicon glyphicon-log-out"></span> Logout</a>
</div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">
<div class="row">

<div class="outer customDiv drop-shadow" style="padding:2%;margin-left:10%;font-size:18px; background-color:white;height:80%;" >
 <h3 style="margin-bottom:5%;" > Marks Details </h3>
 <form  method="POST" name="f1" style="margin-top:-5%;padding:15px;" >
  <input type="text"  name="reg" minlength="8"  maxlength="8" placeholder="Register Number" required />
  <select   id="select_path"  onChange='hidetxt()' name='sem' ><option  name='sem' >1<sup>st</sup> Semester</option>
              <option  id="select_path" name="sem">2<sup>nd</sup> Semester</option>
              <option id="select_path" name="sem"> 3<sup>rd</sup> Semester</option>
              <option  id="select_path" name="sem">4<sup>th</sup> Semester</option>
              <option    id="select_path" name="sem">5<sup>th</sup> Semester</option>
              <option   id="select_path"  name="sem">6<sup>th</sup> Semester</option>   </select>


  <table  id="myTable"   class="table table-striped table-bordered table-hover  table-condensed" >
  <th>
    Subjects
  </th>
  <th>
   Marks Out Of 20
  </th>
  <th>
   Obtained
  </th>
    <tr>
       <td>  Subject1:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput"  name="sm1" readonly>   </td>
    </tr>
    <tr>
       <td>  Subject2:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput1(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput1"  name="sm2"  readonly>   </td>
    </tr>
    <tr>
       <td>  Subject3:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput2(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput2"  name="sm3"  readonly>   </td>
    </tr>
    <tr>
       <td>  Subject4:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput3(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput3"  name="sm4"  readonly>   </td>
    </tr>
    <tr>
       <td>  Subject5:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput4(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput4"  name="sm5"  readonly>   </td>
    </tr>
    <tr id="overall">
       <td>  Subject6:   </td>
       <td>  <input type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput5(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput5"  name="sm6"  readonly>   </td>
    </tr>
    <tr id="overall1"  >
       <td  >  Subject7:   </td>
       <td>  <input  type="range" name="rangeInput" min="0" max="20" onchange="updateTextInput6(this.value);" style="width:80%;">    </td>
       <td>   <input type="text" id="textInput6"  name="sm7"  readonly>   </td>
    </tr>
    


  </table>
            <button class="btn btn-success"   type='button' onclick="cal()"> <span class="glyphicon glyphicon-plus"> </span> &nbsp;Calculate Total  </button>
            <input type='text'  name='total'  id='total' readonly />

  <button class="btn btn-primary"  name="sub" ><span class="glyphicon glyphicon-check"> </span>&nbsp; Submit </button>
 </form>


</div>




</div>
</div>
</body>
</html>
