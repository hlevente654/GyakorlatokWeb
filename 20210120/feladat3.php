<?php
require_once "config.php";
$uzenet ="";
if(isset($_POST['gomb'])){
    $kapott = $_POST['kapott'];
    $sql = "SELECT osztoja FROM szamok_osztoi WHERE szam = {$kapott}";
    $stmt = $db -> query($sql);
    if($stmt -> rowCount() ==0){
        $uzenet = "nincs ilyen szam az adatbázisban";
    }
    if($stmt -> rowCount() >= 1){
        while($row = $stmt -> fetch()){
            extract($row);
            $uzenet.= "{$osztoja}, ";

        }
    }

}
?>
<form method="post">
    <h2>Kiírja az osztókat ha már benne van az adatbázisban</h2>
    <input type="number" name="kapott" id="">
    <input type="submit" value="prim_e" name="gomb">
</form>
<div>
    <?=$uzenet?>
</div>