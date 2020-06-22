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
			
	 
			
			<span <span style="
    width: 100%;
    text-align: center;
    display: block;
    margin: 30px 0 10px 0;
    font-size: 3rem;
    ">FESTA HOT BOYS VAI AGITAR O INÍCIO DE NOVEMBRO NO DÉDALOS EM SP</span> 
			

			<span style="
    width: 100%;
    text-align: center;
    display: block;
    margin: 10px 0 50px 0;
">
			<img src="https://i.ibb.co/HhTQX6p/hotboysfest2.jpg" alt="hotboysfest2" border="0">
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
			<p>A HOTBOYS e o melhor point de encontro entre homens de São Paulo, fecharam uma parceria que vai agitar o primeiro feriado de novembronas terras paulista.</p>
			<p>O Dédalos Bar e a Hot Boys vão realizar juntos uma festa que promete reunir dezenas de machos gostosos em um só lugar ao mesmo tempo.</p>

			<p>A Hot Boys FEST vai apresentar os dois vencedores da HOT 3, Guto abravanel(passivo) e Junior Almeida(ativo). Além dos ganhadores, estarão presentes outras estrelas do elenco da HotBoys, além de convidados especiais.</p>

			<p>A festa vai contar ainda com a apresentação do DJ Ricky Mundy, residente do Dédalos. O valor de entrada será de R$ 40 <strong>mas aquele que chegar na entrda e falar <i>"HOTBOYS O SITE MAIS QUENTE DA NET!"</i>  vai pagar apenas R$29</strong></p>
			
			<p>Começa a partir das 23h e vai até o dia amanhecer. Se prepara!</p>

			<p></p>
			<p>HOTBOYS FEST SP</p>
			
			<p>02 de novembro, sábado 23h<br>

Rua Bento Freitas, 38 (esquina com o Largo do Arouche), República, São Paulo/SP<br>


	<img src="http://dedalosbar.com.br/wp-content/uploads/2019/10/2-1-HotBoys.png" alt="" class="wp-image-2964">
	</p></div>
	
			
			
			
			

			
			
			
			
			
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