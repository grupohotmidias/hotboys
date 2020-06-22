<?php 
	//atualiza o css toda vez que alguma alteracao acontece
	define('Version', '76');
	
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
		<div class="container-fluid">
			
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
							<li class="breadcrumb-item"><div class="icone">2</div> Dados de Acesso</li>
							<li class="breadcrumb-item  current"><div class="icone">3</div> Formas de Pagamento</li>
							<li class="breadcrumb-item"><div class="icone">4</div> Pedido</li>
						</ul>
					</nav>
				</div>
			</div>
			
			<!-- Breadcrumb mobile -->
			<div class="row bread mobile">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Planos</li>
					<li class="breadcrumb-item active">Formas de Pagamento</li>
				</ol>
			</div>
			
		</div>
		
		<!-- Conteudo -->
		<div class="container formas-pagamento mt-3 mb-3">
			
			<div class="row cartao-credito">
				<div class="mx-auto">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 float-left">
						<form class="p-2">
							<div class="form-group">
								
								<!-- campo numero do cartao -->
								<div class="col p-0">
									<div class="input-group">
										
										<div class="col-12 p-0">
											<label>Número do cartão</label>
										</div>
										
										<div class="col-12 p-0">
											<input type="text" class="form-control" id="validationDefaultUsername" placeholder="digite apenas números" aria-describedby="inputGroupPrepend2" required>
										</div>
									</div>
								</div>
								
								<!-- campo nome no cartao -->
								<div class="col p-0 mt-2">
									<div class="input-group" id="show_hide_password">
										
										<div class="col-12 p-0">
											<label>Nome no cartão</label>
										</div>
										
										<div class="col-12 p-0">
											<input type="text" class="form-control" id="exampleInputPassword1" placeholder="digite o nome impresso no cartão" aria-describedby="inputGroupPrepend2" required>
										</div>
									</div>
								</div>
								
								<!-- campo CPF do titular -->
								<div class="col p-0 mt-2">
									<div class="input-group" id="show_hide_password">
										
										<div class="col-12 p-0">
											<label>CPF do titular</label>
										</div>
										
										<div class="col-12 p-0">
											<input type="text" class="form-control" id="exampleInputPassword1" placeholder="digite apenas numeros" aria-describedby="inputGroupPrepend2" required>
										</div>
									</div>
								</div>
								
								<div class="col p-0 mt-2 float-left">
									
									<!-- campo validade do cartao -->
									<div class="col-5 p-0 mt-2 float-left">
										<div class="input-group" id="show_hide_password">
											
											<div class="col-12 p-0">
												<label>Válido até</label>
											</div>
											
											<div class="col-12 p-0">
												<input type="text" class="form-control" id="exampleInputPassword1" placeholder="MM/AA" aria-describedby="inputGroupPrepend2" required>
											</div>
										</div>
									</div>
									
									<!-- campo codigo de segurança -->
									<div class="col-5 p-0 mt-2 float-left codigo-seguranca">
										<div class="input-group" id="show_hide_password">
											
											<div class="col-12 p-0">
												<label>Código de segurança</label>
											</div>
											
											<div class="col-12 p-0">
												<input type="text" class="form-control" id="exampleInputPassword1" placeholder="3 ou 4 digitos" aria-describedby="inputGroupPrepend2" required>
											</div>
										</div>
									</div>
									
									<!-- campo codigo de segurança -->
									<div class="col-1 p-0 mt-2 float-left">
									<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i>
									</div>
									
								</div>
								
							</div>
							
							<!-- botao prosseguir -->
							<div class="col p-0 float-left mt-3 mb-4">
								<button class="prosseguir">
									<span> Concluir <i class="icon"></i> </span>
								</button>
							</div>
							
						</form><!-- fim formulario -->
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 float-left">
						22
						<p><strong>IMPORTANTE:</strong> Na fatura de Cartão de Crédito não aparecerá o nome do site, o nome listado será ..... .</p>
					</div>
					
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
		
		<!-- JS Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
