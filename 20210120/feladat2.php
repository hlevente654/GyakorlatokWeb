<?php
require_once "config.php";
$msg = "";
$eredmeny = "";
$osztok = "";

function primeCheck($kapott){ 
        
    if ($kapott == 1){
    return 0; 
    
    }
    for ($i = 2; $i <= $kapott/2; $i++){ 
        if ($kapott % $i == 0) 
            return 0; 
    } 
    return 1; 
    
} 


if(isset($_POST['gomb']) && $_POST['ertek']!=null){
    
    $szam = $_POST['ertek'];
    

    //van e ilyen
    
    $sqlVanE = "SELECT szam FROM szamok WHERE szam = {$szam};";
    $stmt = $db ->query($sqlVanE);
    if($stmt ->rowCount() ==0){
        $sql = "INSERT INTO `szamok` (`szam`) VALUES ('$szam');";
        $stmt = $db ->prepare($sql);
        $result = $stmt ->execute(array($szam));
 
        //betolti a többit
        $oszto =1;
        while($szam > $oszto){
            echo "jo";
        if($szam % $oszto == 0){
            
            $flag = primeCheck($oszto);
            if($flag == 1){
                $primE = "i";
            }
            else{
                $primE = "n";
            }
            $sqlOsztok = "INSERT INTO `szamok_osztoi` ( `szam` ,`osztoja`, `prim_e`) VALUES ('$szam' ,'$oszto', '$primE');";
            $stmt = $db ->prepare($sqlOsztok);
            $result = $stmt -> execute(array($szam,$oszto,$primE));
            $osztok .= "<tr><td>{$oszto}, </td></tr>";
        }
        $oszto = $oszto+1;
        }


        if($result){
            $msg="sikeres adatbeiras";
        }
        else
        {
        $msg="sikertelen adatbeiras";
        }
   
    }else{
        $msg = "Már van ilyen szám az adatbázisban.";
    }

}
?>
<h1>Feladat 2.</h1>
<form method="post">
    <input type="number" name="ertek" id="">
    <input type="submit" value="gomb" name="gomb">
</form>
<div>
    <div>
        <h3>osztok: </h3>
        <?=$osztok?>
    </div>
    
    <br>
    <?=$msg?>
</div>