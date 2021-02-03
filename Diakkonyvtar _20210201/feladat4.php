<?php
require_once "config.php";

$db ;
if(isset($_POST['bevitel'])){
    if( $_POST['szerzo'] != "" && $_POST['cim'] != "" && $_POST['evfolyam'] != "0"){
    extract($_POST);    
    $sql = "SELECT az FROM mu WHERE szerzo like '{$szerzo}' AND cim LIKE '{$cim}' AND evfolyam = $evfolyam";
    $stmt = $db -> query($sql);

    if($stmt -> rowCount() >0){
        echo "van már ilyen";
    }else{
        $sqlHossz = "SELECT az FROM mu";
        $stmt = $db -> query($sqlHossz);
        $hossz = $stmt ->rowCount();
        $hossz = $hossz + 1;
        $sql = "INSERT INTO `mu` (`az`, `szerzo`, `cim`, `evfolyam`) VALUES ('{$hossz}', '{$szerzo}', '{$cim}', '{$evfolyam}') ";
        $stmt = $db -> query($sql);
        echo "adat sikeresen feltöltve";

    }


    }else
{
    echo "nincsenek az adatok jól kitöltve";
}
}
?>

<form method="post">
    Kerem a szerzo nevét:<input type="text" name="szerzo" id=""> <br>
    Kérem a mű címét: <input type="text" name="cim" id=""> <br>
    Kérem az évfolyamot: <input type="text" name="evfolyam" id=""> <br>
     <input type="submit" value="bevitel" name="bevitel">
</form>