<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	$naoVerificarPagamento = true;

	// tras id
	$id = addslashes($_GET[id]);
	
    // busca o id do usuarios logado
    $query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
    $dados_user = mysql_fetch_array($consulta_user);
    
    //adiciona 1 visita no campo visualizacoes quando acessado
    $query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());   
	
	if ($_GET["search"] != ''){
		$sData = date('d/m/Y');
		$sHora = date('H:i:s');
		$sql = "INSERT INTO `buscas`(`id`, `palavra_chave`, `site`, `data`, `hora`, `id_usuario`) VALUES (NULL,'$_GET[search]','pt','$sData','$sHora','$dados_user[id_user]')";
		$insere_busca = mysql_query($sql);
	}
	//Palavra da busca
	if(isset($_GET['search'])){
		$palavra = addslashes(utf8_decode($_GET['search']));  
		if ($palavra != ''){ 
			$query1 = "SELECT * FROM `cenas` WHERE status='Ativo' AND titulo LIKE  '%".$palavra."%' OR descricao LIKE '%".$palavra."%'  
			AND `status`='Ativo' AND `exibicao`='Todos' AND cena_home<>''  ORDER BY id DESC ";
			$consulta1 = mysql_query($query1);
			$result1 = mysql_num_rows($consulta1);
			$query2 = "SELECT * FROM `modelos` WHERE status='Ativo' AND nome LIKE '%".$palavra."%' 
			AND status='Ativo' AND `exibicao`='Todos' AND modelo_perfil<>'' ORDER BY id DESC"; 
			$consulta2 = mysql_query($query2);
			$result2 = mysql_num_rows($consulta2);
			//somas os resultados
			$result = $result1 + $result2;
		}
	}
	if(isset($_GET['search'])){
	$palavra = addslashes(utf8_decode($_GET['search']));  
	if ($palavra != ''){ 
		$query1 = "SELECT * FROM `cenas` WHERE status='Ativo' AND titulo LIKE  '%".$palavra."%' OR descricao LIKE '%".$palavra."%'  
		AND `status`='Ativo' AND `exibicao`='Todos' AND cena_home<>''  ORDER BY id DESC ";
		$consulta1 = mysql_query($query1);
		$result1 = mysql_num_rows($consulta1);
		$query2 = "SELECT * FROM `modelos` WHERE status='Ativo' AND nome LIKE '%".$palavra."%' 
		AND status='Ativo' AND `exibicao`='Todos' AND modelo_perfil<>'' ORDER BY id DESC"; 
		$consulta2 = mysql_query($query2);
		$result2 = mysql_num_rows($consulta2);
		//somas os resultados
		$result = $result1 + $result2;
	}
	}
	if(isset($_GET['search'])){
		$palavra = addslashes(utf8_decode($_GET['search']));  
		if ($palavra != ''){ 
			$query1 = "SELECT * FROM `cenas` WHERE status='Ativo' AND tag_principal LIKE  '%".$palavra."%' OR descricao LIKE '%".$palavra."%'  
			AND `status`='Ativo' AND `exibicao`='Todos' AND cena_home<>''  ORDER BY id DESC ";
			$consulta1 = mysql_query($query1);
			$result1 = mysql_num_rows($consulta1);
			$query2 = "SELECT * FROM `modelos` WHERE status='Ativo' AND nome LIKE '%".$palavra."%' 
			AND status='Ativo' AND `exibicao`='Todos' AND modelo_perfil<>'' ORDER BY id DESC"; 
			$consulta2 = mysql_query($query2);
			$result2 = mysql_num_rows($consulta2);
			//somas os resultados
			$result = $result1 + $result2;
		}
		}
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
	</head>
	
	<body class="vip busca">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>
			
			<!-- Menu sidebar + conteudo da pagina -->
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="app-main__outer">
					
					<div class="conteudoTudo mt-2">
						<div class="app-main__inner">
							
							<!-- alerta de pesquisa encontrada -->
							<?php if($result >= 1){ ?>	
								<div class="alert alert-success" role="alert">😄 Uhull, encontramos <?php echo $result ?> resultado<?php /*coloca s se resultado for maior que 1*/ if ($result2 > 1) echo 's'; ?>  com <?php echo strtoupper($palavra); ?></div>
							
								
								
								
								<?php }else{ ?>	
								<!-- alerta de pesquisa nao encontrada -->
								<div class="alert alert-danger" role="alert">😕 Desculpe, não encontrou nenhum resultado para <strong><?php echo ucfirst($palavra) ?></strong>.</div>
								
								
								
							<?php } ?>
							<div><?php if($palavra == ''){ ?> A busca está vazia. Preencha o que procura e tente novamente.<?php } ?></div>
							
							
							
							
							
							
							<?php if($result2 >= 1){ ?>
								<!-- Titulo - Busca modelos -->
								<div class="app-page-title mt-4">
									<div class="page-title-wrapper">
										<div class="page-title-heading">
											<h5>Ator <?php /*coloca s se resultado for maior que 1*/ if ($result2 > 1) echo 'es'; ?>  com o nome <strong><?php echo ucfirst($palavra) ?></strong>.</h5>
										</div>
										
									</div>
								</div> 
							<?php } ?>
							
							<!-- Modelos -->
							<section class="modelos mt-0">
								<div class="container-fluid">
									<div class="row">
										
										<!-- CENAS -->
										<ul style="width:100%">
											<?php 
												if($consulta2 > 0){
													while($consulta_modelo = mysql_fetch_array($consulta2)){  ?>
													<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
														<a href="<?php echo utf8_encode(URL_VIP.'ator/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[nome])) ?>">
															<div class="card mb-2 box-shadow my-xl-2">
																
																<!-- imagens dos modelos -->
																<div class="thumb">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_modelo['modelo_perfil']?>" data-holder-rendered="true">
																</div>
																
																<!-- nomes dos modelos -->
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo utf8_encode($consulta_modelo['nome'])?></h1>
																	<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
																</div>
																
															</div>
														</a>
													</li>
												<?php } } ?>
										</ul>
										
									</div>
								</div>
							</section>
							
							<?php if($result1 >= 1){ ?>
								<div class="app-page-title">
									<div class="page-title-wrapper">
										
										<!-- Titulo - Busca cenas -->
										<div class="page-title-heading">
											<h5>Cenas com <strong><?php echo ucfirst($palavra) ?></strong>.</h5>
											
											<!--<script>
											function explode(){
												alert("Boom!");
											}
												setTimeout(explode, 5000);
											</script>
 -->

										</div>
										
									</div>
								</div> 
							<?php } ?>
							
							<!-- Cenas  -->
							<section class="cenas m-0">
								<div class="container-fluid" id="content" style="padding:0">
									<div class="row" style="margin:0">
										<ul style="width:100%">
											<?php 
												if($consulta1 > 0){
													while($consulta_modelo = mysql_fetch_array($consulta1)){  ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
														<div class="card mb-2 box-shadow my-xl-2">
															
															<!-- imagem da cena -->
															<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[titulo])) ?>">
																<div class="thumb">
																	<img class="card-img-top" alt="Thumbnail" src="https://server2.hotboys.com.br/arquivos/<?php 
																	echo($consulta_modelo['cena_home']) ?>" data-holder-rendered="true">
																</div>
															</a>
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($consulta_modelo['titulo'])?></h1>
																<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
															</div>
															
														</div>
														
													</li>
												<?php } } ?>
										</ul>
									</div>
								</div>
							</section>
							
						</div>
					</div>
				</div>
				<!-- ## FIM Conteudo da pagina ## -->
				
			</div>
			
			<!-- Javascript Principal -->
			<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
			
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
			
			<!--  Chama Modal - Modal Duvidas Frequentes -->
			<?php include_once ($duvidas_frequentes); ?>
			
			<!--  Chama Modal - Modal Termos de Uso -->
			<?php include_once ($termos); ?>
			
			
			<?php
			require('includes/hotmidias/js.php');
		?>
			
		</body>
	</html>	