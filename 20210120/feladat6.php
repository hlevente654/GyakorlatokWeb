<?php
require_once "config.php";
$uzenet="";
$mehet=0;
if(isset($_POST['gomb']) && $_POST['kapott']!=null){
    $kapott = $_POST['kapott'];
    $sql = "DELETE FROM `szamok_osztoi` WHERE `szamok_osztoi`.`szam` = $kapott";
    $stmt = $db -> exec($sql);
    if($stmt){
        $uzenet = "törlés sikeres";
    }else
    {
        $uzenet = "törlés sikertelen";
    }
    
    $mehet=1;
}
if($mehet == 1){
    $sql = "DELETE FROM `szamok` WHERE `szamok`.`szam` = $kapott";
    $stmt = $db -> exec($sql);
}


?>
<form method="post">
    törlendo szam: <input type="number" name="kapott" id="">
    <input type="submit" value="gomb" name="gomb">
    <div>
        <?=$uzenet?>
    </div>
</form>