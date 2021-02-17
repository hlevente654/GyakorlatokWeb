function gomb(){
    let kapott = document.getElementById("jatek-valasz").value;
    if(kapott != ""){
        alert("Köszönjük hogy részt vesz a játékunkban")
        document.getElementById("jatek-valasz").value = "";
    }
}