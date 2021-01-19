<?php
session_start();
include "config.php";

// Check user login or not
if(!isset($_SESSION['fnev'])){
    header('Location: index.php');
}
$foto=$_SESSION['foto']!=null ?  $_SESSION['foto'] : "avatar/avatar.png";
echo $foto;
$fnev=$_SESSION['fnev'];
// logout
if(isset($_POST['ki'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
    <title>Home</title>
</head>
<body>
<div class='container'>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
        <a class="navbar-brand" href="#">Home</a>
        <div class="btn btn-outline-success ml-auto mr-1"><img src="<?=$foto?>" width="30px" alt="avatar" title="<?=$fnev?>"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav text-right">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <form method='post' >
                            <input class="btn btn-outline-info" type="submit" value="Kijelentkezés" name="ki">
                        </form>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Right Link 2</a>
                </li>
            </ul>
        </div>
    </nav>
            
    <h1>Homepage</h1>
    <p>...tartalom</p>
            
</div>
      
    </body>
</html>