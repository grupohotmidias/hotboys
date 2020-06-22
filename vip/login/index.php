<?php
	
	header("Location: https://www.hotboys.com.br/vip/index.php");
	exit();
	
	
	
	session_start();
	
	
	#####Clicou em sair
	if(addslashes($_GET[acao])=='sair'){
		unset($_SESSION[email_cliente_logado]);
		unset($_SESSION[verificar_pgto]);
		$msgErro = 'Você se desconectou!';
        header("Refresh: 1;url=https://hotboys.com.br/");
		
	}
	

	
	
	
	
	require_once('includes/xajax/xajax_core/xajax.inc.php');
	$xajax = new xajax();
	require_once('includes/xajax-login.php');
	$xajax->processRequest();
	
	$xajax->configure('javascript URI', 'includes/xajax/');
	
	
?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Acesse Já - Área Vip - HotBoys.</title>
		
		<!-- Favicon - Navegador -->
		<link rel="shortcut icon" href="https://www.hotboys.com.br/favicon.ico" >
		
		<meta name="theme-color" content="#000">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="layout/login-estilo.css" type="text/css" media="all" /> 
	</head>
	<?php $xajax->printJavascript(); ?>
	<body>
		
		
		<?php
			if(addslashes($_GET[msg])=='usuario_bloqueado_videos_hot'){
			?>  
			
			<div id="msg-alerta-topo">
				ATENÇÃO: Para continuar assistindo os vídeos você precisa se logar ou aguardar 24 horas!
			</div>
			<?php
			}
		?>    	
		
		
		
		
		
		<div class="card" id="conteudo">
			
			<div id="logo">
				<a href="https://www.hotboys.com.br" ><img style="margin-top: 5px;width: 65%;" src="https://www.hotboys.com.br/imagens/logos/logo-topo-escuro.png" /></a>
			</div>
			
			
			
			
			<div id="titulo">&nbsp;&nbsp;Login - Área Vip</div>
			
			
			
			<div id="formulario">
				<form name="formulario_login" id="formulario_login" onSubmit="xajax_login(xajax.getFormValues('formulario_login')); return false;" style="margin-bottom: 5px;">
					<div class="formulario-linha">
						<div class="formulario-linha-icone"><img src="layout/login-email.png" /></div>
						<div class="formulario-linha-campo">
							<input type="text" class="formulario-linha-campo-input" placeholder="Digite seu e-mail" id="login_email" name="login_email" />
						</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
					
					
					<div class="formulario-linha">
						<div class="formulario-linha-icone"><img src="layout/login-senha.png" /></div>
						<div class="formulario-linha-campo">
							<input type="password" class="formulario-linha-campo-input" placeholder="Digite sua senha" id="login_senha" name="login_senha" />
						</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
					
					
					
					<div id="links">
						<div id="link-esq"><a href="javascript:void(0);" onclick="xajax_recuperar_senha({email:login_email.value})" >Esqueci a minha senha</a></div>
					</div>
					<div class="c"></div>
					
					
					
					<div id="mensagem-sucesso"></div>
					<div id="mensagem-erro" <?php if($msgErro != '') echo 'style="display:block"' ?> ><?php echo $msgErro ?></div>
					
					
					
					
					
					<div class="formulario-btn-enviar">
						<!-- botao entrar -->
						<input type="submit" value="ENTRAR" />
						<!-- botao criar conta -->
						<a href="https://www.gpagamentos.com.br/1/">
							<div>CRIAR A SUA CONTA</div>
						</a>
					</div> 
					
				</form>       
			</div>
            
			
			
		</div>
		
		
		
		
		
		<script src="js/login-jquery-1.11.1.min.js"></script>
		<script>
			$(function(){
				function ajustarCentro(){
					alturaJanela = $(window).height();
					alturaConteudo = $("#conteudo").height();
					
					$('#conteudo').css("margin-top", ((alturaJanela - alturaConteudo) / 2)+"px");	
				}	 
				ajustarCentro();
			}); 
		</script>
		
		
		<?php
			if(addslashes($_GET[msg])=='pagamento_ok'){
				echo '<script>alert("Seu acesso está liberado, faça o login para entrar na área VIP!");</script>';
			}
		?> 
		
		
		
		
	</body>
</html>
