<?php 
	//atualiza o css toda vez que alguma alteracao acontece
	define('Version', '75');
	
	//Variavel que chama o favicon e CSS / arquivo head
	$head = 'includes/estrutura/topo/head.php';
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>GPagamentos</title>
		
		<!-- Favicon e CSS / arquivo head -->
		<?php include_once ($head); ?>
	</head>
	
	<body>
		<div class="container-fluid dadosAcesso">
			
			<!-- Barra topo -->
			<div class="row logo">
				<div class="mx-auto text-center">
					<a href="https://www.gpagamentos.com.br" target="_blank">
						<img src="assets/img/logo-home.png"/>
					</a>
				</div>
			</div>
			
			<!-- Barra dados de acesso -->
			<div class="row dados-acesso">
				<h5>Dados de Acesso</h5>
			</div>
			
			<!-- Breadcrumb -->
			<div class="row bread desktop">
				<div class="mx-auto">
					<nav aria-label="breadcrumb">
						<ul class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><div class="icone"><i class="fa fa-check"></i></div> Planos</li>
							<li class="breadcrumb-item current"><div class="icone">2</div> Dados de Acesso</li>
							<li class="breadcrumb-item"><div class="icone">3</div> Formas de Pagamento</li>
							<li class="breadcrumb-item"><div class="icone">4</div> Pedido</li>
						</ul>
					</nav>
				</div>
			</div>
			
			<!-- Breadcrumb mobile -->
			<div class="row bread mobile">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Planos</li>
					<li class="breadcrumb-item active">Dados de Acesso</li>
				</ol>
			</div>
			
		</div>
		
		<!-- Conteudo -->
		<div class="container">
			
			<div class="row conta">
				<div class="col-12 d-flex justify-content-center">
					
					<!-- formulario -->
					<form>
						<div class="form-group">
							
							<!-- campo email -->
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-envelope"></i></span>
									</div>
									<input type="text" class="form-control" id="validationDefaultUsername" placeholder="digite seu email" aria-describedby="inputGroupPrepend2" required>
								</div>
							</div>
							
							<!-- campo senha -->
							<div class="col mt-2">
								<div class="input-group" id="show_hide_password">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-lock"></i></span>
									</div>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="digite sua senha" aria-describedby="inputGroupPrepend2" required>
									
									<div class="input-group-addon">
										<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
									</div>
									
								</div>
							</div>
							
							<!-- mensagem abaixo do formulario -->
							<div class="col mt-2">
								<p class="mensagem">
									Fique tranquilo! Nós utilizamos seu e-mail de forma 100% segura para identificar seu cadastro e agilizar o processo de assinatura.
								</p>
							</div>
						</div>
						
						<!-- botao prosseguir -->
						<div class="col">
                            <button class="prosseguir">
                                <span> Prosseguir <i class="icon"></i> </span>
							</button>
						</div>
						
					</form><!-- fim formulario -->
					
				</div>
			</div>
			
		</div>
		
		<!-- rodape -->
		<footer>
			<!-- informacoes do rodape -->
			<div class="container-fluid">
				<div class="row">
					<div class="mx-auto p-3">
						<h3>Informações importantes sobre seus dados de acesso:</h3>
						<ul>
							<li>Seu email será o seu login no site.</li>
							<li><strong>Precisa de ajuda ou tem dúvidas?</strong> Fale com nosso atendimento: email@email.com.br</li>
							<li>Seus dados são criptografados e 100% protegidos.</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Mostrar senha ao clicar no icone olho -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				$("#show_hide_password a").on('click', function(event) {
					event.preventDefault();
					if($('#show_hide_password input').attr("type") == "text"){
						$('#show_hide_password input').attr('type', 'password');
						$('#show_hide_password .input-group-addon i').addClass( "fa-eye-slash" );
						$('#show_hide_password .input-group-addon i').removeClass( "fa-eye" );
						}else if($('#show_hide_password input').attr("type") == "password"){
						$('#show_hide_password input').attr('type', 'text');
						$('#show_hide_password .input-group-addon i').removeClass( "fa-eye-slash" );
						$('#show_hide_password .input-group-addon i').addClass( "fa-eye" );
					}
				});
			});
		</script>
		
	</body>
</html>
