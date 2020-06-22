<?php 
	
	// tras id
	$id = addslashes($_GET[id]);
    $id_serie = addslashes($_GET[id_serie]);
	
	//pagina para comentario	
	$pg ='video' ;
	
	$query = "SELECT * FROM `audicoes_cenas` WHERE `exibicao`='Todos' AND status='Ativo' AND id=$id";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	if($total != 1){
		header("Location: <?php echo URL ?>");
		exit();
	}
	$dados_conteudo = mysql_fetch_array($consulta);	

	
	//adiciona 1 visita no campo visualizacoes quando acessado
	
	if($dados_conteudo[descricao_content]=="") {
		$texto = $dados_conteudo[descricao];
		$description = substr($texto ,0,156);
		}else{
		$texto = $dados_conteudo[descricao_content];
		$description = substr($texto ,0,156);
	}
	
	//consulta o associador de cenas
	$query_elenco = "SELECT * FROM `associador_cenas` WHERE id_cena=$id order by id ASC";
	$consulta_elenco = mysql_query($query_elenco);
	$total_elenco = mysql_num_rows($consulta_elenco);
	
	//consulta das fotos free dos atores
	$query_fotos="SELECT * FROM `imagens` WHERE tipo='Cena Free' AND id_referencia=$id ORDER BY ordem ASC LIMIT 4";
	$consulta_fotos=mysql_query($query_fotos);
	$total_fotos=mysql_num_rows($consulta_fotos);
?>