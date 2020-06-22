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
			$data = implode(" / ",$data);

			return $data; //retorna para quem chamou a função

			}

		
		// CONSULTA TABELA EVENTOS_HOT E TRAS OS EVENTOS MARCADOS
		$sql_evento = "SELECT * FROM eventos_hot WHERE dtevento >= CURDATE() AND tipo='Noticia' AND status='Ativo' ORDER BY dtevento";
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
			
			<?php 
			
				if(mysql_num_rows($consulta_evento) > 0){
					while($dados_evento = mysql_fetch_array($consulta_evento)){

			//aaaa-mm-dd -> dd/mm/aaaaa
			//$dtevento = explode("-",$row["dtevento"]); //[aaaa][mm][dd]
			//$dtevento = array_reverse($dtevento); //[dd][mm][aaaa]
			//$dtevento = implode("/",$dtevento); //dd/mm/aaaa
			
			?>
						
			<div class="row" style="float:left;width:100%">

			<span style="width: 100%;text-align: center;display: block;margin: 30px 0 10px 0;font-size: 2rem;"><?php echo $dados_evento["titulo"]; ?></span> 
            
        <?php if($dados_evento['img']){ ?>
			<span style="width: 100%;text-align: center;display: block;margin: 10px 0 50px 0;">
				<img style="width: 40%;" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_evento["img"]; ?>" alt="hotboysfest2">
			</span>
        <?php } ?>
        <?php if(isset($dados_evento["descricao"]) && $dados_evento["descricao"] !=''){ ?>
            <span style="width: 100%;text-align: center;display: block;margin: 30px 0 10px 0;font-size: 1rem;">
				<h6 style="font-family: 'Arial',cursive, sans-serif;">
					<?php echo $dados_evento["descricao"]; ?>
				</h6>
			</span>
        <?php }?>
            <br>
            <span style="width: 100%;text-align: center;display: block;margin: 30px 0 10px 0;font-size: 1rem;">
				<h2><?php echo dataTela($dados_evento["dtevento"]); ?></h2>
			</span>
			</div>
			
			<?php 
					} 
				}
			?>
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
			
			<!-- Carousel Mobile de Modelos -->
			<script>
				jQuery3211(document).ready(function ($) {
					$(function() {
						
						$('#myCarousel').carousel({
							interval: 4000,
							cycle: true
						})
						console.log($('#myCarousel .item'))
						$('#myCarousel .item').each(function() {
							
							var next = $(this).next();
							console.log(next);
							if (!next.length) {
								next = $(this).siblings(':first');
							}
							next.children(':first-child').clone().appendTo($(this));
							
							if (next.next().length > 0) {
								next.next().children(':first-child').clone().appendTo($(this));
								} else {
								$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
							}
						})
					})
				});
			</script>
			
		</div>
	</body>
</html>											