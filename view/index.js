const inicioBtn = document.querySelector('#inicioBtn');
const cadastrarBtn = document.querySelector('#cadastrarBtn');
const plusBtn = document.querySelector('#plusBtn');
const inicioSec = document.querySelector('#inicioSec');
const cadastrarSec = document.querySelector('#cadastrarSec');
const telefone = document.querySelector('#telefone0');
const telefones = document.querySelector('#telefones');
let i = 0;

inicioBtn.onclick = function () {
    inicioSec.style.display = "flex"
    cadastrarSec.style.display = "none"
}
cadastrarBtn.onclick = function () {
    inicioSec.style.display = "none"
    cadastrarSec.style.display = "flex"
}

plusBtn.onclick = function () {

    i++

    const inputTel = `<div id="tel${i}" class="newTel">
                            <input class="form-control" type="number" id="telefone${i}" name="telefone[]" placeholder="Telefone" required>
                            <a class = "minusBtn" id="${i}"><i id="minus" class="fas fa-minus"></i></a>
                        </div>`;

    telefone.insertAdjacentHTML("afterend", inputTel)

    const minusBtn = document.querySelector('.minusBtn');
    minusBtn.onclick = function () {
        telefones.removeChild(document.querySelector(`#tel${this.id}`));

    }
}




