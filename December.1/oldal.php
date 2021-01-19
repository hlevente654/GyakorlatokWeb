<?php
require_once "config.php";
$strTable = "";
$pont="";
function megjelenit($db, &$strTable){
    $sql = "SELECT nev, pont FROM jatekos ORDER by pont LIMIT 5;";
    $stmt = $db -> query($sql);
    while ($row = $stmt -> fetch()){
        $strTable.="<tr><td>{$row["nev"]}</td><td>{$row["pont"]}</td></tr>";
    }

}
megjelenit($db, $strTable);
if (isset($_POST["gomb"])){
    echo "jó";
}

if (isset($_POST["gomb"]) && $_POST["nev"]!=null && $_POST["pont"]!=null){
    $nev=$_POST["nev"];
    $pont=$_POST["pont"];
    $sql = "INSERT INTO jatekos VALUES (null ,'{$nev}', $pont)";
    $stmt = $db -> exec($sql);
    if ($stmt){
        $strTable="";
        $msg = "Sikeres adatbeiras";
        megjelenit($db, $strTable);
    }
    else {
        $msg = "Hiba";
    }

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
    <link rel="stylesheet" href="styles.css">
    <title>Dragon_Age:memory_game</title>
    
</head>
<body>
<div class="container-fluid jumbotron border ">
    <div class="row">
        
            
                
                <table id="jatek" style="visibility:hidden;">
                    <tr>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_1" onclick="fordit(this.id,this.name)"></td>

                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_2" onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_3" onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_4" onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_5" onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_6" onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_7"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_1_8"onclick="fordit(this.id,this.name)"></td>
                    </tr>
                    <tr>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_1"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_2"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_3"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_4"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_5"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_6"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_7"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_2_8"onclick="fordit(this.id,this.name)"></td>
                    </tr>
                    <tr>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_1"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_2"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_3"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_4"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_5"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_6"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_7"onclick="fordit(this.id,this.name)"></td>
                        <td><img src="hatter_card.jpg" alt=""  name="hatter" id="hatter_3_8"onclick="fordit(this.id,this.name)"></td>
                    </tr>
                    
                </table>
                <div >
                        <div style="visibility: hidden;" id="lepesSzamlaloDiv">
                                Lépések széma: <p id="lepesSzamlalo"></p>
                        </div>
                        <div id="ujJatekGombDiv">
                            <input type="button" value="új játék" onclick="ujJatek()" id="elkuld" name="elkuld"  >
                        </div>
                </div>      
        <div  id="eredmenyMentese" style="visibility: hidden;">
            <form method="post">
                    Név: <input type="text" name="nev" id="nev">
                     <input type="number" name="pont" id="lepesSzamlaloAdo" value="" hidden>
                     <hr>
                     <div id="lepesSzamlaloAdo"><?= $pont?></div>
                     <input type="submit" value="Beiras" name="gomb">
            </form>
        </div>
                

            
            <div class="col-sm">
                <table class="table">
                        <thead class="thead-dark">
                            <tr >
                                <th class="row-9" scope="col">Név</th>
                                <th class="row-3" scope="col">Lépés</th>
                            </tr>
                            <tbody>
                            <?=$strTable?>

                            </tbody>
                        </thead>
                </table>

            </div>
            
            
    </div>
</div>
<div class="bg"></div>
</body>

</html>

<script>
    let erinthetetlenek = new Array ();
    
    var meglevoParokSzama =0;
    let cardsName = new Array ("blackwall_card","blackwall_card","cassandra_card","cassandra_card","solas_card","solas_card","varric_card","varric_card","cole_card","cole_card","cullen_card","cullen_card","leliana_card","leliana_card","sera_card","sera_card","dorian_card","dorian_card","ironbull_card","ironbull_card","josephine_card","josephine_card","vivienne_card","vivienne_card"); 
   
        let cardsNameb = new Array (); 
        let cardsHely = new Array();
        let kattintasokSzama=0;
    let cardsFordit = new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    function ujJatek(){
        document.getElementById("ujJatekGombDiv").style.visibility = "hidden";
        document.getElementById("lepesSzamlaloDiv").style.visibility = "visible";
        document.getElementById("jatek").style.visibility = "visible";
        var i,j;
        for(i = 1;i<4;i++){
            for(j = 1;j<9;j++){
                let eltavolitIndex = (Math.floor(Math.random()*cardsName.length));

                let vm = cardsName.splice(eltavolitIndex,1);

                cardsHely.push("hatter_"+i+"_"+j);
                cardsNameb.push(vm);

            }
        }
    }

 var elsoClickHelye=null;
 var elsoClickNeve=null;
 var masodikClickHelye=null;
 var masodikClickNeve=null;

    function fordit(clicked_id,clicked_name){
        

        if(!erinthetetlenek.includes(clicked_id)){
            kattintasokSzama++;
        document.getElementById("lepesSzamlalo").innerHTML = kattintasokSzama;
        document.getElementById("lepesSzamlaloAdo").value = kattintasokSzama;
            for(i = 0;i<cardsHely.length;i++){
                if(cardsHely[i] == clicked_id){
                    document.getElementById(cardsHely[i]).name = cardsNameb[i];
                    document.getElementById(cardsHely[i]).src = cardsNameb[i]+".jpg";

                    if(elsoClickHelye==null){
                        elsoClickHelye = cardsHely[i];
                        elsoClickNeve = cardsNameb[i];

                    }else {if(masodikClickHelye==null){
                        masodikClickHelye = cardsHely[i];
                        masodikClickNeve = cardsNameb[i];

                    }}
                    
                    
                    

                    cardsFordit[i] = 1;
                }
            }
            
            if(elsoClickHelye!=null && masodikClickHelye!=null){

                        if(elsoClickNeve[0] == masodikClickNeve[0]){

                            console.log("pár")
                            meglevoParokSzama++;

                            document.getElementById(elsoClickHelye).name = elsoClickNeve;
                            document.getElementById(elsoClickHelye).src = elsoClickNeve+".jpg";
                            console.log(elsoClickHelye)

                            erinthetetlenek.push(elsoClickHelye);


                            document.getElementById(masodikClickHelye).name = masodikClickNeve;
                            document.getElementById(masodikClickHelye).src = masodikClickNeve+".jpg";
                            console.log(masodikClickHelye)
                            
                            erinthetetlenek.push(masodikClickHelye);

                            elsoClickHelye=null;
                            elsoClickNeve=null;
                            masodikClickHelye=null;
                            masodikClickNeve=null;
                            
                            
                        }
                        else{

                            console.log("nincs pár")

                            setTimeout(function (){
                                
                                document.getElementById(elsoClickHelye).name ="hatter";
                                document.getElementById(elsoClickHelye).src = "hatter_card.jpg";

                                document.getElementById(masodikClickHelye).name = "hatter";
                                document.getElementById(masodikClickHelye).src = "hatter_card.jpg";

                                elsoClickHelye=null;
                                elsoClickNeve=null;
                                masodikClickHelye=null;
                                masodikClickNeve=null;
                            },1000);

                        }
                }
                

        if(meglevoParokSzama == 12){
            document.getElementById("eredmenyMentese").style.visibility = "visible";
            document.getElementById("lepesSzamlaloDiv").style.visibility = "visible";
            document.getElementById("jatek").style.visibility = "hidedn";
        }
    
        }
    }
    
</script>