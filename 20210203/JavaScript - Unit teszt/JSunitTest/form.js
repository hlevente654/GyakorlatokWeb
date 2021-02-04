window.addEventListener("load",init)

function init(){
    document.getElementById("pont").addEventListener("change",pontotMutat)
    document.querySelectorAll("input[name=card]").forEach((e)=>e.addEventListener("keyup",ugrik))

    document.getElementById("elkuld").addEventListener("click",ellenoriz)
}

/*class Adat{
    constructor(email,passw,erdeklodes,bankkartya,pont,nyelv,kategoria){
         this.email=email;
         this.passw=passw;
         this.erdeklodes=erdeklodes;
         this.bankkartya=bankkartya;
         this.pont=pont;
         this.nyelv=nyelv;
         this.kategoria=kategoria;
    }
   
}
let adat=new Adat()*/
let hibak=[]

const pontotMutat=(e)=>{
    console.log(e.target.value)
    document.getElementById("pontErtek").value=e.target.value
}

const ugrik=(e)=>{
    console.log(e.target)
    let ti=e.target.tabIndex
    console.log("tabindex="+ti)
    let db=document.getElementsByName("card").length
    console.log("darab="+db)
    console.log(e.target.value.length+" "+e.target.maxLength)
    if(parseInt(e.target.value.length)==parseInt(e.target.maxLength) && parseInt(ti)<parseInt(db))
         document.getElementsByName("card")[ti].focus()     
}

const ellenoriz=(e)=>{
    hibak=[]
    document.getElementById("hibalista").innerHTML=""

    if(document.getElementById("email").value.length<4)
        hibak.push("helytelen e-mail cim")

    //jelszo:
    let jszo=document.getElementById("passw").value
    if(checkJelszo(jszo).length>0)
        hibak=[...hibak,...checkJelszo(jszo)]
    
    //erdeklodesi kor:
    let erdeklodesIndex=document.getElementById("sel").selectedIndex
    console.log("erdeklodes="+erdeklodesIndex+" "+document.getElementById("sel").options[erdeklodesIndex].text)
    let erdeklodes=document.getElementById("sel").options[erdeklodesIndex].text
    if(erdeklodesIndex<=0)
        hibak.push("valassz egy erdeklodesi kort")

    //checkbox:
    if(!document.querySelector('input[name=nyelv]:checked'))
      hibak.push("ki kell valasztani legalabb egy nyelvet")     
      
    //radio:
    if(!document.querySelector('input[name=rOp]:checked'))
      hibak.push("ki kell valasztani a hovatartozasi kategoriat")     

     //bankkartyaszam ellenorzes: 
    let cardTomb=Array.from(document.getElementsByName("card"))
    if(!checkCard(cardTomb))
            hibak.push("a bankkartya szama nem jo")
                
    document.getElementById("hibalista").innerHTML=hibak.reduce((s,e)=>s+"<li>"+e+"</li>","")
    if(hibak.length>0)
        e.preventDefault();
}

const checkJelszo=(jszo)=>{
    console.log(jszo)
    let err=[]
    if(jszo.length<8)
        err.push("a jelszo tul rovid")
    let hasNumber = /\d/;   
    if(!hasNumber.test(jszo))
        err.push("a jelszonak kell tartalmaznia szamot is")
    console.log(err)
    return err;
}

function checkCard(arr){
    let reg= /^\d+$/;   //az elejetol a vegeig csak szamjegyek
    let rosszTomb=arr.filter(e=>!reg.test(e.value))
    //rosszTomb.forEach(e=>console.log("nem szam:"+e.value))
   return rosszTomb.length>0? false : true;
}

module.exports=checkJelszo
//module.exports=checkCard