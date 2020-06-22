<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');

	$naoVerificarPagamento = true;
	
	// tras via GET as variaveis 
	$s = addslashes($_GET[s]);
	$pag = addslashes($_GET[pag]);
    $tag = addslashes($_GET[tag]);
	$tag = explode("-",$tag);
    $tag = implode(" ",$tag);
	
	$counter = 1;
	
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
		$query_paginacao = "SELECT * FROM `contos_hot` WHERE img!='' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'tag/'.$tag;
		
		#####consulta videos da página
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual - 1) * 24;
		}
		
        $query_categoria ="SELECT * FROM `contos_hot` WHERE img<>'' $complemento ";
        $consulta_categoria = mysql_query($query_categoria);    
        $dados_categoria = mysql_fetch_array($consulta_categoria);
        
        $query_categoria_conteudo = "SELECT * FROM `contos_hot` WHERE img<>'' $complemento LIMIT $inicio_consulta, 24";
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
		$query_paginacao = "SELECT * FROM `contos_hot` WHERE img<>'' $complemento LIMIT 210";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL_VIP.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'contos';
		
		#####consulta videos da página
		#####consulta videos da página 
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual -1) * 24;
		}
		//Tras todos os videos 
		$query_cenas = "SELECT * FROM `contos_hot` WHERE img!='' ORDER BY RAND() LIMIT $inicio_consulta, 34";
		$consulta_cenas = mysql_query($query_cenas);
		$total = mysql_num_rows($consulta_cenas);
		
		// consulta das cenas
		//$query_cenas="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 24";
		//$consulta_cenas=mysql_query($query_cenas); 
	}
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<title>🌶 HOTBOYS As Séries Mais Quente da Net !</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="Site Hot Boys -  O site mais quante da Net!.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<style>
			section.cenas ul li a:hover .thumb:before{display:none!important}
			</style>
	</head>
	
	<body class="vip contos">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer mt-2">
						<div class="app-main__inner">
							
							<!-- Titulo do conteudo -->
							<div class="app-page-title">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5>Contos Hot </h5>
									</div>
								</div>
							</div>    
							
							<!-- Main Content -->
							<div id="content">
								
								<!-- videos com paginacao -->
								<section class="cenas m-0">
									<div class="container-fluid" style="padding:0">
										
										<!-- CENAS -->
										<div class="row">
											
											<!-- Consulta cenas -->
											<ul style="display: contents;">
												<?php while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>	
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
														<a href="<?php echo utf8_encode(URL_VIP.'conto-erotico/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
															<div class="card mb-2 box-shadow">
																
																<!-- imagem da cena -->
																<div class="thumb">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[img] ?>" data-holder-rendered="true">
																</div>
																
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo $row_conteudo['titulo']?></h1>
																	<!--
																		<div class="curtidas d-flex justify-content-between align-items-center">
																		<div class="btn-group">
																		<button type="button" class="btn btn-sm like">
																		<img src="<?php echo URL ?>novo-projeto/assets/img/icones/like.png"/> 22
																		</button>
																		<button type="button" class="btn btn-sm deslike">
																		<img src="<?php echo URL ?>novo-projeto/assets/img/icones/deslike.png"/> 0
																		</button>
																		</div>
																		
																		<!-- Botao para adicionar a cena como favoritada 
																		<div class="addFavoritos">
																		<a href="" style="padding: 14px">
																		<i class="fas fa-star" aria-hidden="true" data-toggle="cenaFavorita" data-placement="top" title="Escolha a cena como favorita"></i> 
																		</a>
																		</div>
																		
																		</div>
																	-->
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
													<li class="page-item">
														<a class="page-link" href="<?php echo URL_VIP.'contos/'.(-$Paginacao +$pgAtual) ?>">Anterior</a>
													</li>
												<?php } ?>	
												
												<?php //Numeros botoes paginação
												echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>  
												
												<?php //Botao avançar
													if($pgAtual < $totalPaginas){ ?>														
													<li class="page-item">
														<a class="page-link" href="<?php echo URL_VIP.'contos/'.($Paginacao +$pgAtual) ?>">Próxima</a>
													</li>	
												<?php } ?>			
											</ul>
										</nav>
												
									</div>
									
								</section>
								
								<!-- Footer -->
								<?php include_once ($footer); ?>
								
							</div>
							<!-- ## FIM Conteudo da pagina ## -->
							
							
						</div>
						
					</div>
					
					
				</div>
				
				
				
			</div>
			
			
		</div>
		
		<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
		
		<!-- Javascript tooltips do formulario -->
		<script>$(function(){ $('[data-toggle="cenaFavorita"]').tooltip()})</script>
		
		<!-- ##Botão Whatsapp no Rodape## -->
		<!-- Icone do whatsapp
			<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
			<!-- Icone do whatsapp
			<i style="margin-top:16px" class="fab fa-whatsapp"></i>
			<p>Atendimento</p>
			</a>
		-->
		
		<!--  Chama Modal - Contato -->
		<?php include_once ($contato); ?>
		
		<!--  Chama Modal - Duvidas Frequentes -->
		<?php include_once ($duvidas_frequentes); ?>
		
		<!--  Chama Modal - Termos de Uso -->
		<?php include_once ($termos); ?>
	
	<?php
			require('includes/hotmidias/js.php');
		?>
	
</body>
</html>																					