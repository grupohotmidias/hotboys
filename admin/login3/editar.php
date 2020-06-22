<?php
	include("includes/autenticacao.php");
    session_start(); 
	
    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();
	
    include_once('config/conexao.php');
    
	//consulta da tabela usuarios_atores
	$sql_ator = "SELECT * FROM `usuarios_atores` WHERE id_ator='$_SESSION[id_ator]'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));
	
	//consulta da tabela user_ator
    $sql_ator = "SELECT * FROM `user_ator` WHERE id_ator='$_SESSION[id_ator]'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));
	
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$whatsapp = $_POST["whatsapp"];
	$estado = $_POST["estado"];
	
	//se o formulario for enviado, faz o update no banco
	if($_POST[acao]=='editar'){
        $sql_atualizacao = "UPDATE `user_ator` SET
		`id_ator`='$_SESSION[id_ator]',
        `nome` = '$nome',
		`telefone` = '$telefone',
		`whatsapp` = '$whatsapp',
		`estado` = '$estado'
		WHERE `id_ator` = '$_SESSION[id_ator]'";
        $consulta_atualizacao = mysql_query($sql_atualizacao);
		
		$status = mysql_query($sql_atualizacao) or die(mysql_error());
		
		if($status){
			//sucesso	
			$msg = "Atualizado com sucesso";
			header("Refresh:1; url=editar.php");
			} else {
			//erro	
			$msg = "Erro ao Atualizar";			
		}
	}
	
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- CSS Bootstrap  -->
		<link href="../../testando/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- CSS Principal -->
		<link href="../../testando/css/estilo.css?v=7300" rel="stylesheet">
		<!-- CSS Formulario -->
		<link href="../../testando/css/formulario.css?v=7300" rel="stylesheet">
		
		<style>
			.editar a{width: 100%}
			.editar .row{margin-right: 0;margin-left: 0}
			.cabecalho .logo{width: 70%;}
			
			@media screen and (max-width: 575px){
			.cabecalho .logo img{width: 80%;}
			.editar .navbar img {
			margin-left:0!important;
			}
			.editar .atualizar {
			display: block;
			width: 100%;
			}
			}
		</style>
		
		<title>Painel do Usuario | Editar Informações</title>
	</head>
	<body class="editar">
		
		<!-- Topo -->
		<header class="cabecalho bg-red">
			<div class="container">
				<div class="row">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<!-- Logo topo -->
						<a href="../../" class="logo">
							<img src="https://www.hotboys.com.br//novo-projeto/assets/img/logos/logo-topo.png?=<?= VERSION ?>"/>
						</a>
						
						<button class="navbar-toggler m-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbar">
							<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
								
								<!-- menu Home -->
								<li class="nav-item">
									<a class="nav-link text-white" href="painel2.php">Home <span class="sr-only">(current)</span></a>
								</li>
								
								<!-- menu Minha Pagina -->
								<?php if($consulta_ator["nome"] == ''){ ?>
									<li class="nav-item">
										<a class="nav-link text-white" style="color:#c71616!important">Minha Página</a>
									</li>
									<?php }else{ ?>
									<li class="nav-item">
										<a class="nav-link text-white" href="https://<?= $consulta_ator["nome"] ?>.hotboys.com.br/" target="_blank">Minha Página</a>
									</li>
								<?php } ?>
								
								<!-- menu Sair -->
								<li class="nav-item">
									<a class="nav-link text-white" href="includes/sair.php">Sair</a>
								</li>
							</ul>
							
						</div>
					</nav>
				</div>
			</div>
		</header>
		
		<!-- Conteudo -->
		<main class="conteudo">
			<section>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-md-8 col-lg-8 col-xl-6">
							<div class="row mb-3">
								
								<!-- Titulo -->
								<div class="col text-center text-white">
									<h5 class="card-title text-center mt-3">Editar Informações</h5>
								</div>
								
							</div>
							<!--<h3 style="color:white">ID ATOR: <?//= $_SESSION[id_ator] ?></h3>-->
							
							<form action="" method="post" class="form-signin">
								
								<!-- Campo Nome -->
								<div class="form-label-group">
									<input type="text" id="inputEmail" name="nome" class="form-control" <?php if($consulta_ator['nome'] == ''){ ?>
										placeholder="Nome"
										<?php }else{ ?>
										placeholder="<?= $consulta_ator["nome"];?>"
									<?php } ?> value="<?= $consulta_ator["nome"];?>" required>
									<label for="inputEmail">Nome</label>
								</div>
								
								<!-- Campo Telefone -->
								<div class="form-label-group">
									<input type="text" id="inputTelefone" name="telefone" class="form-control" <?php if($consulta_ator["telefone"] == ''){ ?>
										placeholder="Telefone"
										<?php }else{ ?>
										placeholder="<?= $consulta_ator["telefone"];?>"
									<?php } ?> value="<?= $consulta_ator["telefone"];?>" required>
									<label for="inputTelefone">Telefone</label>
								</div>
								
								<!-- Campo Whatsapp -->
								<div class="form-label-group">
									<input type="text" id="inputWhatsapp" name="whatsapp" class="form-control"  <?php if($consulta_ator["whatsapp"] == ''){ ?>
										placeholder="Whatsapp"
										<?php }else{ ?>
										placeholder="<?= $consulta_ator["whatsapp"]?>"
									<?php } ?> value="<?= $consulta_ator["whatsapp"];?>" required>
									<label for="inputWhatsapp">Whatsapp</label>
								</div>
								
								<!-- Campo Estado -->
								<div class="form-label-group">
									<input type="text" id="inputEstado" name="estado" class="form-control" 
									<?php if($consulta_ator["estado"] == ''){ ?>
										placeholder="Estado"
										<?php }else{ ?>
										placeholder="<?= $consulta_ator["estado"];?>"
									<?php } ?> value="<?= $consulta_ator["estado"];?>" required>
									<label for="inputEstado">Estado</label>
									
									
								</div>
								
								<div class="row justify-content-start my-3">
									<!--
										<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input">
										I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
										</label>
										</div>
									-->
									<input type="hidden" name="acao" value="editar">
									<button type="submit" class="btn btn-success atualizar btn-block">Atualizar</button>
								</div>
							</form>
							
							<!-- Mensagem do formulario -->
							<?php if($status != ''){ ?>
								<div class="alert alert-success alert-dismissible fade show text-center mt-4" role="alert">
									<?= $msg; ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>	
		</main>
		
		<!-- Rodape -->
		<footer class="rodape">
			<div class="container">
				<p class="m-0 text-center">Direitos Reservados &copy; HotBoys 2019</p>
			</div>
		</footer>
		
	</body>
</html>			