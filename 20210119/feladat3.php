<?php
require_once "config.php";

$return ="";

if(isset($_POST['keres'])){
    extract($_POST);
    if($termekOs > 0 ){
        $sql2 = "SELECT tipus FROM termekek WHERE pid = {$termekOs}";
        $stmt = $db -> query($sql2);
        if($stmt -> rowCount() >= 1){
            while($row = $stmt -> fetch()){
                $return .="<ol><li>".$row['tipus']."</li></ol>";
            }

        }

    }
}



$options = "";

$sql1 ="SELECT oid,operacios_rendszer FROM oprend;";

$stmt = $db ->query($sql1);

while($row =$stmt -> fetch()){
    extract($row);
    $options.= "<option value='{$oid}'>{$operacios_rendszer}</option>";
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
<h1>Feladat 3.</h1>
    <form method="post">
        <select name="termekOs" id="">
        <option value="0">Válasszon egyet</option>
        <ol>
        <?=$options?>
        </ol>
        
        </select>
        <input type="submit" value="keres" name="keres">
    </form>
    <table>
    <thead>
    <th>tipus</th>
    </thead>
    <tbody>
    <th>
    <?=$return?>
    </th>
    </tbody>
    </table>
</body>
</html>