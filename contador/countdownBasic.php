<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title>jQuery Countdown</title>

<link rel="stylesheet" href="jquery.countdown.css">

<style type="text/css">

*{ margin:0px; padding:opx; border:0px;}

#defaultCountdown { width: 240px; height: 50px; border: dot-dot-dash }

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="jquery.plugin.js"></script>

<script src="jquery.countdown.js"></script>

<script src="jquery.countdown-pt-BR.js"></script>

<script>

$(function () {

	var austDay = new Date(2015, 12-1, 4);

	

	$('#defaultCountdown').countdown({until: austDay});

	$('#year').text(austDay.getFullYear());

	

});

</script>



</head>



<body>

<center>

<img src="banne_blackfriday.jpg" alt="Plano R$1,00" width="960" height="359" title="Promoção Fim de Ano "  />

<div id="defaultCountdown"></div>



</center>

<!-- Abre janela -->

<script language="JavaScript" type="text/javascript"> 

	function abre_janela(width, height, nome, scrollbars) {

		var top; var left;

		top = ( (screen.height/2) - (height/2) )

		left = ( (screen.width/2) - (width/2) )

		window.open('',nome,'width='+width+',height='+height+',scrollbars='+scrollbars+',toolbar=no,location=no,status=no,menubar=no,resizable=no,left='+left+',top='+top);

	}

</script>

</body>