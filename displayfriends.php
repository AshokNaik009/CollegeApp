<!--Used to dislay friend list one below another -->

<div class="col-md-4  customDiv drop-shadow displaying friends" >
<h2>Friends List</h2>
<?php
 $id=$_SESSION['uid'];

 $query=mysql_query("select user_one,user_two from friends where user_one='$id' or user_two='$id'");

while($rows=mysql_fetch_assoc($query)) 
{
  $f1=$rows['user_two'];

  
    if($id==$f1)
    {
      
    $f2=$rows['user_one'];
     $query1=mysql_query("select * from studreg where id='$f2'");

     while($res=mysql_fetch_assoc($query1))
     {
      
      $p2=$res['stu_pic'];
        if($p2!=""){ echo "<br/><img src='sprofile/$p2' width='50px' height='50px' style='border-radius:50%;'><br/>";}
      echo $res['userstud'];
 
     }
    

    }
    if($f1!=$id)
    {
   $query1=mysql_query("select * from studreg where id='$f1'");

   while($res=mysql_fetch_assoc($query1))
   {
     
    $p2=$res['stu_pic'];
      if($p2!=""){ echo "<br/><img src='sprofile/$p2' width='50px' height='50px' style='border-radius:50%;'><br/>";}
    echo $res['userstud'];

   }
  
  }
} 
?>

</div>