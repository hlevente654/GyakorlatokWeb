<?php
session_start();
require_once "config.php";

//kell ulcs

if(!isset( $_SESSION['kulcs'])){
    header("Location:index.php");
}

$foto=$_SESSION['foto']!=null ? $_SESSION['foto'] : "avatar/avatar.png";
$fnev=$_SESSION['kulcs'];

//logout

if(isset($_SESSION['logout'])){
    $_SESSION['kulcs']="";
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <script src="bootstrap\jquery.min.js"></script>
    <script src="bootstrap\bootstrap.min"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
    <a class="navbar-brand" href="#">Home</a>
    <button class="btn btn-success ml-auto mr-1"><img src="<?=$foto?>" alt="Avatar" width="30px" title="<?=$fnev?>"></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        <ul class="navbar-nav text-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                <form method="POST">
    
                    <input class="btn btn-success btn-block" type="submit" value="Kijelentkezés" name="logout">
                    </form>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Right Link 2</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container">
        <h1>HOME</h1>
    <p>Tartalom...</p>

</div>
</body>
</html>