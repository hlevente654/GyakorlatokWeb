<?php
require_once "config.php";
$valasztasok ="";
$eredmeny = "";



if(isset($_POST['keress']) && $_POST['valaszt']!=0){
    $sql ="SELECT tanitvany.nev nev, tanitasi_alkalom.datum, tanitasi_alkalom.kezdesido FROM tanitasi_alkalom inner JOIN tanar on tanar.tanar_id = tanitasi_alkalom.tanar_id inner join tanitvany on tanitasi_alkalom.tanitvany_id = tanitvany.tanitvany_id WHERE tanar.tanar_id = {$_POST['valaszt']}";
$stmt = $db -> query($sql);
    echo "jo";
    while($row = $stmt -> fetch()){
        $eredmeny .= "<li>{$row['nev']},{$row['datum']},{$row['kezdesido']}</li>";
    }
}






$sql = "SELECT tanar_id, nev FROM tanar";
$stmt = $db -> query($sql);
while($row = $stmt -> fetch()){
$valasztasok .="<option value='{$row['tanar_id']}'>{$row['nev']}</option>";

}

?>

<h2>Feladat 3:</h2>

<form method="post">
    <select name="valaszt" id="">
    <option value="0">válassz egy tanulót</option>
    <?=$valasztasok?>
    </select>
    <input type="submit" value="keress" name="keress">
</form>
<div>
<ul>
<?=$eredmeny?>
</ul>
</div>