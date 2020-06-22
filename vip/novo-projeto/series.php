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
	
	//Variavel perfil do usuario
	include_once($perfil_usuario);
	
	// tras via GET as variaveis 
	$s = addslashes($_GET[s]);
	$pag = addslashes($_GET[pag]); 
	
	// SE FOR SOMENTE BUSCA
	//$pag = $rotas[3]; 
	//$s = $rotas[2];
	
	//se consulta houver v  consulta por visualizaçoes
	if($s == 'v'){
		$complemento = 'ORDER BY visualizacao DESC';
	}
	//se consulta houver r consulta por Random
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
	$query_paginacao = "SELECT * FROM cena_serie_info WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
	$consulta_paginacao = mysql_query($query_paginacao);
	$totalVideos_cena = mysql_num_rows($consulta_paginacao);
	$totalPaginas = ceil($totalVideos_cena / 21);
	
	$Paginacao->SiteLink = ''; 
	#####paginação
	$Paginacao = new Paginacao;
	$Paginacao->NumPgLaterais = $totalPaginas;
	//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
	
	if($s != ''){
		$Paginacao->SiteLink = URL_VIP.'series_cenas.php?s='.$s;	
		}else{
		$Paginacao->SiteLink = URL_VIP.'series';
	}
	
	#####consulta videos da página
	if($pgAtual == 1){
		$inicio_consulta = '0';
		} else {
		$inicio_consulta = ($pgAtual - 1) * 20;
	}
	//Tras todos os videos 
	$query_series = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' AND `id` NOT IN('19') $complemento LIMIT $inicio_consulta, 24";
	$consulta_series = mysql_query($query_series);
	$total = mysql_num_rows($consulta_series);
	
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Séries Gays HotBoys - As melhores Séries com Homens Fodendo.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="series">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ('includes/estrutura/topo/nav-topo.php'); ?>
			
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
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <h5>Lista de Séries</h5>
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
											<?php while($row_conteudo = mysql_fetch_array($consulta_series)){ ?>	
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'serie-cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
														<div class="card mb-2 box-shadow my-xl-2">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[imagem_serie_lista]?>" data-holder-rendered="true">
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
											<li class="page-item"><a class="page-link" href="#">Anterior</a></li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">4</a></li>
											<li class="page-item"><a class="page-link" href="#">5</a></li>
											<li class="page-item"><a class="page-link" href="#">Próxima</a></li>
										</ul>
									</nav>
									
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
			
			</body>
		</html>												