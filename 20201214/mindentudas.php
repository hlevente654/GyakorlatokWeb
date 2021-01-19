<?php
session_start();
require_once "config.php";

$bekert="";
$return = "";

print_r($_POST);

if(isset($_POST['gomb'])){
    $bekert = $_POST['beker'];
    $sql = "SELECT cim,ido FROM eloadas WHERE ido LIKE '%$bekert%' ORDER BY cim";
    $stmt = $db -> query($sql);
    while($row = $stmt -> fetch()){
        $return .="<tr><td>{$row['cim']}</td><td>{$row['ido']}</td></td>";
    }
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Kerek egy evszamor</h2>
    <form method="POST">
    <input type="text" name="beker" id="">
    <input type="submit" name="gomb" value="">
    </form>
    <table>
        <thead>
            <th>cim</th>
            <th>ido</th>
        </thead>
        <tbody>
            <?=$return?>
        </tbody>
    </table>

</body>
</html>