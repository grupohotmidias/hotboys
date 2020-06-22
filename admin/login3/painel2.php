<?php
	session_start(); 
	
	// requer arquivo de configuracoes
	require_once('config/conexao.php');
	
	// requer arquivo das funcoes
	require_once("../../includes/funcoes.php");
	
	//pega o id do ator pela sessao
	$id_ator = $_SESSION[id_ator];
	
	// recurso mobile detect
	require_once('../../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	//consulta da tabela user_ator
    $sql_ator = "SELECT * FROM user_ator WHERE id_ator='$id_ator'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));
	
	//consulta da tabela usuarios_atores
    $sql_atores = "SELECT * FROM usuarios_atores WHERE id_ator='$id_ator'";
    $consulta_usuarios_atores = mysql_fetch_array(mysql_query($sql_atores));
	
	//consulta da tabela imagens_ator
	$sql_galeria = "SELECT * FROM imagens_ator WHERE id_ator='$id_ator'";
	$consulta_galeria = mysql_query($sql_galeria);
	
    if(!isset($_SESSION["logado"])){
        include_once('config/conexao.php');
		
		//update da tabela usuarios_atores
        $sql_login = "UPDATE `usuarios_atores` SET `login`='$_SESSION[login]', `ip`='$_SESSION[ip]' WHERE id_ator='$id_ator'";
        $consulta_login = mysql_query($sql_login);
        $logado = "logado";
        $_SESSION["logado"] = $logado;
	}
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$whatsapp = $_POST["whatsapp"];
	$estado = $_POST["estado"];
	$status = $consulta_ator["status"];
	
	//atualiza informacoes
	if($_POST[acao]=='editarinfo'){
        $sql_atualizacao = "UPDATE `user_ator` SET
		`id_ator`='$_SESSION[id_ator]',
        `nome` = '$nome',
		`telefone` = '$telefone',
		`whatsapp` = '$whatsapp',
		`estado` = '$estado',
		`status` = '$status'
		WHERE `id_ator` = '$_SESSION[id_ator]'";
        $consulta_atualizacao = mysql_query($sql_atualizacao);
		$status_resultado = mysql_query($sql_atualizacao) or die(mysql_error());
		if($status_resultado){
			//sucesso	
			header("Refresh:1; url=../painel/");
			} else {
			//erro	
			$msg = "Erro ao Atualizar";			
		}
	}
	
	$video = $_POST["video_code"];
	//atualiza video
	if($_POST[acao]=='editarvideo'){
        $sql_atualizacao = "UPDATE `user_ator` SET
        `video_code` = '$video'
		WHERE `id_ator` = '$_SESSION[id_ator]'";
        $consulta_atualizacao = mysql_query($sql_atualizacao);
		$status_resultado = mysql_query($sql_atualizacao) or die(mysql_error());
		if($status_resultado){
			//sucesso	
			header("Refresh:1; url=../painel/");
			$msg = "O Vídeo foi atualizado";
			} else {
			//erro	
			$msg = "Erro ao Atualizar";			
		}
	}
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="refresh" content = "600; url=<?= URL ?>/admin/login/includes/sair.php">-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🔓 🌶 Painel do Usuario | User Painel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ("includes/estrutura/topo/head.php"); ?>
		
		<!-- CSS da pagina -->
		<link rel="stylesheet" href="<?= URL ?>admin/login/assets/css/painel.css">
		
		<!-- CSS Lightbox -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
		
		<style>
			.painel .modal-body{
			background-color: #191919;
			}
			</style>
	</head>
	
	<body class="painel">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ("includes/estrutura/topo/nav-topo.php"); ?>
			
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ("includes/estrutura/menu/menu-lateral.php"); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer mt-2">
						<div class="app-main__inner">
							
							<!-- Page Wrapper -->
							<div id="wrapper" class="painel">
								
								<!-- Content Wrapper -->
								<div id="content-wrapper" class="d-flex flex-column">
									
									<!-- Main Content -->
									<div id="content">
										
										
										<!-- Begin Page Content -->
										<div class="container-fluid">
											
											<!-- Titulo da pagina -->
											<div class="d-sm-flex align-items-center justify-content-between mb-4 pl-3">
												<h1 class="h3 mb-0 text-gray-800 mt-3">Painel do Ator</h1>
												<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
											</div>
											
											<!-- Content Row 
											<div class="row dados mb-4">-->
												
												<!-- Earnings (Monthly) Card Example
												<div class="col-xl-3 col-md-6">
													<div class="card border-left-primary shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="text-xs font-weight-bold text-uppercase text-danger mb-1">Teste</div>
																	<div class="h5 mb-0 font-weight-bold text-gray-800">R$40,00</div>
																</div>
																<div class="col-auto">
																	<i class="fas fa-calendar fa-2x text-gray-300"></i>
																</div>
															</div>
														</div>
													</div>
												</div>-->
												
												<!-- Earnings (Monthly) Card Example
												<div class="col-xl-3 col-md-6">
													<div class="card border-left-success shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo</div>
																	<div class="h5 mb-0 font-weight-bold text-gray-800">R$215,00</div>
																</div>
																<div class="col-auto">
																	<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
																</div>
															</div>
														</div>
													</div>
												</div>-->
												
												<!-- Earnings (Monthly) Card Example
												<div class="col-xl-3 col-md-6">
													<div class="card border-left-info shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Visitas</div>
																	<div class="row no-gutters align-items-center">
																		<div class="col-auto">
																			<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
																		</div>
																		<div class="col">
																			<div class="progress progress-sm mr-2">
																				<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-auto">
																	<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
																</div>
															</div>
														</div>
													</div>
												</div>-->
												
												<!-- Pending Requests Card Example 
												<div class="col-xl-3 col-md-6">
													<div class="card border-left-warning shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Comentários </div>
																	<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
																</div>
																<div class="col-auto">
																	<i class="fas fa-comments fa-2x text-gray-300"></i>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											-->
											
											<!-- Content Row -->
											<div class="row">
												<!-- Foto de Perfil -->
												<div class="col-xl-4 col-lg-5">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="font-weight-bold m-0">Foto de Perfil</h6>
														</div>
														
														<!-- Card Body -->
														<div class="card-body">
															<div class="chart-pie">
																<?php if($fotoPerfil !=''){ ?>
																	<img src="https://server2.hotboys.com.br/arquivos/<?= $fotoPerfil ?>" alt="" style="width:100%">
																	<?php }else{ ?>
																	<canvas id="myPieChart"></canvas>
																<?php } ?>
															</div>
															<!--
																<div class="mt-4 text-center small">
																<span class="mr-2">
																<i class="fas fa-circle text-primary"></i> Direct
																</span>
																<span class="mr-2">
																<i class="fas fa-circle text-success"></i> Social
																</span>
																<span class="mr-2">
																<i class="fas fa-circle text-info"></i> Referral
																</span>
																</div>
																</div>
															-->
															
														</div>
													</div>
												</div>
												
												
												<!-- Informacoes do Ator -->
												<div class="col-xl-8 col-lg-7">
													<div class="card shadow mb-4">
														
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold">Informações do Ator</h6>
															
															<!-- editar -->
															<div class="dropdown no-arrow">
																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoAtor">
																	<i class="fas fa-pencil-alt fa-1x"></i>
																</button>
															</div>
														</div>
														
														<!-- Card Body -->
														<div class="card-body">
															<div class="chart-area">
																<?php 
																	$telefoneAtor = $consulta_ator[telefone];
																	$whatsappAtor = $consulta_ator[whatsapp];
																	$estadoAtor = $consulta_ator[estado];
																	$statusAtor = $consulta_ator[status];
																?>
																<table class="table table-dark m-0">
																	<tbody>
																		<tr>
																			<td class="first-child">Nome</td>
																			<?php
																				if($nomeAtor !='') { ?>
																				<td class="first-child">
																					<?= $nomeAtor ?>
																				</td>
																				<?php }else{ ?>
																				<td class="first-child vazio">
																					Vazio
																				</td>
																			<?php } ?>
																		</tr>
																		<tr>
																			<td>Telefone</td>
																			<?php
																				if($telefoneAtor !=''){ ?>
																				<td>
																					<?= $telefoneAtor ?>
																				</td>
																				<?php }else{ ?>
																				<td class="vazio">
																					Vazio
																				</td>
																			<?php } ?>
																		</tr>
																		<tr>
																			<td>Whatsapp</td>
																			<?php
																				if($whatsappAtor !=''){ ?>
																				<td>
																					<?= $whatsappAtor ?>
																				</td>
																				<?php }else{ ?>
																				<td class="vazio">
																					Vazio
																				</td>
																			<?php } ?>
																		</tr>
																		<tr>
																			<td>Estado</td>
																			<?php
																				if($estadoAtor !=''){ ?>
																				<td>
																					<?= $estadoAtor ?>
																				</td>
																				<?php }else{ ?>
																				<td class="vazio">
																					Vazio
																				</td>
																			<?php } ?>
																		</tr>
																		<tr>
																			<td>Status</td>
																			<?php if($statusAtor =='Ativo'){ ?>
																				<td><?= $statusAtor ?></td>
																				<?php }else{ ?>
																				<td class="vazio"><?= $statusAtor ?></td>
																			<?php } ?>
																		</tr>
																		<?= $msg ?>
																		
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											
											<!-- Galeria de Fotos -->
											<div class="row">
												<div class="col-12">
													<div class="card shadow">
														<!-- Titulo Galeria de imagens -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold">Galeria de Fotos</h6>
															<div class="dropdown no-arrow">
																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galeriaFotos">
																	<i class="fas fa-pencil-alt fa-1x"></i>
																</button>
															</div>
														</div>
														
														<!-- Fotos da Galeria -->
														<div class="col-12 foto-galeria card-body">
															<?php 
																while($row_galeria = mysql_fetch_array($consulta_galeria)){
																?>
																<div class="col-6 col-sm-3 chart-pie float-left p-0">
																	
																	<a href="https://server2.hotboys.com.br/arquivos/<?php echo $row_galeria[imagem] ?>" data-toggle="lightbox" data-gallery="example-gallery">
																		<div class="bspImgWrapper img-fluid" style="background:url('https://server2.hotboys.com.br/arquivos/<?= $row_galeria[imagem] ?>')"></div>
																	</a>
																	
																</div>
															<?php } ?>
														</div>
														
													</div>
												</div>
											</div>
											
											<div class="row mt-4 mb-4">
												<!-- Video do ator -->
												<div class="col-12">
													<div class="card shadow">
														<!-- Titulo Galeria de imagens -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold">Vídeo</h6>
															<div class="dropdown no-arrow">
																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarVideo">
																	<i class="fas fa-pencil-alt fa-1x"></i>
																</button>
															</div>
														</div>
														
														<!-- Fotos da Galeria -->
														<div class="col-12 card-body">
															<!-- Video do Ator -->
															<div class="col-5 embed-responsive embed-responsive-16by9">
																<iframe allowfullscreen frameBorder='0' width='100%' height= '100%' src="<?= $consulta_ator[video_code] ?>"></iframe>
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								
								
								
							</div>
							<!-- End of Page Wrapper -->
							
							<!-- Scroll to Top Button-->
							<a class="scroll-to-top rounded" href="#page-top">
								<i class="fas fa-angle-up"></i>
							</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Javascript geral -->
		<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
		
		<!-- Javascripts Bootstrap 4 -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		<!-- Javascript lightbox -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
		<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
			});
		</script>
		
		<!-- Modal - Foto Principal -->
		<?php include_once('includes/modal/foto-principal.php') ?>
		
		<!-- Modal - Informacoes Ator -->
		<?php include_once('includes/modal/info-ator.php') ?>
		
		<!-- Modal - Galeria Fotos -->
		<?php include_once('includes/modal/galeria-fotos.php') ?>
		
		<!-- Modal - Video -->
		<?php include_once('includes/modal/video.php') ?>
		
		
	</body>
</html>																																			