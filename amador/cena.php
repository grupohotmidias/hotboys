<?php

	require('../config/configuracoes.php');
	require('../includes/funcoes.php');
	
	$consulta_cena=mysql_query("SELECT * FROM `cenas_amadoras` WHERE `id`='$_GET[id]' AND `status`='Ativo'");
	$total_cenas=mysql_num_rows($consulta_cena);
	$dados_cena=mysql_fetch_array($consulta_cena);

	$consulta_associador=mysql_query("SELECT * FROM `associador_cenas_amadoras` WHERE `id_cena`='$_GET[id]'");
	$total_associador=mysql_num_rows($consulta_associador);
	$dados_associador=mysql_fetch_array($consulta_associador);
	$consulta_perfil=mysql_query("SELECT * FROM `ator_perfil` WHERE `id`='$dados_associador[id_ator]' AND `status`='Ativo'");
	$dados_perfil=mysql_fetch_array($consulta_perfil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>🌶 Hotboys - O Site Mais Quente Da Net!!!</title>
</head>
<body>
	
	<?php if($total_cenas >= 1){?>
		<!-- Título H1 da pagina -->	
		<div >
			<div >
				<h1>
				<span></span> CENA AMADORA (FREE) HOT</h1>
			</div>	
		</div>	
	<?php } ?>

		<br>
		<br>
		<br>
			
		<h2><?=$dados_cena['titulo']?></h2>

		<br>

		<img style="width:30%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_cena['img_destaque']?>" alt="<?=$dados_cena['img_destaque']?>">

		<br>

		<?="Publicado em:".$dados_cena['data'].$dados_cena['hora']."."?>

		<br>


	<br>
	<br>
	<br>

	<a href="https://hotboys.com.br/amador/ator/<?=$dados_perfil['id']?>/<?=$dados_perfil['nome']?>">
		<div style="width:6%;height:100px;border-radius:100%;overflow:hidden;">
			<img style="width:100%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_perfil['img_perfil']?>" alt="<?=$dados_perfil['img_perfil']?>">
		</div>
	</a>

	<br>

	<?=$dados_perfil['nome']?>

	<br>

	<?="Idade: ".$dados_perfil['idade']." anos"?>

	<br>

	<?="Dote: ".$dados_perfil['dote']." Cm"?>

	<br>

	<?=$dados_perfil['cidade']." / ".$dados_perfil['estado']?>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<h4>Comentários</h4>
	<span><b>ATENÇÃO! </b>É necessário ser <a href="https://hotboys.com.br/assine">assinante</a> para fazer comentário.</span>
	
	<br>

	<?php
		$consulta_comentarios=mysql_query("SELECT * FROM `comentarios_conteudo_amador` WHERE `video`='$_GET[id]' AND `status`='1'");
		while($dados_comentarios=mysql_fetch_array($consulta_comentarios)){
	?>
		<br>
		<br>
		<br>
		<br>
		<?=$dados_comentarios['mensagem']?>
		<br>
		<?=$dados_comentarios['nome']?>
		<br>
		<?=$dados_comentarios['data']." ".$dados_comentarios['hora']?>
		<br>
		<?=$dados_comentarios['cidade']." / ".$dados_comentarios['estado']?>

	<?php
		}
	?>

</body>
</html>