<?php

	require_once('../config/configuracoes.php');
	
	$idConteudo = 	addslashes($_POST['idConteudo']);
	$tipoConteudo = addslashes($_POST['tipoConteudo']);
	$emailCliente = addslashes($_POST['emailCliente']);
	$tag = 			addslashes($_POST['tag']);
	
	
	if($idConteudo!='' AND $tipoConteudo!='' AND $emailCliente!='' AND $tag!=''){
		$query = "INSERT INTO `visita_conteudo_tag` 
		(`id`, `id_conteudo`, `tipo_conteudo`, `email_cliente`, `data`, `tag`) 
		VALUES 
		(NULL, '$idConteudo', '$tipoConteudo', '$emailCliente', NOW(), '$tag');";
		mysql_query($query);
		
		echo 'ok';
	}	
	
	
	