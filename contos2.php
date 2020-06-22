<?php
	//require('../traducao/traducoes.php');
	//verifica_url_traducao();
	require('config/configuracoes.php');
	require_once('includes/funcoes.php');
	
	header('Content-Type: text/html; charset=utf-8');
	
	//class paginação
	$consulta1 = mysql_query($query1);
	require('includes/PaginacaoConteudoClass.php');
	
    $palavra = preg_replace('/[^[:alpha:]_]/', '',$_POST['search']);  
	if ($_POST["search"] != ''){ 
		$query1 = "SELECT * FROM `contos_hot` WHERE titulo LIKE '%".$palavra."%' ORDER BY id DESC ";
		$result1 = mysql_num_rows($consulta1);
	}
	// tras via GET as variaveis 
	$s = addslashes($_GET[s]);
    $l = addslashes($_GET[l]);
	$pag = addslashes($_GET[pag]);
	$busca = addslashes($_GET[busca]);
	// SE FOR SOMENTE BUSCA
	//$pag = $rotas[3]; 
	//$s = $rotas[2];
	//se $s tiver consulta 	
	if($s != ''){
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
		//se consulta houver $palavra consulta busca 
		if($s == $palavra){	
			
			$complemento = 'AND titulo LIKE "'.$palavra.'%"';	
		}
		}else{
		//se nao houver consulta por id descrescente 
		$complemento = 'ORDER BY RAND()';
	}
	//SE NAO FOR CONSULTA
	#####Página Atual
	(int)$pgAtual = addslashes($pag);
	if($pgAtual < 1 OR $pgAtual == '')$pgAtual = 1;
	#####paginação
	$Paginacao = new Paginacao;
	$Paginacao->NumPgLaterais = $totalPaginas;
	#####consulta total de filmes
	$query_paginacao = "SELECT * FROM contos_hot WHERE  img<>'' $complemento";
	$consulta_paginacao = mysql_query($query_paginacao);
	$totalVideos_cena = mysql_num_rows($consulta_paginacao);
	$totalPaginas = ceil($totalVideos_cena / 24);
	$Paginacao->SiteLink = ''; 
	#####paginação
	$Paginacao = new Paginacao;
	$Paginacao->NumPgLaterais = $totalPaginas;
	//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
	
	if($s != ''){
		$Paginacao->SiteLink = URL.'contos.php?s='.$s;	
		}else{
		$Paginacao->SiteLink = URL.'contos-eroticos';
	}
	#####consulta videos da página
	#####consulta videos da página 
	if($pgAtual == 1){
		$inicio_consulta = '0';
		} else {
		$inicio_consulta = ($pgAtual - 1) * 24;
	}
	//Tras todos os contos
	$query_contos = "SELECT * FROM `contos_hot` WHERE img<>'' $complemento LIMIT $inicio_consulta, 24 ";
	$consulta_contos = mysql_query($query_contos);
	$total_contos = mysql_num_rows($consulta_contos);		
	//} // FIM SE FOR SOMENTE BUSCA
	$titulo = ('Contos Eróticos HotBoys - Os melhores contos eróticos gays da internet.');
?>
<!-- Faz o PHP Mostrar outros erros -->
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<title><?php echo $titulo ?></title>
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- HEAD (Include) -->
		<?php include('includes/head.php')?>
	</head>
	<body id="body" class="fundo-preto">
		
		
		<!-- Conteúdo - Cenas -->
		<div class="container">
			
			
			
			<!-- TOP (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include('includes/top.php')?>
			</div
			
			
			<!-- titulo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="contos-titulo"  style="border-left:0!important;padding-left:0!important">
					<span class="icone-pimenta-titulo"></span><?php echo CONTOS ?></h1>
				</div>
			</div>
			<!-- 3 Botões -->	
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container tres-botoes container-table-cenas">
					<!-- campo de busca no menu desktop -->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 modelos">
							<a href="<?php echo URL.'contos-eroticos/?'?>s=v"><button type="button" class="tres-botoes-modelos float-right"><?php echo M_VISTOS ?></button></a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 modelos">
							<a href="<?php echo URL.'contos-eroticos/?s=r'?>"><button type="button" class="tres-botoes-modelos"><?php echo M_RECENTES ?></button></a>
						</div>
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 modelos">
							<li class="nav-item" style="list-style:none">
								<form method="post" action="<?php echo URL.'contos-eroticos/'?>"> 
									<input type="search" id="search" name="search" placeholder="Buscar..." list="preenchimento-automatico" style="width: 100%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #e0e0e0;background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0;height: 38px;margin-top: 15px;-webkit-appearance: none;border-radius: 50px;">
								</form>	
							</li>
						</div>
					</div>
				</div>
			</div>
			<?php  
				if($_POST['search'] != ''){?>
                <div class="row" style="float:left;width:100%">
					<?php
						while($consulta_contos = mysql_fetch_array($consulta1)){ 	
						?>
						<a href="<?php echo URL.'conto-erotico/'.$consulta_contos[id].'/'.URL_amigavel($consulta_contos[titulo])?>">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 contos inicial_box_conteudo">
								<div class="contos-eroticos-home">
									
									<img class="lazy card-img-top-contos" src="imagens/icones/loading/fundo-contos.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_contos['img']?>" alt="imagem contos">
									
									<div class="paginas-titulo-visualizacoes contos-home">
										<h4 class="paginas-titulo">
											<?php echo utf8_encode($consulta_contos['titulo']) ?>
											
											<p class="paginas-visualizacoes">
												<i class="far fa-eye" aria-hidden="true"></i>
												<span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
													<?php echo number_format_short($consulta_contos['visualizacao'])?>
												</span>
											</p>
										</h4>
									</div>
								</div> 
							</div>
						</a>
						<?php
						}		
					?> 
				</div>
				<?php }else{?>			
				<div class="row" style="float:left;width:100%">
					<?php
						while($row=mysql_fetch_array($consulta_contos)){		
						?>
						<a href="<?php echo URL.'conto-erotico/'.$row[id].'/'.URL_amigavel($row[titulo])?>">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 contos inicial_box_conteudo">
								<div class="contos-eroticos-home">
									<img class="lazy card-img-top-contos" src="imagens/backgrounds/contos_arte.jpg" data-src="https://server2.hotboys.com.br/arquivos/contos_arte.jpg" alt="imagem contos">
									
									<div class="paginas-titulo-visualizacoes contos-home">
										<h4 class="paginas-titulo">
											<?php echo utf8_encode(($row['titulo'])) ?>
											<p class="paginas-visualizacoes">
												<i class="far fa-eye" aria-hidden="true"></i>
												<span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
													<?php echo number_format_short($row['visualizacao'])?>
												</span>
											</p>
										</h4>
									</div>
								</div> 
							</div>
						</a>
						<?php
						}		
					?> 
				</div>
			<?php } ?>
			<?php //echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>
			<!-- Paginação da página -->			
			<div class="row" style="float:left;width:100%">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-table">				
					<nav aria-label="Page navigation example">						
						<ul class="pagination centraliza">
							<?php if($pgAtual > 1){ ?>																			
								<li class="page-item">																		
									<a class="page-link previous" href="<?php echo URL.'contos-eroticos/'.(-$Paginacao +$pgAtual) ?>" aria-label="Previous">
										<i class="fa fa-caret-left fa-1x" aria-hidden="true"></i>
									</a>																	
								</li>
							<?php } ?>																			
							<?php echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?> 															
							<!--<li class="page-item numeros"><a class="page-link" href="#">1</a></li>
								<li class="page-item numeros"><a class="page-link" href="#">2</a></li>
							<li class="page-item numeros"><a class="page-link" href="#">3</a></li>	-->
                            <?php if($pgAtual < $totalPaginas){ ?>	
								<li class="page-item">																		
									<a class="page-link next" href="<?php echo URL.'contos-eroticos/'.($Paginacao +$pgAtual) ?>" aria-label="Next">
										<i class="fa fa-caret-right fa-1x" aria-hidden="true"></i>
									</a>																	
								</li>	
							<?php } ?> 																								
						</ul>							
					</nav>
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
		</div>
	</body>
</html>																													