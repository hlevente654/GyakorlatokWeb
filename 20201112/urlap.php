<?php
    require_once "config.php";
    $msg = "";
    $strTable = "";
    
    function megjelenit ($db, &$strTable){
        $sql = "SELECT az, nev, kezdev FROM munkasok ORDER BY nev;";
        $stmt = $db -> query($sql);
        while ($row = $stmt -> fetch()){
            //print_r($row);
            $strTable.="<tr><td>{$row["az"]}</td><td>{$row["nev"]}</td><td>{$row["kezdev"]}</td></tr>";
        }

    }

    megjelenit($db, $strTable);
    print_r($_POST);
    if (isset($_POST["gomb"]) && $_POST["nev"]!=null && $_POST["ev"]!=null){
        $nev=$_POST["nev"];
        $ev=$_POST["ev"];
        $sql = "INSERT INTO munkasok VALUES (null, '{$nev}', $ev)";
        $stmt = $db -> exec($sql);
        if ($stmt){
            $strTable="";
            $msg = "Sikeres adatbeiras";
            megjelenit($db, $strTable);
        }
        else {
            $msg = "Hiba";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munakalatok</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" value="<?=$nev?>" name="nev" id="nev" placeholder="nevedet add meg">
        <input type="number" value="<?=$ev?>" name="ev" id="ev" placeholder="Ev">
        <input type="submit" value="Beiras" name="gomb">
    </form>
    <table>
        <thead>
            <th>Azonosito</th>
            <th>Nev</th>
            <th>Kezdesi Ev</th>
        </thead>
        <tbody>
            <?=$strTable?>
        </tbody>
    </table>
    <div >
        <?=$msg?>
    </div>
</body>
</html>