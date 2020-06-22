<?php
if($_POST['acao'] == 'alterar_imagem'  AND  $_FILES['foto_perfil']['name'] != ''){
		
		$extensao_imagem = explode('.', $_FILES['foto_perfil']['name']);
		$extensao_imagem = end($extensao_imagem);
		$extensao_imagem = strtolower($extensao_imagem);
		
		if($extensao_imagem == 'jpg' or $extensao_imagem == 'jpeg' or $extensao_imagem=='png' or $extensao_imagem=='gif' or $extensao_imagem=='bmp'){
			//imagem válida								
			
			$nome_imagem = md5(uniqid(rand(),1)).'.'.$extensao_imagem;
			
			if(move_uploaded_file($_FILES['foto_perfil']['tmp_name'], 'imagens/area-do-cliente/fotos-clientes/'. $nome_imagem)) {
				//sucesso upload   
				
				//exclui imagem antiga
				$queryUsuario = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
				$consultaUsuario = mysql_query($queryUsuario);
				$dadosUsuario = mysql_fetch_array($consultaUsuario);
				@unlink('imagens/area-do-cliente/fotos-clientes/'.$dadosUsuario['foto_perfil']);
				
				$query = "UPDATE `usuarios_perfil` SET `foto_perfil` = '$nome_imagem' WHERE `email`='$_SESSION[email_cliente_logado]'";	
				mysql_query($query);
				
				$sucesso_upload = true;		
				
				} else {
				//erro upload	
				$erro_upload = true;
			}								
			
			} else {
			//extensao invalida	
			$erro_upload = true;
		}
	}
	
	if($_POST['acao'] == 'deleta_imagem'){
		
		//exclui imagem 
		$queryUsuario = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
		$consultaUsuario = mysql_query($queryUsuario);
		$dadosUsuario = mysql_fetch_array($consultaUsuario);
		@unlink('imagens/area-do-cliente/fotos-clientes/'.$dadosUsuario['foto_perfil']);
		
		$query = "UPDATE `usuarios_perfil` SET `foto_perfil` = '$nome_imagem' WHERE `email`='$_SESSION[email_cliente_logado]'";	
		mysql_query($query);
        
		$sucesso_drop= true;		
	}
	
	if($_POST['acao'] == 'enviar'){
		
		$primeiro_nome = addslashes($_POST['primeiro_nome']);
		$sobrenome = addslashes($_POST['sobrenome']);
		$email = addslashes($_POST['email']);
		$nome_exibicao = addslashes($_POST['nome_exibicao']);
        $data_de_nascimento = addslashes($_POST['data_de_nascimento']);
        $data_de_nascimento = implode('-',array_reverse(explode('/',$data_de_nascimento)));
		$cidade = addslashes($_POST['cidade']);
		$estado = addslashes($_POST['estado']);
		
		
		
		$update = mysql_query("UPDATE `usuarios_perfil` SET `primeiro_nome` = '$primeiro_nome', `sobrenome` = '$sobrenome',`nome_exibicao` = '$nome_exibicao',`data_de_nascimento` = '$data_de_nascimento',`estado` = '$estado' ,`cidade`='$cidade' WHERE `email`='$_SESSION[email_cliente_logado]' ");
		
		$envio_sucesso = '<div class="alert alert-success" style="text-align: center;">
		<strong>Huuumm! Muito bem, safadinho HOT, as suas informações foram alteradas com sucesso. </strong> 
		</div> ';
	}
	
    if($_POST['acao'] == 'on'){
        $exibir_imagem_comentario = addslashes(isset($_POST["exibir_imagem_comentario"]))?'on':'off';
        
        $on_off = mysql_query("UPDATE `usuarios_perfil` SET `exibir_imagem_comentario`='$exibir_imagem_comentario' WHERE `email`='$_SESSION[email_cliente_logado]'");
	}
	
	// busca o id do usuarios logado
    $query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
    $dados_user = mysql_fetch_array($consulta_user);
	
    
    $id_usuario = $dados_user[id];
	
    if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento 
        $AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento está ok    
        verificar_pgto();
	}
	
	$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	$email_cliente_logado = $_SESSION[email_cliente_logado];
	
	######Consulta data de validade do plano
	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/webservice/validade-plano.php?email='.$_SESSION[email_cliente_logado]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);				
	$saida = curl_exec($ch);					
	curl_close($ch);
	$saida = json_decode($saida);
	$data_limite_acesso = $saida->data_limite_acesso;
	$renovacao_automatica = $saida->renovacao_automatica;
	$forma_pagamento = $saida->forma_pagamento;
	$id_cliente = $saida->id_cliente;
	
    $id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	//verificar dias faltantes para o fim da assinatura
	//inverte data para forma do banco
	$data_explode = explode('/',$data_limite_acesso);
	$data_explode = $data_explode[2]. "-" .$data_explode[1]. "-" .$data_explode[0];
	
	//determina data de hoje e data do fim do plano
	$data_inicial = date ("Y-m-d");
	$data_final = $data_explode;
	
	// Calcula a diferença em segundos entre as datas
	$diferenca = strtotime($data_final) - strtotime($data_inicial);
	
	//Calcula a diferença em dias
	$dias = floor($diferenca / (60 * 60 * 24));
	
	//Texto informaçao de validade da assinatura 
	if($renovacao_automatica == 0){
		$texto_vencimento = 'Sua assinatura VIP terminará em';
		}else{
		$texto_vencimento = ' de assinatura VIP';	
	}	
	
	//formas de pagamentos
	if($forma_pagamento == 1){
		$nome_forma_pagamento = 'Cartão de Credito';
		}elseif($forma_pagamento == 2){
		$nome_forma_pagamento = 'Outros';
		}elseif($forma_pagamento == 3){
		$nome_forma_pagamento = 'Deposito / Transferência';
		}elseif($forma_pagamento == 4){
		$nome_forma_pagamento = 'Paypal';
		}elseif($forma_pagamento == 5){
		$nome_forma_pagamento = 'Boleto Bancário';
	}
	
	// tras dados de favoritos
	$query_fav = "SELECT * FROM `usuarios_favoritos` WHERE `id_conteudo`='$id' AND `id_usuario`='$id_usuario'";
	$consulta_fav = mysql_query($query_fav);
	$total_fav = mysql_num_rows($consulta_fav);
	$dados_fav = mysql_fetch_array($consulta_fav);
?>
