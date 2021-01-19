<?php
require_once 'config.php';
$listaTanulok="";

$sql="SELECT tazon,nev,osztaly FROM tanulok  order by nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch())
    //$listaTanulok.="<option>{$row['nev']} {$row['osztaly']}</option>";
    $listaTanulok.="<option value='{$row['tazon']}'".isSelected($row['tazon']).">{$row['nev']} {$row['osztaly']}</option>";

print_r($_POST);

$tbl="";
$nev="";
$ossz=0;


function isSelected($id){
    if(isset($_POST['tanulo']))
            return $id==$_POST['tanulo'] ? "selected" : "";
    else 
        return "";
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
    <script src="fel3.js"></script>   
	<title>Papirgyujtes</title>
</head>

<body>
    <div class="container border">
        <h1 class="text-center">Papirgyujtes</h1>
        <div class="row m-1 p-2">
            <div class="col-5 border shadow p-3 mb-5 bg-white rounded">
            <form  method="GET">
            
                <div class="form-group">
                    <label for="">Tanulok:</label>
                    <select name="tanulo" id="lista"><option value="0">valassz ki egy tanulot...</option>
                                    <?=$listaTanulok?>
                    </select>
                </div>
            </form>
        </div>
        
        <div class="col-5 ">
                <p>A kivalasztott tanulo <b><?=$nev?></b>   altal leadott papir:</h3>
                <table class="table table-bordered" id="table">
                    <!--
                    <thead class="thead-light text-center ">
                        <th>Idopont</th><th>Mennyiseg</th></thead>
                        <?=$tbl?>-->
                        <tbody id="output">
                            
                        </tbody>


                </table>
        </div>
    </div>
</div>
</body>
</html>

