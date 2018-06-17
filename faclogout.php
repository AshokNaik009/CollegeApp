<?php
   session_start();
   $_SESSION['userfac']="";
   header("location:index.php");
   session_destroy();
?>