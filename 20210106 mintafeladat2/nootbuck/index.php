<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="menu.js"></script>
	<title>Notebook</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Főoldal</a></li>
        <li><a href="index.php?p=feladat1.php">Összérték</a></li>
        <li><a href="index.php?p=feladat2.php">RAM szerinti listázás</a></li>
        <li><a href="index.php?p=feladat3.php">Ár szerinti listázás</a></li>
        <li><a href="index.php?p=feladat4.php">Beszerzés (PRG)</a></li>
        <li><a href="index.php?p=feladat5.php">Selejtezés (PRG)</a></li>
        <li><a href="index.php?p=feladat6.php">Törlés </a></li>
    </ul>
</nav>
<div class="tarolo">
        <?php
        if(isset($_GET["p"])){
            include  $_GET['p'];
        }	
        else include("fooldal.php");
        ?>
</div>
</body>
</html>
