<?php
	//require('../traducao/traducoes.php');
	//verifica_url_traducao();
	require('config/configuracoes.php');
	require_once('includes/funcoes.php');

	//Palavra da busca
	$palavra = addslashes(utf8_decode($_GET['s']));  
	if ($_GET["s"] != ''){
		$sData = date('d/m/Y');
		$sHora = date('H:i:s');
		$sql = "INSERT INTO `buscas`(`id`, `palavra_chave`, `site`, `data`, `hora`, `id_usuario`) VALUES (NULL,'$palavra','pt','$sData','$sHora','FREE')";
		$insere_busca = mysql_query($sql);
	}

	if ($_GET["s"] != ''){ 
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
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once 'mobili/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<title><?php echo ucfirst($palavra) ?> - BUSCA - HOTBOYS </title> 
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafu?u, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php')?>
	</head>
	<body id="body" class="fundo-preto">
		<!-- TOP (Include) -->
		<?php include ('includes/top2.php')?>
		<div class="row" style="margin-top:15px;float: left;width: 100%;text-align: center;">
		<div class="text-justify col-lg-12 col-md-12 col-sm-12 col-xs-12 texto-pagina-busca">
			<div class="container container-table">
				<?php if($result1 >= 1){ ?>	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe">
					<p>Encontramos <?php echo $result ?> resultados para '<?php echo utf8_encode($palavra); ?>'</p>
				</div>
				<?php }else{ ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe">
					<p>Sem resultado de cena(s) para esta busca</p>
				</div>
				<div style="min-height: 300px;float: left;background-color:#ffffff"></div>
				<?php } ?>
			</div>
			</div>
			</div>
			<!-- Conte?do - Cenas -->
			<?php 
				if($result1 >= 1){
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
					<span class="icone-pimenta-titulo"></span>CENAS</h1></div>'; ?>
				<div class="container" >
					<?php
						while($consulta_cena = mysql_fetch_array($consulta1)){
						?>
						<?php if ($detect->isMobile() AND $consulta_cena['cena_home_mobile']) { ?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  inicial_box_conteudo">
								<div> <a href="<?php echo URL.'cena/'.$consulta_cena[id].'/'.URL_amigavel($consulta_cena[titulo])?>">
									<img class="card-img-top-cenas" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($consulta_cena[cena_home_mobile] != ''){
											echo $consulta_cena['cena_home_mobile'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="cena lista mobile" />
								</a>
								<div class="paginas-titulo-visualizacoes">
									<h4 class="paginas-titulo">
										<a href="#"><?php echo utf8_encode($consulta_cena['titulo'])?></a>
									</h4>
							        <div class="cenas-total-icones">
                                        <!-- 1 - Icone e texto - Visualizacao
                                        <div class="cenas-visualizacao">
                                            <i class="far fa-eye"></i> 
                                            <p class="texto">
                                                <?php echo number_format_short($consulta_cena['visualizacao'])?>
                                            </p>
                                        </div>
										-->
										
                                        <!-- 2 - Icone e texto - Duracao do video -->
                                        <?php 
                                            if($linha['tempo_de_duracao'] != ''){?>
                                            <div class="cenas-duracao-video">
                                                <i class="fab fa-youtube"></i>
                                                <p class="texto">
                                                    <?php echo ($consulta_cena['tempo_de_duracao'])?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div>
								</div>
								</div>
							</div>
							<?php } else { ?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  inicial_box_conteudo">
								<div> 
								<a href="<?php echo URL.'cena/'.$consulta_cena[id].'/'.URL_amigavel($consulta_cena[titulo])?>" class="<?php if($consulta_cena[video_preview] != '') echo ' item-video '; if($consulta_cena[video_preview_gif] != '') echo ' item-video-gif ' ?>">
									<img class="card-img-top-cenas" src="https://server2.hotboys.com.br/arquivos/<?php 
										if($consulta_cena[cena_home] != ''){
											echo $consulta_cena['cena_home'];
											}else{
											echo '0_cena.jpg';
										}?>" alt="cena lista" />
												<?php
													if($consulta_cena[video_preview] != '') {
													?>
														<?php if ($detect->isMobile()) { ?>
															
														<?php }else{ ?>
													<span class="far fa-play-circle fa-5x"></span>
														<?php } ?>
													<video width="100%" style="display:none" loop>
														<source src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_cena[video_preview] ?>" type="video/mp4">
													</video>
													<?php
													}
													if($consulta_cena[video_preview_gif] != '') {
													?>
													<img style="display:none" class="preview-video-gif" src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_cena[video_preview_gif] ?>" alt="preview video"><?php
													}
												?>
								</a>
								<div class="paginas-titulo-visualizacoes">
									<h4 class="paginas-titulo">
										<a href="<?php echo URL.'cena/'.$consulta_cena[id].'/'.URL_amigavel($consulta_cena[titulo])?>" class="<?php if($consulta_cena[video_preview] != '') echo ' item-video '; if($consulta_cena[video_preview_gif] != '') echo ' item-video-gif ' ?>">
											<?php echo utf8_encode($consulta_cena['titulo'])?>
								        </a>
										</h4>
										<div class="cenas-total-icones">
                                        <!-- 1 - Icone e texto - Visualizacao
                                        <div class="cenas-visualizacao">
                                            <i class="far fa-eye"></i> 
                                            <p class="texto">
                                                <?php echo number_format_short($consulta_cena['visualizacao'])?>
                                            </p>
                                        </div>-->
										
                                        <!-- 2 - Icone e texto - Duracao do video -->
                                       	<?php 
                                            if($consulta_cena['tempo_de_duracao'] != ''){?>
                                            <div class="cenas-duracao-video">
                                                <i class="fab fa-youtube"></i>
                                                <p class="texto">
                                                    <?php echo ($consulta_cena['tempo_de_duracao'])?>
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
					}
				?> 
			</div>
			<!-- /.row -->
	<!-- /.container -->
	<?php
		if($result2 >= 1){
			echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="modelos-titulo" style="border-left:0!important;padding-left:0!important">
			<span class="icone-pimenta-titulo"></span>MODELOS</h1></div>'
		; ?>
		<!-- Conte?do - Cenas -->
		<div class="container">
			<div class="row">
				<?php while($consulta_modelo = mysql_fetch_array($consulta2)){  ?>
					<div class="col-lg-2  col-md-2 col-xs-6 inicial_box_modelos">
						<div>
							<?php if ($detect->isMobile() AND $consulta_modelo['modelo_perfil_mobile']) { ?>
								<a href="<?php echo URL.'modelo/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[nome])?>">
									<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_modelo['modelo_perfil_mobile']?>" alt="modelo perfil mobile">
								</a>
								<?php }else{ ?>
								<a href="<?php echo URL.'modelo/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[nome])?>">
									<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $consulta_modelo['modelo_perfil']?>" alt="modelo perfil">
								</a>
							<?php } ?>
							<div class="paginas-titulo-visualizacoes">
								<h4 class="nome-modelos-elenco">
									<a href="<?php echo URL.'modelo/'.$consulta_modelo[id].'/'.URL_amigavel($consulta_modelo[nome])?>"><p><?php echo utf8_encode($consulta_modelo['nome'])?></p></a>
									<!--<p class="card-text"><i class="far fa-eye" aria-hidden="true"></i> <?php //echo number_format_short($consulta_modelo['visualizacao'])?></p>-->
								</h4>
							</div>
						</div>
					</div>
					<?php }  
				} ?>
		</div>
	</div>
	<!-- /.container -->
	
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