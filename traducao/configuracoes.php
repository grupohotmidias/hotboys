<?php


		$servidor = 'localhost';
		$usuario = 'c1hotboys';
		$senha = 'eF!jr4cZmFGD';
		$bd = 'c1hotboys_traducao';
		
		
		$mysql_traducao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
		$bd_traducao = mysql_select_db($bd, $mysql_traducao) or die(mysql_error());
		
		define(MYSQL_TRADUCAO, $mysql_traducao);
		define(BD_TRADUCAO, $bd_traducao);