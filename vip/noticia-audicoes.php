<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
		
	// chama o menu audicoes
	$menu_audicoes ='../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	$naoVerificarPagamento = true;
		
	$url_link = explode("-",$url_link);
	$url_link = implode("-",$url_link);
	
	// tras id
	$id = addslashes($_GET[id]);
	
	//REGISTRA AÇÃO EDITAR NO HISTOCIO  
	$query_data = "SELECT * FROM `historico_server`";
	$consulta_data = mysql_query($query_data);
	$dados_data = mysql_fetch_array($consulta_data);
	
	$counter = 1;
	
	//consulta no banco de dados
	$query_noticia = "SELECT * FROM `audicoes_noticias` WHERE id=$id LIMIT 1";
	$consulta_noticia = mysql_query($query_noticia);
	$dados_noticia = mysql_fetch_array($consulta_noticia);
	
	//noticia lista = consulta ao banco de dados das audicoes hot 3
	$query_mais_noticias = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' AND id != $id ORDER BY RAND() LIMIT 3";
	$dados_mais_noticias = mysql_query($query_mais_noticias);
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Audições HOT - Site Hotboys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip audicoes noticias noticia">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixa do topo-->
			<?php include ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							
							<!-- SECTION - Bustos das Audicoes  -->
							<section class="audicoes-bustos mt-3">
								<div class="container">
									<div class="row">
										<a href="<?php echo URL_VIP ?>audicoes/">
											<img src="<?php echo URL ?>novo-projeto/assets/img/audicoes/bustos-home.png?v=<?php echo Version; ?>">
										</a>
									</div>
								</div>
							</section>
							
							<!-- Menu audicoes hot 3 -->
							<?php include_once ($menu_audicoes); ?>
							
							<!-- Titulo - Ultimas Cenas -->
							<div class="app-page-title mt-4 mb-0">
								<div class="page-title-wrapper">
									<div class="page-title-heading">
										<h5><?php echo utf8_encode($dados_noticia['titulo']) ?></h5>
									</div>
								</div>
							</div>   
							
							<!-- Subtitulo da pagina -->
							<p class="subtitulo">
								<?php echo utf8_encode($dados_noticia['subtitulo']) ?>
							</p>
							
							<!-- Main Content -->
							<div id="content">
								
								<!-- imagem da pagina -->
								<div class="imagemNoticia">
									<img class="alignnone wp-image-79 size-full" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_noticia[imagem_noticia] ?>" alt="Ator">
								</div>
								
								<div class="textoNoticia">
								<!-- Textos da pagina -->
								<?= ($vip == true) ? $dados_noticia[texto]  : $dados_noticia[texto_naovip] ?>
								</div>
								
								<!-- Footer -->
								<?php include_once ($footer); ?>
								
							</div>
							<!-- End of Main Content -->
						</div>
					</div>
				</div>
				<!-- ## FIM Conteudo da pagina ## -->
			</div>
			<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
			
			<!-- Javascript tooltips do formulario -->
			<script>$(function(){ $('[data-toggle="cenaFavorita"]').tooltip()})</script>
			
			<!-- ##Botão Whatsapp no Rodape## -->
			<!-- Icone do whatsapp
				<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
				<!-- Icone do whatsapp
				<i style="margin-top:16px" class="fab fa-whatsapp"></i>
				<p>Atendimento</p>
				</a>
			-->
			
			<!--  Chama Modal - Modal Contato -->
			<?php include_once ($contato); ?>
			
			<!--  Chama Modal - Modal Duvidas Frequentes -->
			<?php include_once ($duvidas_frequentes); ?>
			
			<!--  Chama Modal - Modal Termos de Uso -->
			<?php include_once ($termos); ?>
			
			<?php
			require('includes/hotmidias/js.php');
		?>
			
		</body>
	</html>	