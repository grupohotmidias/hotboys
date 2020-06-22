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
    $tag = addslashes($_GET[tag]);
	
    $tag = explode("-",$tag);
    $tag = implode(" ",$tag);
	
	//SE HOUVER TAG
	if($tag != ''){
		
		//SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query_paginacao = "SELECT * FROM cenas WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL.'tag/'.$tag;
		
		
		#####consulta videos da página
		#####consulta videos da página 
		
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual - 1) * 24;
		}
		
        $query_categoria ="SELECT * FROM `categorias` WHERE categoria='$tag' $complemento  ";
        $consulta_categoria = mysql_query($query_categoria);    
        $dados_categoria = mysql_fetch_array($consulta_categoria);
        
        $query_categoria_conteudo = "SELECT * FROM `categorias_conteudo` WHERE id_categoria=$dados_categoria[id] AND pagina='Video Hot'  $complemento LIMIT $inicio_consulta, 24";
        $consulta_categoria_conteudo = mysql_query($query_categoria_conteudo);
        
        
        //SE NÃO HOUVER TAG
		}else{
		
		
		// SE FOR SOMENTE BUSCA
		//$pag = $rotas[3]; 
		//$s = $rotas[2];
		
		//se consulta houver v  consulta por visualizaçoes
		if($s == 'v'){
			$complemento = 'ORDER BY visualizacao DESC';
		}
		//se consulta houver a consulta por Random
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
		$query_paginacao = "SELECT * FROM cenas WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL.'videos';
		
		#####consulta videos da página
		#####consulta videos da página 
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual -1) * 24;
		}
		//Tras todos os videos 
		$query_cenas = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' AND `id` IN ('360','359','325','373','299','340','226','206','350') $complemento LIMIT $inicio_consulta, 24";
		$consulta_cenas = mysql_query($query_cenas);
		$total = mysql_num_rows($consulta_cenas);
		
		//} // FIM SE FOR SOMENTE BUSCA
	}
?>
<!DOCTYPE html>
<html lang="pt-br">	<html class="no-js">
	
	<head>			
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<title> <?php echo TITULO_CENAS ?></title>		
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">			
		<meta name="description" CONTENT="Videos HOTBOYS com cenas do site mais quente da net. Venha conferir vídeos grátis com os caras mais dotados da internet.">
		
		<!-- HEAD (Include) -->			
		<?php include ('includes/head.php')?>		
	</head>		
	
	<body id="body" class="fundo-preto">			
		
		<div class="container">
			
			<!-- TOP (Include) -->			
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top2.php')?>	
			</div>
			
			<!-- Título H1 da pagina -->	
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
					<span class="icone-pimenta-titulo"></span> HOT CENAS GRÁTIS</h1>
				</div>	
			</div>	
			
			
			<!-- Canecas Hotboys 
			<?php //if ($detect->isMobile()) { ?>
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
					<a href="https://loja.hotboys.com.br/caneca-hotboys--;produto6908.php" target="_blank">
						<img src="<?php //echo URL ?>imagens/loja/caneca-hotboys02_mobile.jpg" alt="imagem banner" width="100%">
					</a>
				</div>
				<?php //}else{ ?>
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
					<a href="https://loja.hotboys.com.br/caneca-hotboys--;produto6908.php" target="_blank">
						<img src="<?php //echo URL ?>imagens/loja/caneca-hotboys03.jpg" alt="imagem banner" width="100%">
					</a>
				</div>
			<?php //} ?>
			-->
			
			
			<?php /*
			<!-- 3 Botões --> 
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container tres-botoes container-table-cenas">						
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 coluna-tres-botoes">							
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos">								
							<a href="<?php echo URL.'videos/?'?>s=v"><button type="button" class="tres-botoes-modelos float-right"><?php echo M_VISTOS ?></button></a>
						</div>						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos ordem-alfabetica">								
							<a href="<?php echo URL ?>videos/?s=a"><button type="button" class="tres-botoes-modelos"><?php echo O_ALEATORIA ?></button></a>							
							</div>							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 modelos">							
							<a href="<?php echo URL ?>videos/?s=r"><button type="button" class="tres-botoes-modelos"><?php echo M_RECENTES ?></button></a>
						</div>						
					</div>					
				</div>
			</div> */ ?>
			<!-- conteudo videos -->
			<div class="row" style="float:left;width:100%">
				<?php 
					//CENAS TAGS 
					if($tag != ''){
						while($dados_categoria_conteudo = mysql_fetch_array($consulta_categoria_conteudo)){
							$query_cenas_tag = "SELECT * FROM `cenas` WHERE id='$dados_categoria_conteudo[id_conteudo]' AND status='Ativo' AND exibicao='Todos' $complemento";
							$consulta_cenas_tag = mysql_query ($query_cenas_tag);
							while($dados_cenas_tag = mysql_fetch_array($consulta_cenas_tag)){ ?>
							
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 cenas inicial_box_conteudo">
								
								
								<div>									
									<a href="<?php echo utf8_encode(URL.'video-gratis/'.$dados_cenas_tag[id].'/'.URL_amigavel($dados_cenas_tag[titulo])) ?>" class="<?php if($dados_cenas_tag[video_preview] != '') echo ' item-video '; if($dados_cenas_tag[video_preview_gif] != '') echo ' item-video-gif ' ?>">										
										<img class="lazy card-img-top-cenas"  src="../../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_cenas_tag[cena_home]?>" alt="imagem cena">
										<?php											
											if($dados_cenas_tag[video_preview] != '')
											{											?>	
											<span class="far fa-play-circle fa-5x" style="display:none"></span>
											<video  width="100%" style="display:none" loop>												
												<source src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_cenas_tag[video_preview] ?>"type="video/mp4">
											</video>											
											<?php											
											}																						
											if($dados_cenas_tag[video_preview_gif] != '') {											
											?>											
											<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_cenas_tag[video_preview_gif] ?>" alt="video preview">
											<?php			
											}								
										?>		
									</a>									
									<div class="paginas-titulo-visualizacoes">										
										<h4 class="paginas-titulo">											
											<a href="<?php echo utf8_encode(URL.'video-gratis/'.$dados_cenas_tag[id].'/'.URL_amigavel($dados_cenas_tag[titulo])) ?>">
												<?php echo utf8_encode($dados_cenas_tag['titulo'])?>
											</a>											
											<?php /*	<div class="cenas-total-icones">
												<!-- CSS dos 3 icones que vem em seguida -->
												<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
												
											<!-- 1 - Icone e texto - Visualizacao-->
												<div class="cenas-visualizacao">
													<i class="far fa-eye"></i> 
													<p class="texto">
														<?php echo number_format_short($dados_cenas_tag['visualizacao'])?>
													</p>
												</div>
												 */ ?>
												<!-- 2 - Icone e texto - Duracao do video -->
												<?php 
													if($dados_cenas_tag['tempo_de_duracao'] != ''){?>
													<div class="cenas-duracao-video">
														<i class="fab fa-youtube"></i>
														<p class="texto">
															<?php echo $dados_cenas_tag['tempo_de_duracao']?>
														</p>
													</div>
												<?php } ?>
											</div>									
										</h4>									
									</div>								
								</div>							
							</div>
						<?php  } } }else{  ?>	
						
						
						<?php
							//CENAS
							while($row_conteudo = mysql_fetch_array($consulta_cenas)){ 							
							?>	
							<?php 
								if ($detect->isMobile()) { ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 cenas inicial_box_conteudo">		
									
									
									<div>									
										<a href="<?php echo utf8_encode(URL.'video-gratis/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">									
											<img class="card-img-top-cenas" src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home]?>" alt="imagem cena mobile">
										</a>									
										<div class="paginas-titulo-visualizacoes">										
											<h4 class="paginas-titulo">											
												<a href="<?php echo URL.'video-gratis/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo]) ?>">
													<?php echo utf8_encode($row_conteudo['titulo'])?>
												</a>											
												
										<?php /*		
												<div class="cenas-total-icones">
													
													<!-- CSS dos 3 icones que vem em seguida -->
													<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
													
													<!-- 1 - Icone e texto - Visualizacao-->
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($row_conteudo['visualizacao'])?>
														</p>
													</div>
													*/ ?>
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
								
								<?php } else { ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 cenas inicial_box_conteudo">		
									
									
									<div>									
										<a href="<?php echo utf8_encode(URL.'video-gratis/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>" class="<?php if($row_conteudo[video_preview] != '') echo ' item-video '; if($row_conteudo[video_preview_gif] != '') echo ' item-video-gif ' ?>">										
											
											<img class="lazy card-img-top-cenas" src="imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home]?>" alt="imagem cena">
											
											
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
												
												<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[video_preview_gif] ?>" alt="video preview">
												<?php			
												}								
											?>		
										</a>									
										<div class="paginas-titulo-visualizacoes">										
											<h4 class="paginas-titulo">											
												<a href="<?php echo URL.'video-gratis/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo]) ?>">
													<?php echo utf8_encode($row_conteudo['titulo'])?>
												</a>											
												
												<!-- 3 ICONES abaixo do Video -->
												<div class="cenas-total-icones">
													
												<?php /*	<!-- 1 - Icone e texto - Visualizacao-->
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($row_conteudo['visualizacao'])?>
														</p>
													</div> */ ?>
													
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($row_conteudo['tempo_de_duracao'] != ''){?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo ($row_conteudo['tempo_de_duracao'])?>
															</p>
														</div>
													<?php } ?>
												</div>
												
												
											</h4>									
										</div>								
									</div>							
								</div>
							<?php } ?>
						<?php }}	?>  					
			</div>																				
			
	<?php /*		<!-- Paginação da página -->	
			<div class="row" style="float:left;width:100%">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-table">										
					<nav aria-label="Page navigation example">														
						<ul class="pagination centraliza">	
							<?php if($pgAtual > 1){ ?>																		
								<li class="page-item">																		
									<a href="<?php echo URL.'videos/'.(-$Paginacao +$pgAtual) ?>" class="page-link previous" href="#" aria-label="Previous">
										<i class="fa fa-caret-left fa-1x" aria-hidden="true"></i>
									</a>																	
								</li>	
							<?php } ?>	
							
							<?php echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?> 															
							
							<?php if($pgAtual < $totalPaginas){ ?>														
								<li class="page-item">								
									<a  href="<?php echo URL.'videos/'.($Paginacao +$pgAtual) ?>" class="page-link next" aria-label="Next" >
										<i class="fa fa-caret-right fa-1x" aria-hidden="true"></i>								
									</a>								
								</li>	
							<?php } ?>																								
						</ul>													
					</nav>											
				</div>									
			</div>	
			*/ ?>
			<!-- FOOTER (Include) -->	
			<?php include ('includes/footer.php') ?>	
			
			
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