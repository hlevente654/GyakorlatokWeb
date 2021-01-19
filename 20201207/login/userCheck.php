<?php
session_start();
include_once "config.php";


$msg="";

if(isset($_GET['us'])){
    $sql="SELECT username From users where username='{$_GET['us']}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        //$row= $stmt->fetch();
        $msg="Létezik ez ({$_GET['us']}) felhasználónév";
    }
}

if(isset($_GET['em'])){
    $sql="SELECT email From users where email='{$_GET['em']}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        //$row= $stmt->fetch();
        $msg="Létezik ilyen ({$_GET['em']}) email cím";
    }
}

echo $msg;

?>