<?php
	session_start();
	
	$dirImg = 'http://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	

	$servidor = 'localhost';
		$usuario = 'c1hotboys';
		$senha = 'eF!jr4cZmFGD';
		$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_pconnect($servidor, $usuario, $senha);
	mysql_select_db($bd, $conexaoMysql_hot);
	
	
	
	define('URL', 'http://www.hotboys.com.br/');
	define('URL_VIP', 'http://www.hotboys.com.br/vip/');
	define('CAMINHO_IMAGENS', '/var/www/clients/client1/web6/web/arquivos/');
	define('DOMINIO_IMG', URL.'arquivos/');
	//
	define('SERV_IMG','http://server2.hotboys.com.br/arquivos/');
	
	$urlnow = $_SERVER[REQUEST_URI];
	$lingua = explode('/', $urlnow); 
	$idioma = $lingua[1];
	
		//links do site
	define('ASSINE', 'http://www.hotboys.com.br/assine');
	
	//diretorio Mobile
	define('MURL','http://www.m.hotboys.com.br/');
	define('MURL_VIP','http://www.m.hotboys.com.br/vip/');	
	
	
	
	
