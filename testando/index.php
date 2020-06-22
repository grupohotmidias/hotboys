<?php 
	//conexao com banco de dados
	require_once('config/configuracao.php');
	
	define('URL', 'https://www.hotboys.com.br/');
	
	//pega o id e nome do ator
	$nome = addslashes(strtolower($_GET[nome]));
	$subdominio = addslashes('https://' . $_SERVER['HTTP_HOST']);
	$subdominio = explode('.', $_SERVER['HTTP_HOST'])[1];
	
	//consulta a tabela user ator
	$query = "SELECT * FROM `user_ator` WHERE nome='$subdominio' AND `status`='Ativo'";
    $resultado = mysqli_query($con, $query);
	$dados = mysqli_fetch_array($resultado);

	//consulta a tabela com imagens do ator
	$query_fotos = "SELECT * FROM `imagens_ator` WHERE nome='$subdominio'";
    $resultado_fotos = mysqli_query($con, $query_fotos);
	$dados_fotos = mysqli_fetch_array($resultado_fotos);
?>

<?php if($dados["nome"]){?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		
		<title>🌶 Hot Boys</title>
		
		<!-- Favicons -->
		<?php include "includes/favicons.php" ?>
		
		<!-- Bootstrap CSS -->
		<link href="<?= URL ?>testando/vendor/bootstrap/css/bootstrap.css?=<?= VERSION ?>" rel="stylesheet">
		
		<!-- CSS Principal -->
		<link href="<?= URL ?>testando/css/estilo.css?=<?= VERSION ?>" rel="stylesheet">
		
		<!-- CSS Lightbox -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
		
		<!-- CSS FontAwesome -->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
	<body class="paginaAtor">
		
		<!-- Navigation -->
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
					<div class="container">
						<!-- Logo topo -->
						<a class="navbar-brand" href="#">
							<img class="mx-auto d-block" src="https://www.hotboys.com.br//novo-projeto/assets/img/logos/logo-topo.png?=<?= VERSION ?>"/>
						</a>
					</div>
				</nav>
			</div>
		</div>
		
		<!-- Conteudo Principal -->
		<div class="container principal">
			<div class="row m-0">
				
				<!-- Nome do Ator -->
				<h2 class="card-title"><?= $dados['nome'] ?></h2>
				
				<!-- Foto principal do Ator -->
				<div class="col-lg-6 mb-4 p-0">
					<div class="card h-100">
						<img class="card-img-top" src="https://server2.hotboys.com.br/arquivos/<?= $dados['foto_principal'] ?>" alt="">
					</div>
					
				</div>
				
				<!-- Informacoes do Ator -->
				<div class="col-lg-6 mb-0 p-0">
					<div class="card-body mb-4">
						<h5 class="card-title"><i class="fa fa-phone"></i> <?= $dados['telefone'] ?></h5>
						<h5 class="card-title"><i class="fa fa-whatsapp"></i> <?= $dados['whatsapp'] ?></h5>
						<p class="card-text"><?= $dados['texto'] ?></p>
						<a href="#">
							<button type="button" class="btn btn-danger">Saiba mais sobre o <?= $dados['nome'] ?>!</button>
						</a>
					</div>
					
				</div>
				
			</div>
		</div> 
		
		<!-- Fotos do Ator -->
		<div class="container mb-4">
			<div class="row m-0">
				
				<!-- Titulo fotos do Ator -->
				<h4 class="card-title" >Fotos do <?= $dados['nome'] ?></h4>
				
				<ul class="row m-0">
					<?php 
						while($maisFotos =  mysqli_fetch_array($resultado_fotos)){
						?>
						<li class="col-6 p-0">
							<a href="https://hotboys.com.br/admin/login/upload/<?= $maisFotos['imagem'] ?>" data-toggle="lightbox" data-gallery="hidden-images">
								<div class="bspImgWrapper" style="background:url('https://hotboys.com.br/admin/login/upload/<?= $maisFotos['imagem'] ?>')"></div>
							</a>
						</li>
						
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<!-- Videos do Ator -->
		<div class="container mb-4">
			<div class="row">
				<!-- Titulo videod do Ator -->
				<h4 class="card-title" >Vídeo do <?= $dados['nome'] ?></h4>
				
				<!-- Video do Ator -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe allowfullscreen frameBorder='0' width='100%' height='100%' src="<?= $dados['video_code'] ?>" ></iframe>
				</div>
				
			</div>
		</div>
		
		<!-- Footer -->
		<footer class="py-3 bg-dark">
			<div class="container">
				<p class="m-0 text-center text-white">Direitos Reservados &copy; HotBoys 2019</p>
			</div>
		</footer>
		
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
		
		
		<!-- Javascript lightbox -->
		<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox();
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$("iframe").addClass("embed-responsive-item");
			});
		</script>
		
	</body>
</html>

		<?php }else{ ?>
			<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=https://www.hotboys.com.br/">
		
		<title>🌶 Hot Boys</title>
		
		<!-- Favicons -->
		<?php include "includes/favicons.php" ?>
		
		<!-- Bootstrap CSS -->
		<link href="<?= URL ?>testando/vendor/bootstrap/css/bootstrap.css?=<?= VERSION ?>" rel="stylesheet">
		
		<!-- CSS Principal -->
		<link href="<?= URL ?>testando/css/estilo.css?=<?= VERSION ?>" rel="stylesheet">
		
		<!-- CSS Lightbox -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
		
		<!-- CSS FontAwesome -->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
	<body class="paginaAtor">
		
		<!-- Navigation -->
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
					<div class="container">
						<!-- Logo topo -->
						<a class="navbar-brand" href="#">
							<img class="mx-auto d-block" src="https://www.hotboys.com.br//novo-projeto/assets/img/logos/logo-topo.png?=<?= VERSION ?>"/>
						</a>
					</div>
				</nav>
			</div>
		</div>
		
		<!-- Conteudo Principal -->
		<div class="container principal">
			<h2>Perfil do Ator não encontrado, redirecionamento em 5 segundos.</h2>
		</div>
		
		<!-- Footer -->
		<footer class="py-3 bg-dark" >
			<div class="container">
				<p class="m-0 text-center text-white">Direitos Reservados &copy; HotBoys 2019</p>
			</div>
		</footer>
		
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
		
		
		<!-- Javascript lightbox -->
		<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox();
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$("iframe").addClass("embed-responsive-item");
			});
		</script>
		
	</body>
</html>
		<?php } ?>