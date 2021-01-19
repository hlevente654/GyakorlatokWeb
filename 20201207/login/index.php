<?php
session_start();
require_once "config.php";
$msg=isset($_SESSION['msg'])?$_SESSION['msg']:'';

if(isset($_POST['be'])){
    $fnev=$_POST['fnev'];
    $jelszo=$_POST['jelszo'];
    $sql= "select jelszo,foto from users where felhasznalonev='{$fnev}' ";
    $stmt=$db->query($sql);
    echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){//létezik a felhasználó
        $row=$stmt->fetch(); 
        if(password_verify($jelszo,$row['jelszo'])){
            $_SESSION['fnev'] = $fnev;
            $_SESSION['foto']=$row['foto'];
            //echo "ok";
            header('Location: home.php');
        }else
            $msg="Helytelen felhasználónév jelszó páros !";
        
    }else
        $msg="Helytelen felhasználónév";

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
	    <title>Login form</title>
</head>
<body>
<div class="container">
  <div class="row justify-content-md-center p-5">
    <form class="col-md-4 border" 
     method="post">
	    <h2 class="text-center">Bejelentkezés</h2>    
			<div class="text-danger"><?=$msg?></div>		
        <div class="form-group">
            <input type="text" name="fnev" class="form-control" placeholder="felhasználónév" required="required" value="">
        </div>
		
		<!--disable autocomplete input text in login form-->
		<input type="text" style="display:none">
		<input type="password" style="display:none">
		
        <div class="form-group">
            <input type="password" name="jelszo" class="form-control" placeholder="jelszó" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="be" class="btn btn-success btn-block">BEjelentkezés </button>
        </div>
        <a href="register.php">Regisztráció...</a>
    </form>
    
    
</div>
    
</div>
</body>
</html>                                		                            