<?php
require_once "config.php";

//print_r($_POST);
$return ="";
$sql ="SELECT oprend.operacios_rendszer, COUNT(termekek.id) FROM termekek inner JOIN oprend ON termekek.oid=oprend.oid GROUP by oprend.operacios_rendszer";

$stmt = $db ->query($sql);

if($stmt -> rowCount() >= 1){

    while($row = $stmt -> fetch()){
        /*print_r($row);
        echo "<br>";*/
        $return .= "<tr><td>{$row['operacios_rendszer']}</td><td>{$row['COUNT(termekek.id)']}</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Feladat 1.:</h1>
<br>

<table>
    <thead>
    <tr>
        <th>op rendszer</th>
        <th>darab</th>
    </tr>
    </thead>
    <tbody>
    <?=$return?>
    </tbody>
</table>
    

</body>
</html>