<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	$naoVerificarPagamento = true;
	
	// tras id
	$id = addslashes($_GET[id]);
	
	$query_serie = "SELECT * FROM `cena_serie_info` WHERE `exibicao` IN ('Todos','Vip') AND status='Ativo' AND id='$id' LIMIT 1 ";
	$consulta_serie = mysql_query($query_serie);
	$row_serie = mysql_fetch_array($consulta_serie);
    $ordem = $row_serie[ordem];
	
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
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

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Hot Boys O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip serie">
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
                    <div class="app-main__inner">
						
						<!-- ## INICIO background da cena ##-->
						<?php 
							if($row_serie['imagem_serie_background'] != ''){ ?>
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background"] ?>" style="width:100%;vertical-align:text-top;padding-right:10px">
						<?php } ?>
						<?php 
							if($row_serie['imagem_serie_background_png'] != ''){ ?>
							<!-- Imagem PNG no fundo da serie (Final da imagem) -->
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background_png"] ?>" style="width:100%;vertical-align: top;padding-right:10px"/>
						<?php } ?>
						<!-- ## FIM background da cena ##-->
						
						<div class="conteudoTudo"> 
							
							<div class="app-page-title">
								<div class="page-title-wrapper">
						
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
									<h4 class="modelo-nome" style="margin-top:20px;text-align: center;"><?php echo utf8_encode(ucfirst($row_serie[titulo])); ?></h4>
								</div> 
								
								
								<!-- CONSULTA DA TABELA CENA_SERIE_INFO -->
								<!-- Inicio da div da CENA SERIE -->
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" align="center" style="background:none">
									
									<?php // verifica se existe video code
										if($row_serie[teaser_code] != ''){?>
										
										<div class="col-lg-12 col-md-9" style="float: none">
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
					</div>
				</div>
			<?php  } ?>
			

			<!-- Descricao da serie -->
			<div class="row" style="float:left;width:100%;margin-top: 85px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					
					
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 center cena-apresentacao-texto"> 
						<?php echo utf8_encode($row_serie[descricao]); ?>
						<!-- FIM Descricao da serie -->
						
						
					</div>
				</div>
			</div>

			
			<!-- titulo cenas dessa serie -->
			<div class="row" style="float:left;width:100%;margin-top: 85px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<h4 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>CENAS DESSA SÉRIE
					</h4>
				</div>
			</div>
			
			<!-- conteudo cenas dessa serie -->
			<div class="row" style="float:left;width:100%;">
				<?php 
					$query="SELECT * FROM `cenas` WHERE cenas_serie=$row_serie[id] AND exibicao='todos' AND  status='Ativo' order by id $ordem ";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row_serie=mysql_fetch_array($consulta))	{		
					?> 
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
						<div>
							<a href="<?php echo URL_VIP.'cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo]) ?>" class="<?php if($row_serie[video_preview] != '') echo ' item-video '; if($row_serie[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php
									if ($row_serie[cena_home] != '') {
										echo $row_serie['cena_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="" style="width:100%;">
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
								<h5 class="paginas-titulo" style="text-align:center;">
									<a href="<?php echo URL_VIP.'cena/'.$row_serie[id].'/'.URL_amigavel($row_conteudo[titulo])?>" class="titulo-contos-home">
										<?php echo utf8_encode($row_serie['titulo'])?>
									</a>
									<div class="cenas-total-icones">
										
										<!-- 1 - Icone e texto - Visualizacao-->
										<?php
										/*	<div class="cenas-visualizacao" style="border-right:0!important">
											<i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($row_serie['visualizacao'])?>
											</p>
										</div>
										*/
										?>
									</div>		
								</h5>
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
			<div class="row" style="float:left;width:100%;margin-top: 85px;">
				<div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 center cena-apresentacao-texto"> 
					<h4 class="cena-elenco-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
					Elenco dessa série</h4>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto margin-top-10 p-0" style="display: inline-flex;">	 
						
						<?php  
							while($elenco = mysql_fetch_array($consulta_elenco)){
								
								$query_modelo = "SELECT * FROM `modelos` WHERE id=$elenco[id_modelo]";
								$consulta_modelo = mysql_query($query_modelo);
								$modelo = mysql_fetch_array($consulta_modelo);
								
								// verifica se modelo pode ter perfil	
								if($modelo[exibicao] =='Todos') { ?>																
								
								
								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 nomes-elencos-cena espacamentos-3">
									<a href="<?php echo URL_VIP.'modelo/'.$modelo[id].'/'.URL_amigavel($modelo[nome])?>">  
										<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php if ($modelo['modelo_perfil'] !=''){echo $modelo['modelo_perfil'];}else{ echo $modelo['foto_principal'];}?>" alt="" style="width:100%;">
									</a>
									<div class="paginas-titulo-visualizacoes">
										<h6 class="nome-modelos-elenco" style="text-align:center;padding:6px;">
											
											<a href="<?php echo URL_VIP.'modelo/'.$modelo[id].'/'.URL_amigavel($modelo[nome])?>"> 
												<?php echo utf8_encode($modelo['nome'])?>
											</a> </h6>
									</div>
								</div>
								
								
							<?php } } // fim do da verificação dos modelos ?>
					</div>
				</div>
			</div><!-- final - elenco da serie --> 
			

			<!-- outras series -->
			<div class="row" style="float:left;width:100%;margin-top: 85px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<h4 class="cena-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span>
						OUTRAS SÉRIES QUE VOCÊ PODE GOSTAR
					</h4>
				</div>
			</div>
			
			
			
			<!-- conteudo - sugere outras series -->
			<div class="row" style="float:left;width:100%;margin-bottom: 85px;">
				<?php 
					$query="SELECT * FROM `cena_serie_info` WHERE status='Ativo' AND exibicao='todos' AND id<>'$id' order by RAND() LIMIT 3";
					$consulta=mysql_query($query);
				?>
				<?php
					while ($row_serie=mysql_fetch_array ($consulta))	{		
					?> 
					
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inicial_box_conteudo">
						<div>
							<a href="<?php echo URL_VIP.'serie-cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo]) ?>" class="<?php if($row_serie[video_preview] != '') echo ' item-video '; if($row_serie[video_preview_gif] != '') echo ' item-video-gif ' ?>">
								<img class="card-img-top-cena" src="//server2.hotboys.com.br/arquivos/<?php
									if ($row_serie[imagem_serie_home] != '') {
										echo $row_serie['imagem_serie_home'];
										}else{
										echo '0_cena.jpg';
									}
								?>" alt="" style="width:100%;">
								
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
								<h5 class="paginas-titulo" style="text-align:center;">
									<a href="<?php echo URL_VIP.'serie-cena/'.$row_serie[id].'/'.URL_amigavel($row_serie[titulo])?>" class="titulo-contos-home">
										<?php echo utf8_encode($row_serie['titulo'])?>
									</a>
									<div class="cenas-total-icones">
										
									<?php /*	<!-- 1 - Icone e texto - Visualizacao-->
										<div class="cenas-visualizacao" style="border-right:0!important">
											<i class="far fa-eye"></i> 
											<p class="texto">
												<?php echo number_format_short($row_serie['visualizacao'])?>
											</p>
										</div>
										*/
									?>
									</div>
									
								</h5>
							</div>
							
						</div>
					</div>
				<?php } ?>
				
			</div><!-- FIM conteudo - sugere outras series -->
			
				
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
			
			<!-- FOOTER (Include) -->
			<?php include ('includes/estrutura/rodape/footer.php')?>	
			
				
			<?php 
			/*  <!-- JAVASCRIPTS PADROES (Include) -->
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}*/
			?>
			
			<?php 
				// acrescenta +1 na visita.
				$query_visita = mysql_query("UPDATE cena_serie_info SET visualizacao = visualizacao + 1 WHERE id ") or die(mysql_error());
			?>			
			
			<!-- jQuery versao 3.2.1 -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<!-- Javascript versao Fancybox 3.2.1 -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>

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