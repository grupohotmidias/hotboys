<?php


		/*
		 * 
		 * RODAR SCRIPT A CADA 30 MINUTOS
		 * 
		 */

		set_time_limit(0);		
		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');
		require('../includes/funcoes.php');
		
		
		
		
		
		
		//consulta envios pendentes
		$queryEnvios = "SELECT * FROM `newsletter_emails` WHERE status='Aguardando' order by id ASC LIMIT ".SMTP_EMAILS_HORA;
		$consultaEnvios = mysql_query($queryEnvios);
		
		$totalEnvios = 0;
		while($linha = mysql_fetch_array($consultaEnvios)){
			
			
			unset($dadosTag);
			$dadosTag = array(
				'nome' => $linha[nome],
				'email' => $linha[email],
			);
			enviarMensagem($linha[id_newsletter], $linha[email], $dadosTag, $linha[id]);

			
			//marca e-mail como enviado
			$queryUpdate = "UPDATE `newsletter_emails` SET status='Enviado' WHERE id='$linha[id]' LIMIT 1";
			mysql_query($queryUpdate);
			
			$totalEnvios++;
		}
		
		
		
		echo $totalEnvios .' mensagens enviadas.';
		
		
		

