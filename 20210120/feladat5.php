<?php
require_once "config.php";
$return ="";

$sql = "SELECT osztoja, COUNT(prim_e) as 'szamolt' FROM szamok_osztoi GROUP by osztoja;";
$stm = $db -> query($sql);
if($stm -> rowCount() >=1){
    while($row = $stm -> fetch()){
        extract($row);
        $return .= "<tr><td>{$osztoja}</td><td>{$szamolt}</td></tr>";

    }

}

?>
<form method="post">
    <table>
        <thead>
            <th>Osztok</th>
            <th>Szama</th>
        </thead>
        <tbody><?=$return?></tbody>
    </table>
</form>