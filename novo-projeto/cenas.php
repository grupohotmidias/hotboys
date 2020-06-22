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
		$query_cenas = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' $complemento LIMIT $inicio_consulta, 24";
		$consulta_cenas = mysql_query($query_cenas);
		$total = mysql_num_rows($consulta_cenas);
		
		// consulta das cenas
		//$query_cenas="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 24";
		//$consulta_cenas=mysql_query($query_cenas); 
	}
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="Videos HOTBOYS com cenas do site mais quente da net. Venha conferir vídeos grátis com os caras mais dotados da internet.">
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Videos HotBoys - As Cenas de Vídeos gay de Homens Fodendo</title>
	</head>
	
	<body id="page-top">
		
		<!-- MENU -->
		<header class="menu cenas">
			<?php include_once ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
		
		<!-- CONTEUDO -->
		<!-- videos com paginacao -->
		<section class="cenas">
			
			<div class="container">
				
				<!-- Titulo da pagina -->
				<div class="row">
					<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
						<h4 style="float:left">Vídeos</h4>
					</div>
				</div>
				
				<!-- CENAS -->
				<div class="row">
					
					<!-- Consulta cenas -->
					<ul>
						<?php while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>	
							<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
								<a href="<?php echo utf8_encode(URL.'cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
									<div class="card mb-2 box-shadow my-xl-2">
										
										<!-- imagem da cena -->
										<div class="thumb">
											<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home] ?>" data-holder-rendered="true">
										</div>
										
										<div class="card-body">
											<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo['titulo'])?></h1>
											<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
										</div>
										
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
								<li class="page-item"><a class="page-link" href="<?php echo URL.'videos/'.(-$Paginacao +$pgAtual) ?>">Anterior</a></li>
							<?php } ?>	
						
						<?php //Numeros botoes paginação
						echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>  
						
						<?php //Botao avançar
						if($pgAtual < $totalPaginas){ ?>														
							<li class="page-item"><a class="page-link" href="<?php echo URL.'videos/'.($Paginacao +$pgAtual) ?>">Próxima</a></li>	
						<?php } ?>			
						
					</ul>
				</nav>
				
				
				
			</div>
			
		</section>
		</div>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include_once ($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include_once ($footer_mobile); ?>
		</footer>
		
		<!--  Javascripts -->
		<?php include_once ($javascript); ?>	
		
	</body>
</html>												