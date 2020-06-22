<?php

require('config/configuracoes.php');

require_once('includes/funcoes.php');



// tras id

$id = addslashes($_GET[id]);

$id_serie = addslashes($_GET[id_serie]);



//pagina para comentario	

$pg ='video' ;



$query = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' AND id=$id";

$consulta = mysql_query($query);

$total = mysql_num_rows($consulta);

if($total != 1){

	header("Location: <?php echo URL ?>");

	exit();

}

$dados_conteudo = mysql_fetch_array($consulta);	



$query_teaser = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' AND id=$id";

$consulta_teaser = mysql_query($query_teaser);

$total_teaser = mysql_num_rows($consulta_teaser);

if($total_teaser != 1){

	header("Location: <?php echo URL ?>");

	exit();

}

$dados_conteudo_teaser = mysql_fetch_array($consulta_teaser);	



$query_serie = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id_serie' LIMIT 1 ";



$consulta_serie = mysql_query($query_serie);



$row_serie = mysql_fetch_array($consulta_serie);



//adiciona 1 visita no campo visualizacoes quando acessado



if($dados_conteudo[descricao_content]=="") {

	$texto = $dados_conteudo[descricao];

	$description = substr($texto ,0,156);

	}else{

	$texto = $dados_conteudo[descricao_content];

	$description = substr($texto ,0,156);

}

?>

<!DOCTYPE html>

<html lang="pt-br" class="no-js">

<head>

	<title><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?> -  Vídeos - Site HotBoys </title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

	<meta http-equiv="Content-Language" content="pt-br, en">

	<meta charset="utf-8">

	<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">

	<meta name="description" CONTENT="<?=strip_tags($description);?>">

	<style>

		.botao-vermelho-enviar input{

		margin-top: 9px;

		}

		.icones-assine .nav-tabs>li>a{font-size: 11px;}

		.nav>li>a{padding: 10px 7px!important;}

	</style>

	

	<!-- HEAD (Include) -->

	<?php include ('includes/head.php')?>

	

</head>

<body id="body" class="fundo-preto">

	<div class="container cena-nao-vip">

		

		<!-- TOPO (Include) -->

		<div class="row" style="float:left;width:100%">

			<?php include ('includes/top2.php');?>

		</div>

		<?php /* if ($detect->isMobile()) { ?>

			<!-- BANNER CENA --> 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND exibicao IN('Todos','Aberto') AND posicao='cena' LIMIT 1";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile()) { 
							if($total_banners >= 0){ 
							?>
								<a href="<?= $dados_banners['link']?>" target="<?= $dados_banners['janela']?>">
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="" width="100%">
								</a>
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
								<a href="<?= $dados_banners['link']?>" target="<?= $dados_banners['janela']?>">
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="" width="100%">
								</a>
						<?php  } }  ?>
				</div>
			</div>	

		<?php } */ ?>
		<!-- título H1 do conteúdo -->

		<div class="row" style="float:left;width:100%">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<h1 class="cena-titulo">

				<span class="icone-pimenta-titulo"></span><?php echo CENA ?></h1>

			</div>

		</div>

		

		<!-- video teaser -->

		<div class="row texto-cena " style="float:left;width:100%">

			<div class="container container-table cema-titulo-conteudo" >						

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe">

					<h4 class="modelo-nome"><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?></h4>

				</div>					

			</div>	

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" align="center">

				

				

				<div class="col-lg-9 mx-auto text-justify cena-apresentacao-texto"> 

					

					<!-- Só carrega a imagem se for desktop -->

					<?php if ($detect->isMobile()) { ?>

						<?php }else{ ?>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<!-- Imagem assine agora -->

							<img src="<?php echo URL ?>imagens/assine/assine-cena.png" style="margin:0 auto;float:none;text-align:center;display: flex;padding-top:18px;"/>

						</div>

					<?php } ?>

					

					

					<!-- lado esquerdo - video e elenco -->

					<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">

						

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<!-- video teaser -->

							<div class="row texto-cena" style="float:left;width:100%;padding:10px">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia inicial_box_conteudo" align="center">

								<?php if($dados_conteudo_teaser['id'] == $id && $dados_conteudo_teaser['teaser_code'] != "" ){ ?>

										<div class="video-sprout">

											<?php echo $dados_conteudo_teaser[teaser_code]; ?>

										</div>

								<?php }else{?>

										



									<!-- Imagem do cena -->

									<a href="<?php echo URL ?>assine?id=<?php echo $id = $_GET['id'];?>">
										<img class="lazy card-img-top-cenas"  src="../../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo[cena_home]?>" alt="imagem cena">

									</a>
										<?php }?>	
								</div>

							</div> 	

							<div class="pd-10">

								<div class="col-lg-12 col-md-12 col-xs-12 info-video"> 

									

									<div class="cena-total-icones" style="float: none!important;margin: 0 auto;display: flex;background-color: #8b081a;color: white;">

										

								<?php		/*	<!-- 1 - Icone e texto - Visualizacao-->

										<div class="cena-visualizacao" style="border-right: 1px solid #ffffff66!important;">

											<i class="fas fa-eye"></i> 

											<span class="texto">

												<?php echo number_format_short($dados_conteudo['visualizacao'])?>

											</span>

										</div> */ ?>

										

										<!-- 2 - Icone e texto - Comentario-->

										<div class="cena-comentarios">

											<i class="far fa-comment-dots"></i> 

											<span class="texto">

												<?php

													$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc LIMIT 50";

													$consulta_comentario = mysql_query($query_comentario);

													$total_comentario = mysql_num_rows($consulta_comentario);

													echo $total_comentario;

												?>

											</span>

										</div>

										<!-- 3 - Icone e texto - Duracao do video -->

										<?php 

											if($dados_conteudo['tempo_de_duracao'] != ''){?>

											<div class="cena-duracao-video">

												<i class="fab fa-youtube"></i>

												<span class="texto">

													<?php echo ($dados_conteudo['tempo_de_duracao'])?>

												</span>

											</div>

										<?php } ?>

									</div>

									

									

								</div>

							</div>

						</div>

					</div>


					<!-- lado direito - pagamento/assinar -->

					<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12" style=" background-color: #262626; padding: 10px; margin-top:10px">


						<!-- Se for mobile, carrega os planos neste estilo -->

						<?php if ($detect->isMobile()) { ?>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 icones-assine">

	<div class="text-justify col-lg-12 col-md-12 col-sm-12 col-xs-12 botoes-plano-pagamento ">

		

		

		<div class="tab-content">

			

			<!-- Conteudo da  Aba - Cartao de Credito -->

			<div id="home" class="tab-pane fade-tabs in active">

				<div class="cartao-credito-conteudo">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 opcao-pagamento" id="assine-valores1" style="display: block;">							

						

						

						

						

						

						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<div class="titulo-plano-assine">

									SEJA ASSINANTE    

								</div>

								

								

								<!-- anual -->

								<a href="https://gpagamentos.com.br/1">

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

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

									</div>

								</a>

								

								

								<!-- semestral -->

								<a href="https://gpagamentos.com.br/1">

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

										

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">

											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

												<span class="premium_assine">PREMIUM</span> HOT

												

											</div>

											

											

											

											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<span class="col-xs-12 plano-cartao-texto">Plano Semestral</span></span>

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

								</div>

							</a>

							

							

							<!-- trimestral -->

							<a href="https://gpagamentos.com.br/1">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

									

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda" >

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="mega_assine">MEGA</span> HOT 

												</div>

										

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<span class=" col-xs-12 plano-cartao-texto">Plano Trimestral</span>

										</div>

									</div>

									

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">

										<div class="precos-planos">

											<div class="moeda">R$</div>

											<div class="reais">69</div>

											<div class="centavos">,90</div>

										</div>

										

										<div class="precos-parcelas-planos">Apenas R$ 23,30 por 

										mês</div>

									</div>

								</div>

							</a>

							

							

							<!-- bimestral -->

							<a href="https://gpagamentos.com.br/1">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

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

								</div>

							</a>

							

							

							

							<!-- mensal -->

							<a href="https://gpagamentos.com.br/1">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">HOT</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<span class=" col-xs-12 plano-cartao-texto">

												Mensal

											</span>

										</div>

									</div>

									

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">

										<div class="precos-planos">

											<div class="moeda">R$</div>

											<div class="reais" >29</div>

											<div class="centavos">,90</div>

										</div>

										

										<div class="precos-parcelas-planos"><span >Apenas R$ 0,99 por dia</span></div>

									</div>

								</div>

							</a>

							

							

							<!-- Botao Enviar -->

							<a href="https://gpagamentos.com.br/1">

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

												

												<input type="submit" value="Avançar para Pagamento" name="confirmar-pagamento" id="bt-confirmar-pg-cartao">

											</div>

											<input type="hidden" name="plano-cartao" id="plano-cartao">

										</div>

									</label>

								</div>

								

								

							</div>

						</div>

						

						

						

					</div>

				</div>

			</div>

							

							<?php } else { ?>

							

							

							<!-- Se for desktop, carrega os planos neste outro estilo -->

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

												<a href="https://payment.hotmidias.com.br/" target="_blank"><i class="fab fa-paypal"></i> <?php echo PAYPAL ?>

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

											<div id="home" class="tab-pane fade-tabs in active">

												<div class="cartao-credito-conteudo">

													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 opcao-pagamento" id="assine-valores1" style="display: block;">							

														

														

														

														

														

														<div class="row">

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																<div class="titulo-plano-assine">

																	SEJA ASSINANTE    

																</div>

																

																

																<!-- anual -->

																<a href="https://gpagamentos.com.br/1">

																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

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

																	</div>

																</a>

																

																

																<!-- semestral -->

																<a href="https://gpagamentos.com.br/1">

																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

																		

																		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">

																			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																				<span class="premium_assine">PREMIUM</span> HOT

																				

																			</div>

																			

																			

																			

																			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																			<span class="col-xs-12 plano-cartao-texto">Plano Semestral</span></span>

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

																</div>

															</a>

															

															

															<!-- trimestral -->

															<a href="https://gpagamentos.com.br/1">

																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

																	

																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda" >

																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="mega_assine">MEGA</span> HOT 

																				</div>

																		

																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																			<span class=" col-xs-12 plano-cartao-texto">Plano Trimestral</span>

																		</div>

																	</div>

																	

																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">

																		<div class="precos-planos">

																			<div class="moeda">R$</div>

																			<div class="reais">69</div>

																			<div class="centavos">,90</div>

																		</div>

																		

																		<div class="precos-parcelas-planos">Apenas R$ 23,30 por 

																		mês</div>

																	</div>

																</div>

															</a>

															

															

															<!-- bimestral -->

															<a href="https://gpagamentos.com.br/1">

																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

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

																</div>

															</a>

															

															

															

															<!-- mensal -->

															<a href="https://gpagamentos.com.br/1">

																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-esquerda">

																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">HOT</div>

																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																			<span class=" col-xs-12 plano-cartao-texto">

																				Mensal

																			</span>

																		</div>

																	</div>

																	

																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 titulos-planos-direita">

																		<div class="precos-planos">

																			<div class="moeda">R$</div>

																			<div class="reais" >29</div>

																			<div class="centavos">,90</div>

																		</div>

																		

																		<div class="precos-parcelas-planos"><span >Apenas R$ 0,99 por dia</span></div>

																	</div>

																</div>

															</a>

															

															

															<!-- Botao Enviar -->

															<a href="https://gpagamentos.com.br/1">

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

																				

																				<input type="submit" value="Avançar para Pagamento" name="confirmar-pagamento" id="bt-confirmar-pg-cartao">

																			</div>

																			<input type="hidden" name="plano-cartao" id="plano-cartao">

																		</div>

																	</label>

																</div>

																

																

															</div>

														</div>

														

														

														

													</div>

												</div>

											</div>

											

											

											

											

											

											<!-- Conteudo da  Aba - Cartao de Credito -->

											<div id="menu2" class="tab-pane fade-tabs">

												<div class="cartao-credito-conteudo">

													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 opcao-pagamento" id="assine-valores1" style="display: block;">							

														

														

														

														

														

														<div class="row">

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

																<div class="titulo-plano-assine">

																	SEJA ASSINANTE    

																</div>

																

																

																<!-- anual -->

																<a href="https://gpagamentos.com.br/1">

																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 conteudo-planos-pagamento">

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

																	</div>

																</a>

																

																

																<!-- semestral -->

																<a href="https://gpagamentos.com.br/1">

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

																<a href="https://gpagamentos.com.br/1">

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

																<a href="https://gpagamentos.com.br/1">

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

																					

																					<input type="submit" value="Avançar para Pagamento" name="confirmar-pagamento" id="bt-confirmar-pg-cartao">

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

								

							</form>

							

						<?php } ?>

					</div>

					

				</div>

				

			</div>

			

			

			<!-- Canecas Hotboys 

			<div class="col-lg-9 mx-auto text-justify cena-apresentacao-texto"> 

				<?php //if ($detect->isMobile()) { ?>

					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="margin-top: 20px;">

						<a href="https://loja.hotboys.com.br/caneca-hotboys--;produto6908.php" target="_blank">

							<img src="<?php //echo URL ?>imagens/loja/caneca-hotboys02_mobile.jpg" alt="imagem banner" width="100%">

						</a>

					</div>

					<?php //}else{ ?>

					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="margin-top: 20px;">

						<a href="https://loja.hotboys.com.br/caneca-hotboys--;produto6908.php" target="_blank">

							<img src="<?php //echo URL ?>imagens/loja/caneca-hotboys02.jpg" alt="imagem banner" width="100%">

						</a>

					</div>

				<?php //} ?>

			</div>

			-->

			

			

			<!-- botoes abaixo do video -->

			<div class="col-lg-9 mx-auto text-justify cena-apresentacao-texto"> 

				<!-- Texto abaixo do video -->

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 mx-auto text-justify cena-apresentacao-texto">

						<?php 

							

							// Toda palavra Assine vira LINK - echo utf8_encode($dados_conteudo[descricao_assine]);

							$descricao_assine = utf8_encode($dados_conteudo['descricao_assine']);

							$descricao_assine_corrigida = str_ireplace('assine', '<a href="https://hotboys.com.br/assine" ><strong style="

							color: #ff7272;" >ASSINE</strong></a>', $descricao_assine); 

							echo $descricao_assine_corrigida;

							

						?>

					</div>

				</div>

				<?php 

					$query_tag = "SELECT * FROM `categorias_conteudo` WHERE id_conteudo=$id AND pagina='Video Hot'";

					$consulta_tag = mysql_query($query_tag);

					$total_tag = mysql_num_rows($consulta_tag);

				?>

				<!-- Titulo das Tags -->

				<?php 

					if($total_tag !=''){ ?>

					<div class="row" style="float:left;width:100%">

						<div class="col-lg-12 mx-auto text-justify cena-apresentacao-texto tags">

							<h1 class="cena-elenco-titulo" >

							<span class="icone-pimenta-titulo"></span><?php echo TAGS ?></h1>

						</div>

					</div>

				<?php } ?>

				

				<!-- TAGS -->

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 mx-auto text-justify cena-tags-texto cena-apresentacao-texto">

						<?php 

							while($dados_tag = mysql_fetch_array($consulta_tag)){

								

								$query_categoria = "SELECT * FROM `categorias` WHERE id=$dados_tag[id_categoria]";

								$consulta_categoria = mysql_query($query_categoria);

								$dados_categoria = mysql_fetch_array($consulta_categoria);

							?>

							<!--## INICIO - divs das TAGS ##-->

							<div class="tags">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botoes_tags">

									<span class="tags-links">

										<a href="<?php echo URL.'tag/'.URL_amigavel($dados_categoria[categoria]).'/'?>">

											<?php echo utf8_encode($dados_categoria[categoria]) ?>

										</a>

									</span>

								</div>

							</div>

						<?php  } ?>

					</div>

				</div>

				

			</div>

			

			

		</div> 	

		

		<!--## INICIO - Elenco participante da cena ##-->

		<?php					

			$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";

			$consulta_elenco = mysql_query($query_elenco);

			$total_elenco = mysql_num_rows($consulta_elenco);

		?>

		<div class="row" style="float:left;width:100%">

			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 cena-elenco mx-auto padding-side-0 margin-top-20">

				<?php 

					if ($total_elenco != '') { ?>

					<h1 class="cena-elenco-titulo" style="border-left:0!important;padding-left:0!important">

						<span class="icone-pimenta-titulo"></span>

						<?php echo ELENCO ?>

					</h1>

				<?php } ?>

				

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto margin-top-10 padding-side-0">	 

					<?php  

						while($elenco = mysql_fetch_array($consulta_elenco)){

							

							$query_modelo = "SELECT * FROM `modelos` WHERE id=$elenco[id_modelo]";

							$consulta_modelo = mysql_query($query_modelo);

							$modelo = mysql_fetch_array($consulta_modelo);

							

							// verifica se modelo pode ter perfil para nao assinantes

							if($modelo[exibicao] =='Todos'){	?>	

							

							<?php if($modelo[exibicao] == 2){	?>	

								<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 nomes-elencos-cena espacamentos-3">

									<?php }else{ ?>

									<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 nomes-elencos-cena espacamentos-3">

									<?php } ?>

									<?php //verifica se o modelo tem perfil preenchido para ter link

										if($modelo[idade] != ''){ ?>

										<a href="<?php echo utf8_encode(URL.'ator/'.$modelo[id].'/'.URL_amigavel($modelo[nome])) ?>">

											<?php if ($detect->isMobile()){ ?>

												<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php if($modelo['modelo_perfil'] != ''){ echo $modelo['modelo_perfil']; }else{ echo $modelo['modelo_perfil'];}?>" alt="">

												<?php }else{ ?>

												<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="//server2.hotboys.com.br/arquivos/<?php if($modelo['modelo_perfil'] != ''){ echo $modelo['modelo_perfil']; }else{ echo $modelo['modelo_perfil'];}?>" alt="">

											<?php } ?>

											

										</a>

										<div class="paginas-titulo-visualizacoes">

											<h4 class="nome-modelos-elenco">

												

												<a href="<?php echo utf8_encode(URL.'ator/'.$modelo[id].'/'.URL_amigavel($modelo[nome])) ?>"> 

													<?php echo utf8_encode($modelo['nome'])?>

												</a> </h4>

												<?php }else{ ?>

												<?php if ($detect->isMobile()) { ?>

													<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php if($modelo['modelo_perfil'] !=''){ echo $modelo['modelo_perfil']; }else{ echo $modelo['modelo_perfil'];}?>" alt="">

													<?php }else{ ?>

													<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="//server2.hotboys.com.br/arquivos/<?php if($modelo['modelo_perfil'] !=''){ echo $modelo['modelo_perfil']; }else{ echo $modelo['modelo_perfil'];}?>" alt="">

												<?php } ?>

												

												<div class="paginas-titulo-visualizacoes">

													<h4 class="nome-modelos-elenco">

														<?php echo utf8_encode($modelo['nome'])?>

													</h4>

													

												<?php } ?>	

										</div>

									</div><?php  }// fim do da verificação dos modelos   ?>

							<?php  }   ?>

						</div>

					</div>

				</div>

			</div>			

			

			

			

			<!-- continuacao dessa serie -->

			<?php 

				if($dados_conteudo[cenas_serie] != 0) { ?>

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<h1 class="cena-titulo">

							<span class="icone-pimenta-titulo"></span>

						<?php echo CONT_SERIE ?></h1>

					</div>

				</div>

				

				<!-- conteudo - cenas dessa serie -->

				<div class="row" style="float:left;width:100%">

					<?php 

						$query="SELECT * FROM `cenas` WHERE id<>'$id' AND status='Ativo' AND exibicao='todos' AND cenas_serie='$dados_conteudo[cenas_serie]' ";

						$consulta=mysql_query($query);

					?>

					<?php

						while ($dados_serie=mysql_fetch_array ($consulta))	{		

						?> 

						<?php if ($detect->isMobile()) { ?>

							

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">

								<div>

									

									<a href="<?php echo URL.'cena/'.$dados_serie[id].'/'.URL_amigavel($dados_serie[titulo])?>">

										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php

											if ($dados_serie[cena_home] != '') {

												echo $dados_serie['cena_home'];

												}else{

												echo '0_cena.jpg';

											}

										?>" alt="">

									</a>

									<div class="paginas-titulo-visualizacoes">

										<h4 class="paginas-titulo">

											<a href="<?php echo URL.'cena/'.$dados_serie[id].'/'.URL_amigavel($dados_serie[titulo])?>" class="titulo-contos-home">

												<?php echo utf8_encode($dados_serie['titulo'])?>

											</a>

											

											<div class="cenas-total-icones">

												

												<!-- 1 - Icone e texto - Visualizacao

													<div class="cenas-visualizacao">

													<i class="far fa-eye"></i> 

													<p class="texto">

													<?php echo number_format_short($dados_serie['visualizacao'])?>

													</p>

													</div>

												-->

												

												<!-- 2 - Icone e texto - Duracao do video -->

												<?php 

													if($dados_serie['tempo_de_duracao'] != ''){?>

													<div class="cenas-duracao-video">

														<i class="fab fa-youtube"></i>

														<p class="texto">

															<?php echo $dados_serie['tempo_de_duracao']?>

														</p>

													</div>

												<?php } ?>

												

											</div>

										</h4>

									</div>

									

								</div>

							</div>

							

							<?php } else { ?>

							

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">

								

								

								<div>

									<a href="<?php echo URL.'cena/'.$dados_serie[id].'/'.URL_amigavel($dados_serie[titulo]) ?>" class="<?php if($dados_serie[video_preview] != '') echo ' item-video '; if($dados_serie[video_preview_gif] != '') echo ' item-video-gif ' ?>">

										

										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php

											

											if ($dados_serie[cena_home] != '') {

												

												echo $dados_serie['cena_home'];

												

												}else{

												

												echo '0_cena.jpg';

												

											}

											

										?>" alt="">

										

										<?php

											

											if($dados_serie[video_preview] != '') {

												

											?>

											<span class="far fa-play-circle fa-5x"></span>

											

											<video width="100%" style="display:none" loop>

												

												<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_serie[video_preview] ?>" type="video/mp4">

												

											</video>

											

											<?php

												

											}

											

											if($dados_serie[video_preview_gif] != '') {

											?>

											<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_serie[video_preview_gif] ?>"><?php

											}

										?>

									</a>

									<div class="paginas-titulo-visualizacoes">

										<div class="col-lg-12">

											<a href="<?php echo URL.'cena/'.$dados_serie[id].'/'.URL_amigavel($dados_serie[titulo])?>" class="titulo-contos-home">

												<h4><?php echo utf8_encode($dados_serie['titulo'])?></h4>

											</a>

										</div>

										

										<div class="col-lg-12 cenas-total-icones">

											<!-- 1 - Icone e texto - Visualizacao

												<div class="cenas-visualizacao">

												<i class="far fa-eye"></i> 

												<p class="texto">

												<?php echo number_format_short($dados_serie['visualizacao'])?>

												</p>

												</div>

											-->

											

											<!-- 2 - Icone e texto - Duracao do video -->

											<?php 

												if($dados_serie['tempo_de_duracao'] != ''){?>

												<div class="cenas-duracao-video">

													<i class="fab fa-youtube"></i>

													<p class="texto">

														<?php echo $dados_serie['tempo_de_duracao']?>

													</p>

												</div>

											<?php } ?>

										</div>

									</div>

								</div>

								

							</div>

							

							

						<?php }  ?>

					<?php }	?>

					

				<?php } ?>

			</div>

			

			<!-- titulo fotos -->

			

			<?php if ($detect->isMobile()) { 

				$query_fotos="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 3";

				}else{

				$query_fotos="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 5";

			}

			$consulta_fotos=mysql_query($query_fotos);

			$total_fotos=mysql_num_rows($consulta_fotos);

			if($total_fotos >= 1){	

			?>

			

			<div class="row" style="float:left;width:100%">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<h1 class="cena-titulo">

						<span class="icone-pimenta-titulo"></span>

					Fotos</h1>

				</div>

			</div>

			

			<!-- Fotos das Cenas -->

			<div class="row" id="cena_fotos" style="float:left;width:100%">

				<?php

					while ($row=mysql_fetch_array ($consulta_fotos))	{		

					?>

					<?php if ($detect->isMobile()) { ?>

						<div class=" col-sm-3 col-xs-6 inicial_box_conteudo">

							<div>

								<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>">

									<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>" alt="">

								</a> 

							</div>

						</div>

						<?php } else { ?>

						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 inicial_box_conteudo">

							<div>

								<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>">

									<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>" alt="">

								</a> 

							</div>

						</div>

					<?php } ?>

				<?php } ?>

				<?php 

					$query_imagemcena_random="SELECT * FROM `imagens` WHERE tipo='Cena Hot' AND id_referencia=$id ORDER BY RAND()";				

					$consulta_imagemcena_random=mysql_query($query_imagemcena_random);

					$total_imagemcena_random=mysql_num_rows($consulta_imagemcena_random);

					$row_imagemcena_random=mysql_fetch_array ($consulta_imagemcena_random);

					

					

					if($total_imagemcena_random > 5){

					?>

					<?php if ($detect->isMobile()) { ?>

						<div class="col-sm-3 col-xs-6 inicial_box_conteudo maisfotos" >

							<a href="<?php echo URL ?>assine"> 

								<div class="total-assine-liberar">

									<div class="quant-fotos-assine">+ <?php echo $total_imagemcena_random -5 ?> Fotos</div>

									<div class="total-fotos-assine col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="assine-liberar col-lg-9 col-md-9 col-sm-9 col-xs-9">

											<img src="<?php echo URL ?>imagens/icones/cadeado-assine.png"/>Assine para liberar

										</div>

									</div>

								</div>

								

								<div class="imagem-random-modelo"> 

									<img class="fundo" src="<?php echo URL ?>imagens/backgrounds/background-fotos-assine.png"/>

									<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row_imagemcena_random['imagem']?>" alt=""> 

								</div>

							</a>

						</div>

						<?php }else{ ?>

						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 inicial_box_conteudo maisfotos" >

							<a href="<?php echo URL ?>assine"> 

								<div class="total-assine-liberar">

									<div class="quant-fotos-assine">+ <?php echo $total_imagemcena_random -5 ?> Fotos</div>

									<div class="total-fotos-assine col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="assine-liberar col-lg-9 col-md-9 col-sm-9 col-xs-9">

											<img src="<?php echo URL ?>imagens/icones/cadeado-assine.png"/>Assine para liberar

										</div>

									</div>

								</div>

								

								<div class="imagem-random-modelo"> 

									<img class="fundo" src="<?php echo URL ?>imagens/backgrounds/background-fotos-assine.png"/>

									<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row_imagemcena_random['imagem']?>" alt=""> 

								</div>

							</a>

						</div>

					<?php } ?>

				<?php } ?>

			<?php } ?>

			</div>

			<div class="container float-left">

				<!-- MAIS CENAS COM MODELOS DO ELENCO -->

				<?php  

					//consulta associador de cenas onde busca id da cena e dos modelos associados 

					$query_associador_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena='$id' order by id ";

					$consulta_associador_elenco = mysql_query($query_associador_elenco);

					$total_associador_elenco = mysql_num_rows($consulta_associador_elenco);

					while($dados_associador_elenco = mysql_fetch_array($consulta_associador_elenco)){ 

						

						//CONSULTA NA TABELA DE MODELOS

						$query_modelo_cenas = "SELECT * FROM `modelos` WHERE id=$dados_associador_elenco[id_modelo]  order by id ASC";								

						$consulta_modelo_cenas = mysql_query($query_modelo_cenas);								

						$total_modelo_cenas = mysql_num_rows( $consulta_modelo_cenas);

						$dados_modelo_cenas = mysql_fetch_array($consulta_modelo_cenas);

						

						$query_modelo_associador_cenas = "SELECT * FROM `associador_cenas` WHERE id_modelo=$dados_modelo_cenas[id] AND id_cena<>$id AND status='ativo' AND exibicao='Todos' LIMIT 3 ";				

						$consulta_modelo_associador_cenas = mysql_query($query_modelo_associador_cenas);								

						$total_modelo_associador_cenas = mysql_num_rows($consulta_modelo_associador_cenas);	

					?>

					<?php if($total_modelo_associador_cenas >= 1){?>

						<!-- Titulo com nomes dos modelos do elenco da cena -->

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<h1 class="cena-titulo">

							<span class="icone-pimenta-titulo"></span>HOT CENAS COM <?php echo  utf8_encode(ucfirst($dados_modelo_cenas[nome])); ?></h1>

						</div>

					<?php } $operador = 0 ?>


					<?php while($dados_modelo_associador_cenas = mysql_fetch_array($consulta_modelo_associador_cenas)){

							$query_cena_elenco = "SELECT * FROM `cenas` WHERE id=$dados_modelo_associador_cenas[id_cena] AND cena_home<>'' AND status='Ativo' LIMIT 3 ";

							$consulta_cena_elenco = mysql_query($query_cena_elenco);										

							$total_cena_elenco = mysql_num_rows($consulta_cena_elenco);	

							$dados_cena_elenco = mysql_fetch_array($consulta_cena_elenco);

							if($dados_cena_elenco != ''){

								$operador++;

							if ($detect->isMobile()) { ?>

								<?php if($operador == 1 ){?>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
								<?php }else{?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inicial_box_conteudo">
								<?php }?>
									<div>
										<a href="<?php echo URL.'cena/'.$dados_cena_elenco[id].'/'.URL_amigavel($dados_cena_elenco[titulo]) ?>">
											<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php 
												if($dados_cena_elenco[cena_home] != ''){
													echo $dados_cena_elenco['cena_home'];
													}else{
													echo '0_cena.jpg';
												}
											?>" alt="">
										</a>
										<div class="paginas-titulo-visualizacoes">
											<h4 class="paginas-titulo">
												<a href="<?php echo URL.'cena/'.$dados_cena_elenco[id].'/'.URL_amigavel($dados_cena_elenco[titulo])?>" class="titulo-contos-home">
													<?php echo utf8_encode($dados_cena_elenco['titulo'])?>
												</a>
												<div class="cenas-total-icones">
													<!-- CSS dos 3 icones que vem em seguida -->
													<!-- 1 - Icone e texto - Visualizacao
														<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
														<?php echo number_format_short($dados_cena_elenco['visualizacao'])?>
														</p>
														</div>
													-->
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($dados_cena_elenco['tempo_de_duracao'] != ''){?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo $dados_cena_elenco['tempo_de_duracao']?>
															</p>
														</div>
													<?php } ?>
												</div>
											</h4>
										</div>
									</div>
								</div>

								<?php } else { ?>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
									<div >
										<a href="<?php echo URL.'cena/'.$dados_cena_elenco[id].'/'.URL_amigavel($dados_cena_elenco[titulo]) ?>" class="<?php if($dados_cena_elenco[video_preview] != '') echo ' item-video '; if($dados_cena_elenco[video_preview_gif] != '') echo ' item-video-gif ' ?>">
												<?php if ($detect->isMobile()) { ?>
												<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php 
													if($dados_cena_elenco[cena_home] != ''){
														echo $dados_cena_elenco['cena_home'];
														}else{
														echo '0_cena.jpg';
													}
													?>" alt="">
													<?php } else { ?>

													

													

													<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="//server2.hotboys.com.br/arquivos/<?php 

														if($dados_cena_elenco[cena_home] != ''){

															echo $dados_cena_elenco['cena_home'];

															}else{

															echo '0_cena.jpg';

														}

														

													?>" alt="">

													<span class="far fa-play-circle fa-5x"></span>

													

												<?php }  ?>

												

												<?php

													

													if($dados_cena_elenco[video_preview] != '') {

														

													?>

													

													<video width="100%" style="display:none" loop>

														

														<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_cena_elenco[video_preview] ?>" type="video/mp4">

														

													</video>

													

													<?php

														

													}

													

													

													if($dados_cena_elenco[video_preview_gif] != '') {

														

													?>

													

													<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_cena_elenco[video_preview_gif] ?>"><?php

														

													}

												?>

												

											</a>

											<div class="paginas-titulo-visualizacoes">

												<h4 class="paginas-titulo">

													<a href="<?php echo URL.'cena/'.$dados_cena_elenco[id].'/'.URL_amigavel($dados_cena_elenco[titulo])?>" class="titulo-contos-home">

														<?php echo utf8_encode($dados_cena_elenco['titulo'])?>

													</a>

													<div class="cenas-total-icones">

														<!-- CSS dos 3 icones que vem em seguida -->

														<!-- 1 - Icone e texto - Visualizacao

															<div class="cenas-visualizacao">

															<i class="far fa-eye"></i> 

															<p class="texto">

															<?php echo number_format_short($dados_cena_elenco['visualizacao'])?>

															</p>

															</div>

														-->

														

														<!-- 2 - Icone e texto - Duracao do video -->

														<?php 

															if($dados_cena_elenco['tempo_de_duracao'] != ''){?>

															<div class="cenas-duracao-video">

																<i class="fab fa-youtube"></i>

																<p class="texto">

																	<?php echo $dados_cena_elenco['tempo_de_duracao']?>

																</p>

															</div>

														<?php } ?>

													</div>

												</h4>

											</div>

										</div>

									</div>
									

								<?php } ?>
				<!-- Botão Veja Mais -->

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 col-sm-12 bt-vejamais-desktop modelos">

						<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos">MAIS CENAS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>

					</div>

				</div>

							<?php } } ?>
							<?php

							}  //Fim do WHILE de $dados_associador_elenco

					?>

					<!-- FIM DE CENAS DOS MODELOS DO ELENCO -->

				</div> 

				<!-- Título H1 do conteúdo -->

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">

							<span class="icone-pimenta-titulo"></span>

						<?php echo ASSI_TBM ?></h1>

					</div>

				</div>

				

				

				<!-- Conteúdo - assista tambem -->

				<div class="row" style="float:left;width:100%">

					<?php 

						if ($detect->isMobile()) { 
							$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='todos' order by RAND() LIMIT 5";
						}else{
							$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='todos' order by RAND() LIMIT 3";
						}
						$consulta=mysql_query($query);

					?>

					<?php
						$operador2 = 0;
						while ($dados_conteudo=mysql_fetch_array ($consulta))	{		
						$operador2++;
						?>

						

						<?php if ($detect->isMobile()) { ?>
							<?php if($operador2 == 1){?>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
							<?php }else{?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inicial_box_conteudo">
							<?php }?>

								

								<div>

									<a href="<?php echo URL.'cena/'.$dados_conteudo[id].'/'.URL_amigavel($dados_conteudo[titulo]) ?>">

										

										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php 

											if($dados_conteudo[cena_home] != ''){

												echo $dados_conteudo['cena_home'];

												}else{

												echo '0_cena.jpg';

											}

											

										?>" alt="">

									</a>

									<div class="paginas-titulo-visualizacoes">

										

										<div class="col-lg-12">

											<a href="<?php echo URL.'cena/'.$dados_conteudo[id].'/'.URL_amigavel($dados_conteudo[titulo]) ?>" class="titulo-contos-home">

												<h4><?php echo utf8_encode($dados_conteudo['titulo'])?></h4>

											</a>

										</div>

										

										<div class="col-lg-12 cenas-total-icones">

											

											<!-- 1 - Icone e texto - Visualizacao

												<div class="cenas-visualizacao">

												<i class="far fa-eye"></i> 

												<p class="texto">

												<?php echo number_format_short($dados_conteudo['visualizacao'])?>

												</p>

												</div>

											-->

											

											<!-- 2 - Icone e texto - Duracao do video -->

											<?php 

												if($dados_conteudo['tempo_de_duracao'] != ''){?>

												<div class="cenas-duracao-video">

													<i class="fab fa-youtube"></i>

													<p class="texto">

														<?php echo $dados_conteudo['tempo_de_duracao']?>

													</p>

												</div>

											<?php } ?>

										</div>

									</div>

								</div>

							</div>

							<?php } else { ?>

							

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">

								

								<div>

									<a href="<?php echo URL.'cena/'.$dados_conteudo[id].'/'.URL_amigavel($dados_conteudo[titulo]) ?>" class="<?php if($dados_conteudo[video_preview] != '') echo ' item-video '; if($dados_conteudo[video_preview_gif] != '') echo ' item-video-gif ' ?>">

										

										<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="//server2.hotboys.com.br/arquivos/<?php 

											if($dados_conteudo[cena_home] != ''){

												echo $dados_conteudo['cena_home'];

												}else{

												echo '0_cena.jpg';

											}

											

										?>" alt="">

										<span class="far fa-play-circle fa-5x"></span>

										

										<?php

											if($dados_conteudo[video_preview] != '') {

											?>

											<video width="100%" style="display:none" loop>

												<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo[video_preview] ?>" type="video/mp4">

											</video>

											<?php

											}

											

											if($dados_conteudo[video_preview_gif] != '') {

											?>

											<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo[video_preview_gif] ?>"><?php

											}

										?>

									</a>

									<div class="paginas-titulo-visualizacoes">

										<div class="col-lg-12">

											<a href="<?php echo URL.'cena/'.$dados_conteudo[id].'/'.URL_amigavel($dados_conteudo[titulo]) ?>" class="titulo-contos-home">

												<h4 class="paginas-titulo"><?php echo utf8_encode($dados_conteudo['titulo'])?></h4>

											</a>

										</div>

										

										<!--## INICIO - DIV total dos icones abaixo do video ##-->

										<div class="col-lg-12 cena-total-icones">

											

											<!-- 1 - Icone e texto - Visualizacao

												<div class="cena-visualizacao">

												<i class="fas fa-eye"></i> 

												<span class="texto">

												<?php echo number_format_short($dados_conteudo['visualizacao'])?>

												</span>

												</div>

											-->

											

											<!-- 2 - Icone e texto - Comentario-->

											<div class="cena-comentarios">

												<i class="far fa-comment-dots"></i> 

												<span class="texto">

													<?php

														$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$dados_conteudo[id]' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";

														$consulta_comentario = mysql_query($query_comentario);

														$total_comentario = mysql_num_rows($consulta_comentario);

														

														echo $total_comentario;

													?>

												</span>

											</div>

											<!-- 3 - Icone e texto - Duracao do video -->

											<?php 

												if($dados_conteudo['tempo_de_duracao'] != ''){?>

												<div class="cena-duracao-video">

													<i class="fab fa-youtube"></i>

													<span class="texto">

														<?php echo ($dados_conteudo['tempo_de_duracao'])?>

													</span>

												</div>

											<?php } ?>

										</div>

										

									</div>

								</div>

							</div>

							

						<?php } ?>	

					<?php } ?>	

					

				</div><!-- FIM Conteúdo - assista tambem -->

				

				<!-- Botão Veja Mais -->

				<div class="row" style="float:left;width:100%">

					<div class="col-lg-12 col-sm-12 bt-vejamais-desktop modelos">

						<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos">MAIS CENAS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>

					</div>

				</div>

				<!-- Comentários (Include) -->

				<?php include ('includes/comentarios.php')?>

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

				

				

				

				

				<?php 

					// acrescenta +1 na visita.

					$query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());

				?>			

			</div>

			<!-- Modal reportar erro -->

			<div class="modal fade" id="exampleModal">

				<div class="modal-dialog">

					<div class="modal-content" style="float:left;width:100%">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

							</button>

							

							<div class="row" style="float:left;width:100%">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

									<h1 class="contato_email-titulo">

									<span class="icone-pimenta-titulo"></span>Reportar Erro</h1>

								</div>

							</div>

						</div>

						<div class="modal-body">

							<?php include ('reportar_erro.php')?>

						</div>

					</div>

				</div>

			</div>

			

		</div>

	</body>

</html>				