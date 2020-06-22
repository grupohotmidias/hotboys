<?php 
	session_start(); 
	include("includes/autenticacao.php");
	
	// requer arquivo de configuracoes
	require_once('config/conexao.php');
	
	$id_ator = $_SESSION[id_ator];
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$whatsapp = $_POST["whatsapp"];
	$estado = $_POST["estado"];
	$status = $consulta_ator["status"];
	
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		
		<?php 
			//inserir imagens do ator
			$msg = false;
			
			if(isset($_FILES['arquivo'])){
			$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
			$novo_nome = md5(time()) .$extensao;
			$diretorio = "upload/";
			move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
			
				$sql_fotos = "INSERT INTO `imagens_ator`(`id`, `id_ator`, `nome`, `imagem`, `ordem`) VALUES (NULL,$id_ator,'$nomeAtor','$novo_nome','999999')"; 
				$status_fotos = mysql_query($sql_fotos) or die(mysql_error());
				if($status_fotos){
					echo 'enviado com sucesso';
					}else{
					echo 'erro ao enviar';
					}
				
			}
		?>
		<form action="<?php echo $SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<input type="file" name="arquivo" />
			<input type="submit" name="enviar-formulario" value="Enviar">
		</form>
		
	</body>
</html>