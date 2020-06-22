<?php 
	$id = addslashes($_GET[id]);
	$pg ='modelo' ;
	
	//Consulta Modelos
	$query = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id'";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	
	$dados_conteudo = mysql_fetch_array($consulta);
	
	if($dados_conteudo[descricao_content]==""){
		$texto = $dados_conteudo[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $dados_conteudo[descricao_content];
		$description = substr($texto ,0);
	}
	
	//adiciona 1 visita no campo visualizacoes quando acessado
	$query = mysql_query("UPDATE modelos SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
	
	
	// Pega os ids associadores dos modelos
	$query_modelo = "SELECT * FROM `associador_cenas` WHERE id_modelo=$id  order by id DESC LIMIT 6";
	$consulta_modelo = mysql_query($query_modelo);
	$total_modelo = mysql_num_rows( $consulta_modelo);
	

	
	//consulta das fotos free dos atores
	$query_fotos_modelo="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 4";
	$consulta_fotos_modelo=mysql_query($query_fotos_modelo);
	$total_fotos_modelo=mysql_num_rows($consulta_fotos_modelo);	
?>