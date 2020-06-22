<?php
	
    require('../../config/configuracoes.php');		
	require_once('../../includes/funcoes.php');	
    include('../includes/vip.php');	
	
	
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
		
		//verifica se usuario j� votou na enquete
		$queryVer = "SELECT * FROM `enquetes_votos` WHERE id_enquete='$linha[id]' AND ip='$ipUsuario'";
		$consultaVer = mysql_query($queryVer);
		$totalVer = mysql_num_rows($consultaVer);	
		
		if($totalVer == 0){
			//ainda n�o votou	
			$idsEnquetes[] = $linha[id];				
		}	
	}
	
	if(count($idsEnquetes) < 1){
		//n�o possui enquetes, ou j� votou	
		if($linha[exibir_resultado] == Sim){
			header("Location: ../resultado-audicoes.php");
			}else{
			header("Location: ../ja-votou");
		}
		exit();			
	}
	
	require_once('../votacao/includes/xajax/xajax_core/xajax.inc.php');
	$xajax = new xajax();		
	require_once('../votacao/includes/xajax-enquete.php');
	$xajax->processRequest();
	$xajax->configure('javascript URI',  '//www.hotboys.com.br/vip/votacao/includes/xajax/');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="width=device-width, initial-scale=1" name="viewport" /> 
		<meta charset="UTF-8">
		<title><?php echo utf8_encode('Enquete - Hotboys.com.br') ?></title>
		<link rel="stylesheet" href="votacao/includes/estilo.css?v=<?php echo Version; ?>" type="text/css" />
		<?php $xajax->printJavascript(); ?>
		
		
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
		<?php include('../../includes/head.php') ?>
		
	</head>
	
	<body class="fundo-preto" style="padding:0!important">
		
		
		<div class="votacao-audicoes">
		
		<!-- Topo (Include) -->
			<div class="row" style="float:left;width:100%">
				<?php include('../../includes/top.php') ?>
			</div>
			
			<!-- Acima do conteudo da pagina -->
			<div class="row" style="float:left;width:100%">
				
				<!-- imagens circulos dos participantes -->
				<div class="col-lg-12 col-md-12 texto-pagina-contato_trabalhe">
					<!-- Cabecograma dos participantes (Include) -->
					<?php include('../includes/cabecograma_g.php'); ?>
				</div> 
			</div>
			
			<div class="col-md-12 col-xs-12">
				
				<!-- Imagem - logo da vota��o -->
					<div class="row marcador align-items-center">
						<div class="col mx-auto text-center logo-eliminacao">
							<img src="<?php echo URL ?>imagens/audicoes/votacao/logo-eliminacao-audicoes.png"/>
						</div>
					</div>
				
			</div>
			
			
			<!-- Chamada/Texto da enquete -->
			<div class="col-lg-9 col-md-12 texto-pagina-contato_trabalhe">
				<div class="col-lg-12 col-xs-12">
					<h1 class="chamada-enquete"><?php echo utf8_encode('ELIMINE 2 PR�-CANDIDATOS (1 ATIVO E 1 PASSIVO) PARA SA�REM DAS AUDI��ES HOT 3') ?></h1>
				</div>
				
				<!-- Conteudo da enquete -->
				<div id="enquete-index">
					
					<!-- Inicio do form -->
					<form id="form_enquete" name="form_enquete" method="post" onSubmit="xajax_votar(xajax.getFormValues('form_enquete')); return false;">
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
								<span class="icone-pimenta-titulo"></span> <?php echo utf8_encode($linha[pergunta]) ?></h1>
							</div>
							
							<!-- Participantes / Alternativas -->
							<div class="col-lg-12 col-xs-12 alternativas">
								<?php
									//consulta alternativas
									$queryAlternativas = "SELECT * FROM `enquetes_alternativas` WHERE id_enquete='$linha[id]' order by id";
									$consultaAlternativas = mysql_query($queryAlternativas);
									while($linhaAlternativa = mysql_fetch_array($consultaAlternativas)){
										
									?>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6  alternativa">
										<label>
											<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
												
												<!-- Imagem do participante -->
												<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/<?php echo $linhaAlternativa[imagem_audicao] ?>"/>
												
												<!-- Icone de voto -->
												<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado<?php echo $counter4++ ?>" style="visibility:hidden">
											</div>
											<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
										</label>
										
										<!-- Nome do participante -->
										<h2><?php echo utf8_encode($linhaAlternativa[alternativa]) ?></h2>
										
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						
						<!-- Botao Votar -->
						<div class="col-lg-12 col-xs-12">
							<div id="botao">
								<input type="submit" value="Votar" />
							</div>
						</div>
						
					</form>
					<!-- Fim do form -->
					
				</div>
			</div>
		</div>
	
	
	
	<!-- FOOTER (Include) -->
	<?php include('../../includes/footer.php'); ?>
	
	
	<!-- JAVASCRIPTS PADROES (Include) -->					
	<?php 
		if ($detect->isMobile()) { 
			include ('../../includes/javascript-mobile.php'); 
			}else{
			include ('../../includes/javascript.php'); 
		}
	?>

		<!-- Jquery do botao selecionado (votacao) -->
			<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="	crossorigin="anonymous"></script>	
			
			<!-- Botao selecionado (Votacao) -->
			<script src="../../js/botao-selecionado-votacao.js?v=<?php echo Version; ?>"></script>
			
			<!-- Javascript Hover - Cabecograma Audicoes hot3 -->
			<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>
			
			<!-- Javascript do Cabecograma-->
			<script src="../../js/cabecograma.js?v=<?php echo Version; ?>"></script>
	
</body>
</html>
