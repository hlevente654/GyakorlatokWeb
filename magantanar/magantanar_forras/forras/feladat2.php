<?php
require_once "config.php";

$eredmeny = "";
$sql ="SELECT nev, telefon, email FROM tanitvany ORDER by nev";
$stmt = $db -> query($sql);
while($row = $stmt -> fetch()){
$eredmeny .= "<li>{$row['nev']},{$row['telefon']},{$row['email']}</li>";
}

?>

<h2>Feladat 2:</h2>
<div>
<ul>
<?=$eredmeny?>
</ul>
</div>