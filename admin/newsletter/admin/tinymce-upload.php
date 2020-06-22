<?php

		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');
		require('../includes/funcoes.php');

		
		
		if(!AdminLogin::verificar()){
		//não está logado	
			header("Location: index.php?acao=desconectado");
			exit();
		}


		
		
		
		
		#####Campos de upload
		$campo1 = new Upload();
		$campo1->extensoesPermitidas = array('jpg', 'jpeg', 'gif', 'png');
		$campo1->nomeInput = "image";
		$campo1->diretorioArquivos = CAMINHO_SISTEMA.'arquivos/';
		$campo1->linkArquivos  = URL.'arquivos/';
		
		
		$arquivo1 = $campo1->fazerUpload($_FILES, '');
		
		
		if($arquivo1[erro]){
			echo "<script>alert('Erro ao fazer upload!')</script>";
			
		} else {
			echo "<script>top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('".URL."arquivos/".$arquivo1[nome]."').closest('.mce-window').find('.mce-primary').click();</script>";
		
		}
		
		
		
		