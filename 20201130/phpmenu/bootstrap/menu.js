window.addEventListener('load',init)
function init(){
    console.log(document.URL);
    console.log(document.links.length);
    for(let i=0;i<document.links.length;i++){
        let url=document.URL;
        if(url==document.links[i].href){
            document.links[i].className="active btn-secondary p-1 m-1 rounded"
        }
    }
}
