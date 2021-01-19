<?php
require_once "config.php";

print_r($_POST);

$bekert="";
$return="";

if(isset($_POST['listazás'])){
    $bekert=$_POST['hatarErtek'];
    $sql = "SELECT tipus FROM termekek WHERE ar>{$bekert}";
    $stmt= $db -> query($sql);
    if($stmt -> rowCount() >= 1){
        while($row = $stmt ->fetch()){
            $return .="<tr><td>{$row['tipus']}</td></tr>";
        }

    }else{
        $return= "Nincs ilyen termék.";
    }

}


?>

<h3>Listázza ki azokat a gépeket típussal, amelyek ára adott ár feletti. Ezt az árat a felhasználótól kérlye be!</h3>

<form method="POST">

    <label for="">Az ár:</label>
    <input type="number" name="hatarErtek" id="">
    <input type="submit" value="listazás" name="listazás" id="">
</form>
<table>
    <thead>
        <th>tipus</th>
    </thead>
    <tbody>
        <?=$return?>
    </tbody>
</table>