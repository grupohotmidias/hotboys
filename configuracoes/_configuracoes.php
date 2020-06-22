<?php

	
		$servidor = 'localhost';
		$usuario = 'c1hotboys';
		$senha = 'eF!jr4cZmFGD';
		$bd = 'c1hotboys_admin';
		
		mysql_connect($servidor, $usuario, $senha);
		mysql_select_db($bd);
		
		
		
		define('URL', 'https://www.hotboys.com.br/');
		define('CAMINHO_IMAGENS', '/var/www/clients/client1/web6/web/arquivos/');
		define('DOMINIO_IMG', URL.'arquivos/');
