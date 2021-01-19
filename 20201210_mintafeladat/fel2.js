document.getElementById('csuszka').addEventListener('change',kiir);
function kiir(){
    //console.log(this.value);
    let ram = this.value;

    document.getElementById('ram').innerHTML = "A kiválasztott érték: "+ram;
}