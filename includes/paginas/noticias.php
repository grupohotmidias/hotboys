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
	
	<div class="container-fluid desktop d-none d-md-block">
		
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
													</div>
													
													<div class="vitrine-titulo">
														<!-- Titulo da vitrine -->
														<h5 class="titulo"><?php echo utf8_encode($dados_destaque[titulo_curto]) ?></h5>
														<!-- Subitulo da noticia slider -->
														<h5 class="subtitulo"><?php echo utf8_encode($dados_destaque[subtitulo]) ?></h5>
													</div>
												</a>
											</div>
										</div>
										
										<!-- sliders -->
										<div class="col-12 col-md-6 single-vitrine">
											
											<?php while($exibe_slider = mysql_fetch_array($dados_slider)){ ?>
												
												<div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
													
													<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
														
														<!-- Imagem da noticia slider -->
														<div class="blog-thumbnail">
															<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_slider['imagem_slider'] ?>" alt="">
														</div>
														
														<div class="vitrine-titulo">
															<!-- Titulo da noticia slider -->
															<h5 class="titulo"><?php echo utf8_encode($exibe_slider[titulo_curto]) ?></h5>
															<!-- Subitulo da noticia slider -->
															<h5 class="subtitulo"><?php echo utf8_encode($exibe_slider[subtitulo]) ?></h5>
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
			
		</div>
		
		<!-- Lista de noticias Desktop -->
		<?php while($exibe_lista = mysql_fetch_array($dados_lista)){  ?>
			
			<!-- Lista de noticias -->
			<div class="row noticiasLista">
				<!-- imagem da lista -->
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 imagemLista">
					<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista['imagem_lista'] ?>" style="width:100%">
				</div>
				
				<!-- conteudo da lista -->
				<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 conteudoLista desktop">
					
					<!-- titulo da noticia-->
					<h5><?php echo utf8_encode($exibe_lista[titulo]) ?></h5>
					
					<!-- texto da noticia-->
					<?php if($vip){ ?>
					<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista['texto'], 0, 500))); ?>...</p>
					<?php }else{?>
					<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista['texto'], 0, 200))); ?>...</p>
					<?php } ?>
					
					<a href="<?php echo URL_VIP ?>cenas-audicoes-novo" role="button" class="btn btn-primary btn-sm mt-3">LEIA MAIS<i class="fas fa-chevron-right" style="margin-left: 10px"></i></a>
				</div>
			</div>
		<?php } ?>
	</div>
	
	<div class="container-fluid mobile d-block d-sm-block d-md-none">
		<!-- Noticias Mobile -->
		<div class="row">
			<div id="indicadoresNoticias" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php while($noticias_mobile = mysql_fetch_array($dados_noticia_mobile)){ ?>
						<div class="carousel-item <?php if($counter_noticias <= 1){echo " active"; } ?>">
							<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$noticias_mobile[id].'/'.URL_amigavel($noticias_mobile['titulo'])) ?>">
								<img class="d-block w-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $noticias_mobile['imagem_slider'] ?>" alt="First slide">
							</a>
							<div style="background:#ded9d9;width: 100%;float: left;"><p style="margin-left:1rem;margin-bottom: 0;overflow: hidden;text-overflow:ellipsis;white-space:nowrap;padding:5px 0"><?php echo utf8_encode($noticias_mobile['titulo']) ?></p></div>
						</div>
						
					<?php $counter_noticias++; } ?>
					
					<a class="carousel-control-prev" href="#indicadoresNoticias" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#indicadoresNoticias" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
				<ol class="carousel-indicators">
					<li data-target="#indicadoresNoticias" data-slide-to="0" class="active"></li>
					<li data-target="#indicadoresNoticiasors" data-slide-to="1"></li>
					<li data-target="#indicadoresNoticias" data-slide-to="2"></li>
					<li data-target="#indicadoresNoticias" data-slide-to="3"></li>
				</ol>
			</div>
		</div>
		
		<!-- Lista de noticias Desktop -->
		<?php while($exibe_lista = mysql_fetch_array($dados_lista)){  ?>
			
			<!-- Lista de noticias -->
			<div class="row noticiasLista">
				
				<!-- imagem da lista -->
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 imagemLista">
					<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista[imagem_lista] ?>" style="width:100%">
				</div>
				
				<!-- conteudo da lista -->
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 conteudoLista">
					<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista['titulo'])) ?>">
						<?php echo utf8_encode($exibe_lista[categoria_noticia]) ?>
					</a>
				</div>
				
			</div>
			
		<?php } ?>
		
	</div>	
</section>