<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos na estrutura da pagina
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

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Hotboys</title>
		
	</head>
	<body id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<?php include_once ($menu_topo); ?>
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
							<li class="breadcrumb-item">Trabalhe Conosco</li>
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
					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 leftAtor">
						
						<!-- Titulo da pagina -->
						<h4>Quer Fazer Parte da Equipe HOTBOYS?</h4>
						
						<!-- Subtitulo da pagina -->
						<p>Saiba como se tornar um ator pornô</p>
						
						<!-- imagem da pagina -->
						<div class="imagemAtor">
							<img class="alignnone wp-image-79 size-full" src="<?php echo URL ?>novo-projeto/assets/img/demos/seja-um-ator.jpg" alt="Ator">
						</div>
						
						<!-- Textos da pagina -->
						<p>Além dos nosso modelos HOT, temos uma galera que trabalha bastante para levar até vocês o melhor conteúdo que o HOTBOYS pode oferecer. E através deste formulário que está ali embaixo, você pode fazer parte desta equipe!</p>
						<p>O HOTBOYS é uma produtora que está há anos como líder dentro de seu mercado. Para que isso aconteça, contamos com o trabalho de diversos profissionais: cinegrafistas, fotógrafos, programadores, designers, maquiadores, costureiros, cenógrafos e muito mais.</p>
						<p>Se você se identifica com o trabalho que o HOTBOYS faz, se você é totalmente livre de preconceitos e tem qualificação para ocupar um cargo aqui na nossa empresa, não perca tempo! <strong>Entre em contato</strong> conosco enviando as informações abaixo:</p>
						<ul>
							<li>Nome</li>
							<li>Link de Redes Sociais (Facebook, Instagram, Twitter, etc…)</li>
							<li>Cidade</li>
							<li>Celular</li>
							<li>05 Fotos com boa qualidade</li>
						</ul>
						<p><strong> Envie as informações ou seu currículo para o e-mail:</strong><br>
						trabalhe_conosco@hotmidias.com.br</p>
						<p>Mas atenção, o centro de operações do HOTBOYS fica no Rio de Janeiro/RJ , então, caso você seja de outra cidade, é necessário que você tenha disponibilidade para se manter e morar na cidade maravilhosa.</p>
						<p>Esperamos trabalhar com você em breve. Boa sorte!</p>
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