<?php
require_once 'configdb.php';
$stmt=$db->query("select sum(ar*db) osszertek from termekek");
$row=$stmt->fetch();

?>

    <h3> A raktáron lévő gépek összértéke: <?=$row['osszertek']?> Ft </h3>
