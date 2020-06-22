<?php 
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];
	
	$to = "";
	$subject = "$assunto";
	$message = "
	
	<b>Nome:</b> ".$nome."
	<b>Sobrenome:</b> ".$sobrenome."
	<b>Email:</b> ".$email."
	<b>Assunto:</b> ".$assunto."
	<b>Mensagem:</b> ".$mensagem."
	
	
	</body>
	</html>"
	;
		
		
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: $nome <$email>';
	
	
	mail($to, $subject, $message, $header);
	echo "Mensagem enviada com sucesso!"
?>