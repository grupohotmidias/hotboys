<?php
	//require('../traducao/traducoes.php');
	//verifica_url_traducao();
	require('../config/configuracoes.php');
	require('../includes/funcoes.php');
	//class paginação
	require('../includes/PaginacaoConteudoClass.php');

			// TRAZ AS CENAS AMADORAS
			$query_cenas_amadoras=mysql_query("SELECT * FROM `cenas_amadoras` WHERE `status`='Ativo' ORDER BY `id` DESC");
			$total_cenas_amadoras=mysql_num_rows($query_cenas_amadoras);

?>
<!DOCTYPE html>
<html lang="en">
	
	<head>			
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>🌶 Hotboys - O Site Mais Quente Da Net!!!</title>
	</head>		
	
	<body id="body" class="fundo-preto">			

			<?php if($total_cenas_amadoras >= 1){?>
			<!-- Título H1 da pagina -->	
			<div >
				<div >
					<h1>
					<span></span> AMADORES HOT</h1>
				</div>	
			</div>	
			<?php } ?>



				<!-- LOOP CHAMANDO TODOS OS VIDEOS AMADORES -->	
				<?php while($dados_cenas=mysql_fetch_array($query_cenas_amadoras)){?>	
					
					<!-- Dados CENA (imagem de destaque) -->
					<a href="cena/<?=$dados_cenas['id']?>/<?=$dados_cenas['titulo']?>">
						<img style="width:30%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_cenas['img_destaque']?>" alt="<?=$dados_cenas['img_destaque']?>">
					</a>
					<br>
					<!-- Dados CENA (data e hora de publicação) -->
					<?=$dados_cenas['data'].$dados_cenas['hora']?>
					<br>
					<!-- Dados CENA (Titulo da Cena) -->
					<?=utf8_encode($dados_cenas['titulo'])?>
					<br>

				<?php
				//CONSULTA ASSOCIADOR DE CENAS AMADORAS ( ASSOCIAR CENA AO ATOR )
					$consulta_associador=mysql_query("SELECT * FROM `associador_cenas_amadoras` WHERE `id_cena`='$dados_cenas[id]'");
					$dados_associador=mysql_fetch_array($consulta_associador);
				//CONSULTA PERFIL DO ATOR ( PRA TRAZER DADOS DO PERFIL E REDE SOCIAL )
					$consulta_ator=mysql_query("SELECT * FROM `ator_perfil` WHERE `id`='$dados_associador[id_ator]'");
					$dados_ator=mysql_fetch_array($consulta_ator);
				?>
					<!-- Dados ATOR (Cidade e Estado do Ator) -->
					<?=utf8_encode($dados_ator['cidade'])."/".$dados_ator['estado']?>
					<br>
					<!-- Dados ATOR (Traz Rede Social do Ator) -->
					<?=$dados_ator['rede_social']?>
				<?php }?>
	
	</body>	
</html>																									