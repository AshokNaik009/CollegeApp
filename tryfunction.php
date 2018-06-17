  <?php

     include 'connection.php';
 
  function showSuggest(){

  
     session_start();
     $id=$_SESSION['uid'];
     $users = mysql_query("SELECT * FROM studreg  WHERE id <> '$id' ");    
     while($rows=mysql_fetch_assoc($users))
     {   
      $requestee=$id;
      $requesting=$rows['id'];   
    
       $val=mysql_query("select *  from friend_request where user_from='$requestee' and user_to='$requesting' or user_to='$requestee' and user_from='$requesting' ");  
      
       if(mysql_num_rows($val)>0)
      {
        
      }
      else{
        $p2=$rows['stu_pic'];
       
             echo "<img src='profile/$p2' width='150px' height='150px' style='border-radius:50%;margin-left:-2px;margin-top:7%;border:1px solid;'> ";
      echo "<h3 style='postion:relative;marign-bottom:2% '>".$rows['userstud']."</h3><form action='not2.php' method='POST'><input type='text'  value=".$rows['id']." name='id' class='hidden'  /> <input type='submit'  class='btn btn-primary' name='btnreq' value='Add Friend'  /></form>";//friend Request button
       }  
     }

     if(isset($_POST['btnreq']))//sending Friend Request
     {
     $requestid=$_POST['id'];
     $send=$_SESSION['uid'];
     $val=mysql_query("select *  from friend_request where user_to='$requestid' and user_from='$send'  or user_to='$send' and user_from='$requestid'"); 
  
    if(mysql_num_rows($val)>0)
      {  
       ?>
       <script>
        alert(" Request isn't Accepted ");
        </script>
       <?php
      }
      else { 
       $insert=mysql_query("INSERT INTO friend_request(user_to,user_from) VALUES('$requestid','$send')");
     if($insert)
     {
       ?>
     <script>
      alert(" Friend Request Sent");
      window.location.href='not2.php';
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



  <?php
   
   function showRequest(){
    echo "<h3>Friend Requests</h3>";//Displaying the requests

    
  $id=$_SESSION['uid'];
  
 $reqs = mysql_query("SELECT user_from FROM friend_request  WHERE user_to='$id'");
  
   while($row= mysql_fetch_assoc($reqs))
    {
      
      $sen=$row['user_from'];
    $reqst = mysql_query("SELECT * from  studreg where id='$sen'");
    while($rows=mysql_fetch_assoc($reqst)) 
   {
    $val=mysql_query("select *  from friends where user_one='$id' and user_two='$sen' or user_one='$sen' and user_two='$id' ");
  
    if(mysql_num_rows($val)>0)
    {
       
    }
    else
    {
      $p2=$rows['stu_pic'];
      
             echo "<img src='profile/$p2' width='150px' height='150px' style='border-radius:50%;margin-left:-2px;margin-top:7%;border:1px solid;'> ";
      echo '<h2>'.$rows['userstud'].'</h2><form action="not2.php" method="POST"><input type="text"  value='.$rows['id'].' name="id" class="hidden"  /> <input type="submit" class="btn btn-primary"  name="btnacc" value="Accept Request"  /><br/><br/><input class="btn btn-primary" type="submit" name="btndec" value="Delete Request"></form>';
    }  
   }
  }

    if(isset($_POST['btnacc']))//Accepting Friend Request 
  {
     $u2=$_POST['id'];
     $u1=$_SESSION['uid'];
     $now=date("Y-m-d H:i:s");
     $val=mysql_query("select *  from friends where user_one='$u1' and user_two='$u2' or user_one='$u2' and user_two='$u1'");
     if(mysql_num_rows($val)>0)
     {
      ?>
      <script>
       alert(" You are already Friends");
      </script>
     <?php
   }
   else {
    $insert=mysql_query("INSERT INTO friends(user_one,user_two,status,date_made) values('$u1','$u2','1','$now')");
    //$delete=mysql_query("DELETE from friend_request where user_to='$u1' and user_from='$u2' ");    
    if($insert){
       
      ?>
      <script>
         alert(" You are Friends ");
         window.location.href='not2.php';
      </script>
   <?php 
   
     }
      else
     {
       die(mysql_error());
     }
    }
    }


if(isset($_POST['btndec'])){
  $u1=$_POST['id'];
  $u2=$_SESSION['uid']; 
  $delete=mysql_query("DELETE from friend_request where  user_to='$u2' and user_from='$u1' ");
  if($delete)
  {
    ?>
   <script>
      alert("Request Deleted");
      window.location.href='not2.php';
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
