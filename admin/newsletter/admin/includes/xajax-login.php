<?php


	
		function login($vars){					

			$resposta = new xajaxResponse();					


			$usuario = 			addslashes(utf8_decode($vars['usuario']));			
			$senha = 			addslashes(utf8_decode($vars['senha']));
			$manterConectado = 	addslashes(utf8_decode($vars['manterConectado']));
			
			
			if($usuario==''){
				$resposta->alert(utf8_encode('Preencha o campo USUÁRIO'));
				
			} else if ($senha == ''){
				$resposta->alert(utf8_encode('Preencha o campo SENHA'));
				
			} else {			
				
				if(AdminLogin::login($usuario, $senha, $manterConectado)){
				//login correto						
					$resposta->script(utf8_encode("msgSucesso('Aguarde...');"));
					$resposta->script(utf8_encode("location.href='inicio.php';"));
										
				} else {
				//login errado	
					$resposta->script(utf8_encode("msgErro('Usuário ou senha incorreto!');"));
					
				}	
			}

			
   			return $resposta;
		}

					
					
					
					
					

		$xajax->register(XAJAX_FUNCTION, 'login');
		
		
		