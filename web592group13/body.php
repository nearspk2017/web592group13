<!-- Main component for a primary marketing message or call to action -->
<?php
  include_once("config.php");
  $phpfile="body_$page.php";
  if(file_exists($phpfile)){
     include($phpfile);
  }else{
     echo "ไม่พบไฟล์  $phpfile ";
  }  
?>  
