<?php
session_start();
require_once 'config.php';

$nev=$ev=$msg="";
//print_r($_POST);
if(isset($_POST['mentes']) && $_POST['nev']!=null && $_POST['ev']!=null){
    $nev=$_POST['nev'];
    $ev=$_POST['ev'];
    $sql="insert into munkasok values (null,'{$nev}',{$ev})";
    $stmt=$db->exec($sql);
    if($stmt){
           $_SESSION['msg']="sikeres adatbeiras";  
           header("Location: munkasok.php");
    }
    else
        $_SESSION['msg']="hiba!! nem sikerult az adat beirasa az adatbazisba";
    
}


?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>      
	<title>Munkasok</title>
</head>

<body>
    <div class="container border">
        <h3 class="text-center">Új alkalmazott adatainak bevezetése</h3>
        <div class="row justify-content-center p-3">	
			<div class="col-md-4" id="hibak" ><?=isset($_SESSION['msg'])? $_SESSION['msg']: ""?></div>	
			<a class="btn btn-info " href="munkasok.php">Vissza</a>
		</div>
        <div class="row m-1 p-2">   
            <div class="col-5">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">A munkás neve:</label>
                        <input type="text" name="nev" class="form-control" value="<?=$nev?>">
                    </div>
                    <div class="form-group">
                        <label for="">A kezdési év:</label>
                        <input type="number" name="ev" class="form-control" value="<?=$ev?>">
                    </div>
                    <input type="submit" name="mentes" value="mentés" >
                </form>
              </div>
         </div>
    </div>
</body>
</html>                