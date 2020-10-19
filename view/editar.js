
const plusBtn = document.querySelector('#plusBtn');
const telefones = document.querySelector('#telefones');

plusBtn.onclick = function(){
    
    i++
 
    const inputTel = `<div id="tel${i}" class="newTel"><input class="form-control" type="number" id="telefone${i}" name="telefone[]" placeholder="Telefone" required><a class = "minusBtn" id="${i}"><i id="minus" class="fas fa-minus"></i></a></div>`
    
    telefones.insertAdjacentHTML("afterend", inputTel)

    const minusBtn = document.querySelector('.minusBtn')
    minusBtn.onclick = function(){
        console.log(this.id)
        // const tel = document.querySelector(`#tel${i}`)
        telefones.removeChild(document.querySelector(`#tel${this.id}`));
    
    }
}
