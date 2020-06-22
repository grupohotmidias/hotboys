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
	$menu_audicoes = '../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$paginacaoConteudoClass = 'includes/PaginacaoConteudoClass.php';
	
	//variavel programacao das cenas
	$programacao_Cenas = 'includes/paginacao/programacao-cenas.php';
	
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
	
	//programacao das cenas
	include_once($programacao_Cenas);
	
	// cenas audicoes
	$query_audicoes = "SELECT * FROM `cenas` WHERE audicoes='Sim' ORDER BY id DESC";
	$consulta_audicoes  = mysql_query($query_audicoes);
	$total_audicoes = mysql_num_rows($consulta_audicoes);
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Audições HOT - Site Hotboys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<style>
			body.audicoes .metismenu li.audicoes{
			color: #343a40;
			background: #e4e4e4;
			font-weight: bold;
			}
		</style>
	</head>
	
	<body class="vip audicoes cenas">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ('includes/estrutura/topo/nav-topo.php'); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="app-main__outer">
                    <div class="app-main__inner">
						
						<!-- SECTION - Bustos das Audicoes  -->
						<section class="audicoes-bustos mb-0">
							<div class="container">
								<div class="row">
									<a href="<?php echo URL_VIP ?>audicoes/">
									<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
									</a>
								</div>
							</div>
						</section>
						
						<!-- Menu audicoes hot 3 -->
						<?php include_once ($menu_audicoes); ?>
						
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-video icon-gradient bg-mean-fruit">
										</i>
									</div>
                                    <div>Lista de Cenas
									</div>
								</div>
							</div>
							
						</div>
						
						
						<!-- Main Content -->
						<div id="content">
							
							<!-- videos com paginacao -->
							<section class="cenas">
								<div class="container-fluid">
									
									<!-- CENAS -->
									<div class="row">
										
										<!-- Consulta cenas -->
										<ul>
											<?php while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){ ?>	
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
													<a href="<?php echo utf8_encode(URL_VIP.'audicoes/cena-novo/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">										
														<div class="card mb-2 box-shadow my-xl-2">
															
															<!-- imagem da cena -->
															<div class="thumb mb-0">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_audicoes[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($dados_audicoes['titulo'])?></h1>
																<!-- >
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
							
						</div>
						<!-- End of Main Content -->
						
					</div> 
					
				</div>
				
			</div>
			<!-- ## FIM Conteudo da pagina ## -->
		</div>
		<script type="text/javascript" src="<?php echo URL_VIP ?>admin/assets/scripts/main.js"></script>
		
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
		<?php include ('../novo-projeto/includes/modal/rodape/contato.php'); ?>
		
	</body>
</html>												