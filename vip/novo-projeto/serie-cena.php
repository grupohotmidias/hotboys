<?php
	// variaveis dos arquivos de configuracao
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//Variavel perfil do usuario
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//variavel do nav topo
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';
	
	//variavel que puxa o modal de contato
	$contato = '../novo-projeto/includes/modal/rodape/contato.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//Variaveis dos arquivos de configuracao
	include_once($vip_page);
	
	//Variaveis dos arquivos de configuracao
	include_once($perfil_usuario);
	
	// tras id
	$id = addslashes($_GET[id]);
	
	$query_serie = "SELECT * FROM `cena_serie_info` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id' LIMIT 1 ";
	$consulta_serie = mysql_query($query_serie);
	$row_serie = mysql_fetch_array($consulta_serie);
    $ordem = $row_serie[ordem];
	
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	//cria um registro na tebela visita com data
	//1=modelo   2=cena 
    /////Consulta se essa cena já teve alguma visulização hoje
    $dataAtual=date('Y-m-d');
    $sql = mysql_query("SELECT * FROM `visita_cenas` WHERE `data` = '".$dataAtual."' AND `id_cenas` = '".$id."'");
    $resgistros = mysql_num_rows($sql);
	
    /////Se essa cena já tiver alguma visualização hoje, somamos mais uma visualização fazendo o update na tabela ... Afinal de contas a cena esta sendo visualizada nesse momento
    if($resgistros > 0){
        mysql_query("UPDATE `visita_cenas` SET `quatidade_visualizacao` = `quatidade_visualizacao` + 1 WHERE `data` = '".$dataAtual."' AND `id_cenas` = '".$id."'") or die(mysql_error());
		////Se essa cena ainda não teve visualização hoje, adicionamos a primeira visualização do dia, fazendo um insert na tabela
		}else{
        mysql_query ("INSERT INTO `visita_cenas` (`id`, `id_cenas`, `data`, `quatidade_visualizacao`) VALUES (NULL , '".$id."', '".$dataAtual."', '1')") or die(mysql_error());
	}
	mysql_query ("INSERT INTO visita_conteudo (`id`, `id_conteudo`, `tipo`, `data`) VALUES (NULL , '$id',     '2',  NOW())") or die(mysql_error());
	if($row_serie[descricaoContent]=="") {
		$texto = $row_serie[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $row_serie[descricaoContent];
		$description = substr($texto ,0,156);
	}
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="pt-BR">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Hot Boys O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
	</head>
	
	<body class="vip serie">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>
			
			<!-- Menu sidebar + conteudo da pagina -->
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="app-main__outer">
                    <div class="app-main__inner">
						
						<!-- ## INICIO background da cena ##-->
						<?php 
							if($row_serie['imagem_serie_background'] != ''){ ?>
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background"] ?>" style="width:100%;vertical-align:text-top;padding-right:10px">
						<?php } ?>
						<?php 
							if($row_serie['imagem_serie_background_png'] != ''){ ?>
							<!-- Imagem PNG no fundo da serie (Final da imagem) -->
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $row_serie["imagem_serie_background_png"] ?>" style="width:100%;vertical-align: top;padding-right:10px"/>
						<?php } ?>
						<!-- ## FIM background da cena ##-->
						
						<div class="conteudoTudo"> 
							
							<div class="app-page-title">
								<div class="page-title-wrapper">
									
									<!-- Titulo do conteudo -->
											<h4 class="modelo-nome mx-auto"><?php echo utf8_encode(ucfirst($row_serie[titulo])); ?></h4>
										
									</div>
									
								</div>
							
							
							<!-- Main Content -->
							<div id="content">
								
								<!-- Video da serie -->
								<?php // verifica se existe video code
									if($row_serie[teaser_code] != ''){?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto cena-video-espaco-largura-cheia p-0">
										<div class="col-lg-9" style="float: none!important;margin:0 auto;padding:0">
											<div class="video-sprout">
												<?php echo $row_serie[teaser_code]; ?>
											</div>
										</div>
									</div>
								<?php } ?>
								<!-- End of Main Content -->
								
							</div>
						</div>
						</div> 
					</div>
					<!-- ## FIM Conteudo da pagina ## -->
					
				</div>
				
				<!-- Javascript Principal -->
				<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
				
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
				
			</body>
		</html>																	