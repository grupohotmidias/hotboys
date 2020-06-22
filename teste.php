<?php

	$ch = curl_init();			
			curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/'); 		
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"); //define navegador
			$retorno = curl_exec($ch);	
			
			
			echo $retorno;
			
			
