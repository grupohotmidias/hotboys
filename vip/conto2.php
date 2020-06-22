<?php
	// variaveis dos arquivos de configuracao
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	$naoVerificarPagamento = true;
	
	// tras via GET as variaveis 
	$id = addslashes($_GET[id]);
	
	$counter = 1;


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

	// PUXANDO CONTOS DO BANCO DE DADOS
	$sql_conto = "SELECT * FROM `contos_hot` WHERE id='$id'";
	$consulta_conto = mysql_query($sql_conto);
	$resultado_conto = mysql_fetch_array($consulta_conto);

	// PUXANDO BANNER DE CONTOS ALEATORIOS DO BANCO DE DADOS CASO CONTO ESCOLHI NAO TENHA UM
	$sql_conto2 = "SELECT img FROM `contos_hot` ORDER BY RAND()";
	$consulta_conto2 = mysql_query($sql_conto2);
	$resultado_conto2 = mysql_fetch_array($consulta_conto2);

?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<title>🌶 HOTBOYS Os Contos Mais Quente da Net !</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="Site Hot Boys -  O site mais quante da Net!.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="series">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
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
										<h5>Conto <?= $resultado_conto['titulo'] ?></h5>
									</div>
									
								</div>
							</div>    
							
							<!-- Main Content -->
							<div id="content">
								
								<section class="cenas m-0" style="margin-bottom:35px !important;">
									<div class="container-fluid" style="padding:0">
										
										<!-- CONTO -->
										<div class="row">

									<?php /*	<!-- Puxando Banner do Conto -->
										<?php if($row['img'] =='') {
											// puxa o banco e consulta 
											$query_img_conto = "SELECT * FROM `contos_hot` order by RAND()";
											$consulta_img_conto = mysql_query($query_img_conto);
											$linha_img_conto = mysql_fetch_array($consulta_img_conto);
											$total_img_conto = mysql_num_rows($consulta_img_conto);	
										?>
											<div>
												<img class="card-img-top-contos" src="https://server2.hotboys.com.br/arquivos/<?php echo $resultado_conto['img'] ?>" alt="imagem conto">	
											</div>	
										<?php 
												// caso contrario, carrega a imagem cadastrada junto com o conto
										}else{ ?>
											<div>
												<img class="card-img-top-contos" src="https://server2.hotboys.com.br/arquivos/<?php echo $resultado_conto2['img'] ?>" alt="imagem conto">
											</div>
										<?php } ?>
										</div> */ ?>
										<div class="row" style="margin-left: 39% !important;padding-top: 4%;margin-bottom: 4%;overflow:hidden;">
												<h4><?= $resultado_conto['titulo'] ?></h4>
										</div>
										<?php 
										/*<div> 
											<!-- Campo para Reproduzir o PODCAST-->
											<!-- <audio controls="controls">
												 	<source src="track.mp3" type="audio/mpeg" />
												 </audio>-->
										</div>*/
										?>
										<div style="margin: 0px 50px 50px 50px;">
											<?= $resultado_conto['texto'] ?>
										</div>
									</div>

								</section>
									
							<!-- End of Main Content -->
							
							<!-- Footer -->
							<?php include_once ($footer); ?>
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
			
			<!--  Chama Modal - Modal Duvidas Frequentes -->
			<?php include_once ($duvidas_frequentes); ?>
			
			<!--  Chama Modal - Modal Termos de Uso -->
			<?php include_once ($termos); ?>
		
		<?php //adiciona 1 visita no campo visualizacoes quando acessado
			$query_visita = mysql_query("UPDATE contos_hot SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
		?>
		
		<?php
			require('includes/hotmidias/js.php');
		?>
		
	</body>	
</html>																																					