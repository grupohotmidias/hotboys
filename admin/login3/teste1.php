<?php
	session_start(); 
	
	// requer arquivo de configuracoes
	require_once('config/conexao.php');
	
	// requer arquivo das funcoes
	require_once("../../includes/funcoes.php");
	
	// recurso mobile detect
	require_once('../../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	//consulta da tabela user_ator
    $sql_ator = "SELECT * FROM user_ator WHERE id_ator='$_SESSION[id_ator]'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));
	
	//consulta da tabela usuarios_atores
    $sql_atores = "SELECT * FROM usuarios_atores WHERE id_ator='$_SESSION[id_ator]'";
    $consulta_usuarios_atores = mysql_fetch_array(mysql_query($sql_atores));
	
    if(!isset($_SESSION["logado"])){
        include_once('config/conexao.php');
		
		//update da tabela usuarios_atores
        $sql_login = "UPDATE `usuarios_atores` SET `login`='$_SESSION[login]', `ip`='$_SESSION[ip]' WHERE id_ator='$_SESSION[id_ator]'";
        $consulta_login = mysql_query($sql_login);
        $logado = "logado";
        $_SESSION["logado"] = $logado;
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
		
		<!-- CSS do Popup -->
		<link rel="stylesheet" href="<?= URL ?>admin/login/assets/css/painel.css">
		
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
											
											<!-- Page Heading -->
											<div class="d-sm-flex align-items-center justify-content-between mb-4 pl-3">
												<h1 class="h3 mb-0 text-gray-800">Painel do Ator</h1>
												<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
											</div>
											
											<!-- Content Row -->
											<div class="row">
												
												<!-- Earnings (Monthly) Card Example -->
												<div class="col-xl-3 col-md-6 mb-4">
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
												</div>
												
												<!-- Earnings (Monthly) Card Example -->
												<div class="col-xl-3 col-md-6 mb-4">
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
												</div>
												
												<!-- Earnings (Monthly) Card Example -->
												<div class="col-xl-3 col-md-6 mb-4">
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
												</div>
												
												<!-- Pending Requests Card Example -->
												<div class="col-xl-3 col-md-6 mb-4">
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
											
											<!-- Content Row -->
											<div class="row">
												
												<!-- Foto de Perfil -->
												<div class="col-xl-4 col-lg-5">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold">Foto de Perfil</h6>
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
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold">Informações do Ator</h6>
															<div class="dropdown no-arrow">
																
																<a class="dropdown-item" href="#"><i class="fas fa-pencil-alt fa-1x"></i></a>
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
									<?php if($estadoAtor =='Ativo'){ ?>
									<td><?= $statusAtor ?></td>
									<?php }else{ ?>
									<td class="vazio"><?= $statusAtor ?></td>
									<?php } ?>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												
												
												<!-- Content Row -->
												<div class="row">
													
													<!-- Content Column -->
													<div class="col-lg-6 mb-4">
														
														<!-- Project Card Example -->
														<div class="card shadow mb-4">
															<div class="card-header py-3">
																<h6 class="m-0 font-weight-bold">Projects</h6>
															</div>
															<div class="card-body">
																<h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
																<div class="progress mb-4">
																	<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
																<h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
																<div class="progress mb-4">
																	<div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
																<h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
																<div class="progress mb-4">
																	<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
																<h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
																<div class="progress mb-4">
																	<div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
																<h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
																<div class="progress">
																	<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
														</div>
														
														<!-- Color System -->
														<div class="row">
															<div class="col-lg-6 mb-4">
																<div class="card bg-primary text-white shadow">
																	<div class="card-body">
																		Primary
																		<div class="text-white-50 small">#4e73df</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-4">
																<div class="card bg-success text-white shadow">
																	<div class="card-body">
																		Success
																		<div class="text-white-50 small">#1cc88a</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-4">
																<div class="card bg-info text-white shadow">
																	<div class="card-body">
																		Info
																		<div class="text-white-50 small">#36b9cc</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-4">
																<div class="card bg-warning text-white shadow">
																	<div class="card-body">
																		Warning
																		<div class="text-white-50 small">#f6c23e</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-4">
																<div class="card bg-danger text-white shadow">
																	<div class="card-body">
																		Danger
																		<div class="text-white-50 small">#e74a3b</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-4">
																<div class="card bg-secondary text-white shadow">
																	<div class="card-body">
																		Secondary
																		<div class="text-white-50 small">#858796</div>
																	</div>
																</div>
															</div>
														</div>
														
													</div>
													
													<div class="col-lg-6 mb-4">
														
														<!-- Illustrations -->
														<div class="card shadow mb-4">
															<div class="card-header py-3">
																<h6 class="m-0 font-weight-bold">Illustrations</h6>
															</div>
															<div class="card-body">
																<div class="text-center">
																	<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
																</div>
																<p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
																<a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
															</div>
														</div>
														
														<!-- Approach -->
														<div class="card shadow mb-4">
															<div class="card-header py-3">
																<h6 class="m-0 font-weight-bold">Development Approach</h6>
															</div>
															<div class="card-body">
																<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
																<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
															</div>
														</div>
														
													</div>
												</div>
												
											</div>
											<!-- /.container-fluid -->
											
										</div>
										<!-- End of Main Content -->
										
										
									</div>
									<!-- End of Content Wrapper -->
									
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
			<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
			
		</body>
	</html>																														