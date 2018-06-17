<?php 
  session_start();
  $_SESSION['uid'] =2; //The Default logged in user 
//Getting the user from our database
$db2= new PDO('mysql:host=127.0.0.1;dbname=collegedb' ,'root','');

require 'classes/Friends.php';
if(isset($_POST['tags']))
{
    if($_POST['tags']=="addFriend"){
        $friends = new Friends;
        $friends->add($_POST['uid'] ,$_SESSION['uid']);
        
    }
}