<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$menu_audicoes = 'includes/estrutura/topo/audicoes/menu-audicoes.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
?>
<?php 
	// consulta das cenas
	$query_modelos="SELECT * FROM `modelos` WHERE audicoes='sim' ORDER BY nome ASC LIMIT 10";
	$consulta_modelos=mysql_query($query_modelos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Homens HotBoys - Os Homens mais gostosos do Brasil.</title>
		
	</head>
	<body class="audicoes" id="page-top">
		
		<!-- MENU -->
		<header class="menu modelos">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
			
			<!-- SECTION - Bustos das Audicoes  -->
			<section class="audicoes-bustos">
				<div class="container">
					<div class="row">
						<a href="<?php echo URL ?>audicoes-novo/">
							<img src="<?php echo URL ?>novo-projeto/assets/img/demos/bustos-home.jpg">
						</a>
					</div>
				</div>
			</section>
			
			<!-- CONTEUDO -->
			<!-- videos com paginacao -->
			<section class="modelos pd-0">
				
				<div class="container">
					
					<!-- Titulo da pagina -->
					<div class="row">
						<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
							<h4 style="float:left">Modelos</h4>
						</div>
					</div>
					
					<div class="row">
						<!-- CENAS -->
						<ul>
							<!-- Consulta cenas -->
							<?php while ($row_modelos=mysql_fetch_array ($consulta_modelos)){ ?>
							<li class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 cenas">
								<a href="<?php echo URL ?>assine/">
									<div class="card mb-2 box-shadow my-xl-2">
										
										<!-- imagens dos modelos -->
										<div class="thumb">
											<img class="card-img-top <?php if($row_modelos['eliminado'] =='Sim'){echo "eliminado"; } ?>" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($row_modelos[modelo_perfil]) ?>" data-holder-rendered="true">
										</div>
										
										<!-- nomes dos modelos -->
										<div class="title mobile"><?php echo utf8_encode($row_modelos[nome]) ?></div>
										<div class="title desktop"><?php echo utf8_encode($row_modelos[nome]) ?></div>
										
									</div>
								</a>
							</li>
						<?php } ?>
					</ul>
					
				</div>
			</div>
			
		</section>
		</div>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include_once ($javascript); ?>
		
	</body>
</html>											