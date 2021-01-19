<?php
require_once "config.php";

 $sql = "SELECT sum(ar*db) as össz FROM termekek";

 $stmt = $db -> query($sql);

 $row = $stmt->fetch();

 //print_r($row);

?>
<h3>A raktáron lévő gépek össz értéke: <?=$row['össz']?> </h3>