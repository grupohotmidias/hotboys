<?php

	
		session_start();
		
		$servidor = 'localhost';
		$usuario = 'c1hotboys';
		$senha = 'eF!jr4cZmFGD';
		$bd = 'c1hotboys_traducao';

		mysql_connect($servidor, $usuario, $senha);
		mysql_select_db($bd);
	
		
		