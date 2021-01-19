<?php
require_once "config.php";
$jelszo=password_hash("12345", PASSWORD_DEFAULT);
$sql="INSERT Into users values(null, 'Én','Tamás','($jelszo)')";
$stmt=$db->exec($sql);

?>