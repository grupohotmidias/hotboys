<?php


		require_once('classes/class.phpmailer.php');
		
		
		
		
		function enviarMensagem($idNewsletter, $emailDestino, $dadosTags=null, $idEmail=null){
			
			####Pega infos da newsletter
			$queryNewsletter = "SELECT * FROM `newsletter` WHERE id='$idNewsletter'";
			$consultaNewsletter = mysql_query($queryNewsletter);
			$newsletter = mysql_fetch_array($consultaNewsletter);
			
			
			
			####Faz a substituição das tags pelos dados			
			$mensagem = $newsletter[mensagem];
			
			if($dadosTags[nome] != ''){
			//informou nome	
				$mensagem = str_replace('{NOME}', $dadosTags[nome], $mensagem);
			}
			
			
			if($dadosTags[nome] != ''){
			//informou e-mail
				$mensagem = str_replace('{EMAIL}', $dadosTags[email], $mensagem);
			}
			
			
			
			
			
			
			$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				<title>'.$newsletter[assunto].'</title>
				<style>
				body{
					font-family:Verdana, Geneva, sans-serif;
					font-size:13px;
					color:#666666;
				}
				
				</style>
				</head>
				
				<body>							
					'.$mensagem.'
					
					
					<img src="'.URL.'ver.png?id='.$idEmail.'" width="1" height="1">
				</body>
				</html>';
				
				
				
				
				$mail = new PHPMailer();
	
	
				$mail->IsSmtp(); 
				$mail->Host = SMTP_SERVIDOR; // servidor SMTP
				$mail->Username = SMTP_USUARIO; // conta SMTP
				$mail->Password = SMTP_SENHA; // senha SMTP
				$mail->Port = SMTP_PORTA; //porta SMTP
				$mail->SMTPSecure = SMTP_TIPO_CONEXAO; //tipo de conexão
				$mail->SMTPAuth = true; 
			
				$mail->From = SMTP_USUARIO; // Remetente
				$mail->FromName = SMTP_NOME; // Remetente
				$mail->AddAddress($emailDestino); // Destinatario
								
				$mail->AddReplyTo(SMTP_RESPONDER_PARA); //responder para	
								
				$mail->WordWrap = 50; 
				$mail->IsHTML(true); 
			
				$mail->Subject = $newsletter[assunto]; // Assunto
				$mail->Body = $msg; //Corpo da mensagem HTML
				
				$status = $mail->Send(); //envia email
		}











		function importarEmails($idNewsletter, $conexaoRemota){
			
			mysql_select_db(BD_EMAIL_BD, $conexaoRemota);//conecta no bd de emails
			//consulta emails
			$queryEmails = "SELECT * FROM `mysubscribers` order by idEmail ASC";
			$consultaEmails = mysql_query($queryEmails, $conexaoRemota);		
	
	
			mysql_select_db(BD_NORMAL); //conecta no BD normal
			while($linha = mysql_fetch_array($consultaEmails)){
				
				//cadastra email no bd local
				$queryCadastro = "INSERT INTO `newsletter_emails` 
				(`id`, `id_newsletter`, `email`, `nome`, `status`, `abriu_email`) 
				VALUES 
				(NULL, '$idNewsletter', '$linha[email]', '$linha[name]', 'Aguardando', 'Não');";
				mysql_query($queryCadastro);
				
			}
		}














