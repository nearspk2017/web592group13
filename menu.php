<?php
 use google\appengine\api\users\User;
 use google\appengine\api\users\UserService;
 $user = UserService::getCurrentUser();
 if($user){
 echo "Welcome: ".$user->getNickname(); 
 }
?>

<ul id="menu">
<?php
global $pagename ;
$data = file("menu.txt");
foreach($data as $line){
 $s = trim($line);
 if($s!=""){
	  list($key,$value) = explode("=",$s);
      $c="";
      if($key==$pagename) $c="class=selected";
      echo "<li $c ><a href='$key'>$value</a>";
 }
}

if($user){
 $url = UserService::createLogoutUrl('/main.php');
 echo "<li><a href='$url'>Logout</a>";
}else{
 $url = UserService::createLoginUrl('/main.php');
 echo "<li><a href='$url'>Login</a>";
}
?>
</ul>