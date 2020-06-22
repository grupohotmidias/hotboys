<?php
	require('config/configuracoes.php');
	require_once('includes/funcoes.php');
	
	// tras id
	$id = addslashes($_GET[id]);
	
	$query_serie = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id' LIMIT 1 ";
	$consulta_serie = mysql_query($query_serie);
	$row_serie = mysql_fetch_array($consulta_serie);	
    
    $ordem = $row_serie[ordem];
	
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	$id_usuario = $dados_user[id];
	//cria um registro na tebela visita com data
	
	//1=modelo   2=cena 
	
    /////Consulta se essa cena já teve alguma visulização hoje
    $dataAtual=date('Y-m-d');
    $sql = mysql_query("SELECT * FROM `visita_cenas` WHERE `data` = '".$dataAtual."' AND `id_cenas` = '".$id."'");
    $resgistros = mysql_num_rows($sql);
	
    /////Se essa cena já tiver alguma visualização hoje, somamos mais uma visualização fazendo o update na tabela ... Afinal de contas a cena esta sendo visualizada nesse momento
    if($resgistros > 0){
        mysql_query("UPDATE `visita_cenas` SET `quatidade_visualizacao` = `quatidade_visualizacao` + 1 WHERE `data` = '".$dataAtual."' AND `id_cenas` = '".$id."'") or die(mysql_error());
		////Se essa cena ainda não teve visualização hoje, adicionamos a primeira visualização do dia, fazendo um insert na tabela
		}else{
        mysql_query ("INSERT INTO `visita_cenas` (`id`, `id_cenas`, `data`, `quatidade_visualizacao`) VALUES (NULL , '".$id."', '".$dataAtual."', '1')") or die(mysql_error());
	}
	
	mysql_query ("INSERT INTO visita_conteudo (`id`, `id_conteudo`, `tipo`, `data`) VALUES (NULL , '$id',     '2',  NOW())") or die(mysql_error());
	
	if($row_serie[descricaoContent]=="") {
		$texto = $row_serie[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $row_serie[descricaoContent];
		$description = substr($texto ,0,156);
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	
	<head>
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta charset="utf-8">
		<title>Hot Boys O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="<?=strip_tags($description);?>"> 
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script>
            $(document).ready(function() {
                setTimeout(function(){
                    request = $.ajax({
                        url: "https://www.hotboys.com.br/ajax/registrar-visitas.php",
                        type: "post",
                        data: {
                            'idConteudo':  '<?=$row_serie[id];?>',
                            'tipoConteudo':  'Cena',
                            <?php if($row_serie[tag_principal]!=""){?>
								'emailCliente':  '<?=$_SESSION[email_cliente_logado]?>',                            
								'tag': '<?=$row_serie[tag_principal];?>'
								<?php }else{ ?>
								'emailCliente':  '<?=$_SESSION[email_cliente_logado]?>'
							<?php }?>
						}
					});
				}, 30000);
			});
		</script>
		<!-- HEAD (Include) -->
		
		<?php include ('includes/head.php');?> 
		
		
	</head>
	
	<body id="body" class="fundo-preto">
		<div class="container">
			
			<!-- TOP (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include('includes/top.php') ?>
			</div>
			
			
			<!-- titulo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position: absolute;width:99%"> 
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important;color: #fff;text-shadow: 3px 1px 1px #100f0f;">
					<span class="icone-pimenta-titulo"></span>SÉRIE</h1>
				</div>
			</div>
			
			
			<!-- imagem de fundo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<?php 
						// Se existir imagem cadastrada, ela carrega
						if($row_serie['imagem_serie_background'] != ''){ ?>
						
						<!-- Imagem JPG no fundo da serie -->
						<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background"] ?>" style="width:100%;"/>
					<?php } ?>
					
					
					
					<?php 
						// Se existir imagem cadastrada, ela carrega
						if($row_serie['imagem_serie_background_png'] != ''){ ?>
						
						<!-- Imagem PNG no fundo da serie (Final da imagem) -->
						<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background_png"] ?>" style="width:100%;"/>
					<?php } ?>
				</div>
			</div>
			
			
			<!--  imagem de fundo mobile -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<div class="container" >
						<div class="row centralizada" >
							
							<!-- TÍTULO DA CENA -->
							<?php 
								// Se existir imagem cadastrada no fundo, nao tem margin-top no titulo
								if($row_serie['imagem_serie_background'] != ''){ ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe">
									<?php 
										// Caso nao tenha, o titulo tera margin-top no titulo
									}else{ ?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe" style="margin-top: 50px;">
									<?php } ?>
									<h4 class="modelo-nome" style="margin-top:20px"><?php echo utf8_encode(ucfirst($row_serie[titulo])); ?></h4>
								</div> 
								
								
								<!-- CONSULTA DA TABELA CENA_SERIE_INFO -->
								<!-- Inicio da div da CENA SERIE -->
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" align="center" style="background:none">
									
									<?php // verifica se existe video code
										if($row_serie[teaser_code] != ''){?>
										
										<div class="col-lg-9 col-md-9" style="float: none">
											<div class="video-sprout">
												<?php echo $row_serie[teaser_code]; ?>
											</div>
										</div>
										
										<?php }else{ ?>
										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php echo $row_serie['imagem_serie_home'];?>"/>
									<?php } ?>
								</div>	<!-- FIM DA DIV DA CENA SERIE -->
								
								
								
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			
			
			<!--## INICIO - Div centraliza para receber os icones abaixo do video ##-->
			<?php if($row_serie[teaser_code] != '') { ?>
				<div class="row" style="float:left;width:100%">
					
					
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 mx-auto text-justify cena-apresentacao-texto padding-0">
						
						<div class="col-lg-12 col-md-12 col-xs-12 conteudo-assine-ja">
							<a href="<?php echo URL ?>assine">
								<div class="col-lg-9 col-md-9 col-xs-12">
									Assine já
								</div>
							</a>
							<div class="col-lg-3 col-md-3 col-xs-12" style="background-color:#8b081a;text-align:center;margin:0 auto;float:right;display:flex;"> 
								<div class="cena-total-icones" style="float: none!important;margin: 0 auto;display: flex;background-color: #8b081a;color: white;">
									
									<!-- 1 - Icone e texto - Visualizacao-->
									<div class="cena-visualizacao" style="border-right: 1px solid #ffffff66!important;">
										<i class="fas fa-eye"></i> 
										<span class="texto">
											<?php echo number_format_short($dados_conteudo['visualizacao'])?>
										</span>
									</div>
									
									<!-- 2 - Icone e texto - Comentario-->
									<div class="cena-comentarios">
										<i class="far fa-comment-dots"></i> 
										
										
										
										<span class="texto">
											<?php
												$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";
												$consulta_comentario = mysql_query($query_comentario);
												$total_comentario = mysql_num_rows($consulta_comentario);
												echo $total_comentario;
											?>
										</span>
									</div>
									
									
								</div>
							</div>
						</div>
						
						
					</div>
					
				</div>
			<?php  } ?>
			
			
			
			<!-- Descricao da serie -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					
					
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 center cena-apresentacao-texto"> 
						<?php echo utf8_encode($row_serie[descricao]); ?>
						<!-- FIM Descricao da serie -->
						
						
					</div>
				</div>
			</div>
			
			<!-- titulo cenas dessa serie -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>CENAS DESSA SÉRIE
					</h1>
				</div>
			</div>
			
			
			
			<!-- conteudo cenas dessa serie -->
			<div class="row" style="float:left;width:100%">
				<?php 
					$query="SELECT * FROM `cenas` WHERE cenas_serie=$row_serie[id] AND exibicao='todos' AND  status='Ativo' order by id $ordem ";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row_serie=mysql_fetch_array($consulta))	{		
					?> 
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
						<div>
							<a href="<?php echo URL.'cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo]) ?>" class="<?php if($row_serie[video_preview] != '') echo ' item-video '; if($row_serie[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php
									if ($row_serie[cena_home] != '') {
										echo $row_serie['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="">
								<?php
									if($row_serie[video_preview] != '') {
									?>
									<span class="far fa-play-circle fa-5x" style="display:none"></span>
									<video width="100%" style="display:none" loop>
										<source src="//server2.hotboys.com.br/arquivos/<?php echo $row_serie[video_preview] ?>" type="video/mp4">
									</video>
									<?php 									} ?>
									<?php

									if($row_serie[video_preview_gif] != '') {
									?>
									<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $row_serie[video_preview_gif] ?>"><?php
									}
								?>
							</a>
							
							<div class="paginas-titulo-visualizacoes">
								<h4 class="paginas-titulo">
									<a href="<?php echo URL.'cena/'.$row_serie[id].'/'.URL_amigavel($row_conteudo[titulo])?>" class="titulo-contos-home">
										<?php echo utf8_encode($row_serie['titulo'])?>
									</a>
									<div class="cenas-total-icones">
										
										<!-- 1 - Icone e texto - Visualizacao-->
										<div class="cenas-visualizacao" style="border-right:0!important">
											<i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($row_serie['visualizacao'])?>
											</p>
										</div>
									</div>		
								</h4>
							</div>
						</div>
					</div>
					
				<?php } ?>
			</div>
			
			
			
			<!-- elenco da serie -->
			<?php
				//CONSULTA ELENCO DA SÉRIE 
				$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_serie='$id' order by id ASC";
				$consulta_elenco = mysql_query($query_elenco); 
			?>
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 center cena-apresentacao-texto"> 
					<h1 class="cena-elenco-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
					Elenco dessa série</h1>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto margin-top-10 padding-side-0">	 
						
						<?php  
							while($elenco = mysql_fetch_array($consulta_elenco)){
								
								$query_modelo = "SELECT * FROM `modelos` WHERE id=$elenco[id_modelo]";
								$consulta_modelo = mysql_query($query_modelo);
								$modelo = mysql_fetch_array($consulta_modelo);
								
								// verifica se modelo pode ter perfil	
								if($modelo[exibicao] =='Todos') { ?>																
								
								
								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 nomes-elencos-cena espacamentos-3">
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelo[id].'/'.URL_amigavel($modelo[nome])) ?>">  
										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php if ($modelo['modelo_perfil'] !=''){echo $modelo['modelo_perfil'];}else{ echo $modelo['foto_principal'];}?>" alt="">
									</a>
									<div class="paginas-titulo-visualizacoes">
										<h4 class="nome-modelos-elenco">
											
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelo[id].'/'.URL_amigavel($modelo[nome])) ?>"> 
												<?php echo utf8_encode($modelo['nome'])?>
											</a> </h4>
									</div>
								</div>
								
								
							<?php } } // fim do da verificação dos modelos ?>
					</div>
				</div>
			</div><!-- final - elenco da serie --> 
			
			
			
			<!-- outras series -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<h1 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						OUTRAS SÉRIES QUE VOCÊ PODE GOSTAR
					</h1>
				</div>
			</div>
			
			
			
			<!-- conteudo - sugere outras series -->
			<div class="row" style="float:left;width:100%">
				<?php 
					$query="SELECT * FROM `cena_serie_info` WHERE status='Ativo' AND exibicao='todos' AND id<>'$id' order by RAND() LIMIT 3";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row_serie=mysql_fetch_array ($consulta))	{		
					?> 
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
						<div>
							<a href="<?php echo URL.'serie-cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo]) ?>" class="<?php if($row_serie[video_preview] != '') echo ' item-video '; if($row_serie[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php
									if ($row_serie[imagem_serie_home] != '') {
										echo $row_serie['imagem_serie_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="">
								
								<?php
									if($row_serie[video_preview] != '') {
									?>
									<span class="far fa-play-circle fa-5x" style="display:none"></span>
									<video width="100%" style="display:none" loop>
										<source src="//server2.hotboys.com.br/arquivos/<?php echo $row_serie[video_preview] ?>" type="video/mp4">
									</video>
									<?php
										} ?>
									<?php
									if($row_serie[video_preview_gif] != '') {
									?>
								<img style="display:none" class="preview-video-gif" src="//server2.hotboys.com.br/arquivos/<?php echo $row_serie[video_preview_gif] ?>">
								<?php } ?>
							</a>
							
							<div class="paginas-titulo-visualizacoes">
								<h4 class="paginas-titulo">
									<a href="<?php echo URL.'serie-cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo])?>" class="titulo-contos-home">
										<?php echo utf8_encode($row_serie['titulo'])?>
									</a>
									<div class="cenas-total-icones">
										
										<!-- 1 - Icone e texto - Visualizacao-->
										<div class="cenas-visualizacao" style="border-right:0!important">
											<i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($row_serie['visualizacao'])?>
											</p>
										</div>
										
									</div>
									
								</h4>
							</div>
							
						</div>
					</div>
				<?php } ?>
				
			</div><!-- FIM conteudo - sugere outras series -->
		</div>
			
			<!-- Comentários (Include) -->
			<?php include ('includes/comentarios-vip.php'); ?>
			
			<!-- FOOTER (Include) -->
			<?php include ('includes/footer.php')?>
			
			<!-- JAVASCRIPTS PADROES (Include) -->					
			<?php 
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}
			?>
			
			<?php 
				// acrescenta +1 na visita.
				$query_visita = mysql_query("UPDATE cena_serie_info SET visualizacao = visualizacao + 1 WHERE id ") or die(mysql_error());
			?>			
			
			<!-- jQuery versao 3.2.1 -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<!-- Javascript versao Fancybox 3.2.1 -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
			
		
	</body>
	
</html>

