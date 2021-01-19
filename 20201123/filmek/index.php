<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmek</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="menu.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col-3">
            <nav class="nav flex-column">
                <a href="index.php" class="nav-item btn-info m-1 p-1 rounded">Filmek listája</a>
                <a href="index.php?program=insert" class="nav-item btn-info m-1 p-1 rounded">Új bevezetése</a>
                <a href="index.php?program=update" class="nav-item btn-info m-1 p-1 rounded">Módosítás</a>
                <a href="index.php?program=delete" class="nav-item btn-info m-1 p-1 rounded">Törlés</a>
                <a href="index.php?program=filter" class="nav-item btn-info m-1 p-1 rounded">Szűrés</a>
            </nav>
        </div>
        <div class="col-9 ">
            <div class="bg-light shadow p-1 m-1 rounded">
                <?php
                    if(isset($_GET['program'])){
                        $programNev=$_GET['program'];
                        include $programNev.".php";
                    }else{
                        include "fooldal.php";
                    }

                ?>

            </div>
            </div>
        </div>
        
    </div>
</body>
</html>