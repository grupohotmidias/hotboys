<?php
	session_start(); 
	
	//conexao com o banco
    include_once('config/conexao.php');
	
	//inclui a autenticacao
    include("includes/autenticacao.php");
    
	//puxa o recurso do mobile
    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();
	
	//pega variavel do post(envio)
    $editar = $_POST["acao"];
    $senha = $_POST["senha"];
    
    $senhaSegura = md5($senha . '$hotboys$' .$senha);
	
	//se o formulario for enviado, faz o update no banco
    if(isset($_POST["acao"]) && $_POST["acao"] == "editar"){
        $sql_trocaSenha = "UPDATE `usuarios_atores` SET `senha`='$senhaSegura' WHERE id_ator='$_SESSION[id_ator]'";
        $consulta_trocaSenha = mysql_query($sql_trocaSenha);
		
		//define a mensagem quando enviado com sucesso
		$msg="Nova Senha cadastrada com sucesso";
		echo "<meta http-equiv='refresh' content='3; url=painel2.php' />";
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
		<link href="../../testando/css/estilo.css?v=7900" rel="stylesheet">
		<!-- CSS Formulario -->
		<link href="../../testando/css/formulario.css?v=7900" rel="stylesheet">
		<!-- CSS Font-Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
		
        <title>🔒 🌶 Início | Login</title>
	</head>
    <body class="trocar_senha">
		
		<!-- Topo -->
		<div class="item item-1 cabecalho">
			<header class="cabecalho bg-red">
				<div class="container">
					<div class="row">
						<nav class="navbar navbar-expand-lg navbar-dark">
							<div class="container">
								<!-- Logo topo -->
								<a class="navbar-brand" href="../../">
									<img class="mx-auto d-block" src="https://www.hotboys.com.br//novo-projeto/assets/img/logos/logo-topo.png?=<?= VERSION ?>"/>
								</a>
							</div>
						</nav>
					</div>
				</div>
			</header>
		</div>
		
		<!-- Conteudo -->
		<div class="item item-2 conteudo">
			<main class="conteudo">
				<div class="container">
					<div class="row">
						<div class="col-sm-9 col-md-8 col-lg-5 mx-auto">
							<div class="card my-3">
								<h5 class="card-title text-center mt-3">Conta - Ator HotBoys</h5>
								<form action="" method="POST" class="form-signin">
									<div class="card-body">
										<form action="includes/conecta.php" method="POST" class="form-signin">
											
											<!-- Campo Senha -->
											<div class="form-label-group">
												<input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Password" required>
												<label for="inputPassword">Digite a nova senha</label>
												
												<!-- botao mostrar/esconder senha -->
												<div class="input-group-text">
													<span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
												</div>
											</div>
											<input type="hidden" name="acao" value="editar">
											<button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Trocar Senha</button>
											<hr class="mt-2">
											
										</form>
										
										<!-- Mensagem do formulario -->
										<?php if($consulta_trocaSenha != ''){  ?>
											<div class="alert alert-success alert-dismissible fade show text-center mt-4" role="alert">
												<?php 
													echo $msg;
												?>
											</div>
										<?php } ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>		
				
				
				
			</main>
		</div>
		
		<!-- Rodape -->
		<div class="item item-3 rodape">
			<footer>
				<div class="container">
					<p class="m-0 text-center">Direitos Reservados &copy; HotBoys 2019</p>
				</div>
			</footer>
		</div>
		
		<!-- Chama JQuery -->
		<script
		src="https://code.jquery.com/jquery-3.4.1.slim.js"
		integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
		crossorigin="anonymous"></script>
		
		<!-- JQuery do botao que mostra/esconde a senha -->
		<script>
			$(".toggle-password").click(function() {
				$(this).toggleClass("fa-eye fa-eye-slash");
				var input = $($(this).attr("toggle"));
				if (input.attr("type") == "password") {
					input.attr("type", "text");
					} else {
					input.attr("type", "password");
				}
			});
		</script>
		
	</body>
</html>	