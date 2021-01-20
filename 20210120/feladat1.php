<?php
require_once "config.php";

$valasz = "";

if(isset($_POST['gomb'])){
    
    

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
      
    // Driver Code 
    extract($_POST);
   $kapott = $_POST['kapott'];
   
    $flag = primeCheck($kapott); 
    if ($flag == 1) {
        $valasz = "prím szám"; 
        
    }
    else
    {
        $valasz = "nem prím szám";
    }

    
}

?>
<h1>Feladat 1.</h1>
<form method="POST">
    <h2>Prímszám-e: a felhasználó által bekért számról kiírja, hogy prímszám-e</h2>
    <input type="number" name="kapott" id="">
    <input type="submit" value="prim_e" name="gomb">
    <div>
        <?=$valasz?>
    </div>
</form>