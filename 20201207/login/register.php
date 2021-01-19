<?php
session_start();
require_once "config.php";
$nev=$msg=$email=$fnev="";
$msg_foto="";  
$_SESSION=array();
print_r($_POST);
if(isset($_POST['mentes'])){
	$fnev=$_POST['fnev'];
	$nev=$_POST['nev'];
	$email=$_POST['email'];
	$jelszo=$_POST['jelszo'];
	//ellenőrizzük hogy ne legyen ilyen email es felhasznalonev mar az adatbázisban:
	/*$sql= "select email,felhasznalonev from users where email='{$email}' or felhasznalonev='{$fnev}'";
	//echo $sql;
    $stmt=$db->query($sql);
    //echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){//létezik ilyen email / felhasználó név
		$row=$stmt->fetch(); 
		$msg="létezik ilyen email / felhasználó név";
	}else{
		*/
		$msg_foto="";
		include "avatar.php";
		if($msg_foto==""){
			$pw=password_hash($jelszo,PASSWORD_DEFAULT); 
			$sql="insert into users values (null,'{$fnev}','{$nev}','{$email}','{$pw}','{$new_name}')";
			echo $sql;
			$stmt=$db->exec($sql);
			if($stmt){
				$_SESSION["msg"]="sikeres regisztráció";
				header("location:index.php");
			}
		}
	//}
	
}
	


?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	
	<script src="ellenor.js"></script>
	    <title>Register form</title>
</head>
<body>
<div class="container">
  <div class="row justify-content-md-center p-5">
    <form class="col-4 border" action="" method="post" enctype="multipart/form-data">
		<h2 class="text-center" >Regisztráció</h2>

		<div class="alert alert-success " id="msg"><?=$msg?></div>	

		<div class="form-group">
        	<input type="text" class="form-control" name="fnev" placeholder="felhasználónév" required value="<?=$fnev?>">
        </div>		
	    <div class="form-group">
				<input type="text" class="form-control" name="nev" placeholder="név" required value="<?=$nev?>">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required value="<?=$email?>">
        </div>
		
		<!--disable autocomplete input text in login form-->
		<input type="text" style="display:none">
		<input type="password" style="display:none">
		
		<div class="form-group">
            <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="jelszó" required >
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="conf_jelszo" id="conf_jelszo" placeholder="jelszó megerősítés" required>
        </div>  

		<div class="form-group">
			<input type="file" class="form-control" name="foto" placeholder="tolts fel egy fotot" >
		 </div>	  

        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required> Elfogadom az <a href="#">adatkezelési feltáteleket</a></label>
		</div>
		<div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-block" name="mentes" id="mentes" value="Mentés">
        </div>
	</form>
	
</div>
</div>

</body>
</html>                            

