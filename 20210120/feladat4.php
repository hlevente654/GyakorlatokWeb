<?php
require_once "config.php";

$return ="";

$sql ="SELECT osztoja FROM szamok_osztoi WHERE prim_e LIKE 'i' GROUP by osztoja";
$stmt = $db -> query($sql);
if($stmt ->rowCount() >=1){
    while($row = $stmt -> fetch()){
        $return .="<tr><td>{$row['osztoja']}, </td></tr>";

    }
}

?>
<div>
    <h2>A meglévő prímszámok: </h2>
    <?=$return?>
</div>
