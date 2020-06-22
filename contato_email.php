<?php 
	function my_file_get_contents( $site_url ){
	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL, $site_url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	ob_start();
	curl_exec($ch);
	curl_close($ch);
	$file_contents = ob_get_contents();
	ob_end_clean();
	return $file_contents;
}

	require('config/configuracoes.php');
	require_once('includes/funcoes.php');
	

	//Defino a Chave do meu site
	$secret_key = '6Ld1yzYUAAAAAO8uV0rNO7jcmyM-Igcz6EQ8NdnO';
	
	//Pego a validação do Captcha feita pelo usuário
	$recaptcha_response = $_POST['g-recaptcha-response'];
	
	// Verifico se foi feita a postagem do Captcha 
	if(isset($recaptcha_response)){
		
		// Valido se a ação do usuário foi correta junto ao google
		$answer = json_decode(my_file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']));
		
		// Se a ação do usuário foi correta executo o restante do meu formulário
		if($answer->success) {
			
			// Carrego a classe PHPMailer através do Autoload
			include "phpmailer/PHPMailerAutoload.php";
			
			//recebendo campos do formulário
			$nome = addslashes(utf8_decode($_POST[nome]));
			$sobrenome = addslashes(utf8_decode($_POST[sobrenome]));
			$email = addslashes(utf8_decode($_POST[email]));
			$assunto = addslashes(utf8_decode($_POST[assunto]));
			$mensagem = addslashes(utf8_decode($_POST[mensagem]));
			
			
			// Defino a mensagem que foi digitada no formulário
			$msg = '
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
			<b>Contato de E-mail</b><br><br>
			<b>Nome:</b> '.$nome.' '.$sobrenome.' <br />
			<b>Email:</b> '.$email.'<br>
			<b>Suporte para o Site:</b> HOTBOYS <br />
			<b>Assunto:</b> '.$assunto.'<br />			
			<b>Mensagem:</b> '.$mensagem.'<br /><br />
			Email enviado pelo link: https://www.hotboys.com.br/email
			
			</body>
			</html>';
			
			
			// Instancio a classe PHPMailer
			$mail = new PHPMailer();
			
			$mail->IsSMTP();
			$mail->IsHTML(true); // envio como HTML se 'true'
			$mail->Host = 'mail.hotboys.com.br'; // servidor SMTP
			$mail->Username = 'naoresponda@hotboys.com.br'; // conta SMTP
			$mail->Password = 'ddF2{;t_m4,+'; // senha SMTP
			$mail->Port = 587; //porta SMTP
			$mail->SMTPAuth = true;
			
			$mail->Body = $msg; //Corpo da mensagem HTML
			
			//Defino o remetente da mensagem
			$mail->setFrom('contatos@hotboys.com.br','HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$mail->addReplyTo(utf8_decode($_POST['email']), utf8_decode($_POST['nome']));
			
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$mail->AddAddress('contato@hotmidias.com.br', 'Grupo Hot Midias');
			
			// Defino o assunto que foi digitado no formulário
			$mail->Subject = 'Contato do site Hotboys - Email'; // Assunto
			
			// Faço o envio da mensagem
			$enviado = $mail->Send(); //envia email
			
			
			
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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title>Contato por Email - Site Hot Boys</title>
		<meta name="keywords"
		content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description"
		CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- Animate CSS - Animacao do novo css3 -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		
		
		<!-- HEAD (Include) --> 
		
		<?php include('includes/head.php') ?>        
	</head>
	<body id="body" class="fundo-preto"> 
		
		
		<!-- TOP (Include) --> 
		<?php include('includes/top2.php') ?>
		
		<div class="container-tudo">
			
			<!-- Título H1 da pagina -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="contato_email-titulo" style="border-left:0!important;padding-left:0!important">
				<span class="icone-pimenta-titulo"></span>Contato</h1>
			</div>
			
			<div class="container">
				<div class="row centralizada">
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
						
						
						<!-- Script que fecha as mensagens de atualizacao depois de alguns segundos -->
						<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
						<script type="text/javascript"> 
							$('#fechar-mensagem-sucesso').hide().show('slow').delay(6000).hide('slow');
							$('#fechar-mensagem-captcha').hide().show('slow').delay(6000).hide('slow');
							$('#fechar-mensagem-erro').hide().show('slow').delay(6000).hide('slow');
							$('#fechar-mensagem-info-erro').hide().show('slow').delay(6000).hide('slow');
						</script>
						
						
						<div class="container container-table">
							<div class="col-md-12 col-xs-12 contato_email-titulo-conteudo">
								<h2 class="contato_email-titulo-conteudo">E-mail</h2>
								<p>Ainda está com alguma dúvida e/ou necessita de alguma ajuda específica? Envie-nos sua dúvida que iremos responde-lo em breve.</p>
							</div>
						</div>
						
						
						<!-- Comeco do formulário -->
						<form  method="POST" name="form" action="" >  
							<div class="container margin-top-10">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-6 col-sm-12 col-xs-12 input-box form-group">
											<input class="form-control sel1" name="nome" id="sel1" value="" autofocus required/>
											<span class="unit">Nome:</span>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
											<input class="form-control sel1" name="sobrenome" id="sel1" value="" required/> 
											<span class="unit-direita">Sobrenome:</span>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input class="form-control sel1" type="E-mail" name="email" id="sel1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
										<span class="unit">E-mail*:</span>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input
										class="form-control sel1" name="assunto" id="sel1" required/>
										<span class="unit">Assunto:</span>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box  form-group">
											<textarea class="form-control sel1" id="sel1" name="mensagem" rows="3" required></textarea>
											<span class="unit">Mensagem:</span>
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
						</form><!-- Fim do Formulario -->    
						
						<div id="mensagem-enviada">
							
						</div>
						
						
						
						
					</div>
				</div>
			</div>
		</div><!-- Fim do container-tudo -->
		
		
		
		
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
		
	</body>
</html>																																																																						