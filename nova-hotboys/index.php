<?php 
	$dirImg = 'https://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	
	
	$servidor = 'localhost';
	$usuario = 'c1hotboys';
	$senha = 'eF!jr4cZmFGD';
	$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_connect($servidor, $usuario, $senha);
	mysql_select_db($bd, $conexaoMysql_hot);
	
	//atualiza o css, imagens e js toda vez que alguma alteracao acontece
	define('Version', '64');
	define('URL', 'https://www.hotboys.com.br/');
	define('URL_VIP', 'https://www.hotboys.com.br/vip/');
	
	//consulta da vitrine
	$query_vitrine ="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 5";
	$consulta_vitrine  = mysql_query($query_vitrine );
	
	//consulta ultimas noticias - audicoes hot 3
	$query_audicoes = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC LIMIT 3";
	$consulta_audicoes  = mysql_query($query_audicoes);
	$total_audicoes = mysql_num_rows($consulta_audicoes);
?>

<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title></title>
		
		<!-- CSS Fonts do conteudo -->
		<link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans&display=swap" rel="stylesheet">
		
		<!-- CSS Fonts do menu -->
		
		
		<!-- CSS Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<!-- CSS Principal -->
		<link href="assets/css/estilo.css?v=<?php echo Version; ?>" rel="stylesheet">
	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top">
				
				<!-- Logo Topo -->
				<a class="navbar-brand" href="#"><img src="assets/img/logos/logo-topo.png?v=<?php echo Version; ?>"/></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<!-- Menu Topo -->
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Audições</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Categorias</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Cenas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Modelos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Séries</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contatos</a>
						</li>
					</ul>
					<form class="form-inline mt-2 mt-md-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
						<div><a href="">Seja Assinante</a></div>
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Entrar</button>
					</form>
				</div>
				
			</nav>
		</header>
		
		<main role="main">
			
			<!-- VITRINE -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				
				<!-- botoes para mudar banner -->
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				
				<!-- banners da vitrine -->
				<?php 
					$counter = 1;
					while($dados_vitrine = mysql_fetch_array($consulta_vitrine)){ ?>
					<div class="carousel-inner">
						<div class="carousel-item <?php if($counter <= 1){echo " active"; }?>">
							<a href="#"> 
								<img class="d-block w-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_vitrine['cena_vitrine'] ?>" alt="imagem vitrine" width="100%">
							</a>
						</div>
					</div>
				<?php $counter++; } ?>
				
				<!-- Seta esquerda Vitrine -->
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				
				<!-- Seta direita Vitrine -->
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Próximo</span>
				</a>
			</div>
			<!-- # Fim VITRINE -->
			
			<div class="container-fluid">
				<div class="row">
					
					
					<!-- Titulo - audicoes hot 3 -->
					<div class="col-12">
						<h2>últimas notícias</h2>
					</div>
					
					<!-- Cenas - Ultimas noticias audicoes hot 3 -->
					<div class="col-12 ultimasNoticias">
						<?php while($dados_audicoes = mysql_fetch_array($consulta_audicoes)){ ?>
							<a href="#">
								<div class="col-4 float-left thumb">
									<img src="https://server2.hotboys.com.br/arquivos/<?php if($dados_audicoes['imagem_lista'] != ''){ echo $dados_audicoes['imagem_lista']; }else{ echo '0_cena.jpg'; } ?>" alt="noticias das audicoes"/>
									
									<h4><?php echo strip_tags(utf8_encode(substr($dados_audicoes['titulo'], 0, 38))); ?>... </h4>
								</div>
							</a>
						<?php } ?>
					</div>
					
				</div>
			</div>
			
			
			<!-- FOOTER -->
			<footer class="container">
			</footer>
		</main>
		
		<!-- Javascript Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		
	</body>
</html>