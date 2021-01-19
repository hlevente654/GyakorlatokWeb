<?php
if(isset($_GET['osztaly'])&& $_GET['osztaly']!=0){

    require_once "config.php";
    $osztaly=$_GET['osztaly'];

    $sql="SELECT tazon,nev from tanulok where osztaly='{$osztaly}' order by nev";

    $str="";

    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
        $str.="<tr><td>{$row['tazon']}</td><td>{$row['nev']}</td></tr>";
    }
    echo $str;
}

?>