<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
		
	// chama o menu audicoes
	$menu_audicoes ='../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	$naoVerificarPagamento = true;
	
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

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Audições HOT - Site Hotboys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip audicoes">
		
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			<!-- Nav/menu fixa do topo-->
			<?php include ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							
							<!-- SECTION - Bustos das Audicoes  -->
							<section class="audicoes-bustos mt-3">
								<div class="container">
									<div class="row">
										<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
									</div>
								</div>
							</section>
							
							<!-- Menu audicoes hot 3 -->
							<?php include_once ($menu_audicoes); ?>
							
							<!-- Titulo - Notícias -->
							<div class="app-page-title mt-1">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5>Notícias - Audições Hot 3</h5>
									</div>
								</div>
							</div>   
							
							<!-- Noticias  -->
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
																				<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_destaque[id].'/'.URL_amigavel($dados_destaque['titulo'])) ?>">
																					
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
															
															<!-- Footer -->
															<?php include_once ($footer); ?>
															
														</div>
													</section>
												</div>
												
											</div>
										</div>
										
										
										
									</div>
									<!-- ## FIM Conteudo da pagina ## -->
								</div>
								<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
								
								<!-- Javascript tooltips do formulario -->
								<script>$(function(){ $('[data-toggle="cenaFavorita"]').tooltip()})</script>
								
								<!-- ##Botão Whatsapp no Rodape## -->
								<!-- Icone do whatsapp
									<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
									<!-- Icone do whatsapp
									<i style="margin-top:16px" class="fab fa-whatsapp"></i>
									<p>Atendimento</p>
									</a>
								-->
								
								<!--  Chama Modal - Modal Contato -->
								<?php include_once ($contato); ?>
								
								<!--  Chama Modal - Modal Duvidas Frequentes -->
								<?php include_once ($duvidas_frequentes); ?>
								
								<!--  Chama Modal - Modal Termos de Uso -->
								<?php include_once ($termos); ?>
								
								<?php
			require('includes/hotmidias/js.php');
		?>
								
							</body>
						</html>																																																																															