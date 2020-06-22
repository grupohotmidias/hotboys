<?php
	//require('../traducao/traducoes.php');
	//verifica_url_traducao();
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	//class paginação
	require('includes/PaginacaoConteudoClass.php');
	
	
	// tras via GET as variaveis 
	$s = addslashes($_GET[s]);
	$pag = addslashes($_GET[pag]); 
	
	
	// SE FOR SOMENTE BUSCA
	//$pag = $rotas[3]; 
	//$s = $rotas[2];
	
	//se consulta houver v  consulta por visualizaçoes
	if($s == 'v'){
		$complemento = 'ORDER BY visualizacao DESC';
	}
	//se consulta houver r consulta por Random
	if($s == 'a'){
		$complemento = 'ORDER BY RAND()';
	}
	//se consulta houver r consulta por ordem
	if($s == 'r' or $s == ''){
		$complemento = 'ORDER BY id DESC';
	}
	
	//SE NAO FOR CONSULTA
	#####Página Atual
	(int)$pgAtual = addslashes($pag);
	if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
	#####paginação
	$Paginacao = new Paginacao;
	$Paginacao->NumPgLaterais = $totalPaginas;
	
	
	#####consulta total de filmes
	$query_paginacao = "SELECT * FROM cena_serie_info WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
	$consulta_paginacao = mysql_query($query_paginacao);
	$totalVideos_cena = mysql_num_rows($consulta_paginacao);
	$totalPaginas = ceil($totalVideos_cena / 21);
	
	
	$Paginacao->SiteLink = ''; 
	#####paginação
	$Paginacao = new Paginacao;
	$Paginacao->NumPgLaterais = $totalPaginas;
	//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
	
	if($s != ''){
		$Paginacao->SiteLink = URL.'series_cenas.php?s='.$s;	
		}else{
		$Paginacao->SiteLink = URL.'series';
	}
	
	#####consulta videos da página
	#####consulta videos da página 
	
	
	
	if($pgAtual == 1){
		$inicio_consulta = '0';
		} else {
		$inicio_consulta = ($pgAtual - 1) * 20;
	}
	//Tras todos os videos 
	$query_series = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' $complemento LIMIT $inicio_consulta, 24";
	$consulta_series = mysql_query($query_series);
	$total = mysql_num_rows($consulta_series);
	
	//} // FIM SE FOR SOMENTE BUSCA
?>
<!DOCTYPE html>
<html lang="pt-br">	<html class="no-js">
	<head>			
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">			
		<title>Series Gays HotBoys - As melhores séries com homens fodendo.</title>
		<meta name="viewport" content="width=device-width, user-scalable=no">		
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">			
		<meta name="description" CONTENT="Hot Boys Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">			
		
		<!-- HEAD (Include) -->		
		<div class="row" style="float:left;width:100%">
			<?php include ('includes/head.php')?>
		</div>
		
		
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
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
					<span class="icone-pimenta-titulo"></span>SÉRIES</h1>
				</div>
			</div>
			
			
			<!-- 3 botoes -->				
			<div class="row" style="float:left;width:100%">									
				<!-- 3 Botões --> 							
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container tres-botoes container-table-cenas" style="margin-bottom:5px!important">						
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 coluna-tres-botoes">							
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos">								
							<a href="<?php echo URL ?>series_cenas.php?s=v"><button type="button" class="tres-botoes-modelos float-right">Mais Vistos</button></a>
							</div>							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos ordem-alfabetica">								
							<a href="<?php echo URL ?>series_cenas.php?s=a"><button type="button" class="tres-botoes-modelos">Ordem Aleatória</button></a>							
							</div>							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos">							
							<a href="<?php echo URL ?>series_cenas.php?s=r"><button type="button" class="tres-botoes-modelos">Mais Recentes</button></a>
						</div>						
					</div>					
				</div>	
			</div>
			
			
			<!-- Conteúdo - Cenas -->
			<div class="row" style="float:left;width:100%">					
				<?php														
					while($row_conteudo = mysql_fetch_array($consulta_series)){ 							
					?>	
					<?php 
						if ($detect->isMobile()) { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6  inicial_box_series">								
							<div>									
								<a href="<?php echo utf8_encode(URL.'serie-cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
									<img class="card-img-top-cenas" src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[imagem_serie_lista]?>">
								</a>									
								<div class="paginas-titulo-visualizacoes">										
									<h4 class="paginas-titulo">											
										<a href="<?php echo utf8_encode(URL.'serie-cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>"><?php echo utf8_encode($row_conteudo['titulo'])?></a>											
										<div class="cenas-total-icones">
											<!-- CSS dos 3 icones que vem em seguida -->
											<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
											
											<!-- 1 - Icone e texto - Visualizacao
											<div class="cenas-visualizacao">
												<i class="far fa-eye"></i> 
												<p class="texto">
													<?php echo number_format_short($row_conteudo['visualizacao'])?>
												</p>
											</div>
											-->
											
											<!-- 2 - Icone e texto - Duracao do video -->
											<?php 
												if($row_conteudo['tempo_de_duracao'] != ''){?>
												<div class="cenas-duracao-video">
													<i class="fab fa-youtube"></i>
													<p class="texto">
														<?php echo $row_conteudo['tempo_de_duracao']?>
													</p>
												</div>
											<?php } ?>
										</div>												
									</h4>									
								</div>								
							</div>							
						</div>	
						<?php } else {?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6  inicial_box_series">								
							<div>									
								<a href="<?php echo utf8_encode(URL.'serie-cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>" class="<?php if($row_conteudo[video_preview] != '') echo ' item-video '; if($row_conteudo[video_preview] != '') echo ' item-video-gif ' ?>">										
									<img class="lazy card-img-top-cenas" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[imagem_serie_lista]?>">
									<?php											
										if($row_conteudo[video_preview] != '')
										{											?>
									<span class="far fa-play-circle fa-5x" style="display:none"></span>
										<video  width="100%" style="display:none" loop>
											<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[video_preview] ?>"type="video/mp4">
										</video>											
										<?php											
										}																						
										if($row_conteudo[video_preview_gif] != '') {											
										?>											
										
										<img style="display:none" class="preview-video" src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[video_preview] ?>">
										<?php			
										}								
									?>		
								</a>									
								<div class="paginas-titulo-visualizacoes">										
									<h4 class="paginas-titulo">											
										<a href="<?php echo utf8_encode(URL.'serie-cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>"><?php echo utf8_encode($row_conteudo['titulo'])?></a>											
										<div class="cenas-total-icones">
											<!-- CSS dos 3 icones que vem em seguida -->
											<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
											
											<!-- 1 - Icone e texto - Visualizacao
											<div class="cenas-visualizacao">
												<i class="far fa-eye"></i> 
												<p class="texto">
													<?php echo number_format_short($row_conteudo['visualizacao'])?>
												</p>
											</div>
											-->
											
											<!-- 2 - Icone e texto - Duracao do video -->
											<?php 
												if($row_conteudo['tempo_de_duracao'] != ''){?>
												<div class="cenas-duracao-video">
													<i class="fab fa-youtube"></i>
													<p class="texto">
														<?php echo $row_conteudo['tempo_de_duracao']?>
													</p>
												</div>
											<?php } ?>
										</div>											
									</h4>									
								</div>								
							</div>							
						</div>
						
					<?php } ?>
				<?php } ?>  					
			</div>																				
			
			
			
			<!-- Paginação da página 			
				<div class="row" style="float:left;width:100%">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-table">														
				<nav aria-label="Page navigation example">														
				<ul class="pagination centraliza">																			
				<li class="page-item">																		
				<a class="page-link previous" href="#" aria-label="Previous">																				
				<i class="fa fa-caret-left fa-1x" aria-hidden="true"></i>																			
				</a>																	
			</li>	-->																		
			<?php //echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?> 															
			<!--<li class="page-item numeros"><a class="page-link" href="#">1</a></li>																	
				<li class="page-item numeros"><a class="page-link" href="#">2</a></li>																
			<li class="page-item numeros"><a class="page-link" href="#">3</a></li>	-->																														
			
			<!--<li class="page-item">																		
				<a class="page-link next" href="#" aria-label="Next">																				
				<i class="fa fa-caret-right fa-1x" aria-hidden="true"></i>																		
				</a>																	
				</li>																									
				</ul>													
				</nav>								
				</div>					
			</div>-->
			
			
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