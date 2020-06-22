<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	//class paginação
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title><?php echo TITULO_PRINCIPAL ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="keywords"
		content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description"
		CONTENT="Hot Boys Ensaios e videos de sexo dos garotos mais gostosos do Rio de Janeiro Brasil">
	<!-- HEAD (Include) --> <?php include('includes/head.php') ?>                    </head>
	<body id="body" class="fundo-preto"> 
		<div class="container">
		
		<!-- TOP (Include) -->
		<div class="row" style="float:left;width:100%">
			<?php include('includes/top2.php') ?>
		</div>
		
		
		
		
			<!-- Título H1 da pagina --> 
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1	class="contato_trabalhe-titulo" style="border-left:0!important;padding-left:0!important">
						<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta"><?php echo CONTATO ?>
					</h1>
				</div>
			</div>
			
			
			
				
		
			
			<!-- subtitulo da pagina -->
			<div class="row" style="width:100%; float:left">
				<div class="container container-table">
					<div class="col-md-4 titulo-pagina-contatotrabalhe">
						<h1 style="margin-top: 18px;text-transform: none;padding-left: 12px!important;text-align:center"><?php echo CONTATO_CANAIS_ATEND ?></h1>
					</div>
				</div>
			</div>
			
						<!-- whatsapp -->
			<div class="row" style="width:100%; float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12-contato" align="center">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 align-middle col-2-contato">
					<span class="bt-contatos"><p>Whatsapp Hot</p></span></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-middle col-6-contato"><p>Deu ruim? Que tal uma rapidinha. Whatsapp hot e a forma mais rápida de você chegar lá. Mande sua mensagem e solucione seus problemas. Vai ser Vapt e Vupt!
</p></div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 contato-btn-email">
						<div class="col-lg-12 col-md-12 col-md-12 col-xs-12 padding-6">
						<a href="https://wa.me/5521979417517" target="_blank">
								<button class="bt-curriculo" style="background-color: #20b038;"><p><i class="fab fa-whatsapp"></i> WHATSAPP</p></button>
							</a>
							</div>
					</div> 
				</div>
			</div>
			
			
			<!-- texto atendimento por email -->
			<div class="row" style="width:100%; float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12-contato" align="center">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 align-middle col-2-contato">
					<span class="bt-contatos"><p><?php echo E_MAIL ?></p></span></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-middle col-6-contato"><p><?php echo CONTATO_TXT_02 ?></p></div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 contato-btn-email">
						<div class="col-lg-12 col-md-12 col-md-12 col-xs-12 padding-6"><a
							href="<?php echo URL ?>email">
								<button class="bt-curriculo"><p><?php echo BT_CONTATO_EMAIL ?></p></button>
							</a></div>
					</div>
				</div>
			</div>
			

			
			<!-- texto trabalhe conosco -->
			<div class="row" style="width:100%; float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12-contato" align="center">
					
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-2-curriculo">
						<p><?php echo CONTATO_TRAB_ENVIE ?></p><span class="bt-contatos"><p><?php echo CURRICULO ?></p></span>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-middle col-6-curriculo"><p><?php echo COLABORADOR_TRABALHO ?></p></div>
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 contato-modelo-burocratico">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-6"><a
							href="<?php echo URL ?>cast">
								<button class="bt-curriculo"><p><?php echo MODELO ?></p></button>
							</a>
						</div>
						
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-6"><a
							href="<?php echo URL ?>trabalhe-conosco">
								<button class="bt-curriculo"><p><?php echo ADMINISTRATIVO ?></p></button>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			
			<!-- contatos hotboys -->
			<div class="row" style="width:100%; float:left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contatos" align="center">
				<?php /* 	
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 align-middle problemas-ligue"> <span
						class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ligue" style="text-align:center">TELEFONE HOT: (21) 3005-3221></span> 
						
						<address class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<!--<a href="tel:<?php echo TELEFONE ?>">-->
							<a href="#">
								<button class="contatos-opcoes"><p>Problemas com o site: <?php echo OPCAO1 ?></p></button>
							</a>
						</address>
						
						<address class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<!--<a href="tel:<?php echo TELEFONE ?>">-->
							<a href="#">
								<button class="contatos-opcoes"><p>Problemas com o pagamento: <?php echo OPCAO2 ?></p></button>
							</a>
						</address>
					</div> */ ?>
					
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-middle duvidas-diversas">
					
						<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 envie-para">DÚVIDAS DIVERSAS</span>
						
						<address class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<a href="mailto: contato@hotmidias.com.br">
								<button class="contatos-opcoes"><p><?php echo EMAIL_CONTATO ?></p></button>
							</a>
						</address>
					</div>
					
					
					
					
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