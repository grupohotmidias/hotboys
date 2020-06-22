<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos na estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$menu_audicoes = 'includes/estrutura/topo/audicoes/menu-audicoes.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
?>
<?php 
	
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
	
	//noticia lista = consulta ao banco de dados das audicoes hot 3
	$query_mais_noticias = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' AND id != $id ORDER BY RAND() LIMIT 3";
	$dados_mais_noticias = mysql_query($query_mais_noticias);
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
	<body class="audicoes noticias noticia" id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<?php include_once ($menu_topo); ?>
		</header>
		
		<!-- SECTION - Bustos das Audicoes  -->
		<section class="audicoes-bustos mb-0">
			<div class="container">
				<div class="row">
					<a href="<?php echo URL ?>audicoes/">
						<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png">
					</a>
				</div>
			</div>
		</section>
		
		<!-- Menu audicoes hot 3 -->
		<?php include_once ($menu_audicoes); ?>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
			
			<!-- CONTEUDO -->
			<!-- videos com paginacao -->
			<section class="noticiaAudicoes m-0 pt-2">
				
				<!-- Breadcrumb -->
				<div class="container-fluid bread">
					<nav aria-label="breadcrumb">
						<div class="container">
							
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo URL ?>">Hotboys</a></li>
								<li class="breadcrumb-item"><a href="<?php echo URL ?>audicoes/noticias/">Notícias Audições</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo utf8_encode(substr($dados_noticia[titulo], 0, 40))?>...</li>
							</ol>
							
							<!-- titulo -->
							<div class="tituloMobile">
								<h1><?php echo utf8_encode($dados_noticia[titulo]) ?></h1>
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
							<h5><?php echo utf8_encode($dados_noticia['titulo']) ?></h5>
							
							<!-- Subtitulo da pagina -->
							<p class="subtitulo"><?php echo utf8_encode($dados_noticia['subtitulo']) ?></p>
							
							<!-- imagem da pagina -->
							<div class="imagemNoticia">
								<img class="alignnone wp-image-79 size-full" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_noticia[imagem_noticia] ?>" alt="Ator">
							</div>
							
							<!-- Textos da pagina -->
							<?= ($vip == true) ? $dados_noticia[texto]  : $dados_noticia[texto_naovip] ?>
							
						</div>
						
						<!-- ## Lado direito do conteudo ## -->
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 rightMais">
							
							
							<div class="maisNoticias">
								
								<!-- Titulo da pagina -->
								<h4>Mais Notícias</h4>
								
								<!-- mais noticias -->
								<ul style="list-style-type: none;">
									<?php while($exibe_mais_noticias = mysql_fetch_array($dados_mais_noticias)){  ?>
										<li class="alta">
											<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_mais_noticias[id].'/'.URL_amigavel($exibe_mais_noticias[titulo])) ?>">
												<div class="thumb">
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_mais_noticias[imagem_lista]?>" alt="" title="" style="width: 100%"/>
												</div>
												<div class="titulo"><?php echo utf8_encode($exibe_mais_noticias[titulo]) ?></div>
											</a>
										</li>
									<?php } ?>
									
								</ul>
								<!-- fim - mais noticias -->
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