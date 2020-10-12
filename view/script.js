const inicioBtn = document.querySelector('#inicioBtn')
const cadastrarBtn = document.querySelector('#cadastrarBtn')
const plusBtn = document.querySelector('#plusBtn')
const inicioSec = document.querySelector('#inicioSec')
const cadastrarSec = document.querySelector('#cadastrarSec')
let i = 0

inicioBtn.onclick = function(){
    inicioSec.style.display = "flex"
    cadastrarSec.style.display = "none"
}
cadastrarBtn.onclick = function(){
    inicioSec.style.display = "none"
    cadastrarSec.style.display = "flex"
}

plusBtn.onclick = function(){
    
    i++
    console.log(i)
    const inputTel = `<input class="form-control" type="number" id="telefone${i}" name="telefone[]" placeholder="Telefone" required>`
    
    plusBtn.insertAdjacentHTML("afterend", inputTel)
}



