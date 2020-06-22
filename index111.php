<?php
	
	require_once('../config/configuracoes.php');
	require_once('../includes/funcoes.php');
	
	$naoVerificarPagamento = true;
	
	include('includes/vip.php');		
	
	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento est� ok	
		verificar_pgto();
	}
	
	$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	$email_cliente_logado = $_SESSION[email_cliente_logado];
	
	if($_SESSION[email_cliente_logado] !=''){
		//consulta se usuario ja exite no bd 
		$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
		$consulta_user = mysql_query($query_user);
		$total_user = mysql_num_rows($consulta_user);
		
		//cadastra o email no banco de user caso o perfil dele nao esteja prenchido
		if($total_user < 1){
			
			$query = "INSERT INTO `usuarios_perfil`(
			`id`, 
			`primeiro_nome`, 
			`email`, 
			`nome_exibicao`,
			`foto_perfil`
			) VALUES (
			NULL , '', '$email_cliente_logado','','')";
			
			$status = mysql_query($query);
			
		}//FIM total user
	}// FIM consulta user
	
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- HEAD (Include) -->
		<?php include ('../includes/head.php');?> 
		
		<style>
			@media (min-width:1200px){
			.conteudo-imagens.audicoes{min-height: 270px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{border:3px solid #1f1e1e}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px;}
			}
			@media (min-width:992px) and (max-width:1199px){
			.conteudo-imagens.audicoes{min-height: 170px;}
			.home-textos-clientes-assistindo.audicoes{height: 28px;}
			.inicial_box_conteudo.audicoes{min-height: 221px;border:3px solid #1f1e1e}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (min-width:768px) and (max-width:991px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:767px){
			.home-textos-clientes-assistindo.audicoes{height: 30px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
			@media (max-width:480px){
			.home-textos-clientes-assistindo.audicoes{height: 25px;}
			.espacamento-laterais-3.audicoes{background-color:#1f1e1e;}
			.leia-mais{text-transform: uppercase; color: white!important; margin-top: 10px; font-family: 'Baloo Bhaijaan',cursive, sans-serif; float: none; font-size: 16px; }
			}
		</style>
		
	</head>
	<body id="body" class="fundo-preto">
		
		
		<!-- TOP (Include) -->
		<?php include ('../includes/top.php');?>
		
		
		<!-- FIM DA MENSAGEM PARA CLIENTE  VIP
			<?php// if($dados_user['foto_perfil'] == ''){ ?>
			
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="alert alerta-formulario_cliente alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			×</button><p>O site HOTBOYS está com novidade,agora você pode colocar sua foto no perfil! </p><a href="minha-conta"> Clique aqui</a>
			</div>
			</div>
			</div>
			</div>
		</div>-->
		
		<?php //}?>
		
		
		<!-- AQUI SE INICIA OS SCRIPS DE IFORMS INDICATIVOS DA AREA VIP -->
		<?php 
			$query = "SELECT * FROM `informs_indicativos` WHERE pagina_exibicao='vip'";
			$consulta = mysql_query($query);
			$dados = mysql_fetch_array($consulta);
			//INFORM TIPO AVISO
			if($dados['status']=="ativo" && $dados['tipo_informacao']=="aviso"){ ?>
			<a href="<?php echo URL ?>audicoes">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="alert alerta-manutencao alert-dismissable">
									
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									×</button>
									<?php echo $dados['informacao'];?>
								</div>
							</div>
						</div>
					</div><!-- Alerta de Aviso-->
				</div><!-- fim do script de mensagem tipo aviso -->
			</a>
		<?php } ?> 
		
		
		<?php
			//INFORM TIPO MANUTENÇÃO
			if($dados['status']=="ativo" && $dados['tipo_informacao']=="manutencao"){ ?>
			
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="alert alerta-manutencao alert-dismissable">
								<span class="glyphicon glyphicon-wrench"></span>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×</button><strong>Manutenção!</strong><?php echo $dados['informacao'];?>
							</div>
						</div>
					</div>
				</div><!-- Alerta de Manutencao -->
			</div><!-- fim do script de mensagem de manutenção -->
			
		<?php } ?> 
		
		
		<?php
			//INFORM TIPO MENSAGEM
			if($dados['status']=="ativo" && $dados['tipo_informacao']=="mensagem"){ ?>
			
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="alert alerta-manutencao alert-dismissable">
								<span class="glyphicon glyphicon-wrench"></span>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×</button><strong>Mensagem informativa!</strong><?php echo $dados['informacao'];?>
							</div>
						</div>
					</div>
				</div><!-- Alerta de mensagem -->
			</div><!-- fim do script de mensagem tipo = mensagem-->
			
		<?php } ?> 
		<!-- FIM DO SCRIPT DE INFORMS_INDICATIVOS -->
		
		
		
		
		
		<?php 
			$query_vitrine ="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 5";
			$consulta_vitrine  = mysql_query($query_vitrine );
		?>
		
		<div class="home-assineja-imagensing">
			<div class="row float-none" >
				<div class="col-lg-12 col-md-12 banner" style="float:left;width:100%;margin-top:5px">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						
						
						<!-- Lista ordenada da vitrine -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							<li data-target="#carousel-example-generic" data-slide-to="4"></li>
						</ol>
						
						
						<div class="carousel-inner">
							
							<!-- VITRINE ADICIONAL TODOS -->
								<?php 
									$counter = 1;
									$query_vitrine_adicional = "SELECT * FROM `vitrine` WHERE status='ativo'  AND exibicao='vip' limit 1";
									$consulta_vitrine_adicional  = mysql_query($query_vitrine_adicional);
									while($dados_vitrine_adicional = mysql_fetch_array($consulta_vitrine_adicional)){ ?>
									
									<?php if($detect->isMobile() AND $dados_vitrine_adicional['imagem_mobile']){ ?>
										<div class="item <?php if($counter <= 1){echo " active"; } ?>">
										<a href="<?php echo $dados_vitrine_adicional['link'] ?>">
										<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem_mobile'] ?>" alt="imagem vitrine" width="100%">
										</a>
										</div>
										<?php $counter++; }else{ ?>
										<div class="item <?php if($counter <= 1){echo " active"; }?>">
										<a href="<?php echo $dados_vitrine_adicional['link'] ?>">
										<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine_adicional['imagem'] ?>" alt="imagem vitrine adicional" width="100%">
										</a>
										</div>
										<?php
											$counter++;
										} }
								?>		
								<?php 
									$counter = 1;
									while($dados_vitrine = mysql_fetch_array($consulta_vitrine)){ ?>
									<?php if ($detect->isMobile() AND $dados_vitrine['cena_vitrine_mobile']) { ?>
										
										<div class="item <?php if($counter <= 1){echo " vitrine"; } ?>">
											<a href="<?php echo URL_VIP.'cena/'.$dados_vitrine[id].'/'.URL_amigavel($dados_vitrine[titulo]) ?>"> 
												<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine_mobile'] ?>" alt="imagem vitrine mobile" width="100%">
												<div class="carousel-caption">
													<h3> <?php echo $dados_vitrine['titulo']; ?></h3>
													<p> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
												</div>
											</a>
										</div>
										
										<?php } else { ?>
										
										<div class="item <?php if($counter <= 1){echo " vitrine"; } ?>">
											<a href="<?php echo URL_VIP.'cena/'.$dados_vitrine[id].'/'.URL_amigavel($dados_vitrine[titulo]) ?>"> 
												<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine'] ?>" alt="imagem vitrine" width="100%">
												<div class="carousel-caption">
													<h3> <?php echo $dados_vitrine['titulo']; ?></h3>
													<p> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
												</div>
											</a>
										</div>
										
									<?php } ?>
									
								<?php $counter++; } ?>
								
								
						</div>
						
						<!-- seta da esquerda - vitrine -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> 
						<span class="glyphicon glyphicon-chevron-left"></span></a>
						
						<!-- seta da direita - vitrine -->
						<a class="right carousel-control"
						href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"> </span></a> 
						
						
					</div>
					
					
					
				</div>
			</div>
		</div>
		
		
		<?php
			if(!$AbrirIframePagamento){
				//nao vai abrir o iframe de pagamento	
				?>
			<div id="push"></div>
			
			
			
			<!-- BANNER 01 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						//$counter = 1;
						
						//$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='1'  LIMIT 1 ";
						//$consulta_banners  = mysql_query($query_banners);
						
						//$dados_banners = mysql_fetch_array($consulta_banners);
						//$total_banners = mysql_num_rows($consulta_banners);
						
						//if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							//if($total_banners >= 0){ 
							?>
							<a href="<?php //echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							//} } else {
						?>
						<?php 
							//$counter = 1;
							//if($total_banners >= 0){ ?>
							<a href="<?php //echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php  //} }  ?>
				</div>
			</div>
				-->
			
			<!-- NOTICIAS AUDICOES -->
			<div class="row espacamento-laterais-3 audicoes" style="width:100%;float:left;margin-top:1rem">
				
				<!-- Título H1 do conteúdo -->
				<div class="row" style="width:100%;float:left">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important;margin-top: 0.8rem!important;">
							<i class="fa fa-couch" style="color:#e31330!important;background-color:#1f1e1e;margin-left: 0.4rem;"></i>
							Últimas notícias - Audições Hot 3
						</h1>
					</div>
				</div>
				<?php
					$query_audicoes = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC LIMIT 3";
					
					$consulta_audicoes  = mysql_query($query_audicoes);
					$total_audicoes = mysql_num_rows($consulta_audicoes);
					
					while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){
					?>
					
					<?php  if ($detect->isMobile()) {  ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes">
							
							
							<div>
								<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo]))?>">
									<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($dados_audicoes['imagem_lista'] != ''){
											echo $dados_audicoes['imagem_lista'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="noticias das audicoes">
								</a>
								<div class="home-textos-clientes-assistindo audicoes">
									<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
										<h4 class="home-titulo-clientes-assistindo" style="text-transform: uppercase;"> 
											<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 35))); ?>... <span style=" color: #afabab; text-decoration: underline; ">leia Mais</span>
										</h4>
									</a>
								</div>
							</div>
							
						</div>
						<?php } else{ ?>	
						
						
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo audicoes" style="border:3px solid #1f1e1e">
							
							<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo])) ?>">
								<div class="conteudo-imagens audicoes"> 
									<img class="lazy home-clientes-assistindo" src="<?php echo URL ?>imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php if($dados_audicoes['imagem_lista'] != ''){ echo $dados_audicoes['imagem_lista']; }else{ echo '0_cena.jpg'; } ?>" alt="noticias das audicoes">
									
								</div>
							</a>
							<div class="home-textos-clientes-assistindo audicoes">
								<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_audicoes[id].'/'.URL_amigavel($dados_audicoes[titulo]))?>">
									<h4 class="home-titulo-clientes-assistindo" style="text-transform: uppercase;"> 
										<?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 35))); ?>... <span style=" color: #afabab; text-decoration: underline; ">leia Mais</span>
									</h4>
								</a>
							</div>
							
						</div>
					<?php } ?>
				<?php } ?>
				
			</div>
			
			
			<!-- Botão Veja Mais assistindo nesse momento -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
					<h1 class="bt-vejamais"><a href="<?php echo URL_VIP ?>audicoes"><?php echo V_MAIS ?> <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
			</div>
			
			<!-- BANNER 02 
			<div class="row" style="float:left;width:100%;margin-top:20px">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php //
						//$counter = 1;
						
						//$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='2'  LIMIT 1 ";
						//$consulta_banners  = mysql_query($query_banners);
						
						//$dados_banners = mysql_fetch_array($consulta_banners);
						//$total_banners = mysql_num_rows($consulta_banners);
						
						//if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							//if($total_banners >= 0){ 
							?>
							<a href="<?php //echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							//} } else {
						?>
						<?php 
							//$counter = 1;
							//if($total_banners >= 0){ ?>
							<a href="<?php ///echo $dados_banners[link].'"'.'target="'.//$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php //echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
						<?php // } }  ?>
				</div>
			</div>
			-->
			
			<!-- Conteúdo - Clientes Assistindo Neste Momento --> 
			<div class="container-tudo">
				<!-- Título H1 do conteúdo -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
					<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">HOTVIPS ASSISTINDO AGORA</h1>
				</div>
				<div class="container espacamento-laterais-3">
					<?php 
						$query_visitou ="SELECT * FROM `visitou_agora` WHERE exibicao = 'Todos' AND id_conteudo<>''  GROUP BY id_conteudo ORDER BY id DESC LIMIT 6";
						$consulta_visitou = mysql_query($query_visitou);
                        $total_visitou = mysql_num_rows($consulta_visitou);
                        $falta = 6 - $total_visitou;
					?>
					<div class="row">
						<?php while($row = mysql_fetch_array($consulta_visitou)){
							// traz os dois ultimos ensaios do sexo hot
							$query ="SELECT * FROM `cenas` WHERE id=$row[id_conteudo] AND status='Ativo' LIMIT 1";
							$consulta = mysql_query($query);
							$linha = mysql_fetch_array($consulta);
						?>
						<?php if ($detect->isMobile()){ ?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
								<div> 
									<a href="<?php echo URL_VIP.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo]) ?>">
										<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
											if($linha[cena_home_mobile] != ''){
												echo $linha['cena_home_mobile'];
												}else{
												echo '0_cena.jpg';
											} ?>" alt="imagem cena mobile">
									</a>
									<div class="home-textos-clientes-assistindo">
										<h4 class="home-titulo-clientes-assistindo"> 
											<?php echo utf8_encode($linha['titulo'])?>
										</h4>
										
										<div class="cenas-total-icones">
											
											<!-- 1 - Icone e texto - Visualizacao
											<div class="cenas-visualizacao">
												<i class="far fa-eye"></i> 
												<p class="texto">
													<?php echo number_format_short($linha['visualizacao'])?>
												</p>
											</div>
											-->
											
											<!-- 2 - Icone e texto - Duracao do video -->
											<?php 
												if($linha['tempo_de_duracao'] != ''){?>
												<div class="cenas-duracao-video">
													<i class="fab fa-youtube"></i>
													<p class="texto">
														<?php echo ($linha['tempo_de_duracao'])?>
													</p>
												</div>
											<?php } ?>
										</div>
										
									</div>
								</div>
							</div>
							
							<?php } else { ?>
							
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
								
								
								<div> 
									
									<a href="<?php echo URL_VIP.'cena/'.$linha[id].'/'.URL_amigavel($linha[titulo])?>" class="<?php if($linha[video_preview] != '') echo ' item-video '; if($linha[video_preview_gif] != '') echo ' item-video-gif ' ?>">
										
										<img class="lazy home-clientes-assistindo" src="../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php 
											if($linha[cena_home] != ''){
												echo $linha['cena_home'];
												}else{
												echo '0_cena.jpg';
											}
											
										?>" alt="imagem cena">
										
										
										
										<?php
											if($linha[video_preview] != '') {
											?>
											<?php if ($detect->isMobile()) { ?>
												
												<?php }else{ ?>
												<span class="far fa-play-circle fa-5x" style="display:none"></span>
											<?php } ?>
											<video  width="100%" style="display:none" loop>
												<source src="https://server2.hotboys.com.br/arquivos/<?php echo $linha[video_preview] ?>" type="video/mp4">
											</video>
											<?php
											}
											if($linha[video_preview_gif] != '') {
											?>
											<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $linha[video_preview_gif] ?>" alt="preview video"><?php
											}
										?>
									</a>
									
									<div class="home-textos-clientes-assistindo">
										<h4 class="home-titulo-clientes-assistindo"> 
											<?php echo utf8_encode($linha['titulo'])?>
										</h4>
										
										
										<div class="cenas-total-icones">
											
											
											<!-- 1 - Icone e texto - Visualizacao
											<div class="cenas-visualizacao">
												<i class="far fa-eye"></i> 
												<p class="texto">
													<?php echo number_format_short($linha['visualizacao'])?>
												</p>
											</div>-->
											
											<!-- 2 - Icone e texto - Duracao do video -->
											<?php 
												if($linha['tempo_de_duracao'] != ''){?>
												<div class="cenas-duracao-video">
													<i class="fab fa-youtube"></i>
													<p class="texto">
														<?php echo ($linha['tempo_de_duracao'])?>
													</p>
												</div>
											<?php } ?>
										</div>
										
									</div>
								</div>
							</div>
							
						<?php } ?>
						<?php } ?>
					</div>
					
					
					<!-- Botão Veja Mais assistindo nesse momento -->
					<div class="col-lg-12 col-sm-12 bt-vejamais-desktop">
						<h1 class="bt-vejamais" style="border-left:0!important;padding-left:0!important">
							<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">
							<a href="<?php echo URL_VIP ?>videos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a>
						</h1>
					</div>
				</div>
				
				
				<!-- BANNER 03 -->
				
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						
						$counter = 1;
						
						$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='3'  LIMIT 1 ";
						$consulta_banners  = mysql_query($query_banners);
						
						$dados_banners = mysql_fetch_array($consulta_banners);
						$total_banners = mysql_num_rows($consulta_banners);
						
						if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							if($total_banners >= 0){ 
							?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							} } else {
						?>
						<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
								
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
							<?php
							} }
							
					?>
				</div>
				
				
				
				
				
				<!-- Conteúdo - Cenas Recentes --> 
				
				<!-- Título H1 do conteúdo -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
					<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">SAIU DO FORNO HOT</h1>
				</div>
				
				
				<div class="container espacamento-laterais-4">
					<?php 
						$query="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 6";
						$consulta=mysql_query($query);
					?>
					
					<div class="row">
						<?php while ($row=mysql_fetch_array ($consulta)) { ?>
							<?php if ($detect->isMobile()){ ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
									<div> 
										<a href="<?php echo URL_VIP.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
											
											<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/<?php 
												
												if($row[cena_home] != ''){
													echo $row['cena_home'];
													}else{
													echo '0_cena.jpg';
												} 
											?>" alt="imagem cena mobile">
											
										</a>
										
										<div class="home-textos-cenas-recentes">
											<h4 class="home-titulo-cenas-recentes"> 
												<a href="<?php echo URL_VIP.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
													<?php echo utf8_encode($row['titulo'])?>
												</a> </h4>
												
												
												<div class="cenas-total-icones">
													
													<!-- 1 - Icone e texto - Visualizacao
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($row['visualizacao'])?>
														</p>
													</div>-->
													
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($row_conteudo['tempo_de_duracao'] != ''){ ?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo ($row['tempo_de_duracao']) ?>
															</p>
														</div>
													<?php } ?>
													
												</div>
												
										</div>
										
									</div>
								</div>
								
								<?php } else { ?>
								
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
									
									
									
									<div> 
										<a href="<?php echo URL_VIP.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>" class="<?php if($row[video_preview] != '') echo ' item-video '; if($row[video_preview_gif] != '') echo ' item-video-gif ' ?>">
											
											<img class="lazy home-clientes-assistindo" src="../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php 
												if($row[cena_home] != ''){
													echo $row['cena_home'];
													}else{
													echo '0_cena.jpg';
												}
												
											?>" alt="imagem cena">
											
											
											<?php
												if($row[video_preview] != '') {
												?>
												
												<?php if ($detect->isMobile()) { ?>
													<?php }else{ ?>
													<span class="far fa-play-circle fa-5x" style="display:none"></span>
												<?php } ?>
												<video  width="100%" style="display:none" loop>
													<source src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview] ?>" type="video/mp4">
												</video>
												<?php
												}
												if($row[video_preview_gif] != '') {
												?>
												<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $row[video_preview_gif] ?>" alt="video preview"><?php
												}
											?>
										</a>
										<div class="home-textos-cenas-recentes">
											<h4 class="home-titulo-cenas-recentes"> 
												<a href="<?php echo URL_VIP.'cena/'.$row[id].'/'.URL_amigavel($row[titulo]) ?>">
													<?php echo utf8_encode($row['titulo'])?>
												</a> </h4>
												
												<div class="cenas-total-icones">
													
													
													<!-- 1 - Icone e texto - Visualizacao
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($row['visualizacao'])?>
														</p>
													</div>-->
													
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($row['tempo_de_duracao'] != ''){?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo ($row['tempo_de_duracao'])?>
															</p>
														</div>
													<?php } ?>
												</div>
												
										</div>
									</div>
								</div>
							<?php } ?>
							<?php
							}
						?>
						<!-- Botão Veja Mais cena rencentes-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
							<h1 class="bt-vejamais" style="border-left:0!important;padding-left:0!important">
								<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">
								<a href="<?php echo URL_VIP ?>videos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a>
							</h1>
						</div>
						<!-- /.container --> 
					</div>
					<!-- /.row --> 
				</div>
				
				<!-- /.container --> 
				
				<!-- BANNER 04 -->
				<div class="row" style="float: left;width: 100%;">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
						<?php 
							
							$counter = 1;
							
							$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='4'  LIMIT 1 ";
							$consulta_banners  = mysql_query($query_banners);
							
							$dados_banners = mysql_fetch_array($consulta_banners);
							$total_banners = mysql_num_rows($consulta_banners);
							
							if ($detect->isMobile()) { 
								if($total_banners >= 1){ 
								?>
								<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
									
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem vitrine mobile" width="100%">
								</a>
								<?php
								} } else {
							?>
							
							<?php 
								$counter = 1;
								if($total_banners >= 1){ ?>
								<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
									
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem vitrine mobile" width="100%">
								</a>
								<?php
								} }
						?>
					</div>
				</div>
				
				<!-- CENAS MAIS VISTAS NO MÊS -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
						<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">
					CENAS MAIS QUENTES DO MÊS</h1>
				</div>
				
				<div class="container">
					<?php
						
						$dataIni = date('Y-m-d', strtotime('-30 days'));
						$dataFim = date('Y-m-d');
						$query_cenas_do_mes= "SELECT `id_cenas`, SUM(`quatidade_visualizacao`) FROM `visita_cenas` WHERE `data` BETWEEN '".$dataIni."' AND '".$dataFim."' GROUP BY `id_cenas` ORDER BY SUM(`quatidade_visualizacao`) DESC LIMIT 7";
						$consulta_cenas_do_mes = mysql_query($query_cenas_do_mes);
						
						while($idCena = mysql_fetch_array($consulta_cenas_do_mes)){
							$queryCena= "SELECT * FROM `cenas` WHERE `id`='".$idCena['id_cenas']."'";
							$consultaCena = mysql_query($queryCena);
							while($dadosCena = mysql_fetch_array($consultaCena)){
							?>
							<!-- DIV DAS CENAS MAIS VISTAS DO MÊS -->
							<?php if ($detect->isMobile()) { ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
									<div> 
										<a href="<?php echo URL_VIP.'cena/'.$dadosCena[id].'/'.URL_amigavel($dadosCena[titulo]) ?>">
											<img class="home-clientes-assistindo" src="https://server2.hotboys.com.br/arquivos/
											<?php 
												if($dadosCena[cena_home] != ''){
													echo $dadosCena['cena_home'];
													}else{
													echo '0_cena.jpg';
												}
												
											?>" alt="imagem cena mobile">
											
											
										</a>
										<div class="home-textos-clientes-assistindo">
											<h4 class="home-titulo-clientes-assistindo"> 
												<a href="<?php echo URL_VIP ?>cena.php?id=<?php echo $dadosCena['id'] ?>">
													<p><?php echo utf8_encode($dadosCena['titulo'])?></p>
												</a> 
											</h4>
											
											<div class="cenas-total-icones">
												
												
												
												<!-- 1 - Icone e texto - Visualizacao
												<div class="cenas-visualizacao">
													<i class="far fa-eye"></i> 
													<p class="texto">
														<?php echo number_format_short($dadosCena['visualizacao'])?>
													</p>
												</div>-->
												
												<!-- 2 - Icone e texto - Duracao do video -->
												<?php 
													if($dadosCena['tempo_de_duracao'] != ''){?>
													<div class="cenas-duracao-video">
														<i class="fab fa-youtube"></i>
														<p class="texto">
															<?php echo ($dadosCena['tempo_de_duracao'])?>
														</p>
													</div>
												<?php } ?>
											</div>
											
										</div>
									</div>
								</div>
								
								<?php } else { ?>	
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
									
									<div> 
										<a href="<?php echo URL_VIP.'cena/'.$dadosCena[id].'/'.URL_amigavel($dadosCena[titulo]) ?>" class="<?php if($dadosCena[video_preview] != '') echo ' item-video '; if($dadosCena[video_preview_gif] != '') echo ' item-video-gif ' ?>">
											
											<img class="lazy home-clientes-assistindo"  src="../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php 
												if($dadosCena[cena_home] != ''){
													echo $dadosCena['cena_home'];
													}else{
													echo '0_cena.jpg';
												}
												
											?>" alt="imagem cena">
											
											<?php
												if($dadosCena[video_preview] != '') {
												?>
												<?php if ($detect->isMobile()) { ?>
													<?php }else{ ?>
													<span class="far fa-play-circle fa-5x" style="display:none"></span>
												<?php } ?>
												<video  width="100%" style="display:none" loop>
													<source src="https://server2.hotboys.com.br/arquivos/<?php echo $dadosCena[video_preview] ?>" type="video/mp4">
												</video>
												<?php
												}
												if($dadosCena[video_preview_gif] != '') {
												?>
												<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $dadosCena[video_preview_gif] ?>" alt="preview video">
												<?php
												}
											?>
										</a>
										<div class="home-textos-clientes-assistindo">
											<h4 class="home-titulo-clientes-assistindo"> 
												<a href="<?php echo URL_VIP ?>cena.php?id=<?php echo $dadosCena['id'] ?>">
													<p><?php echo utf8_encode($dadosCena['titulo'])?></p>
												</a> 
											</h4>
											
											<div class="cenas-total-icones">
												
												
												<!-- 1 - Icone e texto - Visualizacao
												<div class="cenas-visualizacao">
													<i class="far fa-eye"></i> 
													<p class="texto">
														<?php echo number_format_short($dadosCena['visualizacao'])?>
													</p>
												</div>-->
												
												<!-- 2 - Icone e texto - Duracao do video -->
												<?php 
													if($dadosCena['tempo_de_duracao'] != ''){?>
													<div class="cenas-duracao-video">
														<i class="fab fa-youtube"></i>
														<p class="texto">
															<?php echo ($dadosCena['tempo_de_duracao'])?>
														</p>
													</div>
												<?php } ?>
											</div>
											
										</div>
									</div>
								</div>
							<?php } ?>		
						<?php } } ?>
				</div><!-- FIM DA DIV CENAS MAIS VISTAS DO MÊS -->
				
				<!-- MODELOS DESKTOP  mais visitados da Semana --> 
				
				<!-- Título H1 -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
					<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">OS GOSTOSOS MAIS QUENTES DA SEMANA</h1>
				</div>
				
				
				
				<!-- MODELOS MOBILE -->
				<?php if ($detect->isMobile()){ ?>
					
					
					<?php
						$query_modelos= "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta  desc limit 5 ";
						$consulta_modelos = mysql_query($query_modelos);
						$total_modelos_modelos = mysql_num_rows($consulta_modelos); 
						
						
					?>
					
					<div class="container carousel-mobile carousel-mobile">
						<div  id="myCarousel" class="carousel slide" data-ride="carousel">
							
							<div class="carousel-inner">
								<?php 
									
									$counter = 1;
									
									while($dados_modelos = mysql_fetch_array($consulta_modelos)){ 
										//Consulta Modelos 
										$query_modelo ="SELECT * FROM `modelos` WHERE 
										id=$dados_modelos[id_conteudo]   LIMIT 1"; 
										$consulta_modelo = mysql_query($query_modelo);
										$dados_modelo = mysql_fetch_array($consulta_modelo); 
										
									?>
									<div class="item <?php if($counter <= 1){echo "active"; } ?>">
										<div class="col-sm-4 col-xs-4">
											<a href="<?php echo URL ?>modelo.php?id=<?php echo $dados_modelo['id'] ?>">
											<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo['modelo_perfil']?>" class="img-responsive" alt="imagem modelo"></a>
											
											
										</div>
									</div>
									
									<?php	
										$counter++;
										
									} ?>
									
									
							</div>
							<!-- Controles - Setas -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"> </span>
							</a>
							
							
							
							
						</div>
					</div>
					
					<?php }else{ ?>
					
					<div class="container home-modelos desktop">
						
						<div class="row">
							<?php
								// modelo principal, mais visitado de todos
								date_default_timezone_set("America/Sao_Paulo");
								//verifica tempo e tempo menos 7
								$tempo = gmdate("Y-m-d", strtotime("-7 days"));
								$hoje = gmdate("Y-m-d");
								$qry = "SELECT id, id_conteudo, tipo, COUNT(*) as conta FROM visita_conteudo WHERE id_conteudo NOT IN(86,272,273) AND tipo=1  AND data>'$tempo'  GROUP BY id_conteudo ORDER BY conta desc limit 1,9";
								$consulta = mysql_query($qry);
								$total = mysql_num_rows($consulta);
								$row = mysql_fetch_array($consulta);
								$query = "SELECT * FROM `modelos` WHERE id='$row[id_conteudo]' AND status='Ativo' LIMIT 1";
								$cons = mysql_query($query);
								$linha = mysql_fetch_array($cons);
							?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 home-modelo-mais-visitado">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="conteudoModelo">
										<a class="nome" href="<?php echo URL_VIP.'modelo/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
											<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
											<span class="nome-modelos"><?php echo utf8_encode($linha['nome'])?></span>
										</a>
										
										<a href="<?php echo URL_VIP.'modelo/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
											<img class="lazy home-modelo"  src="../imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $linha['modelo_perfil']?>" alt="imagem modelo">
										</a>
										<div class="home-fundo-nome-modelo-visitado">
											
											<a href="<?php echo URL_VIP.'modelo/'.$linha[id].'/'.URL_amigavel($linha[nome]) ?>">
												<h4 style="font-size: 23px; padding: 10px; margin: 0!important;">
												<?php echo utf8_encode($linha['nome'])?></h4>
											</a> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-8  espacamento-laterais-0">
								<?php while($dados_modelos = mysql_fetch_array($consulta)){ 
									//Consulta Modelos 
									$query_modelo ="SELECT * FROM `modelos` WHERE id=$dados_modelos[id_conteudo]    LIMIT 1"; 
									$consulta_modelo = mysql_query($query_modelo);
									$dados_modelo = mysql_fetch_array($consulta_modelo);
								?>
								<div class="col-sm-3">
									<div class="col-sm-12 espacamentos-0">
										<div class="conteudoModelo">
											<a class="nome" href="<?php echo URL_VIP.'modelo/'.$dados_modelo[id].'/'.URL_amigavel($dados_modelo[nome]) ?>">
												<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
												<span class="nome-modelos"><?php echo utf8_encode($dados_modelo['nome'])?></span>
											</a>
											<a href="<?php echo URL_VIP.'modelo/'.$dados_modelo[id].'/'.URL_amigavel($dados_modelo[nome]) ?>">
											<img class="lazy home-modelos" src="../imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo['modelo_perfil']?>" alt="imagem modelo"></a>
											<div class="home-fundo-nomes-modelos-visitados">
												<h4> 
													<a href="<?php echo URL_VIP.'modelo/'.$dados_modelo[id].'/'.URL_amigavel($dados_modelo[nome]) ?>">
														<p class="home-nomes-modelos-visitados"><?php echo utf8_encode($dados_modelo['nome'])?></p>
													</a> 
												</h4>
											</div>
										</div>
									</div>
								</div>
								<?php  }   ?>
							</div>
							<!-- /.row --> 
						</div>
					</div>
					
				<?php } ?>
				
				<!-- Botão Veja Mais -->
				
				<div class="col-lg-12 col-sm-12 bt-vejamais-desktop modelos">
					<h1 class="bt-vejamais"><a href="<?php echo URL_VIP ?>modelos.php">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
				
				
				
				<!-- Botão Veja Mais -->
				<div class="col-lg-12 col-sm-12 bt-vejamais-mobile">
					<h1 class="bt-vejamais"><a href="<?php echo URL_VIP ?>modelos.php">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
				</div>
				
				
				
				<!-- BANNER 05 
					<div class="row" style="float: left;width: 100%;">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
					<?php 
						
						/*$counter = 1;
							
							$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND posicao='5'  LIMIT 1 ";
							$consulta_banners  = mysql_query($query_banners);
							
							$dados_banners = mysql_fetch_array($consulta_banners);
							$total_banners = mysql_num_rows($consulta_banners);
							
							if ($detect->isMobile() AND $dados_banners['imagem_banner_mobile']) { 
							if($total_banners >= 0){ 
							?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
							
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="imagem banner mobile" width="100%">
							</a>
							<?php
							} } else {
							?>
							<?php 
							$counter = 1;
							if($total_banners >= 0){ ?>
							<a href="<?php echo $dados_banners[link].'"'.'target="'.$dados_banners[janela].'"'; ?>">
							
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="imagem banner" width="100%">
							</a>
							<?php
							} }
						*/
						
					?>
					</div>
					
					</div>
					
				<!-- FIM DO BANNER -->
				
				<?php
					// busca o id do usuarios logado
					$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='".$_SESSION['email_cliente_logado']."'";
					$consulta_user = mysql_query($query_user);
					$dados_user = mysql_fetch_array($consulta_user);
					
					$id_usuario = $dados_user[id];
					
					$query_consulta_favorito  = "SELECT * FROM `usuarios_favoritos` WHERE `id_usuario`='".$id_usuario."' LIMIT 6";
					$consulta_favorito = mysql_query($query_consulta_favorito);
					$total_favoritos = mysql_num_rows($consulta_favorito);
					
					
					if( $total_favoritos >= 1){ ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h1 class="home-titulo" style="border-left:0!important;padding-left:0!important" alt="icone pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px">
						CENAS QUE ME EXCITAM
					</h1>
					</div>
					
				<?php } ?>
				
				<div class="container">
					<?php
						
						while($dados_favorito = mysql_fetch_array($consulta_favorito)){
							$query_consulta_video_favorito  = "SELECT * FROM `cenas` WHERE `id`='".$dados_favorito['id_conteudo']."' LIMIT 6" ;
							$consulta_video_favorito = mysql_query($query_consulta_video_favorito);
							while($videos_favorito = mysql_fetch_array($consulta_video_favorito)){ ?>
							
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6  home inicial_box_conteudo">
								
								
								<div>                                   
									<a href="<?php echo URL_VIP.'cena/'.$videos_favorito[id].'/'.URL_amigavel($videos_favorito[titulo]) ?>" class="<?php if($videos_favorito[video_preview] != '') echo ' item-video '; if($videos_favorito[video_preview_gif] != '') echo ' item-video-gif ' ;?>">
										<?php if ($detect->isMobile()) { ?>
											<img class="card-img-top-cenas" src="https://server2.hotboys.com.br/arquivos/<?php echo $videos_favorito[cena_lista]?>" alt="imagem cena favorita">
											<?php }else{ ?>
											<img class="lazy card-img-top-cenas" src="../imagens/icones/loading/loading-pimenta.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $videos_favorito[cena_lista]?>" alt="imagem cena favorita">
										<?php } ?>
										
										<?php                                           
											if($videos_favorito[video_preview] != '')
											{                 
											?>           
											
											<?php if ($detect->isMobile()) { ?>
												<?php }else{ ?>
												<span class="far fa-play-circle fa-5x" style="display:none"></span>
											<?php } ?>
											<video  width="100%" style="display:none" loop>                                                
												<source src="https://server2.hotboys.com.br/arquivos/<?php echo $videos_favorito[video_preview] ?>"type="video/mp4">
											</video>                                            
											<?php                                           
											}                                                                                      
											if($videos_favorito[video_preview_gif] != '') {                                            
											?>                                          
											
											<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $videos_favorito[video_preview_gif] ?>" alt="video preview">
											<?php           
											}                               
										?>                                                                          
									</a>                                    
									<div class="paginas-titulo-visualizacoes">                                      
										<h4 class="paginas-titulo">                                         
											<a href="<?php echo URL_VIP ?>cena.php?id=<?php echo $videos_favorito[id] ?>"><?php echo utf8_encode($videos_favorito['titulo'])?></a>                                            
											
											<div class="cenas-total-icones">
												
												
												<!-- 1 - Icone e texto - Visualizacao
												<div class="cenas-visualizacao">
													<i class="far fa-eye"></i> 
													<p class="texto">
														<?php echo number_format_short($linha['visualizacao'])?>
													</p>
												</div>-->
												
												<!-- 2 - Icone e texto - Duracao do video -->
												<?php 
													if($videos_favorito['tempo_de_duracao'] != ''){?>
													<div class="cenas-duracao-video">
														<i class="fab fa-youtube"></i>
														<p class="texto">
															<?php echo ($videos_favorito['tempo_de_duracao'])?>
														</p>
													</div>
												<?php } ?>
											</div>
										</h4>                                   
									</div>                    
								</div> 
							</div>          
							
						<?php } } ?>
						<?php
							
							if($total_favoritos >= 1){?>
							
							<div class="col-lg-12 col-sm-12 bt-vejamais-desktop">
								<h1 class="bt-vejamais"><a href="<?php echo URL_VIP ?>cenas-favoritas">MAIS FAVORITOS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
							</div> 
							
							
							<?php
							}
						?>
				</div>
				
				<!-- AQUI ENTRA O CAMPO COM SUGESTÃO DE CENAS PARA O CLIENTE -->
				<?php
					$query_user_sugestao="SELECT * FROM `visita_conteudo_tag` WHERE email_cliente=email_cliente";
					$consulta_user_sugestao=mysql_query($query_user_sugestao);
					$dados_user_sugestao=mysql_fetch_array($consulta_user_sugestao);
					
					if($dados_user_sugestao[email_cliente and id_conteudo] >= 10){
					?>
					
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
						<img src="<?php echo URL ?>imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px" alt="icone pimenta">SUAS ESCOLHAS, NOSSAS SUGESTÕES HOT
					</h1>
					
					<div class="container float-left">
						<?php 
							
							$query_sugestao="SELECT * FROM `cenas` WHERE tag_principal=tag_principal AND status='Ativo' ORDER BY RAND() LIMIT 3";
							$consulta_sugestao=mysql_query($query_sugestao);
							while($dados_sugestao=mysql_fetch_array($consulta_sugestao)){?>  
							
							<?php if ($detect->isMobile()) { ?>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
									
									<div>
										<a href="<?php echo URL_VIP.'cena/'.$dados_sugestao[id].'/'.URL_amigavel($dados_sugestao[titulo]) ?>">
											<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php
												if ($dados_sugestao[cena_home] != '') {
													echo $dados_sugestao['cena_home'];
													}else{
													echo '0_cena.jpg';
												}
											?>" alt="imagem cena mobile">
										</a>
										
										
										<div class="paginas-titulo-visualizacoes">
											<h4 class="paginas-titulo">
												
												<a href="<?php echo URL_VIP.'cena/'.$dados_sugestao[id].'/'.URL_amigavel($dados_sugestao[titulo])?>" class="titulo-contos-home">
													<?php echo utf8_encode($dados_sugestao['titulo'])?>
												</a>
												
												
												<div class="cenas-total-icones">
													
													<!-- 1 - Icone e texto - Visualizacao
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($linha['visualizacao'])?>
														</p>
													</div>-->
													
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($linha['tempo_de_duracao'] != ''){ ?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo ($linha['tempo_de_duracao']) ?>
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
										<a href="<?php echo URL_VIP.'cena/'.$dados_sugestao[id].'/'.URL_amigavel($dados_sugestao[titulo]) ?>" class="<?php if($dados_sugestao[video_preview] != '') echo 'item-video'; if($dados_sugestao[video_preview_gif] != '') echo ' item-video-gif' ?>">
											
											<img class="lazy card-img-top-cena" src="../imagens/icones/loading/fundo-contos.gif" data-src="//server2.hotboys.com.br/arquivos/<?php
												if ($dados_sugestao[cena_home] != '') {
													echo $dados_sugestao['cena_home'];
													}else{
													echo '0_cena.jpg';
												} ?>" alt="imagem cena">
												
												
												
												<?php
													if($dados_sugestao[video_preview] != '') {	
													?>
													<?php if ($detect->isMobile()) { ?>
														<?php }else{ ?>
														<span class="far fa-play-circle fa-5x" style="display:none"></span>
													<?php } ?>
													
													<video poster="<?php echo URL ?>imagens/icones/carregando.gif" width="100%" style="display:none" loop>
														<source src="//server2.hotboys.com.br/arquivos/<?php echo $dados_sugestao[video_preview] ?>" type="video/mp4">
													</video>
													<?php
													}
													if($dados_sugestao[video_preview_gif] != '') {	
													?>
													<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $dados_sugestao[video_preview_gif] ?>" alt="video preview">
													<?php
													}
												?>
										</a>
										<div class="paginas-titulo-visualizacoes">
											
											<h4 class="paginas-titulo">
												
												<a href="<?php echo URL_VIP.'cena/'.$dados_sugestao[id].'/'.URL_amigavel($dados_sugestao[titulo])?>" class="titulo-contos-home">
													<?php echo utf8_encode($dados_sugestao['titulo']) ?>
												</a>
												
												<div class="cenas-total-icones">
													
													<!-- 1 - Icone e texto - Visualizacao
													<div class="cenas-visualizacao">
														<i class="far fa-eye"></i> 
														<p class="texto">
															<?php echo number_format_short($linha['visualizacao'])?>
														</p>
													</div>-->
													
													<!-- 2 - Icone e texto - Duracao do video -->
													<?php 
														if($dados_sugestao['tempo_de_duracao'] != ''){ ?>
														<div class="cenas-duracao-video">
															<i class="fab fa-youtube"></i>
															<p class="texto">
																<?php echo ($dados_sugestao['tempo_de_duracao'])?>
															</p>
														</div>
													<?php } ?>
												</div>
												
											</h4>
											
										</div>
										
									</div>
									
								</div>
							<?php } ?>
						<?php } ?>
						
					</div><!-- Fim do container --> 
					
				<?php } ?>
				
			</div>
			
			
		<?php } ?>
		
	</div>
	
	
	<!-- FOOTER (Include) -->
	<?php include ('../includes/footer.php') ?>
	
	<!-- JAVASCRIPTS PADROES (Include) -->
	<?php 
		if ($detect->isMobile()) { 
			include ('../includes/javascript-mobile.php'); 
			}else{
			include ('../includes/javascript.php'); 
		}
	?>
	
	
	
	<script src="<?php echo URL ?>js/jquery.modalLink-1.0.0.js"></script>
	
	<?php
		if($AbrirIframePagamento){
		?>
		<a id="iframe-gpagamentos" data-fancybox data-type="iframe" data-src="https://www.gpagamentos.com.br/1/iframe.php?id=<?php echo $id_email_gpagamentos ?>" href="javascript:void(0);" style="display:none"></a>
		<script>
			$(document).ready(function() { 
				$('[data-fancybox]').fancybox({
					iframe : {
						css : {
							width : '100%'
						}
					},
					toolbar : true,
					buttons : [						
					'close'
					],
				})
				
				$('#iframe-gpagamentos').trigger('click');
			});
		</script>
	<?php } ?>	
	
	<!-- Javascripts - Carousel Mobile de Modelos -->
	<script>
		jQuery3211(document).ready(function ($) {
			$(function() {
				
				$('#myCarousel').carousel({
					interval: 4000,
					cycle: true
				})
				console.log($('#myCarousel .item'))
				$('#myCarousel .item').each(function() {
					
					var next = $(this).next();
					console.log(next);
					if (!next.length) {
						next = $(this).siblings(':first');
					}
					next.children(':first-child').clone().appendTo($(this));
					
					if (next.next().length > 0) {
						next.next().children(':first-child').clone().appendTo($(this));
						} else {
						$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
					}
				})
			})
		});
		
	</script>
</body>
</html>	