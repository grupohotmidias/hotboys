<?php 
	//Variaveis dos arquivos de configuracao
	$config = 'config/configuracoes.php';
	
	//Variaveis do arquivos modal na pagina
	$termos = 'includes/modal/rodape/termos-uso.php';
	
	//Variaveis dos arquivos na estrutura da pagina
	$head = 'includes/estrutura/topo/head.php';
	$menu_topo = 'includes/estrutura/topo/menu-topo.php';
	$javascript = 'includes/estrutura/rodape/javascripts.php';
	
	// requer arquivo de configuracoes
	require_once($config);
?>

<!-- TOPO -->
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">	
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">			
		<meta name="author" content="HOTBOYS">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- Titulo - Navegador -->
		<title>Assine Já HotBoys - O Conteúdo Gay Mais Quente da Net</title>
	</head>
	<body class="assine" id="page-top">
		
		<!-- MENU -->
		<header class="menu">
			<!-- Logo Centralizado no topo -->
			<nav class="logo-assine fixed-top" id="mainNav">
				<img class="rounded mx-auto d-block" src="<?php echo URL ?>novo-projeto/assets/img/logos/logo-topo.png?v=14560" alt="logo topo" title="Hotboys - O site mais quente da net">
			</nav>
		</header>
		
		<!-- SECTION - Conteudo -->
		<section class="assine">
			<div class="container">
				<div class="row">
					
					<!-- Conteudo - Lado Esquerdo -->
					<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 leftAssine">
						
						<!-- Titulo -->
						<h5>Falta pouco!</h5>
						
						<!-- Texto -->
						<p>Você está a um passo de ser assinante do HotBoys e ter acesso a todo nosso conteúdo. Selecione abaixo o plano de sua preferência e clique em prosseguir.</p>
						
						<a href="https://gpagamentos.com.br/1/acesso-via-hotboys.php">
							<!-- Planos -->
							<div class="formAssinar" id="planos">
								<!-- plano anual -->
								<div class="plano" >
									<div class="check"></div>
									<div class="name">12 meses de acesso</div>
									<div class="price">
										<span class="rs">R$</span><span class="big">240,</span><span class="small">00</span>
									</div>
								</div>
								
								<!-- plano semestral -->
								<div class="plano">
									<div class="check"></div>
									<div class="name">6 meses de acesso</div>
									<div class="price">
										<span class="rs">R$</span><span class="big">119,</span><span class="small">90</span>
									</div>
								</div>
								
								<!-- plano trimestral -->
								<div class="plano">
									<div class="check"></div>
									<div class="name">3 meses de acesso</div>
									<div class="price">
										<span class="rs">R$</span><span class="big">69,</span><span class="small">90</span>
									</div>
								</div>
								
								<!-- plano bimestral-->
								<div class="plano">
									<div class="check"></div>
									<div class="name">2 meses de acesso</div>
									<div class="price">
										<span class="rs">R$</span><span class="big">49,</span><span class="small">90</span>
									</div>
								</div>
								
								<!-- plano mensal -->
								<div class="plano">
									<div class="check"></div>
									<div class="name">1 mês de acesso</div>
									<div class="price">
										<span class="rs">R$</span><span class="big">29,</span><span class="small">90</span>
									</div>
								</div>
								
								<div class="button">
									
									
									<!-- Botao Prosseguir -->
									<div  id="buttonGo" class="free">
										<span>Prosseguir <i class="icon"></i></span>
									</div>
									
								</div>
							</div>
						</a>
					</div>
					
					<!-- Conteudo - Lado Direito -->
					<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 rightAssine">
						<img class="imagem mobile" src="<?php echo URL ?>novo-projeto/assets/img/assine/img-assine.png?v=<?php echo Version; ?>">
						<img class="imagem desktop" src="<?php echo URL ?>novo-projeto/assets/img/assine/img1-assine.png?v=<?php echo Version; ?>">
						<div class="titulo">Assista no notebook, PC, smartphone ou tablet.</div>
						<div class="texto">Se você decidir não continuar membro, pode cancelar quando quiser.</div>
					</div>
				</div>
			</div>
		</section>
		
		
		
		<!-- JAVASCRIPT Seleciona precos - adiciona classe para mudar estado clicavel dos planos -->
		<script src="<?php echo URL ?>novo-projeto/assets/js/efeitos/botoes-assine.js?v=<?php echo Version; ?>"></script>
		
		<!--  Chama Modal - Termos de Uso -->
		<?php include ($termos); ?>
		
		<!--  Chama Modal - Termos de Uso -->
		<?php include ($javascript); ?>
		
		<!-- Javascript TAB das formas de pagamento -->
		<script>
			$(".dropdown-menu li a").click(function(){
				$(".btn:first-child").html($(this).text()+' <span class="caret"></span>');
			});
		</script>
	</body>
</html>