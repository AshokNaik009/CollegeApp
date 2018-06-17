<?php
   session_start();
   $_SESSION['useradmin']="";
   header("location:index.php");
   session_destroy();
?>