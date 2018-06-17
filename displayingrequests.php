 <!-- Displaying Friend Requests -->
 <?php
  include 'connection.php';
  session_start();
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
      echo "<h2>Friend Requests</h2>";//Displaying the requests
      echo '<h2>'.$rows['userstud'].'</h2><form action="notfi.php" method="POST"><input type="text"  value='.$rows['id'].' name="id" class="hidden"  /> <input type="submit" class="btn btn-default"  name="btnacc" value="Accept Request"  /><br/><br/><br/><input type="submit" name="btndec" value="Delete Request"></form>';
     
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
         window.location.href='notfi.php';
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
      window.location.href='notfi.php';
   </script>
 <?php

 }
  else
 {
   die(mysql_error());
 }
}
?>
