<?php
	// variaveis dos arquivos de configuracao
	$config = '../config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//Variaveis dos arquivos da estrutura da pagina
	$menu_audicoes = '../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$paginacaoConteudoClass = '../includes/PaginacaoConteudoClass.php';
	
	//variavel programacao das cenas
	$programacao_Cenas = 'includes/paginacao/programacao-cenas.php';
	
	//variavel do nav topo
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';
	
	//variavel das noticias - audicoes hot 3
	$noticias = '../novo-projeto/includes/paginas/noticias.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//variavel que puxa o modal de contato
	$contato = '../novo-projeto/includes/modal/rodape/contato.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//Variaveis dos arquivos de configuracao
	include_once($vip_page);
	
	//class paginação
	require_once($paginacaoConteudoClass);
	
	//Variaveis dos arquivos de configuracao
	include_once($perfil_usuario);
	
	//programacao das cenas
	include_once($programacao_Cenas);
	
	//consulta vitrine audicoes
	$counter_vitrine = 1;
	$query_vitrine_audicoes = "SELECT * FROM `cenas` WHERE status='Ativo' AND audicoes='Sim' ORDER BY `id` DESC LIMIT 5";
	$consulta_vitrine_audicoes = mysql_query($query_vitrine_audicoes);
	
	//cenas audicoes
	$query_audicoes = "SELECT * FROM `cenas` WHERE status='Ativo' AND audicoes='Sim' ORDER BY id DESC LIMIT 4";
	$consulta_audicoes  = mysql_query($query_audicoes);
	$total_audicoes = mysql_num_rows($consulta_audicoes);
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Audições HOT - Site Hotboys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip audicoes">
		
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
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
							
							<!-- Vitrine das Audicoes -->
							<div class="container-fluid">
								<div class="row">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
										</ol>
										<div class="carousel-inner">
											<?php while($vitrine_audicoes = mysql_fetch_array($consulta_vitrine_audicoes)){ ?>
												<div class="carousel-item <?php if($counter_vitrine <= 1){echo " active"; } ?>">
													
													<!-- Link da vitrine -->
													<a href="<?php echo utf8_encode(URL_VIP.'audicoes/cena/'.$vitrine_audicoes[id].'/'.URL_amigavel($vitrine_audicoes[titulo])) ?>">
														
														<!-- Imagem da vitrine -->
														<img class="d-block w-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $vitrine_audicoes['cena_vitrine'] ?>" alt="First slide">
													</a>
													
													<!-- Titulo da vitrine -->
													<div class="carousel-caption d-none d-md-block">
														<h5><?php echo utf8_encode($vitrine_audicoes['titulo']) ?></h5>
													</div>
													
												</div>
											<?php $counter_vitrine++; } ?>
										</div>
										<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Anterior</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Próxima</span>
										</a>
									</div>
								</div>
							</div>
							
							<!-- Titulo - Fases das Audiçoes -->
							<div class="app-page-title mt-4">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5>Fases das Audiçoes Hot 3</h5>
									</div>
								</div>
							</div> 
							
							<!-- Fases das Audicoes -->
							<div class="container fasesAudicoes">
								<div class="row">
									<img src="https://www.hotboys.com.br/imagens/audicoes/fases/fase-03-ativa.png" class="mx-auto">
								</div>
							</div>
							
							<!-- Titulo - Ultimas Cenas -->
							<div class="app-page-title mt-4">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5>Últimas Cenas</h5>
									</div>
								</div>
							</div>   
							
							
							<!-- Main Content -->
							<div id="content">
								
								<!-- videos com paginacao -->
								<section class="cenas m-0">
									<div class="container-fluid pt-2">
										
										<!-- CENAS -->
										<div class="row">
											
											<!-- Consulta cenas -->
											<ul>
												<?php while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
														
														<!-- -->
														<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
															<div class="card mb-2 box-shadow my-xl-2">
																
																<!-- imagem da cena -->
																<div class="thumb mb-0">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_audicoes['cena_home'] ?>" data-holder-rendered="true">
																</div>
																
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo utf8_encode($dados_audicoes['titulo']) ?></h1>
																	
																	<div class="curtidas d-flex justify-content-between align-items-center">
																		
																		<!--<div class="btn-group">
																			<button type="button" class="btn btn-sm like">
																			<img src="<?php echo URL ?>novo-projeto/assets/img/icones/like.png"/> 22
																			</button>
																			<button type="button" class="btn btn-sm deslike">
																			<img src="<?php echo URL ?>novo-projeto/assets/img/icones/deslike.png"/> 0
																			</button>
																		</div>-->
																		
																		
																		<!-- Botao para adicionar a cena como favoritada 
																			<div class="addFavoritos">
																			<a href="" style="padding: 14px">
																			<i class="fas fa-star" aria-hidden="true" data-toggle="cenaFavorita" data-placement="top" title="Escolha a cena como favorita"></i> 
																			</a>
																			</div>
																		-->
																	</div>
																</div>
																
															</div>
														</a>
													</li>
												<?php } ?>
											</ul>
											
										</div>
										
										<!-- Botao ver mais -->
										<div class="row">
											
											<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
											<a href="<?php echo URL_VIP ?>cenas-audicoes/" role="button" class="btn btn-primary btn-sm mx-auto mb-3">VER MAIS CENAS<i class="fa fa-chevron-right" style="margin-left: 10px"></i></a>
										</div>
										
									</div>
									
								</section>
								
								
							</div>
							<!-- End of Main Content -->
							
							<!-- Titulo - Notícias -->
							<div class="app-page-title mt-4">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5>Últimas Notícias</h5>
									</div>
								</div>
							</div>   
							
							<!-- Noticias  -->
							<?php include_once $noticias ?>
							
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
			
		</body>
	</html>																																																							