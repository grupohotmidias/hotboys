<?php
	
	
	function recuperar_senha($vars) {
		
		$resposta = new xajaxResponse();
		
		$email = addslashes(utf8_decode($vars['email']));
		$email = trim(strtolower($email));  
		
		$resposta->script('$("#mensagem-erro").hide();');
		$resposta->script('$("#mensagem-sucesso").hide();');
		
		if ($email == '') {            	
			$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("Preencha o campo E-MAIL!")); 
			$resposta->script('$("#mensagem-erro").show("slow");');
			$resposta->script("document.getElementById('login_email').focus();");
			
            } else {                
			
			$ch = curl_init();			
			curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/webservice/recuperar-senha.php?email='.$email); 			
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"); //define navegador
			$retorno = curl_exec($ch);	
			
			$retorno = json_decode($retorno);
			
			
			$resposta->script('$("#mensagem-sucesso").hide();');
			$resposta->script('$("#mensagem-erro").hide();');
			
			if($retorno->status == 'sucesso'){
				//sucesso	
				$resposta->assign("mensagem-sucesso", "innerHTML", utf8_encode("SUCESSO: SENHA REENVIADA PARA O SEU E-MAIL"));       						
				$resposta->script('$("#mensagem-sucesso").show("slow");');
				} else {
				//erro			
				$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("ERRO: E-MAIL NÃO CADASTRADO!"));       						
				$resposta->script('$("#mensagem-erro").show("slow");');
			} 
		}
		
		return $resposta;
	}
	
	
	
	
	
	
	function login($vars) {
		
		$resposta = new xajaxResponse();
		
		$email = addslashes(utf8_decode($vars['login_email']));
		$email = trim(strtolower($email));
		
		$senha = addslashes(utf8_decode($vars['login_senha']));
		$red = addslashes(utf8_decode($vars['red']));
		
		$resposta->script('$("#mensagem-erro").hide();');
		
		if ($email == '') {            	
			$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("Preencha o campo E-MAIL!")); 
			$resposta->script('$("#mensagem-erro").show("slow");');
			$resposta->script("document.getElementById('login_email').focus();");
			
            } else if ($senha == '') {            	
			$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("Preencha o campo SENHA!")); 
			$resposta->script('$("#mensagem-erro").show("slow");');
			$resposta->script("document.getElementById('login_senha').focus();");
			
            } else {                
			
			
			$ch = curl_init();			
			curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/webservice/login.php?email='.urlencode($email).'&senha='.urlencode($senha)); 			
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"); //define navegador
			$retorno = curl_exec($ch);	
			
			$retorno = json_decode($retorno);
			
			
			$resposta->script('$("#mensagem-sucesso").hide();');
			$resposta->script('$("#mensagem-erro").hide();');
			
			if($retorno->status == 'sucesso'){
				//sucesso, redireciona		
				$resposta->assign("mensagem-sucesso", "innerHTML", utf8_encode("SUCESSO, VOCÊ SERÁ REDIRECIONADO..."));       						
				$resposta->script('$("#mensagem-sucesso").show("slow");');
				
				
				if($red != ''){						
					if(!strpos($red, 'hotboys.com.br')){
						//nao tem "hotboys.com.br" na url de redirecionamento		
						$urlRedirecionamento = 'https://www.hotboys.com.br/vip/';
						} else {
						//tem "hotboys.com.br" na url de redirecionamento	
						$urlRedirecionamento = $red;
					}
					} else {
					$urlRedirecionamento = 'https://www.hotboys.com.br/vip/';
				}
				
				
				$_SESSION[email_cliente_logado] = $email;
				
				
				$resposta->script('window.location="'.$urlRedirecionamento.'";');
				
				} else {
				//erro			
				$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("ERRO: DADOS INCORRETOS!"));       						
				$resposta->script('$("#mensagem-erro").show("slow");');
			} 
		}
		
		return $resposta;
	}
	
	
	
	
	
	
	
	
	$xajax->register(XAJAX_FUNCTION, 'recuperar_senha');
	$xajax->register(XAJAX_FUNCTION, 'login');
	
	
	
	
	
