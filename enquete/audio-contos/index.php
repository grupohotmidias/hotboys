<?php
	session_start();
	require_once('../../config/configuracoes.php');
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		
		<?php 
			//Dados da tabela enquetes(perguntas
			$query_pergunta = "SELECT * FROM `enquetes` WHERE status='Ativo' AND id='18'";
			$consulta_pergunta = mysql_query($query_pergunta);
			$dados_pergunta = mysql_fetch_array($consulta_pergunta);
		?>
		
		<?php 
			//Dados da tabela enquetes alternativas
			$query_alternativas = "SELECT * FROM `enquetes_alternativas` ORDER BY id DESC LIMIT 2";
			$consulta_alternativas = mysql_query($query_alternativas);
		?>
		
		<form>
			<h3>Enquete</h3>
			<!-- pergunta da enquete -->
			<p><?php echo $dados_pergunta[pergunta] ?></p>
			
			
			<!-- alternativas -->
			<?php while($dados_alternativas = mysql_fetch_array($consulta_alternativas)){ ?>
				<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
				<label class="form-check-label" for="gridRadios1">
					<?php echo $dados_alternativas[alternativa] ?>
				</label>
			<?php } ?>
			
			
			<!-- botao votar -->
			<button type="button" class="btn btn-success">Votar</button>
			
		</form>
		
		<p>Votos até agora: </p>
		<p>Não: </p>
		<p>Sim: </p>
	</body>
</html>