window.addEventListener('load',init)

function init(){
    document.getElementById("elkuld").addEventListener("click", ujJatek);
    
}

var meglevoParokSzama =0;
    let cardsName = new Array ("blackwall_card","blackwall_card","cassandra_card","cassandra_card","solas_card","solas_card","varric_card","varric_card","cole_card","cole_card","cullen_card","cullen_card","leliana_card","leliana_card","sera_card","sera_card","dorian_card","dorian_card","ironbull_card","ironbull_card","josephine_card","josephine_card","vivienne_card","vivienne_card"); 
   
        let cardsNameb = new Array (); 
        let cardsHely = new Array();
    
    let cardsFordit = new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    function ujJatek(){
        console.log("js")
        var i,j;
        for(i = 1;i<4;i++){
            for(j = 1;j<9;j++){
                let eltavolitIndex = (Math.floor(Math.random()*cardsName.length));
                console.log("játék megy")
            //console.log(eltavolitIndex)
                let vm = cardsName.splice(eltavolitIndex,1);
            //console.log(vm)
           //console.log(cardsName)
                cardsHely.push("hatter_"+i+"_"+j);
                cardsNameb.push(vm);
           //console.log(cardsHely)
            }
        }
    }