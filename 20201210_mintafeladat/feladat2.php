<?php
require_once "config.php";

print_r($_POST);

$bekert ="";
$return ="";
if(isset($_POST['RAMlistat'])){
    $bekert = $_POST['csuszka'];
    $sql = "SELECT gyarto, tipus FROM termekek WHERE floor(memoria/1024) = {$bekert}";
    $stmt= $db -> query($sql);
    if($stmt -> rowCount() >= 1){

    while($row = $stmt -> fetch()){
        /*print_r($row);
        echo "<br>";*/
        $return .="<tr><td>{$row['gyarto']}</td><td>{$row['tipus']}</td></tr>";
    }

    }else{
        $return = "Nincs ilyen termék.";
    }
}


?>


<form method="POST">
    <label for="">Válassz egy ram méretet 1 és 8 között</label>
    <br>
    <input type="range" name="csuszka" id="csuszka" min="1" max="8" value="1">
    <br>
    <div id="ram"></div>
    <input type="submit" value="listázás" name="RAMlistat">
</form>
<table>
    <thead>
        <th>Gyártó</th>
        <th>Tipus</th>
    </thead>
    <tbody>
        <?=$return?>
    </tbody>
</table>

<script src="fel2.js">


</script>