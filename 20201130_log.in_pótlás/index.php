<?php
session_start();
require_once "config.php";
$msg=isset($_SESSION['msg']) ? $_SESSION['msg'] : "";
if(isset($_POST["login"])){
    $fnev=$_POST['username'];
    $pw=$_POST['password'];

    $sql="SELECT password, foto from users where username={$fnev}";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $row=$stmt->fetch();
        print_r($row);
        if(password_verify($pw,$row['password'])){
            $_SESSION['kulcs']=$fnev;
            $_SESSION['foto']=$row['foto'];
            header("Location:home.php");
        }else $msg="Hibás felhasználónév és jelszó páros";
    }else $msg="Hibás felhasználónév";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <script src="bootstrap\jquery.min.js"></script>
    <script src="bootstrap\bootstrap.min"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center p-5">
            <form class="col-4 border" method="post">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger"><?=$msg?></div>
                <div class="form-group"><input class="form-control" type="text" name="username" id="" placeholder="Felhasználónév" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" id="" placeholder="password" required></div>
                <div class="form-group"><input class="btn btn-success btn-block" type="submit" value="Bejelentkezés" name="login"></div>
            
                <div>
                    <a href="register.php">Regisztráció</a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>