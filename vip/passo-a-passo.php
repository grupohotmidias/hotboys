<?php
	require('../config/configuracoes.php');
	require_once('../includes/funcoes.php');
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<title>Tutorial Apagando Cookies - Vídeo HOTBOYS </title>
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
        
		<meta name="description" CONTENT="<?=strip_tags($description);?>">
		
		<!-- HEAD (Include) -->
		<?php include ('../includes/head.php')?>
		
		
	</head>
	
	
	
	<body id="body" class="fundo-preto">
		<!-- TOP (Include) -->
		<?php include ('../../includes/top.php')?>
		
		
		
		<div class="container-tudo">

			<!-- Título H1 da pagina -->
			<h1 class="modelos-titulo">Tutorial Apagando Cookies</h1>
			<div class="container container-table">
				<div class="col-md-9">
					<div class="text-justify col-md-12 contato_modelo-texto">
						<p class="paragrafos">Caso de em sua tela apareça qualquer erro referênte <span class="tutorial_texto_destaque">Excesso de Redirecionamento</span> ou <span class="tutorial_texto_destaque">Limpeza de Cookies</span>, siga as instuçoes abaixo:</p>
					</div>
					
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 10px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon-ok-circle" style="margin-right:10px"></span> Passo 1</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Clique no botão <span class="tutorial_texto_destaque">>Menu</span> de seu navegador.</p>
						<span class="tutorial_cookies"><img src="http://www.hotboys.com.br/_m/images/tutoriais/tuto_limp_cache_0.png" alt="passo 01"></span>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 50px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon-ok-circle" style="margin-right:10px"></span> Passo 2</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Logo em seguida clique em <span class="tutorial_texto_destaque">>Configurações</span>.</p>
						<span class="tutorial_cookies"><img src="http://www.hotboys.com.br/_m/images/tutoriais/tuto_limp_cache_1.png"  alt="passo 02"></span>
					</div>
				
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 50px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon glyphicon-ok-circle" style="margin-right:10px"></span> Passo 3</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Nesse momento clique em <span class="tutorial_texto_destaque">>Privacidades</span></p>
						<span class="tutorial_cookies"><img src="http://www.hotboys.com.br/_m/images/tutoriais/tuto_limp_cache_2.png" alt="passo 03"></span>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 50px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon glyphicon-ok-circle" style="margin-right:10px"></span> Passo 4</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Agora clique em <span class="tutorial_texto_destaque">>Limpar Dados de Navegação.</span></p>
						<span class="tutorial_cookies"><img src="http://www.hotboys.com.br/_m/images/tutoriais/tuto_limp_cache_3.png" alt="passo 04"></span>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 50px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon-ok-circle" style="margin-right:10px"></span> Passo 5</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Certifique-se que a opção <span class="tutorial_texto_destaque">>Cookies e Dados do Site</span> esteja selecionada, Em seguida clique em <span class="tutorial_texto_destaque">Limpar Dados.</span></p>
						<span class="tutorial_cookies"><img src="http://www.hotboys.com.br/_m/images/tutoriais/tuto_limp_cache_4.png" alt="passo 05"></span>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-top: 50px;margin-bottom:30px">
						<h2 class="termo-de-uso" style="margin-bottom:0!important"><span class="pull-left showopacity glyphicon glyphicon-ok" style="margin-right:10px"></span> PRONTO</h2>
						<p class="conteudo-termo-de-uso" style="margin-bottom:15px;text-align:initial!important">Se você seguiu todos os passos corretamente, já poderá acessar a área VIP Normalmente.</p>
					</div>
				</div>
				
				
			</div>
			
			
		</div><!-- Fim do container-tudo --> 
		
		
		<!-- FOOTER (Include) -->
		<?php include ('../includes/footer.php')?>
		
		<!-- JAVASCRIPTS PADROES (Include) -->					
		<?php include ('../includes/javascript.php');?>	
		
		<?php 
			// acrescenta +1 na visita.
			$query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
		?>			
		
		<!-- jQuery versao 3.2.1 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Javascript versao Fancybox 3.2.1 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
		
		
		<?php
			require('includes/hotmidias/js.php');
		?>
		
	</body>
	</html>
		