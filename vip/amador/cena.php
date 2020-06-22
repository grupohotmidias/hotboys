<?php

	require('../../novo-projeto/config/configuracoes.php');
	require('../includes/funcoes.php');
	require('../includes/hotmidias/funcoes.php');
	verificaoPermissaoAcessoContaHotmidias(ID_SITE_HOTMIDIAS);

	$vip = true;
	
	$consulta_cena=mysql_query("SELECT * FROM `cenas_amadoras` WHERE `id`='$_GET[id]' AND `status`='Ativo'");
	$total_cenas=mysql_num_rows($consulta_cena);
	$dados_cena=mysql_fetch_array($consulta_cena);

	$consulta_associador=mysql_query("SELECT * FROM `associador_cenas_amadoras` WHERE `id_cena`='$_GET[id]'");
	$total_associador=mysql_num_rows($consulta_associador);
	$dados_associador=mysql_fetch_array($consulta_associador);
	$consulta_perfil=mysql_query("SELECT * FROM `ator_perfil` WHERE `id`='$dados_associador[id_ator]' AND `status`='Ativo'");
	$dados_perfil=mysql_fetch_array($consulta_perfil);

	if(isset($_POST['acao']) && $_POST['acao'] == 'Comentar'){
		$email_cliente_logado = $_SESSION['email_cliente_logado'];
		$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
		$consulta_user = mysql_query($query_user);
		$dados_user = mysql_fetch_array($consulta_user);
		$data_comentario=date('d/m/Y');
		$hora_comentario=date('H:i:s');
		$cadastrar_comentario=mysql_query("INSERT INTO `comentarios_conteudo_amador`(`id`, `video`, `tipo`, `data`, `hora`, `nome`, `email_cliente`, `estado`, `cidade`, `mensagem`, `status`) 
										   VALUES (NULL,'$_GET[id]','video','$data_comentario','$hora_comentario','$dados_user[primeiro_nome]','$dados_user[email]','$dados_user[estado]','$dados_user[cidade]','$_POST[mensagem]','0')");
	}
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
				<span></span> CENA AMADORA (VIP) HOT</h1>
			</div>	
		</div>	
	<?php } ?>

		<br>
		<br>
		<br>
			
		<h2><?=$dados_cena['titulo']?></h2>

		<br>

		<?=$dados_cena['video']?>

		<br>

		<?="Publicado em: ".$dados_cena['data']." ".$dados_cena['hora']."."?>

		<br>


	<br>
	<br>
	<br>

	<a href="https://hotboys.com.br/vip/amador/ator/<?=$dados_perfil['id']?>/<?=$dados_perfil['nome']?>">
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


	<h4>Comentários</h4>
	<?php
		$consulta_comentarios=mysql_query("SELECT * FROM `comentarios_conteudo_amador` WHERE `video`='$_GET[id]' AND `status`='1' LIMIT 10");
		while($dados_comentarios=mysql_fetch_array($consulta_comentarios)){
	?>
	<div>
		<?=$dados_comentarios['mensagem']?>
		<br>
		<?php if($dados_comentarios['nome'] == ''){echo "Anônimo";}else{echo $dados_comentarios['nome'];}?>
		<br>
		<?=$dados_comentarios['data']." ".$dados_comentarios['hora']?>
		<br>
		<?=$dados_comentarios['cidade']." / ".$dados_comentarios['estado']?>
	</div>
	<br>
	<?php
		}
	?>
	<br>
	<br>
	<br>

	<form action="" method="post">
		<label for="mensagem">Comentário:</label>
		<br>
		<input type="text" name="mensagem" id="mensagem">
		<br>
		<input type="submit" name="acao" value="Comentar">
	</form>
</body>
</html>