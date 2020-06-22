<?php
	// consulta o id do usuarios logado
    $query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
    $dados_user = mysql_fetch_array($consulta_user);
	
	/*/ busca o id do usuarios logado
    $id_usuario = $dados_user[id];
	
		if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento estao ok	
		verificar_pgto();
	}*/
	
	//$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	//$email_cliente_logado = $_SESSION[email_cliente_logado];
	
	if($_SESSION[email_cliente_logado] !=''){
		//consulta se usuario ja exite no bd 
		$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
		$consulta_user = mysql_query($query_user);
		$total_user = mysql_num_rows($consulta_user);
		
		//cadastra o email no banco de user caso o perfil dele nao esteja prenchido
		if($total_user < 1){
			
			$query = "INSERT INTO `usuarios_perfil`(
			`id`, 
			`id_user`,
			`primeiro_nome`, 
			`email`, 
			`nome_exibicao`,
			`foto_perfil`
			) VALUES (
			NULL , '$id_cliente', '', '$email_cliente_logado','','')";
			
			$status = mysql_query($query);
			
		}else{
			
			
			// Se o cliente nao tiver seu USER_ID ele preenche 
			$update = mysql_query("UPDATE `usuarios_perfil` SET `id_user` = '$id_cliente' WHERE email='$email_cliente_logado' ");
		
		
		}//FIM total user
	}// FIM consulta user
	
	
	//imagem do perfil
	if($vip == true){ 
	
		if($dados_user['foto_perfil'] == ''){	
			//não tem foto de perfil
			$fotoPerfil = URL.'../imagens/icones/perfil/avatar_sfoto.jpg';		
			} else {
			//tem foto de perfil	
			$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');		
		}
		
	}
	
	// tras dados de favoritos
	$query_fav = "SELECT * FROM `usuarios_favoritos` WHERE `id_conteudo`='$id' AND `id_usuario`='$id_usuario'";
	$consulta_fav = mysql_query($query_fav);
	$total_fav = mysql_num_rows($consulta_fav);
	$dados_fav = mysql_fetch_array($consulta_fav);
?>
