<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	//Variavel da class paginação
	$class = '../includes/PaginacaoConteudoClass.php';
	
	
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//requer arquivo class paginação
	require_once($class);


	$s = addslashes($_GET[s]);	
	$l = addslashes($_GET[l]);
	$pag = addslashes($_GET[pag]);
    $tags = addslashes($_GET[tags]);
	
    $tags = explode("-",$tags);
    $tags = implode(" ",$tags);
	
	//SE HOUVER TAG
	if($tags != ''){
		
		//SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query_paginacao = "SELECT * FROM modelos WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 21);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL.'tags/'.$tags;
		
		#####consulta videos da página
		#####consulta videos da página 
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual +1) * 20;
		}
		
        $query_categoria ="SELECT * FROM `categorias` WHERE categoria='$tags' $complemento ";
        $consulta_categoria = mysql_query($query_categoria);    
        $dados_categoria = mysql_fetch_array($consulta_categoria);
        
        $query_categoria_conteudo = "SELECT * FROM `categorias_conteudo` WHERE id_categoria=$dados_categoria[id] AND pagina='Modelos Hot'  $complemento LIMIT $inicio_consulta, 24";
        $consulta_categoria_conteudo = mysql_query($query_categoria_conteudo);       
        //SE NÃO HOUVER TAG
		}else{
        //SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//se $s tiver consulta 		
		
		//se $s tiver consulta 	
		if($s != ''){
			//se consulta houver v  consulta por visualizaçoes
			if($s == 'v'){	
				$complemento = 'ORDER BY visualizacao DESC';	
			}
			//se consulta e o modelo tiver telefone cadastrado
			if($s == 'f'){	
				$complemento = 'AND fone_contato!='."''".' ORDER BY ORDER BY visualizacao DESC DESC';	
			}
			//se consulta houver n consulta por nome
			if($s == 'n'){	
				$complemento = 'ORDER BY nome ASC';	
			}
			//se consulta houver s consulta por letra
			if($s == 's'){	
				
				$complemento = 'AND nome LIKE "'.$l.'%" ORDER BY visualizacao DESC';	
			}
			}else{
			//se nao houver consulta por id descrescente 
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
		$query_paginacao = "SELECT * FROM modelos WHERE `exibicao`='Todos' AND status='Ativo' AND modelo_perfil <>'' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 21);
        
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/modelos/'.$s;
		
		$Paginacao->SiteLink = URL.'atores';
		
        
		#####consulta videos da página
		#####consulta videos da página 
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual +1) * 20; 
		}
		/* Busca Modelos---------------- */	
		//Consulta Todos os modelos 	
		$query_modelos = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND modelo_perfil <>'' $complemento 
		LIMIT $inicio_consulta, 20";	
		$consulta_modelos = mysql_query($query_modelos);	
		$total_modelos = mysql_num_rows($consulta_modelos);	
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Homens HotBoys - Os Homens mais gostosos do Brasil.</title>
		
	</head>
	<body class="modelos" id="page-top">
		
		<!-- MENU -->
		<header class="menu modelos">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
		
		<!-- CONTEUDO -->
		<!-- videos com paginacao -->
		<section class="modelos m-0">
			
			<div class="container">
				
				<!-- Titulo da pagina -->
				<div class="row">
					<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
						<h4 style="float:left">Atores</h4>
					</div>
					</div>
					
					<div class="row">
						<!-- CENAS -->
						<ul>
							<!-- Consulta cenas -->
							<?php while ($row_modelos=mysql_fetch_array ($consulta_modelos)){ ?>
								<li class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 cenas">
									<a href="<?php echo URL.'ator/'.$row_modelos[id].'/'.utf8_encode(URL_amigavel($row_modelos[nome]))?>">
										<div class="card mb-2 box-shadow my-xl-2">
											
											<!-- imagens dos modelos -->
											<div class="thumb">
												<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($row_modelos[modelo_perfil]) ?>" data-holder-rendered="true">
											</div>
											
											<!-- nomes dos modelos -->
											<div class="title mobile"><?php echo utf8_encode($row_modelos[nome]) ?></div>
											<div class="title desktop"><?php echo utf8_encode($row_modelos[nome]) ?></div>
											
										</div> 
									</a>
								</li>
							<?php } ?>
						</ul>
						
					</div>
					
					<!-- paginacao --> 
				<nav aria-label="Page navigation example" class="navigation">
					<ul class="pagination justify-content-center">
						
						
						<?php //Se a paginação estiver em um numero maiso que 1 aparece o voltar
						if($pgAtual > 1){ ?>																		
								<li class="page-item"><a class="page-link" href="<?php echo URL.'atores/'.(-$Paginacao +$pgAtual) ?>">Anterior</a></li>
							<?php } ?>	
						
						<?php //Numeros botoes paginação
						echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>  
						
						<?php //Botao avançar
						if($pgAtual < $totalPaginas){ ?>														
							<li class="page-item"><a class="page-link" href="<?php echo URL.'atores/'.($Paginacao +$pgAtual) ?>">Próxima</a></li>	
						<?php } ?>			
						
					</ul>
				</nav>
					
			</div>
			
		</section>
		</div>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include_once ($javascript); ?>
		
	</body>
</html>											