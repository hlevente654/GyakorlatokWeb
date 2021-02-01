<?php
$str="";
require_once "config.php";
$sql1 = "SELECT mu.szerzo, mu.cim, COUNT(peldany.muaz) FROM mu inner JOIN peldany on peldany.muaz = mu.az GROUP by mu.szerzo, mu.cim";
$stmt = $db -> query($sql1);
if($stmt -> rowCount() >= 1){
    while($row=$stmt->fetch()){
        $str.="<tr><td>".$row['szerzo']."</td><td>".$row['cim']."</td><td>".$row['COUNT(peldany.muaz)']."</td></tr>";
    }
}

?>
<h2>Könyvtári nyilvántartás</h2>

<table>
    <thead>
        <tr>
        <th>Szerző</th>
        <th>Cím</th>
        <th>Darabszám</th>
        </tr>
    </thead>
    <tbody>
        <?=$str?>
    </tbody>

</table>
