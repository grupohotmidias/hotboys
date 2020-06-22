<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	$naoVerificarPagamento = true;
	
	// chama o menu audicoes
	$menu_audicoes ='../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	//Variavel dos arquivos de configuracao
	include_once('../novo-projeto/includes/paginas/programacao-modelo.php');
	
	//Muda os todas as palavra assine para link
	$descricao = utf8_encode($dados_conteudo['descricao']);
	$descricao_corrigida = str_ireplace('assine', '<a href="'.ASSINE.'" ><strong style="
	color: #ff7272;" >ASSINE</strong></a>', $descricao);
	
	// galeria de fotos do ator
	$query_fotos="SELECT * FROM `imagens` WHERE tipo='$modelo_hot' AND id_referencia=$id";
	$consulta_fotos=mysql_query($query_fotos);
	$titulo_fotos = mysql_fetch_array ($consulta_fotos);
	
	// adiciona conteudo modelo na tabela visita_conteudo
	mysql_query ("INSERT INTO visita_conteudo (`id`, `id_conteudo`, `tipo`, `data`) 
	VALUES (NULL , '$id',           '1',  NOW())") or die(mysql_error());

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 <?php echo utf8_encode($dados_conteudo['nome'])?> - Ator Hot -  HotBoys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- CSS do comentario -->
		<link href="<?php echo URL ?>novo-projeto/assets/css/comentarios.css?v=<?php echo Version; ?>" rel="stylesheet">
	</head>
	
	<body <?php if($dados_conteudo['audicoes'] == 'Sim'){ ?>class="vip audicoes participantes"<?php }else{ ?>class="vip modelos modelo"<?php } ?>>
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							
							<?php 
								// se o modelo for participante das audicoes, aparecem o busto e o menu audicoes
								if($dados_conteudo['audicoes'] == 'Sim'){
								?>
								
								<!-- SECTION - Bustos das Audicoes  -->
								<section class="audicoes-bustos mt-3">
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
								
							<?php } ?>
							
							<div class="app-page-title">
								<div class="page-title-wrapper">
									
									<!-- Titulo do conteudo -->
									<div class="page-title-heading mt-3">
										<h4><?php echo utf8_encode($dados_conteudo['nome'])?></h4>
									</div>
									
								</div>
							</div>    
							
							<!-- Conteudo da pagina -->
							<div id="content">
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
									<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 quadroModelo mx-auto pr-0">
										
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
															<li><span>Lugar dos Sonhos:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['lugar_dos_sonhos']))?></li>
															<li><span>Comida Favorita:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['comida_fav']))?></li>
															<li><span>Filme Favorito:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['filme_fav']))?></li>
															<li><span>Hobbies:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['hobbies_fav']))?></li>
															<li><span>Uma loucura sexual:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['loucura_sexual']))?></li>
															<li><span>O que mais me excita:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['mais_excita']))?></li>
															<li><span>Como me fazer feliz:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['faz_feliz']))?></li>
															<li><span>Minha maior qualidade:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['minha_qualidade']))?></li>
															<li><span>Meu maior defeito:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['meu_defeito']))?></li>
															<li><span>Minha música favorita:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['musica_fav']))?></li>
															<li><span>Vale tudo entre quatro paredes:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['entre_quatro_paredes']))?></li>
															<li><span>Uma fantasia sexual:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['fantasia_sexual']))?></li>
															<li><span>Citação Favorita:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['citacao_fav']))?></li>
															<?php if($dados_conteudo['fone_contato']!='') { ?>
															<li><span>Telefone de Contato:</span> <?php echo utf8_encode(ucfirst($dados_conteudo['fone_contato']))?></li>
															<?php } ?>
														</ul>
													</div>
												<?php } ?>
												
											</div>
										<?php } ?>
										
									</div>
									
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 quadroModelo mx-auto mt-3 mb-3 p-0">
										
										<!-- Conteudo de fotos e videos do modelo -->
										<div class="conteudoModelo">
											
											<!-- titulo videos -->
											<h5>Vídeos com <span><?php echo utf8_encode($dados_conteudo['nome'])?></span></h5>
											
											<!-- cenas deste modelo -->
											<ul>
												<?php	
													//consulta videos do ator
													while($elenco = mysql_fetch_array($consulta_modelo)){
														$query_cena = "SELECT * FROM `cenas` WHERE id=$elenco[id_cena] AND `exibicao`='Todos' AND status='Ativo' ORDER BY `data` ASC";
														$consulta_cena = mysql_query($query_cena);
														$total_cena = mysql_num_rows($consulta_cena);
														$cena = mysql_fetch_array($consulta_cena);
														
														
														//se for maior ou igual a 1, mostra que tem video cadastrado
														if($total_cena >= 1){
														?>
														
														<!-- Ator com video cadastrado -->
														<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 cenas p-1">
															<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo])) ?>">										
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
													
													<!--
														<?php 
															//caso nao, mostra mensagem que ator nao tem video cadastrado 
															//if($total_cena == 0){
														?>
														<p class="semVideo">Ator sem vídeos registrados</p>
														<?php //} ?>
													-->
											</ul>
											
											<?php	
												//Verifica se existe foto cadastrada 
												if($titulo_fotos > 0){
												?>
												<!-- titulo = fotos de ... -->
												<div class="fotosAtor">
												<h5>Fotos de <span><?php echo utf8_encode($dados_conteudo['nome'])?></span></h5>
												</div>
												<?php } ?>
											
											<?php	
											//Verifica se existe foto cadastrada 
										if($total > 0){
										?>	
										<!-- Fotos/galeria do ator -->
										<div class="container-fluid p-0" style="float:left;width:100%">
										
										<div class="row">
										
										<!-- lista das fotos -->
										<ul class="mx-auto fotosModelo">
										
										<div class="gallery">
										<?php while ($row_fotos = mysql_fetch_array ($consulta_fotos)){	?>
										<a href="https://server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
										<?php if($consulta_fotos > 4){ ?>
										<li class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4 thumb foto p-0">
											<img src="//server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
											</li>
												<?php }else{ ?>
												<li class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 thumb p-0">
												<img src="//server2.hotboys.com.br/arquivos/<?php echo $row_fotos['imagem']?>">
												</li>
												<?php  } ?>
												</a>
												<?php } ?>
												</div>
												
												</ul>
												
												</div>
												</div>
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
												
												<!-- Footer -->
												<?php include_once ($footer); ?>
												
												</div>
												<!-- FIM conteudo da pagina -->
												
											</div>
											
											</div>
											</div>
												</div>
												<!-- ## FIM Conteudo da pagina ## -->
											
											</div>
											<!-- Javascript principal/geral -->
											<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
											
											<!-- jQuery do Lightbox -->
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
												
											<!-- Javascripts do Lightbox - Clique nas Fotos da Cena -->
											<script type="text/javascript" src="<?php echo URL ?>novo-projeto/assets/js/lightbox/simple-lightbox.js"></script>
											<script>
											$(function(){
											var $gallery = $('.gallery a').simpleLightbox();
											});
											</script>
											
											<!-- ##Botão Whatsapp no Rodape## -->
											<!-- Icone do whatsapp
											<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
											<!-- Icone do whatsapp
											<i style="margin-top:16px" class="fa fa-whatsapp"></i>
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