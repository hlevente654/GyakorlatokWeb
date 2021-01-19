<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="menu.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <nav class="nav flex-colom">
                    <a href="index.php" class="nav-item btn-info rounded p-1 m-1">HomePage</a>
                    <a href="index.php?oldal=kapcsolat" class="nav-item btn-info rounded p-1 m-1">Kapcsolat felvétel</a>
                    <a href="index.php?oldal=rolunk" class="nav-item btn-info rounded p-1 m-1">Rólunk</a>
                    <a href="index.php?oldal=termekek" class="nav-item btn-info rounded p-1 m-1">Termékek</a>
                </nav>

            </div>
            <div class="col-9">
                <div>
                    <?php
                    if(isset($_GET['oldal'])){
                        $oldal = $_GET['oldal'];
                        //echo $oldal;
                        include $oldal.".php";
                    }
                    else include "homePage.php";
                    ?>
                </div>

            </div>

        </div>

    </div>
    
</body>
</html>