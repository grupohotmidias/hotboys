<?php
	// variaveis dos arquivos de configuracao
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//Variavel perfil do usuario
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$paginacaoConteudoClass = 'includes/PaginacaoConteudoClass.php';
	
	//variavel programacao das cenas
	$programacao_Cenas = 'includes/paginacao/programacao-cenas.php';
	
	//variavel do nav topo
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';
	
	//variavel que puxa o modal de contato
	$contato = '../novo-projeto/includes/modal/rodape/contato.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//Variaveis dos arquivos de configuracao
	include_once($vip_page);
	
	//class paginação
	require_once($paginacaoConteudoClass);
	
	//Variaveis dos arquivos de configuracao
	include_once($perfil_usuario);
	
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
		//$Paginacao->SiteLink = URL_VIP.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'tags/'.$tags;
		
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
		//$Paginacao->SiteLink = URL_VIP.$idioma.'/modelos/'.$s;
		
		$Paginacao->SiteLink = URL_VIP.'atores';
		
        
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

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Homens HotBoys - Os Homens Mais Gostosos do Brasil.</title>	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip modelos">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
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
				<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <h5>Lista de Atores</h5>
								</div>
								
							</div>
						</div>    
						
						<!-- Main Content -->
						<div id="content">
							
							<section class="modelos m-0">
								<div class="container-fluid">
									<div class="row">
										<!-- CENAS -->
										<ul>
											<?php while ($row_modelos=mysql_fetch_array ($consulta_modelos)){ ?>
												<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 cenas mb-2">
													<a href="<?php echo URL_VIP.'ator/'.$row_modelos[id].'/'.URL_amigavel($row_modelos[nome])?>">
														<div class="card pb-0 box-shadow p-1">
															
															<!-- imagens dos modelos -->
															<div class="thumb mb-0">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($row_modelos[modelo_perfil]) ?>" data-holder-rendered="true">
															</div>
															
															<!-- nomes dos modelos -->
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_modelos['nome'])?></h1>
																
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
								</div>
							</section>
							
							<!-- paginacao -->
							<nav aria-label="Page navigation example" class="navigation">
								<ul class="pagination justify-content-center">
									
									
									<?php //Se a paginação estiver em um numero maiso que 1 aparece o voltar
										if($pgAtual > 1){ ?>																		
										<li class="page-item"><a class="page-link" href="<?php echo URL_VIP.'atores/'.(-$Paginacao +$pgAtual) ?>">Anterior</a></li>
									<?php } ?>	
									
									<?php //Numeros botoes paginação
									echo $Paginacao->MontarPaginacao($pgAtual, $totalPaginas); ?>  
									
									<?php //Botao avançar
										if($pgAtual < $totalPaginas){ ?>														
										<li class="page-item"><a class="page-link" href="<?php echo URL_VIP.'atores/'.($Paginacao +$pgAtual) ?>">Próxima</a></li>	
									<?php } ?>			
									
								</ul>
							</nav>
							
						</div>
						<!-- End of Main Content -->
						
						
					</div>
					
				</div>
				</div>
				
				<!-- ## FIM Conteudo da pagina ## -->
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
			
			<!--  Chama Modal - Modal Contato -->
			<?php include_once ($contato); ?>
			
		</body>
	</html>															