<?php
session_start();
require_once 'config.php';

//ha megerkezett az URL-ben az azonosito, eg kell jeleniteni a megfelelo rekordot:
if(isset($_GET['id'])){
	$id=$_GET['id'];//ezt az $id elrejtjuk a form-ban egy hidden tipusu tag-ban
	$sql="select nev,kezdev from munkasok where az={$id}";
	$stmt=$db->query($sql);
	$row=$stmt->fetch();
	$nev=$row['nev'];
	$ev=$row['kezdev'];
}


//print_r($_POST);
if(isset($_POST['mentes']) && $_POST['nev']!=null && $_POST['ev']!=null){
    $nev=$_POST['nev'];
	$ev=$_POST['ev'];
	$id=$_POST['id'];
	$sql="update munkasok set nev='{$nev}', kezdev={$ev} where az={$id}";
	echo $sql;
    $stmt=$db->exec($sql);
    if($stmt){
           $_SESSION['msg']="sikeres adatmodsitas";  
           
    }
    else
        $_SESSION['msg']="hiba!! nem sikerult az adat modositasa";
        header("Location: munkasok.php");
    
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
        <h3 class="text-center">Adatok modositasa</h3>
        <div class="row justify-content-center p-3">	
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
					<input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="mentes" value="modositas" >
                </form>
              </div>
         </div>
    </div>
</body>
</html>                