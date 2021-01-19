window.addEventListener('load',()=>{
    for(var i=0;i<document.links.length;i++){
        var urlStr=document.URL;
        if(urlStr==document.links[i]){
            document.links[i].className="active btn-secondary p-1 m-1 rounded";
        }
    }
});