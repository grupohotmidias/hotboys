<?php	
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');
	
	$id = addslashes($_GET[id]);
	$pg ='modelo' ;
	
	//Consulta Modelos
	$query = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id'";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	
	if($total != 1){
		header("Location: <?php echo URL ?>");
		exit();
	}
	
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
	
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	

		// adiciona conteudo modelo na tabela visita_conteudo
		mysql_query ("INSERT INTO visita_conteudo (`id`, `id_conteudo`, `tipo`, `data`) 
		VALUES (NULL , '$id',           '1',  NOW())") or die(mysql_error());
	
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title>🌶 <?php echo utf8_encode($dados_conteudo['nome'])?> - Homens Hot - Site HotBoys</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		
        <meta name="description" CONTENT="<?php echo utf8_encode(strip_tags($description));?>">
		
		<!-- HEAD (Include) -->
		
		<?php include ('includes/head.php')?>
		
		<style>
			.btn-overflow::before {float: left;color: #ffffff;font-size: 19px;margin-top: -1px;margin-left: 2px;}
			.btn-overflow.menos::before {content: "+";}
			.btn-overflow.mais::before {content: "-";}
            .mobile-info{height:67px;margin-bottom: 3px!important;display:block; overflow:hidden;word-break: break-word;word-wrap: break-word;}
			.padding-0{padding:0!important;}
			.conteudo-assine-ja{text-align: center; background-color: #e31330; text-transform: uppercase;line-height: 28px;font-family: 'Baloo Bhaijaan',cursive, sans-serif}
			
			
			a.btn-overflow {display: none;text-decoration: none;background-color: #e31330;padding: 3px;color: #fff!important;justify-content: center;align-items: center;width: 60%;margin: 0 auto;text-align: center;border-radius: 10px;}
			
			
			@media (min-width:1200px){
			#modelo_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:185px}
			}
			
			@media (min-width:992px) and (max-width:1199px){
			#modelo_fotos .inicial_box_conteudo, #info1 .box{overflow: hidden; min-height: 179px!important; height: 179px!important;}
			}
			
			@media (min-width:768px) and (max-width:991px){
			#modelo_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:137px}
			}
			
			@media (max-width:767px){	
			#modelo_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:210px}
			}
			
			@media (max-width:480px){
			.informacoes-modelo.idade,.informacoes-modelo.peso,.informacoes-modelo.signo,.informacoes-modelo.etnia{border-right:1px solid #fff;}
			.informacoes-modelo.dote{border-bottom:1px solid #fff!important;}
			#modelo_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:122px}
			}
		</style>
		
		
		<!-- CSS dos 3 icones que vem em seguida -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		
	</head>
	
	<body id="body" class="fundo-preto">
		<div class="container">
			
			<!-- TOP (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include ('includes/top2.php')?>
			</div>
			
			
			<!-- titulo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="modelo-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
					MODELO</h1>
				</div>
			</div>
			
			
			<!-- Conteúdo - Modelos -->
			<div class="row" style="float:left;width:100%">
				
				<?php					
					date_default_timezone_set("America/Sao_Paulo");	
					//verifica tempo e tempo menos 7			
					$tempo = gmdate("Y-m-d", strtotime("-7 days"));	
					$hoje = gmdate("Y-m-d");				
					$qry = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 1";			
					$consulta = mysql_query($qry);					
					$total = mysql_num_rows($consulta);		
					$row = mysql_fetch_array($consulta);	
					$query = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";				
					$cons = mysql_query($query);				
					$linha = mysql_fetch_array($cons);		
				?>
				<div class="row" style="float:left;width:100%">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 coluna-modelos">
						
						
						<!-- nome do modelo -->
						<div class="row" style="float:left;width:100%">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-mobile-modelo">
								<div class="home-textos-clientes-assistindo">
									<h4 class="home-titulo-clientes-assistindo"> 
										<h4 class="modelo-nome">
											<?php echo utf8_encode($dados_conteudo['nome'])?>
										</h4> 
									</h4>
								</div>
							</div>
						</div>
						
						
						<!-- perfil do modelo -->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 modelo-col-modelo1">
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
								<div> 
									<?php if ($detect->isMobile()) { ?>
										<img class="foto-principal-modelo" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo[modelo_perfil]?>" alt="">
										<?php }else{ ?>
										
										<img class="lazy foto-principal-modelo" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="//server2.hotboys.com.br/arquivos/<?php echo $dados_conteudo['modelo_perfil']?>" alt="">
									<?php } ?>
								</div> 
							</div>
							
						</div>
						
						
						
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 conteudo-informacoes-modelo">
							
							<!-- nome do modelo -->
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-desktop-modelo">
								<div class="titulo-modelo" style="text-align: left; float: left; margin-top: 5px; margin-bottom: 10px;">
									<h4 class="modelo-nome"> 
										<?php echo utf8_encode($dados_conteudo['nome'])?>
									</h4>
								</div>
								
								
								<!-- Aside com informacoes do modelo em texto -->
								
								
								
								<?php if ($detect->isMobile()){ ?>
									<aside class="col-lg-12 col-md-12 info-modelo mobile-info">
										<?php }else{ ?>
										<aside class="col-lg-12 col-md-12 info-modelo">
										<?php } ?>
										
										
										<?php 
											//Muda os todas as palavra assine para link
											$descricao = utf8_encode($dados_conteudo['descricao']);
											$descricao_corrigida = str_ireplace('assine', '<a href="'.ASSINE.'" ><strong style="
											color: #ff7272;" >ASSINE</strong></a>', $descricao);
											echo $descricao_corrigida;
										?>
										
										<?php 
											//Muda os todapalavra assine para link
											'<br />'. 
											$descricao_assine = utf8_encode($dados_conteudo['descricao_assine']);
											$descricao_assine_corrigida = str_ireplace('assine', '<a href="'.ASSINE.'" ><strong style="
											color: #ff7272;" >ASSINE</strong></a>', $descricao_assine); 
											
											echo $descricao_assine_corrigida; // resultado: O João foi ao Hotel e Spa passar férias
										?>
									</aside>
									
									<!-- Botão mostrar "Mostrar mais info dos modelos" -->
									<div class="col-md-12 col-xs-12" style=" float:left; margin:0 auto;margin-bottom:20px;">
										<a class="btn-overflow">Mostrar mais</a>
									</div>
									
									
									<!-- Javascript do botão mobile "Mostrar mais info dos modelos" -->
									<script  src="https://code.jquery.com/jquery-1.5.2.js"  integrity="sha256-4hB8js20ecNtgi2CvaKoyvRCmrLSz58g1ckx91J1QDw=" crossorigin="anonymous"></script>
									<script>
										var text = $('.mobile-info'),
										btn = $('.btn-overflow'),
										h = text[0].scrollHeight; 
										
										if(h > 59) {
											btn.addClass('menos');
											btn.css('display', 'block');
										}
										btn.click(function(e) {
											e.stopPropagation();
											
											if (btn.hasClass('menos')) {
												btn.removeClass('menos');
												btn.addClass('mais');
												btn.text('Mostrar menos');
												text.animate({'height': h});
												
												} else {
												btn.addClass('menos');
												btn.removeClass('mais');
												btn.text('Mostrar mais');
												text.animate({'height': '59px'});
											}  
										});
									</script>
									
									
									
									
									
									<div id="abas">
										<nav id="menu">										
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 descricao-preferencias-modelo"> 
												<a href="#">											
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 descricao-modelo aba ativa float-left">Descrição</div>
												</a> 
												
												<?php  if($dados_conteudo[fantasia_sexual] == ''){ ?>
													
													<a href="#">											
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 preferencias-modelo inativo aba float-left disabled " style="background:#525151;">Este modelo não possui curiosidades</div>		
													</a>
													
													<?php }else{ ?>
													<a href="#">											
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 preferencias-modelo aba float-left">Curiosidades</div>		
													</a>
													
												<?php  } ?>
											</div>										
										</nav>	
										
										
										
										
										
										<!-- Conteúdo da aba -->
										<div id="content"> 
											
											<!-- Conteúdo da aba DESCRICAO -->
											<div class="conteudo aba-descricao" style="display: block;margin-top: 10px;">
												<div class="col-lg-12 col-md-12 informacoes-modelo1">
													
													<!-- idade -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo idade">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Idade:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['idade'])?> anos</div>
													</div>
													
													<!-- peso -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo peso">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Peso:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['peso'])?> kg</div>
													</div>
													
													<!-- altura -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo altura">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Altura:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['altura'])?> m</div>
													</div>
													
													<!-- signo -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo signo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Signo:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['signo'])?></div>
													</div>
													
													<!-- etnia -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo etnia">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Etnia:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['etnia'])?></div>
													</div>
													
													<!-- dote -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 informacoes-modelo dote">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Dote:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['penis'])?> cm</div>
													</div>
												</div>
												
											</div>
											
											
											<!-- Conteúdo da aba PREFERENCIAS-->
											<div class="row conteudo aba-preferencias">											
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo1">												
													
													
													<!-- lugar dos sonhos -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Lugar dos Sonhos:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['lugar_dos_sonhos'])?></div>
													</div>												
													
													<!-- comida favorita -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">		
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Comida Favorita:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['comida_fav'])?></div>													
													</div>		
													
													<!-- filme favorito -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Filme Favorito:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['filme_fav'])?></div>												
													</div>		
													
													<!-- hobbies favoritos -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Hobbies:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['hobbies_fav'])?></div>										
													</div>	
													
													<!-- uma loucura sexual -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Uma loucura sexual:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['loucura_sexual'])?></div>										
													</div>	
													
													<!-- o que mais me excita -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">O que mais me excita:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['mais_excita'])?></div>
													</div>		
													
													<!-- o que me faz feliz -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Como me fazer feliz:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['faz_feliz'])?>	</div> 											
													</div>	
													
													<!-- minha qualidade -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Minha maior qualidade:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['minha_qualidade'])?></div>										
													</div>	
													
													<!-- meu defeito -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Meu maior defeito:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['meu_defeito'])?></div>									
													</div>		
													
													<!-- musica favorita -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Minha música favorita:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['musica_fav'])?></div>
													</div>
													
													
													<!-- entre quatro paredes -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Vale tudo entre quatro paredes:</span></div>
														<span> <?php echo utf8_encode($dados_conteudo['entre_quatro_paredes'])?></span> 
													</div>
													
													
													<!-- fantasia sexual -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 informacoes-modelo">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Uma fantasia sexual:</span></div>
														<div><?php echo utf8_encode($dados_conteudo['fantasia_sexual'])?></div>
													</div>
													
													
													<!-- citacao favorita -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 citacao-favorita">
														<div><span style="font-family: 'Open Sans';font-size: 13px;">Citação Favorita:</span></div>
														<div>"<?php echo utf8_encode($dados_conteudo['citacao_fav'])?>"</div>												
													</div>	
													
													
												</div>											
											</div>										
											
											
										</div>
									</div>
									
									<?php
										
										// se houver contato do modelo
										
										if($dados_conteudo['fone_contato']){ ?>
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 disponivel-assinantes-modelo"> 
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
												<span class="unit disponivel-assinantes">										
													<p>Contato</p>	
													
													<!-- icone preto de telefone do modelo -->
													<div class="telefone-icone-branco"> 
													<img class="telefone-icone-modelo" src="<?php echo URL ?>imagens/icones/telefone-modelo.png" alt=""/></span> 
												</div>
												
												<!-- icone branco de telefone do modelo -->
												<div class="telefone-icone-preto"> 
													<img class="telefone-icone-modelo" src="<?php echo URL ?>imagens/icones/telefone-modelo-branco.png" alt=""/> 
												</div>
											</div>
											
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
												<a href="<?php echo ASSINE ; ?>"><p>Desbloqueie e veja o contato deste modelo.</p></a>										
											</div></div>
									<?php } ?> 
									
									<!-- CONSULTA DE CATEGORIA E CONTEUDO PARA TAGS -->
									<?php 
										$query_tag = "SELECT * FROM `categorias_conteudo` WHERE id_conteudo=$id AND pagina='Modelos Hot'";
										$consulta_tag = mysql_query($query_tag);
										$total_tag = mysql_num_rows ($consulta_tag);
										
										//SE TOTAL DE TAGS FOR DIFERENTE DE VAZIO, MOSTRA O TITULO TAG            
										if($total_tag != ''){?>
										<!-- TAGS DOS MODELOS -->
										<h1 class="cena-elenco-titulo" style="border-left:0!important;padding-left:0!important;margin-top: 30px!important;margin-right: 12px;">
											<span class="icone-pimenta-titulo"></span>
											Tags
										</h1>
										
									<?php } ?>
									
									<!-- TAGS -->
									<div class="mx-auto text-justify cena-tags-texto">
										
										<!-- Chamada das Tags do banco de dados -->
										<?php 
											//WHILE DE CONSULTA DE `CATEGORIAS_CONTEUDO`
											while($dados_tag = mysql_fetch_array($consulta_tag)){
												
												$query_categoria = "SELECT * FROM `categorias` WHERE id=$dados_tag[id_categoria]";
												$consulta_categoria = mysql_query($query_categoria);
												$dados_categoria = mysql_fetch_array($consulta_categoria);
											?>
											<!-- divs das TAGS -->
											<div class="tags">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botoes_tags">
													<span class="tags-links">
														<a href="<?php echo URL.'tag/'.URL_amigavel($dados_categoria[categoria]).'/'?>">
															<?php echo utf8_encode($dados_categoria[categoria]) ?>
														</a>
													</span>
												</div>
											</div>
											
										<?php  } ?>
									</div>			
									
								</div>
							</div>
						</div>
					</div>
					
					<!-- Conteúdo do Modelo -->

					<div class="row" style="background-color:#000!important;">
						<div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-5" style="margin-top:2%;">
							<div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-4 mb-4">
							<h2 class="text-light" style="font-size:23px;"><span class="icone-pimenta-titulo"></span> Mais cenas com <strong style="text-transform:uppercase;"><?=$dados_conteudo['nome']?></strong></h2>
							</div>
						<?php
							$consulta_associador2 = mysql_query("SELECT * FROM `associador_cenas` WHERE `id_modelo`='$id' ORDER BY RAND() LIMIT 3");
							while($dados_associador2 = mysql_fetch_array($consulta_associador2)){
							$consulta_cenas2 = mysql_query("SELECT * FROM `cenas` WHERE `id`='$dados_associador2[id_cena]' AND `status`='Ativo' AND `exibicao`='Todos' ORDER BY RAND() LIMIT 3");
							$dados_cenas2 = mysql_fetch_array($consulta_cenas2);
						?>
							<div class="col-12 col-md-12 col-lg-4 col-xl-4 mb-4" style="float:left;padding:0px 1px;">
							<a href="https://hotboys.com.br/cena/<?=$dados_cenas2['id']?>/<?=$dados_cenas2['titulo']?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?=$dados_cenas2['cena_home']?>" alt="" style="width:100%;">
								<br>
								<h2 class="text-light" style="font-size:16px;text-align:center;"><?=$dados_cenas2['titulo']?></h2>
							</a>
							</div>        
						<?php } ?>
							<div class="row" style="float:left;width:100%">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
									<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos">VEJA MAIS 
									<i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
								</div>
							</div>
						</div>
					</div>

					<?php //Consulta as fotos free no bd			
						$query_imagens="SELECT * FROM `imagens` WHERE tipo='Modelo Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 7";				
						$consulta_imagens=mysql_query($query_imagens);
						$total_imagens=mysql_num_rows($consulta_imagens);
						
						//Verifica se existe foto cadastrada 
						if($total_imagens > 0){
						?>
						
						
						<?php // Se as cenas com modelo for igual a 0, esconde o titulo 'cenas com'
							if($total_imagens >= 1){ ?>
							
							<!-- titulo fotos -->
							<div class="row" style="float:left;width:100%">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h1 class="modelo-titulo" style="border-left:0!important;padding-left:0!important">
										<span class="icone-pimenta-titulo"></span>
									FOTOS</h1>
								</div>
							</div>
							
							
							<!-- Fotos das Cenas -->
							<div class="row" style="float:left;width:100%" id="modelo_fotos">
								
								<?php //Consulta as fotos free no bd			
									$query_imagens="SELECT * FROM `imagens` WHERE tipo='Modelo Free' AND id_referencia=$id ORDER BY id DESC LIMIT 5";				
									$consulta_imagens=mysql_query($query_imagens);
									$total_imagens=mysql_num_rows($consulta_imagens);
								?>
								
								<?php while ($row=mysql_fetch_array ($consulta_imagens)){
									//Se for igual à 4 fotos, carregam apenas 4 fotos
									if($total_imagens <= 4){ ?>
									
									<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 inicial_box_conteudo">
										<?php } else { ?>
										<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 inicial_box_conteudo">	
										<?php } ?>
										<div> <a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>"> 
										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row['imagem']?>" alt=""> </a> 
										</div>
									</div>
									
								<?php } ?>
								
								<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 inicial_box_conteudo maisfotos" >
									<?php 
										$query_imagem_random="SELECT * FROM `imagens` WHERE tipo='$modelo_hot' AND id_referencia=$id ORDER BY RAND()";				
										$consulta_imagem_random=mysql_query($query_imagem_random);
										$total_imagem_random=mysql_num_rows($consulta_imagem_random);
										$row_imagem_random=mysql_fetch_array ($consulta_imagem_random);
										
										if($total_imagem_random > 5){
										?>
										<a href="<?php echo URL ?>assine"> 
											<div class="total-assine-liberar">
												<div class="quant-fotos-assine" style="">+ <?php echo $total_imagem_random -5 ?> Fotos</div>
												<div class="total-fotos-assine col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="assine-liberar col-lg-9 col-md-9 col-sm-9 col-xs-9">
														<img src="<?php echo URL ?>imagens/icones/cadeado-assine.png"/>Assine para liberar
													</div>
												</div>
											</div>
											
											<div class="imagem-random-modelo"> 
												<img class="fundo" src="<?php echo URL ?>imagens/backgrounds/background-fotos-assine.png"/>
												<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row_imagem_random['imagem']?>" alt=""> 
											</div>
										</a>
									<?php } ?>
								</div>
								
								</div>
								
							<?php } // fim do IF foto ?>
						<?php } ?>
						
						
						<?php // Se as cenas com modelo for igual a 0, esconde o titulo 'cenas com'
							if($total != 1){	?>
							<div class="row" style="float:left;width:100%">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h1 class="modelo-titulo" style="border-left:0!important;padding-left:0!important">
										<span class="icone-pimenta-titulo"></span>
									CENAS COM <?php echo utf8_encode($dados_conteudo['nome'])?></h1>
								</div>
							</div>
							
							
							
							<!-- Vídeos do Modelo -->
							<div class="row" style="float:left;width:100%">
								<div class="col-lg-12 col-md-12">
									<?php // Pega os ides associadores 
										$query_modelo = "SELECT * FROM `associador_cenas` WHERE id_modelo=$id  order by id ASC";
										$consulta_modelo = mysql_query($query_modelo);
										$total_modelo = mysql_num_rows( $consulta_modelo);
									?>
									
									<div class="row" style="float:left;width:100%">
										<?php	
											while($elenco = mysql_fetch_array($consulta_modelo)){
												$query_cena = "SELECT * FROM `cenas` WHERE id=$elenco[id_cena] AND `exibicao`='Todos' AND status='Ativo' ORDER BY data ASC";
												$consulta_cena = mysql_query($query_cena);
												$total_cena = mysql_num_rows($consulta_cena);
												$cena = mysql_fetch_array($consulta_cena);
												if($total_cena >= 1):
											?>
											<!-- Se for mobile carrega cenas sem videos -->
											<?php if ($detect->isMobile()){ ?>
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 inicial_box_conteudo">
													
													
													<div>
														<a href="<?php echo URL.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo]) ?>">
															<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php 
																if($cena[cena_home_mobile] != ''){
																	echo $cena['cena_home_mobile'];
																	}else{
																	echo '0_cena.jpg';
																}
															?>" alt="">
														</a>
														
														<div class="modelo-textos-cenascommodelo">
															<h4 class="modelo-titulo-cenascommodelo"> 
																<a href="<?php echo URL.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo]) ?>">
																	<?php echo utf8_encode($cena['titulo'])?>
																</a>
															</h4>
															
															<h4 class="modelo-visualizacoes-cenascommodelo">
																<div class="cenas-total-icones">
																	<!-- CSS dos 3 icones que vem em seguida -->
																	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
																	
																	<!-- 1 - Icone e texto - Visualizacao
																	<div class="cenas-visualizacao">
																		<i class="far fa-eye"></i> 
																		<p class="texto">
																			<?php echo number_format_short($cena['visualizacao'])?>
																		</p>
																	</div>
																	-->
																	
																	<!-- 2 - Icone e texto - Duracao do video -->
																	<?php 
																		if($cena['tempo_de_duracao'] != ''){?>
																		<div class="cenas-duracao-video">
																			<i class="fab fa-youtube"></i>
																			<p class="texto">
																				<?php echo $cena['tempo_de_duracao']?>
																			</p>
																		</div>
																	<?php } ?>
																</div>		
															</h4>
														</div>
														
														
													</div>
												</div>
												
												<!-- Caso nao seja mobile carrega cenas com videos-->
												<?php } else { ?>
												
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 inicial_box_conteudo">
													
													
													<div>
														
														<a href="<?php echo URL.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo]) ?>" class="<?php if($cena[video_preview] != '') echo ' item-video '; if($cena[video_preview_gif] != '') echo ' item-video-gif ' ?>">
																<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="//server2.hotboys.com.br/arquivos/<?php 
																	if($cena[cena_home] != ''){
																		echo $cena['cena_home'];
																		}else{
																		echo '0_cena.jpg';
																	}
																?>" alt="">

															
															<?php if($cena[video_preview] != '') { ?>
																<span class="far fa-play-circle fa-5x" style="display:none"></span>
																<video  width="100%" style="display:none" loop>
																	<source src="https://server2.hotboys.com.br/arquivos/<?php echo $cena[video_preview] ?>" type="video/mp4">
																</video>
																<?php
																}
																if($cena[video_preview_gif] != '') {
																?>
																<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $cena[video_preview_gif] ?>"><?php
																}
															?>
														</a>
														
														<div class="modelo-textos-cenascommodelo">
															<h4 class="modelo-titulo-cenascommodelo"> 
																<a href="<?php echo URL.'cena/'.$cena[id].'/'.URL_amigavel($cena[titulo]) ?>">
																	<?php echo utf8_encode($cena['titulo'])?>
																</a>
															</h4>
															
															<h4 class="modelo-visualizacoes-cenascommodelo">
																<div class="cenas-total-icones">
																	
																	<!-- 1 - Icone e texto - Visualizacao
																	<div class="cenas-visualizacao">
																		<i class="far fa-eye"></i> 
																		<p class="texto">
																			<?php echo number_format_short($cena['visualizacao'])?>
																		</p>
																	</div>
																	-->
																	
																	<!-- 2 - Icone e texto - Duracao do video -->
																	<?php 
																		if($cena['tempo_de_duracao'] != ''){?>
																		<div class="cenas-duracao-video">
																			<i class="fab fa-youtube"></i>
																			<p class="texto">
																				<?php echo $cena['tempo_de_duracao']?>
																			</p>
																		</div>
																	<?php } ?>
																	
																</div>		
															</h4>
														</div>
														
													</div>
												</div>
											<?php	}	?>
											<?php	endif	?>
										<?php	}	?>
										
									</div>
								</div>
								
							</div>
						<?php } ?>
						
						
						<?php //Se comentario for igual a 0, esconde veja mais
							if($total >= 1){	?>
							<!-- Botão Veja Mais - Cenas Com xxx -->
							<div class="row" style="float:left;width:100%">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
									<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos">VEJA MAIS 
									<i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
								</div>
							</div>
							
						<?php } ?>
						
						<!-- titulo - delicie-se tambem com -->
						<div class="row" style="float:left;width:100%">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<h1 class="modelo-titulo"  style="border-left:0!important;padding-left:0!important">
									<span class="icone-pimenta-titulo"></span>
								Delicie-se também com</h1>
							</div>
						</div>
						
						
						<!-- conteudo - delicie-se tambem com -->
						<div class="row" style="float:left;width:100%">
							<?php 				
								$query="SELECT * FROM `cenas` WHERE status='Ativo' AND exibicao='Todos' order by RAND() LIMIT 3";
								$consulta=mysql_query($query);			
								while ($row=mysql_fetch_array ($consulta)){?>
								
								<?php if ($detect->isMobile()) { ?>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
										
										
										<div> 
											<a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row_conteudo[titulo])?>">
												<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php 
													if($row[cena_home_mobile] != ''){
														echo $row['cena_home_mobile'];
														}else{
														echo '0_cena.jpg';
													}
												?>" alt="">
											</a>
											
											
											<div class="modelo-titulo-cenascommodelo">
												<h4 class="modelo-titulo-cenascommodelo"> 
													<a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row_conteudo[titulo])?>" class="titulo-contos-home">
														<?php echo utf8_encode($row['titulo'])?>
													</a>
												</h4>
												
												
												<h4 class="modelo-visualizacoes-assistatambem">
													<div class="cenas-total-icones">
														
														<!-- 1 - Icone e texto - Visualizacao
														<div class="cenas-visualizacao">
															<i class="far fa-eye"></i> 
															<p class="texto">
																<?php echo number_format_short($row['visualizacao'])?>
															</p>
														</div>
														-->
														
														<!-- 2 - Icone e texto - Duracao do video -->
														<?php 
															if($row['tempo_de_duracao'] != ''){?>
															<div class="cenas-duracao-video">
																<i class="fab fa-youtube"></i>
																<p class="texto">
																	<?php echo $row['tempo_de_duracao']?>
																</p>
															</div>
														<?php } ?>
													</div>		
												</h4>
												
												
											</div>
											
										</div>
									</div>
									
									<?php } else { ?>	
									
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
										
										
										
										<div> 
											<a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row_conteudo[titulo])?>" class="<?php if($row[video_preview] != '') echo ' item-video '; if($row[video_preview_gif] != '') echo ' item-video-gif ' ?>">
												
												
													<img class="lazy card-img-top-cena" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="//server2.hotboys.com.br/arquivos/<?php 
														if($row[cena_home] != ''){
															echo $row['cena_home'];
															}else{
															echo '0_cena.jpg';
														}
														
													?>" alt="">
													<span class="far fa-play-circle fa-5x" style="display:none"></span>
												
												
												
												
												<?php
													if($row[video_preview] != '') {
													?>
													<video  width="100%" style="display:none" loop>
														<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview] ?>" type="video/mp4">
													</video>
													<?php
													}
													if($row[video_preview_gif] != '') {
													?>
													<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview_gif] ?>"><?php
													}
												?>
											</a>
											
											<div class="modelo-titulo-cenascommodelo">
												<h4 class="modelo-titulo-cenascommodelo"> 
													<a href="<?php echo URL.'cena/'.$row[id].'/'.URL_amigavel($row_conteudo[titulo])?>" class="titulo-contos-home"><p><?php echo utf8_encode($row['titulo'])?></p></a>
												</h4>
												
												<h4 class="modelo-visualizacoes-assistatambem">
													<div class="cenas-total-icones">
														
														<!-- 1 - Icone e texto - Visualizacao
														<div class="cenas-visualizacao">
															<i class="far fa-eye"></i> 
															<p class="texto">
																<?php echo number_format_short($row['visualizacao'])?>
															</p>
														</div>
														-->
														
														<!-- 2 - Icone e texto - Duracao do video -->
														<?php 
															if($row['tempo_de_duracao'] != ''){?>
															<div class="cenas-duracao-video">
																<i class="fab fa-youtube"></i>
																<p class="texto">
																	<?php echo $row['tempo_de_duracao']?>
																</p>
															</div>
														<?php } ?>
													</div>		
												</h4>
											</div>
										</div>
										
									</div>
								<?php } ?>	
							<?php }	?>
							
						</div>
						
						
						<!-- Botão Veja Mais - Assista Tambem -->
						<div class="row" style="float:left;width:100%">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop modelos">
								<h1 class="bt-vejamais"><a href="<?php echo URL ?>videos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
							</div>
						</div>
					</div>
					
					
					
					<!-- COMENTARIOS (Include) -->
					<?php include ('includes/comentarios.php');?>
					
					<!-- FOOTER (Include) -->
					<?php include ('includes/footer.php');?>
					
					<!-- JAVASCRIPTS PADROES (Include) -->					
					<?php 
						if ($detect->isMobile()) { 
							include ('includes/javascript-mobile.php'); 
							}else{
							include ('includes/javascript.php'); 
						}
					?>
					
					
					<!-- jQuery versao 3.2.1 -->
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
					
					<!-- Javascript versao Fancybox 3.2.1 -->
					<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
					
					<!-- Abas(Descrição/Preferencia da pagina Modelo.php -->
					<script src="<?php echo URL ?>js/abas-modelos.js"></script>
					
					
					
					<!-- Recaptcha do Google para formularios-->
					<script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
					
					<script>
						window.renderRecaptchas = function() {
							var recaptchas = document.querySelectorAll('.g-recaptcha');
							for (var i = 0; i < recaptchas.length; i++) {
								grecaptcha.render(recaptchas[i], {
									sitekey: recaptchas[i].getAttribute('data-sitekey')
								});
							}
						}
					</script>
				</div>
			</div>
		</body>
		
	</html>
	
