<?php
	require_once('../config/configuracoes.php');
	require_once('../includes/funcoes.php');  
	
	$email = addslashes($_GET[email]);
	$excluir = addslashes($_GET[excluir]);
	
	
	$query_newletter = "SELECT * FROM `mysubscribers` WHERE email='$email' LIMIT 1";
	$consulta_newletter = mysql_query ($query_newletter);
	$dados_newletter = mysql_fetch_array($consulta_newletter);
	$total_newletter = mysql_num_rows($consulta_newletter);
	
	
	if($total_newletter > 0){
		
		if($excluir != '' and $excluir == 'sim'){
			
			$query_delete = "DELETE FROM `mysubscribers` WHERE email='$email' LIMIT 1";
			$consulta_delete = mysql_query($query_delete);
			
			$msg = "<div class='container pimenta-erro'>
					<div class='row centralizada'>
						<div class='col-lg-9 col-md-11 col-sm-11 col-xs-11 coluna'>
							
							<div class='container'>
								
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='position:absolute;z-index:9'>
									<h2 class='titulo-newsletter' style='border-left:0!important;padding-left:0!important;'>
										<img src='<?php echo URL ?>imagens/icones/pimenta-titulo.png' style='margin-top: -5px;margin-right:5px'>
									Registro excluido com sucesso!</h2>
								</div>
								
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 imagens-pimentas-newsletter'>
									<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left pimenta-fora-copo'>
										<img src='<?php echo URL ?>hot/imagens/paginas-erros/pimenta-fora-copo.png'>
									</div>
									<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right pimenta-copo text-center'>
										<img src='../imagens/paginas-erros/pimenta-copo.png'>
									</div>
									
								</div>
							</div>
							</div>
					</div>
				</div>";
			
			}else if($excluir == 'nao'){
			$msg = "<div class='container pimenta-erro'>
					<div class='row centralizada'>
						<div class='col-lg-9 col-md-11 col-sm-11 col-xs-11 coluna'>
							
							<div class='container'>
								
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='position:absolute;z-index:9'>
									<h2 class='titulo-newsletter' style='border-left:0!important;padding-left:0!important;'>
										<img src='<?php echo URL ?>imagens/icones/pimenta-titulo.png' style='margin-top: -5px;margin-right:5px'>
									Obrigado por continuar conosco</h2>
								</div>
								
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 imagens-pimentas-newsletter'>
									<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left pimenta-fora-copo'>
										<img src='<?php echo URL ?>hot/imagens/paginas-erros/pimenta-fora-copo.png'>
									</div>
									<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right pimenta-copo text-center'>
										<img src='../imagens/paginas-erros/pimenta-copo.png'>
									</div>
									
								</div>
							</div>
							</div>
					</div>
				</div>";
		}
		
		}else{
		$msg_email_nao_encontrado = "<div class='container pimenta-erro' >
		<div class='row centralizada'>
		<div class='col-lg-9 col-md-11 col-sm-11 col-xs-11 coluna'>
		
		<div class='container'>
		
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='position:absolute;z-index:9'>
		<h2 class='titulo-newsletter' style='border-left:0!important;padding-left:0!important;'>
		<img src='<?php echo URL ?>imagens/icones/pimenta-titulo.png' style='margin-top: -5px;margin-right:5px'>
		Esse email não foi encontrado em nossos registros</h2>
		
		
		</div>
		
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 imagens-pimentas-newsletter'>
		<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left pimenta-fora-copo'>
		<img src='<?php echo URL ?>hot/imagens/paginas-erros/pimenta-fora-copo.png'>
		</div>
		<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right pimenta-copo text-center'>
		<img src='../imagens/paginas-erros/pimenta-copo.png'>
		</div>
		
		</div>
		</div>
		
		
		</div>
		</div>
		</div>";
	} 
	
?>
<html lang="pt-br">
	<html class="no-js">	
		
		<head>		
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br, en">
			<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>		
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		
			<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">		
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">		
			
			<!-- HEAD (Include) -->		
			<?php include ('../includes/head.php')?>		
			<style>
				
				.pimenta-erro h1{margin-top: 0!important}
				.pimenta-fora-copo img{float:right}
				input[type="text"]{color:black}
				
				@media (min-width:1200px){
				input[type="text"]{width:60%!important;}
				.pimenta-erro h1,.pimenta-erro h2 {
				font-size: 24px!important;
				text-transform: uppercase;
				}
				form p{font-size:20px!important}
				}
				@media (min-width:992px) and (max-width:1199px){
				.pimenta-erro h1{font-size: 22px!important}
				input[type="text"]{width:60%!important;}
				}
				@media (min-width:768px) and (max-width:991px){
				.pimenta-erro h1{font-size: 17px!important}
				input[type="text"]{width:60%!important;}
				}
				@media (max-width:767px){
				.pimenta-erro h1{font-size: 14px!important;}
				.pimenta-fora-copo img{width:70%}
				.pimenta-copo img{width:70%}
				.pimenta-erro{background-size:15px}
				input[type="text"]{width:50%!important;}
				input[type="submit"],input[type="hidden"]{font-size: 15px;}
				}
				@media (max-width:480px){
				.pimenta-erro h1{font-size: 14px!important;}
				.pimenta-erro{background-size:15px}
				.titulo-newsletter img{width:auto!important}
				.imagens-pimentas-newsletter{margin-top: 80px;}
				input[type="text"]{width:90%!important;}
				input[type="submit"],input[type="hidden"]{font-size: 13px;}
				
				}
				
			</style>
			
		</head>	
		
		<body id="body" class="fundo-preto">	
			
			
			<!-- TOP (Include) -->		
			<?php include ('../includes/top-newsletter.php');
				
				if($_GET[email] ==''){?>
				<div class="container pimenta-erro">
					<div class="row centralizada">
						<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 coluna">
							
							<div class="container">
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:absolute;z-index:9">
									<h1 class="titulo-newsletter" style="border-left:0!important;padding-left:0!important;">
										<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px">
									Se tiver certeza que não deseja mais receber nossas novidades, preencha o campo abaixo com o email cadastrado</h1>
									
									<form  action="sair.php" method="get">
										<input type="text" name="email" value=""><p style="font-size:30px;"></p>
										<input  type="submit" name="excluir" style=" margin-top: 10px; color: #333333; text-transform: uppercase; padding: 10px;"  value="confirmar">
										<input  type="hidden" name="excluir" style="margin-top: 10px; color: #333333; text-transform: uppercase; padding: 10px;"  value="sim">
									</form>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 imagens-pimentas-newsletter">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left pimenta-fora-copo">
										<img src="<?php echo URL ?>hot/imagens/paginas-erros/pimenta-fora-copo.png">
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right pimenta-copo text-center">
										<img src="../imagens/paginas-erros/pimenta-copo.png">
									</div>
									
								</div>
							</div>
							
							
						</div>
					</div>
				</div><!-- Fim do container pimenta-erro -->
	
				<?php }
				 
				if($total_newletter >= 1){
					
					if($_GET[excluir] =='' and $dados_newletter[email] !=''){
						
					?>
					<div class="container pimenta-erro" >
						<div class="row centralizada">
							<div class="col-md-9 coluna">
								<div class="container">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:absolute;z-index:9">
										<h1 class="titulo-newsletter" style="border-left:0!important;padding-left:0!important;">
											<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px">
										Tem certeza que não quer mais receber nossas novidades em seu email?</h1>
										
										<form  action="sair.php" method="get">
											<input type="hidden"  name="email" value="<?php echo $dados_newletter[email]; ?>">
											<input TYPE="RADIO" NAME="excluir" VALUE="sim" style="float:left;width:5%"><p style="font-size:30px;float:left;width:95%;color: #6f6d6d;">SIM</p>
											<br/>
											<div style="margin-top: 8px;float: left;width: 100%;margin-bottom: 8px;">
												<input TYPE="RADIO" NAME="excluir" VALUE="nao" style="float:left;width:5%;"><p style="font-size:30px;float:left;width:95%;color: #6f6d6d;">NÃO</p>
											</div>
											<br/>
											<input  type="submit" style="margin-top: 10px;color: #333333;text-transform: uppercase;padding: 10px;margin-left: 20px;"  value="confirmar">
																						
										</form>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right pimenta-copo text-center">
											<img src="../imagens/paginas-erros/pimenta-copo.png">
										</div>
										
									</div>
								</div>
								
								
							</div>
						</div>
					</div><!-- Fim do container pimenta-erro -->
					
					
					
					<?php 
					}
				}  ?>
				
				
				
				<!-- aqui carrega o titulo 'Esse email não foi encontrado em nossos registros' -->
				<?php echo $msg_email_nao_encontrado?>
				
				
				<!-- resultado do form -->
				<?php echo $msg?>
				
				
				
				<!-- FOOTER (Include) -->		
				<?php include ('../includes/footer.php')?>
				<?php include ('../includes/javascript.php')?>
				
				
		</body>
	</html>																																																