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
				<?php include ('includes/top2.php')?>	
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
							
						
								<!-- Promo Pre Black Friday -->
								<div class="col-lg-6 col-md-7 col-sm-7 col-xs-12 modelos-assine" >
									
									<!-- IMAGEM DO BANCO DE DADOS MODELO_ASSINE -->
									<img src="https://server2.hotboys.com.br/arquivos/<?= $dados_modelo_assine['imagem_assine'] ?>" alt="image assine" style="width:100%!important;margin-bottom: 15px;margin-top: 20px;"/>
									
								</div>
							<!--## INICIO - Valores ##-->
							<?php if ($detect->isMobile()) { ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 valores-assine">
									<?php }else{ ?>
									<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12 valores-assine">
									<?php } ?>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;padding-bottom: 15px;display:flex;background-color: #292828;">
										<a href="https://hotmidias.com.br/payment">
											<img src="imagens/paypal-icon.png" style="width:20%!important;float:left;">
											<p>PAYMENT ONLY FOR USERS OUTSIDE BRAZIL!</p><br>
											<p style="position: relative;left: 20%;"> PRESS HERE</p>
										</a>
									</div> 
									<!--## FORMULARIO ##-->
									<form role="form" data-toggle="validator" method="post" action="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" target="_blank">	
										
										
										<!--## INICIO Aba formas de pagamento ##-->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 icones-assine">
											<div class="text-justify col-lg-12 col-md-12 col-sm-12 col-xs-12 botoes-plano-pagamento ">
												
												<ul class="nav nav-tabs">
													
													<!-- Botao da Aba - Cartao de Credito -->
													<li class="active">
														<a data-toggle="tab" href="#home"><i class="fa fa-credit-card"></i> <?php echo CARTAO ?>
														</a>
													</li>
													
													<!-- Botao da Aba - Paypal -->
													<li>
														<a href="https://hotmidias.com.br/payment" target="_blank"><i class="fab fa-paypal"></i> <?php echo PAYPAL ?>
														</a>
													</li>
													
													<!-- Botao da Aba - Boleto -->
													<li>
														<a data-toggle="tab" href="#menu2"><i class="fa fa-receipt"></i> <?php echo BOLETO ?>
														</a>
													</li>
													
												</ul>
												
												
												<div class="tab-content">
													
													<!-- Conteudo da  Aba - Cartao de Credito -->
													<div id="home"  class="tab-pane fade-tabs in active cena-nao-vip">
														<div class="cartao-credito-conteudo">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 opcao-pagamento" id="assine-valores1" style="display: block;">							
																
																
																
																
																
																<div class="row">
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																		<div class="titulo-plano-assine">
																			SEJA ASSINANTE    
																		</div>
																		
																		
																		<div class="conteudo-cartoes-pg">
																			
																			<!-- anual -->
																			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 anual conteudo-planos-pagamento dadosPlano">
																				<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_anual" onclick="selecionarPlano('#plano_cartao_anual')" >
																					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																						
																						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class="gold_assine">GOLD</span> HOT
																						</div>
																						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																							<span class="col-xs-12 plano-cartao-texto">Plano Anual</span>
																						</div>
																					</div>
																					
																					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																						<div class="precos-planos">
																							<div class="moeda">R$</div>
																							<div class="reais">240</div>
																							<div class="centavos">,00</div>
																						</div>
																						
																						<div class="precos-parcelas-planos">Apenas R$ 20,00 por mês</div>
																					</div>
																				</a>
																			</div>
																			
																			
																			
																			<!-- semestral -->
																			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 semestral conteudo-planos-pagamento dadosPlano">
																				<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_semestral" onclick="selecionarPlano('#plano_cartao_semestral')">
																					
																					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																							<span class="premium_assine">PREMIUM</span> HOT 
																							
																							
																						</div>
																						
																						
																						
																						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class="col-xs-12 plano-cartao-texto">Plano Semestral </span></span>
																					</div>
																				</div>
																				
																				
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																					<div class="precos-planos">
																						<div class="moeda">R$</div>
																						<div class="reais" >119</div>
																						<div class="centavos">,90</div>
																					</div>
																					
																					<div class="precos-parcelas-planos">Apenas R$ 19,98 por mês</div>
																				</div>
																			</a>
																		</div>
																		
																		
																		
																		<!-- trimestral -->
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 trimestral conteudo-planos-pagamento dadosPlano">
																			<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_trimestral" onclick="selecionarPlano('#plano_cartao_trimestral')">
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="mega_assine">MEGA</span> HOT
																						
																					</div>
																					
																					
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<span class=" col-xs-12 plano-cartao-texto" >Plano Trimestral</span>
												</div>
												</div>
																				
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
												<div class="precos-planos">
												<div class="moeda">R$</div>
												<div class="reais">69</div>
												<div class="centavos">,90</div>
												</div>
																					
																					<div class="precos-parcelas-planos" >Apenas R$ 10,00 por mês</div>
																				</div>
																			</a>
																		</div>
																		
																		
																		<!-- bimestral -->
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bimestral conteudo-planos-pagamento dadosPlano">
																			<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_bimestral" onclick="selecionarPlano('#plano_cartao_bimestral')">
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class="top_assine">TOP</span> HOT
																					</div>
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class=" col-xs-12 plano-cartao-texto">Plano Bimestral</span>
																					</div>
																				</div>
																				
																				
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																					<div class="precos-planos">
																						<div class="moeda">R$</div>
																						<div class="reais">49</div>
																						<div class="centavos">,90</div>
																					</div>
																					
																					<div class="precos-parcelas-planos">Apenas R$ 24,95 por 
																					mês</div>
																				</div>
																			</a>
																		</div>
																		
																		
																		
																		<!-- mensal -->
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mensal conteudo-planos-pagamento dadosPlano">
																			<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_mensal" onclick="selecionarPlano('#plano_cartao_mensal')">
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">HOT
																						
																					</div>
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class=" col-xs-12 plano-cartao-texto">
																							Plano Mensal
																						</span>
																					</div>
																				</div>
																				
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																					<div class="precos-planos">
																						<div class="moeda">R$</div>
																						<div class="reais" >29</div>
																						<div class="centavos">,90</div>
																					</div>
																					
																					<div class="precos-parcelas-planos"><span>Apenas R$ 0,99 por dia</span></div>
																				</div>
																			</a>
																		</div>
																																			
																		<!-- promocional -->
																<?php /*		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mensal conteudo-planos-pagamento dadosPlano">
																			<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_mensal" onclick="selecionarPlano('#plano_cartao_mensal')">
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span style="color:red;">FIM DE ANO</span> HOT
																						
																					</div>
																					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																						<span class=" col-xs-12 plano-cartao-texto">
																							Plano Degustação
																						</span>
																					</div>
																				</div>
																				
																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																					<div class="precos-planos">
																						<div class="moeda">R$</div>
																						<div class="reais" >1</div>
																						<div class="centavos">,99</div>
																					</div>
																					
																					
																				</div>
																			</a>
																		</div> */ ?>
																		
																	</div>
																	
																	<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php">
																		
																		<!-- Botao Enviar -->
																		<div class="text-justify col-md-12 col-sm-12 col-xs-12 texto-pagina-contato_trabalhe left" style="margin-top: 0!important;"> 	
																			<label for="bt-confirmar-pg-cartao">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botao-vermelho-enviar text-justify">
																					<div class="input-group-prepend">
																						<div class="input-group-text">
																							<i class="fa fa-lock" aria-hidden="true"></i>
																						</div>
																					</div>
																					<input type="hidden" name="acao" value="enviar">
																					<div class="enviar-assine">
																						
																						<input type="submit" value="Avançar para Pagamento" name="confirmar-pagamento" id="bt-confirmar-pg-cartao" style="margin-top: 0px;">
																					</div>
																					<input type="hidden" name="plano-cartao" id="plano-cartao">
																				</div>
																			</label>
																		</div>
																		
																	</a>
																</div>
															</div>
															
															
															
														</div>
													</div>
												</div>
												
												
												
												
												
												<!-- Conteudo da  Aba - Cartao de Credito -->
												<div id="menu2" class="tab-pane fade-tabs cena-nao-vip">
													<div class="cartao-credito-conteudo">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 opcao-pagamento" id="assine-valores1" style="display: block;">							
															
															
															
															
															
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																	<div class="titulo-plano-assine">
																		SEJA ASSINANTE    
																	</div>
																	
																	
																	<!-- anual -->
																	
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento  bt-plano-pagamento-assine">
																		<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php" id="plano_cartao_anual" onclick="selecionarPlano('#plano_cartao_anual')">
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																				<span class="gold_assine">GOLD</span> HOT</div>
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																					<span class=" col-xs-12 plano-cartao-texto">Plano Anual</span>
																				</div>
																			</div>
																			
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																				<div class="precos-planos">
																					<div class="moeda">R$</div>
																					<div class="reais">260</div>
																					<div class="centavos">,00</div>
																				</div>
																				
																				<div class="precos-parcelas-planos">Obs: É cobrado o valor de R$ 3,50 adicional pela emissão do boleto</div>
																			</div>
																		</a>
																	</div>
																	
																	
																	
																	<!-- semestral -->
																	<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php">
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																				<span class="premium_assine">PREMIUM</span> HOT</div>
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																					<span class=" col-xs-12 plano-cartao-texto">Plano Semestral</span>
																				</div>
																			</div>
																			
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																				<div class="precos-planos">
																					<div class="moeda">R$</div>
																					<div class="reais" >145</div>
																					<div class="centavos">,00</div>
																				</div>
																				
																				<div class="precos-parcelas-planos">Obs: É cobrado o valor de R$ 3,50 adicional pela emissão do boleto</div>
																			</div>
																		</div>
																	</a>
																	
																	
																	<!-- trimestral -->
																	<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php">
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																					<span class="mega_assine">MEGA</span> HOT
																				</div>
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																					<span class=" col-xs-12 plano-cartao-texto">Plano Trimestral</span>
																				</div>
																			</div>
																			
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">
																				<div class="precos-planos">
																					<div class="moeda">R$</div>
																					<div class="reais">85</div>
																					<div class="centavos">,00</div>
																				</div>
																				
																				<div class="precos-parcelas-planos">Obs: É cobrado o valor de R$ 3,50 adicional pela emissão do boleto</div>
																			</div>
																		</div>
																	</a>
																	
																	
																	
																	<!-- Botao Enviar -->
																	<a href="https://www.gpagamentos.com.br/1/acesso-via-hotboys.php">
																		<div class="text-justify col-md-12 col-sm-12 col-xs-12 texto-pagina-contato_trabalhe left">	
																			<label for="bt-confirmar-pg-cartao">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botao-vermelho-enviar text-justify">
																					<div class="input-group-prepend">
																						<div class="input-group-text">
																							<i class="fa fa-lock" aria-hidden="true"></i>
																						</div>
																					</div>
																					<input type="hidden" name="acao" value="enviar">
																					<div class="enviar-assine">
																						
																						<input type="submit" value="Avançar para Pagamento" name="confirmar-pagamento" id="bt-confirmar-pg-cartao" margin-top: 0px;>
																					</div>
																					<input type="hidden" name="plano-cartao" id="plano-cartao">
																				</div>
																			</label>
																		</div>
																		
																	</a>
																</div>
															</div>
															
															
															
														</div>
													</div>
												</div>
												
											</div>
											
										</div>
									</div>
									
									<!--## FIM Aba formas de pagamento ##-->
									
								</form>
								<!--## FIM FORMULARIO ##-->	
								
								
								
								
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
				$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='Todos' order by data DESC LIMIT 6";									
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