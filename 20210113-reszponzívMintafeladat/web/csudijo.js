window.addEventListener('load',legnepszerubb)


function legnepszerubb(){
    document.getElementById("legnepszerubb").innerHTML="LECSÓ KOLBÁSZCSIPSSZEL";
}
function vendegkonyv(){

    let log = document.getElementById("bejegyzes").value;
    console.log(log)
    if(log.length==0){
        alert("Üres a Bejegyzés")
    }else{
        alert("Köszönjük  a bejegyzését")
        document.getElementById("bejegyzes").value="";
    }
}