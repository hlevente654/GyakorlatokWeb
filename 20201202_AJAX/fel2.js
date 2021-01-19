window.addEventListener('load',()=>{

    document.getElementById('osztaly').addEventListener('change',listaz)

})

function listaz(){
    console.log(this.value);
    let osztaly = this.value;
    let xhr=new XMLHttpRequest();
    xhr.open("GET","fel2listaz.php?osztaly="+osztaly,true);
    xhr.addEventListener('readystatechange',()=>{
        if(xhr.readyState==4 && xhr.status==200){
            megjelenit(xhr);
        }
    })
    xhr.send();
}
function megjelenit(xhr){
    document.getElementById('output').innerHTML=xhr.responseText
    document.getElementById('o').innerHTML=document.getElementById('osztaly').value+" osztály névsora. ";
}