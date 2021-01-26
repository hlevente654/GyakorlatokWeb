window.addEventListener('load',init)
//objektumokat tartalmaz� t�mb:
let autok=[
    {id: 1, nev:"Trabant 601"},
    {id: 2, nev:"Moszkvics 408"},
    {id: 3, nev:"DeLorean DMC-12"},
    {id: 4, nev:"Cadillac Fleetwood Brougham"},
    {id: 5, nev:"Ferrari 348"},
    {id: 6, nev:"1970 Ford Mustang Boss 302"},
]
//a nem el�rhet� aut�k azonos�t�i:
let nemElerhetoekID=[1,4,6]
function init(){
    nemElerhetoek()
}
function nemElerhetoek(){
var nemelerhetok="";
    for(var i=0;i<autok.length;i++){
        for(var t=0;t<nemElerhetoekID.length;t++){
        if(autok[i].id == nemElerhetoekID[t]){
            nemelerhetok = nemelerhetok+" "+autok[i].nev+",";
        }
        }
    }
    document.getElementById('nem-elerheto').innerHTML = nemelerhetok;
}
function velemenyKuldes(){
    var bejegyzes = document.getElementById('velemenyInput').value;
    console.log(bejegyzes);
    if(bejegyzes.length > 0){
        alert("Véleménye fontos számunkra");
    }
    else{
        alert("üres bejegyzés nem küldhető ");
    }
    document.getElementById('velemenyInput').value = "";
}