<?php

		
		require('configuracoes/configuracoes.php');
		
		
		$id = addslashes($_GET[id]);
		
		
		//marca mensagem como lida
		$queryUpdate = "UPDATE `newsletter_emails` SET `abriu_email`='Sim' WHERE `id`='$id' LIMIT 1";
		mysql_query($queryUpdate);
		
		
		
		
		header('Content-Type: image/png');
		
		
		
		$ponteiro = fopen ('includes/news.png', 'r');
		while (!feof ($ponteiro)) {		
		  	$conteudoImagem .= fgets($ponteiro, 4096);		  	
		}
		fclose ($ponteiro);
		
		
		
		echo $conteudoImagem;
		
		
		