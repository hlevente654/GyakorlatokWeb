<?php
require_once "config.php";
$optionStr=""; 

$sql="SELECT osztaly FROM tanulok group by osztaly order by osztaly";
$stmt=$db->query($sql);
while($row=$stmt->fetch())
    $optionStr.="<option>{$row['osztaly']}</option>";

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script> 
    <script src="fel2.js"></script>
    <title>Papírgyűjtés</title>
</head>
<body>
    
        <select id="osztaly">
            <option value="0">válassz ki egyet...</option>
            <?=$optionStr?>
        </select>
        
    
    <hr>
    
    <h1>Az osztaly tanuloinak a névsora</h1>
    
    <table><thead><th>azonosito</th><th>nev</th></thead>
            <tbody id="output"></tbody>
    </table>
    
</body>
</html>