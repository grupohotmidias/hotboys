<?php
	// variaveis dos arquivos de configuracao
	//require('configuracoes/configuracoes.php');
	
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	

	
	require_once('../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	// Se mobile
	if ($detect->isMobile()){
		
		//numeros de resultados se mobile
			$num_result_lista1 = 4;
			$num_result_lista2 = 8;
			$num_result_lista3 = 7;
		
	}else{
		//numeros de resultados se NAO mobile
			$num_result_lista1 = 4;
			$num_result_lista2 = 8;
			$num_result_lista3 = 8;
	}
				
			
	
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//Variavel perfil do usuario
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//variavel da programacao perfil
	$programacao_perfil = 'includes/paginas/perfil-usuario.php';
	
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
	
	//variavel que puxa o modal de duvidas frequentes
	$duvidas_frequentes = '../novo-projeto/includes/modal/rodape/duvidas-frequentes.php';
	
	//variavel que puxa o modal de termos de uso
	$termos = '../novo-projeto/includes/modal/rodape/termos-uso.php';
	
	//variavel do rodape
	$footer = 'includes/estrutura/rodape/footer.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//Variaveis dos arquivos de configuracao
	include_once($vip_page);
	
	//class paginação
	require_once($paginacaoConteudoClass);
	
	
	
	//Variavel dos arquivos de configuracao
	include_once($programacao_perfil);
	
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
		$query_paginacao = "SELECT * FROM cenas WHERE status='Ativo' $complemento";
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
		$query_paginacao = "SELECT * FROM cenas WHERE status='Ativo' $complemento";
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
		$query_cenas = "SELECT * FROM `cenas` WHERE status='Ativo' ORDER BY id DESC LIMIT $num_result_lista3";
		$consulta_cenas = mysql_query($query_cenas);
		$total = mysql_num_rows($consulta_cenas);
		
		//Tras todos os videos antigos
		if ($detect->isMobile()) {
		$query_cenas_antigas = "SELECT * FROM `cenas` WHERE status='Ativo' AND `data` BETWEEN '1356998400' AND '1480550400' ORDER BY visualizacao LIMIT 5";
		}else{
		$query_cenas_antigas = "SELECT * FROM `cenas` WHERE status='Ativo' AND `data` BETWEEN '1356998400' AND '1480550400' ORDER BY visualizacao LIMIT $num_result_lista1";
		}
		$consulta_cenas_antigas = mysql_query($query_cenas_antigas);
		$total_antigo = mysql_num_rows($consulta_cenas_antigas);
		
	}
	
	
	//Mais Leitadas do dia
	$data_gozadas_1 = date('Y-m-d', strtotime('-1 days')); 
	
	// consulta a lista de gozadas - verifica os ultimos videos com mais gozadas
	if ($detect->isMobile()) {
	$query_gozei = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_1' GROUP BY id_cena ORDER BY gozadas DESC LIMIT 5";
	}else{
	$query_gozei = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_1' GROUP BY id_cena ORDER BY gozadas DESC LIMIT $num_result_lista1";
	}
	//$query_gozei = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_1' GROUP BY id_cena ORDER BY id DESC LIMIT $num_result_lista1";
	$consulta_gozei = mysql_query($query_gozei);
    $tota_gozei = mysql_num_rows($consulta_gozei);	
	
	//---------------------------------------------------------

	//Mais Leitadas do mes
	$data_gozadas_mes = date('Y-m-d', strtotime('-30 days')); 
	
	// consulta a lista de gozadas - verifica os ultimos videos com mais gozadas
	if ($detect->isMobile()) {
	$query_gozei_mes = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_mes' GROUP BY id_cena ORDER BY gozadas DESC LIMIT 5";
	}else{
	$query_gozei_mes = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_mes' GROUP BY id_cena ORDER BY gozadas DESC LIMIT $num_result_lista1";
	}

	//$query_gozei_mes = "SELECT COUNT(*) AS gozadas, id_cena FROM usuarios_gozei Where data > '$data_gozadas_1' GROUP BY id_cena ORDER BY id DESC LIMIT $num_result_lista1";
	$consulta_gozei_mes = mysql_query($query_gozei_mes);
    $tota_gozei_mes = mysql_num_rows($consulta_gozei_mes);	
	
	//---------------------------------------------------------


	// Consulta para os 5 videos mais acessados / em alta
	$date = date('Y-m-d', strtotime('-7 days')); 
	$data_cenas_semana = date_timestamp_get($date);
	 

	$query_mais_vistas ="SELECT * FROM `cenas` ORDER BY visualizacao DESC LIMIT 6";
	$consulta_mais_vistas = mysql_query($query_mais_vistas);
	
	
	
	// Consulta da vitrine
	$query_vitrine = "SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 5";
	$consulta_vitrine  = mysql_query($query_vitrine );
	
	// Vitrine adicional
	$counter = 1;
	$query_vitrine_adicional = "SELECT * FROM `vitrine` WHERE status='ativo'  AND exibicao='vip' order by  id DESC LIMIT 2";
	$consulta_vitrine_adicional = mysql_query($query_vitrine_adicional); 
	//-----------------------------------------------------------------
	
	//VISITOU AGORTA
	if ($detect->isMobile()) {
	$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT 7";
	}else{
	$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao='Todos'  GROUP BY id_conteudo ORDER BY id DESC LIMIT $num_result_lista2";
	}
	$consulta_visitou = mysql_query($query_visitou);
	$total_visitou = mysql_num_rows($consulta_visitou);
	$falta = 6 + $total_visitou;
	
	//-------------------------------------------------------------------
	
	//MODELOS DA SEMANA 
	$query_modelos= "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta  desc limit 1 ";
	$consulta_modelos = mysql_query($query_modelos);
	$total_modelos_modelos = mysql_num_rows($consulta_modelos);
	
	while($dados_modelos = mysql_fetch_array($consulta_modelos)){ 
									//Consulta Modelos 
	$query_modelo ="SELECT * FROM `modelos` WHERE id='$dados_modelos[id_conteudo]'   LIMIT 1"; 
	$consulta_modelo = mysql_query($query_modelo);
	$dados_modelo = mysql_fetch_array($consulta_modelo); 
	
	echo '<!--';
	echo $dados_modelo[nome];
	echo '-->';
	}	



	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento está ok	
		verificar_pgto();
	}

	$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);


	if( $_SESSION['en'] == 'true') {
		header("Location: http://www.hotboys.com.br/en/vip/");
	}

?>
<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 HOTBOYS O Site Mais Quente da Net !</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="Site Hot Boys -  O site mais quante da Net!.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>

	</head>
	
	<body class="vip home">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
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
								</ol>
								
								<div class="carousel-inner">
									
									<!-- Vitrine adicionnal -->
									<?php while($dados_vitrine_adicional = mysql_fetch_array($consulta_vitrine_adicional)){ ?>
										<div class="carousel-item <?php if($counter <= 1){echo " vitrine"; }?>">
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
										<div class="carousel-item <?php if($counter <= 1){echo " active"; } ?>">
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
								<?php if ($detect->isMobile()) { ?>
								<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
								<?php }else{?>
								<div class="page-title-heading">
								<?php } ?>
									<h5 style="font-weight:700!important;">As Mais Leitadas do Dia 
									</h5>
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
												<?php
												$operador_leit_dia = 0;
													while($row_voto = mysql_fetch_array($consulta_gozei)){
														$sql_video = "SELECT * FROM cenas WHERE id='$row_voto[id_cena]'";
														$consulta_video = mysql_query($sql_video);
														$row_video = mysql_fetch_array($consulta_video);
														$operador_leit_dia++;
													?>
													
													<?php if ($operador_leit_dia == 1){ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 cenas p-1">
													<?php }else{ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<?php } ?>
														<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_video[id].'/'.URL_amigavel($row_video[titulo])) ?>">										
															<div class="card mb-2 box-shadow">
																
																<!-- imagem da cena -->
																<div class="thumb">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_video[cena_home] ?>" data-holder-rendered="true">
																</div>
																
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo utf8_encode($row_video['titulo'])?></h1>
																</div>
																
															</div>
														</a>
													</li>
												     <?php } 
												
												
													if($tota_gozei < 4){
															
														$falta_gozadas = 4 - $tota_gozei;
														
														$query_gozei = "SELECT * FROM `usuarios_gozei`  ORDER  BY RAND() LIMIT $falta_gozadas ";
														$consulta_gozei = mysql_query($query_gozei);
														
														while($row_voto = mysql_fetch_array($consulta_gozei)){
															
															$sql_video = "SELECT * FROM cenas WHERE id='$row_voto[id_cena]'";
															$consulta_video = mysql_query($sql_video);
															$row_video = mysql_fetch_array($consulta_video);
														?>
														
														<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_video[id].'/'.URL_amigavel($row_video[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_video[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_video['titulo'])?></h1>
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
													<?php }
													}?>
										</ul>
									</div>
									
						<!-- Titulo do conteudo -->
						<div class="app-page-title">
							<div class="page-title-wrapper">
								<?php if ($detect->isMobile()) { ?>
								<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
								<?php }else{?>
								<div class="page-title-heading">
								<?php } ?>
									<h5 style="font-weight:700!important;">VIPs Assistindo No Momento  </h5>
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
						<?php			
						$operador_visitou_agora = 0;
						while($row = mysql_fetch_array($consulta_visitou)){
						// traz os dois ultimos ensaios do sexo hot
						$query ="SELECT * FROM `cenas` WHERE id=$row[id_conteudo] AND status='Ativo' LIMIT 1";
						$consulta = mysql_query($query);
						$row_conteudo = mysql_fetch_array($consulta);
						$operador_visitou_agora++;
						 ?>
						 	<?php if ($operador_visitou_agora == 1){ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 cenas p-1">
													<?php }else{ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<?php } ?>
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo['titulo'])?></h1>
															</div>
															
														</div>
													</a>
												</li>
						 
						 
						 <?php } ?>
						 
						</ul>					
					</div>
						<!-- Titulo do conteudo -->
						<div class="app-page-title">
							<div class="page-title-wrapper">
								<?php if ($detect->isMobile()) { ?>
								<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
								<?php }else{?>
								<div class="page-title-heading">
								<?php } ?>
									<h5 style="font-weight:700!important;">Saiu do Forno Hot  </h5>
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
											<?php $i =0 ; //controle
											while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>
											
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 cenas p-1">
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
											 <?php
												 $i++;
												if($i == 1) break ;	
											 } 
											 
											 while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>
											
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
											 <?php
												 $i++;
												if($i == 1) continue ;	
											 }?>
										</ul>
										
									</div>
									
									
									
								</div>
								
							</section>
							
									<!-- Titulo do conteudo -->
						<div class="app-page-title">
							<div class="page-title-wrapper">
								<?php if ($detect->isMobile()) { ?>
								<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
								<?php }else{?>
								<div class="page-title-heading">
								<?php } ?>
									<h5 style="font-weight:700!important;">As Mais Leitadas do Mês
									</h5>
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
												<?php
												$operador_leit_mes = 0;
													while($row_voto_mes = mysql_fetch_array($consulta_gozei_mes)){
														$sql_video_mes = "SELECT * FROM cenas WHERE id='$row_voto_mes[id_cena]'";
														$consulta_video_mes = mysql_query($sql_video_mes);
														$row_video_mes = mysql_fetch_array($consulta_video_mes);
														$operador_leit_mes++;
													?>
														<?php if ($operador_leit_mes == 1){ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 cenas p-1">
													<?php }else{ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<?php } ?>
														<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_video_mes[id].'/'.URL_amigavel($row_video_mes[titulo])) ?>">										
															<div class="card mb-2 box-shadow">
																
																<!-- imagem da cena -->
																<div class="thumb">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_video_mes[cena_home] ?>" data-holder-rendered="true">
																</div>
																
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo utf8_encode($row_video_mes['titulo'])?></h1>
																</div>
																
															</div>
														</a>
													</li>
												     <?php } 
												
												
													if($tota_gozei_mes < 4){
															
														$falta_gozadas_mes = 4 - $tota_gozei_mes;
														
														$query_gozei_mes = "SELECT * FROM `usuarios_gozei`  ORDER  BY RAND() LIMIT $falta_gozadas_mes ";
														$consulta_gozei_mes = mysql_query($query_gozei_mes);
														
														while($row_voto_mes = mysql_fetch_array($consulta_gozei_mes)){
															
															$sql_video_mes = "SELECT * FROM cenas WHERE id='$row_voto_mes[id_cena]'";
															$consulta_video_mes = mysql_query($sql_video_mes);
															$row_video_mes = mysql_fetch_array($consulta_video_mes);
														?>
														
														<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_video_mes[id].'/'.URL_amigavel($row_video_mes[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_video_mes[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_video_mes['titulo'])?></h1>
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
													<?php }
													}?>
										</ul>
									</div>
											
						<!-- Titulo do conteudo -->
						<div class="app-page-title">
							<div class="page-title-wrapper">
								<?php if ($detect->isMobile()) { ?>
								<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
								<?php }else{?>
								<div class="page-title-heading">
								<?php } ?>
									<h5 style="font-weight:700!important;">Você Se Lembra Dessas Cenas?  </h5>
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
											<?php $i =0 ; //controle
											while($row_conteudo_antigos = mysql_fetch_array($consulta_cenas_antigas)){ ?>
											
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_conteudo_antigos[id].'/'.URL_amigavel($row_conteudo_antigos[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo_antigos[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo_antigos['titulo'])?></h1>
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
											 <?php
												 $i++;
												if($i == 1) break ;	
											 } 
											 
											 while($row_conteudo_antigos = mysql_fetch_array($consulta_cenas_antigas)){ ?>
											
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$row_conteudo_antigos[id].'/'.URL_amigavel($row_conteudo_antigos[titulo])) ?>">										
														<div class="card mb-2 box-shadow">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo_antigos[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo_antigos['titulo'])?></h1>
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
											 <?php
												 $i++;
												if($i == 1) continue ;	
											 }?>
										</ul>
										
									</div>
									
									
									
								</div>

							<!-- videos mais populares -->
							<section class="populares">
								<div class="container-fluid" style="padding:0">
									
									<!-- Titulo - videos mais populares -->
									<div class="app-page-title">
										<div class="page-title-wrapper">
											
											<!-- Titulo do conteudo -->
											<?php if ($detect->isMobile()) { ?>
											<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
											<?php }else{?>
											<div class="page-title-heading">
											<?php } ?>
												<h5>Cenas Hot Mais Vistas da Semana</h5>
											</div>
											
										</div>
									</div>
									
									<!-- Cenas - videos mais populares -->	
									<div class="row">
										<ul>
											<!-- Consulta cenas -->
											<?php while($dados_categoria = mysql_fetch_array($consulta_mais_vistas)){ ?>
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

							<div class="container-fluid" style="padding: 0px;margin-bottom: 435px;">
							<?php 
								// NOT INde todos
							date_default_timezone_set("America/Sao_Paulo");
							//verifica tempo e tempo menos 7
							$tempo = gmdate("Y-m-d", strtotime("-7 days"));
							$hoje = gmdate("Y-m-d");
							$qry_rede = "SELECT * FROM `rede_social` WHERE `status`='Ativo' ORDER BY id desc limit 6";
							$consulta_rede = mysql_query($qry_rede);
							$total_rede = mysql_num_rows($consulta_rede);
							if ($total_rede >0){
						?>	
									<!-- Titulo - videos mais populares -->
									<div class="app-page-title">
										<div class="page-title-wrapper">
											
											<!-- Titulo do conteudo -->
											<?php if ($detect->isMobile()) { ?>
											<div class="page-title-heading" style="background-color:#dc0505;padding: 10px 0px 1px 0px;">
											<?php }else{?>
											<div class="page-title-heading">
											<?php } ?>
												<h5>HOT POST</h5>
											</div>
											
										</div>
									</div>

							<?php
							}
							while ($dados_rede=mysql_fetch_array ($consulta_rede))	{	?>
								
							<?php if ($detect->isMobile()) { ?>

								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4" style="border:0px !important;padding:0px;float:left;">

									<div>
										<?php if($dados_rede['media'] == ""){?>
										<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>">

											<img style="width:100%;" class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>" alt="">
										<?php }else{?>
										
											<video style="width:97%;"  controls autoplay="true">
												<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['media']?>" type="video/mp4">
											</video>
										<?php }?>
										</a> 

									</div>
									


								</div>

								<?php } else { ?>

								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12 cenas p-1" style="float:left;">

									<div>
										<?php if($dados_rede['media'] == ""){?>
										<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>">

											<img style="width:100%;" class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['img']?>" alt="">
										<?php }else{?>
										<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['media']?>">
											<video style="width:99.9%;" width="272" controls>
												<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_rede['media']?>" type="video/mp4">
											</video>
										<?php }?>
										</a> 

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
					
							</div>
						<?php if ($detect->isMobile()) { ?>
						<br>
						<br>
						<?php } ?>
							<!-- Footer -->
							<?php include_once ($footer); ?>
							
						</div>
						<!-- ## FIM Conteudo da pagina ## -->
						
						
					
					
				</div>
				
				
			</div>
			
			
			
		</div>
		
		
	</div>
	
	<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
	
	<!-- Javascript tooltips do formulario -->	
	<script>	
	$(function(){ $('[data-toggle="cenaFavorita"]').tooltip()})
	</script>
	
	<!-- ##Botão Whatsapp no Rodape## -->
	<!-- Icone do whatsapp
		<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
		<!-- Icone do whatsapp
		<i style="margin-top:16px" class="fab fa-whatsapp"></i>
		<p>Atendimento</p>
		</a>
	-->
	
	<!--  Chama Modal - Contato -->
	<?php include_once ($contato); ?>
	
	<!--  Chama Modal - Duvidas Frequentes -->
	<?php include_once ($duvidas_frequentes); ?>
	
	<!--  Chama Modal - Termos de Uso -->
	<?php include_once ($termos); ?>
	
	
		
	
	<?php
		if($AbrirIframePagamento){
		?>		
		<a id="iframe-gpagamentos" data-fancybox data-type="iframe" data-src="https://www.gpagamentos.com.br/1/iframe.php?id=<?php echo $id_email_gpagamentos ?>" href="javascript:void(0);" style="display:none"></a>
		<script>
			$(document).ready(function() { 
				$('[data-fancybox]').fancybox({
					iframe : {
						css : {
							width : '100%'
						}
					},
					toolbar : true,
					buttons : [						
					'close'
					],
				})
				
				$('#iframe-gpagamentos').trigger('click');
			});
		</script>
	<?php } ?>	
	
	<?php
		require('includes/hotmidias/js.php');
	?>
	
</body>
</html>																					