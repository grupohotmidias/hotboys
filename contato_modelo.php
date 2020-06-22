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
	include "phpmailer/PHPMailerAutoload.php";
	
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
						
			//recebendo campos do formulário
			$nome = addslashes( utf8_decode( $_POST[ 'nome' ] ) );
			$dote = addslashes( utf8_decode( $_POST[ 'dote' ] ) );
			$altura = addslashes( utf8_decode( $_POST[ 'altura' ] ) );
			$peso = addslashes( utf8_decode( $_POST[ 'peso' ] ) );
			$data_de_nascimento = addslashes( utf8_decode( $_POST[ 'data_de_nascimento' ] ) );
			$posicao_sexual = addslashes( utf8_decode( $_POST[ 'posicao_sexual' ] ) );
			$status_hiv = addslashes( utf8_decode( $_POST[ 'status_hiv' ] ) );
			$pais = addslashes( utf8_decode( $_POST[ 'pais' ] ) );
			$estado = addslashes( utf8_decode( $_POST[ 'estado' ] ) );
			$cidade = addslashes( utf8_decode( $_POST[ 'cidade' ] ) );
			$email = addslashes( utf8_decode( $_POST[ 'email' ] ) );
			$telefone = addslashes( utf8_decode( $_POST[ 'telefone' ] ) );
			$informacoes = addslashes( utf8_decode( $_POST[ 'informacoes' ] ) );
			
			
			
			if ( $_FILES[ 'imagem1' ][ 'name' ] != '' ) {
				$imagem1 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem1' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem1' ][ 'tmp_name' ], 'temp/' . $imagem1 ) ) {
					unset( $imagem1 );
				}
			}
			
			
			
			if ( $_FILES[ 'imagem2' ][ 'name' ] != '' ) {
				$imagem2 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem2' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem2' ][ 'tmp_name' ], 'temp/' . $imagem2 ) ) {
					unset( $imagem2 );
				}
			}
			
			
			
			if ( $_FILES[ 'imagem3' ][ 'name' ] != '' ) {
				$imagem3 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem3' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem3' ][ 'tmp_name' ], 'temp/' . $imagem3 ) ) {
					unset( $imagem3 );
				}
			}
			
			
			
			if ( $_FILES[ 'imagem4' ][ 'name' ] != '' ) {
				$imagem4 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem4' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem4' ][ 'tmp_name' ], 'temp/' . $imagem4 ) ) {
					unset( $imagem4 );
				}
			}
			
			
			
			if ( $_FILES[ 'imagem5' ][ 'name' ] != '' ) {
				$imagem5 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem5' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem5' ][ 'tmp_name' ], 'temp/' . $imagem5 ) ) {
					unset( $imagem5 );
				}
			}
			
			
			if ( $_FILES[ 'imagem6' ][ 'name' ] != '' ) {
				$imagem6 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem6' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem6' ][ 'tmp_name' ], 'temp/' . $imagem6 ) ) {
					unset( $imagem6 );
				}
			}
			
			
			if ( $_FILES[ 'imagem7' ][ 'name' ] != '' ) {
				$imagem7 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem7' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem7' ][ 'tmp_name' ], 'temp/' . $imagem7 ) ) {
					unset( $imagem7 );
				}
			}
			
			
			if ( $_FILES[ 'imagem8' ][ 'name' ] != '' ) {
				$imagem8 = time() . '_' . rand( 99, 99999 ) . '_' . $_FILES[ 'imagem8' ][ 'name' ];
				if ( !move_uploaded_file( $_FILES[ 'imagem8' ][ 'tmp_name' ], 'temp/' . $imagem8 ) ) {
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
			<b>Nome:</b> ' .$nome. ' <br />
			<b>Data de Nascimento:</b> ' .$data_de_nascimento. '<br />
			<b>Altura:</b> ' .$altura. '<br />
			<b>Peso:</b> ' . $peso. ' <br /><br/>
			<b>Telefone/Whatsapp:</b> ' .$telefone. ' <br />
			<b>E-mail:</b> ' .$email. '<br />
			<b>Porte fisico:</b> ' .$porte_fisico. ' <br />
			<b>Dote:</b> ' . $dote. '<br /><br/>
			<b>Pais:</b> ' . $pais. ' <br/>
			<b>Estado:</b> ' . $estado. '<br />
			<b>Cidade:</b> ' . $cidade. '<br /><br />
			<b>Posicao sexual:</b> ' .$posicao_sexual. '<br /><br/>
			<b>Status HIV:</b> ' .$status_hiv. ' <br />
			<b>Informacoes:</b><br /> ' .$informacoes. '<br /><br />
			Email enviado pelo link: https://www.hotboys.com.br/seja-um-modelo
			
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
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);

			$mail->Body = $msg; //Corpo da mensagem HTML
			
			//Defino o remetente da mensagem
			$mail->setFrom('naoresponda@hotboys.com.br', 'HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$mail->addReplyTo(utf8_decode($_POST['email']), utf8_decode($_POST['nome']));
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$mail->AddAddress('modeloshotboys@gmail.com', 'Grupo Hot Midias'); // Destinatario
						
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
					<?php include('includes/top2.php') ?>
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
						
						<div class="container">
						<!-- Título H1 da pagina -->
						<div class="row" style="float:left;width:100%">
							<div class="col-md-12 titulo-pagina-contatotrabalhe">
								<p>Já pensou em ser um PornoStar da maior produtora do Brasil com reconhecimento internacional? <br>
								 Venha ter seus sonhos realizados agora mesmo! <br><br>
								Inscreva-se já!</p>
							</div>
						</div>
						
						
							<div class="row" style="width:100%;float:left">
								<div class="text-justify col-md-9 texto-pagina-contato_trabalhe">
								
								<?php /*
								<div class="text-justify col-md-12 contato_modelo-texto">
									
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_00 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_01 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_02 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_03 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_04 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_05 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_06 ?></p>
									<p class="paragrafos"><?php echo CONTATO_TXT_PARAGRAFOS_07 ?></p>
									
									</div */ ?>
									</div>
																	
							</div>
						</div>

									<div class="row" style="width:100%;float:left">
									<div class="col-md-9 texto-pagina-contato_trabalhe">
									<!-- Formulario -->
									<form method="post" id="form"  action="" name="form" enctype="multipart/form-data">
										
										
										
										
										
										<!-- 1ª fila do formulário -->
										<div class="container">
											<div class="row">
												
												<!-- Nome -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
														<input class="form-control sel1" id="nome" name="nome"  maxlength="25" autofocus required/>
														<span class="unit"><?php echo CONTATO_TXT_NOME ?></span>
													</div>
													
													
													
											<?php /*		<!-- Sobrenome -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
														<input class="form-control sel1" id="sobrenome" name="sobrenome" maxlength="25"  required/>
														<span class="unit-direita"><?php echo CONTATO_TXT_SOBRENOME ?></span>
													</div>
												</div> */ ?>
												
												
												<?php /*	<!-- Nome Artistico -->
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">
													<input class="form-control sel1" id="nome_artistico" name="nome_artistico" maxlength="25"/>
													<span class="unit"><?php echo CONTATO_TXT_NOME_ARTISTICO ?></span>
												</div> */ ?>
												
												
												
												
												
												
												
												
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
													<!-- Altura -->
													<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 input-box form-group">
														<select class="form-control sel1" id="altura" name="altura" required>
															<option selected="true" disabled="disabled"><?php echo CONTATO_TXT_ALTURA ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_00 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_01 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_02 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_03 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_04 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_05 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_06 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_07 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_08 ?></option>
															<option><?php echo CONTATO_TXT_ALTURA_09 ?></option>
														</select>
													</div>
													
													<!-- Peso -->
													<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
														<select class="form-control sel1" id="peso" name="peso" required>
															<option selected="true" disabled="disabled"><?php echo CONTATO_TXT_PESO ?></option>
															<option><?php echo CONTATO_TXT_PESO_00 ?></option>
															<option><?php echo CONTATO_TXT_PESO_01 ?></option>
															<option><?php echo CONTATO_TXT_PESO_02 ?></option>
															<option><?php echo CONTATO_TXT_PESO_03 ?></option>
															<option><?php echo CONTATO_TXT_PESO_04 ?></option>
															<option><?php echo CONTATO_TXT_PESO_05 ?></option>
															<option><?php echo CONTATO_TXT_PESO_06 ?></option>
															<option><?php echo CONTATO_TXT_PESO_07 ?></option>
															<option><?php echo CONTATO_TXT_PESO_08 ?></option>
															<option><?php echo CONTATO_TXT_PESO_09 ?></option>
															<option><?php echo CONTATO_TXT_PESO_10 ?></option>
															<option><?php echo CONTATO_TXT_PESO_11 ?></option>
															<option><?php echo CONTATO_TXT_PESO_12 ?></option>
															<option><?php echo CONTATO_TXT_PESO_13 ?></option>
														</select>
													</div>
													
												<!-- Dote -->
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
													<select class="form-control sel1" id="dote" name="dote" required>
														<option selected="true" disabled="disabled"><?php echo CONTATO_TXT_DOTE ?></option>
														
														<?php for ($i = 10;  $i <= 35; $i++){ echo '<option>'.$i.'cm </option>'; } ?>
														
													</select>
												</div>

												</div>
												<?php //data limite para a a data de nascimento
													$limite_dat_nasc =	date("Y-m-d", strtotime('-17 years')); 
												?>
												
												<!-- Data de Nascimento -->
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 input-box form-group">
													<input class="form-control sel1" id="data_de_nascimento" name="data_de_nascimento" type="Date" max="<?php echo $limite_dat_nasc ?>" required/>
													<span class="unit"><?php echo CONTATO_MODEL_NASCIM ?></span>
												</div>
												<?php /*	
												<!-- Tipo -->
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
													<select class="form-control sel1" id="porte_fisico" name="porte_fisico" required>
														<option selected="true" disabled="disabled"><?php echo CONTATO_TIPO_TIT ?>
														</option>
														<option><?php echo CONTATO_TIPO_FISICO_00 ?></option>
														<option><?php echo CONTATO_TIPO_FISICO_01 ?></option>
														<option><?php echo CONTATO_TIPO_FISICO_02 ?></option>
														<option><?php echo CONTATO_TIPO_FISICO_03 ?></option>
														<option><?php echo CONTATO_TIPO_FISICO_04 ?></option>
														<option><?php echo CONTATO_TIPO_FISICO_05 ?></option>
													</select>
												</div> */ ?>
													<!-- Posicao Sexual -->
													<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 formulario-col-direita select-box  form-group" required>
															<select class="form-control sel1" id="posicao_sexual" name="posicao_sexual" placeholder="Posição Sexual*:">
															<option selected="true" disabled="disabled">Posição Sexual</option>
															<option><?php echo CONTATO_MODEL_POS_SEX_1 ?></option>
															<option><?php echo CONTATO_MODEL_POS_SEX_2 ?></option>
															<option><?php echo CONTATO_MODEL_POS_SEX_3 ?></option>
														</select>
													</div>

														<!-- Status HIV -->
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 formulario-col-direita select-box  form-group">
													<select class="form-control sel1" id="status_hiv" name="status_hiv" placeholder="Status de HIV*:">
														<option selected="true" disabled="disabled"><?php echo CONTATO_MODEL_HIV ?></option>
														<option><?php echo CONTATO_MODEL_ORIENTA_01 ?></option>
														<option><?php echo CONTATO_MODEL_ORIENTA_02 ?></option>
														<option><?php echo CONTATO_MODEL_ORIENTA_03 ?></option>
													</select>
												</div>

												</div>
											</div>
										</div>
										
										
										
										
										
										<!-- 2ª fila do formulário -->
										<div class="container margin-top25">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
												<?php /*	<!-- Orientacao Sexual -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 select-box  form-group">
														<select class="form-control sel1" id="orientacao_sexual" name="orientacao_sexual" required>
															<option selected="true" disabled="disabled"><?php echo CONTATO_MODEL_ORIENTACAO ?></option>
															<option><?php echo CONTATO_MODEL_HIV_01 ?></option>
															<option><?php echo CONTATO_MODEL_HIV_02 ?></option>
															<option><?php echo CONTATO_MODEL_HIV_03 ?></option>
														</select>
													</div> */ ?>
													

												
											
												
											</div>
											
											
										</div>
										<!-- 3ª fila do formulário -->
										<div class="container margin-top25">
											<div class="row">
												
												
												<!-- Input Pais-->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-box  form-group">
													<select class="form-control" id="country" name="pais" required></select>
													<!-- Javascript Pais-->
													<script language="javascript">
														populateCountries( "country", "state" );
													</script>
												</div>
												
												
												
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
													<!-- Select Estado -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 select-box  form-group">
														<select class="form-control" name="estado" id="state" required>
															<option selected="true" disabled="disabled"><?php echo CONTATO_MODEL_FORM_ESTADO ?></option>
														</select>
													</div>
													
													<!-- Input Cidade -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita select-box  form-group">
														<input type="text" maxlength="17" class="form-control sel1" id="cidade" name="cidade" required placeholder="Ex.: Rio de Janeiro"/> <span class="unit-direita"><?php echo CONTATO_MODEL_FORM_CIDADE ?></span>
													</div>
													
												</div>
												
												
												
											</div>
										</div>
										<!-- 4ª fila do formulário -->
										
										
										<div class="container margin-top25">
											<div class="row">
												
												<!-- Email -->
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">
													<input class="form-control sel1" id="email" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$" required/> 
													<span class="unit"><?php echo CONTATO_FORM_EMAIL ?></span>
													<div class="help-block with-errors"></div>
												</div>
														<!-- Telefone -->
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
														<input id="telefone" name="telefone" class="form-control sel1" placeholder="<?php echo CONTATO_MODEL_PLACEHOLD_TEL ?>">
														<span class="unit">Telefone* / Whatsapp *</span>
													</div>
													
											<?php /*		<!-- WhatsApp -->
													<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
														<input class="form-control sel1" id="whatsapp" name="whatsapp" placeholder="<?php echo CONTATO_MODEL_PLACEHOLD_TEL ?>"/>
														<span class="unit-direita"><?php echo CONTATO_MODELO_WHATSAPP ?></span>
													</div> */ ?>
													
												
												<?php /*	<!-- Horario para contato -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-box  form-group">
													<select class="form-control sel1" id="disponibilidade_horarios" required name="disponibilidade_horarios" placeholder="Disponibilidade de Horário*:">
														<option selected="true" disabled="disabled">
														<?php echo DISP_CONTATO ?>
														</option>
														<option><?php echo CONTATO_MODELO_MANHA ?></option>
														<option><?php echo CONTATO_MODELO_TARDE ?></option>
														<option><?php echo CONTATO_MODELO_NOITE ?></option>
														<option><?php echo CONTATO_MODELO_TODOS ?></option>
													</select>
												</div> */ ?>
												
												<?php /* <!-- Horario para gravacoes -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-box  form-group">
													<select class="form-control sel1" id="disponibilidade_horarios_gravacao" required name="disponibilidade_horarios_gravacao" placeholder="Disponibilidade de Horário*:">
														<option selected="true" disabled="disabled">
														<?php echo DISP_GRAVACOES ?>
														</option>
														<option><?php echo CONTATO_MODELO_TOTAL ?></option>
														<option><?php echo CONTATO_MODELO_PARCIAL ?></option>
														<option><?php echo CONTATO_MODEL_FINS_SEMANA ?></option>
													</select>
												</div> */ ?>
												
										
												
											 <?php /*	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
													<!-- Facebook -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
														<input class="form-control sel1" id="facebook" name="facebook"   type="text" placeholder="facebook.com.br/xxxxx"/>
														<span class="unit"><?php echo FACEBOOK_LABEL ?></span>
													</div>
													
													<!-- Instagram -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">
														<input class="form-control sel1" id="instagram" name="instagram"  type="text" placeholder="instagram.com/xxxxx"/>
														<span class="unit-direita"><?php echo INSTAGRAM_LABEL ?></span>
													</div>
													
														<!-- Twitter -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
														<input class="form-control sel1" id="twitter" name="twitter"  type="text" placeholder="twitter.com/xxxxx"/>
														<span class="unit-direita"><?php echo TWITTER_LABEL ?></span>
													</div>
													
													
												</div>
												*/ ?>
											</div>
										</div>
										
										
										
										<!-- 5ª fila do formulário -->
										<div class="container margin-top25">
											
										<?php /*
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
													<!-- Tatuagens -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 select-box form-group">
														<select class="form-control sel1" id="tatuagem" name="tatuagem" placeholder="Tatuagens:">
															<option selected="true" disabled="disabled"><?php echo CONTATO_MODELO_TATUAGENS ?></option>
															<option><?php echo TXT_TATTOO_0 ?></option>
															<option><?php echo TXT_TATTOO_01 ?></option>
															<option><?php echo TXT_TATTOO_02 ?></option>
															<option><?php echo TXT_TATTOO_05 ?></option>
															<option><?php echo TXT_TATTOO_07 ?></option>
														</select>
													</div>
													
													<!-- Piercings -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita select-box  form-group">
														<select class="form-control sel1" id="piercing" name="piercing" placeholder="Piercings:">
															<option selected="true" disabled="disabled"><?php echo CONTATO_MODELO_PIERCINGS ?></option>
															<option><?php echo TXT_TATTOO_0 ?></option>
															<option><?php echo TXT_TATTOO_1 ?></option>
															<option><?php echo TXT_TATTOO_2 ?></option>
															<option><?php echo CONTATO_MODELO_ALGUNS ?></option>
															<option><?php echo CONTATO_MODELO_VARIOS ?></option>
														</select>
													</div>
													
												</div>
												
												
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													
													<!-- Pelos Pubianos -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 select-box  form-group">
														<select class="form-control sel1" id="pelos_pubianos" name="pelos_pubianos" placeholder="Pelos Pubianos:">
															<option selected="true" disabled="disabled"><?php echo TXT_PELOS_PUBIANOS_1 ?></option>
															<option><?php echo TXT_PELOS_0 ?></option>
															<option><?php echo TXT_PELOS_1 ?></option>
															<option><?php echo TXT_PELOS_2 ?></option>
															<option><?php echo TXT_PELOS_3 ?></option>
														</select>
													</div>
													
													<!-- Pelos no Corpo -->
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita select-box  form-group">
														<select class="form-control sel1" id="pelos_corpo" name="pelos_corpo" placeholder="Pelos no Corpo:">
															<option selected="true" disabled="disabled"><?php echo TXT_PELOS_CORPO_00 ?></option>
															<option><?php echo TXT_PELOS_CORPO_0 ?></option>
															<option><?php echo TXT_PELOS_CORPO_1 ?></option>
															<option><?php echo TXT_PELOS_CORPO_2 ?></option>
															<option><?php echo TXT_PELOS_CORPO_3 ?></option>
															<option><?php echo TXT_PELOS_CORPO_4 ?></option>
														</select>
													</div>
												</div>
											</div> */ ?>
										</div>
										
										<!-- Fotos -->
										<div class="container container-table">
											<div class="col-md-12 contato_modelo-titulo-fotos">
												<p><?php echo FOTOS1 ?></p>
											</div>
										</div>
										
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contato-modelo-anexos">
											
											<!-- Foto do Rosto -->
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_ROSTO ?></span>
													<input type="file" class="anexo-rosto" id="imagem1" name="imagem1" accept="image/*" required />
												</div>
												
												<!-- Foto do Corpo -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_CORPO ?></span>
													<input type="file" class="anexo-corpo" id="imagem2" name="imagem2" accept="image/*" required />
												</div>
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem3" name="imagem3" accept="image/*">
												</div>
												
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem4" name="imagem4" accept="image/*">
												</div>
											</div>
											
											
											
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem5" name="imagem5" accept="image/*">
												</div>
												
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem6" name="imagem6" accept="image/*">
												</div>
												
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem7" name="imagem7" accept="image/*">
												</div>
												
												
												<!-- Outras fotos -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<span><?php echo CONTATO_MODELO_OUTRAS_FOTOS ?></span>
													<input type="file" class="anexo-fotos" id="imagem8" name="imagem8" accept="image/*">
												</div>
												
											</div>
											
										</div>
										
										
										
										
										<!-- 6ª fila do formulário -->
										<div class="container margin-top25">
											<div class="row">
												
												<!-- Informacoes Adicionais -->
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box  form-group">
														<textarea class="form-control sel1" id="informacoes" name="informacoes"  rows="3"></textarea>
														<span class="unit">Informações Adicionais (Opcional)</span>
													</div>
												</div>	
											</div>
										</div>
										
										
										
										<!-- Concorda com os termos -->
										<div class="container">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<p><?php echo CONTATO_MODELO_CONCORDA_INFO ?><span class="asteristico">*</span>:</p>
												</div>
											</div>
										</div>
										
										
										<div class="container margin-top-15 margin-bottom-15">
											<div class="row">
												<div class="col-lg-12 col-md-12">
													
													<!--  Checkbox (caixa de seleção) - Aceite de viagem -->
													<div class="contato-texto_dispor-gravacao">
														<input class="form-check-input" type="checkbox" value="None" id="disponibilidade-viajar" name="check_viagem" required>
													</div>
													
													<!--  Texto - Aceite de viagem -->
													<div class="contato-texto_maior-18anos">
														<label for="disponibilidade-viajar">
															<p><?php echo CONTATO_MODELO_VIAJAR ?></p>
														</label>	
													</div>
													
												</div>
												
												
												
												
												<div class="col-lg-12 col-md-12">
													
													<!--  Checkbox (caixa de seleção) - Afirma ser maior de idade -->
													<div class="contato-texto_dispor-gravacao">
														<input class="form-check-input" type="checkbox" value="None" id="maior-idade" name="check_idade" required="">
													</div>
													
													<!-- Texto - Afirma ser maior de idade -->
													<div class="contato-texto_maior-18anos">
														<label for="maior-idade">
															<p><?php echo CONTATO_MODELO_MAIORIDADE ?></p>
														</label>
													</div>
													
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