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
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
?>

<!-- Programacao principal da pagina  -->
<?php 
	$id = addslashes($_GET[id]);
	$pg ='modelo' ;
	
	//Consulta Modelos
	$query = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id'";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	
	$dados_conteudo = mysql_fetch_array($consulta);
	
	if($dados_conteudo[descricao_content]==""){
		$texto = $dados_conteudo[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $dados_conteudo[descricao_content];
		$description = substr($texto ,0);
	}
	
	//adiciona 1 visita no campo visualizacoes quando acessado
	$query = mysql_query("UPDATE modelos SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
	
	// Pega os ids associadores dos modelos
	$query_modelo = "SELECT * FROM `associador_cenas` WHERE id_modelo=$id  order by id DESC LIMIT 6";
	$consulta_modelo = mysql_query($query_modelo);
	$total_modelo = mysql_num_rows( $consulta_modelo);
	
	//consulta das fotos free dos atores
	$query_fotos_modelo="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 4";
	$consulta_fotos_modelo=mysql_query($query_fotos_modelo);
	$total_fotos_modelo=mysql_num_rows($consulta_fotos_modelo);	 
	
		$query="SELECT * FROM `imagens` WHERE tipo='Modelo Free' AND id_referencia=$id ORDER BY ordem ASC";	
	$consulta=mysql_query($query);				
	$total=mysql_num_rows($consulta);
	
	
	//Muda os todas as palavra assine para link
	$descricao = utf8_encode($dados_conteudo['descricao']);
	$descricao_corrigida = str_ireplace('assine', '<a href="'.ASSINE.'" ><strong style="
	color: #ff7272;" >ASSINE</strong></a>', $descricao);
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="<?php echo utf8_encode(strip_tags($description));?>">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title><?php echo utf8_encode($dados_conteudo['nome'])?> - Homens Hot - Site HotBoys</title>
		
	</head>
	<body class="audicoes pariticpantes" id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<?php include ($menu_topo); ?>
		</header>
		
		<!-- Conteudo -->
		<div class="conteudoTudo">
			
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
			
			<!-- CONTEUDO -->
			<!-- videos com paginacao -->
			<section class="cenas modelo audicoes mt-2">
				
				<!-- Breadcrumb -->
				<div class="container-fluid bread">
					<nav aria-label="breadcrumb">
						<div class="container">
							
							<!-- Conteudo do breadcrumb -->
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo URL ?>">Hotboys</a></li>
								<li class="breadcrumb-item"><a href="<?php echo URL ?>atores/">Modelos</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo utf8_encode($dados_conteudo['nome'])?></li>
							</ol>
							
						</div>
					</nav>
				</div>
				
				<!-- Conteudo da pagina -->
				<div class="container">
					
					<!-- Titulo da pagina -->
					<div class="row">
						<div class="col-lg-12 mx-auto mt-2 mb-2 pd-02">
							<h4 style="float:left"><?php echo utf8_encode($dados_conteudo['nome'])?></h4>
						</div>
					</div>
					<div class="row conteudo">
						
						<!-- Lado esquerdo do conteudo - Perfil -->
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0 perfilModelo">
							
							<div class="conteudo">
								
								<div class="fichaTecnica mobile">
								<!-- foto do modelo -->
								<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 p-0 m-0">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo['modelo_perfil']?>" class="ator"/>
								</div>
								
								<!-- ficha tecnica mobile -->
								<div class="col-xl-8 col-lg-7 col-md-7 col-sm-7 col-7 float-left pr-0">
									<h6>Descrição</h6>
									<ul>
										<li><span>Idade:</span> <?php echo utf8_encode($dados_conteudo['idade'])?> anos</li>
										<li><span>Peso:</span> <?php echo utf8_encode($dados_conteudo['peso'])?> kg</li>
										<li><span>Altura:</span> <?php echo utf8_encode($dados_conteudo['altura'])?> m</li>
										<li><span>Signo:</span> <?php echo utf8_encode($dados_conteudo['signo'])?></li>
										<li><span>Etnia:</span> <?php echo utf8_encode($dados_conteudo['etnia'])?></li>
										<li><span>Dote:</span> <?php echo utf8_encode($dados_conteudo['penis'])?> cm</li>
									</ul>
								</div>
								</div>
								
								<div class="desktop">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo['modelo_perfil']?>" class="ator"/>
								
								<!-- sobre o modelo -->
								<?php if($dados_conteudo['descricao'] != ''){ ?>
									<div class="about">
										<strong>Sobre o ator:</strong>
										<?php 
											// Toda palavra Assine vira LINK
											echo $descricao_corrigida;	
										?>
									</div>
								<?php } ?>
								</div>
								
							</div>
						</div>
						
						<!-- Lado direito do conteudo - Videos -->
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 quadroModelo mx-auto">
							
							<!-- Ficha tecnica do modelo -->
							<?php if($dados_conteudo['idade']!='') { ?>
							<div class="conteudoModelo mb-4 fichaTecnica">
								
								<h5 class="mb-4">Ficha Técnica</h5>
								
								<!-- descricao do modelo -->
								
								<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 float-left pl-0 desktop">
									<h6>Descrição</h6>
									<ul>
										<li><span>Idade:</span> <?php echo utf8_encode($dados_conteudo['idade'])?> anos</li>
										<li><span>Peso:</span> <?php echo utf8_encode($dados_conteudo['peso'])?> kg</li>
										<li><span>Altura:</span> <?php echo utf8_encode($dados_conteudo['altura'])?> m</li>
										<li><span>Signo:</span> <?php echo utf8_encode($dados_conteudo['signo'])?></li>
										<li><span>Etnia:</span> <?php echo utf8_encode($dados_conteudo['etnia'])?></li>
										<li><span>Dote:</span> <?php echo utf8_encode($dados_conteudo['penis'])?> cm</li>
									</ul>
									
								</div>
								
								<?php if($dados_conteudo['lugar_dos_sonhos']!='') { ?>
									<!-- Curiosidades do modelo -->
									<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 float-left pl-0">
										<h6>Curiosidades</h6>
										<ul>
											<li><span>Lugar dos Sonhos:</span> <?php echo utf8_encode($dados_conteudo['lugar_dos_sonhos'])?></li>
											<li><span>Comida Favorita:</span> <?php echo utf8_encode($dados_conteudo['comida_fav'])?></li>
											<li><span>Filme Favorito:</span> <?php echo utf8_encode($dados_conteudo['filme_fav'])?></li>
											<li><span>Hobbies:</span> <?php echo utf8_encode($dados_conteudo['hobbies_fav'])?></li>
											<li><span>Uma loucura sexual:</span> <?php echo utf8_encode($dados_conteudo['loucura_sexual'])?></li>
											<li><span>O que mais me excita:</span> <?php echo utf8_encode($dados_conteudo['mais_excita'])?></li>
											<li><span>Como me fazer feliz:</span> <?php echo utf8_encode($dados_conteudo['faz_feliz'])?></li>
											<li><span>Minha maior qualidade:</span> <?php echo utf8_encode($dados_conteudo['minha_qualidade'])?></li>
											<li><span>Meu maior defeito:</span> <?php echo utf8_encode($dados_conteudo['meu_defeito'])?></li>
											<li><span>Minha música favorita:</span> <?php echo utf8_encode($dados_conteudo['musica_fav'])?></li>
											<li><span>Vale tudo entre quatro paredes:</span> <?php echo utf8_encode($dados_conteudo['entre_quatro_paredes'])?></li>
											<li><span>Uma fantasia sexual:</span> <?php echo utf8_encode($dados_conteudo['fantasia_sexual'])?></li>
											<li><span>Citação Favorita:</span> <?php echo utf8_encode($dados_conteudo['citacao_fav'])?></li>
										</ul>
									</div>
								<?php } ?>
								
							</div>
							<?php } ?>
							
							<!-- Conteudo de fotos e videos do modelo -->
							<div class="conteudoModelo">
								
								<!-- titulo videos -->
								<h5>Vídeos de <span><?php echo utf8_encode($dados_conteudo['nome'])?></span></h5>
								
								<!-- cenas deste modelo -->
								<ul>
									<?php	
										//consulta videos do ator
										while($elenco = mysql_fetch_array($consulta_modelo)){
											$query_cena = "SELECT * FROM `cenas` WHERE id=$elenco[id_cena] AND `exibicao`='Todos' AND status='Ativo' ORDER BY data ASC";
											$consulta_cena = mysql_query($query_cena);
											$total_cena = mysql_num_rows($consulta_cena);
											$cena = mysql_fetch_array($consulta_cena);
											
											//se for maior ou igual a 1, mostra que tem video cadastrado
											if($total_cena >= 1){
											?>
											
											<!-- Ator com video cadastrado -->
											<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 cenas">
												<a href="<?php echo utf8_encode(URL.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo])) ?>">										
													<div class="card mb-2 box-shadow">
														
														<!-- imagem da cena -->
														<div class="thumb">
															<img class="card-img-top" alt="video do modelo"  src="https://server2.hotboys.com.br/arquivos/<?php 
															echo($cena[cena_home]) ?>" data-holder-rendered="true">
														</div>
														
														<div class="card-body">
															<h1 class="card-titulo"><?php echo utf8_encode($cena['titulo'])?></h1>
															<p class="curtidas card-text">
																<!-- Elenco: Marcelo Mastro, Hugo Gobi -->
															</p>
															
														</div>
														
													</div>
												</a>
											</li>
										<?php }}?>
										
										<?php 
											//caso nao, mostra mensagem que ator nao tem video cadastrado 
											if($total_cena == 0){
											?>
											<p class="semVideo">Ator sem vídeos registrados</p>
										<?php } ?>
									</ul>
									
									<?php	
										//Verifica se existe foto cadastrada 
										if($total > 0){
										?>		
										
										<!-- titulo = fotos de ... -->
										<div class="fotosAtor">
											<h5>Fotos de <span><?php echo utf8_encode($dados_conteudo['nome'])?></span></h5>
										</div>
										
										
										<!-- Fotos/galeria do ator -->
										<div class="container" style="float:left;width:100%">
											<?php
												// galeria de fotos do ator
												$query_fotos="SELECT * FROM `imagens` WHERE tipo='$modelo_hot' AND id_referencia=$id  LIMIT 4";
												$consulta_fotos=mysql_query($query_fotos);
											?>
											<div class="row">
												
												<!-- lista das fotos -->
												<ul class="mx-auto fotosModelo">
													
													<div class="gallery">
														<?php while ($row_fotos = mysql_fetch_array ($consulta_fotos)){	?>
															<a href="https://server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
																<li class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 thumb p-0">
																	<img src="//server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
																</li>
															</a>
														<?php } ?>
													</div>
													
												</ul>
												
											</div>
										</div>
									<?php } ?>
									
									<!-- Assine e tenha total acesso -->
									<?php if($consulta_fotos >= 1){ ?>
										<section class="assineAcesso" style="float:left;width:100%;background: #e0b124;">
											<div class="container-fluid p-0">
												<div class="row m-0" style="float:left;width:100%">
													<div class="bigButton m-0">
														<a href="<?php echo URL ?>assine/">
															Assine agora e confira todas as fotos<i class="icon"></i>
														</a>
													</div>
												</div>
											</div>
										</section>
									<?php } ?>
									
									<?php 
										//caso nao, mostra mensagem que ator nao tem foto cadastrada 
										if($consulta_fotos < 1){
										?>
										<p class="semVideo">Ator sem fotos registradas</p>
									<?php } ?>
								</div>
							</div>
						</div>
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
		
		<!-- Javascripts do Lightbox - Clique nas Fotos da Cena -->
		<script type="text/javascript" src="<?php echo URL ?>novo-projeto/assets/js/lightbox/simple-lightbox.js"></script>
		<script>
			$(function(){
				var $gallery = $('.gallery a').simpleLightbox();
			});
		</script>
		
	</body>
</html>