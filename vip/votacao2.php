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
	
	//variavel da programacao perfil
	$programacao_perfil = 'includes/paginas/perfil-usuario.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$menu_audicoes = '../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	//Variaveis dos arquivos da estrutura da pagina
	$paginacaoConteudoClass = '../includes/PaginacaoConteudoClass.php';
	
	//variavel programacao das cenas
	$programacao_Cenas = 'includes/paginacao/programacao-cenas.php';
	
	//variavel das noticias - audicoes hot 3
	$noticias = 'includes/paginas/noticias.php';
	
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
	
	//Variavel dos arquivos de configuracao
	include_once($programacao_perfil);
	
	//programacao das cenas
	include_once($programacao_Cenas);
	
	//SE HOUVER TAG
	if($tag != ''){
		$counter=1;
		
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
	//if(count($idsEnquetes) < 1){
		//não possui enquetes, ou já votou	
		//if($linha[exibir_resultado] == Sim){
		//	header("Location: /vip");
		//	}else{
		//	header("Location: /vip");
		//}
		//exit();			
	//}
	
	require_once('votacao/includes/xajax/xajax_core/xajax.inc.php');
	$xajax = new xajax();		
	require_once('votacao/includes/xajax-enquete.php');
	$xajax->processRequest();
	$xajax->configure('javascript URI',  '//www.hotboys.com.br/vip/votacao/includes/xajax/');
	
	// consulta modelos quando estes forem das audicoes
	$query_modelos="SELECT * FROM `modelos` WHERE audicoes='Sim' ORDER BY nome ASC LIMIT 10";
	$consulta_modelos=mysql_query($query_modelos);
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
		<meta name="description" content="votacao HotBoys">
		<meta name="msapplication-tap-highlight" content="no">
		<?php $xajax->printJavascript(); ?>
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip audicoes votacao">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ('includes/estrutura/topo/nav-topo.php'); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include ('includes/estrutura/menu/menu-lateral.php'); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="app-main__outer">
                    <div class="app-main__inner">
						
						<!-- SECTION - Bustos das Audicoes  -->
						<section class="audicoes-bustos mt-3">
							<div class="container">
								<div class="row">
									<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
								</div>
							</div>
						</section>
						
						<!-- Menu audicoes hot 3 -->
						<?php include_once ($menu_audicoes); ?>
						
						<!-- Vitrine das Audicoes -->
						<div class="container-fluid">
							<!-- Logo Audicoes hot 3-->
							<section class="logoAudicoes" style="background-color: #111111!important;">
								<div class="container">
									<div class="row">
										<img class="mx-auto" id="foto<?php echo $counter3++ ?>" src="https://www.hotboys.com.br/imagens/audicoes/votacao/logo-iphone-audicoes3.jpg?v=<?php echo Version; ?>"/>
									</div>
								</div>
							</section>
							
							<section class="textoVotacao">
								<div class="container p-0">
									<div class="row m-0">
										<h4 style="background-color: #292828; padding: 5px; color: white; margin-bottom: 10px;">Escolha o vencedor do iPhone:</h4>
									</div>
								</div>
							</section>
							<form id="form_enquete" name="form_enquete" method="post" onSubmit="xajax_votar(xajax.getFormValues('form_enquete')); return false;">
								<?php	
									foreach($idsEnquetes as $idEnquete){
										//pega infos da enquete
										$queryEnquete = "SELECT * FROM `enquetes` WHERE id='$idEnquete'";
										$consultaEnquete = mysql_query($queryEnquete);
										$linha = mysql_fetch_array($consultaEnquete);
									?>
									
									
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
														
														<!-- Atores -->
														<li class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4 cenas p-1">
															<label>
																<div class="card participantes mb-0 p-0 box-shadow" onclick="show<?php echo $counter++ ?>()">
																	
																	<!-- imagens dos modelos -->
																	<div class="thumb" style="position:relative">
																		<img class="card-img-top foto" id="foto<?php echo $counter++ ?>" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $linhaAlternativa[imagem_audicao] ?>" data-holder-rendered="true">
																		
																		<!-- Icone de voto -->
																		<img src="https://www.hotboys.com.br/imagens/audicoes/pre-candidatos/icone-voto.png?v=<?php echo Version; ?>" id="selecionado<?php echo $counter++ ?>" style="visibility:hidden">
																	</div>
																	
																</div>
																<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
															</label>
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
								
								
								<!-- Botao Votar -->
								<div class="container-fluid botaoEnviar">
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<input type="submit" value="Votar" />
										</div>
									</div>
								</div>
								
							</form>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
		<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
		
		<!-- ##Botão Whatsapp no Rodape## -->
		<!-- Icone do whatsapp
			<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
			<!-- Icone do whatsapp
			<i style="margin-top:16px" class="fab fa-whatsapp"></i>
			<p>Atendimento</p>
			</a>
		-->
		
		<!-- Jquery do botao selecionado (votacao) -->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="	crossorigin="anonymous"></script>	
		
		<!-- Botao selecionado (Votacao) -->
		<script src="<?php echo URL_VIP ?>assets/js/botao-selecionado-votacao.js?v=<?php echo Version; ?>"></script>
		
		<!--  Chama Modal - Modal Contato -->
		<?php include_once ($contato); ?>
		
		<?php
			require('includes/hotmidias/js.php');
		?>
		
	</body>
</html>																																																						