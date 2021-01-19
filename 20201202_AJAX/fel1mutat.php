<?php
echo "Ajax";
print_r($_GET);
$str="";
if(isset($_GET['id'])){
    require_once "config.php";

    $id=$_GET['id'];
    $sql="SELECT idopont,mennyiseg from leadasok where tanulo={$id}";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
        $str.="<tr><td>{$row['idopont']}</td><td>{$row['mennyiseg']}</td></tr>";
    }
    $str=strlen($str)==0 ? "Ez a tanulo nem adott le papírt" : $str;

    echo $str;
}
?>
