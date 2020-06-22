<?php
	
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
		file_get_contents(
		'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
		'&response='.$_POST['g-recaptcha-response']
		)
		);
		
		
		
		if($answer->success) {
			
			// Carrego a classe PHPMailer através do Autoload
			include "phpmailer/PHPMailerAutoload.php";
			
			
			//recebendo campos do formulário
			$nome = addslashes( utf8_encode( $_POST[ nome ] ) );

			
			
			
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
			
			
			$msg = '<!DOCTYPE HTML>
			<html lang="pt-BR">
			<head>
			<meta charset="utf-8"/>
			<title>E-mail</title>
			
			<style>
			body{
			font-family:Verdana, Geneva, sans-serif;
			font-size:13px;
			color:#666666;}
			</style>
			</head>
			<body>
			
			<b>Site HOTBOYS:</b> Formulário vindo do Site HOTBOYS<br /><br />
			
			<b>Nome:</b> ' . utf8_encode($nome) . ' <br />

			</body>
			</html>';
			
			// Instancio a classe PHPMailer
			$mail = new PHPMailer();
			
			// Faço todas as configurações de SMTP para o envio da mensagem
			$mail->CharSet = "utf-8";
			$mail->IsSMTP();
			$mail->IsHTML(true); // envio como HTML se 'true'
			$mail->Host = 'mail.hotboys.com.br'; // servidor SMTP
			$mail->Username = 'naoresponda@hotboys.com.br'; // conta SMTP
			$mail->Password = '2a5a8dfsdf7'; // senha SMTP
			$mail->Port = 25; //porta SMTP
			$mail->SMTPAuth = true;
			
			$mail->Body = $msg; //Corpo da mensagem HTML
			
			//Defino o remetente da mensagem
			$mail->setFrom('teste@hotboys.com.br','HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$mail->addReplyTo($_POST['email'], $_POST['nome']);
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$mail->AddAddress( 'teste@hotboys.com.br', 'Grupo Hot Mídias'); // Destinatario
			
			// Defino o assunto que foi digitado no formulário
			$mail->Subject = 'Seja um modelo  Hot - Novo Cadastro'; // Assunto
			
			
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


<html lang="pt-br">
	<html class="no-js">
		<head>
			
			<!-- Titulo que aparece no Navegador -->
			<title><?php echo TITULO_SEJA_MODELO ?></title>
			
			<!-- Meta Tags -->
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
			<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
			
			<!-- Javascripts -->
			<script language="JavaScript" src="../js/select-estado-cidade.js"></script>
			<script type="text/javascript" src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
			<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
			
			
			<!-- Animate CSS - Animacao do novo css3 -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
			
			
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
				
				
				<!-- Título H1 da pagina -->
				<div class="row" style="float:left;width:100%">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="contato_modelo-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span><?php echo CONTATO ?></h1>
					</div>
				</div>
				
				
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
					</div>
					
					<!-- Script que fecha as mensagens de atualizacao depois de alguns segundos -->
					<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
					<script type="text/javascript"> 
						$('#fechar-mensagem-sucesso').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-captcha').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-erro').hide().show('slow').delay(6000).hide('slow');
						$('#fechar-mensagem-info-erro').hide().show('slow').delay(6000).hide('slow');
					</script>
					
					
					<!-- Título H1 da pagina -->
					<div class="row" style="float:left;width:100%">
						<div class="col-md-12 titulo-pagina-contatotrabalhe">
							<p><?php echo TITULO_CONTATO_MODELO ?></p>
						</div>
					</div>
					
					
					<div class="row" style="width:100%;float:left">
						<div class="text-justify col-md-9 texto-pagina-contato_trabalhe">
							
							<div class="text-justify col-md-12 contato_modelo-texto">
								
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_00 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_01 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_02 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_03 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_04 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_05 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_06 ?></p>
								<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_07 ?></p>
								
							</div>
						</div>
						
					</div>
					
					<div class="row" style="width:100%;float:left">
						<div class="col-md-9 texto-pagina-contato_trabalhe">
							<!-- Formulario -->
							<form method="post" id="form" name="form" enctype="multipart/form-data">
								
								
								
								
								
								<!-- 1ª fila do formulário -->
								<div class="container">
									<div class="row">
										
										<!-- Nome -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">
												<input class="form-control sel1" id="nome" name="nome"  maxlength="25" autofocus required/>
												<span class="unit"><?php echo CONTATO_TXT_NOME ?></span>
											</div>
											
											
											
											
										</div>
									</div>
									
									
									
									
									
									
									
									
									<!-- SiteKey - ReCaptcha do Google -->
									<div class="container recaptcha">
										<div class="row">
											<div class="g-recaptcha" data-sitekey="6Ld1yzYUAAAAABxjm37Y8S36R8TpwoIXKkjq_Ers"></div>
										</div>
									</div>
									
									<div class="container recaptcha">
										<div class="row">
											
											<!-- Botão Enviar formulário -->
											<label for="bt-enviar-form">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botao-vermelho-enviar text-justify">
													<input type="hidden" name="acao" value="enviar" data-toggle="modal" data-target="#gridSystemModal"/>
													<div class="envia-contato">
														<input type="submit" value="Enviar" name="enviar" id="bt-enviar-form"/>
													</div>
												</div>
											</label>
											
										</div>	
									</div>
									
								</form>
								<!-- Fim do Formulario -->
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
				<script src="../js/jquery.inputmask.min.js"></script>
				<script type="text/javascript" charset="utf-8">
					jQuery(function($) {
						$.mask.definitions['~']='[+-]';
						$('#date').mask('99/99/9999');
						$('#telefone').mask('(99) 9999-9999?9');
						$('#whatsapp').mask('(99) 99999-999?9');
						
					});
					
					
				</script>
				
			</div>
		</body>
	</html>																									