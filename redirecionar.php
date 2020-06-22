<?php

	require('config/configuracoes.php');

    $id = $_GET['id'];

	$sql_seleciona = "SELECT * FROM `banners_2018` WHERE `id`= $id";
	$consulta_banner = mysql_query($sql_seleciona);
	$dados_banner = mysql_fetch_array($consulta_banner);
	$dados_banner['click']++;

	$sql_update = "UPDATE `banners_2018` SET `click`='$dados_banner[click]' WHERE `id`= $id";
	$update = mysql_query($sql_update);
	if($update){
		header("location: $dados_banner[link]");
	}

?>																						