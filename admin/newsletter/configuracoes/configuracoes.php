<?php
	session_start();
	$bdEmailServidor = 'localhost';
	$conexaoRemota = mysql_connect($bdEmailServidor, $bdEmailUsuario, $bdEmailSenha);
	define(BD_EMAIL_BD, $bdEmailBd);
	
	//Bd local
	$servidor = 'localhost';
	$usuario = 'c1hotboys';
	$senha = 'eF!jr4cZmFGD';
	$bd = 'c1hotboys_newsletter';
	
	mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
	mysql_select_db($bd) or die(mysql_error());
	define(BD_NORMAL, $bd);
	
	
	
	define(URL, 'http://www.hotboys.com.br/admin/newsletter/'); //URL do site
	define(CAMINHO_SISTEMA, '/home/hotboysc/public_html/admin/newsletter/'); 
	define(NOME_EMPRESA, 'Newsletter - www.hotboys.com.br');
	
	
	
	
	
	
	
	
	$queryConfig = "SELECT * FROM configuracoes";
	$consultaConfig = mysql_query($queryConfig);
	$config = mysql_fetch_array($consultaConfig);		
	
	define(SMTP_SERVIDOR, $config[smtp_servidor]);
	define(SMTP_PORTA, $config[smtp_porta]);
	define(SMTP_TIPO_CONEXAO, $config[smtp_conexao]);
	define(SMTP_USUARIO, $config[smtp_usuario]);
	define(SMTP_SENHA, $config[smtp_senha]);		
	define(SMTP_NOME, $config[nome]);
	define(SMTP_RESPONDER_PARA, $config[responder_para]);
	define(SMTP_EMAILS_HORA, $config[emails_hora]);
	
	
	
	
	
	
	
	
	
	
	
	