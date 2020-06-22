<?php require('config/configuracoes.php');
	
	//Defino a Chave do meu site
	$secret_key = '6Ld1yzYUAAAAAO8uV0rNO7jcmyM-Igcz6EQ8NdnO';
	
	//Pego a validação do Captcha feita pelo usuário
	$recaptcha_response = $_POST['g-recaptcha-response'];
	
	// Verifico se foi feita a postagem do Captcha 
	if(isset($recaptcha_response)){
		
		// Valido se a ação do usuário foi correta junto ao google
		$answer = 
		json_decode(
		file_get_contents(
		'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
		'&response='.$_POST['g-recaptcha-response']
		)
		);
		
		// Se a ação do usuário foi correta executo o restante do meu formulário
		if($answer->success) {
			
			// Carrego a classe PHPMailer através do Autoload
			include "phpmailer/PHPMailerAutoload.php";
			
			// Instancio a classe PHPMailer
			$msg = new PHPMailer();
			
			// Faço todas as configurações de SMTP para o envio da mensagem
			$msg->CharSet = "UTF-8";
			$msg->isSMTP();                                      
			$msg->Host = 'mail.hotboys.com.br';  
			$msg->SMTPAuth = true;                              
			$msg->Username = 'naoresponda@hotboys.com.br';                 
			$msg->Password = '2a5a8dfsdf7';                           
			$msg->Port = 587;   
			$msg->SMTPAutoTLS = false;
			$msg->AuthType = 'PLAIN';
			
			//Defino o remetente da mensagem
			$msg->setFrom('contatos@hotboys.com.br','HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$msg->addReplyTo($_POST['email'], $_POST['nome']);
			
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$msg->AddAddress('contato@hotmidias.com.br', 'Grupo Hot Mídias');
			
			// Defino o assunto que foi digitado no formulário
			$msg->Subject  = $_POST['assunto'];
			
			
			
			//recebendo campos do formulário
			$nome = addslashes(utf8_decode($_POST[nome]));
			$sobrenome = addslashes(utf8_decode($_POST[sobrenome]));
			$email = addslashes(utf8_decode($_POST[email]));
			$assunto = addslashes(utf8_decode($_POST[assunto]));
			$mensagem = addslashes(utf8_decode($_POST[mensagem]));
			
			// Defino a mensagem que foi digitada no formulário
			$msg->Body = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>E-mail</title>
			<style>
			body{
			font-family:Verdana, Geneva, sans-serif;
			font-size:13px;
			color:#666666;
			}
			
			
			</style>
			</head>
			
			<body>
			<b>Contato: Envie seu conto</b><br><br>
			<b>Nome:</b> '.$nome.' <br />
			<b>Email:</b> '.$email.'<br><br>
			<b>Suporte para o Site:</b> HOTBOYS <br /><br />
			<b>Assunto:</b> '.$assunto.'<br><br>
			
			<b>Sugestão:</b><br>'.$sugestao.'<br />
			
			</body>
			</html>';
			
			// Defino a mensagem alternativa que foi digitada no formulário.
			// Esta mensagem é utilizada para validações AntiSPAM e por isto
			// é muito recomendado que utilize-a
			$msg->AltBody = $_POST['mensagem'];
			
			// Faço o envio da mensagem
			$enviado = $msg->Send();
			
			// se enviado, carrega esta mensagem
			if ($enviado){
				
				$envio_sucesso = '
				<div class="animated bounceInLeft" id="fechar-mensagem-sucesso" style="float:left;width:100%">
				<div class="alert alert-success" style="text-align: center;">
				<strong>E-mail enviado com sucesso !</strong> 
				</div>
				</div>
				'
			?>
			
			<?php  
				// se der erro, carrega esta mensagem
				} else {
				$envio_erro = '<div class="animated bounceInLeft" id="fechar-mensagem-erro" style="float:left;width:100%">
				<div class="alert alert-danger" style="text-align: center;">
                <strong>Erro ! Não foi possível enviar o e-mail.</strong> Não se esqueça de preencher todos os campos.
				</div></div>'
			?>
			
			<?php 
				// se aparecer informacoes de erro, carrega esta mensagem
				$envio_info_erro = '<div class="animated bounceInLeft" id="fechar-mensagem-info-erro" style="float:left;width:100%">
				Informações do erro:</div>' . $msg->ErrorInfo;
			}
			
			// se o captcha nao for preenchido, carrega esta mensagem
			} else {
			$envio_captcha = '<div class="animated bounceInLeft" id="fechar-mensagem-captcha" style="float:left;width:100%">
			<div class="alert alert-warning" style="text-align: center;">
			Por favor, faça a verificação do captcha abaixo!
			</div></div>'
		?>
		
		
		<?php
		}
	}
	
?>
<!-- Fim Recaptcha Google --> 


<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		
		<!-- Titulo do Navegador -->
		<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
		
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="keywords"
		content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- Animate CSS - Animacao do novo css3 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		
		<!-- HEAD (Include) --> <?php include('includes/head.php') ?>        
	</head>
	<body id="body" class="fundo-preto"> 
		<div class="container">
			
			
			<!-- TOP (Include) --> 
			<div class="row" style="float:left;width:100%">
				<?php include('includes/top.php') ?>
			</div>
			
			
			<!-- titulo -->
			<div class="row" style="float:left;width:100%">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="contato_email-titulo">Sugira sua cena</h1>
				</div>
			</div>
			
			
			<!-- conteudo -->
			<div class="row" style="float:left;width:100%">
				<div class="text-justify col-md-9 texto-pagina-contato_trabalhe">
					
					<!-- Mensagem Captcha do formulario -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo $envio_captcha ?>
					</div>
					
					
					<!-- Mensagem de erro ao enviar o formulario -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo $envio_erro ?> 
					</div>
					
					
					<!-- Mensagem com informacoes de erro do formulario -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo $envio_info_erro ?>  
					</div>
					
					
					<!-- Mensagem de sucesso ao enviar formulario -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo $envio_sucesso ?> 
					</div>
					
					
					<!-- Javascript que fecha as mensagens de atualizacao depois de alguns segundos -->
					<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
					<script type="text/javascript"> 
						$('#fechar-mensagem-sucesso').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-captcha').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-erro').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-info-erro').hide().show('slow').delay(6000).hide('slow');
					</script>
					
					
					<!-- Texto abaixo do titulo -->
					<div class="container container-table">
						<div class="col-md-12 col-xs-12 contato_email-titulo-conteudo">
							<p>Ainda está com alguma dúvida e/ou necessita de alguma ajuda específica? Envie-nos sua dúvida que iremos responde-lo em breve.</p>
						</div>
					</div>
					
					
					<!-- INICIO - formulário -->
					<form  method="POST" name="form" action="" >  
						<div class="container margin-top-10">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
									<!-- Nome -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input class="form-control sel1" name="nome" id="sel1" value="" required/>
										<span class="unit">Nome:</span>
									</div>
									
									<!-- Email -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input class="form-control sel1" type="E-mail" name="email" id="sel1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
										<span class="unit">E-mail*:</span>
									</div>
									
									<!-- Assunto -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input
										class="form-control sel1" name="assunto" id="sel1" required/>
										<span class="unit">Assunto:</span>
									</div>
									
									<!-- Conto -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box  form-group">
											<textarea class="form-control sel1" id="sel1" name="sugestao" rows="3" required></textarea>
											<span class="unit">Sugestao:</span>
										</div>
									</div>
									
									
									<!-- ReCaptcha do Google para preenchimento dos formulários -->
									<div class="container recaptcha">
										<div class="row">
											<div class="g-recaptcha" data-sitekey="6Ld1yzYUAAAAABxjm37Y8S36R8TpwoIXKkjq_Ers"></div>
										</div>
									</div>
									
									
									
									<!-- Botão Enviar formulário -->
									<label for="bt-enviar-form">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botao-vermelho-enviar text-justify">
											<input type="hidden" name="acao" value="enviar"/>
											<div class="envia-contato">
												<input type="submit" value="Enviar" name="enviar" id="bt-enviar-form"/>
											</div>
										</div>
									</label>
									
									
								</div>
							</div>
						</form>
						<!-- FIM - Formulario -->    
						
						
						
						<!-- Mensagem Enviada -->
						<div id="mensagem-enviada"></div>
						
					</div>
				</div>
			</div>
			
			
			<!-- FOOTER (Include) --> 
			<?php include('includes/footer.php') ?>
			
			<!-- JAVASCRIPTS PADROES (Include) -->					
			<?php 
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}
			?>
			
		</div>
	</body>
</html>																																																																										