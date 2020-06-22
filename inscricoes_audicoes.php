<?php
	//cria a função cURL 
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
	
	//require('../traducao/traducoes.php');
	//verifica_url_traducao();
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	
	set_time_limit( 0 );
	
	//Defino a Chave do meu site
	$secret_key = '6Ld1yzYUAAAAAO8uV0rNO7jcmyM-Igcz6EQ8NdnO';
	
	//Pego a validação do Captcha feita pelo usuário
	$recaptcha_response = $_POST['g-recaptcha-response'];
	
	// Verifico se foi feita a postagem do Captcha 
	if(isset($recaptcha_response)){
		
		// Valido se a ação do usuário foi correta junto ao google
		$answer = 
		json_decode(
		my_file_get_contents(
		'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
		'&response='.$_POST['g-recaptcha-response']
		)
		);
		
		
		if($answer->success) {
			
			// Carrego a classe PHPMailer através do Autoload
			include "phpmailer/PHPMailerAutoload.php";
			
			
			//recebendo campos do formulário
			$nome = addslashes( utf8_decode( $_POST[ nome ] ) );
			$posicao_sexual = addslashes( utf8_decode( $_POST[ posicao_sexual ] ) );
			$estado = addslashes( utf8_decode( $_POST[ estado ] ) );
			$cidade = addslashes( utf8_decode( $_POST[ cidade ] ) );
			$email = addslashes( utf8_decode( $_POST[ email ] ) );
			$whatsapp = addslashes( utf8_decode( $_POST[ whatsapp ] ) );
			$instagram = addslashes( utf8_decode( $_POST[ instagram ] ) );	
			
			if ( $_FILES[ imagem1 ][ name ] != '' ) {
				$imagem1 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem1 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem1 ][ tmp_name ], 'temp/' . $imagem1 ) ) {
					unset( $imagem1 );
				}
			}
			
			
			
			if ( $_FILES[ imagem2 ][ name ] != '' ) {
				$imagem2 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem2 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem2 ][ tmp_name ], 'temp/' . $imagem2 ) ) {
					unset( $imagem2 );
				}
			}
			
			
			
			if ( $_FILES[ imagem3 ][ name ] != '' ) {
				$imagem3 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem3 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem3 ][ tmp_name ], 'temp/' . $imagem3 ) ) {
					unset( $imagem3 );
				}
			}
			
			
			
			if ( $_FILES[ imagem4 ][ name ] != '' ) {
				$imagem4 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem4 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem4 ][ tmp_name ], 'temp/' . $imagem4 ) ) {
					unset( $imagem4 );
				}
			}
			
			
			
			if ( $_FILES[ imagem5 ][ name ] != '' ) {
				$imagem5 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem5 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem5 ][ tmp_name ], 'temp/' . $imagem5 ) ) {
					unset( $imagem5 );
				}
			}
			
			
			if ( $_FILES[ imagem6 ][ name ] != '' ) {
				$imagem6 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem6 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem6 ][ tmp_name ], 'temp/' . $imagem6 ) ) {
					unset( $imagem6 );
				}
			}
			
			
			if ( $_FILES[ imagem7 ][ name ] != '' ) {
				$imagem7 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem7 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem7 ][ tmp_name ], 'temp/' . $imagem7 ) ) {
					unset( $imagem7 );
				}
			}
			
			
			if ( $_FILES[ imagem8 ][ name ] != '' ) {
				$imagem8 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ imagem8 ][ name ];
				if ( !move_uploaded_file( $_FILES[ imagem8 ][ tmp_name ], 'temp/' . $imagem8 ) ) {
					unset( $imagem8 );
				}
			}
			
			
			$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>E-mail</title>
			
			<style>
			body{
			font-family:Verdana, Geneva, sans-serif;
			font-size:13px;
			color:#666666;}
			</style>
			</head>
			<body>
			
			<b>Site HOTBOYS:</b> Formulario vindo do Site HOTBOYS<br /><br />
			<b>Nome:</b> ' .$nome. '<br />
			<b>Posicao sexual:</b> ' .$posicao_sexual. '<br />
			<b>Estado:</b> ' . $estado. '<br />
			<b>Cidade:</b> ' . $cidade. '<br />
			<b>E-mail:</b> ' .$email. '<br />
			<b>Whatsapp:</b> ' .$whatsapp. '<br />
			<b>Instagram:</b> instagram.com/'.$instagram. ' <br/><br/>
			Email enviado pelo link: https://www.hotboys.com.br/seja-um-modelo
			
			</body>
			</html>';
			
			// Instancio a classe PHPMailer
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->IsHTML(true); // envio como HTML se 'true'
			$mail->Host = 'mail.hotboys.com.br'; // servidor SMTP
			$mail->Username = 'naoresponda@hotboys.com.br'; // conta SMTP
			$mail->Password = '2a5a8dfsdf7'; // senha SMTP
			$mail->Port = 25; //porta SMTP
			$mail->SMTPAuth = true;
			
			$mail->Body = $msg; //Corpo da mensagem HTML
			
			//Defino o remetente da mensagem
			$mail->setFrom('audicoes@hotboys.com.br','HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$mail->addReplyTo(utf8_decode($_POST['email']), utf8_decode($_POST['nome']));
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$mail->AddAddress( 'audicoes@hotboys.com.br', 'Grupo Hot Midias'); // Destinatario
			
			// Defino o assunto que foi digitado no formulário
			$mail->Subject = (utf8_decode('Audições Hot - Novo Cadastro')); // Assunto
			
			
			if ( $imagem1 != '' )$mail->AddAttachment( 'temp/' . $imagem1 );
			if ( $imagem2 != '' )$mail->AddAttachment( 'temp/' . $imagem2 );
			if ( $imagem3 != '' )$mail->AddAttachment( 'temp/' . $imagem3 );
			if ( $imagem4 != '' )$mail->AddAttachment( 'temp/' . $imagem4 );
			if ( $imagem5 != '' )$mail->AddAttachment( 'temp/' . $imagem5 );
			if ( $imagem6 != '' )$mail->AddAttachment( 'temp/' . $imagem6 );
			if ( $imagem7 != '' )$mail->AddAttachment( 'temp/' . $imagem7 );
			if ( $imagem8 != '' )$mail->AddAttachment( 'temp/' . $imagem8 );
			
			
			$status = $mail->Send(); //envia email
			
			
			#####Apaga arquivos enviados
			@unlink( 'temp/' . $imagem1 );
			@unlink( 'temp/' . $imagem2 );
			@unlink( 'temp/' . $imagem3 );
			@unlink( 'temp/' . $imagem4 );
			@unlink( 'temp/' . $imagem5 );
			@unlink( 'temp/' . $imagem6 );
			@unlink( 'temp/' . $imagem7 );
			@unlink( 'temp/' . $imagem8 );
			
			
			
			
			// se enviado, carrega esta mensagem
			if ($status){
				
				$envio_sucesso = '
				<div class="animated bounceInLeft" id="fechar-mensagem-sucesso" style="float:left;width:100%">
				<div class="alert alert-success" style="text-align: center;">
				<strong>Inscrição enviada com sucesso !</strong> 
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





<!-- Google Recaptcha  -->
<?php
	if ( isset( $_POST[ 'submit' ] ) ) {
		$secret = '6Ld1yzYUAAAAAO8uV0rNO7jcmyM-Igcz6EQ8NdnO';
		$response = $_POST[ 'g-recaptcha-response' ];
		$remoteip = $_SERVER[ 'REMOTE_ADDR' ];
		
		
		$url = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip" );
		$result = json_decode( $url, TRUE );
		if ( $result[ 'success' ] == 1 ) {
			echo $_POST[ 'myreq' ];
		}
	}
?>


<!DOCTYPE html>


<html lang="pt-BR">
	<html class="no-js">
		<head>
			
			<!-- Titulo que aparece no Navegador -->
			<title>Inscrições Audições HOT - Site Hotboys</title>
			
			<!-- Meta Tags -->
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
			<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
			
			<!-- Javascripts -->
			<script type="text/javascript" src="js/select-estado-cidade-audicoes.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
			<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
			
			
			<!-- Animate CSS - Animacao do novo css3 -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
			
			<!-- CSS Principal - Cabecograma -->
			<link rel="stylesheet" href="css/cabecograma-hotboys.css">
			
			<!-- Efeito hover no cabecograma -->
			<link rel="stylesheet" href="css/hover.css">
			
			<!-- CSS da pagina -->
			<link rel="stylesheet" href="css/audicoes.css">
			
			<!-- HEAD (Include) -->
			<?php include('includes/head.php') ?>
		</head>
		
		
		<body id="body" class="fundo-preto">
			
			<!-- INICIO - Conteudo Mae de todas as divs -->
			<div class="container">
				
				
				<!-- Topo (Include) -->
				<div class="row" style="float:left;width:100%">
					<?php include('includes/top.php') ?>
				</div>
				
				
				
				
				<div class="row" style="float:left;width:100%;background-image: url('imagens/audicoes/fundo-formulario-audicoes.jpg');">
					
					
					<!-- Script que fecha as mensagens de atualizacao depois de alguns segundos -->
					<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
					<script type="text/javascript"> 
						$('#fechar-mensagem-sucesso').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-captcha').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-erro').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-info-erro').hide().show('slow').delay(6000).hide('slow');
					</script>
					
					
					<div class="row" style="width:100%;float:left">
						
						
						
						<!-- Cabecograma dos participantes -->
						<div class="col-lg-12 col-md-12 texto-pagina-contato_trabalhe" style="margin-top: 0!important;">
							<div class="container" id="cabecograma">
								
								<!-- Mostra nomes dos participantes -->
								<div class="nome">
									<div class="0"><img src="/imagens/audicoes/participantes/hover/logo-cabecograma.png" class="logo-audicoes"/></div>
									<h1 class="1"></h1>
									<h1 class="2"></h1>
									<h1 class="3"></h1>
									<h1 class="4"></h1>
									<h1 class="5"></h1>
									<h1 class="6"></h1>
									<h1 class="7"></h1>
									<h1 class="8"></h1>
								</div>
								
								
								<!-- Imagens dos participantes -->
								
								
								
								
								<ul>
								<!-- participante 0 -->
								<img src="https://hotboys.com.br/imagens/audicoes/participantes/hover/10.png" class="oculto2"/>
									<!-- participante 1 -->
									<li>
										<img class="1" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/01.png"/>
									</li>
									
									<!-- participante 2 -->
									<li>
										<img class="2" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/02.png"/>
									</li>
									<!-- participante 3 -->
									<li>
										<img class="3" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/03.png"/>
									</li>
									<!-- participante 4 -->
									<li>
										<img class="4" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/01.png"/>
									</li>
									<!-- participante 5 -->
									<li>
										<img class="5" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/03.png"/>
									</li>
									<!-- participante 6 -->
									<li>
										<img class="6" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/01.png"/>
									</li>
									<!-- participante 7 -->
									<li>
										<img class="7" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/02.png"/>
									</li>
									<!-- participante 8 -->
									<li>
										<img class="8" src="https://hotboys.com.br/imagens/audicoes/participantes/hover/01.png"/>
									</li>
									<!-- participante 9 -->
								<img src="https://hotboys.com.br/imagens/audicoes/participantes/hover/10.png" class="oculto2"/>
									
								</ul>
								
								<div style="width:100%;float:left;background-color:#010101;position: absolute;bottom: 0;height:15px"></div>
							</div>
						</div>
						
						
						<!-- video youtube -->
						<div class="col-md-12 col-xs-12 contato_modelo-titulo-fotos" style="text-align:center;margin: 27px 0 30px 0px;background-color:black;">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/Js08Vp_Wfgk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
							</iframe>
						</div> 
						
					</div>
					
					
					
					<div class="col-lg-9 col-md-12 texto-pagina-contato_trabalhe">
						<div class="col-md-7 col-xs-12">
								<img src="imagens/audicoes/formulario-audicoes-2.png" style="width:100%"/>
							</div>
							
							<!-- Formulario -->
							<div class="form-audicoes col-md-5 col-xs-12">
								
								<!-- 1ª fila do formulário -->
								<div class="container">
									<div class="row">
										
										<h2 style="margin-bottom:5px!important;font-family: 'Open Sans',sans-serif;">E Aí! Já pensou em participar do reality show mais quente da net, se tornar um modelo exclusivo do site Hotboys, e ter uma cena top idealizada para você?</h2>
										
										<h2 style="margin-top:15px!important;font-family: 'Open Sans',sans-serif;color: #df2037;font-weight: bold;"> INSCRIÇÕES ENCERRADAS! BOA SORTE!</h2>
									
										
									
										
									</div>
								</div>
								
							</div>
							
							
						
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
		
		
		<!-- Formatos de informacoes do formulario -->
		<script src="js/jquery.inputmask.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			jQuery(function($) {
				$.mask.definitions['~']='[+-]';
				$('#date').mask('99/99/9999');
				$('#telefone').mask('(99) 9999-9999?9');
				$('#whatsapp').mask('(99) 99999-999?9');
				
			});
		</script>
		
		<!-- Javascript Hover - Cabecograma Audicoes hot3 -->
		<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA="  crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				// se passar o mouse no participante 1, esconde os outros nomes e aparece o dele
				$('ul li img.1').hover(function() {
					$('div.0,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8').css("display","none");
					$('h1.1').css("display","block");
					$('h1.1').text('Participante 1');
				});
				$('ul li img.1').mouseout(function() { 
					$('h1.1').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 2, esconde os outros nomes e aparece o dele
				$('ul li img.2').hover(function() {
					$('div.0,h1.1,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8').css("display","none");
					$('h1.2').css("display","block");
					$('h1.2').text('Participante 2');
					
				});
				$('ul li img.2').mouseout(function() { 
					$('h1.2').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 3, esconde os outros nomes e aparece o dele
				$('ul li img.3').hover(function() {
					$('div.0,h1.1,h1.2,h1.4,h1.5,h1.6,h1.7,h1.8').css("display","none");
					$('h1.3').css("display","block");
					$('h1.3').text('Participante 3');
				});
				$('ul li img.3').mouseout(function() { 
					$('h1.3').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 4, esconde os outros nomes e aparece o dele
				$('ul li img.4').hover(function() {
					$('div.0,h1.1,h1.2,h1.3,h1.5,h1.6,h1.7,h1.8').css("display","none");
					$('h1.4').css("display","block");
					$('h1.4').text('Participante 4');
				});
				$('ul li img.4').mouseout(function() { 
					$('h1.4').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 5, esconde os outros nomes e aparece o dele
				$('ul li img.5').hover(function() {
					$('div.0,h1.1,h1.2,h1.3,h1.4,h1.6,h1.7,h1.8').css("display","none");
					$('h1.5').css("display","block");
					$('h1.5').text('Participante 5');
				});
				$('ul li img.5').mouseout(function() { 
					$('h1.5').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 6, esconde os outros nomes e aparece o dele
				$('ul li img.6').hover(function() {
					$('div.0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.7,h1.8').css("display","none");
					$('h1.6').css("display","block");
					$('h1.6').text('Participante 6');
				});
				$('ul li img.6').mouseout(function() { 
					$('h1.6').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 7, esconde os outros nomes e aparece o dele
				$('ul li img.7').hover(function() {
					$('div.0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.8').css("display","none");
					$('h1.7').css("display","block");
					$('h1.7').text('Participante 7');
				});
				$('ul li img.7').mouseout(function() { 
					$('h1.7').css("display","none");
					$('div.0').css("display","block");
				});
				
				// se passar o mouse no participante 8, esconde os outros nomes e aparece o dele
				$('ul li img.8').hover(function() {
					$('div.0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7').css("display","none");
					$('h1.8').css("display","block");
					$('h1.8').text('Participante 8');
				});
				$('ul li img.8').mouseout(function() { 
					$('h1.8').css("display","none");
					$('div.0').css("display","block");
				});
				
			});
		</script>			
	</div>
</body>
</html>																							