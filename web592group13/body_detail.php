<?php
 use google\appengine\api\users\User;
 use google\appengine\api\users\UserService;
 use google\appengine\api\cloud_storage\CloudStorageTools;
 
 include_once("config.php");  
 global $appid,$db;  
 $gid=$_GET['g'];
 $pid=$_GET['i'];  
 if(isset($db['items'][$gid][$pid])){
   $grec=$db['groups'][$gid];
    $prec=$db['items'][$gid][$pid];   
  }else{
   echo "ข้อมูลไม่ถูกต้อง";
   return;
 }
 
 echo "<h1>$prec[name] รหัสสินค้า : $pid </h1> ";
 echo "<div>ราคา : $prec[price]</div>";
 echo "<div>$prec[detail]</div>";
 
 if(isset($prec['picfile']) && file_exists($prec['picfile'])){
   $img=CloudStorageTools::getImageServingUrl($prec['picfile'],["size"=>200]);   
   echo "<img src='$img'>";
 }
?>

<?php

if(UserService::isCurrentUserAdmin()){
 echo "<br><a href='main.php?p=additem&g=$gid&i=$pid'>Edit</a>";
} 

?>