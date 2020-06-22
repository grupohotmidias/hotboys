<?php

    $servidor = 'localhost';
    $usuario = 'c1hotboys';
    $senha = 'eF!jr4cZmFGD';
    $bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_pconnect($servidor, $usuario, $senha);
    mysql_select_db($bd, $conexaoMysql_hot);

	define('Version', '10');
	define('URL', 'https://www.hotboys.com.br/');
	define('URL_VIP', 'https://www.hotboys.com.br/vip/');
	
?>