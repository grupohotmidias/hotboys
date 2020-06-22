<?php
	require('config/configuracoes.php');
	
	require('includes/funcoes.php');
    require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	$query_faq = "SELECT * FROM `faq` order by id ";
	$consulta_faq = mysql_query($query_faq);
	$total_faq = mysql_num_rows($consulta_faq);
	
	
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title>F.A.Q - Perguntas Frequentes - Site HotBoys </title>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="keywords"
		content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<script language="JavaScript" src="js/select-estado-cidade.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		
		<!-- HEAD (Include) -->
		<?php include('includes/head.php') ?>
	</head>
	
	<body id="body" class="fundo-preto">
		<div class="container">
			
			
			<!-- TOP (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top2.php')?>
			</div>
			
			
			<!-- titulo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="contato_trabalhe-titulo" style="border-left:0!important;padding-left:0!important">
					<span class="icone-pimenta-titulo"></span>Dúvidas Frequentes</h1>
				</div>
			</div>
			
			<!-- subtitulo da pagina -->
			<div class="row" style="width:100%; float:left">
				<div class="container container-table">
					<div class="col-md-9 titulo-pagina-contatotrabalhe">
						<h1 class="titulo-duvidas-frequentes" style="text-align:left!important;margin-top: 18px;text-transform: none;">Quer gozar? Shiiiiiiiiiiiiihhh, pintou algum problema? <span style="float:left;width:100%">Ter dúvida é normal, e para não ficar de pau-mole procurando a resposta. Vai uma mãozinha!</span></h1>
					</div>
				</div>
			</div>
			
		    <?php if ($detect->isMobile()){ ?>
				<div class="text-justify col-md-9">
					
					<?php }else{ ?>
					<!-- conteudo -->
					<div class="row centralizada text-justify col-md-9">
					<?php } ?>
					<?php 
						$i = 1;
						while($linha_faq = mysql_fetch_array($consulta_faq)) {
						?>						
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perguntas-frequentes" style="margin-bottom: 15px">
							<?php echo utf8_encode($linha_faq[perguntas_faq])?>
							<p class="perguntas-frequentes_resposta"><?php echo utf8_encode($linha_faq[resposta_faq]) ?></p>
						</div>
					<?php $i  <= $total ;  $i++; } ?>
				</div>
				
			</div>
			
			
			
			
			<!-- FOOTER (Include) --> 
			<?php include('includes/footer.php') ?>
			
			<!-- JAVASCRIPTS PADROES (Include) -->					
			<?php 
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}
			?>
			
			
		</div>
	</body>
	
</html>	