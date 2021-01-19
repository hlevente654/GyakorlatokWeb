<?php
    require_once 'config.php';
    $str=$msg=$nev=$ev=$az="";  

    //a kiválasztott munkás adatainak a megjelenítése
    if(isset($_POST['szures']) && $_POST['munkasId']!='0'){
        $id=$_POST['munkasId'];
        $sql="select az,nev,kezdev from munkasok where az=?";
        $stmt=$db->prepare($sql);
        $stmt->execute(array($id));
        $row=$stmt->fetch();
        $nev=$row['nev'];
        $ev=$row['kezdev'];
        $az=$row['az'];
    }
    //modositas submit gomb megnyomása után:
    if(isset($_POST['modositas'])){
        //print_r($_POST);
        $nev=$_POST['nev'];
        $ev=$_POST['ev'];
        $az=$_POST['az'];
        $sql="update munkasok set nev=?, kezdev=? where az=?";
        //echo $sql;
        $stmt=$db->prepare($sql);
        $result=$stmt->execute(array($nev,$ev,$az));
        if($result)
            $msg="sikeres adatmódosítás!";
        }
    //a legördülő lista feltöltése:
        $sql="select az,nev from munkasok order by nev";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch())
        $str.="<option value='{$row['az']}'>{$row['nev']}</option>";

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
        <h1 class="text-center">Munkások adatainak aktualizálása</h1>
        <div class="row m-1 p-2 justify-content-center">   
            <div class="col-5">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Válassz a listából:</label>
                        <select class="form-control" name="munkasId" >
                            <option value="0">válassz...</option>
                            <?=$str?>
                        </select>
                    </div>
                    <input type="submit" name="szures" value="adatok megjelenítése" >
                </form>
            </div>

            <div class="col-5">
                <form action="" method="post">
                    <input type="text" name="az" hidden  value="<?=$az?>">
                    <div class="form-group">
                        <label for="">A munkás neve:</label>
                        <input type="text" name="nev" class="form-control" value="<?=$nev?>">
                    </div>
                    <div class="form-group">
                        <label for="">A kezdési év:</label>
                        <input type="number" name="ev" class="form-control" value="<?=$ev?>">
                    </div>
                    <input type="submit" name="modositas" value="módosítás" >
                </form>

                <div><?=$msg?></div>
            </div>
    </div>
</body>
</html>