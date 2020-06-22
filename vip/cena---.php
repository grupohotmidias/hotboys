<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	// Comentarios da cena
	$comment = '../novo-projeto/includes/recursos/comentarios.php';
	
	$naoVerificarPagamento = true;

	
	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento esta ok	
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
	
	//imagem do perfil
	if($vip == true){ 
		if($dados_user['foto_perfil'] == ''){
			//não tem foto de perfil
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';		
			} else {
			//tem foto de perfil
			//$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';	
		}
	}
	$id_usuario = $dados_user[id];
	
	// tras id
	$id = addslashes($_GET[id]);
	$id_serie = addslashes($_GET[id_serie]);
	
	//pagina para comentario	
	$pg ='video' ;	
	$query = "SELECT * FROM `cenas` WHERE status='Ativo' AND id=$id";
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
	$query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
	
	$query = "INSERT INTO `visitou_agora` (
	`id` ,
	`id_conteudo` ,
	`exibicao`,
	`date` 
	) VALUES (
	NULL ,
	'$dados_conteudo[id]',
	'$dados_conteudo[exibicao]',
	NOW()
	)";
	$status = mysql_query($query)or die(mysql_error());	  
	$query = "delete visitou_agora.* from visitou_agora
    left join (
	select id, 'sim' as manter 
	from visitou_agora
	order by id desc
	limit 24) 
	as v2 on v2.id = visitou_agora.id
	where v2.manter is null;";	
	$status = mysql_query($query)or die(mysql_error()); 
	
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
	
	mysql_query ("INSERT INTO visita_conteudo (`id`, `id_conteudo`, `tipo`, `data`) 
	VALUES (NULL , '$id',           '2',  NOW())") or die(mysql_error());
	
	// Favoritos
	if($_POST[favorito]=='cadastrar'){
		
		//cadastra aos favoritos se clicado
		mysql_query ("INSERT INTO usuarios_favoritos (
		`id` ,
		`id_conteudo` ,
		`id_usuario`,
		`tipo`
		) VALUES (
		
		NULL , '$id', $id_usuario, 'Cena')") or die(mysql_error());
	}
	
	if($_POST[favorito]=='remover'){
		
		$query_fav_del = "DELETE FROM usuarios_favoritos WHERE `id_conteudo`='$id'";
		
		$status = mysql_query($query_fav_del);
	}
	
	// tras dados de favoritos
	$query_fav = "SELECT * FROM `usuarios_favoritos` WHERE `id_conteudo`='$id' AND `id_usuario`='$id_usuario'";
	$consulta_fav = mysql_query($query_fav);
	$total_fav = mysql_num_rows($consulta_fav);
	$dados_fav = mysql_fetch_array($consulta_fav);
	
	if($dados_conteudo[descricao_content]=="") {
		$texto = $dados_conteudo[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $dados_conteudo[descricao_content];
		$description = substr($texto ,0);
	}
	
	// associador de cenas para mostrar o elenco
	$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco = mysql_query($query_elenco); 
	$total_elenco = mysql_num_rows($consulta_elenco);
	
	//consulta associador de cenas onde busca id da cena e dos modelos associados 
	$query_associador_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena='$id' order by id ";
	$consulta_associador_elenco = mysql_query($query_associador_elenco);
	$total_associador_elenco = mysql_num_rows($consulta_associador_elenco);
	
	
	$query_cenas_categoria="SELECT * FROM `cenas` WHERE tag_principal='$dados_conteudo[tag_principal]' AND id!='$id' AND status='Ativo' ORDER BY RAND() LIMIT 3";
	$consulta_cenas_categoria=mysql_query($query_cenas_categoria);
	$total_cenas_categoria = mysql_num_rows($consulta_cenas_categoria);
	
	//comentario da cena
	$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";
	$consulta_comentario = mysql_query($query_comentario);
	$total_comentario = mysql_num_rows($consulta_comentario);
?>


<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 <?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?> - Vídeos - Site HotBoys </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- CSS do comentario -->
		<link href="<?php echo URL ?>novo-projeto/assets/css/comentarios.css?v=<?php echo Version; ?>" rel="stylesheet">
		
	</head>
	
	<body class="vip">
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
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							<div class="app-page-title">
							<div class="col-lg-9" style="margin:0 auto;padding:0;text-align: center;">
								<div class="page-title-wrapper">
									
									<!-- Titulo do conteudo -->
									<div class="page-title-heading">
										<h5><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?></h5>
									</div>
									</div>
								</div>
							</div> 
							
							<!-- Main Content -->
							<div id="content">
								
								<!-- Video -->
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia">
									<div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0">
										<div class="video-sprout">
											<?php echo $dados_conteudo[video_code]; ?>
										</div>
									</div>
								</div>
								
								<div class="col-lg-9" style="margin:0 auto;padding:0;">
								
								<!-- Descricao da cena-->
								<div class="col-12 descricao-cena">
									<?php echo utf8_encode($dados_conteudo[descricao]); ?>
								</div>
								
								</div>
								
								
								<!-- Elenco da cena -->
								<?php if($total_elenco != ''){ ?>
									<section class="modelos elenco m-0">
										<div class="container-fluid p-0">
											
											<!-- Titulo - elenco da cena -->
											
											<div class="app-page-title">
												<div class="page-title-wrapper">
													
													<!-- Titulo do conteudo -->
													<div class="page-title-heading">
														<h5>Elenco</h5>
													</div>
													
												</div>
											</div>
											
											
											<!-- Modelos - elenco da cena -->
											<div class="row m-0">
												
												<!-- CENAS -->
												<ul style="width:100%">
													<!-- Consulta cenas -->
													<?php  
														while($elenco = mysql_fetch_array($consulta_elenco)){
															
															$query_modelo = "SELECT * FROM `modelos` WHERE id=$elenco[id_modelo]";
															$consulta_modelo = mysql_query($query_modelo);
															$modelo = mysql_fetch_array($consulta_modelo);
															
															// verifica se modelo pode ter perfil	
															if($modelo[exibicao] =='Todos'){ ?>	
															
															<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
																<a href="<?php echo utf8_encode(URL_VIP.'ator/'.$modelo[id].'/'.URL_amigavel($modelo[nome])) ?>">
																	<div class="card pb-0 box-shadow my-xl-2">
																		
																		<!-- imagens dos modelos -->
																		<div class="thumb mb-0">
																			<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($modelo[modelo_perfil]) ?>" data-holder-rendered="true">
																		</div>
																		
																		<!-- nomes dos modelos -->
																		<div class="card-body">
																			<h1 class="card-titulo"><?php echo utf8_encode($modelo['nome'])?></h1>
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
								<?php } ?>
								
								<!-- Outras cenas do modelo  -->
								<section class="cenas cenasModelo mt-2">
									<?php while($dados_associador_elenco = mysql_fetch_array($consulta_associador_elenco)){ 
										//CONSULTA NA TABELA DE MODELOS
										$query_modelo_cenas = "SELECT * FROM `modelos` WHERE id=$dados_associador_elenco[id_modelo]  order by id DESC";								
										$consulta_modelo_cenas = mysql_query($query_modelo_cenas);								
										$total_modelo_cenas = mysql_num_rows( $consulta_modelo_cenas);
										$dados_modelo_cenas = mysql_fetch_array($consulta_modelo_cenas);
										
										$query_modelo_associador_cenas = "SELECT * FROM `associador_cenas` WHERE id_modelo=$dados_modelo_cenas[id] AND id_cena<>$id  order by RAND() LIMIT 4 ";				
										$consulta_modelo_associador_cenas = mysql_query($query_modelo_associador_cenas);
										$total_modelo_associador_cenas = mysql_num_rows($consulta_modelo_associador_cenas);	
									?>
									<div class="container-fluid p-0 float-left pb-3 mt-2" style="border-bottom:1px solid var(--black-dark)">
										
										<!-- Titulo - mais cenas do modelo  -->
										<div class="app-page-title">
											<div class="page-title-wrapper">
												
												
												<?php if($total_modelo_associador_cenas >= 1){ ?>
													<div class="page-title-heading">
														
														<h5>Mais cenas com <a href="<?php echo utf8_encode(URL_VIP.'ator/'.$dados_modelo_cenas[id].'/'.URL_amigavel($dados_modelo_cenas[nome])) ?>"><?php echo utf8_encode($dados_modelo_cenas['nome'])?>
														</h5>
														</div>
													<?php } ?>
													
													
												</div>
											</div>
											
											<ul>
												<?php 
													//while do segundo associador que pega id_modelo
													while($dados_modelo_associador_cenas = mysql_fetch_array($consulta_modelo_associador_cenas)){
														$query_cena_elenco = "SELECT * FROM `cenas` WHERE id=$dados_modelo_associador_cenas[id_cena]  AND cena_home<>'' AND status='Ativo' ";
														$consulta_cena_elenco = mysql_query($query_cena_elenco);										
														$total_cena_elenco = mysql_num_rows($consulta_cena_elenco);	
														$dados_cena_elenco = mysql_fetch_array($consulta_cena_elenco);
														if($dados_cena_elenco != ''){ 
														?>
														<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
															<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$dados_cena_elenco[id].'/'.URL_amigavel($dados_cena_elenco[titulo])) ?>">										
																<div class="card pb-0 box-shadow my-xl-2">
																	
																	<!-- imagem da cena -->
																	<div class="thumb mb-0">
																		<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_cena_elenco['cena_home'] ?>" data-holder-rendered="true">
																	</div>
																	
																	<div class="card-body">
																		<h1 class="card-titulo"><?php echo utf8_encode($dados_cena_elenco['titulo'])?></h1>
																	</div>
																	
																</div>
															</a>
														</li>
													<?php } }  ?>
											</ul>
										</div>
									<?php } ?>
									</section>
									
									
									<!-- Voce pode gostar dessa categoria  -->
									<section class="cenas cenasCategoria">
										<div class="container-fluid p-0 float-left mt-3">
											
											<!-- Titulo - mais cenas do modelo  -->
											<?php if( $total_cenas_categoria >= 1){?>
												<div class="app-page-title">
													<div class="page-title-wrapper">
														<div class="page-title-heading">
															<h5>Você pode gostar de cenas dessa categoria</h5>
														</div>
														
													</div>
												</div>
											<?php } ?>
											
											<ul>
												<?php while ($dados_sugestao=mysql_fetch_array ($consulta_cenas_categoria)){ ?>
													<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
														<a href="<?php echo utf8_decode(URL_VIP.'cena/'.$dados_sugestao[id].'/'.URL_amigavel($dados_sugestao[titulo])) ?>">										
															<div class="card pb-0 box-shadow my-xl-2">
																
																<!-- imagem da cena -->
																<div class="thumb m-0">
																	<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_sugestao['cena_home'] ?>" data-holder-rendered="true">
																</div>
																
																<div class="card-body">
																	<h1 class="card-titulo"><?php echo utf8_encode($dados_sugestao['titulo'])?></h1>
																</div>
																
															</div>
														</a>
													</li>
												<?php } ?>
											</ul>
										</div>
									</section>
									
									<!-- Comentarios -->
									<div class="container-fluid p-0 float-left mt-3">
										<div class="app-page-title comentarios m-0">
											<div class="page-title-wrapper">
												
												<div class="page-title-heading">
													<?php if($total_comentario == 1){ ?>
														<h5 class="mb-0"> (1) Comentário nesta cena</h5>
														<?php }else{ ?>
														<h5 class="mb-0"><?php echo $total_comentario ?> Comentários nesta cena</h5>
													<?php } ?>
													
												</div>
												
											</div>
										</div>
										
										<?php include_once ($comment); ?>
									</div>
									
									<!-- Footer -->
							<?php include_once ($footer); ?>
							
								</div>
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