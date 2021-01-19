<?php
session_start();
require_once "config.php";
//az url-bol kapjuk az adatot:
$msg="";
$id = $_GET['id'];
$sql="delete from munkasok where az={$id}";
try{
	$count=$db->exec($sql);
	$_SESSION['msg'] ="A/Az {$id} azonositoju szemely torolve az adatbazisbol !"; 
}catch(PDOException $e){		
	$_SESSION['msg']= "A/Az {$id} azonositoju szemelyt nem lehet kitorolni!"; 
}
header("Location:munkasok.php");
?> 