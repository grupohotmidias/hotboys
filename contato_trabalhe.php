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

	

	require('config/configuracoes.php');

	require('includes/funcoes.php');

	

	//Defino a Chave do meu site

	$secret_key = '6Ld1yzYUAAAAAO8uV0rNO7jcmyM-Igcz6EQ8NdnO';

	

	//Pego a validação do Captcha feita pelo usuário

	$recaptcha_response = addslashes($_POST['g-recaptcha-response']);

	

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

		

		// Se a ação do usuário foi correta executo o restante do meu formulário

		if($answer->success) {

			

			// Carrego a classe PHPMailer através do Autoload

			include "phpmailer/PHPMailerAutoload.php";

			

			// Instancio a classe PHPMailer

			$msg = new PHPMailer();

			

			// Faço todas as configurações de SMTP para o envio da mensagem

			

			

			$msg->CharSet = "UTF-8";

			$msg->isSMTP();   

			$msg->IsHTML(true); // envio como HTML se 'true'

			$msg->Host = 'mail.hotboys.com.br';  

			$msg->SMTPAuth = true;                              

			$msg->Username = 'naoresponda@hotboys.com.br';                 

			$msg->Password = '2a5a8dfsdf7';                           

			$msg->Port = 587;   

			$msg->SMTPAutoTLS = false;

			$msg->AuthType = 'PLAIN';

			$msg->Body    = $Body;

			$msg->IsHTML(true); 

			

			

			//Defino o remetente da mensagem

			$msg->setFrom('contato@hotboys.com.br','HotBoys');

			

			// Defino a quem esta mensagem será respondida, no caso, para o e-mail

			// que foi cadastrado no formulário

			$msg->addReplyTo($_POST['email'], $_POST['nome']);

			

			

			// Adiciono o destinatário desta mensagem, no caso, 

			//minha conta de contatos comerciais.

			$msg->AddAddress('contato@hotboys.com.br', 'Grupo Hot Midias');

			

			// Defino o assunto que foi digitado no formulário

			$msg->Subject  = 'Trabalhe Conosco - Hotboys';

			

			

			//recebendo campos do formulário

			$nome = addslashes(utf8_decode($_POST[nome]));

			$sobrenome = addslashes(utf8_decode($_POST[sobrenome]));

			$pretencao = addslashes(utf8_decode($_POST[pretencao]));

			$cargo = addslashes(utf8_decode($_POST[cargo]));

			$outrocargo = addslashes(utf8_decode($_POST[outro_cargo]));

			$datadenascimento = addslashes(utf8_decode($_POST[data_de_nascimento]));

			$sexo = addslashes(utf8_decode($_POST[sexo]));

			$estado_civil = addslashes(utf8_decode($_POST[estado_civil]));

			$pais = addslashes(utf8_decode($_POST[pais]));

			$estado = addslashes(utf8_decode($_POST[estado]));

			$cidade = addslashes(utf8_decode($_POST[cidade]));

			$bairro = addslashes(utf8_decode($_POST[bairro]));

			$endereco = addslashes(utf8_decode($_POST[endereco]));

			$telefone = addslashes(utf8_decode($_POST[telefone]));

			$whatsapp = addslashes(utf8_decode($_POST[whatsapp]));

			$email = addslashes(utf8_decode($_POST[email]));

			$objetivo = addslashes(utf8_decode($_POST[objetivo]));

			$formacaoacademica = addslashes(utf8_decode($_POST[formacao_academica]));

			$cursos = addslashes(utf8_decode($_POST[cursos]));

			$experienciaprofissional = addslashes(utf8_decode($_POST[experiencia_profissional]));

			$observacoes = addslashes(utf8_decode($_POST[observacoes]));

			$submit = addslashes(utf8_decode($_POST[submit]));

			

			

			

			

			$msg->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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

			<b>Site HOTBOYS:</b> Formulário vindo do Site HOTBOYS<br /><br />

			<b>Nome:</b> '.$nome.' '.$sobrenome.' <br />

			<b>Pretensão Salarial:</b> '.$pretencao.'<br />

			<b>Cargo:</b> '.$cargo.'<br />

			<b>Outro Cargo:</b> '.$outro_cargo.'<br />

			<b>Data de Nascimento:</b> '.$data_de_nascimento.' <br /><br/>

			<b>Sexo:</b> '.$sexo.' <br />

			<b>Estado Civil:</b> '.$estado_civil.'<br />

			<b>País:</b> '.$pais.'<br />

			<b>Estado:</b> '.$estado.'<br />

			<b>Cidade:</b> '.$cidade.' <br/><br/>

			<b>Bairro:</b> '.$bairro.' <br />

			<b>Endereço:</b> '.$endereco.' <br/>

			<b>Telefone:</b> '.$telefone.' <br/>

			<b>WhatsApp:</b> '.$whatsapp.' <br/>

			<b>Email:</b> '.$email.' <br/>

			<b>Objetivo:</b> '.$objetivo.'<br /><br/>

			<b>Formação Acadêmica:</b> '.$formacao_academica.' <br/>

			<b>Cursos:</b> '.$cursos.'<br />

			<b>Experiência Profissional:</b> '.$experiencia_profissional.'<br /><br />

			<b>Campo Livre para Observações:</b> '.$observacoes.'<br />

			<br /><br />

			

			</body>

			

			</html>';

			

			// Defino a mensagem alternativa que foi digitada no formulário.

			// Esta mensagem é utilizada para validações AntiSPAM e por isto

			// é muito recomendado que utilize-a

			$msg->AltBody = $_POST['mensagem'];

			

			// Faço o envio da mensagem

			$enviado = $msg->Send();

			

			// Caso a mensagem seja enviada com sucesso ela retornará sucesso

			// senão, ela retornará o erro ocorrido			

			if ($enviado){

                $envio_sucesso =

				'<div class="animated bounceInLeft" id="fechar-mensagem-sucesso" style="float:left;width:100%">

				<div class="alert alert-success" style="text-align: center;">

				<strong>E-mail enviado com sucesso !</strong> 

				</div>

				</div>'

				

			?>

			

			<?php

				// se der erro, carrega esta mensagem

				} else {

				$envio_erro = 

				'<div class="animated bounceInLeft" id="fechar-mensagem-erro" style="float:left;width:100%">

				<div class="alert alert-danger" style="text-align: center;">

                <strong>Erro ! Não foi possível enviar o e-mail.</strong>

				</div></div>';

				

			}

		}

		

	}

?>





<!DOCTYPE html>

<html lang="pt-br">

	<html class="no-js">

		

		<head>

			<meta charset="utf-8">

			<meta http-equiv="Content-Language" content="pt-br, en">

			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

			<title>Trabalhe Conosco - Site Hot Boys</title>

			<meta name="keywords"

			content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">

			<meta name="description"

			CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">

			

			

			<script language="JavaScript" src="js/select-estado-cidade.js"></script>

			

			

			

			<script type="text/javascript" src="js/jquery.min.js"></script>

			<script type="text/javascript" src="js/jquery.maskedinput.js"></script>

			<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>

			

			

			<!-- Animate CSS - Animacao do novo css3 -->

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

			

			

			<!-- HEAD (Include) -->

			<?php include('includes/head.php') ?>

			

			

		</head>

		<body id="body" class="fundo-preto">

			

			<!-- TOP (Include) -->

			<?php include('includes/top2.php') ?>

			

			<div class="container-tudo">

				

				<!-- Título H1 da pagina -->

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<h1 class="contato_trabalhe-titulo" style="border-left:0!important;padding-left:0!important">

					<span class="icone-pimenta-titulo"></span>Contato</h1>

				</div>

				

				<div class="container">

					<div class="row centralizada">

						<div class="text-justify col-md-9 contato_modelo-texto">

							

							

							<!-- Mensagem de erro ao enviar o formulario -->

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<?php echo $envio_erro ?> 

							</div>

							

							

							<!-- Mensagem de sucesso ao enviar formulario -->

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<?php echo $envio_sucesso ?> 

							</div>

							

							

							

							<!-- Script que fecha as mensagens de atualizacao depois de alguns segundos -->

							<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

							<script type="text/javascript"> 

								$('#fechar-mensagem-sucesso').hide().show('slow').delay(6000).hide('slow');

								$('#fechar-mensagem-erro').hide().show('slow').delay(6000).hide('slow');

							</script>

							

							

							

							<!-- Título H1 da pagina -->

							<div class="container container-table">

								<div class="col-md-12 titulo-pagina-contatotrabalhe"><p>Quer Fazer Parte da Equipe HOTBOYS?</p></div>

							</div>

							

							

							<!-- Formulario -->

							<p class="paragrafos" style="float:left">

								Além dos nosso modelos HOT, temos uma galera que trabalha bastante para levar até

								vocês o melhor conteúdo

								que o HOTBOYS pode oferecer. E através deste formulário que está ali embaixo, você pode fazer parte

							desta equipe!</p>

							<p class="paragrafos">O HOTBOYS é uma produtora que está há anos como líder dentro de seu mercado. Para que

								isso aconteça,

								contamos com o trabalho de diversos profissionais: cinegrafistas, fotógrafos, programadores, designers,

							maquiadores, costureiros, cenógrafos e muito mais.</p>

							<p class="paragrafos">Se você se identifica com o trabalho que o HOTBOYS faz, se você é totalmente livre de

								preconceitos e tem

								qualificação para ocupar um cargo aqui na nossa empresa, não perca tempo! Preencha o formulário com as

							suas informações e nós entraremos em contato com você, quando possível/necessário.</p>

							<p class="paragrafos">Mas atenção, o centro de operações do HOTBOYS fica no Rio de Janeiro/RJ , então, caso

								você seja de outra

							cidade, é necessário que você tenha disponibilidade para se manter e morar na cidade maravilhosa.</p>

							<p class="paragrafos">Esperamos trabalhar com você em breve. Boa sorte!</p>

							

							

							<!-- Formulario -->

							<form  method="POST" name="form" action="" > 

								

								

								<div class="container">

									<div class="row centralizada">

										

										

										<!-- 1ª fila do formulário -->

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">

												<input class="form-control sel1" id="nome" name="nome" autofocus required/>

												<span class="unit">Nome*:</span>

											</div>

											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">

												<input class="form-control sel1" id="sobrenome" name="sobrenome"  required/>

												<span class="unit-direita">Sobrenome*:</span>

											</div>

										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">

											<input class="form-control sel1" id="pretensao_salarial" name="pretensao_salarial" riquered/>

											<span class="unit">Pretensão Salarial:</span>

										</div>

										

										

										<!-- 2ª fila do formulário -->

										<div class="container margin-top-25">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">

														<input class="form-control sel1" id="cargo" name="cargo"  required/>

														<span class="unit">Cargo*:</span>

													</div>

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">

														<input class="form-control sel1" id="outro_cargo"  name="outro_cargo" />

														<span class="unit-direita">Outro Cargo:</span>

													</div>

												</div>

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group"><input

													class="form-control sel1" id="data_de_nascimento" name="data_de_nascimento" type="Date" required/>

													<span class="unit">Data de Nasc*:</span>

												</div>

												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-6 col-sm-12 col-xs-12 select-box form-group">

													<select class="form-control sel1" id="sexo" name="sexo" placeholder="Sexo*:" required>

														<option selected="true" disabled="disabled">Sexo*:</option>

														<option>Masculino</option>

														<option>Feminino</option>

													</select>

												</div>

												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita select-box form-group">

													<select class="form-control sel1" id="estado_civil" name="estado_civil" placeholder="Estado Civil*:" required>

														<option selected="true" disabled="disabled">Estado Civil*:</option>

														<option>Solteiro(a)</option>

														<option>Casado(a)</option>

														<option>Divorciado(a)</option>

														<option>Viúvo(a)</option>

													</select>

												</div>

											</div>

										</div>                                

										

										

										<!-- 3ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													

													

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 select-box form-group">

														<!-- Input Pais-->

														<select class="form-control" id="country" name="pais" required=""></select>  <!--País-->

														<!-- Javascript Pais-->

														<script language="javascript">                        

															populateCountries("country", "state");

														</script>

													</div>

													

													

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita select-box form-group">

														<select  class="form-control" name="estado" id="state" required="">

															<option selected="true" disabled="disabled">Estado*:

															</option>

														</select>

													</div>

													

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">

														<input class="form-control sel1" id="cidade" name="cidade"  required/>

														<span class="unit">Cidade*:</span>

													</div>

													

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group ">

														<input class="form-control sel1" id="bairro" name="bairro" required/>

														<span class="unit-direita">Bairro*:</span>

													</div>

												</div>

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">

													<input class="form-control sel1" id="endereco" name="endereco" required/>

												<span class="unit">Endereço*:</span></div>

											</div>

										</div>                

										

										<!-- 4ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">

														<input class="form-control sel1" id="telefone" name="telefone" />

														<span class="unit">Telefone:</span>

														

														

													</div>

													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">

														<input class="form-control sel1" id="whatsapp" name="whatsapp" />

														<span class="unit-direita">Whatsapp:</span>

													</div>

													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box float-left form-group">

														<input class="form-control sel1" id="email" name="email" type="E-mail"

														data-error="Por favor, informe um e-mail correto." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>

														<span class="unit">E-mail*:</span>

													</div>

												</div>

											</div>

										</div>              

										

										<!-- 5ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-12 textarea-box">

														<textarea class="form-control sel1" id="objetivo" name="objetivo" rows="1"></textarea>

														<span class="unit">Objetivo:</span>

													</div>

												</div>

											</div>

										</div>                               

										

										<!-- 6ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-12 textarea-box">

														<textarea class="form-control sel1" id="formacao_academica" name="formacao_academica" rows="3" required></textarea>

														<span class="unit">Formação Acadêmica*:</span>

													</div>

												</div>

											</div>

										</div>                               

										

										<!-- 7ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-12 textarea-box">

														<textarea class="form-control sel1" id="cursos" name="cursos" rows="3"></textarea>

														<span class="unit">Cursos:</span>

													</div>

												</div>

											</div>

										</div>                               

										

										<!-- 8ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-12 textarea-box">

														<textarea class="form-control sel1" id="experiencia_profissional" name="experiencia_profissional" rows="3" required></textarea>

													<span class="unit">Experiência Profissional*:</span></div>

												</div>

											</div>

										</div>                              

										

										<!-- 9ª fila do formulário -->

										<div class="container margin-top-10">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

													<div class="col-lg-12 textarea-box">

														<textarea class="form-control sel1" id="observacoes" name="observacoes" rows="1"></textarea>

													<span class="unit">Campo Livre para Observações e Adendos:</span></div>

												</div>

											</div>

										</div>

										

										

										<div class="container">

											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">

													<p>Ao enviar este formulário, você concorda com as seguintes informações<span class="asteristico">*</span>:</p>

												</div>

											</div>

										</div>

										<div class="container margin-top-15 margin-bottom-15">

											<div class="row">

												

												

												<div class="col-lg-12 col-md-12">

													<!--  Checkbox (caixa de seleção) - Afirma ser maior de idade -->

													<div class="contato-texto_dispor-gravacao">

														<input class="form-check-input" type="checkbox" value="None" id="maior-idade" name="check_idade" required="" >

													</div>

													<div class="contato-texto_maior-18anos">

														<label for="maior-idade">

															<p>Eu afirmo que sou maior de 18 anos, certifico que todas as informações aqui enviadas são

															corretas, enviadas com propósito de serem analisadas pelo site HOTBOYS.com.br.</p>

														</label>

													</div>

												</div>

												

											</div>

											

										</div>

										

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

					<!-- Fim do Formulario -->

					

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

</body>

</html>

