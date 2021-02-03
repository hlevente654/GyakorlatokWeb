<?php
require_once "config.php";
$evfolyamdiakid ="";
$evfolyamHely ="";
$azErtek ;

if(isset($_POST['listaz']) && $_POST['diakid'] != "0"){
    $evfolyamdiakid = $_POST['diakid'];
    extract($_POST);
    $sql = "SELECT evfolyam FROM diak WHERE az = {$diakid}";
    $stmt = $db -> query($sql);

    if($stmt -> rowCount() >= 1){
        while($row = $stmt -> fetch()){
          
            $evfolyamHely = $row['evfolyam'];
        }

    }

}
if(isset($_POST['modosit']) && $_POST['evfolyamHelyh'] != ""){
    $kapott = $_POST['evfolyamHelyh'];
    $evfolyamdiakid = $_POST['azideiglenes'];
    $sql = "UPDATE diak SET evfolyam = {$kapott} WHERE az = {$evfolyamdiakid}";
    $stmt = $db->exec($sql);
    if($stmt){
    echo "sikeres módosítás";
    }
}




$str ="";
$options = "";
$sql ="SELECT az, nev, evfolyam FROM diak";
$stmt = $db -> query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $options.="<option value='{$az}'>{$nev}</option>";
}


?>

<form method="post">
    <select name="diakid" id="">
        <option value="0">Válasz ki egy diákot</option>
        <?=$options?>
        <input type="submit" value="evfolyam megadása" name="listaz">
    </select>
    <br>
    <input type="text" name="azideiglenes" id="" value="<?=$evfolyamdiakid?>" readonly>
    <input type="text" name="evfolyamHelyh" id="" value="<?=$evfolyamHely?>">
    <input type="submit" value="evfolyam módosítása" name="modosit">
</form>

