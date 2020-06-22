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
	
	// Comentarios da cena
	$comment = 'includes/recursos/comentarios.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
?>

<!-- Programacao principal da pagina  -->
<?php 
	// tras id
	$id = addslashes($_GET[id]);
    $id_serie = addslashes($_GET[id_serie]);
	
	//pagina para comentario	
	$pg ='video' ;
	
	$query = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' AND id=$id";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	if($total != 1){
		header("Location: <?php echo URL ?>");
		exit();
	}
	$dados_conteudo = mysql_fetch_array($consulta);	
    $query_serie = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id_serie' LIMIT 1 ";
	$consulta_serie = mysql_query($query_serie);
	$row_serie = mysql_fetch_array($consulta_serie);
	
	//adiciona 1 visita no campo visualizacoes quando acessado
	if($dados_conteudo[descricao_content]=="") {
		$texto = $dados_conteudo[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $dados_conteudo[descricao_content];
		$description = substr($texto ,0,156);
	}
	
	//consulta o associador de cenas
	$query_elenco_mob = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco_mob = mysql_query($query_elenco_mob);
	$total_elenco_mob = mysql_num_rows($consulta_elenco_mob);
	
		//consulta o associador de cenas
	$query_elenco_des = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco_des = mysql_query($query_elenco_des);
	$total_elenco_des = mysql_num_rows($consulta_elenco_des);
	
	//consulta das fotos free dos atores
	$query_fotos="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 4";
	$consulta_fotos=mysql_query($query_fotos);
	$total_fotos=mysql_num_rows($consulta_fotos);
	
	// Toda palavra Assine vira LINK
	$descricao = utf8_encode($dados_conteudo['descricao']);
	$descricao = utf8_encode($dados_conteudo['descricao']);
	$descricao_corrigida = str_ireplace('assine', '<a href="https://hotboys.com.br/assine/" ><strong style="
	color: #ff7272;" >ASSINE</strong></a>', $descricao);
	
	// Toda palavra Assine vira LINK - echo utf8_encode($dados_conteudo[descricao_assine]);
	$descricao_assine = utf8_encode($dados_conteudo['descricao_assine']);
	$descricao_assine_corrigida = str_ireplace('assine', '<a href="https://hotboys.com.br/assine/" class="assineDescricao"><strong  style="
	color: #55d431;font-weight:normal;" >ASSINE</strong></a>', $descricao_assine); 
	
	// Consulta do Elenco
	$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco = mysql_query($query_elenco);
	$total_elenco = mysql_num_rows($consulta_elenco);
	
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	//comentario da cena
	$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc LIMIT 3";
	$consulta_comentario = mysql_query($query_comentario);
	$total_comentario = mysql_num_rows($consulta_comentario);
?>

<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="<?=strip_tags($description);?>">
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- CSS do comentario -->
		<link href="<?php echo URL ?>novo-projeto/assets/css/comentarios.css?v=<?php echo Version; ?>" rel="stylesheet">
		
		<!-- Titulo - Navegador -->
		<title><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?> -  Vídeos - Site HotBoys</title>
	</head>
	
	<body class="cena" id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<?php include_once ($menu_topo); ?>
		</header>
		
		<!-- CONTEUDO -->
		<!-- videos com paginacao -->
		<section class="cena">
			
			<!-- Breadcrumb -->
			<div class="container-fluid bread">
				<nav aria-label="breadcrumb">
					<div class="container">
						
						
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo URL ?>">Hotboys</a></li>
							<li class="breadcrumb-item"><a href="<?php echo URL ?>videos/">Vídeos</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?></li>
						</ol>
						
						<!-- titulo -->
						<div class="tituloMobile">
							<h1><?php echo utf8_encode($dados_conteudo[titulo]) ?></h1>
						</div>
					</div>
				</nav>
			</div>
			
			<div class="container">
				<div class="row">
					
					<!-- lado esquerdo da pagina -->
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 leftCena">
						
						<!-- cena -->
						<div class="thumb">
							<?php 
								//caso tenha teaser, carrega o video
								if($dados_conteudo[teaser_code] != ''){
								?>
								<div class="embed-responsive embed-responsive-16by9">
									<?php echo $dados_conteudo[teaser_code] ?>
								</div>
								<?php 
									// caso nao tenha teaser, carrega a imagem da cena
								}else{ ?>
								<div class="tarjaCena">
									<h5>Seja assinante e assista agora!</h5>	
								</div>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo[cena_home]?>"/>
							<?php } ?>
						</div>
						
						<!-- titulo da cena -->
						<div class="titulo mb-2">
							<h5 class="pl-0"><?php echo utf8_encode($dados_conteudo[titulo]) ?></h5>
						</div>
						
						<!-- texto da cena -->
						<div class="descricao">
							<?php 
								// Toda palavra Assine vira LINK
								echo $descricao_corrigida;
								
								// Toda palavra Assine vira LINK 2
								echo $descricao_assine_corrigida;
							?>
						</div>
						
						<!-- Nome do Elenco -->
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 elencoCena mobile">
							
							<div class="elenco">
								Elenco: 
								<?php
									while($elenco_mobile = mysql_fetch_array($consulta_elenco_mob)){
										//Nome dos modelos = elenco
										$query_modelo_mobile = "SELECT * FROM `modelos` WHERE id=$elenco_mobile[id_modelo]";
										$consulta_modelo_mobile = mysql_query($query_modelo_mobile);
										$modelo_mobile = mysql_fetch_array($consulta_modelo_mobile);
									?>
									<a href="<?php echo utf8_encode(URL.'modelo/'.$modelo_mobile[id].'/'.URL_amigavel($modelo_mobile[nome])) ?>">
									<?php echo utf8_encode($modelo_mobile['nome'])?></a>
								<?php } ?>
							</div>
						</div>
						
					</div>
					
					<!-- lado direito da pagina -->
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 rightCena">
						
						<!-- # FORMULARIO # -->
						
						<!-- plano mensal -->
						<div class="planoMensal">
							<div class="titulo">Veja este vídeo e muito mais!</div>
						</div>
						
						<a href="https://gpagamentos.com.br/1/acesso-via-hotboys.php">
							<!-- Plano anual -->
							<div class="item selected" data-plano="1">
								<div class="radio"></div>
								<div class="infos">
									<strong>12 meses de acesso</strong>
									<p>Liberação imediata</p>
								</div>
								<div class="price">
									<div class="rs">R$</div>
									<div class="big">240</div>
									<div class="small">,00</div>
								</div>
							</div>
							
							<!-- Plano semestral -->
							<div class="item selected" data-plano="1">
								<div class="radio"></div>
								<div class="infos">
									<strong>6 meses de acesso</strong>
									<p>Liberação imediata</p>
								</div>
								<div class="price">
									<div class="rs">R$</div>
									<div class="big">119</div>
									<div class="small">,90</div>
								</div>
							</div>
							
							<!-- Plano trimestral -->
							<div class="item selected" data-plano="1">
								<div class="radio"></div>
								<div class="infos">
									<strong>3 meses de acesso</strong>
									<p>Liberação imediata</p>
								</div>
								<div class="price">
									<div class="rs">R$</div>
									<div class="big">69</div>
									<div class="small">,90</div>
								</div>
							</div>
							
							<!-- Plano bimestral -->
							<div class="item selected" data-plano="1">
								<div class="radio"></div>
								<div class="infos">
									<strong>2 meses de acesso</strong>
									<p>Liberação imediata</p>
								</div>
								<div class="price">
									<div class="rs">R$</div>
									<div class="big">49</div>
									<div class="small">,90</div>
								</div>
							</div>
							
							<!-- Plano mensal -->
							<div class="item selected" data-plano="1">
								<div class="radio"></div>
								<div class="infos">
									<strong>1 mês de acesso</strong>
									<p>Liberação imediata</p>
								</div>
								<div class="price">
									<div class="rs">R$</div>
									<div class="big">29</div>
									<div class="small">,90</div>
								</div>
							</div>
							
							<!-- Botao assinar -->
							<div class="button">
								<button class="sign-effect" id="sendForm">
									<span>CONTINUE PARA ASSINAR <i class="icon"></i></span>
								</button>
							</div>
						</a>
						
					</div>
					
					<div class="container">
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 elencoCena desktop">
								<div class="elenco">Elenco: 
									<?php
										while($elenco_des = mysql_fetch_array($consulta_elenco_des)){
											//Nome dos modelos = elenco
											$query_modelo_desktop = "SELECT * FROM `modelos` WHERE id=$elenco_des[id_modelo]";
											$consulta_modelo_desktop = mysql_query($query_modelo_desktop);
											$modelo_desktop = mysql_fetch_array($consulta_modelo_desktop);
										?>
										<a href="<?php echo utf8_encode(URL.'modelo/'.$modelo_desktop[id].'/'.URL_amigavel($modelo_desktop[nome])) ?>">
										<?php echo utf8_encode($modelo_desktop['nome'])?></a>
									<?php } ?>
								</div>
							</div>
							
							<!-- Site 100% seguro -->
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 siteSeguro">
								<div id="secure" class="single">
									<i class="fas fa-lock"></i> <span>Site 100% Seguro! Sigilo e discrição garantida.</span>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			
		</section>
		
		<!-- Conteudo -->
		<!-- Fotos/galeria do ator -->
		<?php 
			if($total_fotos >= 1){	
			?>
			<section class="fotosCena">
				<div class="container p-0">
					<div class="row m-0">
						
						<!-- lista das fotos -->
						<ul class="mx-auto">
							<?php while ($row_fotos=mysql_fetch_array ($consulta_fotos)){	?>
								<div class="gallery">
									<a href="//server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
										<li class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 thumb p-0">
											<img src="//server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
										</li>
									</a>
								</div>
							<?php } ?>
						</ul>
						
					</div>
				</div>
			</section>
		
		<!-- Botao Assine para ver mais -->
		<section class="assineAcesso">
			<div class="container">
				<div class="row">
					<div class="bigButton">
						<a href="<?php echo URL ?>assine/">
							Assine e tenha acesso ao conteúdo <i class="icon"></i>
						</a>
					</div>
				</div>
			</div>
		</section>
		<?php } ?>
		
		<!-- Comentarios -->
		<div class="container-fluid comment">
		<?php include_once ($comment); ?>
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
		
		<!-- Javascript tooltips do formulario -->
		<script>$(function () { $('[data-toggle="singlePlano"]').tooltip()})
		</script>
		
		<!-- Javascripts do Lightbox - Clique nas Fotos da Cena -->
		<script type="text/javascript" src="<?php echo URL ?>novo-projeto/assets/js/lightbox/simple-lightbox.js"></script>
		<script>
			$(function(){
				var $gallery = $('.gallery a').simpleLightbox();
			});
		</script>	
	</body>
</html>			