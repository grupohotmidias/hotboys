<?php
	// variaveis dos arquivos de configuracao
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//Variavel perfil do usuario
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$paginacaoConteudoClass = 'includes/PaginacaoConteudoClass.php';
	
	//variavel programacao das cenas
	$programacao_Cenas = 'includes/paginacao/programacao-cenas.php';
	
	//variavel do nav topo
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';
	
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
	
	// tras via GET as variaveis 
	$s = addslashes($_GET[s]);
	$pag = addslashes($_GET[pag]);
    $tag = addslashes($_GET[tag]);
	$tag = explode("-",$tag);
    $tag = implode(" ",$tag);
	
	$counter = 1;
	
	//SE HOUVER TAG
	if($tag != ''){
		
		//SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query_paginacao = "SELECT * FROM cenas WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'tag/'.$tag;
		
		#####consulta videos da página
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual - 1) * 24;
		}
		
        $query_categoria ="SELECT * FROM `categorias` WHERE categoria='$tag' $complemento  ";
        $consulta_categoria = mysql_query($query_categoria);    
        $dados_categoria = mysql_fetch_array($consulta_categoria);
        
        $query_categoria_conteudo = "SELECT * FROM `categorias_conteudo` WHERE id_categoria=$dados_categoria[id] AND pagina='Video Hot'  $complemento LIMIT $inicio_consulta, 24";
        $consulta_categoria_conteudo = mysql_query($query_categoria_conteudo);
        
        //SE NÃO HOUVER TAG
		}else{
		
		// SE FOR SOMENTE BUSCA
		//$pag = $rotas[3]; 
		//$s = $rotas[2];
		//se consulta houver v  consulta por visualizaçoes
		if($s == 'v'){
			$complemento = 'ORDER BY visualizacao DESC';
		}
		//se consulta houver a consulta por Random
		if($s == 'a'){
			$complemento = 'ORDER BY RAND()';
		}
		//se consulta houver r consulta por ordem
		if($s == 'r' or $s == ''){
			$complemento = 'ORDER BY id DESC';
		}
        
		
		//SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query_paginacao = "SELECT * FROM cenas WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL_VIP.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'home';
		
		#####consulta videos da página
		#####consulta videos da página 
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual -1) * 24;
		}
		//Tras todos os videos 
		$query_cenas = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' $complemento LIMIT $inicio_consulta, 24";
		$consulta_cenas = mysql_query($query_cenas);
		$total = mysql_num_rows($consulta_cenas);
		
		// consulta das cenas
		//$query_cenas="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 24";
		//$consulta_cenas=mysql_query($query_cenas); 
	}
?>
<?php 
	// Consulta para os 5 videos mais acessados / em alta
	$query_categoria ="SELECT * FROM `cenas` ORDER BY visualizacao DESC limit 6";
	$consulta_categoria = mysql_query($query_categoria);
	
	// Consulta da vitrine
	$query_vitrine ="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 5";
	$consulta_vitrine  = mysql_query($query_vitrine );
	
	// Vitrine adicional
	$query_vitrine_adicional = "SELECT * FROM `vitrine` WHERE status='ativo'  AND exibicao='vip' limit 1";
	$consulta_vitrine_adicional = mysql_query($query_vitrine_adicional);
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
	</head>
	
	<body class="vip home">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
				<div class="app-main__outer mt-2">
                    <div class="app-main__inner">
						
						
						<!-- Vitrine -->
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							
							<!-- Lista ordenada da vitrine -->
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
							</ol>
							
							<div class="carousel-inner">
								
								<!-- Vitrine adicionnal -->
								<?php while($dados_vitrine_adicional = mysql_fetch_array($consulta_vitrine_adicional)){ ?>
									<div class="carousel-item <?php if($counter <= 1){echo " active"; }?>">
										<a href="<?php echo $dados_vitrine_adicional['link'] ?>">
											
											<!-- imagem da vitrine adicional mobile -->
											<img class="d-block w-100 mobile" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem_mobile'] ?>" alt="vitrine mobile">
											
											<!-- imagem da vitrine adicional desktop -->
											<img class="d-block w-100 desktop" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem'] ?>" alt="vitrine">
											
										</a>
									</div>
								<?php $counter++; }	?>		
								
								<!-- Vitrine fixa (sem ser adicional) -->
								<?php while($dados_vitrine = mysql_fetch_array($consulta_vitrine)){ ?>
									<div class="carousel-item <?php if($counter <= 1){echo " vitrine"; } ?>">
										<a href="<?php echo utf8_decode(URL_VIP.'cena/'.$dados_vitrine[id].'/'.URL_amigavel($dados_vitrine[titulo])) ?>"> 
											
											<!-- imagem da vitrine fixa mobile -->
											<img class="d-block w-100 mobile" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine_mobile'] ?>" alt="vitrine mobie">
											
											<!-- imagem da vitrine fixa desktop -->
											<img class="d-block desktop w-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine'] ?>" alt="vitrine">
										</a>
									</div>
								<?php $counter++; }	?>	
							</div>
							
							
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						
						
						<!-- Titulo do conteudo -->
						<div class="app-page-title">
							<div class="page-title-wrapper">
								<div class="page-title-heading">
									<h5>Lista de Vídeos</h5>
								</div>
							</div>
						</div>    
						
						<!-- Main Content -->
						<div id="content">
							
							<!-- videos com paginacao -->
							<section class="cenas m-0">
								<div class="container-fluid" style="padding:0">
									
									<!-- CENAS -->
									<div class="row">
										
										<!-- Consulta cenas -->
										<ul>
											<?php while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>	
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo['titulo'])?></h1>
																<!--
																	<div class="curtidas d-flex justify-content-between align-items-center">
																	<div class="btn-group">
																	<button type="button" class="btn btn-sm like">
																	<img src="<?php echo URL ?>novo-projeto/assets/img/icones/like.png"/> 22
																	</button>
																	<button type="button" class="btn btn-sm deslike">
																	<img src="<?php echo URL ?>novo-projeto/assets/img/icones/deslike.png"/> 0
																	</button>
																	</div>
																	
																	<!-- Botao para adicionar a cena como favoritada 
																	<div class="addFavoritos">
																	<a href="" style="padding: 14px">
																	<i class="fas fa-star" aria-hidden="true" data-toggle="cenaFavorita" data-placement="top" title="Escolha a cena como favorita"></i> 
																	</a>
																	</div>
																	
																	</div>
																-->
															</div>
															
														</div>
													</a>
												</li>
											<?php } ?>
										</ul>
										
									</div>
									
									<!-- paginacao -->
									<nav aria-label="Page navigation example" class="navigation">
										<ul class="pagination justify-content-center">
											<?php //Se a paginação estiver em um numero maiso que 1 aparece o voltar
												if($pgAtual > 1){ ?>																		
												<li class="page-item"><a class="page-link" href="<?php echo URL_VIP.'home/'.(-$Paginacao +$pgAtual) ?>">Anterior</a></li>
											<?php } ?>	
											
											<?php //Numeros botoes paginação
											echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>  
											
											<?php //Botao avançar
												if($pgAtual < $totalPaginas){ ?>														
												<li class="page-item"><a class="page-link" href="<?php echo URL_VIP.'home/'.($Paginacao +$pgAtual) ?>">Próxima</a></li>	
											<?php } ?>			
										</ul>
									</nav>
									
								</div>
								
							</section>
							
							<!-- videos mais populares -->
							<section class="populares">
								<div class="container-fluid" style="padding:0">
									
									<!-- Titulo - videos mais populares -->
									<div class="app-page-title">
										<div class="page-title-wrapper">
											
											<!-- Titulo do conteudo -->
											<div class="page-title-heading">
												<h5>Mais Vistos da Semana</h5>
											</div>
											
										</div>
									</div>
									
									<!-- Cenas - videos mais populares -->	
									<div class="row">
										<ul>
											<!-- Consulta cenas -->
											<?php while($dados_categoria = mysql_fetch_array($consulta_categoria)){ ?>
												<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$dados_categoria[id].'/'.URL_amigavel($dados_categoria[titulo])) ?>">
														<div class="card mb-1 box-shadow my-xl-2">
															
															<!-- titulo dos videos populares -->
															<h1 class="card-titulo"><?php echo utf8_encode($dados_categoria[titulo]) ?></h1>
															
															<!-- botao curtidas dos videos populares 
																<div class="votos">
																<div class="like"><i class="icon"></i> 75
																</div>
																</div>
															-->
															
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[cena_home]?>" data-holder-rendered="true">
															</div>
														</div>
													</a>
												</li>
											<?php } ?>
										</ul>
									</div>
									
									
								</div>
							</section>
							
							
							
						</div>
						<!-- End of Main Content -->
						
						
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
			</div>
			
		</body>
	</html>																			