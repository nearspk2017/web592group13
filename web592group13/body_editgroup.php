<?php
 use google\appengine\api\users\User;
 use google\appengine\api\users\UserService;
 if(!UserService::isCurrentUserAdmin()){
     echo "คุณไม่มีสิทธิ์ แก้ไข";
     return;
 }
 include_once("config.php");  
 global $appid,$db;
  error_reporting( error_reporting() & ~E_NOTICE );
 if($_POST["id"]){
   $gid=$_POST['id'];
   $db["groups"][$gid]['name']=$_POST['name'];
   savedb();
 }
  error_reporting( error_reporting() & ~E_NOTICE );
 if($_GET['m']=='delete'){
   $gid=$_GET['id'];  
   unset($db["groups"][$gid]);
   savedb();
 }
 echo "
 <h1>แก้ไขกลุ่มของสินค้า</h1>
 <table class='table'>
 <tr><td>ID <td>Name<td> Commands
 "; 
 $select=[];
 if(isset($db["groups"])){
   foreach($db["groups"] as $id=>$group){
     echo "<tr><td>$id<td>$group[name]<td>
	 <a href='main.php?p=editgroup&id=$id&m=edit'>edit</a>|
	 <a href='main.php?p=editgroup&id=$id&m=delete'>delete</a>
	 "; 
	 if($_GET['m']=='edit' && $_GET['id']==$id){
	   $select = $group; 
	 }
   }
 }
 echo "</table>";
 
?>
<form method="post" action="">

<div class="form-group col-md-3" >
 <label for="id">Group Id</label>
 <input class="form-control" type='text' name='id' value="<?= $_GET['id'] ?>">
</div>

<div class="form-group col-md-9">
<label for="name">Group Name</label>
<input class="form-control" type='text' name='name' value="<?= $select[name] ?>">
</div>
<button class="btn btn-primary"> Save </button>

</form>