window.addEventListener('load',()=>{

    document.getElementById('lista').addEventListener('change',listaz)

})

function listaz(){
    console.log(this.value);
    let xhr=new XMLHttpRequest();
    xhr.open("GET","fel3listaz.php?id="+document.getElementById('lista').value,true);
    xhr.addEventListener('readystatechange',()=>{
        if(xhr.readyState==4 && xhr.status==200){
            megjelenit(xhr);
        }
    })
    xhr.send();
}
function megjelenit(xhr){
    document.getElementById('output').innerHTML=xhr.responseText
    
}