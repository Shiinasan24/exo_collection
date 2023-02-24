<?php 
   session_start();
   
   if(isset($_SESSION["session_user"])) {
      $session = $_SESSION["session_user"];
      session_destroy();
      header("Location: index.php");
      quit();
   }