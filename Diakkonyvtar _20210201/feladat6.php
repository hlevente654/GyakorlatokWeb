<?php
require_once "config.php";

$str ="";
$sql = "SELECT a.evfolyam, COUNT(b.az) as kolcsonzesek from diak a, kolcsonzes b WHERE a.az = b.diakaz GROUP by a.evfolyam";
$stmt = $db ->query($sql);
if($stmt -> rowCount() >= 1){
    while($row = $stmt -> fetch()){
        $str.="<tr><td>".$row['evfolyam']."</td><td>".$row['kolcsonzesek']."</td></tr>";
    }

}

?>
<table>
<thead>
<tr>
<td>evfolyam</td>
<td>kolcsonzesek száma</td>
</tr>
</thead>
<?=$str?>
</table>
