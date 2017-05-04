<?php
 $gid=$_GET['g'];
 use google\appengine\api\users\UserService;
 if(!isset($db['groups'][$gid])){
   echo "ไม่พบข้อมูลกลุ่มสินค้า";
   return;
 } 
 $grec = $db['groups'][$gid];
 $list = [];
 if(isset($db['items'][$gid]))$list=$db['items'][$gid];
 
 echo "
 <h1>สินค้ากลุ่ม $grec[name]</h1>
 <table class=table>
 <tr><td>ID<td>Name<td>Price<td>Commands
 ";
 foreach($list as $pid=>$prec){
   echo "<tr><td>$pid<td>$prec[name]<td>$prec[price]<td><a href='main.php?p=detail&g=$gid&i=$pid'>Detail</a>";
   if(UserService::isCurrentUserAdmin()){
      echo " | <a href='main.php?p=additem&g=$gid&i=$pid'>Edit</a>";
   }
 }
 echo "</table>"; 
 if(UserService::isCurrentUserAdmin()){
    echo "<a href='main.php?p=additem&g=$gid'>Add</a>";
 }
 ?>