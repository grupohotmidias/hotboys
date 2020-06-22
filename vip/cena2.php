<?php
	
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	// Comentarios da cena
	$comment = '../novo-projeto/includes/recursos/comentarios.php';
	
	$naoVerificarPagamento = true;
	
	require_once('../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
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
	/*if($vip == true){ 
		if($dados_user['foto_perfil'] == ''){
		//não tem foto de perfil
		$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';		
		} else {
		//tem foto de perfil
		//$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
		$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';	
		}
	}*/
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
	
	if($_POST[favorito]=='remover'){
		
		$query_fav_del = "DELETE FROM usuarios_favoritos WHERE `id_conteudo`='$id'";
		
		$status = mysql_query($query_fav_del);
	}
	
	// associador de cenas para mostrar o elenco
	$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco = mysql_query($query_elenco); 
	$total_elenco = mysql_num_rows($consulta_elenco);
	
	//consulta associador de cenas onde busca id da cena e dos modelos associados 
	$query_associador_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena='$id' order by id ";
	$consulta_associador_elenco = mysql_query($query_associador_elenco);
	$total_associador_elenco = mysql_num_rows($consulta_associador_elenco);
	
	
	$query_cenas_categoria="SELECT * FROM `cenas` WHERE tag_principal='$dados_conteudo[tag_principal]' AND id!='$id' AND status='Ativo' ORDER BY RAND() LIMIT 4";
	$consulta_cenas_categoria=mysql_query($query_cenas_categoria);
	$total_cenas_categoria = mysql_num_rows($consulta_cenas_categoria);
	
	//comentario da cena
	$query_comentario = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";
	$consulta_comentario = mysql_query($query_comentario);
	$total_comentario = mysql_num_rows($consulta_comentario);
	
	//BOTAO GOZEI -------------------------------------
	$gozei = addslashes($_POST["gozei"]);
	$data_hoje = date("Y-m-d H:i:s");
	$data_hoje_ts = geraTimestamp($data_hoje); // hoje em timestamp 
	
	//consulta todas gozadas do cliente
	$sql_gozei = mysql_query("SELECT * FROM `usuarios_gozei` WHERE id_user='$id_cliente' AND id_cena='$id'");
	$resultado_gozei  = mysql_fetch_assoc($sql_gozei);
	$total_gozei = mysql_num_rows($sql_gozei);
	
	
 	if($total_gozei <= 3 and $gozei !=''){ 
		
		$data_gozei_limite = geraTimestamp($resultado_gozei[data]) + 86400;
		
		if($data_hoje_ts > $data_gozei_limite){ 
			//insere gozada 
			mysql_query("INSERT INTO `usuarios_gozei`(
			`id`, 
			`id_cena`, 
			`id_user`, 
			`cliques`, 
			`data` 
			) VALUES ('null','$id','$id_cliente','$gozada','$data_hoje')");  
			
			$btn_gozei = 'Gozei !!! ';
			
			}else{
			$btn_gozei = 'Gozei Denovo... ';
		}	
		
		
		}else if($total_gozei >= 1){
		
		$btn_gozei = 'Cena Gostosa!!! '; 
		}else{
		$btn_gozei = 'Gozei '; 
	}	
	//-----------------------------------------
	
	//favoritar cena 
	
	$favoritar = addslashes($_POST["favoritar"]);
	
	$sql_cena_favoritos = mysql_query("SELECT * FROM `usuarios_favoritos` WHERE id_usuario='$id_cliente' AND id_conteudo='$id' AND tipo='Cena'");
	$resultado_cena_favorita = mysql_fetch_assoc($sql_cena_favoritos);
	$total_cena_favorita = mysql_num_rows($sql_cena_favoritos);
	
	if($total_cena_favorita <1 && !empty($favoritar)){ 
		
		$query = "INSERT INTO `usuarios_favoritos` (
		`id` ,
		`id_conteudo` ,
		`id_usuario` ,
		`tipo`
		) VALUES (
		NULL, 
		$id,
		$id_cliente,
		'Cena')"; 
		
		$status = mysql_query($query);
		
		if($status){
			//sucesso	
			//echo "<script>alert('Cena Favoritada com Sucesso!');</script>";
			//echo "<meta http-equiv='refresh' content='0'>";
			$msg_sucess = "Cena cadastrada com SUCESSO <i class='fas fa-thumbs-up'></i>";
			
			$btn_cena_fav = '<i class="fas fa-star fa-1x"></i>JÁ É FAVORITA';
			} else {
			//erro	
			echo "<script>alert('Erro ao Favoritar a Cena!');</script>";				
		}
		}else if($total_cena_favorita >= 1){
		$btn_cena_fav = '<i class="fas fa-star fa-1x"></i>JÁ É FAVORITA';
		}else{
		$btn_cena_fav = '<i class="fas fa-star fa-1x"></i> FAVORITAR';
	}		
	//----------------------------------------------------------------------------
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
		<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">

<style>
.container.gallery-container {
    background-color: #fff;
    color: #35373a;
    min-height: 100vh;
    padding: 30px 50px;
}

.gallery-container h1 {
    text-align: center;
    margin-top: 50px;
    font-family: 'Archivo Narrow', sans-serif;
    font-weight: bold;
}

.gallery-container p.page-description {
    text-align: center;
    margin: 25px auto;
    font-size: 18px;
    color: #999;
}

.tz-gallery {
    padding: 40px;
}

/* Override bootstrap column paddings */
.tz-gallery .row > div {
    padding: 2px;
}

.tz-gallery .lightbox img {
    width: 100%;
    border-radius: 0;
    position: relative;
}

.tz-gallery .lightbox:before {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -13px;
    margin-left: -13px;
    opacity: 0;
    color: #fff;
    font-size: 26px;
    font-family: 'Archivo Narrow';
    pointer-events: none;
    z-index: 9000;
    transition: 0.4s;
}


.tz-gallery .lightbox:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background-color: rgba(206, 46, 46, 0.7);
    content: '';
    transition: 0.4s;
}

.tz-gallery .lightbox:hover:after,
.tz-gallery .lightbox:hover:before {
    opacity: 1;
}

.baguetteBox-button {
    background-color: transparent !important;
}

</style>
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
							
							<?php if(!empty($msg_sucess)){ ?>
								<div class="container col-10" style="margin-top:20px">
									<div class="alert alert-success alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong> YES!</strong> <?= $msg_sucess ?> 
									</div>
								</div>
							<?php } ?>

				<!-- BANNER CENA --> 
				<div class="row" style="float:left;width:100%;margin-top:20px">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
			<?php 
				$counter = 1;
				
				$query_banners = "SELECT * FROM `banners_2018` WHERE status='Ativo' AND exibicao IN('Todos','Vip') AND posicao='click' LIMIT 1";
				$consulta_banners  = mysql_query($query_banners);
				
				$dados_banners = mysql_fetch_array($consulta_banners);
				$total_banners = mysql_num_rows($consulta_banners);
				
				if ($detect->isMobile()) { 
					if($total_banners >= 0){ 
					?>
						<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner_mobile'] ?>" alt="" width="100%">
					<?php
					} } else {
				?>
				<?php 
					$counter = 1;
					if($total_banners >= 0){ ?>
						<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_banners['imagem_banner'] ?>" alt="" width="100%">
				<?php  } }  ?>
		</div>
	</div>	<br>

							<div class="app-page-title">
								<div class="col-lg-9" style="margin:0 auto;padding:0;text-align: center;">
									<div class="page-title-wrapper" style="justify-content:center">
										<!-- Titulo do conteudo -->
										<div class="page-title-heading">
											<h1 class="text-center h1-titulo"><?php echo utf8_encode(ucfirst($dados_conteudo[titulo])); ?></h5>
										</div> 
										
									</div>
								</div>
							</div> 
							
							<!-- Main Content -->
							<div id="content">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" >  
                                    <div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#video-c" role="tab" data-toggle="tab">Vídeo Completo</a>
											</li>
											<?php if ($dados_conteudo[teaser_code] !=""){ ?>
												<li class="nav-item">
													<a class="nav-link" href="#video-t" role="tab" data-toggle="tab">Vídeo Teaser</a>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active show" id="video-c">
                                        <!-- Video -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" >
                                            <div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0">
                                                <div class="video-sprout">
                                                    <?php echo $dados_conteudo[video_code]; ?>
												</div>
											</div>
										</div>
									</div>
									<?php if ($dados_conteudo[teaser_code] !=""){ ?>
										<div role="tabpanel" class="tab-pane fade" id="video-t">
											<!-- Video -->
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia" >
												<div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0">
													<div class="video-sprout">
														<?php echo $dados_conteudo[teaser_code]; ?>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0;">
										
										
										<ul>
											<!-- Botao Gozei -->
											<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 bt_gozei" style="overflow: hidden;<?php if($detect->isMobile()){?>height: 40px;<?php }else{?>height: 60px;<?php }?>"> 
												
												<form action="" method="POST" style="position:relative;float:left;">
													
													<input type="hidden" name="gozei" value="1">
													<div><button type="submit">
													<div class="float-left" style="margin-top:6px;" >
													<div class="text" style="font-size:12px;">Se gozou com a cena clique. </div>
													<?= $btn_gozei ?> 
													</div>
													</button></div>
											
												</form>
											</li>
											
											
											<!-- Botao Favoritar -->
									<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 bt_favorito" style="overflow: hidden;<?php if($detect->isMobile()){?>height: 40px;<?php }else{?>height: 60px;<?php }?>">
												
												<?php 
													if ($total_fav =='') {
													?>
													<form action="" method="POST">
													<div><button type="submit">
														<input type="hidden" name="favoritar" value="1">
														<div class="float-left" style="margin-top:6px;" >
															<div class="text" style="font-size:12px;">Colocar como favorita?</div>
															
															<?= $btn_cena_fav ?>
														</div>
													
													</form>
													
													<?php }else{ ?>
													<div class="float-left align-middle">
														<div class="text">Esta cena está favoritada</div>
															<div style="color:var(--black);text-shadow:none;text-transform: uppercase">
															 <i class="fas fa-star fa-1x" style="color: yellow;text-transform: uppercase"></i> Favoritado
															</div>
													</div>
												<?php } ?>
												
											</li>
											
											<!-- Botao Comentar -->
											<li class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 bt_comentar d-none d-sm-block" style="overflow: hidden;height: 60px;" >
											<div><button type="submit">
												<div class="float-left" style="margin-top:6px;" >
												<div class="text" style="font-size:12px;">Quer comentar esta cena?</div>
												<div><a href="#comentarios">
												<i class="fas fa-comment-dots fa-1x"></i> Comentar</a>  
												</div>
												</div>
												</button>
											</div>
											</li>
										</ul> 
										
										
										
										
										
										<!-- Descricao da cena-->
										<div class="col-12 descricao-cena">
											<?php echo utf8_encode($dados_conteudo[descricao]); ?>
										</div>
										
									</div>
								</div>
								
								<!-- Fotos da cena -->
								<?php 
									$query_imagemcena_random="SELECT * FROM `imagens` WHERE tipo='Cena Hot' AND id_referencia=$id ORDER BY id";				
									$consulta_imagemcena_random=mysql_query($query_imagemcena_random);
									$total_imagemcena_random=mysql_num_rows($consulta_imagemcena_random);
								?>

								<?php if($total_imagemcena_random >= 1){ ?>
								<div class="row" style="float:left;width:100%">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h1 class="cena-titulo">
											<span class="icone-pimenta-titulo"></span>
										Fotos</h1>
									</div>
								</div>
								<?php } ?>
								<!-- Fotos das Cenas -->
								<div class="row" id="cena_fotos" style="float:left;width:100%">
							
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 inicial_box_conteudo" style="display:contents;float:left;">
									<div class="gallery">
									
											<div class="row">
									<?php
										while ($row_imagemcena_random=mysql_fetch_array ($consulta_imagemcena_random))	{		

										
										?>

										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 thumb foto p-0" style="overflow: hidden;height: 166px;">
											<a data-fancybox="gallery" href="//server2.hotboys.com.br/arquivos/<?php echo $row_imagemcena_random['imagem']?>">
												<img class="card-img-top-cena" style="width:100%;" src="//server2.hotboys.com.br/arquivos/4b905_840e0_00.jpg" alt="">
											</a> 
										</div>
																							
									
										<?php } ?>

											</div>
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
													<div class="page-title-heading cena-elenco">
														<h2>Elenco</h2>  
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
																			<div class="cena-elenco-nome"><?php echo utf8_encode($modelo['nome'])?></div>
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
								<section class="cenas cenasModelo mt-2" style="width:100%;">
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
													<div class="app-page-title">
														<div class="page-title-wrapper">
															<div class="page-title-heading">
																<h5>Mais cenas com  <a href="<?php echo utf8_encode(URL_VIP.'ator/'.$dados_modelo_cenas[id].'/'.URL_amigavel($dados_modelo_cenas[nome])) ?>"><?php echo utf8_encode($dados_modelo_cenas['nome'])?></a></h5>
															</div>
														</div>
													</div>
												 
													
												
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
																	<h1 class="card-titulo">
																		<?php echo utf8_encode($dados_cena_elenco['titulo'])?>
																	</h1>
																</div>
																
															</div>
														</a>
													</li>
												<?php } }  ?>
											</ul>
										</div>
										<?php } ?>
									<?php } ?>
									<div>
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
																	<h1 class="card-titulo">
																		<?php echo utf8_encode($dados_sugestao['titulo'])?>
																	</h1>
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
										
										<div id="comentarios">
											<?php include_once ($comment); ?>
										</div>
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
					
					<!-- Efeito parallax do botao comentar -->
					<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.0.2/dist/simpleParallax.min.js"></script>
					
									
				<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
				</body>
			</html>																																																																																			