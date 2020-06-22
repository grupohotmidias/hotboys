<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	$naoVerificarPagamento = true;
?>
<?php
	
    $id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
    //adiciona 1 visita no campo visualizacoes quando acessado
    $query_visita = mysql_query("UPDATE cenas SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());   
    
    $query = "INSERT INTO `visitou_agora` (
    `id` ,
    `id_conteudo` ,
    `exibicao`,
    `date` 
    ) VALUES (
    NULL ,
    '$id',
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
    //cria um registro na tebela visita com data
    //1=modelo   2=cena 
    mysql_query ("INSERT INTO visita_conteudo (
    `id` ,
    `id_conteudo` ,
    `tipo` ,
    `data` 
    ) VALUES (
    NULL , '$id', '2',  NOW())") or die(mysql_error());
	
	
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	$id_usuario = $dados_user[id_user]; 
	
	// consulta dos usuarios favoritos
	$query_consulta_favorito  = "SELECT * FROM `usuarios_favoritos` WHERE `id_usuario`='$id_usuario' ";
	$consulta_favorito = mysql_query($query_consulta_favorito);
	
	
	
	while($dados_favorito = mysql_fetch_array($consulta_favorito)){ 
		// busca cenas favoritadas
		$query_consulta_video_favorito  = "SELECT * FROM `cenas` WHERE `id`='".$dados_favorito['id_conteudo']."'";
		$consulta_video_favorito = mysql_query($query_consulta_video_favorito);
		while($videos_favorito = mysql_fetch_array($consulta_video_favorito)){ 
			
			if(isset($_POST['remover'])){
				$query_deletar = "DELETE FROM `usuarios_favoritos` WHERE `id_conteudo` = $id_conteudo AND `id_usuario` = $id_usuario LIMIT 1";
				$status_delete = mysql_query($query_deletar);
				if($status_delete){
					//sucesso	
					echo "<script>alert('Cena removida com Sucesso!');</script>";
					} else {
					//erro	
					echo "<script>alert('Erro ao remover a Cena!');</script>";			
				}
			}
			}
			}
		?>
		<!doctype html>
		<html lang="pt-BR">
			
			<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Área do Cliente - HOTBOYS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip favoritos">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ('includes/estrutura/topo/nav-topo.php'); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>
			
			<!-- Menu sidebar + conteudo da pagina -->
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							<div class="app-page-title">
								<div class="page-title-wrapper">
									
									<!-- Titulo do conteudo -->
									<div class="page-title-heading">
									<h5>Cenas que me Fazem <strong>GOZAR <i class="fas fa-grin-stars"></i>...</i></STRONG></h5>
								</div>
								
							</div>
						</div> 
						
						
						<!-- Conteudo da pagina  -->
						<div class="container-fluid" id="content">
							<div class="row">
								
								<?php
									
									while($dados_favorito = mysql_fetch_array($consulta_favorito)){ 
										// busca cenas favoritadas
										$query_consulta_video_favorito  = "SELECT * FROM `cenas` WHERE `id`='".$dados_favorito['id_conteudo']."'";
										$consulta_video_favorito = mysql_query($query_consulta_video_favorito);
										while($videos_favorito = mysql_fetch_array($consulta_video_favorito)){ 
										?>
										
										<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 cenas p-1">
											
											<div class="card mb-2 box-shadow my-xl-2">
												
												<!-- imagem da cena -->
												<a href="<?php echo utf8_encode(URL_VIP.'cena/'.$videos_favorito[id].'/'.URL_amigavel($videos_favorito[titulo])) ?>">
													<div class="thumb mb-0">
														<img class="card-img-top" alt="Thumbnail" src="https://server2.hotboys.com.br/arquivos/<?php echo $videos_favorito[cena_home]?>" data-holder-rendered="true">
													</div>
												</a>
												<div class="card-body">
													<div style="float:left;width:90%">
														<h1 class="card-titulo"><?php echo utf8_encode($videos_favorito['titulo'])?></h1>
													</div>
													<div style="float:right">
														
														
														
														<form action="" method="POST">
															<input type="hidden" name="remover" value="1">
															
															<button type="submit" style="   background-color:transparent;color:white;border: 0;" title="Deletar Cena">
																<i class="fa fa-trash" aria-hidden="true"></i>
															</button>
														</form>
														
														
													</div>
													
													<!--
														<div class="curtidas d-flex justify-content-between align-items-center">
														<div class="btn-group">
														
														<button type="button" class="btn btn-sm like" style="padding-left:0">
														<i class="fas fa-star" aria-hidden="true"></i>
														</button>
														<button type="button" class="btn btn-sm deslike">
														<i class="fas fa-eye" aria-hidden="true"></i> 
														<?php echo number_format_short($videos_favorito['visualizacao'])?>
														</button>
														</div>
														</div>
													-->
													
													<!-- Botao para excluir a cena favoritada 
														<div class="float-right">
														<div class="excluirFavoritos">
														<a href="#" style="padding:14px">
														<i class="pe-7s-trash icon-gradient bg-mean-fruit"></i>
														</a>
														</div>
														</div>
													-->
													
												</div>
												
											</div>
											
										</li>
									<?php } } ?>
							</div>
						</div>
						
						
						<!-- Titulo do conteudo -->
						<div class="app-page-title modelos">
							<div class="page-title-wrapper">
								
								<div class="page-title-heading">
									<h5>Atores que me <strong>EXCITAM <i class="fas fa-grin-hearts"></i>...</strong></h5>
									
								</div>
							</div>
						</div> 
						
						<!-- alerta de pesquisa nao encontrada -->
						<div class="alert alert-danger mb-4" role="alert">🙁 Poooxa! Você ainda não escolheu seu(s) modelo(s) preferido(s). <a href="<?php echo URL_VIP ?>atores/">Clique aqui</a> e escolha o(s) seu(s). </div>
						
						<!-- alerta de pesquisa nao encontrada 
						<div class="alert alert-danger" role="alert">Poooxa! Você ainda não escolheu seu(s) modelo(s) preferido(s). <a href="<?php echo URL_VIP ?>atores/">Clique aqui</a> e escolha o(s) seu(s).</div>-->
						
						<!-- Footer -->
						<?php include_once ($footer); ?>
						
					</div>
					<!-- ## FIM Conteudo da pagina ## -->
					
				</div>
				
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