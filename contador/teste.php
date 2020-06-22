<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>

<script language='Javascript'>
segundos = 7;
function contagem_tempo(){	             
	   
document.contador.segundos.value = segundos; 
segundos = segundos - 1;

if (segundos == -1) {
segundos = 0;
}   
               
timerID = setTimeout("contagem_tempo()",1000);   
}     
</script>

<form name="contador">
<input name="segundos" type="text" />
</form>
</body>
</html>