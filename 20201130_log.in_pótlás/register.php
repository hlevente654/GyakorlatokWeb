<?php
session_start();
require_once "config.php";

$msg="";

print_r($_POST);
if(isset($_POST['mentes'])){
    $fnev=$_POST['username'];
    $email=$_POST['email'];
    $nev=$_POST['name'];
    $jelszo=$_POST['password'];

    $sql="SELECT email,username FROM users where email='{$email}' or username={$fnev}";

    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $msg="Létezik ilyen email/felhasználónév";
    }else {
        $pw=password_hash($jelszo, PASSWORD_DEFAULT);

        $sql="INSERT INTO users values(null, '{$fnev}','{$nev}','{$email}','{$pw}',null)";

        echo $sql;

        $stmt=$db->exec($sql);
        if($stmt){
            $_SESSION['msg']="Sikeres Regisztráció";
            header("Location:index.php");
        }
    }

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
    <script src="ellenor.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center p-5">
            <form class="col-4 border" method="post">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger" id="msg"><?=$msg?></div>
                
                <div class="form-group"><input class="form-control" type="text" name="username" id="" placeholder="Felhasználónév" required></div>
                
                <div class="form-group"><input class="form-control" type="text" name="email" id="" placeholder="Email cím" required></div>
                
                <div class="form-group"><input class="form-control" type="text" name="name" id="" placeholder="Neve" required></div>

                <div class="form-group"><input class="form-control" type="password" name="password" id="pw1" placeholder="password" required></div>
                
                <div class="form-group"><input class="form-control" type="password" name="pwConf" id="pw2" placeholder="Jelszó megerősítése" required></div>
                
                <div class="form-group"><input type="checkbox" name="" id="" required><a href="a">Adatkezelési feltételek...</a></div>

                <div class="form-group"><input class="btn btn-success btn-block" type="submit" value="Regisztráció" id="btn" name="mentes"></div>
            </form>

        </div>
    </div>
</body>
</html>