<?php
    require_once "config.php";
    $jelszo=password_hash('1234',PASSWORD_DEFAULT); 
    $sql="insert into users values (null,'kmagdi','Katay Magdi','{$jelszo}' )";
    $stmt=$db->exec($sql);
?>