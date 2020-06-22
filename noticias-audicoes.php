<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	
	$url_link = explode("-",$url_link);
	$url_link = implode("-",$url_link);
	
	
	$counter = 1;
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
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
			
			<!-- Animate CSS - Animacao do novo css3 -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
			
			<!-- CSS Principal - Cabecograma -->
			<link rel="stylesheet" href="<?php echo URL ?>css/cabecograma-hotboys.css?v=<?php echo Version; ?>">
			
			<!-- Efeito hover no cabecograma -->
			<link rel="stylesheet" href="<?php echo URL ?>css/hover.css?v=<?php echo Version; ?>">
			
			<!-- CSS da pagina -->
			<link rel="stylesheet" href="<?php echo URL ?>css/audicoes.css?v=<?php echo Version; ?>">
			
			
			<!-- HEAD (Include) -->
			<?php include('includes/head.php') ?>
			
			<!-- CSS do selecionado menu noticias -->
			<style>
				.menu-audicoes li.noticias a{background-color: #010101;}
			</style>
			
		</head>
		<body id="body" class="fundo-preto blog-audicoes">
			
			
			<!-- INICIO - Conteudo Mae de todas as divs -->
			<div class="container">
				
				
				<!-- Topo (Include) -->
				<div class="row" style="float:left;width:100%">
					<?php include('includes/top.php') ?>
				</div>
				
				
				
				<div class="row noticias_audicoes" style="float:left;width:100%;">
					
					<div class="row" style="width:100%;float:left">
						
						
						
						<!-- Cabecograma dos participantes (Include) -->
						<?php include('includes/cabecograma.php'); ?>
						
						
						
						
						<!-- Menu Audições -->
						<?php include('menu-audicoes.php') ?>
						
						
						<div class="pagina-noticia">
							
							
							
							
							<!-- Titulo -->
							<div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
								<h1 style="margin-top:10px!important;margin-bottom: 37px!important;color:white;text-align: center;margin:0 auto;float:none;">Fases da Audições Hot 3</h1>
								<div class="col-lg-9 col-md-11 texto-pagina-contato_trabalhe">
									<div class="col mx-auto text-center logo-votacao">
										<img src="<?php echo URL ?>imagens/audicoes/fases/fase-03-ativa.png"/>
									</div>
								</div>
							</div>	
							
							
							<div class="col-lg-12 col-md-12 col-xs-12 galerias">
								<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe">
									
									<?php 
										//consulta no banco de dados
										$query_destaque = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1";
										$consulta_destaque = mysql_query($query_destaque);
										$dados_destaque = mysql_fetch_array($consulta_destaque);
									?>
									
									<!-- Destaque -->
									<?php if($dados_destaque['imagem_destaque'] != '' ){ ?>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											
											<?php if($dados_destaque['imagem_noticia'] != '' ){ ?>
												
												<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_destaque[id].'/'.URL_amigavel($dados_destaque['titulo'])) ?>">
													<?php }else{ ?>
													
													<a>
													<?php } ?>
													
													<div style="position:relative;z-index:1">
														<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_destaque['imagem_destaque'] ?>" style="width:100%">
													</div>
													
													<!-- Tag destaque -->
													<div class="tags">DESTAQUE</div>
													
													<div class="titulo" style="position:absolute;bottom:0;z-index:50;background-image: linear-gradient(to bottom, rgba(113, 67, 67, 0), rgba(25, 23, 24, 0.75));padding-bottom:12px">
														
														
														<h1><?php  
															if($dados_destaque['titulo_curto'] != ''){
																echo utf8_encode($dados_destaque['titulo_curto']);
																} else {
																echo utf8_encode($dados_destaque['titulo']);
															}
															
														?></h1>
														
														<span style="float:left;padding-left:20px;width:95%;text-shadow: 0px 2px 3px rgba(0,0,0,.8);font-weight: bold;display:block!important">
															<?php echo utf8_encode($dados_destaque['subtitulo']) ?>
														</span>
														
													</div>
												</a>
											</div>
										<?php } ?>
										
										
										<?php 
											$query_slider = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1,2";
											$dados_slider = mysql_query($query_slider);
											while($exibe_slider = mysql_fetch_array($dados_slider)){
												if($exibe_slider['imagem_slider'] != '' ){
												?>
												
												<!-- Slider 2 e 3 -->
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 slider<?php echo $counter++; ?>">
													<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
														
														<div style="position:relative;z-index:1;">
															
															<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_slider['imagem_slider'] ?>" style="width:100%">
															
															
															<div class="titulo" style="position:absolute;bottom: 0;z-index:50;background-image: linear-gradient(to bottom, rgba(109, 97, 97, 0.12), rgba(25, 23, 24, 0.86));padding-bottom:12px">
																<h1>
																	<?php  
																		if($exibe_slider['titulo_curto'] != ''){
																			echo utf8_encode($exibe_slider['titulo_curto']);
																			} else {
																			echo utf8_encode($exibe_slider['titulo']);
																		}
																		
																	?>
																</h1>
																<span style="float:left;padding-left:20px;width:90%;text-shadow: 0px 2px 3px rgba(0,0,0,.8);font-weight: bold;line-height: 16px;"><?php echo utf8_encode($exibe_slider['subtitulo']) ?></span>
															</div>
														</div>
													</a>
												</div>
											<?php } } ?>
											
											
											
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5px">
												
												<?php 
													$counter = 1;
													
													$query_lista = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC";
													$dados_lista = mysql_query($query_lista);
													while($exibe_lista = mysql_fetch_array($dados_lista)){ 
														if($exibe_lista['imagem_lista'] != '' ){
														?>
														
														
														
														<!-- conteudo das noticias -->
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 desktop" style="margin-bottom: 1rem;">
															<div class="noticia-slider-lista texto-pagina-contato_trabalhe">
																
																
																<!-- Noticia 1 -->
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1rem;margin-bottom:1rem;">
																	
																	<!-- imagem -->
																	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
																		
																		<!-- link da imagem -->
																		<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
																			
																			<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista[imagem_lista] ?>" style="width:100%">
																		</a>
																	</div>
																	
																	<!-- conteudo -->
																	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 noticia-conteudo">
																	
																	<?php if($exibe_lista[categoria_noticia] !=''){ ?>
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																			<p class="categoria"><?php echo utf8_encode($exibe_lista[categoria_noticia]) ?></p>
																		</div>
																	<?php } ?>
																		
																		
																		
																		<!-- Link do titulo -->
																		<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
																			
																		<h1><?php echo utf8_encode($exibe_lista[titulo]) ?></h1></a>
																		<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista[texto], 0, 200))); ?>... 
																			
																			<!-- Link do botão leia mais -->
																		<a class="leia-mais" href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">leia Mais</a> </p>
																		
																		<!--<span>Postado em: <?php echo $dados_data[data] ?></span>-->
																	</div>
																</div>
																
															</div>
														</div>
														
														
														<div class="col-sm-12 col-xs-12 mobile">
															<div class="noticia-slider-lista texto-pagina-contato_trabalhe">
																
																<?php if($exibe_lista[categoria_noticia] !=''){ ?>
																<p class="categoria"><?php echo utf8_encode($exibe_lista[categoria_noticia]) ?></p>
																<?php } ?>
																
																<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
																	
																<h1><?php echo utf8_encode($exibe_lista[titulo]) ?></h1></a>
																
																<!-- Noticia 1 -->
																<div class="col-sm-12 col-xs-12">
																	<!-- imagem -->
																	<div class="col-sm-12 col-xs-12">
																		<a href="<?php echo URL.'audicoes/'.$exibe_lista[titulo] ?>">
																			
																			<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista[imagem_lista] ?>" style="width:100%">
																		</a>
																	</div>
																	
																	<!-- conteudo -->
																	<div class="col-sm-12 col-xs-12 noticias-conteudos">
																		
																		<p><?php echo utf8_encode(substr($exibe_lista[subtitulo],0,12)) ?>  - <?php echo strip_tags(utf8_encode(substr($exibe_lista[texto], 0, 250))); ?>... <a class="leia-mais" href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">leia Mais</a> </p>
																		
																		
																	<!-- <span>Postado em: <?php ///echo $dados_data[data] ?>--></span>
																</div>
															</div>
															
															
														</div>
													</div>
												<?php } } ?>
									</div>
									
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
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
			
			<!-- Javascript Hover - Cabecograma Audicoes hot3 -->
			<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>

			<!-- Javascript do Cabecograma-->
				<script src="<?php echo URL ?>js/cabecograma.js?v=<?php echo Version; ?>"></script>	
		</body>
	</html>																														