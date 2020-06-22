<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Seja um Modelo - Site HotBoys</title>
	</head>
	<body id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
		
		<!-- CONTEUDO -->
		<!-- videos com paginacao -->
		<section class="cenas contatoModelo">
			
			<!-- Breadcrumb -->
			<div class="container-fluid bread">
				<nav aria-label="breadcrumb">
					<div class="container">
						
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo URL ?>">Hotboys</a></li>
							<li class="breadcrumb-item">Seja um Ator</li>
						</ol>
						
						<!-- titulo -->
						<div class="tituloMobile">
							<h1><?php echo utf8_encode($dados_conteudo[titulo]) ?></h1>
						</div>
						
					</div>
				</nav>
			</div>
			
			<!-- Conteudo da pagina -->
			<div class="container">
				<div class="row">
					
					<!-- ## Lado esquerdo do conteudo ## -->
					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 leftAtor p-0">
						
						<!-- Titulo da pagina -->
						<h4>Seja um Ator</h4>
						
						<!-- Subtitulo da pagina -->
						<p>Saiba como se tornar um ator pornô</p>
						
						<!-- imagem da pagina -->
						<div class="imagemAtor">
							<img class="alignnone wp-image-79 size-full" src="<?php echo URL ?>novo-projeto/assets/img/demos/seja-um-ator.jpg" alt="Ator">
						</div>
						
						<!-- Textos da pagina -->
						<p><strong>Estamos contratando!</strong></p>
						<p>A produtora HotBoys está a procura de lindos e gostosos homens que queiram ser estrelas de sucesso na indústria pornô gay. Se você gosta de sexo e tem vontade de se tornar um porn star, <strong>entre em contato</strong> conosco enviando as informações abaixo:</p>
						<ul>
							<li>Nome</li>
							<li>Link de Redes Sociais (Facebook, Instagram, Twitter, etc…)</li>
							<li>Cidade</li>
							<li>Celular</li>
							<li>05 Fotos com boa qualidade</li>
						</ul>
						<p><strong> Envie as informações e fotos para o e-mail:</strong><br>
						contato@hotmidias.com.br</p>
						<p>Interessados em se tornar <strong>ator pornô</strong> também serão avaliados. Contudo deverão <strong>morar no Rio de Janeiro</strong>. E, no caso, devem enviar fotos de corpo todo, com rosto e dote ereto a mostra.</p>
						<!-- FIM Textos da pagina -->
						
					</div>
					
					<!-- ## Lado direito do conteudo ## -->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 rightAtor">
						<div class="redeSocial">
							
							HotBoys nas
							<h3>REDES SOCIAIS</h3>
							
							<!-- Facebook -->
							<a class="btn btn-outline-light btn-social" href="https://www.facebook.com/sitehotboys">
								<i class="fab fa-fw fa-facebook-f"></i>
							</a>
							
							<!-- Twitter -->
							<a class="btn btn-outline-light btn-social" href="https://twitter.com/hotboys" target="_blank">
								<i class="fab fa-fw fa-twitter"></i>
							</a>
							
							<!-- Instagram -->
							<a class="btn btn-outline-light btn-social" href="https://www.instagram.com/hotboys.oficial/" target="_blank">
								<i class="fab fa-fw fa-instagram"></i>
							</a>
							
						</div>
					</div>
					
				</div>
			</div>
		</section>
		</div>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include_once ($javascript); ?>
		
		<!-- Javascripts do Lightbox - Clique nas Fotos da Cena -->
		<script type="text/javascript" src="<?php echo URL ?>novo-projeto/assets/js/lightbox/simple-lightbox.js"></script>
		<script>
			$(function(){
				var $gallery = $('.gallery a').simpleLightbox();
			});
		</script>
		
	</body>
</html>	