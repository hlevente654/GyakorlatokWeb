<?php
require_once "config.php";

$str = "";

if(isset($_POST['listaz']) && $_POST['diakid'] != "0"){
    extract($_POST);
    $sql ="SELECT b.el,b.vissza,d.szerzo,d.cim, DATEDIFF(b.vissza,b.el) AS dif FROM diak a,kolcsonzes b, peldany c, mu d WHERE a.az = b.diakaz AND b.peldanyaz = c.az AND c.muaz = d.az AND a.az = {$diakid} ";

    $stmt = $db -> query($sql);
    if($stmt -> rowCount() >= 1){
        while($row = $stmt -> fetch()){
            $str.="<tr><td>".$row['el']."</td><td>".$row['vissza']."</td><td>".$row['szerzo']."</td><td>".$row['cim']."</td><td>".$row['dif']."</td></tr>";
        }

    }
}


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

<table>
<?=$str?>
</table>