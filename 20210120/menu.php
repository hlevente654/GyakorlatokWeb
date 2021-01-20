<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Osztok</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="menu.php">Főoldal</a></li>
            <li><a href="menu.php?p=feladat1.php">Feladat 1.</a></li>
            <li><a href="menu.php?p=feladat2.php">Feladat 2.</a></li>
            <li><a href="menu.php?p=feladat3.php">Feladat 3.</a></li>
            <li><a href="menu.php?p=feladat4.php">Feladat 4.</a></li>
            <li><a href="menu.php?p=feladat5.php">Feladat 5.</a></li>
            <li><a href="menu.php?p=feladat6.php">Feladat 6.</a></li>
        </ul>
    </nav>
    <div class="tarolo">
        <?php
            if(isset($_GET["p"])){
                include $_GET['p'];
            }
        ?>
    </div>
</body>
</html>