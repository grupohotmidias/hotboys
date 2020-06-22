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
	$query_lista = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC LIMIT 3";
	$dados_lista = mysql_query($query_lista);
?>

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
											<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista['texto'], 0, 150))); ?>...</p>
										
										<?php if($vip){ ?>
											<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" role="button" class="btn btn-primary btn-sm mt-3">
												<?php }else{ ?>
												<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>" role="button" class="btn btn-primary btn-sm mt-3">
												<?php } ?>LEIA MAIS<i class="fas fa-chevron-right" style="margin-left: 10px"></i></a>
										</div>
									</div>
								<?php } ?>
								
								<!-- botao ver mais noticias -->
								<?php if($vip){ ?>
								<a class="btn btn-secondary mb-4" href="<?php echo URL_VIP ?>audicoes/noticias/" role="button" style="width:100%">Veja mais notícias</a>
								<?php }else{ ?>
								<a class="btn btn-secondary mb-4" href="<?php echo URL ?>audicoes/noticias/" role="button" style="width:100%">Veja mais notícias</a>
								<?php } ?>
							</div>
						</div>
					</section>																	