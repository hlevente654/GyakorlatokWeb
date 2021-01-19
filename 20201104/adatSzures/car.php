<?php
$strOp="";
$strSorok="";
include "Car.class.php";
$file = new SplFileObject("autok.txt");
$autok = [];
while(!$file->eof()){
    $sor = $file->fgets();
    $tomb = explode(";",$sor);
    $autok [] = new Car($tomb[0],$tomb[1],$tomb[2],$tomb[3],);
}
//print_r($autok);
$markaTomb=[];
foreach($autok as $auto)
    $markaTomb[]=$auto->nev;

$markaTomb=array_unique($markaTomb);
sort($markaTomb);

foreach($markaTomb as $markaNev)
    $strOp.="<option>".$markaNev."</option>";

//szütes:
print_r($_POST);
$szurtTomb=[];
if(isset($_POST["szures"])){
    $nev=$_POST["marka"];
    foreach($autok as $auto)
        if($auto->nev==$nev) $szurtTomb[]=$auto;
    
    print_r($szurtTomb);
    foreach($szurtTomb as $auto)
        $strSorok.=$auto->htmlTableRow();
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
    <style>
    .container-fluid{
        max-width:900px;
        min-height:600px;}
    .jumbotron{ 
        background: linear-gradient(to bottom, rgba(255,255,255,0.4), rgba(255,255,255,0.9) ) , url(hatter.jpg) center no-repeat;
        background-size: cover;
    }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container-fluid jumbotron border ">
    <h1 class="text-center">Autókereskedés - kinalat</h1>
    <div class="row justify-content-center ">

    
    <form method="post">
        <div class="input-group">
            <select class="custom-select text-center" name="marka">
                <option value="0">Válassz márkát...</option>
                <?=$strOp?>
            </select>
            <div class="input-group-append">
            <input type="submit" name="szures" value="szürés" class="btm-outline-primary">
        </div>
        </div>
        
    </form>
    </div>
    <hr>
    <div class="row justify-content-center ">
    <table>
        <thead class="table table-dark">
        
            <th>Márka</th>
            <th>Évjárat</th>
            <th>Ajto szám</th>
            <th>Szin</th>
          
            </thead>
            <TBODy><?=$strSorok?></TBODy>
    </table>
    </div>
</div>
</body>
</html>