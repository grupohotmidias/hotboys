<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$menu_audicoes = 'includes/estrutura/topo/audicoes/menu-audicoes.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	//variavel das noticias - audicoes hot 3
	$noticias = 'includes/paginas/noticias.php';
	
	//Variavel da class paginação
	$class = '../includes/PaginacaoConteudoClass.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//requer arquivo class paginação
	require_once($class);
	
?>

<?php
	//destaque noticias = consulta ao banco de dados das audicoes hot 3
	$query_destaque = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1";
	$consulta_destaque = mysql_query($query_destaque);
	$dados_destaque = mysql_fetch_array($consulta_destaque);
	
	//slider noticias = consulta ao banco de dados das audicoes hot 3
	$query_slider = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1,2";
	$dados_slider = mysql_query($query_slider);
	
	//noticia mobile = consulta ao banco de dados das audicoes hot 3
	$counter_noticias = 1;
	$query_noticia_mobile = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 4";
	$dados_noticia_mobile = mysql_query($query_noticia_mobile);
	
	//noticia lista = consulta ao banco de dados das audicoes hot 3
	$query_lista = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC";
	$dados_lista = mysql_query($query_lista);
?>

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
		<title>Audições HOT - Site Hotboys</title>
	</head>
	<body class="audicoes noticias" id="page-top">
		
		<!-- MENU -->
		<header class="menu audicoes">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- SECTION - Bustos das Audicoes  -->
		<section class="audicoes-bustos mb-0">
			<div class="container">
				<div class="row">
					<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
				</div>
			</div>
		</section>
		
		<!-- Menu audicoes hot 3 -->
		<?php include_once ($menu_audicoes); ?>
		
		<!-- videos das audicoes -->
		<section class="cenas audicoes pt-2">
			
			<!-- Noticias -->
			<div class="conteudoNoticas">
				<div class="container">
					<!-- Titulo Noticias -->
					<div class="row">
						<div class="col-lg-12 mx-auto p-0">
							<h5 style="float:left">Notícias</h5>
							<a href="<?php echo URL ?>noticias-audicoes/" class="more">Listar Todas</a>
						</div>
					</div>
					
					<div class="row">
						<!-- SECTION - Noticias  -->
						<section class="noticias vitrine mb-0">
							
							<div class="container-fluid">
								
								<!-- Noticias Desktop -->
								<div class="row">
									
									<!-- Noticias DESKTOP -->
									<div id="demo" class="carousel slide" data-ride="carousel">
										
										<!-- Imagens -->
										<div class="carousel-inner">
											
											<!-- ## NOTICIAS Ativa ## -->
											<div class="hero-area carousel-item active">
												<!-- Hero Post Slides -->
												<div class="hero-post-slides owl-carousel">
													
													<!-- noticias -->
													<div class="single-slide">
														<div class="container-fluid">
															<div class="row">
																
																<!-- destaque -->
																<div class="col-12 col-md-6 p-0">
																	<div class="single-blog-post style-1">
																		<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_destaque[id].'/'.URL_amigavel($dados_destaque['titulo'])) ?>">
																			
																			<!-- Imagem da vitrine -->
																			<div class="blog-thumbnail">
																				<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_destaque['imagem_destaque'] ?>" alt="">
																				<div class="vitrine-titulo">
																					<!-- Titulo da vitrine -->
																					<h5 class="titulo m-0 p-0"><?php echo utf8_encode($dados_destaque[titulo_curto]) ?></h5>
																					<!-- Subitulo da noticia slider -->
																					<h5 class="subtitulo m-0"><?php echo utf8_encode($dados_destaque[subtitulo]) ?></h5>
																				</div>
																			</div>
																			
																			
																		</a>
																	</div>
																</div>
																
																<!-- sliders -->
																<div class="col-12 col-md-6 single-vitrine p-0">
																	<?php while($exibe_slider = mysql_fetch_array($dados_slider)){ ?>
																		
																		<div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
																			
																			<?php if($vip){ ?>
																				<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
																					<?php }else{ ?>
																					<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
																					<?php } ?>
																					
																					<!-- Imagem da noticia slider -->
																					<div class="blog-thumbnail">
																						<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_slider['imagem_slider'] ?>" alt="">
																						
																						<div class="vitrine-titulo">
																							<!-- Titulo da noticia slider -->
																							<h5 class="titulo m-0 p-0"><?php echo utf8_encode($exibe_slider[titulo_curto]) ?></h5>
																							<!-- Subitulo da noticia slider -->
																							<h5 class="subtitulo m-0"><?php echo utf8_encode($exibe_slider[subtitulo]) ?></h5>
																						</div>
																					</div>
																					
																				</a>
																			</div>
																			
																		<?php } ?>
																	</div>
																</div>
															</div>
														</div>
														
													</div>
												</div>
												
											</div>
											
										</div>
										
										
										<!-- Lista de noticias -->
										<?php while($exibe_lista = mysql_fetch_array($dados_lista)){  ?>
											
											<!-- Lista de noticias -->
											<div class="row noticiasLista ml-0 mr-0">
												
												<!-- titulo da noticia-->
												<?php if($vip){ ?>
													<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" class="mobile">
														<?php }else{ ?>
														<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" class="mobile">
														<?php } ?>
														<h5><?php echo utf8_encode($exibe_lista[titulo]) ?></h5>
													</a>
													
													<!-- imagem da lista -->
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 imagemLista">
														<?php if($vip){ ?>
															<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>">
																<?php }else{ ?>
																<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>">
																<?php } ?>
																<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista['imagem_lista'] ?>" style="width:100%">
															</a>
														</div>
														
														<!-- conteudo da lista -->
														<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 conteudoLista desktop">
															
															<!-- titulo da noticia-->
															<?php if($vip){ ?>
																<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" class="desktop">
																	<?php }else{ ?>
																	<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" class="desktop">
																	<?php } ?>
																	<h5><?php echo utf8_encode($exibe_lista[titulo]) ?></h5>
																</a>
																
																<!-- texto da noticia-->
																<?php if($vip){ ?>
																	<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista['texto'], 0, 500))); ?>...</p>
																	<?php }else{?>
																	<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista['texto'], 0, 150))); ?>...</p>
																<?php } ?>
																
																<?php if($vip){ ?>
																	<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" role="button" class="btn btn-primary btn-sm mt-3">
																		<?php }else{ ?>
																		<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" role="button" class="btn btn-primary btn-sm mt-3">
																		<?php } ?>LEIA MAIS<i class="fas fa-chevron-right" style="margin-left: 10px"></i></a>
																</div>
															</div>
														<?php } ?>
														
													</div>
												</div>
											</section>																	
										</div>
									</div>
								</div>
							</section>
							
							<!-- FOOTER -->
							<footer class="footer">
								<!-- Footer DESKTOP-->
								<?php include_once($footer_desktop); ?>
								
								<!-- Footer MOBILE -->
								<?php include_once($footer_mobile); ?>
							</footer>
							
							<!-- Javascripts -->
							<?php include_once($javascript); ?>	
						</body>
					</html>									