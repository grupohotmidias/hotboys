<?php
	session_start(); 
	
	// requer arquivo de configuracoes
	require_once('config/conexao.php');
	
	// requer arquivo das funcoes
	require_once("../../includes/funcoes.php");
	
	
	//pega o id do ator pela sessao
	$id_ator = $_SESSION["id_ator"];
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$whatsapp = $_POST["whatsapp"];
	$estado = $_POST["estado"];
	
	
	//consulta da tabela user_ator
    $sql_ator = "SELECT * FROM user_ator WHERE id_ator='$id_ator'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));
	
	$status = $consulta_ator["status"];
	
	//variavel da foto principal
	$fotoPerfil = $consulta_ator["foto_principal"];
	
	//consulta da tabela usuarios_atores
    $sql_atores = "SELECT * FROM usuarios_atores WHERE id_ator='$id_ator'";
    $consulta_usuarios_atores = mysql_fetch_array(mysql_query($sql_atores));
	
	//consulta da tabela imagens_ator
	$sql_galeria = "SELECT * FROM imagens_ator WHERE id_ator='$id_ator'";
	$consulta_galeria = mysql_query($sql_galeria);
	
	// atualiza foto principal
	if(isset($_POST['enviar_arquivo'])){
		$formatosPermitidos = array("png","jpeg","jpg","gif");
		$extensao = pathinfo($_FILES['perfil_foto']['name'], PATHINFO_EXTENSION);
		if(in_array($extensao, $formatosPermitidos)){
			$pasta = "upload/foto-principal/";
			$temporario = $_FILES['perfil_foto']['tmp_name'];
			$novo_nome = uniqid().".$extensao";
			
			move_uploaded_file($temporario, $pasta.$novo_nome);
			
			$sql_atualizado = "UPDATE `user_ator` SET `foto_principal` = '$novo_nome' WHERE `id_ator`='$id_ator'";
			
			if(mysql_query($sql_atualizado)){
				$mensagem_foto = "foto atualizada com sucesso";
				header("Refresh:0; url=../painel/");
				exit();
			}
			
			}else{
			$mensagem = 'Formato inválido';
		}
		echo $mensagem_foto;
	}
	
	//inserir imagens do ator
	$msg = false;
	
	if(isset($_FILES['arquivo'])){
		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()) .$extensao;
		$diretorio = "upload/";
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
		$nomeAtor = $consulta_ator[nome];
		$sql_fotos = "INSERT INTO `imagens_ator`(`id`, `id_ator`, `nome`, `imagem`, `ordem`) VALUES (NULL,$id_ator,'$nomeAtor','$novo_nome','999999')"; 
		$status_fotos = mysql_query($sql_fotos) or die(mysql_error());
		if($status_fotos){
			header("Refresh:0; url=../painel/");
			}else{
			echo 'erro ao enviar';
		}
		
	}
	
    if(!isset($_SESSION["logado"])){
        include_once('config/conexao.php');
		
		//update da tabela usuarios_atores
        $sql_login = "UPDATE `usuarios_atores` SET `login`='$_SESSION[login]', `ip`='$_SESSION[ip]' WHERE id_ator='$id_ator'";
        $consulta_login = mysql_query($sql_login);
        $logado = "logado";
        $_SESSION["logado"] = $logado;
	}
	
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
	//se foto for excluida, atualiza a pagina e aparece a mensagem
	if($_POST[acao]=='excluirfoto'){
		header("Refresh:1; url=../painel/");
	}
	if($id_ator == ''){
	$redirecionamento_login = header("Refresh:2; url=../index.php");;
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
		<title>Painel do Ator | Actor Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ("includes/estrutura/topo/head.php"); ?>
		
		<!-- CSS da pagina -->
		<link rel="stylesheet" href="<?= URL ?>admin/login/assets/css/painel.css?v=10">
		
		<!-- CSS Lightbox -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
		
		<!-- CSS da pagina -->
        <link rel="stylesheet" href="<?php echo URL ?>admin/login/assets/css/foto_principal.css?v=<?php echo Version; ?>">
		<style>
			.alert{
			border-radius: 0!important;
			}
			.alert-danger {
			border-radius: 0!important;
			margin-right: 15px!important;
			margin-left: 15px!important;
			}
			.painel .foto-galeria button.close{
			position: absolute;
			right: 5px;
			top: 5px;
			background-color: var(--red);
			padding: 7px;
			width: 30px;
			}
			.painel .image-upload>input {
			
			}
			.painel .image-upload label{
			width:100%;
			cursor:pointer;
			}
			
			
			form#enviar_foto #foto{
			visibility: hidden;
			position: absolute;
			bottom: 0%;
			right: auto;
			background-color: #00000061;
			left: 50%;
			transform: translate(-50%, 0);
			width: 100%;
			text-align: center;
			overflow: hidden;
			}
			
			form#enviar_foto:hover #foto{
			visibility: visible;
			}
			input#galeria_foto {
			visibility: hidden;
			}
			input#galeria_foto:valid ~ #foto{
			visibility: visible;
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
											
											<?php if($id_ator == ''){ ?>
												<div class="alert alert-danger" role="alert">
													Você não está logado. Será redirecionado para a área de Login!
												</div>
												
											<?php } ?>
											
											<!-- Titulo da pagina -->
											<div class="d-sm-flex align-items-center justify-content-between mb-4 pl-3">
												<h1 class="h3 mb-0 text-gray-800 mt-3">Painel do Ator</h1>
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
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Coment�rios </div>
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
															<h6 class="font-weight-bold m-0">Foto Principal</h6>
														</div>
														
														<!-- Card Body -->
														<div class="card-body">
															<div class="chart-pie">
																<form action="" name="minha-conta-form-foto" id="minha-conta-form-foto" method="POST" enctype="multipart/form-data">
																	
																	<?php if($dados_user[foto_perfil] !=""){ ?>
																		<div>
																			<?php }else{ ?>
																			<div>
																			<?php } ?>
																			
																			<input type="file" accept="image/*" name="perfil_foto" id="perfil_foto" required onchange="readURL(this);">
																			<label for="perfil_foto" class="d-flex justify-content-center mb-0">
																				<?php if($fotoPerfil !=''){ ?>
																					<div class="perfil-foto">
																						<img id="foto_envio" src="https://hotboys.com.br/admin/login/upload/foto-principal/<?= $fotoPerfil ?>" style="width:100%"/>
																					</div>
																					<?php }else{ ?>
																					<img src="<?= URL ?>admin/login/assets/img/foto-vazia.jpg" style="width:100%;cursor:pointer"/>
																				<?php } ?>
																			</label>
																			
																			<!-- botao para editar foto -->
																			<div id="atualizar_foto">
																				<i class="fas fa-camera"></i> Atualizar
																			</div>
																			<!-- botao para salvar foto -->
																			
																			<div id="salvar_foto"> 
																				<input type="submit" name="enviar_arquivo" id="enviar_arquivo" value="SALVAR">
																			</div>
																			
																			
																		</div>
																	</form>
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
																						Preencha com suas informações
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
																						Preencha com suas informações
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
																						Preencha com suas informações
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
																						Preencha com suas informações
																					</td>
																				<?php } ?>
																			</tr>
																			<tr>
																				<?php if($statusAtor != '') { ?>
																					<td>Status</td>
																					<td><?= $statusAtor ?></td>
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
																
															</div>
															
															<!-- Fotos da Galeria -->
															<div class="col-12 foto-galeria card-body">
																<?= $msg_excluir ?>
																<?php while($row_galeria = mysql_fetch_array($consulta_galeria)){ ?>
																	<div class="col-6 col-sm-3 chart-pie float-left p-0">
																		
																		<!-- botao excluir foto -->
																		<form action="" method="post">
																			<button type="submit" class="close" aria-label="Close">
																				<?php $id_foto = $row_galeria[id] ?>
																				<input type="hidden" id="<?= $id_foto ?>" name="acao" value="excluirfoto">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</form>
																		
																		<!-- foto da galeria -->
																		<a href="https://hotboys.com.br/admin/login/upload/<?php echo $row_galeria[imagem] ?>" data-toggle="lightbox" data-gallery="example-gallery">
																			<div class="bspImgWrapper img-fluid" style="background:url('https://hotboys.com.br/admin/login/upload/<?= $row_galeria[imagem] ?>')">
																			</div>
																		</a>
																		
																	</div>
																	
																	<?php if($row_galeria[imagem] == '' ){ ?>
																		<canvas id="myPieChart"></canvas>
																	<?php } ?>
																<?php } ?>
																
																<!-- botao adicionar mais fotos -->
																<form action="" method="POST" enctype="multipart/form-data" id="enviar_foto">
																	<div class="col-6 col-sm-3 chart-pie float-left p-0 image-upload">
																		<input type="file" name="galeria_foto" id="galeria_foto" onchange="readURL(this);"/>
																		<label for="galeria_foto">
																			<div class="bspImgWrapper img-fluid adicionar" style="background:url('../assets/img/bt_adicionar.jpg')"></div>
																		</label>
																		
																		<!-- botao para editar foto -->
																		<div id="foto">
																			<i class="fas fa-camera"></i> Enviar Foto
																		</div>
																		
																		<div id="salvar_foto"> 
																				<input type="submit" name="enviar_arquivo" id="enviar_arquivo" value="SALVAR">
																			</div>
																	</div>
																	
																</form>
																
																<form action="" method="POST" enctype="multipart/form-data">
																	<input type="file" name="arquivo" />
																	<input type="submit" name="enviar-formulario" value="Enviar">
																</form>
																
																<?php 
																	//deleta imagens
																	if($_POST[acao]=='excluirfoto'){
																		$sql_excluir = "DELETE FROM `imagens_ator` WHERE id_ator='$id_ator' AND id='$id_foto'";
																		$status_excluir = mysql_query($sql_excluir);
																	}
																?>
																
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
															
															<div class="col-12 card-body">
																<?php if($consulta_ator[video_code] !='') { ?>
																	<div class="col-12 col-sm-5 embed-responsive embed-responsive-16by9">
																		<iframe allowfullscreen frameBorder='0' width='100%' height= '100%' src="<?= $consulta_ator[video_code] ?>"></iframe>
																	</div>
																	<?php }else{ ?>
																	<canvas id="myPieChart" style="height: 20px;"> </canvas>
																	<p class="text-center" style="color:gray">Cadastre seu vídeo no botão ao lado</p>
																	<canvas id="myPieChart" style="height: 20px;"></canvas>
																<?php } ?>
															</div>
															
														</div>
													</div>
												</div>
												
											</div>
											
										</div>
									</div>
									
									
									
									
								</div>
								<!-- End of Page Wrapper -->
								
								
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
			<!-- Mostra foto de perfil atualizada assim que envia -->
			<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
			<script>
				function readURL(input) { 
					if (input.files && input.files[0]) { 
						var reader = new FileReader(); reader.onload = function (e) { 
							$('#foto_envio') .attr('src', e.target.result); 
						};
					reader.readAsDataURL(input.files[0]); } }
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