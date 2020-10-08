const inicioBtn = document.querySelector('#inicioBtn')
const cadastrarBtn = document.querySelector('#cadastrarBtn')
const inicioSec = document.querySelector('#inicioSec')
const cadastrarSec = document.querySelector('#cadastrarSec')

inicioBtn.onclick = function(){
    inicioSec.style.display = "flex"
    cadastrarSec.style.display = "none"
}
cadastrarBtn.onclick = function(){
    inicioSec.style.display = "none"
    cadastrarSec.style.display = "flex"
}


function formatarMoeda() {
    var elemento = document.getElementById('preco');
    var valor = preco.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
}



function validar(formulario) {
    var quantidade = form.quantidade.value;
    var preco = form.preco.value;
    for (i = 0; i <= formulario.length - 2; i++) {
        if ((formulario[i].value == "")) {
            alert("Preencha o campo " + formulario[i].name);
            formulario[i].focus();
            return false;
        }
    }
    if (quantidade <= 0) {
        alert('A quantidade de páginas não pode ser igual ou inferior a 0');
        form.quantidade.focus();
        return false;
    }
    if (preco <= 0) {
        alert('O preço do livro não pode ser igual ou infeiror a 0');
        form.preco.focus();
        return false;
    }
    formulario.submit();
}

