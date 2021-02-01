<?php
require_once "config.php";




$sql ="SELECT az, nev, evfolyam FROM diak";
$options = "";
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
        <input type="submit" value="listaz" name="listaz">
    </select>
</form>