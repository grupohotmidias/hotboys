<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
		
	// chama o menu audicoes
	$menu_audicoes ='../novo-projeto/includes/estrutura/topo/audicoes/menu-audicoes.php';
	
	$naoVerificarPagamento = true;
	
	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento estao ok	
		verificar_pgto();
	}
	
	$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	$email_cliente_logado = $_SESSION[email_cliente_logado];
	
	if($_SESSION[email_cliente_logado] !=''){
		//consulta se usuario ja exite no bd 
		$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
		$consulta_user = mysql_query($query_user);
		$total_user = mysql_num_rows($consulta_user);
		
		//cadastra o email no banco de user caso o perfil dele nao esteja prenchido
		if($total_user < 1){
			
			$query = "INSERT INTO `usuarios_perfil`(
			`id`, 
			`primeiro_nome`, 
			`email`, 
			`nome_exibicao`,
			`foto_perfil`
			) VALUES (
			NULL , '', '$email_cliente_logado','','')";
			
			$status = mysql_query($query);
			
		}//FIM total user
	}// FIM consulta user
	
	
	//imagem do perfil
	if($vip == true){ 
		if($dados_user['foto_perfil'] == ''){
			//não tem foto de perfil
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';		
			} else {
			//tem foto de perfil
			//$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';	
		}
	}
	
	// tras dados de favoritos
	$query_fav = "SELECT * FROM `usuarios_favoritos` WHERE `id_conteudo`='$id' AND `id_usuario`='$id_usuario'";
	$consulta_fav = mysql_query($query_fav);
	$total_fav = mysql_num_rows($consulta_fav);
	$dados_fav = mysql_fetch_array($consulta_fav);
	
	// cenas audicoes
	$query_audicoes = "SELECT * FROM `audicoes_cenas` ORDER BY ordem DESC";
	$consulta_audicoes  = mysql_query($query_audicoes);
	$total_audicoes = mysql_num_rows($consulta_audicoes);
	
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Audições HOT 3 - Site Hotboys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
	</head>
	
	<body class="vip audicoes participantes">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
			<!-- Nav/menu fixo do topo-->
			<?php include_once ($nav); ?>
			
			<div class="conteudoTudo">
			
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
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
						
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <h5>Lista de Participantes</h5>
								</div>
							</div>
						</div>
						
						<!-- Main Content -->
						<div id="content">
							<section class="modelos mt-1">
								<div class="container-fluid">
									<div class="row">
										<!-- CENAS -->
										<ul style="width:100%">
											<!-- Consulta cenas -->
											<?php // consulta das cenas
												$query_modelos="SELECT * FROM `modelos` WHERE audicoes='Sim' ORDER BY nome ASC LIMIT 10";
												$consulta_modelos=mysql_query($query_modelos);
											?>
											<?php while ($row_modelos=mysql_fetch_array ($consulta_modelos)){ ?>
												<li class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 cenas p-1">
													<a href="<?php echo URL_VIP.'ator/'.$row_modelos[id].'/'.URL_amigavel($row_modelos[nome])?>">
														<div class="card mb-2 box-shadow my-xl-2">
															
															<!-- imagens dos modelos -->
															<div class="thumb mb-0">
																<img class="card-img-top <?php //if($row_modelos['eliminado'] =='Sim'){echo "eliminado"; } ?>" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo ($row_modelos[modelo_perfil]) ?>" data-holder-rendered="true">
															</div>
															
															<!-- nomes dos modelos -->
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_modelos['nome'])?></h1>
																
																<!--
																	<div class="curtidas d-flex justify-content-between align-items-center">
																	<div class="btn-group">
																	<button type="button" class="btn btn-sm like">
																	<img src="<?php echo URL ?>novo-projeto/assets/img/icones/like.png"/> 22
																	</button>
																	<button type="button" class="btn btn-sm deslike">
																	<img src="<?php echo URL ?>novo-projeto/assets/img/icones/deslike.png"/> 0
																	</button>
																	</div>
																	
																	<!-- Botao para adicionar a cena como favoritada 
																	<div class="addFavoritos">
																	<a href="" style="padding: 14px">
																	<i class="fas fa-star" aria-hidden="true" data-toggle="cenaFavorita" data-placement="top" title="Escolha a cena como favorita"></i> 
																	</a>
																	</div>
																	
																	</div>
																-->
															</div>
															
														</div>
													</a>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								
							</section>
							
							<!-- Footer -->
							<?php include_once ($footer); ?>
							
						</div>
						<!-- End of Main Content -->
						
					</div> 
					
				</div> 
				
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