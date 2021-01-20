<?php
require_once "config.php";

$return = "";

$sql = "SELECT processzor.processzor_tipus, COUNT(termekek.id) FROM termekek inner JOIN processzor ON termekek.pid=processzor.pid GROUP by processzor.processzor_tipus";
$stmt = $db -> query($sql);

if($stmt -> rowCount() >=1){

    while($row = $stmt ->fetch()){

        $return .= "<tr><td>{$row['processzor_tipus']}</td><td>{$row['COUNT(termekek.id)']}</td></tr>";
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
<h1>Feladat 2.</h1>
    <table>
    <thead>
        <th>tipus</th>
        <th>Szám</th>
    </thead>
    <tbody>
        <?=$return?>
    </tbody>
    </table>
</body>
</html>