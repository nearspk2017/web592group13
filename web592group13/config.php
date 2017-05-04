<?php
  global $db,$dbfile,$appid,$page;
  
  $page="home";
  if(isset($_GET['p'])) $page=$_GET['p'];
  $appid = "web592group13.appspot.com";
  $dbfile = "gs://$appid/db.json";
  $db=[];
  if(file_exists($dbfile)){
    $dbtxt = file_get_contents($dbfile); 
    $db = json_decode($dbtxt,true);
  }
  
  function savedb(){
    global $db,$dbfile;
	$dbtxt = json_encode($db);
	file_put_contents($dbfile,$dbtxt);
  }
  
  
?>