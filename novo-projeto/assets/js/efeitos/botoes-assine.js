function planoSelecionado(elem) {
    var a = document.getElementsByClassName('plano')
    for (i = 0; i < a.length; i++) {
        a[i].classList.remove('selected')
    }
    elem.classList.add('selected');
}