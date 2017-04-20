<center>
<img src=images/pro2png.png > 
</center>
<?php
 use google\appengine\api\users\UserService;
 $catfile = "$bucket/category.txt";
 //echo "Loadfile : $catfile";
 $catdata = unserialize(file_get_contents($catfile));
 if (UserService::isCurrentUserAdmin()){
 // แสดงหน้าจอเพิ่ม/แก ้ไข
 $code = $_GET['c']; // ถ ้า c ไมใ่ ชค่ า่ วา่ ง จะแสดงขอ้ มลู ใหแ้กไ้ข
?>
<a href='#' class='button' id='addbtn'>จัดการข้อมูล</a>
<div id='addform' title='For Admin: Add Category'> 
<form method="post" action="">
Code:
<input type="text" name="code" size="5" value="<?= $code ?>">
Name:
<input type="text" name="name" size="20" value="<?= $catdata[$code]["name"] ?>"><br>
Detail:
<input type="text" name="detail" size="40" value="<?= $catdata[$code]["detail"] ?>"><br>
Image URL:
<input type="text" name="url" size="40" value="<?= $catdata[$code]["url"] ?>">

<input type="submit" class=\"button\">
</form>
</div>
<?
 // ค าสงั่ ส าหรับบนั ทกึ
 if($_POST["code"]!=""){
 $code=$_POST["code"];
 $catdata[$code]["name"] = $_POST["name"];
 $catdata[$code]["detail"] = $_POST["detail"];
 $catdata[$code]["url"] = $_POST["url"];
 file_put_contents($catfile,serialize($catdata));
 header("Location: /category");
 exit;
 }
 ?>
 
 <?
 // ค าสงั่ สา หรับ remove
 if($_GET["d"]!=""){
 $code = $_GET["c"];
 unset($catdata[$code]);
 file_put_contents($catfile,serialize($catdata));
 header("Location: /category");
 exit;
 }
 } // endif admin
?>

<?php
 echo "<ul id=\"catlist\" &nbsp>";
 foreach($catdata as $k=>$v){
 echo "<li><a href=\"catdetail?c=$k\">$k $v[name] <br> $v[detail] <br>";
echo "<img src=\"$v[url]\" width=\"400\"></a>";
 if (UserService::isCurrentUserAdmin()){
echo "<br>
<a href=\"category?c=$k\" >Edit </a> <b>|<b>
<a href=\"category?c=$k&d=remove\" id=\"removebtn\" >Remove</a> <hr>";
 }
 }
 echo "</ul> <br><br>";
?>
<script>
<!--
 $(function(){
   $("#removebtn").click(function(){
      return confirm("Are you sure to remove this item?");
   });

   $("#addform").dialog({modal: true, width: 600, autoOpen: false});
   $("#addbtn").click(function(){
      $("#addform").dialog("open");
   });
 });

//-->
</script>