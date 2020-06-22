<?php

	session_start();


	$dirImg = 'https://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	

	$servidor = 'localhost';
	$usuario = 'c1hotboys';
	$senha = 'eF!jr4cZmFGD';
	$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_connect($servidor, $usuario, $senha);
	mysql_select_db($bd, $conexaoMysql_hot);
	
	
	
	define('URL', 'https://www.hotboys.com.br/');
	define('URL_VIP', 'https://www.hotboys.com.br/vip/');
	define('CAMINHO_SISTEMA', '/var/www/clients/client1/web6/web/hot/');
	define('CAMINHO_IMAGENS', '/var/www/clients/client1/web6/web/arquivos/');
	define('DOMINIO_IMG', URL.'arquivos/');
	//
	define('SERV_IMG','https://server2.hotboys.com.br/arquivos/');
	
	$urlnow = $_SERVER[REQUEST_URI];
	$lingua = explode('/', $urlnow); 
	$idioma = $lingua[1];
	
		//links do site
	define('ASSINE', 'https://www.hotboys.com.br/pt/assine');
	
	//diretorio Mobile
	define('MURL','https://www.m.hotboys.com.br/');
	define('MURL_VIP','https://www.m.hotboys.com.br/vip/');		
	
		
	define(EMAIL_SERVIDOR,  'mail.hotboys.com.br');
    define(EMAIL_PORTA,     '587');
    define(EMAIL_USUARIO,   'naoresponda@hotboys.com.br');
    define(EMAIL_SENHA,     '2a5a8dfsdf7');
    define(EMAIL_SECURE,    '');	
	
