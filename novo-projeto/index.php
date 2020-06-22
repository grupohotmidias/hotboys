<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
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

<?php 
	// Contador de numeros da vitrine
	$counter_vitrine = 1;
	$counter_vitrine_mobile = 1;
	
	// TRAZ PRIMEIRO RESULTADO DA VITRINE - apenas 1 resultado
	$sql_pr = "SELECT * FROM `cenas` ORDER BY id DESC LIMIT 1";	
	$res_pr = mysql_query($sql_pr);
	$pr_vitrine = mysql_fetch_array($res_pr);
	
	// TRAZ O SEGUNDO E O TERCEIRO RESULTADO DA VITRINE - ate 2 resultados
	$sql_sec = "SELECT * FROM `cenas` ORDER BY id DESC LIMIT 1,2";	
	$res_sec = mysql_query($sql_sec);
	
	// TRAZ TERCEIRO RESULTADO DA VITRINE - apenas 1 resultado
	$sql_ter = "SELECT * FROM `cenas` ORDER BY id DESC LIMIT 3,1";	
	$res_ter = mysql_query($sql_ter);
	$ter_vitrine = mysql_fetch_array($res_ter);
	
	// TRAZ O QUARTO E O QUINTO RESULTADO DA VITRINE - ate 2 resultados
	$sql_qua = "SELECT * FROM `cenas` ORDER BY id DESC LIMIT 4,2";	
	$res_qua = mysql_query($sql_qua);
	
	// RESULTADO DA VITRINE MOBILE - ate 4 resultados
	$sql_mobile = "SELECT * FROM `cenas` ORDER BY id DESC LIMIT 4";	
	$res_mobile = mysql_query($sql_mobile);
	
	// consulta das cenas recentes - ate 4 cenas
	$query_cenas_recentes="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 4";
	$consulta_cenas_recentes=mysql_query($query_cenas_recentes);
	
	// consulta das cenas recentes - ate 12 cenas
	$query_cenas_recentes="SELECT * FROM `cenas` WHERE audicoes='' AND status='Ativo' order by data DESC LIMIT 12";
	$consulta_cenas_recentes=mysql_query($query_cenas_recentes);
	
	// consulta das audicoes hot 3 - ate 4 cenas
	$query_cenas_audicoes="SELECT * FROM `cenas` WHERE audicoes='sim' AND status='Ativo' order by data DESC LIMIT 4";
	$consulta_cenas_audicoes=mysql_query($query_cenas_audicoes);
	
	// NOT INde todos
	date_default_timezone_set("America/Sao_Paulo");
	//verifica tempo e tempo menos 7
	$tempo = gmdate("Y-m-d", strtotime("-7 days"));
	$hoje = gmdate("Y-m-d");
	
	//consulta para desktop grupo1
	$qry = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 5";
	$consulta = mysql_query($qry);
	$total = mysql_num_rows($consulta);
	$row = mysql_fetch_array($consulta);
	$query = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";
	$cons = mysql_query($query);
	$linha = mysql_fetch_array($cons);
	
	//consulta para desktop grupo2
	$qry2 = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 4,5";
	$consulta2 = mysql_query($qry2);
	$total2 = mysql_num_rows($consulta2);
	$row2 = mysql_fetch_array($consulta2);
	$query2 = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";
	$cons2 = mysql_query($query2);
	$linha2 = mysql_fetch_array($cons2);
	
	//consulta para mobile1
	$qry_mobile = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 4";
	$consulta_mobile = mysql_query($qry_mobile);
	$total_mobile = mysql_num_rows($consulta_mobile);
	$row_mobile = mysql_fetch_array($consulta_mobile);
	$query_mobile = "SELECT * FROM `modelos` WHERE id='$row_mobile[id_conteudo]' AND status='Ativo' LIMIT 1";
	$cons_mobile = mysql_query($query_mobile);
	$linha_mobile = mysql_fetch_array($cons_mobile);
	
	//consulta para mobile2
	$qry_mobile2 = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 4,4";
	$consulta_mobile2 = mysql_query($qry_mobile2);
	$total_mobile2 = mysql_num_rows($consulta_mobile2);
	$row_mobile2 = mysql_fetch_array($consulta_mobile2);
	$query_mobile2 = "SELECT * FROM `modelos` WHERE id='$row_mobile[id_conteudo]' AND status='Ativo' LIMIT 1";
	$cons_mobile2 = mysql_query($query_mobile2);
	$linha_mobile2 = mysql_fetch_array($cons_mobile2);
	
	// consulta das cenas visitadas agora - Hotvips assistindo no momento
	$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT 1";
	$consulta_visitou = mysql_query($query_visitou);
	$total_visitou = mysql_num_rows($consulta_visitou);
	$falta = 6 + $total_visitou;
	
	$row_hotvips = mysql_fetch_array($consulta_visitou);
	// traz os dois ultimos ensaios do sexo hot
	$query_hotvips ="SELECT * FROM `cenas` WHERE id=$row_hotvips[id_conteudo] AND status='Ativo' LIMIT 6";
	$consulta_hotvips = mysql_query($query_hotvips);
	$linha_hotvips = mysql_fetch_array($consulta_hotvips);
	
	// consulta das cenas visitadas agora
	$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT 1,6";
	$consulta_visitou = mysql_query($query_visitou);
	$total_visitou = mysql_num_rows($consulta_visitou);
	$falta = 6 + $total_visitou;
	
	// Consulta para os 5 videos mais acessados / em alta
	$query_categoria ="SELECT * FROM `cenas` ORDER BY visualizacao DESC limit 5";
	$consulta_categoria = mysql_query($query_categoria);
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo dos garotos mais gostosos do Brasil">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		
	</head>
	
	<body class="home" id="page-top">
		
		<!-- MENU -->
		<header class="menu home">
			<?php include_once ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
			
			<!-- SECTION - Bustos das Audicoes  -->
			<section class="audicoes-bustos">
				<div class="container">
					<div class="row">
						<a href="<?php echo URL ?>audicoes/">
							<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
						</a>
					</div>
				</div>
			</section>
			
			
			<!-- SECTION - Vitrine  -->
			<section class="vitrine mb-0">
				
				<!-- Estrutura da Vitrine Desktop -->
				<div class="container desktop d-none d-md-block">
					<div class="row">
						
						<!-- Vitrine Desktop comeca aqui -->
						<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
							
							<div class="carousel-inner">
								<?php while ($pr_vitrine = mysql_fetch_array($res_sec)){ ?>
									<div class="carousel-item <?php if($counter_vitrine <= 1){echo " active"; } ?>">
										<a href="<?php echo utf8_encode(URL.'cena/'.$pr_vitrine[id].'/'.URL_amigavel($pr_vitrine[titulo])) ?>">
											<img src="https://server2.hotboys.com.br/arquivos/<?php echo utf8_encode($pr_vitrine[cena_vitrine]) ?>" class="d-block w-100" alt="vitrine">
										</a>
									</div>
								<?php $counter_vitrine++; } ?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
								<li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
							</ol>
						</div>
						<!-- Vitrine Desktop termina aqui -->
						
					</div>
				</div>
				
				<!-- Vitrine Mobile -->
				<div class="container-fluid mobile d-block d-sm-block d-md-none">
					<div class="row">
						<!-- Vitrine Mobile comeca aqui -->
						<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
							
							<div class="carousel-inner">
								<?php while ($mob_vitrine = mysql_fetch_array($res_mobile)){ ?>
									<div class="carousel-item <?php if($counter_vitrine_mobile <= 1){echo " active"; } ?>">
										<a href="<?php echo utf8_encode(URL.'cena/'.$mob_vitrine[id].'/'.URL_amigavel($mob_vitrine[titulo])) ?>">
											<img src="https://server2.hotboys.com.br/arquivos/<?php echo utf8_encode($mob_vitrine[cena_vitrine_mobile]) ?>" class="d-block w-100" alt="vitrine">
										</a>
									</div>
								<?php $counter_vitrine_mobile++; } ?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- Vitrine Desktop termina aqui -->
					</div>
				</div>	
				
			</section>
			
			
			
			<!-- SECTION - Cenas Audicoes Hot 3 -->
			<section class="audicoes-home">
				<div class="album">
					<div class="container">
						
						<div class="row">
							<div class="col-lg-12 mx-auto m-0 p-0">
								<h5 style="float:left">Audições Hot 3</h5>
								<a href="<?php echo URL ?>videos-audicoes/" class="more">Listar Todos</a>
							</div>
							
							
							<!-- Cenas Recentes -->
							<ul class="mb-0">
								<?php while ($row_audicoes =mysql_fetch_array ($consulta_cenas_audicoes)){ ?>
									
									<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
										<a href="<?php echo utf8_encode(URL.'cena-audicoes/'.$row_audicoes[id].'/'.URL_amigavel($row_audicoes[titulo])) ?>">
											<div class="card box-shadow my-xl-2">
												<div class="thumb">
													<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php if($row_audicoes[cena_home] != ''){
														echo $row_audicoes['cena_home'];
														}else{
														echo '0_cena.jpg';
													}
													?>" data-holder-rendered="true">
												</div>
												<div class="card-body">
													<h1 class="card-titulo"><?php echo utf8_encode($row_audicoes[titulo]) ?></h1>
													<!-- <p class="card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
												</div>
											</div>
										</a>
									</li>
									
								<?php } ?>
							</ul>
							
						</div>
					</div>
				</div>
			</section>
			
			
			<!-- SECTION - Videos recentes -->
			<section class="videos-recentes">
				<div class="album bg-dark">
					<div class="container">
						
						<div class="row">
							<div class="col-lg-12 mx-auto m-0 p-0">
								<h5 style="float:left">Saiu do Forno HOT</h5>
								<a href="<?php echo URL ?>videos/" class="more">Listar Todos</a>
							</div>
							
							
							<!-- Cenas Recentes -->
							<ul>
								<?php while ($row_cenas_recentes=mysql_fetch_array ($consulta_cenas_recentes)){ ?>
									<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
										<a href="<?php echo utf8_encode(URL.'cena/'.$row_cenas_recentes[id].'/'.URL_amigavel($row_cenas_recentes[titulo])) ?>">
											<div class="card mb-2 box-shadow my-xl-2">
												<div class="thumb">
													<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php if($row_cenas_recentes[cena_home] != ''){
														echo $row_cenas_recentes['cena_home'];
														}else{
														echo '0_cena.jpg';
													}
													?>" data-holder-rendered="true">
												</div>
												<div class="card-body">
													<h1 class="card-titulo"><?php echo utf8_encode($row_cenas_recentes[titulo]) ?></h1>
													<!-- <p class="card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
												</div>
											</div>
										</a>
									</li>
								<?php } ?>
							</ul>
							
						</div>
					</div>
				</div>
			</section>
			
			<!-- SECTION - Amadores Hot 
				<section class="videos-recentes amadores">
				<div class="album bg-light">
				<div class="container">
				
				<div class="row">
				<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
				<h5 style="float:left"><i class="fas fa-fire-alt"></i> Amadores HOT</h5>
				<a href="<?php //echo URL ?>videos/" class="more">Listar Todos</a>
				</div>
				
				
				
				<ul>
				<?php // consulta das cenas
					//$query_cenas_recentes="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 8";
					//$consulta_cenas_recentes=mysql_query($query_cenas_recentes);
				?>
				
				<?php //while ($row_cenas_recentes=mysql_fetch_array ($consulta_cenas_recentes)){ ?>
				<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
				<a href="<?php //echo utf8_encode(URL.'cena/'.$row_cenas_recentes[id].'/'.URL_amigavel($row_cenas_recentes[titulo])) ?>">
				<div class="card mb-2 box-shadow my-xl-2">
				<div class="thumb">
				<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php //if(//$row_cenas_recentes[cena_home] != ''){
					//echo $row_cenas_recentes['cena_home'];
					//}else{
					//echo '0_cena.jpg';
					//}
				?>" data-holder-rendered="true">
				</div>
				<div class="card-body">
				<h1 class="card-titulo"><?php //echo utf8_encode($row_cenas_recentes[titulo]) ?></h1>
				</div>
				</div>
				</a>
				</li>
				<?php //} ?>
				</ul>
				
				</div>
				</div>
				</div>
				</section>
			-->
			
			<!-- SECTION - Galeria de Modelos em destaque -->
			<section class="modelosDestaque">
				<div class="container">
					
					<!-- Titulo e Setas (estrutura) -->
					<div class="row titulo-galeria">
						<div class="col-lg-12 mx-auto pl-xl-0 pl-0">
							
							<!-- Titulo - Modelos do momento -->
							<h5 style="float:left">Modelos do momento</h5>
							
							<!-- SETAS Desktop - Modelos do momento  -->
							<div class="desktop mt-3" style="float:right" >
								<!-- seta anterior -->
								<a class="galeria-prev" href="#recipeCarousel" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Anterior</span>
								</a>
								
								<!-- seta proximo -->
								<a class="galeria-next" href="#recipeCarousel" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Próximo</span>
								</a>
							</div>
							
							<!-- SETAS Mobile - Modelos do momento  -->
							<div class="mobile" style="float:right">
								<!-- seta anterior -->
								<a class="galeria-prev" href="#recipeCarouselMobile" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Anterior</span>
								</a>
								
								<!-- seta proximo -->
								<a class="galeria-next" href="#recipeCarouselMobile" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Próximo</span>
								</a>
							</div>
							
						</div>
					</div>
					
					<!-- Galeria dos modelos -->
					<div class="row modelos-galeria">
						
						<!-- Carousel Desktop - Modelos do momento -->
						<div id="recipeCarousel" class="carousel desktop slide w-100" data-ride="carousel">
							<div class="carousel-inner w-100" role="listbox">
								
								<!-- Carousel com 4 modelos do momento -->
								<div class="carousel-item row no-gutters active desktop">
									<?php //Consulta Modelos do momento
										while($dados_modelos = mysql_fetch_array($consulta)){ 
											$query_modelo ="SELECT * FROM `modelos` WHERE id=$dados_modelos[id_conteudo]"; 
											$consulta_modelo = mysql_query($query_modelo);
											$dados_modelo = mysql_fetch_array($consulta_modelo);
										?>
										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 float-left modelo">
											<a href="<?php echo utf8_encode(URL.'ator/'.$dados_modelo[id].'/'.URL_amigavel($dados_modelo[nome])) ?>">
												
												<div class="thumb">
													<img class="img-fluid" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo['modelo_perfil']?>">
												</div>
												<div class="title desktop"><?php echo utf8_encode($dados_modelo['nome'])?></div>
											</a>
										</div>
									<?php  }   ?>
								</div>
								
								<!-- Carousel com 4 modelos do momento -->
								<div class="carousel-item row no-gutters">
									<?php //Consulta Modelos do momento
										while($dados_modelos2 = mysql_fetch_array($consulta2)){ 
											$query_modelo2 ="SELECT * FROM `modelos` WHERE id=$dados_modelos2[id_conteudo]"; 
											$consulta_modelo2 = mysql_query($query_modelo2);
											$dados_modelo2 = mysql_fetch_array($consulta_modelo2);
										?>
										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 float-left modelo">
											<a href="<?php echo utf8_encode(URL.'modelo/'.$dados_modelo2[id].'/'.URL_amigavel($dados_modelo2[nome])) ?>">
												
												<div class="thumb">
													<img class="img-fluid" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo2['modelo_perfil']?>">
												</div>
												<div class="title desktop"><?php echo utf8_encode($dados_modelo2['nome'])?></div>
											</a>
										</div>
									<?php  }   ?>
								</div>
							</div>
						</div>
						
						<!-- Carousel Mobile - Modelos do momento -->
						<div id="recipeCarouselMobile" class="carousel mobile slide w-100" data-ride="carousel">
							<div class="carousel-inner w-100" role="listbox">
								
								<!-- Carousel com 3 modelos do momento -->
								<div class="carousel-item row no-gutters active">
									<?php //Consulta Modelos do momento
										while($dados_modelos_mobile = mysql_fetch_array($consulta_mobile)){ 
											$query_modelo_mobile ="SELECT * FROM `modelos` WHERE id=$dados_modelos_mobile[id_conteudo]"; 
											$consulta_modelo_mobile = mysql_query($query_modelo_mobile);
											$dados_modelo_mobile = mysql_fetch_array($consulta_modelo_mobile);
										?>
										<div class="col-xl-4 col-md-4 col-sm-4 col-4 float-left modelo">
											<a href="<?php echo utf8_encode(URL.'modelo/'.$dados_modelo_mobile[id].'/'.URL_amigavel($dados_modelo_mobile[nome])) ?>">
												<div class="thumb">
													<img class="img-fluid" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_mobile['modelo_perfil']?>">
													<div class="title mobile"><?php echo utf8_encode(substr($dados_modelo_mobile['nome'], 0, 10))?>...</div>
												</div>
											</a>
										</div>
									<?php }   ?>
								</div>
								
								
								<!-- Carousel com 4 modelos do momento -->
								<div class="carousel-item row no-gutters">
									<?php //Consulta Modelos do momento
										while($dados_modelos_mobile2 = mysql_fetch_array($consulta_mobile2)){ 
											$query_modelo_mobile2 ="SELECT * FROM `modelos` WHERE id=$dados_modelos_mobile2[id_conteudo]"; 
											$consulta_modelo_mobile2 = mysql_query($query_modelo_mobile2);
											$dados_modelo_mobile2 = mysql_fetch_array($consulta_modelo_mobile2);
										?>
										<div class="col-xl-4 col-md-4 col-sm-4 col-4 float-left modelo">
											<a href="<?php echo utf8_encode(URL.'modelo/'.$dados_modelo_mobile2[id].'/'.URL_amigavel($dados_modelo_mobile2[nome])) ?>">
												<div class="thumb">
													<img class="img-fluid" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_mobile2['modelo_perfil']?>">
													<div class="title mobile"><?php echo utf8_encode(substr($dados_modelo_mobile2['nome'], 0, 10))?>...</div>
												</div>
											</a>
										</div>
									<?php }   ?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			
			
			<!-- SECTION - Conteudo -->
			<section class="conteudo">
				<div class="container">
					
					<!-- Titulo - hotvips assistindo agora -->
					<div class="row justify-content-between">
						<div class="col-lg-12 mx-auto m-0 p-0">
							<h5>Hotvips assistindo agora</h5>
						</div>
						
						
						
						<!-- Conteudo - hotvips assistindo agora -->
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 destaques">
							
							<!-- Destaque desktop -->
							<div class="card principal desktop">
								
								<!-- Link do Destaque - Hotvips -->
								<a href="<?php echo utf8_encode(URL.'cena/'.$linha_hotvips[id].'/'.URL_amigavel($linha_hotvips[titulo])) ?>">
									
									<!-- Imagem da cena e textos -->
									<div class="conteudo">
										<div class="thumb">
											<!-- Imagem da cena -->
											<img src="https://server2.hotboys.com.br/arquivos/<?php echo $linha_hotvips['cena_home'];?>" class="destaque" />
										</div>
										<!-- Textos -->
										<div class="right">
											<div class="titulo"><?php echo utf8_encode($linha_hotvips['titulo']) ?></div>
											<div class="subtitulo"><p><?php print(limitarTexto($linha_hotvips['descricao'], 250, FALSE)); ?></p></div>
										</div>
									</div>
									
									<!-- Elenco e botao assista agora -->
									<div class="infos"> 
										<!-- Elenco -->
										<div class="elenco">Elenco: 
											
										</div>
										<!-- Botao assista agora -->
										<div class="botoes">
											<div class="button">ASSISTA AGORA</div>
										</div>
									</div>
									
								</a>
								
							</div>
							
							<!-- Destaque mobile -->
							<div class="card principal mobile">
								<a href="<?php echo utf8_encode(URL.'cena/'.$linha_hotvips[id].'/'.URL_amigavel($linha_hotvips[titulo])) ?>">
									<div class="thumb">
										<img src="https://server2.hotboys.com.br/arquivos/<?php echo $linha_hotvips['cena_home'];?>" class="destaque" />
									</div>
									
									<div class="titulo"><?php echo utf8_encode($linha_hotvips['titulo']) ?></div>
								</a>
							</div>
							
							
							<div class="container my-xl-4 demais-cenas">
								<div class="row">
									
									<ul>
										<!-- Cenas -->
										<?php
											while($row_hotvips = mysql_fetch_array($consulta_visitou)){
												// traz os dois ultimos ensaios do sexo hot
												$query_hotvips ="SELECT * FROM `cenas` WHERE id=$row_hotvips[id_conteudo] AND status='Ativo' LIMIT 6";
												$consulta_hotvips = mysql_query($query_hotvips);
												$linha_hotvips = mysql_fetch_array($consulta_hotvips);
											?>
											<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 cenas">
												<a href="<?php echo utf8_encode(URL.'cena/'.$linha_hotvips[id].'/'.URL_amigavel($linha_hotvips[titulo])) ?>">
													<div class="card mb-2 box-shadow my-xl-2">
														<div class="thumb">
															<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php if($linha_hotvips[cena_home] != ''){
																echo $linha_hotvips['cena_home'];
																}else{
																echo '0_cena.jpg';
															}
															?>" data-holder-rendered="true">
														</div>
														<div class="card-body">
															<h1 class="card-titulo"><?php echo utf8_encode($linha_hotvips['titulo']) ?></h1>
															<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
														</div>
													</div>
												</a>
											</li>
										<?php } ?>
									</ul>
									
								</div>
							</div>
							
							
							
						</div>
						
						<!-- SIDEBAR -->
						<div class="col-xl-4 col-lg-4 col-md-4 sidebar">
							<div class="mais-acessados">
								<h5 class="m-0">Mais vistos da semana</h5>
								
								<ol>
									<?php while($dados_categoria = mysql_fetch_array($consulta_categoria)){ ?>
										<li class="alta">
											<a href="<?php echo utf8_encode(URL.'cena/'.$dados_categoria[id].'/'.URL_amigavel($dados_categoria[titulo])) ?>">
												<div class="thumb">
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[cena_home]?>" alt="" title="" />
												</div>
												<div class="titulo"><?php echo utf8_encode($dados_categoria[titulo]) ?></div>
											</a>
										</li>
									<?php } ?>
									
								</ol>
								
							</div>
						</div>
						
						<img src="<?php echo URL ?>novo-projeto/assets/img/series/banner-series-home.png" style="width:100%;margin-bottom:3rem"/>
					</div>
					
					
					
				</div>
			</section>
		</div>
		
		<!-- Botão de rolagem para o topo (Visível apenas em tamanhos pequenos e extra-pequenos) 
			<div class="scroll-to-top d-lg-none position-fixed ">
			<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
			<i class="fa fa-chevron-up"></i>
			</a>
			</div>
		-->
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include ($javascript); ?>
		
	</body>
</html>						