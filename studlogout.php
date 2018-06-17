<?php
   session_start();
   $_SESSION['uid']="";
   header("location:index.php");
   session_destroy();
?>