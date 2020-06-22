var blinkTab = function(message) {
	var oldTitle = document.title, /* salva o título original */
	timeoutId,
	blink = function() { document.title = document.title == message ? '⚠' : message; },  /* função para a guia do navegador BLINK */
	clear = function() { /* função para definir o título de volta ao original */
		clearInterval(timeoutId);
		document.title = oldTitle;
		window.onmousemove = null;
		timeoutId = null;
	};
	if (!timeoutId) {
		timeoutId = setInterval(blink, 1000);
		window.onmousemove = clear;   /* para de mudar o título ao mover o mouse */
	}
	

};
blinkTab("⚠ ASSINE - Hotboys");