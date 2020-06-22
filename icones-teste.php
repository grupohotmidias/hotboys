<?php
	session_start();
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');
	
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title>Bareback</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, Bareback, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="Bareback Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php');?> 
		
	</head>
	<body id="body" class="fundo-preto">
	
			<!-- TOPO (Include) -->
		<?php include ('includes/top.php');?>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<div clas="col-lg-9 col-md-9 col-sm-9 col-xs-9 center">
			<div clas="col-lg-4 col-md-4 col-sm-4 col-xs-4"><i class="fas fa-eye"></i></div>
			<div clas="col-lg-4 col-md-4 col-sm-4 col-xs-4"><i class="far fa-comment"></i></div>
			<div clas="col-lg-4 col-md-4 col-sm-4 col-xs-4"><i class="fab fa-youtube"></i></div>
		</div>
		
		
		
		<!-- FOOTER (Include) -->
		<?php include ('includes/footer.php') ?>
		
		<!-- JAVASCRIPTS PADROES (Include) -->					
		<?php include ('includes/javascript.php');?>
		
	</body>
</html>