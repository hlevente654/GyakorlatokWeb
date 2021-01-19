<?php
require_once "config.php";

$nev="";
$ossz=0;
$row="";
$str="";

//print_r($_GET);

if(isset($_GET['id']) && $_GET['id']!=0){
    $id=$_GET['id'];

    $id=$_GET["id"];
    $stmt=$db->query("select * from tanulok where tazon={$id}");
    $row=$stmt->fetch();
    $nev=$row['nev'];
    $stmt=$db->query("select idopont, mennyiseg from leadasok where tanulo={$id}"); 

    while($row=$stmt->fetch()){
        $str.="<tr><td>{$row['idopont']}</td><td>{$row['mennyiseg']}</td></tr>";
        $ossz+=$row['mennyiseg'];
    }
    
    echo $str;
}

?>

