window.addEventListener('load',()=>{

    document.getElementById('nev').addEventListener('mouseover',mutat)

})
function mutat(e){
    
    if(e.target.tagName=="LI"){
        console.log(e.target.tagName)
        let id = e.target.id
        console.log(id)
        let xhr=new XMLHttpRequest();
        xhr.open("GET","fel1mutat.php?id="+id,true)

        xhr.addEventListener('readystatechange',()=>{
            if(xhr.readyState==4 && xhr.status==200){
                console.log("OK");
                megjelenit(xhr);
            }else{
                console.log("Hiba");
            }
        })
        xhr.send();
        

    }
}
function megjelenit(xhr){
    document.getElementById('output').innerHTML=xhr.responseText
}