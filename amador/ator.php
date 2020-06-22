<?php

	require('../config/configuracoes.php');
	require('../includes/funcoes.php');
	
	$consulta_perfil=mysql_query("SELECT * FROM `ator_perfil` WHERE `id`='$_GET[id]' AND `status`='Ativo'");
	$total_perfil=mysql_num_rows($consulta_perfil);
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
	
	<?php if($total_perfil >= 1){?>
		<!-- Título H1 da pagina -->	
		<div >
			<div >
				<h1>
				<span></span> PERFIL (FREE) HOT</h1>
			</div>	
		</div>	
	<?php } ?>

		<br>
		<br>
		<br>
			

	<img style="width:15%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_perfil['img_perfil']?>" alt="<?=$dados_perfil['img_perfil']?>">

	<br>

	<b><?=$dados_perfil['nome']?></b>

	<br>

	<?="<b>Localidade:</b> ".$dados_perfil['cidade']." / ".$dados_perfil['estado']?>

	<br>

	<?="<b>Idade:</b> ".$dados_perfil['idade']." Anos"?>

	<br>

	<?="<b>Dote:</b> ".$dados_perfil['dote']." Cm"?>

	<br>

	<?="<b>Posição:</b> ".$dados_perfil['posicao']?>

	<br>
	<br>
	<br>
	<br>

	<?php
		$consulta_imagens=mysql_query("SELECT * FROM `imagens_amadoras` WHERE `id_referencia`='$_GET[id]' AND `tipo`='Modelo Free' ORDER BY `id` DESC");
		$total_imagens=mysql_num_rows($consulta_imagens);
	?>

	<?php if($total_imagens >= 1){?>
		<!-- Título H1 da pagina -->	
		<div >
			<div >
				<h1>
				<span></span> ALGUMAS FOTOS (FREE)</h1>
			</div>	
		</div>	
	<?php } ?>

	<?php
		while($dados_imagens=mysql_fetch_array($consulta_imagens)){
	?>


			<img style="width:15%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_imagens['imagem']?>" alt="<?=$dados_imagens['imagem']?>">
	<?php
		}
	?>

	<br>
	<br>
	<br>
	<br>

	<?php
		$consultar_associador=mysql_query("SELECT * FROM `associador_cenas_amadoras` WHERE `id_ator`='$_GET[id]'");
		while($dados_associador=mysql_fetch_array($consultar_associador)){
			$consulta_cena=mysql_query("SELECT * FROM `cenas_amadoras` WHERE `id`='$dados_associador[id_cena]'");
			$total_cena=mysql_num_rows($consulta_cena);
	?>

	<?php if($total_cena >= 1){?>
		<!-- Título H1 da pagina -->	
		<div >
			<div >
				<h1>
				<span></span> MEUS VÍDEOS (FREE)</h1>
			</div>	
		</div>	
	<?php } ?>

	<?php
			while($dados_cena=mysql_fetch_array($consulta_cena)){
	?>

					<!-- Dados CENA (imagem de destaque) -->
					<a href="https://hotboys.com.br/amador/cena/<?=$dados_cena['id']?>/<?=$dados_cena['titulo']?>">
						<img style="width:30%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_cena['img_destaque']?>" alt="<?=$dados_cena['img_destaque']?>">
					</a>
					<br>
					<!-- Dados CENA (Titulo da Cena) -->
					<h2 style="font-size:20px;margin:0px;"><?=utf8_encode($dados_cena['titulo'])?></h2>	
					<!-- Dados CENA (data e hora de publicação) -->
					<small><?=$dados_cena['data'].$dados_cena['hora']?></small>
					<br>

	<?php
			}
		}
	?>
</body>
</html>