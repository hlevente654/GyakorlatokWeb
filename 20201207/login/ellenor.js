window.addEventListener("load",init);

function init(){
	document.getElementById('mentes').addEventListener("click",ellenorzes);
	document.getElementById('us').addEventListener('focusout',vizsgal)
	document.getElementById('em').addEventListener('focusout',vizsgal)
}

function ellenorzes(e){
	let j1=document.getElementById('jelszo').value;
	let j2=document.getElementById('conf_jelszo').value;

	console.log("ok "+j1+" "+j2);

	if(j1.trim()!=j2.trim()){
		e.preventDefault();
	    document.getElementById('msg').innerHTML=" nem egyezik a 2 jelszó !!!";
	}
}

function vizsgal(e){
	console.log(e.target.id+" -- "+e.target.value)

	let xhr=new XMLHttpRequest()
	xhr.open("GET","userCheck.php?"+e.target.id+"-"+e.target.value,true)
	xhr.addEventListener('readystatechange',()=>{
		if(xhr.readyState==4 && xhr.status==200){
			document.getElementById('msg').innerHTML=xhr.responseText
			if(xhr.responseText.length>0){
				document.getElementById(e.target.id).value="";
				if(e.target.id=="us"){
					document.getElementById
				}
			//	document.getElementById(e.target.id).focus();
			}
		}
	})
	xhr.send();
}