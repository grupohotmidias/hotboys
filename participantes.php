<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	
	$url_link = explode("-",$url_link);
	$url_link = implode("-",$url_link);
	
	// tras id
	$id = addslashes($_GET[id]);
	
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
			<title>🌶 Audições HOT 3 - Site Hotboys</title>
			
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
			
			<!-- CSS do selecionado menu participantes -->
			<style>.menu-audicoes li.participantes a{background-color: #010101;}</style>
			
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
						
						
						<div class="col-lg-12 col-md-12 col-xs-12 participantes-audicoes">
							<h1>PARTICIPANTES</h1>
							
							<!-- Circulo - Fotos dos Ativos -->
							<div class="col-lg-7 col-md-7 col-sm-11 col-xs-11 texto-pagina-contato_trabalhe participantes-ativos">
								<h2 style="margin-bottom:20px!important">Ativos</h2>
								
								<?php
									$query_ativos = "SELECT * FROM `audicoes_participantes` WHERE posicao_sexual='Ativo' ORDER BY id LIMIT 5";
									$consulta_ativos = mysql_query($query_ativos);
									while($linha_ativos = mysql_fetch_array($consulta_ativos)){
									?>
									
									<!-- Circulo - Fotos dos Ativos -->
									
									<a href="<?php echo URL ?>assine">
										<div class="circulo<?php echo $counter++; ?>" style="">
											<img src="https://server2.hotboys.com.br/arquivos/<?php echo $linha_ativos[foto_perfil] ?>"/>
											<p><?php echo $linha_ativos[nome] ?></p>
										</div>
									</a>
									
								<?php } ?>
								
							</div>
							
							
							
							
							
							<!-- Circulo - Fotos dos Passivos -->
							<div class="col-lg-7 col-md-7 col-sm-11 col-xs-11 texto-pagina-contato_trabalhe participantes-passivos">
								<h2 style="margin-bottom:20px!important">Passivos</h2>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:left;margin-bottom:5rem;">
									
									<?php
										$query_passivos = "SELECT * FROM `audicoes_participantes` WHERE posicao_sexual='Passivo' ORDER BY id LIMIT 5";
										$consulta_passivos = mysql_query($query_passivos);
										while($linha_passivos = mysql_fetch_array($consulta_passivos)){
										?>
										<!-- Circulo - Fotos dos Ativos -->
										
										<a href="<?php echo URL ?>assine">
											<div class="circulo<?php echo $counter++; ?>" style="">
												<img src="https://server2.hotboys.com.br/arquivos/<?php echo $linha_passivos[foto_perfil] ?>"/>
												<p><?php echo $linha_passivos[nome] ?></p>
											</div>
										</a>
									<?php } ?>
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
			
			<!-- JQuery - Cabecograma Audicoes hot3 -->
			<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>
			
			<!-- Javascript do Cabecograma-->
			<script src="<?php echo URL ?>js/cabecograma.js?v=<?php echo Version; ?>"></script>
		</body>
	</html>
