	<?php 
	require('config/configuracoes.php');
	
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
		if($answer->success){
			
			// Carrego a classe PHPMailer através do Autoload
			include "phpmailer/PHPMailerAutoload.php";
            
			// Instancio a classe PHPMailer
			$msg = new PHPMailer();
			
			// Faço todas as configurações de SMTP para o envio da mensagem
			$msg->isSMTP();                                      
			$msg->Host = 'mail.hotboys.com.br';  
			$msg->SMTPAuth = true;                              
			$msg->Username = 'naoresponda@hotboys.com.br';                 
			$msg->Password = '2a5a8dfsdf7';                           
			$msg->Port = 587;   
			$msg->SMTPAutoTLS = false;
			$msg->AuthType = 'PLAIN';
			
			//Defino o remetente da mensagem
			$msg->setFrom('suporte@hotboys.com.br','HotBoys');
			
			// Defino a quem esta mensagem será respondida, no caso, para o e-mail
			// que foi cadastrado no formulário
			$msg->addReplyTo($_POST['email'], $_POST['nome']);
			
			// Adiciono o destinatário desta mensagem, no caso, 
			//minha conta de contatos comerciais.
			$msg->AddAddress('suporte@hotboys.com.br', 'HotBoys');
			
			// Defino o problema que foi digitado no formulário
			$msg->Subject  = utf8_decode($_POST['problema']);
						
			//recebendo campos do formulário
			$nome = addslashes(utf8_decode($_POST[nome]));
			$sobrenome = addslashes(utf8_decode($_POST[sobrenome]));
			$email = addslashes(utf8_decode($_POST[email]));
			$problema = addslashes(utf8_decode($_POST[problema]));
			$mensagem_reportar_erro = addslashes(utf8_decode($_POST[mensagem_reportar_erro]));
			$titulo = addslashes(utf8_decode('HOTBOYS: Reportar Erro'));
			
			function url_origin( $s, $use_forwarded_host = false )
			{
			$ssl = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
			$sp = strtolower( $s['SERVER_PROTOCOL'] );
			$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
			$port = $s['SERVER_PORT'];
			$port = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
			$host = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
			$host = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
			return $protocol . '://' . $host;
			}
			
			function full_url( $s, $use_forwarded_host = false ){
			return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
			}
			
			$id_video  = full_url( $_SERVER );
			
			// Defino a mensagem que foi digitada no formulário
			$msg->Body = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
			<b>'.$titulo.'</b><br><br>
			<b>Nome:</b> '.$nome.' '.$sobrenome.' <br />
			<b>Email:</b> '.$email.'<br />
			<b>Erro apresentado:</b> '.$problema.'<br />
			<b>Mensagem:</b> '.$mensagem_reportar_erro.'<br />
			<b>Video acessado:</b> '.$id_video.'
			
			</body>
			</html>';
			
			// Defino a mensagem alternativa que foi digitada no formulário.
			// Esta mensagem é utilizada para validações AntiSPAM e por isto
			// é muito recomendado que utilize-a
			$msg->AltBody = $_POST['mensagem_reportar_erro'];
			
			// Faço o envio da mensagem
			$enviado = $msg->Send();
			
			// se enviado, carrega esta mensagem
			if ($enviado){
				$envio_sucesso = '
				<div class="animated bounceInLeft" id="fechar-mensagem-sucesso" style="float:left;width:100%">
				<div class="alert alert-success" style="text-align: center;">
				<strong>Informação enviada com sucesso !</strong> 
				</div>
				</div>
				'
			?>
			<?php  
				// se der erro, carrega esta mensagem
				} else {
				$envio_erro = '<div class="animated bounceInLeft" id="fechar-mensagem-erro" style="float:left;width:100%">
				<div class="alert alert-danger" style="text-align: center;">
                <strong>Erro ! Não foi possível enviar a Informação de Erro.</strong> Não se esqueça de preencher todos os campos.
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
<div class="row" style="float:left;width:100%">

	<div class="text-justify col-lg-12 col-md-12 col-xs-12 texto-pagina-contato_trabalhe">
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
    <style>
        .li_error { color: black; padding-bottom: 10px; }
        .li_error2 { color: black; padding-bottom: 10px; font-weight: bold; }
        .texto_error { color:black; font-weight:bold; }
        .link_error { color: red ;}
        .ul_error {padding-top: 10px;}
    </style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $("#divConteudo").hide();

        $("#btnMostrarEsconder").click(function (e) {
            $("#divConteudo").toggle();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (e) {

        $("#btnMostrarEsconder").click(function (e) {
            $("#divConteud").hide();
        });
    });
</script>
       <div class="container margin-top-10" id="divConteud">
        <div class="row" style=" float: left; width: 100%;">
         <div class="col-md-12 col-sm-12  col-xs-12 contato_email-titulo-conteudo">
          <p class="texto_error">
        Devido as atualizações do site para oferecermos aos nossos usuários uma melhor experiência, alguns documentos são atualizados e seu navegador pode não carregá-los corretamente. Siga
           o nosso tutorial abaixo
           </p>
           <ul class="ul_error">
               <li class="li_error2">1. Pressione as teclas ("crl" + "f5") para fazer um ("refresh da página") buscando os documentos atualizados do site. Se o erro continuar tente a segunda opção</li>
               <li class="li_error2">2. Limpe todos os dados de histórico de navegação do site HOTBOYS do seu Browser(Navegador) siga os passos abaixo.</li>
               <li class="li_error">- Clique no botão de configuração (botão dos três tracinhos no canto superior direito) na barra de ferramentas do navegador
                   Selecione Ferramentas</li>
               <li class="li_error">- Selecione Limpar dados de navegação:</li>
               <img src="//server2.hotboys.com.br/arquivos/tutorial_hist.jpg" style="width: 100%;">
               
               <li class="li_error">- Na caixa de diálogo exibida, marque as caixas de seleção dos tipos de informações que deseja remover</li>
               <li class="li_error">- Use o menu na parte superior para selecionar a quantidade de dados que deseja excluir. Selecione o início do tempo para excluir tudo.</li>
               <li class="li_error">- Parte 2 Clique em Limpar dados de navegação</li>
               <img src="//server2.hotboys.com.br/arquivos/tutorial_hist2.jpg" style="width: 100%;">
           </ul>
            </div>
        </div>
		
		<!-- Botao-->
		<button type="button" class="btn btn-primary btn-lg btn-block" href="#" id="btnMostrarEsconder" style="background-color: #484040;color: #fff!important;margin-bottom: 15px;">
			O ERRO continua ? Clique aqui!
			</button>
			
    </div>
    <div class="container margin-top-10" id="divConteudo">
		<form  method="POST" name="form" action="" > 
		<!-- subtitulo-->
		<div class="row" style=" float: left; width: 100%;">
			<div class="col-md-12 col-sm-12  col-xs-12 contato_email-titulo-conteudo">
				<p style="color:black;font-weight:bold; ">A cena que você tentou assistir no HOTBOYS está com problemas de áudio ou vídeo? A
					descrição está errada? Alguma informação do site está incorreta? Estes e outros problemas em
					relação ao nosso site agora podem ser relatados de modo simples e rápido. Para isso, basta
					preencher o formulário abaixo e reportar, com detalhes, o erro em questão. Assim que
				relatado, trabalharemos da forma mais rápida possível para a resolução do mesmo.
				</p>
			</div>
		</div>
		<!-- Comeco do formulário -->
			<div class="container margin-top-10">
				<div class="row margin-top-10">
			
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-box form-group">
						<input class="form-control sel1" name="nome" id="sel1" value="" required/>
						<span class="unit">Nome:</span>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
						<input class="form-control sel1" name="sobrenome" id="sel1" value="" required/> 
						<span class="unit-direita">Sobrenome:</span>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
					<input class="form-control sel1" type="E-mail" name="email" id="sel1" required/>
					<span class="unit">E-mail*:</span>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
					<input
					class="form-control sel1" name="problema" id="sel1" required/>
					<span class="unit">Erro apresentado:</span>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box  form-group">
						<textarea class="form-control sel1" id="sel1" name="mensagem_reportar_erro" rows="3" required></textarea>
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
		</div>
	<div id="mensagem-enviada">
	</div>
</div>

</div>
		