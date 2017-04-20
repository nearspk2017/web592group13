<!-- อ่านไฟล์ -->

<?php
 use google\appengine\api\users\UserService;
 $catfile = "$bucket/category.txt";
 $catdata = unserialize(file_get_contents($catfile));
 $code = $_GET["c"]; 
 $cat = $catdata[$code];
?>

<!--ปุ่มback -->
<a href="/category"><img src="images/back1.png" ></a>
<center>


<!--แสดงชื่อ -->
<h1><?= $cat['name'] ?></h1>

<!--แสดงรูป -->
<table width='100%'>
<tr valign=top>
	<td width='80%'> <center><img src="<?= $cat['url'] ?>" width='60%'></center></td>	
</tr>

<tr>
<!--ลายละเอียด-->
<td><center><?= $cat['detail'] ?></center></td>
</tr>

</center>

</table>


