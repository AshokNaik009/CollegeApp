<?php
$con=mysql_connect('localhost','root','');

$db=mysql_select_db('collegedb',$con);
if(mysql_error())
{
    die(mysql_error());
}

?>
 


		