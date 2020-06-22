<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- CSS Bootstrap  -->
		<link href="../../testando/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- CSS Principal -->
		<link href="../../testando/css/estilo.css?v=7950" rel="stylesheet">
		<!-- CSS Formulario -->
		<link href="../../testando/css/formulario.css?v=7950" rel="stylesheet">
		<!-- CSS Font-Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
		
		<style>
			.cabecalho{height:58px}
			.conteudo{height:calc(89vh - 101px)}
			.rodape{height:43px}
			}
		</style>
        <title>🔒 🌶 Início | Login</title>
	</head>
    <body class="login">
		
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
								<div class="card-body">
									<h5 class="card-title text-center mt-3">Conta - Ator HotBoys</h5>
									<form action="conexao_login.php" method="POST" class="form-signin">
										
										<!-- Campo Login -->
										<div class="form-label-group">
											<input type="text" id="inputEmail" name="conta" class="form-control" placeholder="Login" required autofocus>
											<label for="inputEmail">Login</label>
										</div>
										
										<!-- Campo Senha -->
										<div class="form-label-group">
											<input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Password" required>
											<label for="inputPassword">Senha</label>
											
											<!-- Botao mostrar/esconder senha -->
											<div class="input-group-text">
												<span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
											</div>
										</div>
										
										<!-- Botao entrar -->
										<button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Entrar</button>
										<hr class="mt-2">
									</form>
									
									<!-- Mensagem do formulario -->
									<?php if(isset($_GET['msg'])){  ?>
										<div class="alert alert-danger alert-dismissible fade show text-center mt-4" role="alert">
											<?php 
												$msg=$_GET['msg'];
												echo $msg;
											?>
										</div>
									<?php } ?>
									
								</div>
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