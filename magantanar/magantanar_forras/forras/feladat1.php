<?php
require_once "config.php";

$eredmeny = "";
$sql = "SELECT tanar.nev, tantargy.tantargynev, tanar.telefon, tanar.email FROM tanar inner JOIN tantargy on tanar.tantargy_id = tantargy.tantargy_id ORDER by tanar.nev";
$stmt = $db ->query($sql);
while($row = $stmt -> fetch()){
    $eredmeny .= "<li>{$row['nev']}, {$row['tantargynev']},{$row['telefon']},{$row['email']}</li>";
}


?>

<h2>Feladat 1:</h2>

<div>
<ol>
<?=$eredmeny?>
</ol>
</div>