<?php
$strSorok="";
$strSurt="";
include "filmekFeladat.class.php";
$file = new SplFileObject("filmek.txt");
$filmek = [];
$elsoSor = $file->fgets();
while(!$file->eof()){
    $sor = $file->fgets();
    $tomb = explode(";",$sor);
    $filmek [] = new Film($tomb[0],$tomb[1],$tomb[2],$tomb[3],$tomb[4]);
}
//print_r($filmek);

foreach($filmek as $film){
    $strSorok.=$film->htmlTableRow();
}
print_r($_POST);
$szurtTomb=[];
if(isset($_POST["szures"])){
    $kateg=$_POST["kateg"];
    if($kateg=="Magyarország"){
    foreach($filmek as $film){
        $strSorok="";
        if($film->gyarto==$kateg){
            $szurtTomb[]=$film;
        }
        
    }
}
else{
    foreach($filmek as $film){
        $strSorok="";
        if($film->gyarto!=$kateg&&$film->gyarto!="Magyarország"){
            $szurtTomb[]=$film;
        }
        
    }
}
    //print_r($szurtTomb);
    foreach($szurtTomb as $film)
        $strSorok.=$film->htmlTableRow();
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid jumbotron border ">
    <div class="text-center">
        <h1>Filek listája</h1>
        <form method="Post">
            <div form-group>
                <label>Magyarorszag</label>
                <input type="radio" name="kateg" value="Magyarország">
                <label>Idegen</label>
                <input type="radio" name="kateg"  value="Idegen">
                <input type="submit" value="szűtés" name="szures">
            </div>
        </form>
        <table>
            <thead>
                <th>cim</th>
                <th>rendezo</th>
                <th>gyarto</th>
                <th>ev</th>
                <th>hossz</th>
            </thead>
            <TBODy><?=$strSorok?></TBODy>
        </table>
    </div>
</div>
</body>
</html>