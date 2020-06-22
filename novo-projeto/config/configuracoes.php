<?php
	session_start();
	
	$dirImg = 'https://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	
	
	$servidor = 'localhost';
	$usuario = 'c1hotboys';
	$senha = 'eF!jr4cZmFGD';
	$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_connect($servidor, $usuario, $senha);
	mysql_select_db($bd, $conexaoMysql_hot);
	
	//Conexão MYSQLI
	//$con = mysqli_connect($servidor, $usuario, $senhas, $bd);
	
	//atualiza o css toda vez que alguma alteracao acontece
	define('Version', '40009947');
	define('URL', 'https://www.hotboys.com.br/');
	define('URL_VIP', 'https://www.hotboys.com.br/vip/');
	define('CAMINHO_SISTEMA', '/var/www/clients/client1/web6/web/');
	define('CAMINHO_IMAGENS', '/var/www/clients/client1/web6/web/arquivos/');
	define('CAMINHO_IMAGENS_PERFIL', '/var/www/clients/client1/web6/web/vip/imagens/area-do-cliente/fotos-clientes/');
	define('DOMINIO_IMG', URL.'arquivos/');
	define('DOMINIO_IMG_PERFIL', URL.'vip/imagens/area-do-cliente/fotos-clientes/');
	define('SERV_IMG','https://server2.hotboys.com.br/arquivos/');
	
	$urlnow = $_SERVER['REQUEST_URI'];
	$lingua = explode('/', $urlnow); 
	$idioma = $lingua['1'];
	
	define('ID_SITE_HOTMIDIAS', 1);
	