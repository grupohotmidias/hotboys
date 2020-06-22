<?php

		/*
			Script serve para testar se apache / php / mysql estão rodando
		*/



        $servidor = 'localhost';
        $usuario = 'c1hotboys';
        $senha = 'eF!jr4cZmFGD';
        $bd = 'c1hotboys_admin';


        mysql_connect($servidor, $usuario, $senha) or die (mysql_error());
        mysql_select_db($bd) or die (mysql_error());


        $query = "SELECT * FROM administradores LIMIT 1";
        $consulta = mysql_query($query);
        $total = mysql_num_rows($consulta);

        if($total == 1){
            echo 'ok';
        } else {
            echo 'erro';
        }


