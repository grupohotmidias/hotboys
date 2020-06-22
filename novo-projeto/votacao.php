<?php 
	
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$menu_audicoes = 'includes/estrutura/topo/audicoes/menu-audicoes.php';
	$footer_desktop = 'includes/estrutura/rodape/rodape-desktop.php';
	$footer_mobile = 'includes/estrutura/rodape/rodape-mobile.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	//variavel das noticias - audicoes hot 3
	$noticias = 'includes/paginas/noticias.php';
	
	//Variavel da class paginação
	$class = '../includes/PaginacaoConteudoClass.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//requer arquivo class paginação
	require_once($class);
	
	//SE HOUVER TAG
	if($tag != ''){
		
		
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
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual -1) * 24;
		}
	}
	
	$ipUsuario = $_SERVER[REMOTE_ADDR];
	unset($idsEnquetes);
	$queryEnquetes = "SELECT * FROM `enquetes` WHERE status='ativo' order by pergunta ASC";
	$consultaEnquetes = mysql_query($queryEnquetes);
	
	while($linha = mysql_fetch_array($consultaEnquetes)){
		
		//verifica se usuario já votou na enquete
		$queryVer = "SELECT * FROM `enquetes_votos` WHERE id_enquete='$linha[id]' AND ip='$ipUsuario'";
		$consultaVer = mysql_query($queryVer);
		$totalVer = mysql_num_rows($consultaVer);	
		
		if($totalVer == 0){
			//ainda não votou	
			$idsEnquetes[] = $linha[id];				
		}	
	}
	if(count($idsEnquetes) < 1){
		//não possui enquetes, ou já votou	
		if($linha[exibir_resultado] == Sim){
			header("Location: /");
			}else{
			header("Location: /");
		}
		exit();			
	}
	
	require_once('../vip/votacao/includes/xajax/xajax_core/xajax.inc.php');
	$xajax = new xajax();		
	require_once('../vip/votacao/includes/xajax-enquete.php');
	$xajax->processRequest();
	$xajax->configure('javascript URI',  '//www.hotboys.com.br/vip/votacao/includes/xajax/');
	
	// consulta modelos quando estes forem das audicoes
	$query_modelos="SELECT * FROM `modelos` WHERE audicoes='Sim' ORDER BY nome ASC LIMIT 10";
	$consulta_modelos=mysql_query($query_modelos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
	
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Audições HOT - Site Hotboys</title>
	</head>
	<body class="audicoes" id="page-top">
		
		<!-- MENU -->
		<header class="menu audicoes">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- SECTION - Bustos das Audicoes  -->
		<section class="audicoes-bustos mb-0">
			<div class="container">
				<div class="row">
					<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
				</div>
			</div>
		</section>
		
		<!-- Menu audicoes hot 3 -->
		<?php include_once ($menu_audicoes); ?>
		
		<!-- Logo Audicoes hot 3-->
		<section class="logoAudicoes">
			<div class="container">
				<div class="row">
					<img class="mx-auto" src="https://www.hotboys.com.br/imagens/audicoes/votacao/logo-eliminacao-audicoes.png?v=<?php echo Version; ?>"/>
				</div>
			</div>
		</section>
		
		<section class="textoVotacao">
			<div class="container p-0">
				<div class="row m-0">
					<h4>Vote! Elimine 2 participantes (1 ativo e 1 passivo)</h4>
					</div>
				</div>
			</section>

		<?php	
			foreach($idsEnquetes as $idEnquete){
				//pega infos da enquete
				$queryEnquete = "SELECT * FROM `enquetes` WHERE id='$idEnquete'";
				$consultaEnquete = mysql_query($queryEnquete);
				$linha = mysql_fetch_array($consultaEnquete);
			?>
			
			<!-- participantes das audicoes -->
			<section class="participantes-audicoes pt-3">
				<div class="container">
					
					<!-- Titulo da pagina -->
					<div class="row votacao">
						<div class="col-lg-12 mx-auto p-0">
							<h5 style="float:left"><?php echo utf8_encode($linha[pergunta]) ?></h5>
						</div>
					</div>
					
				</div>
			</section>
			
			<!-- Estrutura participantes -->
			<section class="modelos audicoes votacao" style="padding-top:0">
				<div class="container">
					<div class="row">
						<ul>
							<?php
								//consulta alternativas
								$queryAlternativas = "SELECT * FROM `enquetes_alternativas` WHERE id_enquete='$linha[id]' order by id";
								$consultaAlternativas = mysql_query($queryAlternativas);
								while($linhaAlternativa = mysql_fetch_array($consultaAlternativas)){
									
								?>
								<li class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 cenas mx-auto">
									<a href="<?php echo URL ?>assine/">
										<div class="card participantes mb-0 p-0 box-shadow">
											
											<!-- imagens dos modelos -->
											<div class="thumb">
												<img class="card-img-top" id="foto<?php echo $counter3++ ?>" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $linhaAlternativa[imagem_audicao] ?>" data-holder-rendered="true">
											</div>
											
											
										</div>
									</a><!-- nomes dos modelos -->
									<div class="card-body participantes mb-1">
										<h1 class="card-titulo"><?php echo utf8_encode($linhaAlternativa['alternativa'])?></h1>
									</div>
									
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</section>
			
		<?php } ?>
		
		<!-- FOOTER -->
		<footer class="footer">
			<!-- Footer DESKTOP-->
			<?php include_once($footer_desktop); ?>
			
			<!-- Footer MOBILE -->
			<?php include_once($footer_mobile); ?>
		</footer>
		
		<!-- Javascripts -->
		<?php include_once($javascript); ?>	
	</body>
</html>					