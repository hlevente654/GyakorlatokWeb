window.addEventListener('load',init)

function init(){
    show()
    document.getElementById('meret').addEventListener('change', show)
    window.addEventListener('resize', show)
}
function show(){
    let grid = document.querySelector('.grid')
    while(grid.firstChild){
        grid.firstChild.remove()
    }
    let meret = document.getElementById('meret').value;
    console.log(meret)
    let gridMeret = grid.clientWidth
    console.log(gridMeret)
    grid.style.height = `${gridMeret}px`
    for(let i=0;i<meret*meret;i++){
        let gomb = document.createElement('div')
        gomb.setAttribute('id',i)
        let dim =  (gridMeret-2*meret)/meret
        console.log(dim)
        gomb.style.flex = `1 1 calc(${dim}px)`
        gomb.classList.add('gomb')
        grid.appendChild(gomb)

    }

}