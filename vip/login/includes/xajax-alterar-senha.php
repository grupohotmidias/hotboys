<?php

      
        function alterar_senha($vars) {

            $resposta = new xajaxResponse();
              
            $email = addslashes(utf8_decode($vars['email']));
            $email = trim(strtolower($email));  
			
			$senha_atual = 			addslashes(utf8_decode($vars['senha_atual']));
			$senha_nova = 			addslashes(utf8_decode($vars['senha_nova']));
			$senha_nova_repetir = 	addslashes(utf8_decode($vars['senha_nova_repetir']));
			  
			  
			           
            
            if($senha_atual == '') {            	
                $resposta->alert(utf8_encode("Preencha o campo SENHA ATUAL!"));
				$resposta->script("document.getElementById('senha_atual').focus();");
                
            } else if($senha_nova == '') {            	
                $resposta->alert(utf8_encode("Preencha o campo NOVA SENHA!"));
				$resposta->script("document.getElementById('senha_nova').focus();");
                
            } else if($senha_nova_repetir == '') {            	
                $resposta->alert(utf8_encode("Repita o campo NOVA SENHA!"));
				$resposta->script("document.getElementById('senha_nova_repetir').focus();");
                
            } else if($senha_nova != $senha_nova_repetir) {            	
                $resposta->alert(utf8_encode("A REPETIÇÃO DE SENHA precisa ser igual à NOVA SENHA!"));
				$resposta->script("document.getElementById('senha_nova_repetir').focus();");
                
            } else {                
        
				$ch = curl_init();			
				curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/webservice/alterar-senha.php?email='.$_SESSION[email_cliente_logado].'&senha_antiga='.$senha_atual.'&senha_nova='.$senha_nova); 			
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
					$resposta->assign("mensagem-sucesso", "innerHTML", utf8_encode("SUCESSO: SENHA ALTERADA!"));  
					$resposta->script('$(".formulario-linha").hide();'); 
					$resposta->script('$(".formulario-btn-enviar").hide();'); 				
					$resposta->script('$("#mensagem-sucesso").show("slow");');
				} else {
				//erro			
					$resposta->assign("mensagem-erro", "innerHTML", utf8_encode("ERRO: SENHA ATUAL ESTÁ INCORRETA!"));       						
					$resposta->script('$("#mensagem-erro").show("slow");');
					$resposta->script("document.getElementById('senha_atual').focus();");
				} 
            }
            
            return $resposta;
        }






        
        
        $xajax->register(XAJAX_FUNCTION, 'alterar_senha');
		
		
		
		
       