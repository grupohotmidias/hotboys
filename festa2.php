<?php
	session_start();
	
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	//Caso o cookie esteja vazio e seja desktop, carrega a pagina de entrada(+18 anos)
	if ($detect->isMobile()) { 
		
		}else{
		//Cookie que carrega a pagina de entrada = verificacao de idade
		if(@$_COOKIE['verificacao_idade'] != 'sim'){
			
			header('Location: home/');
		} }
		

		function dataTela($data){

			$data = explode("-",$data);
			$data = array_reverse($data); 
			$data = implode("/",$data);
	
			return $data; //retorna para quem chamou a função
	
		}

		
		// CONSULTA TABELA EVENTOS_HOT E TRAS OS EVENTOS MARCADOS
		$data_hj = DATE('Y-m-d');
		$sql_evento = "SELECT * FROM eventos_hot WHERE dtevento >='$data_hj'  AND tipo='Festa' AND status='Ativo' ORDER BY dtevento DESC";
		$consulta_evento = mysql_query($sql_evento);

?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<!-- Titulo no navegador -->
		<title><?php echo TITULO_PRINCIPAL ?></title> 
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta http-equiv="Content-Language" content="pt-br, en">	
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo dos garotos mais gostosos do Brasil">
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php'); ?>
		<style>
			.video-vitrine.modal #fechar {
			background: #000000;
			font-size: 17px;
			float: right;
			}
			@media (min-width:1200px){
			.conteudo-imagens.audicoes{min-height: 270px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{border:3px solid #1f1e1e}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px;}
			}
			@media (min-width:992px) and (max-width:1199px){
			.conteudo-imagens.audicoes{min-height: 170px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{min-height: 221px;border:3px solid #1f1e1e}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (min-width:768px) and (max-width:991px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:767px){
			.home-textos-clientes-assistindo.audicoes{height: 30px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:480px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
		</style>
	</head>
	<body id="body" class="fundo-preto">

		<div class="container">
			<script type="text/javascript" src="js/jquery.min.js"></script>
			
			<!-- TOPO (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top.php');?>
			</div>
			
			<div class="row" style="float:left;width:100%">	 
		<?php while($dados_evento = mysql_fetch_array($consulta_evento)){ ?>	

			<span style="
    width: 100%;
    text-align: center;
    display: block;
    margin: 30px 0 10px 0;
    font-size: 3rem;
    "><?= $dados_evento['titulo'] ?></span> 
			

			<span style="
    width: 100%;
    text-align: center;
    display: block;
    margin: 10px 0 50px 0;
">
			<img src="https://server2.hotboys.com.br/arquivos/<?= $dados_evento['img'] ?>" alt="hotboysfest" border="0" style="<?php if($detect->isMobile()){?>width:70%;<?php }else{?>width:45%;<?php }?>">
			</span>
			
			</div>
			<style>
			.festa_hot p {
				width: 70%;
				margin: auto;
				margin-bottom: 20px;
				font-size: 1.2rem;
				}
			.festa_hot i{
				color:red;
			}
			</style>
			
			<div class="festa_hot">
			<p><?= $dados_evento['descricao'] ?></p>
			
			<p><?= dataTela($dados_evento['dtevento']) ?></p>
			<br>

			</div>
	
	
			<?php if(isset($dados_evento["site"]) && $dados_evento["site"] !=''){ ?>
			<span style="width: 100%;text-align: center;display: block;margin: 10px 0 50px 0;">
				<a style="background-color: green" class="btn" href="<?php echo $dados_evento["site"]; ?>" target="_blank">COMPRAR INGRESSOS</a>
			</span>
			<?php }?>

			<?php } ?>
			<!-- FOOTER (Include) -->
			<?php include ('includes/footer.php')?>
			
			
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