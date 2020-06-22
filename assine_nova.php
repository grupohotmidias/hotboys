<?php	
	session_start();	
	require_once('config/configuracoes.php');	
	require_once('includes/funcoes.php');
	
	
    //CONSULTA DA TABELA MODELO_POP_UP
    $query_modelo_assine= "SELECT * FROM `modelo_assine` WHERE status='ativo'";
    $consulta_modelo_assine = mysql_query($query_modelo_assine);
    $dados_modelo_assine = mysql_fetch_array($consulta_modelo_assine);
	
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">		
	
	<head>																		
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />	
		
		<title>🌶 <?php echo TITULO_ASSINE ?> </title>		
		<style>
			.icones-vantagens {
			background-color: #0d0d0d;
			}
			.icones-vantagens{background-color:#0d0d0d; margin-bottom: 15px; margin-top: 15px;}
			
			.banner-valor-assine {
			background: #000000!important
			}
			.icones-assine .nav-tabs>li>a {
			background-color: #292828;
			font-size: 12px;
			}
			.assine-agora-e-veja ul{
			text-align: center;
			margin: 0 auto;
			float: none;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			-ms-flex-align: center;
			align-items: center;
			}
			
			.tudo-banner-valor-assine{
			background: #000000;
			}
			.icones-assine .nav-tabs>li{
		    margin-bottom: -4px;
			}
			
			.icones-assine ul.nav.nav-tabs li.active a,.icones-assine ul.nav.nav-tabs li.active a i.fa{
			color: #4e4d4d!important;
			background-color: #fff!important;
			}
			
			.icones-assine .nav-tabs{
			float:left;
			border-bottom:0!important;
			}
			
			.icones-assine .nav-tabs>li>a {
			background-color: #292828!important;
			}
			
			.icones-assine .tab-content>.active{
			background-color:#fff;
			}
			
			.icones-assine .nav-tabs>li>a i.fa{
			background-color: #4e4d4d;
			color: #fff!important;
			}
			
			.icones-assine .nav-tabs>li>a:hover{
			background-color: #4e4d4d;
			border-color: #4e4d4d;
			color: white!important;
			}
			
			.nav-tabs>li.active>a:hover{
			color: #555!important;
			}
			
			.icones-vantagens li span{
			background: #0d0d0d;
			color: #e0e0e0!important;
			}
			
			.icones-assine i.fa.fa-lock {
			display:block!important
			}
			
			.valoresCartoes{padding-left:4%}
			
			.list-group-item {
			background-color: #000!important;
			border: 0!important;
			}
			
			a.list-group-item{
			border-bottom: 5px solid black!important;
			}
			
			a.list-group-item:focus, a.list-group-item:hover{
			color: #fff!important;
			background-color: #191818!important;
			}
			.assine-agora-e-veja ul{
			display:block!important;
			border:0!important;
			text-transform: uppercase;
			}
			.valoresCartao li {
			width: 100%;
			}
			.nav-tabs>li>a{
			float:left;
			width:100%;
			text-align: left;
			border:0!important;
			}
			.nav-tabs>li>a:hover{
			background-color: #252525!important;
			}
			.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{background-color: #252525!important;}
			
			@media (min-width:1200px){
			.assine-agora-e-veja .icones {height:130px}
			.assine-agora-e-veja .icones img{display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center;margin: 0 auto;}
			.assine-agora-e-veja .icones p{text-align: center; font-size: 14px; width: 83%; margin: 0 auto; font-family: "Open Sans",sans-serif; font-weight: bold; line-height: 17px;}
			}
			
			
			@media (min-width:992px) and (max-width:1199px){
			.assine-agora-e-veja .icones {height:130px}
			.assine-agora-e-veja .icones img{display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center;margin: 0 auto;}
			.assine-agora-e-veja .icones p{text-align: center; font-size: 14px; width: 83%; margin: 0 auto; font-family: "Open Sans",sans-serif; font-weight: bold; line-height: 17px;}
			}
			
			
			@media (min-width:768px) and (max-width:991px){
			.assine-agora-e-veja .icones {height:130px}
			.assine-agora-e-veja .icones img{display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center;margin: 0 auto;}
			.assine-agora-e-veja .icones p{text-align: center; font-size: 14px; width: 83%; margin: 0 auto; font-family: "Open Sans",sans-serif; font-weight: bold; line-height: 17px;}
			}
			
			
			@media (max-width:767px){
			input[type="submit"],input[type="hidden"]{font-size: initial;}
			.icones-vantagens li {width: 97%; padding: 1%;}
			.icones-vantagens li img{width: 77%}
			
			.assine-agora-e-veja .icones {height:130px}
			.assine-agora-e-veja .icones img{display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center;margin: 0 auto;}
			.assine-agora-e-veja .icones p{text-align: center; font-size: 14px; width: 83%; margin: 0 auto; font-family: "Open Sans",sans-serif; font-weight: bold; line-height: 17px;}
			
			.valoresCartao{
			background-color: #252525;
			}
			
			.valoresCartao li {
			width: 50%;
			}
			}
			
			@media (max-width:480px){
			input[type="submit"],input[type="hidden"]{font-size: initial;}
			.icones-vantagens li {width: 97%; padding: 1%;}
			.icones-vantagens li img{width: 77%}
			
			.assine-agora-e-veja .icones {height:130px}
			.assine-agora-e-veja .icones img{display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center;margin: 0 auto;}
			.assine-agora-e-veja .icones p{text-align: center; font-size: 14px; width: 83%; margin: 0 auto; font-family: "Open Sans",sans-serif; font-weight: bold; line-height: 17px;}
			}
		</style>	
		
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">			
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">			
		<link rel="stylesheet" href="css/formularios.css">	
		
		<!-- Fonte dos textos da formas de pagamento -->
		
		<!-- Fonte dos textos dos valores -->
		<link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
		
		<!-- HEAD (Include) -->			
		<?php include ('includes/head.php')?>
		
	</head>		
	<body id="body" class="fundo-preto">
		
		<div class="container">	
			
			<!-- TOP (Include) -->			
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top.php')?>	
			</div>
			
			<!-- Icones - Vantagens do Assinante-->
			<div class="row" style="float:left;width:100%;background-color:#0d0d0d;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 icones-vantagens" style="background-color:#0d0d0d;">
					<div class="text-justify col-md-9 col-sm-12 col-xs-12 assine-agora-e-veja">
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/assista-onde-quiser.png" alt="icone 9000 horas">
							<p><?php echo ASSINE_HORAS_VIDEOS ?></p>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/videos.png" alt="icone atualizacao">
							<p><?php echo ASSINE_ICONE_VIDEOS ?></p>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/liberacao-imediata.png" alt="icone liberacao imediata">
							<p><?php echo ASSSINE_LIBER_IMEDIATA ?></p>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/cancele-quando-quiser.png" alt="icone livre virus">
							<p><?php echo ASSINE_LIVRE_VIRUS ?></p>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/nao-aparece-assinatura.png" alt="icone nao fatura">
							<p><?php echo ASSINE_NAO_MENCIONADO_FATURA ?></p>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icones">
							<img alt="" src="imagens/assine/icones/assine/novo/atualizacoes-semanais.png" alt="icone nao fatura">
							<p><?php echo ASSINE_ATUALIZ_SEMANAIS ?></p>
						</div>
						
					</div>
				</div>
			</div>
			
			
			
			
			<!-- conteudo da pagina -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tudo-banner-valor-assine" style="float:left">
					
					<!--## INICIO - Div que contraliza o conteudo ##-->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 assine-agora-e-veja">
						
						
						
						<!--## INICIO Banner e Valores ##-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-valor-assine">
							
							
							<!-- imagem Black Friday -->
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- IMAGEM DO BANCO DE DADOS MODELO_ASSINE -->
								<img src="https://server2.hotboys.com.br/arquivos/ebe77_vitrine-black.jpg" alt="image assine" style="width:100%!important;margin-bottom: 18px;margin-top: 20px;"/>
							</div>
							
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							FORMAS DE PAGAMENTO
						</div>
						
						
						<!-- Tipos de pagamentos -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 10px 0">
							
							<ul class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nav nav-tabs" style="float:left">
								<li class="active">
									<a data-toggle="tab" href="#cartao"><img src="<?= URL ?>imagens/assine/planos/cartao.png" style="margin-right: 1rem"/> Cartão de Crédito
									</a>
								</li>
								<li>
									<a href="https://hotmidias.com.br/payment" target="_blank"><img src="<?= URL ?>imagens/assine/planos/paypal.png" style="margin-right: 1rem"/> Paypal
									</a>
								</li>
								<li><a data-toggle="tab" href="#boleto"><img src="<?= URL ?>imagens/assine/planos/boleto.png" style="margin-right: 1rem"/> Boleto Bancário</a></li>
								<li><a data-toggle="tab" href="#deposito"><img src="<?= URL ?>imagens/assine/planos/deposito.png" style="margin-right: 1rem"/> Depósito Bancário</a></li>
								<li><a data-toggle="tab" href="#deposito"><img src="<?= URL ?>imagens/assine/planos/transferencia.png" style="margin-right: 1rem"/> Transferência</a></li>
							</ul>
							
							<!-- Valores - Cartao de Credito -->
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-content valoresCartao" style="float:left">
								<div id="cartao" class="tab-pane in active">
									<div class="valoresCartoes" id="cartao">
										<!-- Anual cartao de credito -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plano-anual" style="border-bottom:1px solid #252525;
										text-transform:uppercase;padding: 10px 0;">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												Plano anual
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float:right;text-align:right;">
												R$ 240,00
											</div>
										</div>
										
										<!-- Semestral cartao de credito -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plano-semestral" style="border-bottom:1px solid #252525;text-transform:uppercase;padding: 10px 0;">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												Plano Semestral
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float:right;text-align:right;">
												R$ 119,90
											</div>
										</div>
										
										<!-- Trimestral cartao de credito -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plano-trimestral" style="border-bottom:1px solid #252525;text-transform:uppercase;padding: 10px 0;">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												Plano Trimestral
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float:right;text-align:right;">
												R$ 30,00
											</div>
										</div>
										
										<!-- Bimestral cartao de credito -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plano-bimestral" style="border-bottom:1px solid #252525;text-transform:uppercase;padding: 10px 0;">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												Plano Bimestral
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float:right;text-align:right;">
												R$ 49,90
											</div>
										</div>
										
										<!-- Mensal cartao de credito -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 plano-mensal" style="text-transform:uppercase;padding: 10px 0;">
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												Plano Mensal
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float:right;text-align:right;">
												R$ 29,90
											</div>
										</div>
									</div>
								</div>
								<div id="boleto" class="tab-pane ">
									<h3>Menu 1</h3>
									<p>Some content in menu 1.</p>
								</div>
								<div id="deposito" class="tab-pane ">
									<h3>Menu 2</h3>
									<p>Some content in menu 2.</p>
								</div>
							</div>
							
							
							
							
						</div>
						
					</div>
					<!--## FIM - Valores ##-->
					
					
				</div>
			</div>
			<!--## FIM Banner e Valores ##-->
		</div>
	</div>
</div>






<!-- assine agora e veja -->
<div class="row" style="float:left;width:100%">
	<div class="text-justify col-md-9 col-sm-12 col-xs-12 assine-agora-e-veja">								
		
		<!-- Título videos relacionados -->							
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important;padding-left:0!important">
				<span class="icone-pimenta-titulo"></span>
				<?php echo ASSINE_VEJA ?>
			</h1>
		</div>
	</div>
</div>

<div class="row" style="float:left;width:100%">
	<div class="text-justify col-md-9 col-sm-12 col-xs-12 assine-agora-e-veja">	
		
		<!-- 6 videos relacionados -->												
		<?php 									
			$query="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 6";									
			$consulta=mysql_query($query);								
		?>								
		<div class="row">									
			<?php										
				while ($row=mysql_fetch_array ($consulta))										
				{										
				?>										
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 inicial_box_conteudo">											
					<div> 
						
						<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 													if($row[cena_home] != ''){
							echo $row['cena_home'];														
							}else{
							echo '0_cena,jpg';												
						}											
						?>" alt="cena home">																									
						<?php													
							if($row[video_preview] != '') {					
							?>													
							<video poster="<?php echo URL ?>imagens/icones/carregando.gif" width="100%" style="display:none" loop>	
								<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview] ?>" type="video/mp4">	
							</video>													
							<?php										
							}														
							if($row[video_preview_gif] != '') {			?>			
							<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview_gif] ?>" alt="preview video"><?php	
							}													?>											
							
							<div class="home-textos-cenas-recentes">												
								<h4 class="home-titulo-cenas-recentes">
									<?php echo utf8_encode($row['titulo'])?>		
								</h4>						
								
							</div>										
					</div>	
				</div>											
			<?php	}	?>				
			
			<!-- Botão Veja Mais cena rencentes-->										
		</div>		
	</div>	
	
</div>


<div class="row" style="float:left;width:100%">	
	<div class="text-justify col-md-9 texto-pagina-contos">	
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:15px">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p>	<span class="asteristico">-</span> <?php echo ASSINE_TERMO2 ?></p>	
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">																								
				<p><span class="asteristico">-</span> <?php echo ASSINE_TERMO3 ?></p>			
			</div>	
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">																							
				<p><span class="asteristico">-</span> <?php echo ASSINE_TERMO4 ?></p>
			</div>	
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">																								
				<p><span class="asteristico">-</span> <?php echo ASSINE_TERMO5 ?></p>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">																					
				<p><span class="asteristico">-</span> <?php echo ASSINE_TERMO6 ?></p>
			</div>	
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">																								
				<p><span class="asteristico">-</span> <?php echo ASSINE_TXT_DUVIDAS ?> <a href="<?php echo URL ?>contatos" class="">
					<?php echo CONTATO ?>
				</a>  
				<?php echo ASSINE_TXT_ACESSO ?>
				<a href="<?php echo URL ?>duvidas-frequentes"> <?php echo PERG_FREQ ?></a>	
				</p>	
			</div>
			
		</div>	
		
	</div>					
</div>					




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


<script>
	
	function selecionarPlano(idPlano){
		
		//adiciona classe
		$("#plano_cartao_3_mais_1 .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_promocao .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_anual .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_semestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_trimestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_bimestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_cartao_mensal .dadosPlano").addClass("assine-nao-selecionado");			
		
		$("#plano_boleto_anual .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_boleto_semestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_boleto_trimestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_boleto_bimestral .dadosPlano").addClass("assine-nao-selecionado");
		$("#plano_boleto_mensal .dadosPlano").addClass("assine-nao-selecionado");			
		
		//remove classe
		
		$("#plano_cartao_3_mais_1 .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_promocao .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_anual .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_semestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_trimestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_bimestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_cartao_mensal .dadosPlano").removeClass("assine-selecionado");			
		
		$("#plano_boleto_anual .dadosPlano").removeClass("assine-selecionado");
		$("#plano_boleto_semestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_boleto_trimestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_boleto_bimestral .dadosPlano").removeClass("assine-selecionado");
		$("#plano_boleto_mensal .dadosPlano").removeClass("assine-selecionado");
		
		
		
		var plano = idPlano.split("_");
		var formaPagamento = plano.slice(-1)[0];
		
		$("#plano").val(formaPagamento);												
		$(idPlano + " .dadosPlano").removeClass("assine-nao-selecionado");
		$(idPlano + " .dadosPlano").addClass("assine-selecionado");
	}		
	
	$(document).ready(function() {
		//escolher forma de pagamento
		$("input[name$='forma_pagamento']").click(function() {
			var formaPagamento = $(this).val();
			$("div.opcao-pagamento").hide();
			$("#assine-valores" + formaPagamento).show();				
			
			if(formaPagamento == 1){
				//cartao
				selecionarPlano("#plano_cartao_promocao");
				} else if(formaPagamento == 2){
				//boleto
				selecionarPlano("#plano_boleto_anual");
			}
		});
		selecionarPlano("#plano_cartao_anual");
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script src="<?php echo URL ?>js/jquery.modalLink-1.0.0.js"></script>			
<?php		if($AbrirIframePagamento){		?>				
	<script>			
		jQuery172(document).ready(function ($) {				
			$(document).ready(function() {					
				$.modalLink.open("https://www.gpagamentos.com.br/1/iframe.php?id=<?php echo $id_email_gpagamentos ?>", 
				{						
					title: "Pagamento"					
				});				
			});			
		});		</script>						
<?php		}	?>	

</div>
</body>		
</html>