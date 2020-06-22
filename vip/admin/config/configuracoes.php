<?php
	session_start();
	
	$dirImg = 'https://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	
	
	$servidor = 'localhost';
	$usuario = 'c1hotboys';
	$senha = 'eF!jr4cZmFGD';
	$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_connect($servidor, $usuario, $senha);
	mysql_select_db($bd, $conexaoMysql_hot);
	
	//atualiza o css toda vez que alguma alteracao acontece
	define('Version', '20225');
	define('URL', 'https://www.hotboys.com.br/vip/admin/');
		
	$urlnow = $_SERVER['REQUEST_URI'];
	$lingua = explode('/', $urlnow); 
	$idioma = $lingua['1'];
?>