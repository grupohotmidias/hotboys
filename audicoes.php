<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	
	$url_link = explode("-",$url_link);
	$url_link = implode("-",$url_link);
	
	
	//REGISTRA AÇÃO EDITAR NO HISTOCIO  
	$query_data = "SELECT * FROM `historico_server`";
	$consulta_data = mysql_query($query_data);
	$dados_data = mysql_fetch_array($consulta_data);
	
	$counter = 1;
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<html class="no-js">
		<head>
			
			<!-- Titulo que aparece no Navegador -->
			<title>🌶 Audições HOT - Site Hotboys</title>
			
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
			
			<!-- CSS do selecionado menu audicoes -->
			<style>
				.menu-audicoes ul.menuAudicoes li.audicoes a{background-color: #010101;}
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
						
						
            <div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe menu-audicoes">	
						<!-- Cabecograma dos participantes (Include) -->
						<?php include('includes/cabecograma_g.php'); ?>
			</div>			
						
						
						
						<!-- Menu Audições -->
						<?php include('menu-audicoes.php') ?>
						
						
						
						<div class="pagina-noticia">
							
							
							
							<!-- Vitrine -->
							<?php include('audicao/vitrine-audicoes.php') ?>
							
							
							<!-- FASES DAS AUDICOES HOT 3 -->
							<div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe">
									
									<!-- Titulo das Fases -->
									<h1 style="margin-top:10px!important;margin-bottom: 37px!important;color:white;text-align: center;margin:0 auto;float:none;">Fases da Audições Hot 3</h1>
									
									<!-- Imagem das Fases -->
									<div class="col-lg-9 col-md-11 texto-pagina-contato_trabalhe">
										<div class="col mx-auto text-center logo-votacao">
											<img src="<?php echo URL ?>imagens/audicoes/fases/fase-05-ativa.png"/>
										</div>
									</div>
									
								</div>	
							</div>
							
							
							
							<!-- ÚLTIMAS CENAS -->
							<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe">
								<div class="row container-tudo espacamento-laterais-3 conteudo-imagens ultimas-cenas" style="width:100%;float:left;margin-top:1.8rem">
									
									<!-- Título H1 do conteúdo -->
									<div class="row" style="width:100%;float:left">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important;margin-top: 0.8rem!important;">
												Últimas Cenas
											</h1>
										</div>
									</div>
									
									
									<?php
										$query_audicoes = "SELECT * FROM `audicoes_cenas` WHERE status='Ativo' ORDER BY ordem DESC LIMIT 3";
										
										$consulta_audicoes  = mysql_query($query_audicoes);
										$total_audicoes = mysql_num_rows($consulta_audicoes);
										
										while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){
										?>
										
										<?php  if ($detect->isMobile()) {  ?>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes">
												
												
												<div>
													<a href="<?php echo URL?>assine">
														<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
															if($dados_audicoes['cena_lista'] != ''){
																echo $dados_audicoes['cena_lista'];
																}else{
																echo '0_cena.jpg';
															}?>" alt="noticias das audicoes">
													</a>
													<div class="home-textos-clientes-assistindo audicoes-cenas">
														<a href="<?php echo URL?>assine">
															<h4 class="home-titulo-clientes-assistindo audicoes-cenas" style="text-transform: uppercase;"> 
																<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 35))); ?>...  <span style=" color: #afabab; text-decoration: underline; ">Confira!</span>
															</h4>
														</a>
													</div>
												</div>
												
											</div>
											<?php } else{ ?>	
											
											
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes-cenas" style="border:3px solid #020202">
												
												<a href="<?php echo URL?>assine">
													<div class="conteudo-imagens audicoes-cenas"> 
														<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php if($dados_audicoes['cena_lista'] != ''){ echo $dados_audicoes['cena_lista']; }else{ echo '0_cena.jpg'; } ?>" alt="noticias das audicoes">
														
													</div>
												</a>
												<div class="home-textos-clientes-assistindo audicoes-cenas">
													<a href="<?php echo URL?>assine">
														<h4 class="home-titulo-clientes-assistindo audicoes-cenas" style="text-transform: uppercase;"> 
															<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 38))); ?>...  <span style=" color: #afabab; text-decoration: underline; ">Confira!</span>
														</h4>
													</a>
												</div>
												
											</div>
										<?php } ?>
									<?php } ?>
									
								</div>
								
								<!-- Botão Veja Mais - Ultimas Cenas -->
								<div class="row" style="float:left;width:100%">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
										<h1 class="bt-vejamais"><a href="<?php echo URL ?>audicoes/cenas"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
									</div>
								</div>
							</div>
							
							
							
							
							
							
							<!-- ULTIMAS NOTICIAS -->
							<?php include('includes/ultimas-noticias-audicoes.php') ?>
							
							
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
			<script src="js/cabecograma.js?v=<?php echo Version; ?>"></script>		
			
		</body>
	</html>																			