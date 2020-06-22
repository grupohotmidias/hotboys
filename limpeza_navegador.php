<?php
	require('config/configuracoes.php');
	require_once('includes/funcoes.php');
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<title>Tutorial Apagando Cookies - Vídeo HOTBOYS </title>
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
        
		<meta name="description" CONTENT="<?=strip_tags($description);?>">
		
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php')?>
		
		
		<!-- optimize mobile versions -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	
	
	
	<body id="body" class="fundo-preto">
		<!-- TOP (Include) -->
		<?php include ('includes/top2.php')?>
		
		
		
		<div class="container-tudo">
		<div class="col-lg-12 col-xs-12" style="height: 100%;min-height: 100%;display: -webkit-flex;display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;background-color: white;padding-top: 30px;">
			<img src="imagens/tutoriais/limpeza-navegador.jpg"/>
			</div>
		</div><!-- Fim do container-tudo --> 
		
		
		<!-- FOOTER (Include) -->
		<?php include ('includes/footer.php')?>
		
		<!-- JAVASCRIPTS PADROES (Include) -->					
		<?php 
			if ($detect->isMobile()) { 
				include ('includes/javascript-mobile.php'); 
				}else{
				include ('includes/javascript.php'); 
			}
		?>	
		
		<?php 
			// acrescenta +1 na visita.
			$query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
		?>			
		
		<!-- jQuery versao 3.2.1 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Javascript versao Fancybox 3.2.1 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
		
		
	</body>
</html>
