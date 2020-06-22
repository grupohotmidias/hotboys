<?php
	session_start();
	
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	//Caso o cookie esteja vazio e seja desktop, carrega a pagina de entrada(+18 anos)
	if ($detect->isMobile()) { 
		
		}else{
		//Cookie que carrega a pagina de entrada = verificacao de idade
		if(@$_COOKIE['verificacao_idade'] != 'sim'){
			
			header('Location: home/');
		} }


		require_once('geoplugin.class.php');

		$geoplugin = new geoPlugin();
	
		$geoplugin->locate();

?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<!-- Titulo no navegador -->
		<title><?php echo TITULO_PRINCIPAL ?></title> 
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta http-equiv="Content-Language" content="pt-br, en">	
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo dos garotos mais gostosos do Brasil">
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php'); ?>
		<style>
			.video-vitrine.modal #fechar {
			background: #000000;
			font-size: 17px;
			float: right;
			}
			@media (min-width:1200px){
			.conteudo-imagens.audicoes{min-height: 270px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{border:3px solid #1f1e1e}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px;}
			}
			@media (min-width:992px) and (max-width:1199px){
			.conteudo-imagens.audicoes{min-height: 170px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{min-height: 221px;border:3px solid #1f1e1e}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (min-width:768px) and (max-width:991px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:767px){
			.home-textos-clientes-assistindo.audicoes{height: 30px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:480px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
		</style>
	</head>
	<body id="body" class="fundo-preto">
	
		<div class="container">
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<!-- TOPO (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top2.php');?>
			</div>
			
			<div class="row" style="float:left;width:100%;margin-top:5px">
				<?php 
					$query_vitrine ="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='Todos' order by data DESC LIMIT 5";
					$consulta_vitrine  = mysql_query($query_vitrine );
				?>
				<div class="home-assineja-imagensing">
					<div class="row float-none" >
						<div class="col-lg-12 col-md-12 banner" style="float:left;width:100%;">
							
							<!-- Bootstrap versao 3.3.7 -->
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							<li data-target="#carousel-example-generic" data-slide-to="4"></li>
						</ol>
								
								<!-- Imagens da vitrine -->
								<div class="carousel-inner" role="listbox">
									
									<!-- VITRINE ADICIONAL TODOS -->
									<?php 
										$counter = 1;
										$query_vitrine_adicional = "SELECT * FROM `vitrine` WHERE status='ativo'  AND exibicao='home_normal' order by  id DESC LIMIT 2";
										$consulta_vitrine_adicional  = mysql_query($query_vitrine_adicional);
										while($dados_vitrine_adicional = mysql_fetch_array($consulta_vitrine_adicional)){ ?>
										
										<?php if($detect->isMobile() AND $dados_vitrine_adicional['imagem_mobile']){ ?>
											<div class="item <?php if($counter <= 1){echo " vitrine"; } ?>">
												<a href="<?php echo $dados_vitrine_adicional['link'] ?>">
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem_mobile'] ?>" alt="imagem vitrine" width="100%">
												</a>
											</div>
											<?php $counter++; }else{ ?>
											<div class="item <?php if($counter <= 1){echo " vitrine"; }?>">
												<a href="<?php echo $dados_vitrine_adicional['link'] ?>">
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem'] ?>" alt="imagem vitrine adicional" width="100%">
												</a>
											</div>
											<?php
												$counter++;
											} }
									?>
									
									
									
									
									<?php 
										$counter = 1;
										while($dados_vitrine = mysql_fetch_array($consulta_vitrine)){ ?>
										<?php if ($detect->isMobile() AND $dados_vitrine['cena_vitrine_mobile']) { ?>
											
											<div class="item <?php if($counter <= 1){echo " active"; } ?>">
												<a href="<?php echo utf8_encode(URL.'cena/'.$dados_vitrine[id].'/'.URL_amigavel($dados_vitrine[titulo])) ?>"> 
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine_mobile'] ?>" alt="imagem vitrine mobile" width="100%">
												</a>
												<div class="carousel-caption">
													<h3> <?php echo $dados_vitrine['titulo']; ?></h3>
												</div>
											</div>
											<?php } else { ?>
											<div class="item <?php if($counter <= 1){echo " active"; } ?>">
												<a href="<?php echo utf8_encode(URL.'cena/'.$dados_vitrine[id].'/'.URL_amigavel($dados_vitrine[titulo])) ?>"> 
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine'] ?>" alt="imagem vitrine" width="100%">
												</a>
												<div class="carousel-caption">
													<h3> <?php echo $dados_vitrine['titulo']; ?></h3>
												</div>
											</div>
											
											<!-- INICIO Modal Video vitrine -->
											<div class="video-vitrine modal fade" id="videoModal<?php echo $dados_vitrine[id]; ?>" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content" style="background:transparent;box-shadow: 0 0 0!important;border: 0!important;">
													    <!-- BOTÃO QUE FECHA MODAL -->
														<div class="modal-header" style="padding: 0!important; border-bottom: 0!important;">
															<a type="button" id="fechar" class="modal-fechar" data-dismiss="modal" href="">&times;</a>
														</div>
														<!-- JANELA MODAL -->
														<div class="modal-body">
															<div class="embed-responsive embed-responsive-16by9" id="iframe-modal">
																<?php echo $dados_vitrine[teaser_code]; ?>
															</div>
														</div>
													</div>
												</div>
											</div>	
											<script>
												$(document).ready(function(){
													//Variaveis locais
													var _seletorLinkAbrir = $(".botao-modal");
													var _seletorLinkFechar = $(".modal-fechar");
													var _containerModal = $(".video-vitrine");
													
													//Abrindo modal
													$(_seletorLinkAbrir).click(function(){
														
													});
													//fechando modal
													$(_seletorLinkFechar).click(function(){
														window.location.href = "https://www.hotboys.com.br";
													});
												});
											</script>
											<!-- FIM do Modal Video vitrine -->
										<?php } ?>
										<?php
											$counter++;
										}
									?>
									
									
									<!-- seta da esquerda - vitrine -->
									<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
									
									<!-- seta da direita - vitrine -->
									<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span></a> 
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div id="push"> </div>
			</div>
			
			<?php /*			<!-- BANNER 00 --> 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='' AND data >= NOW() ORDER BY data LIMIT 1";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile()) { 
							if($total_banners >= 0){ 
							?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php  } }  ?>
				</div>
			</div>	 
			*/ ?>
			<?php /*
					$estado = $geoplugin->region;
					$data_hj = DATE('Y-m-d');
					$sql_festa = "SELECT * FROM `eventos_hot` WHERE status='Ativo' AND tipo='Festa' AND `estado`='$estado'";
					$consulta_festa = mysql_query($sql_festa);
					$total_festa = mysql_num_rows($consulta_festa);
				
					while($dados_festa = mysql_fetch_array($consulta_festa)){
						if(isset($geoplugin->region)&& $geoplugin->region == $dados_festa['estado']){ ?>

				<!-- BANNER 00 --> 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						
						if ($detect->isMobile()) { 
							if($total_festa >= 0){ 
							?>
							<a href="<?php echo $dados_festa['link_evento'].'"'.'target="_self"'; ?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_festa['banner'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_festa >= 0){ ?>
						<?php if($dados_festa['link_evento'] !=''){ ?>
							<a href="<?php echo $dados_festa['link_evento'].'"'.'target="_self"'; ?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_festa['banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php }else{?> <img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_festa['banner'] ?>" alt="imagem banner" width="100%"> <?php }?>
						<?php  } }  ?>
				</div>
			</div>	 
			
    			<?php } ?>
    		<?php }  */?>

			<!-- BANNER 01 --> 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='1' LIMIT 1";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile()) { 
							if($total_banners >= 0){ 
							?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
						<?php  } }  ?>
				</div>
			</div>	
		<?php /*	<!-- NOTICIAS AUDICOES -->
			<div class="row container-tudo espacamento-laterais-3 audicoes" style="width:100%;float:left;margin-top:1rem">
				
				<!-- Título H1 do conteúdo -->
				<div class="row" style="width:100%;float:left">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important;margin-top: 0.8rem!important;">
							<i class="fa fa-couch" style="color:#e31330!important;background-color:#1f1e1e;margin-left: 0.4rem;"></i>
							Últimas notícias - Audições Hot 3
						</h1>
					</div>
				</div>
				<?php
					$query_audicoes = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC LIMIT 3";
					
					$consulta_audicoes  = mysql_query($query_audicoes);
					$total_audicoes = mysql_num_rows($consulta_audicoes);
					
					while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){
					?>
					
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes">
							
							
							<div>
								<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($dados_audicoes['imagem_lista'] != ''){
											echo $dados_audicoes['imagem_lista'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="noticias das audicoes">
								</a>
								<div class="home-textos-clientes-assistindo audicoes">
									<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo]))?>">
										<h4 class="home-titulo-clientes-assistindo" style="text-transform: uppercase;"> 
											<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 35))); ?>...  <span style=" color: #afabab; text-decoration: underline; ">leia Mais</span>
										</h4>
									</a>
								</div>
							</div>
							
						</div>
						<?php } else{ ?>	
						
						
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes">
							
							<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
								<div class="conteudo-imagens audicoes"> 
									<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php if($dados_audicoes['imagem_lista'] != ''){ echo $dados_audicoes['imagem_lista']; }else{ echo '0_cena.jpg'; } ?>" alt="noticias das audicoes">
									
								</div>
							</a>
							<div class="home-textos-clientes-assistindo audicoes">
								<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
									<h4 class="home-titulo-clientes-assistindo" style="text-transform: uppercase;"> 
										<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 38))); ?>...  <span style=" color: #afabab; text-decoration: underline; ">leia Mais</span>
									</h4>
								</a>
							</div>
							
						</div>
					<?php } ?>
				<?php } ?>
				
			</div>
		
			
			<!-- Botão Veja Mais assistindo nesse momento -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
					<h1 class="bt-vejamais"><a href="<?php echo URL ?>audicoes"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
				*/ ?>
			
				<!-- BANNER 02 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						//$counter = 1;
						
						//$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='2'  LIMIT 1 ";
						//$consulta_banners  = mysql_query($query_banners);
						
						//$dados_banners = mysql_fetch_array($consulta_banners);
						//$total_banners = mysql_num_rows($consulta_banners);
						
						//if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							//if($total_banners >= 0){ 
							?>
							<a href="<?php //echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							//} } else {
						?>
						<?php 
							//$counter = 1;
							//if($total_banners >= 0){ ?>
							<a href="<?php //echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php  //} }  ?>
				</div>
			</div>
			-->
			
			
			<!-- Título H1 do conteúdo -->
			<div class="row" style="width:100%;float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						<?php echo HOTVIPS ?>
					</h1>
				</div>
			</div>
			<?php 
				$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT 3";
				$consulta_visitou = mysql_query($query_visitou);
				$total_visitou = mysql_num_rows($consulta_visitou);
				$falta = 6 + $total_visitou;
			?>
			<!-- Conteúdo - Hotvips assistindo agora --> 
			<div class="row container-tudo espacamento-laterais-3" style="width:100%;float:left;display:contents;">
				<?php
					while($row = mysql_fetch_array($consulta_visitou)){
						// traz os dois ultimos ensaios do sexo hot
						$query ="SELECT * FROM `cenas` WHERE id=$row[id_conteudo] AND status='Ativo' LIMIT 1";
						$consulta = mysql_query($query);
						$linha = mysql_fetch_array($consulta);
					?>
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							
							<div>
								<a href="<?php echo utf8_encode(URL.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo])) ?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($linha[cena_home] != ''){
											echo $linha['cena_home'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="imagem clientes assistindo">
								</a>
								
								<div class="home-textos-clientes-assistindo">
									<h4 class="home-titulo-clientes-assistindo"> 
										<?php echo utf8_encode($linha['titulo'])?>
									</h4>
									<div class="cenas-total-icones">
										<!-- 1 - Icone e texto - Visualizacao-->
										
										<!--<div class="cenas-visualizacao">
											 <i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($linha['visualizacao'])?>
											</p>-->
										</div>
										<!-- 2 - Icone e texto - Duracao do video -->
										<?php 
											if($linha['tempo_de_duracao'] != ''){?>
											<div class="cenas-duracao-video">
												<i class="fab fa-youtube"></i>
												<p class="texto">
													<?php echo ($linha['tempo_de_duracao'])?>
												</p>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php } else{ ?>						
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							
							
							
							<a href="<?php echo utf8_encode(URL.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo])) ?>" class="<?php if($linha[video_preview] != '') echo ' item-video '; if($linha[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<div class="conteudo-imagens"> 
									<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php if($linha['cena_home'] != ''){ echo $linha['cena_home']; }else{ echo '0_cena.jpg'; } ?>" alt="imagem clientes assistindo">
									
									<?php
										if($linha[video_preview] != '') {
										?>
										<?php if ($detect->isMobile()) { ?>
											
											<?php }else{ ?>
											<span class="far fa-play-circle fa-5x" style="display:none"></span>
										<?php } ?>
										<video width="100%" style="display:none" playsinline muted loop>
											<source src="https://server2.hotboys.com.br/arquivos/<?php echo $linha[video_preview] ?>" type="video/mp4">
											
										</video>
										
										
										<?php
										}
										
									?>
								</div>
							</a>
							<div class="home-textos-clientes-assistindo">
								<h4 class="home-titulo-clientes-assistindo"> 
									<?php echo utf8_encode($linha['titulo'])?>
								</h4>
								
								
								<div class="cenas-total-icones">
									
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($linha['visualizacao'])?>
										</p>
									</div>
									-->
									
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($linha['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($linha['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
							
						</div>
					<?php } ?>
					
				<?php } ?>
			</div>
				<!-- Título H1 do conteúdo -->
				<div class="row" style="width:100%;float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				</div>
			</div>
			<?php 
				$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT 4, 6";
				$consulta_visitou = mysql_query($query_visitou);
				$total_visitou = mysql_num_rows($consulta_visitou);
				$falta = 6 + $total_visitou;
			?>
			<!-- Conteúdo - Hotvips assistindo agora --> 
			<div class="row container-tudo espacamento-laterais-3" style="width:100%;float:left;display:contents;">
				<?php
					while($row = mysql_fetch_array($consulta_visitou)){
						// traz os dois ultimos ensaios do sexo hot
						$query ="SELECT * FROM `cenas` WHERE id=$row[id_conteudo] AND status='Ativo' LIMIT 1";
						$consulta = mysql_query($query);
						$linha = mysql_fetch_array($consulta);
					?>
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							
							<div>
								<a href="<?php echo utf8_encode(URL.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo])) ?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($linha[cena_home] != ''){
											echo $linha['cena_home'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="imagem clientes assistindo">
								</a>
								
								<div class="home-textos-clientes-assistindo">
									<h4 class="home-titulo-clientes-assistindo"> 
										<?php echo utf8_encode($linha['titulo'])?>
									</h4>
									<div class="cenas-total-icones">
										<!-- 1 - Icone e texto - Visualizacao-->
										
										<!--<div class="cenas-visualizacao">
											 <i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($linha['visualizacao'])?>
											</p>-->
										</div>
										<!-- 2 - Icone e texto - Duracao do video -->
										<?php 
											if($linha['tempo_de_duracao'] != ''){?>
											<div class="cenas-duracao-video">
												<i class="fab fa-youtube"></i>
												<p class="texto">
													<?php echo ($linha['tempo_de_duracao'])?>
												</p>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php } else{ ?>						
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 home inicial_box_conteudo">
							
							
							
							
							<a href="<?php echo utf8_encode(URL.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo])) ?>" class="<?php if($linha[video_preview] != '') echo ' item-video '; if($linha[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<div class="conteudo-imagens"> 
									<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php if($linha['cena_home'] != ''){ echo $linha['cena_home']; }else{ echo '0_cena.jpg'; } ?>" alt="imagem clientes assistindo">
									
									<?php
										if($linha[video_preview] != '') {
										?>
										<?php if ($detect->isMobile()) { ?>
											
											<?php }else{ ?>
											<span class="far fa-play-circle fa-5x" style="display:none"></span>
										<?php } ?>
										<video width="100%" style="display:none" playsinline muted loop>
											<source src="https://server2.hotboys.com.br/arquivos/<?php echo $linha[video_preview] ?>" type="video/mp4">
											
										</video>
										
										
										<?php
										}
										
									?>
								</div>
							</a>
							<div class="home-textos-clientes-assistindo">
								<h4 class="home-titulo-clientes-assistindo"> 
									<?php echo utf8_encode($linha['titulo'])?>
								</h4>
								
								
								<div class="cenas-total-icones">
									
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($linha['visualizacao'])?>
										</p>
									</div>
									-->
									
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($linha['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($linha['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
							
						</div>
					<?php } ?>
					
				<?php } ?>
			</div>
			<!-- Botão Veja Mais assistindo nesse momento -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
					<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
			<!-- BANNER 03 	-->
			<div class="row" style="float:left;width:100%">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='3'  LIMIT 1 ";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							if($total_banners >= 0){ 
							?>
							<a href="https://hotboys.com.br/redirecionar.php?id=<?=$dados_banners['id']?>" target ="<?=$dados_banners['janela']?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
							<a href="https://hotboys.com.br/redirecionar.php?id=<?=$dados_banners['id']?>" target ="<?=$dados_banners['janela']?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php  } }  ?>
				</div>
			</div>
			
			<!-- Título H1 do conteúdo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						<?php echo SAIU_FORNO ?>
					</h1>
				</div>
			</div>
			
			<!-- Conteúdo - Cenas Recentes --> 
			<div class="row" style="float:left;width:100%">
				<?php 
					$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='Todos' order by data DESC LIMIT 3";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row=mysql_fetch_array ($consulta))
					{
					?>
					
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							<div> 
								<a href="<?php echo utf8_encode(URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo])) ?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php if($row[cena_home] != ''){
										echo $row['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
									?>" alt="imagem clientes assistindo">
								</a>
							</div>
							
							<div class="home-textos-cenas-recentes">
								<h4 class="home-titulo-cenas-recentes"> <a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
									<?php echo utf8_encode($row['titulo'])?>
								</a> </h4>
								<div class="cenas-total-icones">
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($row['visualizacao'])?>
										</p>
									</div>
									-->
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($row['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($row['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } else { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							
							<div> <a href="<?php echo utf8_encode(URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo])) ?>" class="<?php if($row[video_preview] != '') echo ' item-video '; if($row[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								
								<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php 
									if($row[cena_home] != ''){
										echo $row['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="imagem clientes assistindo">
								
								<?php
									if($row[video_preview] != '') {
									?>
									
									<?php if ($detect->isMobile()) { ?>
										
										<?php }else{ ?>
										<span class="far fa-play-circle fa-5x" style="display:none"></span>
									<?php } ?>
									<video = width="100%" style="display:none" loop>
										<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview] ?>" type="video/mp4">
									</video>
									<?php
									}
									if($row[video_preview_gif] != '') {
									?>
									<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview_gif] ?>" alt="preview video">
									<?php
									}
								?>
							</a>
							
							<div class="home-textos-cenas-recentes">
								<h4 class="home-titulo-cenas-recentes"> <a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
									<?php echo utf8_encode($row['titulo'])?>
								</a> </h4>
								
								<div class="cenas-total-icones">
									<!-- CSS dos 3 icones que vem em seguida -->
									<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
									
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($row['visualizacao'])?>
										</p>
									</div>
									-->
									
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($row['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($row['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			
			<!-- Conteúdo - Cenas Recentes --> 
			<div class="row" style="float:left;width:100%">
				<?php 
					$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='Todos' order by data DESC LIMIT 4, 6";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row=mysql_fetch_array ($consulta))
					{
					?>
					
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							<div> 
								<a href="<?php echo utf8_encode(URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo])) ?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php if($row[cena_home] != ''){
										echo $row['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
									?>" alt="imagem clientes assistindo">
								</a>
							</div>
							
							<div class="home-textos-cenas-recentes">
								<h4 class="home-titulo-cenas-recentes"> <a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
									<?php echo utf8_encode($row['titulo'])?>
								</a> </h4>
								<div class="cenas-total-icones">
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($row['visualizacao'])?>
										</p>
									</div>
									-->
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($row['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($row['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } else { ?>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 home inicial_box_conteudo">
							
							
							<div> <a href="<?php echo utf8_encode(URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo])) ?>" class="<?php if($row[video_preview] != '') echo ' item-video '; if($row[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								
								<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php 
									if($row[cena_home] != ''){
										echo $row['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="imagem clientes assistindo">
								
								<?php
									if($row[video_preview] != '') {
									?>
									
									<?php if ($detect->isMobile()) { ?>
										
										<?php }else{ ?>
										<span class="far fa-play-circle fa-5x" style="display:none"></span>
									<?php } ?>
									<video = width="100%" style="display:none" loop>
										<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview] ?>" type="video/mp4">
									</video>
									<?php
									}
									if($row[video_preview_gif] != '') {
									?>
									<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview_gif] ?>" alt="preview video">
									<?php
									}
								?>
							</a>
							
							<div class="home-textos-cenas-recentes">
								<h4 class="home-titulo-cenas-recentes"> <a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
									<?php echo utf8_encode($row['titulo'])?>
								</a> </h4>
								
								<div class="cenas-total-icones">
									<!-- CSS dos 3 icones que vem em seguida -->
									<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
									
									<!-- 1 - Icone e texto - Visualizacao
									<div class="cenas-visualizacao">
										<i class="far fa-eye"></i> 
										<p class="texto">
											<?php echo number_format_short($row['visualizacao'])?>
										</p>
									</div>
									-->
									
									<!-- 2 - Icone e texto - Duracao do video -->
									<?php 
										if($row['tempo_de_duracao'] != ''){?>
										<div class="cenas-duracao-video">
											<i class="fab fa-youtube"></i>
											<p class="texto">
												<?php echo ($row['tempo_de_duracao'])?>
											</p>
										</div>
									<?php } ?>
								</div>
							</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			
			
			<!-- Botão Veja Mais cena rencentes-->
			<div class="row" style="float: left;width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
					<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
			
			<!-- Conteúdo - Fundo Fixo -->
			<div class="row home-assineja" style="float: left;width:100%;">
				<div class="col-lg-12 col-sm-12 home-assineja">
					<div class="ui-box nopadding">
						<div class="container home-assineja-imagens">
							<div class="home-assineja-fundofixo"> <a href="<?php echo URL ?>assine"> 
								<!-- Assine Já - DESKTOP -->
								<img src="<?php echo URL ?>imagens/background-fixo/assineja-conteudo.png" class="assineja-desktop fundo-preto largura-100" alt="assine ja"> 
								
								<!-- Assine Já - MOBILE -->
								<img src="<?php echo URL ?>imagens/background-fixo/mobile-bg-assine-black.jpg" class="assineja-mobile fundo-preto visivel-tablet" alt="assine ja"> 
							</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
						
						// NOT INde todos
						date_default_timezone_set("America/Sao_Paulo");
						//verifica tempo e tempo menos 7
						$tempo = gmdate("Y-m-d", strtotime("-7 days"));
						$hoje = gmdate("Y-m-d");
						$qry_rede = "SELECT * FROM `rede_social` WHERE `status`='Inativo' ORDER BY id desc limit 6";
						$consulta_rede = mysql_query($qry_rede);
						$total_rede = mysql_num_rows ($consulta_rede);
						if($total_rede >0){
			?>
			<!-- Título H1 do conteúdo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						HOT Post
					</h1>
				</div>
			</div>
							<?php 
							}
							while ($dados_rede=mysql_fetch_array ($consulta_rede))	{	?>
								
							<?php if ($detect->isMobile()) { ?>

								<div class=" col-sm-3 col-xs-4 inicial_box_conteudo" style="border:0px !important;">

									<div>
										<?php if($dados_rede['media'] == ""){?>
										<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>">

											<img style="width:100%;" class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>" alt="">
										</a> 
										<?php }else{?>
											<?=$dados_rede['media']?>
										<?php }?>

									</div>
									<div>
									<small style="font-size:12px;position:relative;left:25%;"><?= $dados_rede['data']?><br></small>
										<h4 style="font-size:20px;text-align:center;padding-bottom:1px;margin-bottom:0px;">
											<?php if($dados_rede['rede'] == "Facebook"){ echo "<i class='fab fa-facebook-f'></i>";}?>
											<?php if($dados_rede['rede'] == "Instagram"){ echo "<i class='fab fa-instagram'></i>";}?>
											<?php if($dados_rede['rede'] == "WhatsApp"){ echo "<i class='fab fa-whatsapp'></i>";}?>
											<?php if($dados_rede['rede'] == "Youtube"){ echo "<i class='fab fa-youtube'></i>";}?>
											<?php if($dados_rede['rede'] == "Outros"){ echo "<i class='fas fa-share-alt'></i>";}?>
											<?= $dados_rede['rede']?>
										</h4>
									</div>


								</div>

								<?php } else { ?>

								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 inicial_box_conteudo" style="overflow: hidden;">

									<div>
										<?php if($dados_rede['media'] == ""){?>
										<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>">

											<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>" alt="">
										</a> 
										<?php }else{?>
											<?=$dados_rede['media']?>
											<?php }?>

									</div>
									<div>
										<small style="font-size:12px;position:relative;left:40%;"><?= $dados_rede['data']?><br></small>
										<h4 style="font-size:20px;text-align:center;padding-bottom:35px;">
											<?php if($dados_rede['rede'] == "Facebook"){ echo "<i class='fab fa-facebook-f'></i>";}?>
											<?php if($dados_rede['rede'] == "Instagram"){ echo "<i class='fab fa-instagram'></i>";}?>
											<?php if($dados_rede['rede'] == "WhatsApp"){ echo "<i class='fab fa-whatsapp'></i>";}?>
											<?php if($dados_rede['rede'] == "Youtube"){ echo "<i class='fab fa-youtube'></i>";}?>
											<?php if($dados_rede['rede'] == "Outros"){ echo "<i class='fas fa-share-alt'></i>";}?>
											<?= $dados_rede['rede']?>
										</h4>
									</div>

								</div>

							<?php } ?>

							<?php } ?>
			<!-- MODELOS DESKTOP  mais visitados da Semana --> 
			<!-- Título H1 -->
			<div class="row" style="float: left;width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						<?php echo GOSTOSOS_QUENTES ?>
					</h1>
				</div>
			</div>
			<!-- MODELOS MOBILE -->
			<?php if ($detect->isMobile()){ ?>
				<?php
					
						// NOT INde todos
						date_default_timezone_set("America/Sao_Paulo");
						//verifica tempo e tempo menos 7
						$tempo = gmdate("Y-m-d", strtotime("-7 days"));
						$hoje = gmdate("Y-m-d");
						$qry = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273,276) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 9";
						$consulta = mysql_query($qry);
						$total = mysql_num_rows($consulta);
						$row = mysql_fetch_array($consulta);
						$query = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";
						$cons = mysql_query($query);
						$linha = mysql_fetch_array($cons);
				?>
				<div class="col-sm-12 col-xs-5">
					<a href="<?php echo URL.'ator/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
						<img class="lazy home-modelo" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $linha['modelo_perfil']?>" alt="imagem mais visitado">
					</a>
					<div style="background-color: #dc0606;height: 3px;width: 239%;"></div>
				</div>
				<div class="col-sm-12 col-xs-5">
				<div style="background-color: #dc0606;height: 15px;width: 139%;"></div>
				<p style="margin-top:10px;margin-left:5px;">Nome: <?= $linha['nome']?></p><br>
				<p style="margin-left:5px;">Idade: <?= $linha['idade']?></p><br>
				<p style="margin-left:5px;">Peso: <?= $linha['peso']?></p><br>
				<p style="margin-left:5px;">Altura: <?= $linha['altura']?></p><br>
				<p style="margin-left:5px;">Signo: <?= $linha['signo']?></p><br>
				<p style="margin-left:5px;">Etnia: <?= $linha['etnia']?></p><br>
				<p style="margin-left:5px;">Dote: <?= $linha['penis']?></p>
				</div>
				<div class="container carousel-mobile carousel-mobile">
					<div  id="myCarousel" class="carousel slide" data-ride="carousel">
						
						<div class="carousel-inner">
							
							<?php 
							
								$counter = 1;
								while($dados_modelos = mysql_fetch_array($consulta)){ 
									//Consulta Modelos 
									$query_modelo ="SELECT * FROM `modelos` WHERE 
									id=$dados_modelos[id_conteudo] LIMIT 1"; 
									$consulta_modelo = mysql_query($query_modelo);
									$dados_modelo = mysql_fetch_array($consulta_modelo); 
								?>
								
								<div class="item <?php if($counter <= 1){echo "active"; } ?>">
									<div class="col-sm-4 col-xs-4">
										<a href="<?php echo URL.'ator/'.$dados_modelo['id'].'/'.URL_amigavel($dados_modelo['nome']) ?>">
										<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo['modelo_perfil']?>" class="img-responsive" alt="ator mais visitado"></a>
									</div>
								</div>
								<?php	
									$counter++;
								} ?>
						</div>
						<!-- Controles - Setas -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"> </span>
						</a>
						
					</div>
				</div>
				<?php }else{ ?>
				<div class="row home-modelos desktop" style="float:left; width:100%;">
					<?php
					
						// NOT INde todos
						date_default_timezone_set("America/Sao_Paulo");
						//verifica tempo e tempo menos 7
						$tempo = gmdate("Y-m-d", strtotime("-7 days"));
						$hoje = gmdate("Y-m-d");
						$qry = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273,276) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 9";
						$consulta = mysql_query($qry);
						$total = mysql_num_rows($consulta);
						$row = mysql_fetch_array($consulta);
						$query = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";
						$cons = mysql_query($query);
						$linha = mysql_fetch_array($cons);
					?>
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 home-modelo-mais-visitado">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="conteudoModelo">
								<a href="<?php echo URL.'ator/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
									<img class="lazy home-modelo" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $linha['modelo_perfil']?>" alt="imagem mais visitado">
								</a>
								<div class="home-fundo-nome-modelo-visitado">
									
									<a href="<?php echo URL.'ator/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
										<h4 style="font-size: 23px; padding: 10px; margin: 0!important;"> <?php echo utf8_encode($linha['nome'])?></h4>
									</a> 
									
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-sm-8  espacamento-laterais-0">
						<?php while($dados_modelos = mysql_fetch_array($consulta)){ 
							//Consulta Modelos 
							$query_modelo ="SELECT * FROM `modelos` WHERE id=$dados_modelos[id_conteudo]   LIMIT 1"; 
							$consulta_modelo = mysql_query($query_modelo);
							$dados_modelo = mysql_fetch_array($consulta_modelo);
						?>
						<div class="col-sm-3">
							<div class="col-sm-12 espacamentos-0">
								<div class="conteudoModelo">
									<a href="<?php echo URL.'ator/'.$dados_modelo['id'].'/'.URL_amigavel($dados_modelo['nome']) ?>">
									<img class="lazy home-modelos" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo['modelo_perfil']?>" alt="modelo mais visitado"></a>
									<div class="home-fundo-nomes-modelos-visitados">
										<a href="<?php echo URL.'ator/'.$dados_modelo['id'].'/'.URL_amigavel($dados_modelo['nome']) ?>">
											<h4 style="font-size: 23px; padding: 10px; margin: 0!important;"><?php echo utf8_encode($dados_modelo['nome'])?></h4>
										</a> 
										
									</div>
								</div>
							</div>
						</div>
						<?php  }   ?>
					</div>
				</div>
			<?php } ?>
			<!-- Botão Veja Mais -->
			<div class="row" style="float: left;width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 bt-vejamais-desktop modelos">
					<h1 class="bt-vejamais"><a href="<?php echo URL ?>atores"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
			<!-- Botão Veja Mais -->
			<div class="row" style="float: left;width: 100%;">
				<div class="col-lg-12 col-sm-12 bt-vejamais-mobile">
					<h1 class="bt-vejamais"><a href="<?php echo URL ?>atores"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
			<!-- BANNER 04 --> 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='4' LIMIT 1";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile()) { 
							if($total_banners >= 0){ 
							?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
						<?php  } }  ?>
				</div>
			</div>	

			
			<!-- BANNER 05 -->
			<div class="row" style="float: left;width: 100%;">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='5'  LIMIT 1 ";
						$consulta_banners  = mysql_query($query_banners);
						
						$total_banners = mysql_num_rows($consulta_banners);
						
						while($dados_banners = mysql_fetch_array($consulta_banners)){
							
							if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
								if($total_banners >= 0){ 
								?>
								<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
									
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem vitrine mobile" width="100%">
								</a>
								<?php
								} } else {
							?>
							<?php 
								$counter = 1;
								if($total_banners >= 0){ ?>
								<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
									
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem vitrine" width="100%">
								</a>
								<?php
								} } }
					?>
				</div>
			</div>
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
			
			
			
			
			
			<!-- Carousel Mobile de Modelos -->
			<script>
				jQuery3211(document).ready(function ($) {
					$(function() {
						
						$('#myCarousel').carousel({
							interval: 4000,
							cycle: true
						})
						console.log($('#myCarousel .item'))
						$('#myCarousel .item').each(function() {
							
							var next = $(this).next();
							console.log(next);
							if (!next.length) {
								next = $(this).siblings(':first');
							}
							next.children(':first-child').clone().appendTo($(this));
							
							if (next.next().length > 0) {
								next.next().children(':first-child').clone().appendTo($(this));
								} else {
								$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
							}
						})
					})
				});
			</script>

		</div>
	</body>
</html>