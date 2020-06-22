//quando clicado, mostra o botao de participante selecionado
function show() {
	document.getElementById("selecionado2").style.visibility= "visible" ;
	document.getElementById("selecionado5").style.visibility= "hidden";
	document.getElementById("selecionado8").style.visibility= "hidden";
	document.getElementById('foto1').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto4').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto7').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}
function show3() {
	document.getElementById("selecionado5").style.visibility= "visible";
	document.getElementById("selecionado2").style.visibility= "hidden";
	document.getElementById("selecionado8").style.visibility= "hidden";
	document.getElementById('foto4').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto1').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto7').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}
function show6() {
	document.getElementById("selecionado8").style.visibility= "visible";
	document.getElementById("selecionado5").style.visibility= "hidden";
	document.getElementById("selecionado2").style.visibility= "hidden";
	document.getElementById('foto7').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto1').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto4').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}

function show9() {
	document.getElementById("selecionado11").style.visibility= "visible";
	document.getElementById("selecionado14").style.visibility= "hidden";
	document.getElementById("selecionado17").style.visibility= "hidden";
	document.getElementById('foto10').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto13').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto16').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}
function show12() {
	document.getElementById("selecionado14").style.visibility= "visible";
	document.getElementById("selecionado11").style.visibility= "hidden";
	document.getElementById("selecionado17").style.visibility= "hidden";
	document.getElementById('foto13').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto10').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto16').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}
function show15() {
	document.getElementById("selecionado17").style.visibility= "visible";
	document.getElementById("selecionado11").style.visibility= "hidden";
	document.getElementById("selecionado14").style.visibility= "hidden";
	document.getElementById('foto16').style.cssText = '-webkit-filter: grayscale(100%);filter: grayscale(100%)';
	document.getElementById('foto10').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
	document.getElementById('foto13').style.cssText = '-webkit-filter: grayscale(0%);filter: grayscale(0%)';
}