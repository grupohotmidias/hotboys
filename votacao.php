<?php
	
    require('config/configuracoes.php');		
	require_once('includes/funcoes.php');
	
	$counter=1;
	$counter2=1;
	$counter3=1;
	$counter4=1;
	
	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento esta ok	
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
	
	
	$ipUsuario = $_SERVER[REMOTE_ADDR];
	unset($idsEnquetes);
	$queryEnquetes = "SELECT * FROM `enquetes` WHERE status='ativo' order by pergunta ASC";
	$consultaEnquetes = mysql_query($queryEnquetes);
	
	while($linha = mysql_fetch_array($consultaEnquetes)){
		
		//verifica se usuario j· votou na enquete
		$queryVer = "SELECT * FROM `enquetes_votos` WHERE id_enquete='$linha[id]' AND ip='$ipUsuario'";
		$consultaVer = mysql_query($queryVer);
		$totalVer = mysql_num_rows($consultaVer);	
		
		if($totalVer == 0){
			//ainda n„o votou	
			$idsEnquetes[] = $linha[id];				
		}	
	}
	if(count($idsEnquetes) < 1){
		//n„o possui enquetes, ou j· votou	
		if($linha[exibir_resultado] == Sim){
			header("Location: /");
			}else{
			header("Location: /");
		}
		exit();			
	}
	
	require_once('vip/votacao/includes/xajax/xajax_core/xajax.inc.php');
	$xajax = new xajax();		
	require_once('vip/votacao/includes/xajax-enquete.php');
	$xajax->processRequest();
	$xajax->configure('javascript URI',  '//www.hotboys.com.br/vip/votacao/includes/xajax/');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="width=device-width, initial-scale=1" name="viewport" /> 
		<meta charset="UTF-8">
		<title>üå∂Ô∏è <?php echo utf8_encode('Vota√ßao Audi√ß√µes Hot 3 - Hotboys.com.br') ?></title>
		<link rel="stylesheet" href="vip/votacao/includes/estilo.css?v=<?php echo Version; ?>" type="text/css" />
		
		<!-- Animate CSS - Animacao do novo css3 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		
		<!-- CSS Principal - Cabecograma -->
		<link rel="stylesheet" href="<?php echo URL ?>css/votacao-audicoes.css?v=<?php echo Version; ?>">
		
		<!-- CSS Principal - Cabecograma -->
		<link rel="stylesheet" href="<?php echo URL ?>css/cabecograma-hotboys.css?v=<?php echo Version; ?>">
		
		<!-- Efeito hover no cabecograma -->
		<link rel="stylesheet" href="<?php echo URL ?>css/hover.css?v=<?php echo Version; ?>">
		
		<!-- CSS da pagina -->
		<link rel="stylesheet" href="<?php echo URL ?>css/audicoes.css?v=<?php echo Version; ?>">
		
		
		
		<!-- HEAD (Include) -->
		<?php include('includes/head.php') ?>
		
		<style>
			.votacao-audicoes .alternativa label{cursor: auto!important;}
			.votacao-audicoes #botao{margin-top: 1rem; margin-bottom: 2rem;}
			.votacao-audicoes .pergunta{width: 100%;margin: 0 auto;float: none;margin-left: 0!important;padding-left: 0;text-align: center!important;margin-bottom: 15px;}
			@media (min-width: 768px) {.votacao-audicoes #botao img{width: 40%;}}
			@media (max-width: 767.98px) {.votacao-audicoes #botao img{width: 80%;}}
			
		</style>
		
	</head>
	
	<body class="fundo-preto" style="padding:0!important">
		
		
		<div class="votacao-audicoes">
			
			<!-- Topo (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include('includes/top.php') ?>
			</div>
			
			<!-- Acima do conteudo da pagina -->
			<div class="row" style="float:left;width:100%">
				
				<!-- imagens circulos dos participantes -->
				<div class="col-lg-12 col-md-12 texto-pagina-contato_trabalhe">
					<!-- Cabecograma dos participantes (Include) -->
					<?php include('includes/cabecograma_g.php'); ?>
				</div> 
			</div>
			
			<div class="col-md-12 col-xs-12">
				
				<!-- Imagem - logo da votaÁ„o -->
				<div class="row marcador align-items-center" style=" background-color:#00000087;margin-top: 14px;">
					<div class="col mx-auto text-center logo-eliminacao">
						<img src="<?php echo URL ?>imagens/audicoes/votacao/logo-iphone-audicoes.png"/>
					</div>
				</div>
				
			</div>
			
			
			<!-- Chamada/Texto da enquete -->
			<div class="col-lg-9 col-md-12 texto-pagina-contato_trabalhe">
		
				
				<!-- Conteudo da enquete -->
				<div id="enquete-index">
					
					<!-- Inicio do form -->
					<form>
						<?php	
							foreach($idsEnquetes as $idEnquete){
								//pega infos da enquete
								$queryEnquete = "SELECT * FROM `enquetes` WHERE id='$idEnquete'";
								$consultaEnquete = mysql_query($queryEnquete);
								$linha = mysql_fetch_array($consultaEnquete);
							?>
							
							<!-- Titulo da Enquete -->
							<div class="col-lg-12 col-xs-12">
								<h1 class="pergunta" style="">
								<img src="https://www.hotboys.com.br/imagens/pimenta-votacao.png"> Escolha o vencedor do iPhone:</h1>
							</div>
							
							<!-- Participantes / Alternativas -->
							<div class="col-lg-12 col-xs-12 alternativas">
								<?php
									//consulta alternativas
									$queryAlternativas = "SELECT * FROM `enquetes_alternativas` WHERE id_enquete='$linha[id]' order by id";
									$consultaAlternativas = mysql_query($queryAlternativas);
									while($linhaAlternativa = mysql_fetch_array($consultaAlternativas)){
										
									?>
									
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4  alternativa" style="padding:2px">
										<label>
											<a href="<?php echo URL ?>assine">
												<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
													
													<!-- Imagem do participante -->
													<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/<?php echo $linhaAlternativa[imagem_audicao] ?>"/>
													
												</div>
												<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
												<!-- Nome do participante -->
												<h2 style="text-align: left;margin: 0!important;    overflow: hidden;   text-overflow: ellipsis;white-space: nowrap;padding-bottom: 12px;"><?php echo utf8_encode($linhaAlternativa[alternativa]) ?></h2>
											</a>
										</label>
									</div>
									
								<?php } ?>
							</div>
						<?php } ?>
						
						<!-- Botao Votar -->
						<div class="col-lg-12 col-xs-12">
							<a href="<?php echo URL ?>assine">
								<div id="botao">
									<img src="https://www.hotboys.com.br/imagens/audicoes/botao_sofa_assine.png"/>
								</div>
							</a>
						</div>
						
					</form>
					<!-- Fim do form -->
					
				</div>
			</div>
		</div>
		
		
		
		<!-- FOOTER (Include) -->
		<?php include('includes/footer.php'); ?>
		
		
		<!-- JAVASCRIPTS PADROES (Include) -->					
		<?php 
			if ($detect->isMobile()) { 
				include ('includes/javascript-mobile.php'); 
				}else{
				include ('includes/javascript.php'); 
			}
		?>
		
		<!-- Jquery do botao selecionado (votacao) -->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="	crossorigin="anonymous"></script>	
		
		<!-- Botao selecionado (Votacao) -->
		<script src="js/botao-selecionado-votacao.js?v=<?php echo Version; ?>"></script>
		
		<!-- Javascript Hover - Cabecograma Audicoes hot3 -->
		<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>
		
		<!-- Javascript do Cabecograma-->
		<script src="js/cabecograma.js?v=<?php echo Version; ?>"></script>
		
	</body>
</html>
