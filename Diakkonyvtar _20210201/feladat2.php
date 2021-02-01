<?php
require_once "config.php";
$str = "";
$uzenet="";
if(isset($_POST['listaz'])){
    extract($_POST);

    //print_r($_POST);
    if($evfolyamid != "0"){
        $sqlKeres = "SELECT szerzo, cim FROM mu WHERE evfolyam = {$evfolyamid}";
        
        $stmt=$db->query($sqlKeres);
	    if($stmt->rowCount()>=1){
		while($row=$stmt->fetch()){
			$str.="<tr><td>".$row['szerzo']."</td><td>".$row['cim']."</td></tr>";
		}

    }else{
        echo "hiba";
    }
}
}

$sql = "SELECT DISTINCT evfolyam FROM mu ORDER by mu.evfolyam";
$options = "";
$stmt = $db -> query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $options.="<option value='{$evfolyam}'>{$evfolyam}</option>";
}
?>

<h2>Kötelező olvasmányok</h2>
<form method="post">
    <select name="evfolyamid" id="">
        <option value="0">Válasz ki egy évfolyamot</option>
        <?=$options?>
        <input type="submit" value="listaz" name="listaz">
    </select>
</form>

<div>
<table>
<?=$str?>
</table>
    
</div>