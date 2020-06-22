<?php
	$con = mysqli_connect("localhost", "c1hotboys", "eF!jr4cZmFGD", "c1hotboys_admin");
	
	if (!$con) {
		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	define('VERSION','52');
