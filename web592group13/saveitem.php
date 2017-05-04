<?php
  $gid=$_POST['gid'];
  $pid=$_POST['pid'];
  header("Location: main.php?p=product&g=$gid");
  
  include_once("config.php");
  use google\appengine\api\users\UserService;
  if(!UserService::isCurrentUserAdmin()){
     echo "คุณไม่มีสิทธิ์ แก้ไข";
     return;
  }

  if($gid=='' || $pid==''){
     echo "ข้อมูลไม่ถูกต้อง";
     return;  
  }
  
  $rec=$db['items'][$gid][$pid];;
  $rec['name']=$_POST['name'];
  $rec['price']=$_POST['price'];
  $rec['detail']=$_POST['detail'];
  
  if($_FILES['pic']['tmp_name']!=''){
     $picno = 1;
	 if(isset($rec['picno'])) $picno = $rec['picno']+1;
	 $picfile="gs://$appid/$gid-$pid-$picno.jpg";
	 move_uploaded_file($_FILES['pic']['tmp_name'],$picfile);
	 $rec['picfile']=$picfile;
	 $rec['picno']=$picno;
  }
  // save
  $db['items'][$gid][$pid]=$rec;
  savedb();
?>