<?php
require_once "config.php";
$uzenet="";
if(isset($_POST['beszerzes'])){
    extract($_POST);

    if($termekid >0 && $darab>0){
        echo " halo ";
        $sqlupdate= "UPDATE termekek SET db = {$darab} where id={$termekid}";
        $stmt = $db->exec($sqlupdate);
        if($stmt){
            $uzenet = "a {$termekid} azonosítójú termékből {$darab}-darab lett beszerezve";
        }

    }else{
        echo "hiba";
    }

}
//option fetöltése
$options = "";

$sql="SELECT id, tipus FROM termekek WHERE db = 0";

$stmt = $db -> query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $options.="<option value='{$id}'>{$tipus}</option>";
}


?>
<h1>Beszerzés</h1>
<form method="POST">
    <select name="termekid" id="">
        <option value="0">Válasszon egyet</option>
        <?=$options?>
    </select>
    <input type="number" name="darab" id="">
    <input type="submit" value="beszerzes" name="beszerzes">
</form>
<div>
    <?=$uzenet?>
</div>