<!-- อ่านไฟล์ -->
<?php
 use google\appengine\api\users\UserService;

$cats = unserialize(file_get_contents("$bucket/category.txt"));
$items = array();
if(file_exists("$bucket/items.txt"))
$items = unserialize(file_get_contents("$bucket/items.txt"));


$cat=array();


if($_GET['c']!=''){
$c=$_GET['c'];
$item=$items[$c];
$cat = $cats[$item['cat']];
}

?>

<!-- ปุ่มback-->
<a href="/list"><img src="images/back1.png" ></a><br>

<!-- แสดงชื่อไอเทม-->
<center><h1><?= $item['name']?><br></h1></center>

<!-- แสดงชรูป-->
<table width='100%'>
<tr valign=top>
	<td width='80%'><center><img src="<?= $item['url'] ?>" width='60%'></center></td>	
</tr>

<tr>


<!-- แสดงรายละเอียด-->
<td><center><?= $item['detail'] ?></center></td>
</tr>
</table>
