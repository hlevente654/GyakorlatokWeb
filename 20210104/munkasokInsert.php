<?php
require_once 'config.php';
//adatok megjelenitese
$tbl=$msg="";  
megjelenit($db,$tbl);

function megjelenit($db,&$tbl){//ha a bemeno parametert meg is akarjuk valtoztatni akkor referencat kell hasznalni
    $sql="select az,nev,kezdev from munkasok order by nev";
    $stmt=$db->prepare($sql);
    $stmt->execute();

    while($row=$stmt->fetch())
    $tbl.="<tr><td>{$row['az']}</td><td>{$row['nev']}</td><td>{$row['kezdev']}</td></tr>";
} 

//adatok mentese:
$nev="";
$ev="";
print_r($_POST);
if(isset($_POST['mentes']) && $_POST['nev']!=null && $_POST['ev']!=null){
    $nev=$_POST['nev'];
    $ev=$_POST['ev'];
    $sql="insert into munkasok values (null,?,?)";
    $stmt=$db->prepare($sql);
    $resoult=$stmt->execute(array($nev,$ev));
    if($resoult){
           $msg="sikeres adatbeiras";
           $tbl="";
           megjelenit($db,$tbl);
           header("Location:munkasokInsert.php");
    }
     
    else
        $msg="hiba!! nem sikerult az adat beirasa az adatbazsba";
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
        <h1 class="text-center">Munkások</h1>
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
                <div><?=$msg?></div>
            </div>
            <div class="col-5">
                <table class="table table-bordered table-striped"><thead><th>Azonosító</th><th>Név</th><th>Kezdési év</th></thead>
                        <?=$tbl?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>                