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
	
	//Variavel da class paginação
	$class = '../includes/PaginacaoConteudoClass.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//requer arquivo class paginação
	require_once($class);
?>

<?php 
	// tras id
	$id = addslashes($_GET[id]);
	
	//Palavra da busca
	$palavra = addslashes(utf8_decode($_POST['search']));  
	if ($_POST["search"] != ''){ 
		$query1 = "SELECT * FROM `cenas` WHERE status='Ativo' AND titulo LIKE  '%".$palavra."%' OR descricao LIKE '%".$palavra."%'  
		AND `status`='Ativo' AND `exibicao`='Todos' AND cena_home<>''  ORDER BY id DESC ";
		$consulta1 = mysql_query($query1);
		$result1 = mysql_num_rows($consulta1);
		
		$query2 = "SELECT * FROM `modelos` WHERE status='Ativo' AND nome LIKE '%".$palavra."%' 
		AND status='Ativo' AND `exibicao`='Todos' AND modelo_perfil<>'' ORDER BY id DESC"; 
		$consulta2 = mysql_query($query2);
		$consulta_bread = mysql_query($query2);
		$result2 = mysql_num_rows($consulta2);
		//somas os resultados
		$result = $result1 + $result2;
	}
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="Videos HOTBOYS com cenas do site mais quente da net. Venha conferir vídeos grátis com os caras mais dotados da internet.">
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Videos HotBoys - As Cenas de Vídeos gay de Homens Fodendo</title>
	</head>
	
	<body class="busca" id="page-top">
		
		<!-- MENU -->
		<header class="menu cenas">
			<?php include_once ($menu_topo); ?>
		</header>
		
		
		
		
		<!-- CONTEUDO -->
		<!-- videos com paginacao -->
		<section class="cenas">
			
			<!-- Breadcrumb -->
			<div class="container-fluid bread">
				<nav aria-label="breadcrumb">
					<div class="container">
						
						<!-- Conteudo do breadcrumb -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo URL ?>">Hotboys</a></li>
							<li class="breadcrumb-item"><a>Busca</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								<?php if($palavra == ''){ ?> Busca vazia<?php } ?>
								
								<?php 
									if($palavra != ''){ 
										while($consulta_breadcrumb = mysql_fetch_array($consulta_bread)){ ?>
										
										<a href="<?php echo utf8_encode(URL.'modelo/'.$consulta_breadcrumb[id].'/'.URL_amigavel($consulta_breadcrumb[nome])) ?>" class="link_modelo">
											<?php if ($result2 > 1){  ?>
											<?php echo utf8_encode($consulta_breadcrumb[nome]) ?> </a>
											<span>/</span>
										<?php } ?>
										
										
										<a href="<?php echo utf8_encode(URL.'modelo/'.$consulta_breadcrumb[id].'/'.URL_amigavel($consulta_breadcrumb[nome])) ?>" class="link_modelo">
											<?php if ($result2 == 1){  ?>
												<?php echo utf8_encode($consulta_breadcrumb[nome]) ?>
											<?php } ?>
										</a>
										
										
									<?php } } ?>
							</li>
						</ol>
						
					</div>
				</nav>
			</div>
			
			<div class="container">
				
				<!-- alerta de pesquisa encontrada -->
				<div class="row">
					<div class="col-lg-12 mx-auto mt-2 pd-02">
						<?php if($result >= 1){ ?>	
							<div class="alert alert-success" role="alert">Uhull, encontramos resultado(s) para sua busca</div>
							<?php }else{ ?>	
							<!-- alerta de pesquisa nao encontrada -->
							<div class="alert alert-danger" role="alert">Desculpe, a busca não encontrou resultados</div>
						<?php } ?>
					</div>
				</div>
				<div><?php if($palavra == ''){ ?> A busca está vazia. Preencha o que procura e tente novamente.<?php } ?></div>
				<!-- Titulo da pagina -->
				<?php if($result2 >= 1){ ?>
					<div class="row">
						<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
							<h4 style="float:left"><i class="far fa-play-circle"></i> Modelos</h4>
						</div>
					</div>
				<?php } ?>
				
				<div class="row">
					<!-- MODELO -->
					<ul>
						<!-- Consulta cenas -->
						<?php if($consulta2 > 0){ 
							while($consulta_modelo = mysql_fetch_array($consulta2)){ ?>
							
							<li class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 cenas">
								<a href="<?php echo utf8_encode(URL.'modelo/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[nome])) ?>">
									<div class="card mb-2 box-shadow my-xl-2">
										
										<!-- imagens dos modelos -->
										<div class="thumb">
											<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($consulta_modelo[modelo_perfil]) ?>" data-holder-rendered="true">
										</div>
										
										<!-- nomes dos modelos -->
										<div class="card-body">
											<h1 class="card-titulo">
												<?php echo utf8_encode($consulta_modelo[nome]) ?>
											</h1>
										</div>
										
										
									</div>
								</a>
							</li>
						<?php } } ?>
					</ul>						
				</div>
				
				
				<!-- Titulo da pagina -->
				<?php if($result1 >= 1){ ?>
					<div class="row">
						<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
							<h4 style="float:left"><i class="far fa-play-circle"></i> Vídeos</h4>
						</div>
					</div>
				<?php } ?>
				
				
				<!-- CENAS -->
				<div class="row">
					
					<!-- Consulta cenas -->
					<ul>
						<?php 
							if($consulta1 > 0){
								while($consulta_modelo = mysql_fetch_array($consulta1)){  
								?>
								<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
									<a href="<?php echo utf8_encode(URL.'cena/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[titulo])) ?>">										
										<div class="card mb-2 box-shadow my-xl-2">
											
											<!-- imagem da cena -->
											<div class="thumb">
												<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_modelo['cena_home'] ?>" data-holder-rendered="true">
											</div>
											
											<div class="card-body">
												<h1 class="card-titulo"><?php echo utf8_encode($consulta_modelo['titulo'])?></h1>
												<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
											</div>
											
										</div>
									</a>
								</li>
							<?php }} ?>
					</ul>
					
				</div>
				
			</div>
			
		</section>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include_once ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include_once ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include_once ($javascript); ?>	
		
	</body>
</html>																