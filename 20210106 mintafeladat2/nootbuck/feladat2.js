window.addEventListener('load',init);

function init(){
	document.getElementById("gb").addEventListener("change",szures)
}
function szures(e){
	let ram=e.target.value
	document.getElementById("ramErtek").innerHTML="A kiválasztott érték:"+ram+"GB"
	let xhr=new XMLHttpRequest();	
	xhr.open('GET','fel2Ajax.php?ram='+ram,true);
	xhr.addEventListener('readystatechange',()=>{
		if(xhr.readyState==4 && xhr.status==200)
			kiirat(xhr)
	})	
	xhr.send();
	
}
function kiirat(xhr){
	document.getElementById('output').innerHTML="<tbody>"+xhr.responseText+"</tbody>";
}