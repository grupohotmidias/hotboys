<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	
	$url_link = explode("-",$url_link);
	$url_link = implode("-",$url_link);
	
	// tras id
	$id = addslashes($_GET[id]);
	
	//REGISTRA AÇÃO EDITAR NO HISTOCIO  
	$query_data = "SELECT * FROM `historico_server`";
	$consulta_data = mysql_query($query_data);
	$dados_data = mysql_fetch_array($consulta_data);
	
	$counter = 1;
	
	
	//consulta no banco de dados
	$query_noticia = "SELECT * FROM `audicoes_noticias` WHERE id=$id LIMIT 1";
	$consulta_noticia = mysql_query($query_noticia);
	$dados_noticia = mysql_fetch_array($consulta_noticia);

?>								

<!DOCTYPE html>
<html lang="pt-BR">
	<html class="no-js">
		<head>
			
			<!-- Titulo que aparece no Navegador -->
			<title>🌶 Audições HOT 3 - Site HOTBOYS</title>
			
			<!-- Meta Tags -->
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
			<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
			<meta name="description" CONTENT="Noticias das audiçoes Hot3 ">
			
			<!-- Animate CSS - Animacao do novo css3 -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
			
			<!-- CSS Principal - Cabecograma -->
			<link rel="stylesheet" href="<?php echo URL ?>css/cabecograma-hotboys.css?v=<?php echo Version; ?>">
			
			<!-- Efeito hover no cabecograma -->
			<link rel="stylesheet" href="<?php echo URL ?>css/hover.css?v=<?php echo Version; ?>">
			
			<!-- CSS da pagina -->
			<link rel="stylesheet" href="<?php echo URL ?>css/audicoes.css?v=<?php echo Version; ?>">
			
			<!-- CSS da fonte da noticia -->
			<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
			
			
			<!-- HEAD (Include) -->
			<?php include('includes/head.php') ?>
			
			
		</head>
		<body id="body" class="fundo-preto blog-audicoes">
			
			
			<!-- INICIO - Conteudo Mae de todas as divs -->
			<div class="container">
				
				
				<!-- Topo (Include) -->
				<div class="row" style="float:left;width:100%">
					<?php include('includes/top.php') ?>
				</div>
				
				
				
				
				<div class="row noticias_audicoes">
					
					<div class="row" style="width:100%;float:left">
						
						<!-- Cabecograma dos participantes (Include) -->
						<?php include('includes/cabecograma.php'); ?>
						
						</div>
						
						
						<!-- Menu Audições -->
						<?php include('menu-audicoes.php') ?>
						
			
					
						

						
						<div class="col-lg-12 col-md-12 col-xs-12 noticia">
							<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left pagina-noticia texto-pagina-contato_trabalhe">
								
								
								<!-- Titulo -->
								<div class="titulo" style="width:100%;float:left;">
								<h1><?php echo utf8_encode($dados_noticia['titulo']) ?></h1>
								</div>
								
								<!-- Subtitulo -->
								<div class="subtitulo">
									<h2>
										<?php echo utf8_encode($dados_noticia['subtitulo']) ?>
										</h2>
									</div>
									
									<!-- Imagem -->
									<div class="imagem_noticias">
										<img  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_noticia[imagem_noticia] ?>" style="width:99%">
										<span><?php echo utf8_encode($dados_noticia[descricao_imagem_principal]) ?></span>
									</div>
								<div class="texto"><?= ($vip == true) ? $dados_noticia[texto]  : $dados_noticia[texto_naovip] ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Comentarios -->
			<?php include('includes/comentarios.php'); ?>
			
			<!-- FOOTER (Include) -->
			<?php include('includes/footer.php'); ?>
			
			
			<!-- JAVASCRIPTS PADROES (Include) -->					
			<?php 
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}
			?>
			
			
			<!-- Formatos de informacoes do formulario -->
			<script src="js/jquery.inputmask.min.js"></script>
			<script type="text/javascript" charset="utf-8">
				jQuery(function($) {
					$.mask.definitions['~']='[+-]';
					$('#date').mask('99/99/9999');
					$('#telefone').mask('(99) 9999-9999?9');
					$('#whatsapp').mask('(99) 99999-999?9');
					
				});
			</script>
			
				<!-- JQuery - Cabecograma Audicoes hot3 -->
				<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>
				
				<!-- Javascript do Cabecograma-->
				<script src="<?php echo URL ?>js/cabecograma.js?v=<?php echo Version; ?>"></script>
		</body>
	</html>